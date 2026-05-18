<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrespoApp | Cambiar Contraseña</title>
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
                <a href="{{ route('perfil.edit') }}" class="btn-back">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--google-blue);">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    <span>Editar Mi Perfil</span>
                </a>
            </div>
        </header>

        <!-- Main Scrollable Edit Form Content -->
        <main class="main-scroll-content">

            <div class="page-header">
                <h1 class="page-title">Cambiar Contraseña</h1>
                <p class="page-subtitle">Por razones de seguridad, debes ingresar tu contraseña actual para poder definir una nueva.</p>
            </div>

            <!-- Validation and Database Errors List -->
            @if($errors->any())
                <ul class="alert-error-list">
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('password.update') }}" method="POST" id="password-edit-form" onsubmit="return handleFormSubmit(event)">
                @csrf

                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <!-- Contraseña Actual Input -->
                    <div class="form-group">
                        <label class="form-label" for="current_password">Contraseña Actual</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <input class="form-control" type="password" id="current_password" name="current_password" placeholder="Tu contraseña actual" required oninput="hideValidationWarning('current_password')">
                        </div>
                        <div id="current_password-validation-warning" class="validation-warning" style="display: none;"></div>
                    </div>

                    <!-- Nueva Contraseña Input -->
                    <div class="form-group">
                        <label class="form-label" for="password">Nueva Contraseña</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Mínimo 6 caracteres" required oninput="hideValidationWarning('password')">
                        </div>
                        <span class="password-info">Define tu nueva contraseña de acceso. Debe tener al menos 6 caracteres.</span>
                        <div id="password-validation-warning" class="validation-warning" style="display: none;"></div>
                    </div>

                    <!-- Confirmar Nueva Contraseña Input -->
                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">Confirmar Nueva Contraseña</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu nueva contraseña" required oninput="hideValidationWarning('password')">
                        </div>
                    </div>
                </div>

                <!-- Submit Action Button -->
                <button type="submit" class="btn-submit" id="btn-submit-password">
                    <span class="spinner" id="submit-spinner"></span>
                    <span id="btn-text">Actualizar Contraseña</span>
                </button>
            </form>

        </main>
    </div>

    <!-- Client-side Interactive Validations -->
    <script>
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

        function handleFormSubmit(event) {
            let isValid = true;

            const currentVal = document.getElementById('current_password').value;
            const passwordVal = document.getElementById('password').value;
            const confirmVal = document.getElementById('password_confirmation').value;

            if (!currentVal) {
                showValidationWarning('current_password', '⚠️ La contraseña actual es obligatoria.');
                isValid = false;
            }

            if (!passwordVal) {
                showValidationWarning('password', '⚠️ La nueva contraseña es obligatoria.');
                isValid = false;
            } else if (passwordVal.length < 6) {
                showValidationWarning('password', '⚠️ La nueva contraseña debe tener al menos 6 caracteres.');
                isValid = false;
            } else if (passwordVal === currentVal) {
                showValidationWarning('password', '⚠️ La nueva contraseña debe ser diferente a la actual.');
                isValid = false;
            } else if (passwordVal !== confirmVal) {
                showValidationWarning('password', '⚠️ Las contraseñas no coinciden.');
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
                return false;
            }

            // Show dynamic loading state
            document.getElementById('btn-submit-password').disabled = true;
            document.getElementById('btn-text').innerText = 'Actualizando...';
            document.getElementById('submit-spinner').style.display = 'block';

            return true;
        }
    </script>
</body>

</html>
