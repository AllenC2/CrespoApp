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

        /* User Trees Navigation Carousel */
        .user-trees-carousel {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding: 4px 2px 12px 2px;
            scroll-snap-type: x mandatory;
            scrollbar-width: thin;
            scrollbar-color: var(--border-light) transparent;
            -webkit-overflow-scrolling: touch;
        }

        .user-trees-carousel::-webkit-scrollbar {
            height: 5px;
        }

        .user-trees-carousel::-webkit-scrollbar-track {
            background: transparent;
        }

        .user-trees-carousel::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.08);
            border-radius: 10px;
        }

        .user-tree-card {
            flex: 0 0 130px;
            width: 130px;
            scroll-snap-align: start;
            cursor: pointer;
            border-radius: var(--border-radius-md);
            border: 1.5px solid var(--border-card);
            background-color: var(--bg-surface);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 1px 2px rgba(0,0,0,0.03);
        }

        .user-tree-card:hover {
            transform: translateY(-2px);
            border-color: rgba(26, 115, 232, 0.4);
            box-shadow: 0 4px 8px rgba(0,0,0,0.06);
        }

        .user-tree-img-wrapper {
            width: 100%;
            height: 80px;
            background: linear-gradient(135deg, #e8f0fe 0%, #e6f4ea 100%);
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid var(--border-card);
        }

        .user-tree-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .user-tree-card:hover .user-tree-img-wrapper img {
            transform: scale(1.04);
        }

        .user-tree-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--google-green);
            background-color: var(--google-green-bg);
        }

        .user-tree-info {
            padding: 8px 10px;
            display: flex;
            flex-direction: column;
            gap: 1px;
        }

        .user-tree-name {
            font-size: 11px;
            font-weight: 700;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-tree-details {
            font-size: 9px;
            color: var(--text-secondary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 500;
        }

        /* Modal Styles */
        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 1000;
            display: none;
            align-items: flex-end;
            justify-content: center;
        }

        .modal-container {
            width: 100%;
            max-height: 85%;
            background-color: var(--bg-surface);
            border-top-left-radius: var(--border-radius-lg);
            border-top-right-radius: var(--border-radius-lg);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 -8px 32px rgba(0, 0, 0, 0.25);
            animation: slide-up 0.3s cubic-bezier(0.32, 0.94, 0.6, 1);
        }

        @keyframes slide-up {
            from {
                transform: translateY(100%);
            }
            to {
                transform: translateY(0);
            }
        }

        .modal-form-header {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border-card);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-form-title {
            font-family: 'Google Sans', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .modal-form-close {
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background-color 0.2s;
        }

        .modal-form-close:hover {
            background-color: var(--bg-light);
            color: var(--text-primary);
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

            <!-- Mis Árboles Navigation Carousel -->
            @php
                $activeCount = $titulares->filter(fn($t) => $t->arbol && $t->arbol->estado !== 'solicitando')->count();
            @endphp
            <div style="padding: 0 0 16px 0; border-bottom: 1px solid var(--border-card); margin-bottom: 8px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <span style="font-size: 11px; font-weight: 800; color: var(--text-tertiary); text-transform: uppercase; letter-spacing: 0.8px;">Mis Árboles Custodiados</span>
                    <span style="font-size: 11px; color: var(--google-blue); font-weight: 700;">{{ $activeCount }} {{ $activeCount == 1 ? 'Árbol' : 'Árboles' }}</span>
                </div>
                <div class="user-trees-carousel">
                    @foreach($titulares as $t)
                        @if($t->arbol && $t->arbol->estado !== 'solicitando')
                            @php
                                $fotoUrl = null;
                                if ($t->reporteMasReciente && $t->reporteMasReciente->Foto_Evidencia) {
                                    $fotoUrl = 'data:image/jpeg;base64,' . base64_encode($t->reporteMasReciente->Foto_Evidencia);
                                }
                            @endphp
                            <div class="user-tree-card" 
                                 onclick="window.location.href='{{ route('arbol.profile', $t->arbol->Id) }}'">
                                <div class="user-tree-img-wrapper">
                                    @if($fotoUrl)
                                        <img src="{{ $fotoUrl }}" alt="{{ $t->arbol->Nombre }}">
                                    @else
                                        <div class="user-tree-placeholder">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 19V5m0 0L7 9m5-4l5 4"></path>
                                                <path d="M12 2v20M17 5H7M19 9H5M21 13H3M12 17h6M12 17H6"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="user-tree-info">
                                    <span class="user-tree-name">{{ $t->arbol->Nombre }}</span>
                                    <span class="user-tree-details">{{ $t->arbol->Especie ?? 'Árbol Titular' }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                    <!-- Solicitar Árbol Card -->
                    <div class="user-tree-card" onclick="openSolicitarModal()" style="border-style: dashed; border-color: var(--google-yellow); background-color: var(--google-yellow-bg); opacity: 0.95;">
                        <div class="user-tree-img-wrapper" style="background: transparent; border-bottom: 1px dashed rgba(249, 171, 0, 0.3);">
                            <div class="user-tree-placeholder" style="color: var(--google-yellow); background: transparent;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </div>
                        </div>
                        <div class="user-tree-info">
                            <span class="user-tree-name" style="color: #b06000;">Solicitar Árbol</span>
                            <span class="user-tree-details" style="color: #c08020;">Nueva titularidad</span>
                        </div>
                    </div>
                </div>
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

        // Solicitar Árbol Modal Functions
        function openSolicitarModal() {
            const modal = document.getElementById('solicitarModal');
            if (modal) {
                modal.style.display = 'flex';
            }
        }

        function closeSolicitarModal(event) {
            if (event) event.stopPropagation();
            const modal = document.getElementById('solicitarModal');
            if (modal) {
                modal.style.display = 'none';
            }
        }
    </script>

    <!-- Modal Solicitar Titularidad de un Árbol -->
    <div id="solicitarModal" class="modal-overlay" onclick="closeSolicitarModal(event)">
        <div class="modal-container" onclick="event.stopPropagation()">
            
            <!-- Header -->
            <div class="modal-form-header">
                <h2 class="modal-form-title">Solicitar Árbol Nuevo</h2>
                <button class="modal-form-close" onclick="closeSolicitarModal(event)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Form -->
            <form action="{{ route('arbol.solicitar') }}" method="POST" id="solicitar-arbol-form" style="display: flex; flex-direction: column; gap: 16px; padding: 20px; overflow-y: auto; max-height: calc(85vh - 70px);">
                @csrf
                
                <!-- Nombre del Árbol -->
                <div class="form-group">
                    <label class="form-label" for="solicitar_nombre">Nombre del Árbol (Único)</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 14px; color: var(--text-tertiary);">
                            <path d="M12 2v20M17 5H7M19 9H5M21 13H3M12 17h6M12 17H6"></path>
                        </svg>
                        <input class="form-control" type="text" id="solicitar_nombre" name="nombre" placeholder="Ej. Roble Centenario" required style="padding-left: 42px;">
                    </div>
                </div>

                <!-- Especie -->
                <div class="form-group">
                    <label class="form-label" for="solicitar_especie">Especie</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 14px; color: var(--text-tertiary);">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <input class="form-control" type="text" id="solicitar_especie" name="especie" placeholder="Ej. Quercus robur" style="padding-left: 42px;">
                    </div>
                </div>

                <!-- Tamaño -->
                <div class="form-group">
                    <label class="form-label" for="solicitar_tamano">Tamaño aproximado</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 14px; color: var(--text-tertiary);">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                            <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                        </svg>
                        <input class="form-control" type="text" id="solicitar_tamano" name="tamano" placeholder="Ej. 12 metros, mediano" style="padding-left: 42px;">
                    </div>
                </div>

                <!-- Locación -->
                <div class="form-group">
                    <label class="form-label" for="solicitar_locacion">Locación / Coordenadas</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 14px; color: var(--text-tertiary);">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <input class="form-control" type="text" id="solicitar_locacion" name="locacion" placeholder="Ej. Sección Norte, Fila 4" style="padding-left: 42px;">
                    </div>
                </div>

                <!-- Fecha Plantado -->
                <div class="form-group">
                    <label class="form-label" for="solicitar_fecha_plantado">Fecha de Plantado</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 14px; color: var(--text-tertiary);">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <input class="form-control" type="date" id="solicitar_fecha_plantado" name="fecha_plantado" value="{{ date('Y-m-d') }}" style="padding-left: 42px;">
                    </div>
                </div>

                <!-- Bosque -->
                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="form-label" for="solicitar_bosque_id">Bosque de Destino</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 14px; color: var(--text-tertiary);">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <select class="form-control" id="solicitar_bosque_id" name="bosque_id" required style="padding-left: 42px;">
                            <option value="" disabled selected>Selecciona un bosque...</option>
                            @foreach($bosques as $b)
                                <option value="{{ $b->Id }}">{{ $b->Nombre }} ({{ $b->Ubicacion }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-submit" id="btn-submit-solicitar" style="margin-top: 8px; margin-bottom: 20px;">
                    <span>Enviar Solicitud</span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>
