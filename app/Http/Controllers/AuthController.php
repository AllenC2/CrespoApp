<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    /**
     * Handle the authentication request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'], // In our schema, this represents the 'Usuario' column
            'password' => ['required'],
        ]);

        // Attempt authentication using custom 'Usuario' and Laravel-resolved 'Contrasena'
        if (
            Auth::attempt([
                'Usuario' => $credentials['email'],
                'password' => $credentials['password'],
            ])
        ) {
            $user = Auth::user();

            // Verify if the user has the 'Titular' role in the DB
            if ($user->Rol !== 'Titular') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Acceso denegado. Este portal es exclusivo para usuarios de tipo Titular.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))
                ->with('success', 'Bienvenido!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Show the user dashboard.
     */
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        // Safety check: ensure user is Titular
        if (!$user || $user->Rol !== 'Titular') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Acceso denegado. Este portal es exclusivo para usuarios de tipo Titular.',
            ]);
        }

        // Fetch user's own titulares for report creation dropdown/step 1
        $titulares = $user->titulares()->with(['arbol.bosque', 'reporteMasReciente'])->get();

        // Fetch reports for the tiktok-style vertical feed (optionally filtered by arbol_id)
        $arbolId = $request->query('arbol_id');
        $query = \App\Models\Reporte::with(['titular.usuario', 'titular.arbol.bosque'])
            ->orderBy('Id', 'desc');

        if ($arbolId) {
            $query->whereHas('titular', function($q) use ($arbolId) {
                $q->where('Arbol_Id', $arbolId);
            });
        }

        $reportes = $query->get();

        return view('dashboard', compact('user', 'titulares', 'reportes'));
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Sesión cerrada correctamente.');
    }

    /**
     * Store a newly created report in storage.
     */
    public function storeReport(Request $request)
    {
        $user = Auth::user();

        // Safety check: ensure user is logged in and is Titular
        if (!$user || $user->Rol !== 'Titular') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Acceso denegado. Este portal es exclusivo para usuarios de tipo Titular.',
            ]);
        }

        // Validate the request
        $data = $request->validate([
            'titular_id' => ['required', 'exists:titulares,Id'],
            'descripcion' => ['required', 'string', 'min:5'],
            'estado' => ['required', 'string'],
            'atencion_requerida' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:15360'], // Increased validation range as fallback
            'foto_base64' => ['nullable', 'string'],
        ]);

        // Double check that the selected titular record belongs to the logged-in user
        $titular = $user->titulares()->where('Id', $data['titular_id'])->first();
        if (!$titular) {
            return back()->withErrors(['titular_id' => 'El árbol seleccionado no te pertenece.']);
        }

        // Read uploaded image binary if present
        $fotoBinary = null;
        if ($request->filled('foto_base64')) {
            $base64Data = $request->input('foto_base64');
            // Remove prefix if present (e.g. "data:image/jpeg;base64,")
            if (preg_match('/^data:image\/(\w+);base64,/', $base64Data, $type)) {
                $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
            }
            $fotoBinary = base64_decode($base64Data);
        } elseif ($request->hasFile('foto')) {
            $fotoBinary = file_get_contents($request->file('foto')->getRealPath());
        }

        // Validate that photo evidence was provided
        if (empty($fotoBinary)) {
            return back()->withErrors(['foto' => 'La fotografía de evidencia es obligatoria para registrar el reporte.'])->withInput();
        }

        // Create the report
        \App\Models\Reporte::create([
            'RelacionConTitulo' => $data['titular_id'],
            'Descripcion' => $data['descripcion'],
            'Estado' => $data['estado'],
            'Atencion_Requerida' => $data['atencion_requerida'] ?? 'Ninguna',
            'Foto_Evidencia' => $fotoBinary,
            'Creado_El' => now(),
        ]);

        return redirect()->route('dashboard')
            ->with('success', '¡Reporte técnico creado exitosamente!');
    }

    /**
     * Show the profile/gallery for a specific tree.
     */
    public function showArbolProfile($id)
    {
        $user = Auth::user();

        // Safety check: ensure user is Titular
        if (!$user || $user->Rol !== 'Titular') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Acceso denegado. Este portal es exclusivo para usuarios de tipo Titular.',
            ]);
        }

        // Fetch the tree with its related titles, reports, and forest
        $arbol = \App\Models\Arbol::with(['bosque', 'titulares.usuario', 'titulares.reportes'])->findOrFail($id);

        // Gather all reports for this tree
        $reportes = collect();
        foreach ($arbol->titulares as $titular) {
            foreach ($titular->reportes as $reporte) {
                $reporte->titular = $titular;
                $reportes->push($reporte);
            }
        }
        
        // Sort by date descending
        $reportes = $reportes->sortByDesc('Creado_El');

        // Fetch user's own titulares for report creation dropdown in modal
        $titulares = $user->titulares()->with(['arbol.bosque', 'reporteMasReciente'])->get();
        $bosques = \App\Models\Bosque::all();

        return view('arbol.profile', compact('user', 'arbol', 'reportes', 'titulares', 'bosques'));
    }

    /**
     * Show the user profile edit form.
     */
    public function editProfile()
    {
        $user = Auth::user();
        
        // Safety check: ensure user is Titular
        if (!$user || $user->Rol !== 'Titular') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Acceso denegado. Este portal es exclusivo para usuarios de tipo Titular.',
            ]);
        }

        // Fetch user's own titulares
        $titulares = $user->titulares()->with(['arbol.bosque', 'reporteMasReciente'])->get();
        $bosques = \App\Models\Bosque::all();
 
        return view('auth.profile-edit', compact('user', 'titulares', 'bosques'));
    }

    /**
     * Update the authenticated user's profile info.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Safety check: ensure user is Titular
        if (!$user || $user->Rol !== 'Titular') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Acceso denegado. Este portal es exclusivo para usuarios de tipo Titular.',
            ]);
        }

        // Validate input
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'usuario' => ['required', 'string', 'max:50', 'unique:usuarios,Usuario,' . $user->Id . ',Id'],
            'foto' => ['nullable', 'image', 'max:15360'],
            'foto_base64' => ['nullable', 'string'],
        ], [
            'usuario.unique' => 'El nombre de usuario o correo ya está registrado por otra cuenta.',
        ]);

        // Update profile fields
        $user->Nombre = $data['nombre'];
        $user->Usuario = $data['usuario'];

        // Handle uploaded image binary if present
        $fotoBinary = null;
        if ($request->filled('foto_base64')) {
            $base64Data = $request->input('foto_base64');
            // Remove prefix if present (e.g. "data:image/jpeg;base64,")
            if (preg_match('/^data:image\/(\w+);base64,/', $base64Data, $type)) {
                $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
            }
            $fotoBinary = base64_decode($base64Data);
        } elseif ($request->hasFile('foto')) {
            $fotoBinary = file_get_contents($request->file('foto')->getRealPath());
        }

        if ($fotoBinary !== null) {
            $user->Foto = $fotoBinary;
        }

        $user->save();

        return redirect()->route('dashboard')
            ->with('success', '¡Perfil de usuario actualizado exitosamente!');
    }

    /**
     * Show the user password change form.
     */
    public function editPassword()
    {
        $user = Auth::user();

        // Safety check: ensure user is Titular
        if (!$user || $user->Rol !== 'Titular') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Acceso denegado. Este portal es exclusivo para usuarios de tipo Titular.',
            ]);
        }

        // Fetch user titulares to maintain modal/feed dropdown consistency if applicable
        $titulares = $user->titulares()->with(['arbol.bosque'])->get();

        return view('auth.password-edit', compact('user', 'titulares'));
    }

    /**
     * Update the user password.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Safety check: ensure user is Titular
        if (!$user || $user->Rol !== 'Titular') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Acceso denegado. Este portal es exclusivo para usuarios de tipo Titular.',
            ]);
        }

        // Validate input fields
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'current_password.required' => 'La contraseña actual es obligatoria.',
            'password.required' => 'La nueva contraseña es obligatoria.',
            'password.confirmed' => 'La confirmación de la nueva contraseña no coincide.',
            'password.min' => 'La nueva contraseña debe tener al menos 6 caracteres.',
        ]);

        // Verify current password is correct
        if (!\Illuminate\Support\Facades\Hash::check($request->input('current_password'), $user->Contrasena)) {
            return back()->withErrors([
                'current_password' => 'La contraseña actual ingresada es incorrecta.',
            ]);
        }

        // Update password and save
        $user->Contrasena = \Illuminate\Support\Facades\Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('dashboard')
            ->with('success', '¡Tu contraseña ha sido actualizada con éxito!');
    }

    /**
     * Update the authenticated user's profile avatar instantly via AJAX.
     */
    public function updateAvatar(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        // Safety check: ensure user is Titular
        if (!$user || $user->Rol !== 'Titular') {
            return response()->json(['error' => 'Acceso denegado.'], 403);
        }

        // Validate image upload
        $request->validate([
            'foto' => ['nullable', 'image', 'max:15360'],
            'foto_base64' => ['nullable', 'string'],
        ]);

        $fotoBinary = null;
        if ($request->filled('foto_base64')) {
            $base64Data = $request->input('foto_base64');
            if (preg_match('/^data:image\/(\w+);base64,/', $base64Data, $type)) {
                $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
            }
            $fotoBinary = base64_decode($base64Data);
        } elseif ($request->hasFile('foto')) {
            $fotoBinary = file_get_contents($request->file('foto')->getRealPath());
        }

        if ($fotoBinary === null) {
            return response()->json(['error' => 'No se proporcionó ninguna imagen válida.'], 400);
        }

        $user->Foto = $fotoBinary;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => '¡Foto de perfil actualizada exitosamente!',
            'avatar_url' => 'data:image/jpeg;base64,' . base64_encode($fotoBinary)
        ]);
    }

    /**
     * Store a new tree request (solicitar titularidad de un nuevo árbol).
     */
    public function solicitarArbol(Request $request)
    {
        $user = Auth::user();
        
        // Safety check: ensure user is Titular
        if (!$user || $user->Rol !== 'Titular') {
            return redirect()->route('login')->withErrors([
                'email' => 'Acceso denegado. Este portal es exclusivo para usuarios de tipo Titular.',
            ]);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'nullable|string|max:255',
            'tamano' => 'nullable|string|max:255',
            'locacion' => 'nullable|string|max:255',
            'fecha_plantado' => 'nullable|date',
            'bosque_id' => 'required|integer|exists:bosques,Id',
        ], [
            'nombre.required' => 'El nombre del árbol es obligatorio.',
            'bosque_id.required' => 'El bosque es obligatorio.',
            'bosque_id.exists' => 'El bosque seleccionado no es válido.',
        ]);

        // Check if there is an existing tree with the same name that has a vigente/active title
        // "Los arboles con titularidad vigente no pueden ser solicitados."
        $existingVigente = \App\Models\Arbol::where('Nombre', $request->nombre)
            ->whereHas('titulares', function($query) {
                $query->where('estado_vigencia', 'vigente');
            })
            ->first();

        if ($existingVigente) {
            return back()->withErrors([
                'nombre' => 'El árbol "' . $request->nombre . '" ya cuenta con una titularidad vigente y no puede ser solicitado.',
            ])->withInput();
        }

        // 1. Create the Arbol with status 'solicitando'
        $arbol = \App\Models\Arbol::create([
            'Nombre' => $request->nombre,
            'Especie' => $request->especie,
            'Tamano' => $request->tamano,
            'Locacion' => $request->locacion,
            'FechaPlantado' => $request->fecha_plantado,
            'Bosque_Id' => $request->bosque_id,
            'estado' => 'solicitando',
        ]);

        // 2. Create the Titular with status 'solicitando'
        \App\Models\Titular::create([
            'FechaInicio' => now()->toDateString(),
            'FirmadaPor' => 'Solicitud en Línea',
            'Arbol_Id' => $arbol->Id,
            'Usuario_Id' => $user->Id,
            'estado_vigencia' => 'solicitando',
        ]);

        return back()->with('success', '¡Solicitud de titularidad enviada con éxito! Tu solicitud está siendo procesada.');
    }
}
