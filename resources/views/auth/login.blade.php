<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | CrespoApp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Fonts for Material Look & Feel -->
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
            font-family: 'Roboto', 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-surface);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Responsive centered full-width container matching the dashboard */
        .mobile-container {
            width: 100%;
            min-height: 100vh;
            background-color: var(--bg-surface);
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            padding: 40px 28px;
        }

        /* Capping width on tablet screens (768px) and larger */
        @media (min-width: 768px) {
            body {
                background-color: #0c0d0e; /* Cinematic dark background on desktop/tablet */
            }
            
            .mobile-container {
                max-width: 580px; /* Lock maximum width to 580px */
                min-height: 90vh; /* Floating premium card look on desktop */
                height: auto;
                border-radius: 20px;
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.5);
            }
        }

        /* Logo and Header area styling */
        .header {
            text-align: center;
            margin-bottom: 36px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-bottom: 24px;
            position: relative;
            animation: bounce-logo 4s infinite ease-in-out;
        }

        @keyframes bounce-logo {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .app-subtitle {
            font-family: 'Google Sans', sans-serif;
            font-size: 13px;
            color: var(--text-secondary);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 8px;
        }

        .badge-endpoint {
            background-color: var(--google-blue-bg);
            color: var(--google-blue);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
            border: 1px solid rgba(26, 115, 232, 0.15);
        }

        /* Form styling */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 22px;
        }

        .form-label {
            font-family: 'Google Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-secondary);
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
            display: flex;
            align-items: center;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .form-input {
            width: 100%;
            background-color: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: var(--border-radius-sm);
            padding: 12px 14px 12px 42px;
            color: var(--text-primary);
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-input::placeholder {
            color: var(--text-tertiary);
        }

        .form-input:focus {
            border-color: var(--google-blue);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.15);
        }

        .form-input:focus~.input-icon {
            color: var(--google-blue);
        }

        /* Primary Button */
        .btn-submit {
            width: 100%;
            background-color: var(--google-blue);
            color: #ffffff;
            border: none;
            border-radius: var(--border-radius-sm);
            padding: 14px;
            font-size: 15px;
            font-family: 'Google Sans', sans-serif;
            font-weight: 500;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            transition: background-color 0.2s ease, box-shadow 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 12px;
        }

        .btn-submit:hover {
            background-color: var(--google-blue-hover);
            box-shadow: 0 2px 6px rgba(26, 115, 232, 0.3);
        }

        .btn-submit:active {
            box-shadow: var(--shadow-sm);
        }

        /* Alerts */
        .error-alert {
            background-color: var(--google-red-bg);
            border: 1px solid rgba(217, 48, 37, 0.2);
            color: var(--google-red);
            padding: 14px 16px;
            border-radius: var(--border-radius-md);
            font-size: 13px;
            margin-bottom: 24px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            line-height: 1.4;
        }

        .error-alert svg {
            flex-shrink: 0;
            margin-top: 2px;
        }

        .success-alert {
            background-color: var(--google-green-bg);
            border: 1px solid rgba(30, 142, 62, 0.2);
            color: var(--google-green);
            padding: 14px 16px;
            border-radius: var(--border-radius-md);
            font-size: 13px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-alert svg {
            flex-shrink: 0;
        }

        /* Demo credentials card */
        .demo-box {
            margin-top: 36px;
            background-color: var(--google-yellow-bg);
            border: 1px solid rgba(249, 171, 0, 0.25);
            border-radius: var(--border-radius-md);
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .demo-title {
            font-family: 'Google Sans', sans-serif;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #b06000;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .demo-text {
            font-size: 13px;
            color: #5f6368;
            line-height: 1.5;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .demo-text code {
            background-color: rgba(0, 0, 0, 0.05);
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
            color: var(--text-primary);
            font-weight: 700;
            font-size: 12px;
        }

        .footer-credits {
            text-align: center;
            margin-top: 40px;
            font-size: 11px;
            color: var(--text-tertiary);
            letter-spacing: 0.2px;
        }
    </style>
</head>

<body>

    <!-- Responsive centered mobile column container -->
    <div class="mobile-container">

        <header class="header">
            <!-- Full width horizontal company brand logo -->
            <div class="logo-container">
                <img src="{{ asset('crespo-logo.png') }}" alt="Crespo Logo"
                    style="width: 100%; max-width: 280px; height: auto; object-fit: contain;">
            </div>
        </header>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="error-alert">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <div>
                    @foreach ($errors->all() as $error)
                        <p style="margin-bottom: 2px;">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        @if(session('success'))
            <div class="success-alert">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Correo Electrónico</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </span>
                    <input type="email" name="email" id="email" class="form-input" placeholder="ejemplo@crespo.com"
                        value="{{ old('email') }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </span>
                    <input type="password" name="password" id="password" class="form-input" placeholder="••••••••"
                        required>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <span>Acceder al Panel</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </button>
        </form>

        <footer class="footer-credits">

        </footer>
    </div>

</body>

</html>