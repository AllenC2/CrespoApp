<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrespoApp | Editar Mi Perfil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Roboto:wght@300;400;500;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --google-blue: #1a73e8;
            --google-blue-hover: #1557b0;
            --google-blue-bg: #e8f0fe;
            --google-green: #1e8e3e;
            --google-green-bg: #e6f4ea;
            --google-yellow: #f9ab00;
            --google-yellow-bg: #fef7e0;
            --google-red: #d93025;
            --google-red-bg: #fce8e6;

            --bg-light: #f8f9fa;
            --bg-surface: #ffffff;
            --text-primary: #202124;
            --text-secondary: #5f6368;
            --text-tertiary: #80868b;
            --border-light: #dadce0;
            --border-card: #e8eaed;
            --shadow-sm: 0 1px 2px 0 rgba(60, 64, 67, 0.3), 0 1px 3px 1px rgba(60, 64, 67, 0.15);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --border-radius-lg: 16px;
            --border-radius-md: 12px;
            --border-radius-sm: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', 'Roboto', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-surface);
            color: var(--text-primary);
            height: 100vh;
            max-height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            padding: 0;
        }

        /* Responsive Container Viewport */
        .mobile-container {
            width: 100%;
            background-color: var(--bg-surface);
            height: 100vh !important;
            max-height: 100vh !important;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden !important;
        }

        /* Capping width on tablet screens (768px) and larger */
        @media (min-width: 768px) {
            body {
                background-color: #0c0d0e;
            }
            
            .mobile-container {
                max-width: 580px;
                border-left: 1px solid rgba(255, 255, 255, 0.08);
                border-right: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.5);
            }
        }

        /* Top navbar style back-nav */
        .top-navbar {
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            border-bottom: 1px solid var(--border-card);
            background-color: var(--bg-surface);
            z-index: 10;
        }

        .brand-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-back {
            text-decoration: none;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 15px;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .btn-back:hover {
            color: var(--google-blue);
        }

        .main-scroll-content {
            flex: 1;
            padding: 24px 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 24px;
            padding-bottom: 40px;
        }

        .page-header {
            margin-bottom: 8px;
        }

        .page-title {
            font-family: 'Google Sans', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 6px;
        }

        .page-subtitle {
            font-size: 13px;
            color: var(--text-secondary);
            line-height: 1.4;
        }

        /* Alert and validation layouts */
        .alert-error-list {
            background-color: var(--google-red-bg);
            border: 1px solid rgba(217, 48, 37, 0.2);
            color: var(--google-red);
            border-radius: var(--border-radius-md);
            padding: 12px 16px;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 6px;
            font-size: 13px;
        }

        /* Profile photo container and circle preview */
        .profile-photo-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            margin: 8px 0;
        }

        .profile-photo-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--google-blue-bg) 0%, #d2e3fc 100%);
            border: 3px solid #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .profile-photo-circle:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .profile-photo-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-initials {
            font-size: 32px;
            font-weight: 700;
            color: var(--google-blue);
            font-family: 'Google Sans', sans-serif;
        }

        .edit-photo-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 32px;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            transition: opacity 0.2s ease;
        }

        .photo-instructions {
            font-size: 11px;
            color: var(--text-tertiary);
            text-align: center;
        }

        /* Material Input layout */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-left: 2px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            color: var(--text-tertiary);
            pointer-events: none;
        }

        .form-control {
            width: 100%;
            height: 48px;
            padding: 10px 14px 10px 42px;
            border-radius: var(--border-radius-md);
            border: 1.5px solid var(--border-light);
            background-color: var(--bg-surface);
            font-size: 14px;
            color: var(--text-primary);
            transition: all 0.2s ease;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--google-blue);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.15);
            background-color: var(--bg-surface);
        }

        .password-info {
            font-size: 11px;
            color: var(--text-tertiary);
            margin-top: 4px;
            margin-left: 2px;
            line-height: 1.4;
        }

        /* Dynamic warning validations */
        .validation-warning {
            color: var(--google-red);
            font-size: 11px;
            font-weight: 500;
            margin-top: 4px;
            margin-left: 2px;
            display: flex;
            align-items: center;
            gap: 4px;
            animation: shake 0.3s ease;
        }

        /* Loading Spinner */
        .spinner {
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #ffffff;
            animation: spin 0.8s linear infinite;
            display: none;
        }

        /* Primary Action button */
        .btn-submit {
            width: 100%;
            height: 50px;
            border-radius: var(--border-radius-md);
            background-color: var(--google-blue);
            color: #ffffff;
            border: none;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
            margin-top: 12px;
        }

        .btn-submit:hover {
            background-color: var(--google-blue-hover);
            box-shadow: var(--shadow-md);
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-4px); }
            40%, 80% { transform: translateX(4px); }
        }
    </style>
</head>

<body>

    <div class="mobile-container">

        <!-- Top Back Nav Bar -->
        <header class="top-navbar">
            <div class="brand-group">
                <a href="{{ route('dashboard') }}" class="btn-back">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--google-blue);">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    <span>Volver al feed</span>
                </a>
            </div>
        </header>

        <!-- Main Scrollable Edit Form Content -->
        <main class="main-scroll-content">

            <div class="page-header">
                <h1 class="page-title">Mi Perfil</h1>
                <p class="page-subtitle">Modifica tus datos de acceso, contraseña o actualiza tu fotografía de perfil.</p>
            </div>

            <!-- Validation and Database Unique Errors List -->
            @if($errors->any())
                <ul class="alert-error-list">
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data" id="profile-edit-form" onsubmit="return handleFormSubmit(event)">
                @csrf

                <!-- Profile Photo Upload -->
                <div class="profile-photo-section">
                    <div class="profile-photo-circle" onclick="triggerFileInput()" title="Cambiar Foto de Perfil">
                        @if($user->Foto)
                            <img src="data:image/jpeg;base64,{{ base64_encode($user->Foto) }}" alt="Avatar" id="profile-img-el">
                        @else
                            <span class="profile-initials" id="initials-placeholder">{{ strtoupper(substr(str_ireplace([' (titular)', ' titular'], '', $user->Nombre), 0, 1)) }}</span>
                        @endif
                        <div class="edit-photo-overlay">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                <circle cx="12" cy="13" r="4"></circle>
                            </svg>
                        </div>
                    </div>
                    <input type="file" id="foto-input" name="foto" accept="image/*" style="display: none;" onchange="handleFotoUpload(event)">
                    <span class="photo-instructions">Haz clic en el círculo para cambiar tu foto</span>
                    <div id="foto-validation-warning" class="validation-warning" style="display: none;"></div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <!-- Nombre Form Input -->
                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombre Completo</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre', $user->Nombre) }}" placeholder="Ej. Juan Crespo" oninput="hideValidationWarning('nombre')">
                        </div>
                        <div id="nombre-validation-warning" class="validation-warning" style="display: none;"></div>
                    </div>

                    <!-- Usuario / Correo Form Input (Must be unique check on DB) -->
                    <div class="form-group">
                        <label class="form-label" for="usuario">Nombre de Usuario (Único en el sistema)</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                            </svg>
                            <input class="form-control" type="text" id="usuario" name="usuario" value="{{ old('usuario', $user->Usuario) }}" placeholder="Ej. juan@crespo.com" oninput="hideValidationWarning('usuario')">
                        </div>
                        <div id="usuario-validation-warning" class="validation-warning" style="display: none;"></div>
                    </div>

                </div>

                <!-- Submit Action Button -->
                <button type="submit" class="btn-submit" id="btn-submit-profile">
                    <span class="spinner" id="submit-spinner"></span>
                    <span id="btn-text">Actualizar Perfil</span>
                </button>

                <!-- Change Password Form Button -->
                <a href="{{ route('password.edit') }}" class="btn-submit" style="background-color: transparent; border: 2.5px solid var(--google-blue); color: var(--google-blue); text-decoration: none; display: flex; align-items: center; justify-content: center; margin-top: 12px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <span>Cambiar Contraseña</span>
                </a>
            </form>

        </main>
    </div>

    <!-- Client-side Interactive Validations and image handling -->
    <script>
        function triggerFileInput() {
            document.getElementById('foto-input').click();
        }

        // Handle Image upload and Base64 compression preview
        function handleFotoUpload(event) {
            const file = event.target.files[0];
            if (!file) return;

            hideValidationWarning('foto');

            // Limit image size to 15MB
            if (file.size > 15 * 1024 * 1024) {
                showValidationWarning('foto', '⚠️ La imagen no debe superar los 15 MB.');
                event.target.value = '';
                return;
            }

            // Show loading overlay
            const circle = document.querySelector('.profile-photo-circle');
            circle.style.pointerEvents = 'none';
            circle.style.opacity = '0.7';

            let loadingOverlay = document.getElementById('avatar-loading-overlay');
            if (!loadingOverlay) {
                loadingOverlay = document.createElement('div');
                loadingOverlay.id = 'avatar-loading-overlay';
                loadingOverlay.style.position = 'absolute';
                loadingOverlay.style.top = '0';
                loadingOverlay.style.left = '0';
                loadingOverlay.style.right = '0';
                loadingOverlay.style.bottom = '0';
                loadingOverlay.style.background = 'rgba(255, 255, 255, 0.65)';
                loadingOverlay.style.display = 'flex';
                loadingOverlay.style.alignItems = 'center';
                loadingOverlay.style.justifyContent = 'center';
                loadingOverlay.innerHTML = '<div style="width: 24px; height: 24px; border: 3px solid rgba(26,115,232,0.2); border-radius: 50%; border-top-color: var(--google-blue); animation: spin 0.8s linear infinite;"></div>';
                circle.appendChild(loadingOverlay);
            } else {
                loadingOverlay.style.display = 'flex';
            }

            const formData = new FormData();
            formData.append('foto', file);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('{{ route("perfil.update-avatar") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                circle.style.pointerEvents = 'auto';
                circle.style.opacity = '1';
                loadingOverlay.style.display = 'none';

                if (data.success) {
                    // Update visual preview
                    let imgEl = document.getElementById('profile-img-el');
                    if (!imgEl) {
                        imgEl = document.createElement('img');
                        imgEl.id = 'profile-img-el';
                        const initialsPlaceholder = document.getElementById('initials-placeholder');
                        if (initialsPlaceholder) {
                            initialsPlaceholder.style.display = 'none';
                        }
                        circle.insertBefore(imgEl, circle.firstChild);
                    }
                    imgEl.src = data.avatar_url;

                    // Also update avatar image inside top navbar if present
                    const navAvatar = document.querySelector('.avatar-circle img');
                    if (navAvatar) {
                        navAvatar.src = data.avatar_url;
                    }

                    // Show a high-end success toast notification
                    const alertPill = document.createElement('div');
                    alertPill.style.position = 'fixed';
                    alertPill.style.bottom = '24px';
                    alertPill.style.left = '50%';
                    alertPill.style.transform = 'translateX(-50%)';
                    alertPill.style.backgroundColor = 'var(--google-green)';
                    alertPill.style.color = '#ffffff';
                    alertPill.style.padding = '12px 24px';
                    alertPill.style.borderRadius = '24px';
                    alertPill.style.fontSize = '13px';
                    alertPill.style.fontWeight = '600';
                    alertPill.style.boxShadow = 'var(--shadow-sm)';
                    alertPill.style.zIndex = '1000';
                    alertPill.style.opacity = '0';
                    alertPill.style.transition = 'opacity 0.3s ease';
                    alertPill.innerText = '✓ Foto de perfil guardada exitosamente';
                    document.body.appendChild(alertPill);

                    setTimeout(() => { alertPill.style.opacity = '1'; }, 100);
                    setTimeout(() => {
                        alertPill.style.opacity = '0';
                        setTimeout(() => { alertPill.remove(); }, 300);
                    }, 3000);
                } else {
                    showValidationWarning('foto', '⚠️ ' + (data.error || 'No se pudo guardar la imagen.'));
                }
            })
            .catch(err => {
                circle.style.pointerEvents = 'auto';
                circle.style.opacity = '1';
                if (loadingOverlay) loadingOverlay.style.display = 'none';
                showValidationWarning('foto', '⚠️ Error al conectar con el servidor.');
                console.error(err);
            });
        }

        function showValidationWarning(field, message) {
            const warningEl = document.getElementById(field + '-validation-warning');
            if (warningEl) {
                warningEl.innerHTML = message;
                warningEl.style.display = 'flex';
                warningEl.style.animation = 'none';
                warningEl.offsetHeight; // trigger reflow
                warningEl.style.animation = 'shake 0.3s ease';
            }
        }

        function hideValidationWarning(field) {
            const warningEl = document.getElementById(field + '-validation-warning');
            if (warningEl) {
                warningEl.style.display = 'none';
            }
        }

        // Client side validation flow
        function handleFormSubmit(event) {
            let isValid = true;

            const nombreVal = document.getElementById('nombre').value.trim();
            const usuarioVal = document.getElementById('usuario').value.trim();

            if (!nombreVal) {
                showValidationWarning('nombre', '⚠️ El nombre completo es obligatorio.');
                isValid = false;
            }
            if (!usuarioVal) {
                showValidationWarning('usuario', '⚠️ El nombre de usuario o correo es obligatorio.');
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
                return false;
            }

            // Show dynamic loading state
            document.getElementById('btn-submit-profile').disabled = true;
            document.getElementById('btn-text').innerText = 'Guardando cambios...';
            document.getElementById('submit-spinner').style.display = 'block';

            return true;
        }
    </script>
</body>

</html>
