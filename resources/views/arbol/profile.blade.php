<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - {{ $arbol->Nombre }} | CrespoApp</title>

    <!-- Google Fonts: Google Sans & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- CSS Base Custom Tokens -->
    <style>
        :root {
            --google-blue: #1a73e8;
            --google-blue-hover: #1557b0;
            --google-red: #d93025;
            --google-red-bg: rgba(217, 48, 37, 0.08);
            --google-green: #1e8e3e;
            --google-green-bg: rgba(30, 142, 62, 0.08);
            --google-yellow: #f9ab00;
            --google-yellow-bg: rgba(249, 171, 0, 0.08);
            --text-primary: #202124;
            --text-secondary: #5f6368;
            --text-tertiary: #80868b;
            --bg-surface: #ffffff;
            --bg-light: #f8f9fa;
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

        /* Responsive Container Viewport (100% wide on mobile, capped on tablets and larger) */
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

        /* Top Google-style Navigation Bar */
        .top-navbar {
            height: 64px;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            background-color: rgba(255, 255, 255, 0.85);
        }

        .back-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: background-color 0.2s;
        }

        .back-btn:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .navbar-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.3px;
        }

        .profile-menu-trigger {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--google-blue);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* Profile dropdown menu */
        .user-dropdown {
            display: none;
            position: absolute;
            top: 48px;
            right: 0;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(0, 0, 0, 0.08);
            width: 190px;
            padding: 12px;
            z-index: 200;
            text-align: left;
            animation: dropdown-fade-in 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .user-dropdown.show-dropdown {
            display: block;
        }

        @keyframes dropdown-fade-in {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-header-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding-bottom: 8px;
        }

        .dropdown-name {
            font-size: 13px;
            font-weight: 700;
            color: #202124;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-family: 'Google Sans', sans-serif;
        }

        .dropdown-divider {
            height: 1px;
            background-color: var(--border-light);
            margin: 6px 0;
        }

        .dropdown-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: none;
            border: none;
            width: 100%;
            padding: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            border-radius: var(--border-radius-sm);
            transition: background-color 0.2s ease;
        }

        .dropdown-btn:hover {
            background-color: var(--bg-light);
        }

        /* Profile Scrollable Content Panel */
        .profile-content {
            flex: 1;
            overflow-y: auto;
            padding-top: 64px; /* Under navbar */
            background-color: var(--bg-surface);
            -webkit-overflow-scrolling: touch;
        }

        /* Tree Profile Info Card */
        .profile-info-section {
            padding: 24px 16px 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-bottom: 1px solid var(--border-card);
            box-sizing: border-box;
        }

        /* Horizontal Header Container */
        .profile-header-container {
            display: flex;
            align-items: center;
            gap: 16px;
            width: 100%;
            max-width: 480px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .tree-logo-card {
            width: 58px;
            height: 58px;
            border-radius: var(--border-radius-md);
            background-color: #ffffff;
            border: 1.5px solid var(--border-light);
            box-shadow: 0 4px 12px rgba(86, 171, 47, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            flex-shrink: 0;
        }

        .profile-header-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            min-width: 0;
            flex: 1;
        }

        .tree-name-title {
            font-size: 21px;
            font-weight: 800;
            color: var(--text-primary);
            margin: 0 0 3px 0;
            letter-spacing: -0.5px;
            line-height: 1.2;
            word-break: break-word;
        }

        .tree-species-badge {
            font-size: 11px;
            font-weight: 700;
            color: var(--google-green);
            background-color: rgba(52, 168, 83, 0.08);
            padding: 2px 8px;
            border-radius: 20px;
            letter-spacing: 0.2px;
        }

        /* Inline Status Badge next to tree name */
        .status-badge-inline {
            font-size: 10px;
            font-weight: 800;
            padding: 3px 10px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            letter-spacing: 0.1px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.02);
            white-space: nowrap;
            text-transform: uppercase;
        }

        .status-badge-inline.status-excelente {
            color: var(--google-green);
            background-color: rgba(52, 168, 83, 0.08);
            border: 1px solid rgba(52, 168, 83, 0.15);
        }

        .status-badge-inline.status-saludable {
            color: #b06000;
            background-color: rgba(249, 171, 0, 0.08);
            border: 1px solid rgba(249, 171, 0, 0.15);
        }

        .status-badge-inline.status-alerta {
            color: var(--google-red);
            background-color: rgba(234, 67, 53, 0.08);
            border: 1px solid rgba(234, 67, 53, 0.15);
        }

        /* TikTok Style Stats Row - Left-aligned under header */
        .profile-stats-row {
            display: flex;
            align-items: center;
            gap: 28px;
            margin-bottom: 20px;
            width: 100%;
            max-width: 480px;
            justify-content: flex-start;
            box-sizing: border-box;
            padding-left: 4px;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .stat-value {
            font-size: 17px;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--text-tertiary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Bio/Description */
        .tree-bio {
            font-size: 13px;
            line-height: 1.5;
            color: var(--text-secondary);
            max-width: 320px;
            margin-bottom: 8px;
        }

        /* TikTok Grid/Like Tabs */
        .profile-tabs-bar {
            display: flex;
            border-bottom: 1px solid var(--border-card);
            position: sticky;
            top: 0;
            background-color: var(--bg-surface);
            z-index: 10;
        }

        .tab-btn {
            flex: 1;
            background: none;
            border: none;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-tertiary);
            position: relative;
            transition: color 0.2s;
        }

        .tab-btn.active {
            color: var(--text-primary);
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 48px;
            height: 2px;
            background-color: var(--text-primary);
        }

        .tab-btn svg {
            width: 20px;
            height: 20px;
        }

        /* TikTok profile 3-column Grid Gallery */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
            padding: 2px;
            background-color: var(--bg-surface);
            margin-top: 16px;
        }

        .grid-item {
            position: relative;
            aspect-ratio: 1 / 1;
            background-color: var(--bg-light);
            cursor: pointer;
            overflow: hidden;
        }

        .grid-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .grid-item:hover .grid-img {
            transform: scale(1.05);
        }

        /* Icon Badge overlay in grid like TikTok video view count */
        .grid-item-badge {
            position: absolute;
            bottom: 6px;
            left: 6px;
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(4px);
            padding: 2px 6px;
            border-radius: 4px;
            color: #ffffff;
            font-size: 10px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .grid-item-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--google-green);
        }

        .grid-item-placeholder .icon {
            font-size: 24px;
            margin-bottom: 2px;
        }

        .grid-item-placeholder .text {
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Floating Action Button (FAB) */
        .fab-button {
            position: absolute;
            bottom: 24px;
            right: 24px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background-color: var(--google-blue);
            color: #ffffff;
            border: none;
            box-shadow: var(--shadow-sm), 0 4px 12px rgba(26, 115, 232, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 90;
            transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1), background-color 0.15s, box-shadow 0.2s;
        }

        .fab-button:hover {
            transform: scale(1.08);
            background-color: var(--google-blue-hover);
            box-shadow: var(--shadow-md), 0 6px 16px rgba(26, 115, 232, 0.4);
        }

        .fab-button:active {
            transform: scale(0.95);
        }

        .fab-button svg {
            width: 24px;
            height: 24px;
        }

        /* Modal Overlay base */
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

        /* Custom slide-up animation matching the dashboard modal */
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

        /* Profile Post Detail Modal styling */
        .detail-modal-header {
            padding: 16px;
            border-bottom: 1px solid var(--border-card);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .detail-modal-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .detail-modal-close {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-secondary);
            padding: 4px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s;
        }

        .detail-modal-close:hover {
            background-color: var(--bg-light);
        }

        .detail-modal-body {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .detail-img-container {
            width: 100%;
            border-radius: var(--border-radius-md);
            overflow: hidden;
            background-color: var(--bg-light);
            aspect-ratio: 16 / 10;
        }

        .detail-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .detail-description {
            font-size: 14px;
            line-height: 1.6;
            color: var(--text-primary);
        }

        /* Detail dynamic badges */
        .tiktok-badges-row {
            display: flex;
            gap: 6px;
            margin-top: 4px;
            flex-wrap: wrap;
        }

        .tiktok-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            font-family: 'Google Sans', 'Roboto', sans-serif;
            border: 1px solid rgba(0, 0, 0, 0.08);
            color: #ffffff;
            transition: transform 0.2s ease;
        }

        .badge-estado-excelente {
            background-color: var(--google-green) !important;
            border-color: rgba(30, 142, 62, 0.2) !important;
        }

        .badge-estado-saludable {
            background-color: var(--google-yellow) !important;
            border-color: rgba(249, 171, 0, 0.2) !important;
        }

        .badge-estado-alerta {
            background-color: var(--google-red) !important;
            border-color: rgba(217, 48, 37, 0.2) !important;
        }

        .badge-especie {
            background-color: #607d8b !important;
            border-color: rgba(96, 125, 139, 0.2) !important;
        }

        .badge-emoji {
            font-size: 12px;
            line-height: 1;
        }

        /* Warning pill */
        .tiktok-alert-pill {
            background-color: var(--google-red-bg);
            border: 1px solid rgba(217, 48, 37, 0.15);
            border-radius: var(--border-radius-sm);
            padding: 10px 14px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #c5221f;
            font-size: 12px;
            line-height: 1.5;
            margin-top: 4px;
        }

        .tiktok-alert-icon {
            font-size: 14px;
            line-height: 1;
        }

        /* Empty Feed Gallery State */
        .empty-gallery-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 24px;
            color: var(--text-tertiary);
            text-align: center;
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 12px;
        }

        .empty-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .empty-subtitle {
            font-size: 12px;
            line-height: 1.4;
            max-width: 240px;
        }

        /* Standard Modal Form styling for Step modal (matching dashboard) */
        .modal-form-header {
            padding: 18px 24px 12px;
            border-bottom: 1px solid var(--border-card);
            position: relative;
        }

        .modal-form-title {
            font-size: 17px;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.3px;
        }

        .modal-form-close {
            position: absolute;
            right: 20px;
            top: 18px;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-secondary);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s;
        }

        .modal-form-close:hover {
            background-color: var(--bg-light);
        }

        /* Modal Progress Bar */
        .modal-progress-container {
            width: 100%;
            height: 4px;
            background-color: var(--bg-light);
            position: relative;
        }

        .modal-progress-bar {
            width: 25%;
            height: 100%;
            background-color: var(--google-blue);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .modal-form-body {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
        }

        .modal-step {
            display: none;
        }

        .modal-step.active {
            display: block;
            animation: fade-in 0.2s ease-out;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .step-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .step-subtitle {
            font-size: 13px;
            color: var(--text-secondary);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .form-select {
            width: 100%;
            height: 48px;
            padding: 0 16px;
            border-radius: var(--border-radius-sm);
            border: 1.5px solid var(--border-light);
            background-color: var(--bg-surface);
            font-size: 14px;
            color: var(--text-primary);
            outline: none;
            transition: border-color 0.2s;
        }

        .form-select:focus {
            border-color: var(--google-blue);
        }

        /* Health selection radio cards */
        .health-options-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .health-card {
            border: 1.5px solid var(--border-light);
            border-radius: var(--border-radius-md);
            padding: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background-color: var(--bg-surface);
        }

        .health-card:hover {
            border-color: var(--text-tertiary);
        }

        .health-card.selected {
            background-color: rgba(26, 115, 232, 0.04);
            border-color: var(--google-blue);
            box-shadow: 0 2px 8px rgba(26, 115, 232, 0.1);
        }

        .health-card-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .health-card-emoji {
            font-size: 22px;
            line-height: 1;
        }

        .health-card-details {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        .health-card-title {
            font-size: 14px;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        .health-card-desc {
            font-size: 11px;
            color: var(--text-secondary);
        }

        .health-check-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid var(--border-light);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.15s;
        }

        .health-card.selected .health-check-circle {
            border-color: var(--google-blue);
            background-color: var(--google-blue);
        }

        .health-check-circle::after {
            content: '';
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #ffffff;
            display: none;
        }

        .health-card.selected .health-check-circle::after {
            display: block;
        }

        .form-textarea {
            width: 100%;
            min-height: 110px;
            padding: 12px 16px;
            border-radius: var(--border-radius-sm);
            border: 1.5px solid var(--border-light);
            background-color: var(--bg-surface);
            font-size: 14px;
            color: var(--text-primary);
            outline: none;
            resize: none;
            transition: border-color 0.2s;
        }

        .form-textarea:focus {
            border-color: var(--google-blue);
        }

        /* File upload previsualizer style */
        .photo-uploader-box {
            border: 2px dashed var(--border-light);
            border-radius: var(--border-radius-md);
            padding: 32px 16px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            background-color: var(--bg-light);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .photo-uploader-box:hover {
            background-color: #f1f3f4;
            border-color: var(--text-tertiary);
        }

        .uploader-icon {
            font-size: 32px;
            margin-bottom: 8px;
            color: var(--text-secondary);
        }

        .uploader-text {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .uploader-desc {
            font-size: 11px;
            color: var(--text-tertiary);
        }

        .photo-preview-container {
            display: none;
            position: relative;
            border-radius: var(--border-radius-md);
            overflow: hidden;
            width: 100%;
            aspect-ratio: 16 / 10;
            box-shadow: var(--shadow-sm);
        }

        .photo-preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-preview-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            background-color: rgba(0, 0, 0, 0.7);
            border: none;
            color: #ffffff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            backdrop-filter: blur(4px);
            transition: transform 0.2s;
        }

        .remove-preview-btn:hover {
            transform: scale(1.08);
            background-color: rgba(0, 0, 0, 0.9);
        }

        /* Modal bottom Action Nav Bar */
        .modal-form-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-card);
            background-color: var(--bg-surface);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-btn-cancel {
            background: none;
            border: none;
            height: 44px;
            padding: 0 16px;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-secondary);
            cursor: pointer;
            border-radius: var(--border-radius-sm);
            transition: background-color 0.15s;
        }

        .modal-btn-cancel:hover {
            background-color: var(--bg-light);
        }

        .modal-btn-next, .modal-btn-submit {
            height: 44px;
            padding: 0 24px;
            font-size: 14px;
            font-weight: 700;
            border-radius: var(--border-radius-sm);
            border: none;
            cursor: pointer;
            transition: background-color 0.15s;
        }

        .modal-btn-next {
            background-color: var(--google-blue);
            color: #ffffff;
        }

        .modal-btn-next:hover {
            background-color: var(--google-blue-hover);
        }

        .modal-btn-submit {
            background-color: var(--google-green);
            color: #ffffff;
            display: none;
        }

        .modal-btn-submit:hover {
            background-color: #1b7a37;
        }

        /* Loose Specimen Technical Details Grid */
        .details-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            width: 100%;
            max-width: 480px;
            margin-top: 16px;
            box-sizing: border-box;
        }

        .details-grid-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: var(--bg-surface);
            padding: 10px 12px;
            border-radius: var(--border-radius-sm);
            border: 1.5px solid var(--border-light);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.01);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-sizing: border-box;
            min-width: 0; /* Prevents text overflow breaking grid */
        }

        .details-grid-item:hover {
            transform: translateY(-2px);
            border-color: var(--google-blue);
            box-shadow: 0 4px 12px rgba(26, 115, 232, 0.08);
        }

        .details-item-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background-color: rgba(52, 168, 83, 0.08);
            color: var(--google-green);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .details-icon-svg {
            stroke-width: 2.2;
            width: 16px;
            height: 16px;
        }

        .details-item-content {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            width: 100%;
        }

        .details-item-label {
            font-size: 9px;
            font-weight: 700;
            color: var(--text-tertiary);
            text-transform: uppercase;
            letter-spacing: 0.3px;
            line-height: 1;
            margin-bottom: 3px;
        }

        .details-item-value {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media (max-width: 600px) {
            .details-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
            }
            .details-grid-item[style*="grid-column: span 4"] {
                grid-column: span 2 !important;
            }
        }
        @media (max-width: 380px) {
            .details-grid {
                grid-template-columns: 1fr;
                gap: 8px;
            }
            .details-grid-item[style*="grid-column: span 4"] {
                grid-column: span 1 !important;
            }
        }
    </style>
</head>

<body>

    <div class="mobile-container">
        
        <!-- Transparent sticky top navbar -->
        <header class="top-navbar">
            <button class="back-btn" onclick="window.location.href='{{ route('dashboard') }}'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </button>
            <span class="navbar-title">Detalle de Árbol</span>
            
            <div class="profile-menu-wrapper" style="position: relative;">
                <div class="profile-menu-trigger" onclick="toggleUserDropdown(event)" title="{{ str_ireplace([' (titular)', ' titular'], '', $user->Nombre) }}" style="padding: 0; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    @if($user->Foto)
                        <img src="data:image/jpeg;base64,{{ base64_encode($user->Foto) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        {{ strtoupper(substr($user->Nombre ?? 'U', 0, 1)) }}
                    @endif
                </div>

                <!-- Google Material style dropdown menu -->
                <div class="user-dropdown" id="user-dropdown">
                    <div class="dropdown-header-info" style="padding-bottom: 4px;">
                        <div class="dropdown-name">{{ str_ireplace([' (titular)', ' titular'], '', $user->Nombre) }}</div>
                    </div>
                    <div class="dropdown-divider"></div>
                    
                    <a href="{{ route('perfil.edit') }}" class="dropdown-btn" title="Mi Perfil" style="text-decoration: none; color: #202124; display: flex; align-items: center; gap: 10px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--google-blue);">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>Mi Perfil</span>
                    </a>
                    
                    <div class="dropdown-divider" style="margin: 4px 0;"></div>
                    
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0; width: 100%;">
                        @csrf
                        <button type="submit" class="dropdown-btn" title="Cerrar Sesión" style="display: flex; align-items: center; gap: 10px; color: var(--google-red); border: none; background: none; width: 100%; padding: 8px; font-weight: 600; font-size: 13px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>Salir</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Scrollable Profile Content -->
        <main class="profile-content">
            
            <!-- Tree Bio Details Card -->
            <section class="profile-info-section">
                <!-- Horizontal Header (Tree Logo on left, Name & Species on right) -->
                @php
                    $ultimoReporteConFoto = $reportes->first(function($r) {
                        return !empty($r->Foto_Evidencia);
                    });
                    $fotoPerfilUrl = null;
                    if ($ultimoReporteConFoto) {
                        $fotoPerfilUrl = 'data:image/jpeg;base64,' . base64_encode($ultimoReporteConFoto->Foto_Evidencia);
                    }

                    $ultimoReporte = $reportes->first();
                    $estado = $ultimoReporte ? $ultimoReporte->Estado : 'Ninguno';
                    $estadoEmoji = '❇️';
                    $statusClass = 'status-excelente';
                    $estadoLower = strtolower($estado);
                    if (str_contains($estadoLower, 'atención') || str_contains($estadoLower, 'alerta') || str_contains($estadoLower, 'requerida') || str_contains($estadoLower, 'enfermo')) {
                        $estadoEmoji = '🚨';
                        $statusClass = 'status-alerta';
                    } elseif (str_contains($estadoLower, 'saludable') || str_contains($estadoLower, 'estable') || str_contains($estadoLower, 'bueno')) {
                        $estadoEmoji = '💛';
                        $statusClass = 'status-saludable';
                    }
                @endphp
                <div class="profile-header-container">
                    <div class="tree-logo-card" style="padding: 0; overflow: hidden; background-color: var(--bg-light); display: flex; align-items: center; justify-content: center;">
                        @if($fotoPerfilUrl)
                            <img src="{{ $fotoPerfilUrl }}" alt="Foto perfil de {{ $arbol->Nombre }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <span style="font-size: 26px;">🌳</span>
                        @endif
                    </div>
                    <div class="profile-header-text">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px; width: 100%; box-sizing: border-box;">
                            <h1 class="tree-name-title" style="margin: 0;">{{ $arbol->Nombre }}</h1>
                            <span class="status-badge-inline {{ $statusClass }}">
                                <span>{{ $estado }}</span>
                            </span>
                        </div>
                        <span class="tree-species-badge" style="margin-top: 6px;">{{ $arbol->Especie ?? 'Especie no especificada' }}</span>
                    </div>
                </div>



                <!-- Specimen Technical Details Grid (Loose) -->
                <div class="details-grid">
                    <!-- Especie -->
                    <div class="details-grid-item">
                        <span class="details-item-icon">
                            <svg class="details-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22v-8"></path>
                                <path d="M9 12H4.5a2.5 2.5 0 0 1 0-5C6 7 7 6 8 4.5a2.5 2.5 0 0 1 4.9-.6 2.5 2.5 0 0 1 4.9.6c1 1.5 2 2.5 3.5 2.5a2.5 2.5 0 0 1 0 5H15"></path>
                            </svg>
                        </span>
                        <div class="details-item-content">
                            <span class="details-item-label">Especie</span>
                            <span class="details-item-value" title="{{ $arbol->Especie ?? 'No especificada' }}">{{ $arbol->Especie ?? 'No especificada' }}</span>
                        </div>
                    </div>

                    <!-- Tamaño -->
                    <div class="details-grid-item">
                        <span class="details-item-icon">
                            <svg class="details-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 3v18"></path>
                                <path d="M19 17h-6"></path>
                                <path d="M19 12h-8"></path>
                                <path d="M19 7h-6"></path>
                            </svg>
                        </span>
                        <div class="details-item-content">
                            <span class="details-item-label">Tamaño / Altura</span>
                            <span class="details-item-value" title="{{ $arbol->Tamano ? $arbol->Tamano . ' metros' : 'No registrado' }}">{{ $arbol->Tamano ? $arbol->Tamano . ' m' : 'No registrado' }}</span>
                        </div>
                    </div>

                    <!-- Locación -->
                    <div class="details-grid-item">
                        <span class="details-item-icon">
                            <svg class="details-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </span>
                        <div class="details-item-content">
                            <span class="details-item-label">Ubicación</span>
                            <span class="details-item-value" title="{{ $arbol->Locacion ?? 'Zona General' }}">{{ $arbol->Locacion ?? 'Zona General' }}</span>
                        </div>
                    </div>

                    <!-- Fecha Plantado -->
                    <div class="details-grid-item">
                        <span class="details-item-icon">
                            <svg class="details-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </span>
                        <div class="details-item-content">
                            <span class="details-item-label">Plantación</span>
                            <span class="details-item-value" title="@if($arbol->FechaPlantado){{ \Carbon\Carbon::parse($arbol->FechaPlantado)->translatedFormat('d M Y') }}@else No registrada @endif">
                                @if($arbol->FechaPlantado)
                                    {{ \Carbon\Carbon::parse($arbol->FechaPlantado)->translatedFormat('d M Y') }}
                                @else
                                    No registrada
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Protectores / Guardians -->
                    <div class="details-grid-item" style="grid-column: span 4;">
                        <span class="details-item-icon">
                            <svg class="details-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </span>
                        <div class="details-item-content">
                            <span class="details-item-label">Protector(es) Asociado(s)</span>
                            @php
                                $protectores = $arbol->titulares->map(function($t) {
                                    return $t->usuario->Nombre ?? null;
                                })->filter()->unique()->implode(', ') ?: 'Sin protector asignado';
                            @endphp
                            <span class="details-item-value" title="{{ $protectores }}" style="white-space: normal; overflow: visible; text-overflow: clip;">{{ $protectores }}</span>
                        </div>
                    </div>
                </div>
            </section>



            <!-- TikTok Grid layout of inspections evidence -->
            <div class="gallery-grid">
                @forelse($reportes as $reporte)
                    <a class="grid-item" href="{{ route('dashboard', ['arbol_id' => $arbol->Id, 'focus_report_id' => $reporte->Id]) }}" style="text-decoration: none; display: block; color: inherit; position: relative;">
                        
                        @if($reporte->Foto_Evidencia)
                            <img class="grid-img" src="data:image/jpeg;base64,{{ base64_encode($reporte->Foto_Evidencia) }}" alt="Inspección {{ $reporte->Id }}">
                            <div class="grid-item-badge">
                                <span>Ver</span>
                            </div>
                        @else
                            <div class="grid-item-placeholder">
                                <span class="icon">🌳</span>
                                <span class="text">Inspección</span>
                            </div>
                        @endif
                    </a>
                @empty
                    <!-- Empty Gallery State -->
                    <div class="empty-gallery-state" style="grid-column: span 3;">
                        <span class="empty-icon">📭</span>
                        <h3 class="empty-title">Sin Reportes</h3>
                        <p class="empty-subtitle">Este árbol aún no cuenta con inspecciones técnicas registradas en el feed.</p>
                    </div>
                @endforelse
            </div>

        </main>

        <!-- Floating Action Button (FAB) (Only render if user owns this tree title) -->
        @php
            $ownsTree = $titulares->contains('Arbol_Id', $arbol->Id);
        @endphp
        @if($ownsTree)
            <button class="fab-button" onclick="openCreateModal()" title="Registrar nuevo reporte">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </button>
        @endif

        <!-- ==================== INTERACTIVE DETAIL MODAL ==================== -->
        <div id="detailModal" class="modal-overlay" onclick="closeDetailModal(event)">
            <div class="modal-container" onclick="event.stopPropagation()">
                <div class="detail-modal-header">
                    <span class="detail-modal-title">Detalle de Inspección</span>
                    <button class="detail-modal-close" onclick="closeDetailModal(event)">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="detail-modal-body">
                    <!-- Photo container -->
                    <div class="detail-img-container">
                        <img id="detailImage" class="detail-img" src="" alt="Evidencia">
                    </div>

                    <!-- Date & Badges row -->
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                        <span id="detailDate" style="font-size: 12px; font-weight: 700; color: var(--text-tertiary);"></span>
                        <div class="tiktok-badges-row">
                            <span id="detailBadgeEstado" class="tiktok-badge">
                                <span id="detailBadgeEmoji" class="badge-emoji"></span>
                                <span id="detailBadgeEstadoText"></span>
                            </span>
                            <span class="tiktok-badge badge-especie">
                                <span class="badge-emoji">🌳</span>
                                <span id="detailBadgeEspecie"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Description -->
                    <p id="detailDesc" class="detail-description"></p>

                    <!-- Warning recomendation -->
                    <div id="detailAlertBox" class="tiktok-alert-pill" style="display: none;">
                        <span class="tiktok-alert-icon">🚨</span>
                        <span class="tiktok-alert-text">
                            <strong>Recomendación:</strong> <span id="detailAlertText"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==================== CREATE REPORT STEP-MODAL ==================== -->
        @if($ownsTree)
            <div id="createModal" class="modal-overlay" onclick="closeCreateModal(event)">
                <div class="modal-container" onclick="event.stopPropagation()">
                    
                    <!-- Header -->
                    <div class="modal-form-header">
                        <h2 class="modal-form-title">Registrar Reporte Técnico</h2>
                        <button class="modal-form-close" onclick="closeCreateModal(event)">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <!-- Progress bar -->
                    <div class="modal-progress-container">
                        <div id="formProgressBar" class="modal-progress-bar"></div>
                    </div>

                    <!-- Form submission -->
                    <form id="reportForm" action="{{ route('reportes.store') }}" method="POST" enctype="multipart/form-data" style="display: contents;">
                        @csrf
                        <div class="modal-form-body">
                            
                            <!-- PASO 1: ÁRBOL (Pre-selected and hidden in this view) -->
                            <div class="modal-step active" id="step1">
                                <h3 class="step-title">Árbol Seleccionado</h3>
                                <p class="step-subtitle">Inspección de mantenimiento técnico para este ejemplar.</p>
                                
                                <div class="form-group">
                                    <label class="form-label">Ejemplar de Árbol</label>
                                    @php
                                        $currentTitular = $titulares->firstWhere('Arbol_Id', $arbol->Id);
                                    @endphp
                                    <input type="hidden" name="titular_id" value="{{ $currentTitular ? $currentTitular->Id : '' }}">
                                    <div class="form-select" style="display: flex; align-items: center; border-color: var(--google-blue); font-weight: 700;">
                                        🌳 {{ $arbol->Nombre }} ({{ $arbol->Especie ?? 'Especie' }})
                                    </div>
                                </div>
                            </div>

                            <!-- PASO 2: ESTADO GENERAL -->
                            <div class="modal-step" id="step2">
                                <h3 class="step-title">Estado de Salud</h3>
                                <p class="step-subtitle">Selecciona el estado fisiológico general del árbol en este momento.</p>
                                
                                <div class="health-options-list">
                                    <div class="health-card selected" onclick="selectHealthOption('Excelente', this)">
                                        <div class="health-card-left">
                                            <span class="health-card-emoji">❇️</span>
                                            <div class="health-card-details">
                                                <span class="health-card-title" style="color: var(--google-green);">Excelente</span>
                                                <span class="health-card-desc">Fisiología óptima, hidratado, sin plagas ni pliegues.</span>
                                            </div>
                                        </div>
                                        <div class="health-check-circle"></div>
                                    </div>

                                    <div class="health-card" onclick="selectHealthOption('Saludable', this)">
                                        <div class="health-card-left">
                                            <span class="health-card-emoji">💛</span>
                                            <div class="health-card-details">
                                                <span class="health-card-title" style="color: var(--google-yellow);">Saludable</span>
                                                <span class="health-card-desc">Estable. Hojas ligeramente secas o con observaciones menores.</span>
                                            </div>
                                        </div>
                                        <div class="health-check-circle"></div>
                                    </div>

                                    <div class="health-card" onclick="selectHealthOption('Atención Requerida', this)">
                                        <div class="health-card-left">
                                            <span class="health-card-emoji">🚨</span>
                                            <div class="health-card-details">
                                                <span class="health-card-title" style="color: var(--google-red);">Atención Requerida</span>
                                                <span class="health-card-desc">Urgente. Requiere riego abundante, poda o control de plagas.</span>
                                            </div>
                                        </div>
                                        <div class="health-check-circle"></div>
                                    </div>
                                </div>
                                <input type="hidden" name="estado" id="estado_input" value="Excelente">
                            </div>

                            <!-- PASO 3: DETALLES -->
                            <div class="modal-step" id="step3">
                                <h3 class="step-title">Observaciones Técnicas</h3>
                                <p class="step-subtitle">Bitácora ambiental detallada y recomendaciones técnicas preventivas.</p>
                                
                                <div class="form-group">
                                    <label class="form-label" for="descripcion">Notas de la Inspección</label>
                                    <textarea class="form-textarea" name="descripcion" id="descripcion" placeholder="Ej. El ejemplar se encuentra en óptimas condiciones, con un excelente follaje verde..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="atencion_requerida">Recomendación Preventiva (Opcional)</label>
                                    <textarea class="form-textarea" name="atencion_requerida" id="atencion_requerida" style="min-height: 70px;" placeholder="Ej. Aplicar fertilizante orgánico líquido en la raíz antes de la temporada de lluvia..."></textarea>
                                </div>
                            </div>

                            <!-- PASO 4: FOTO EVIDENCIA -->
                            <div class="modal-step" id="step4">
                                <h3 class="step-title">Fotografía de Evidencia</h3>
                                <p class="step-subtitle">Sube una fotografía nítida para el feed de bitácoras del bosque.</p>
                                
                                <div class="form-group">
                                    <div class="photo-uploader-box" id="uploaderBox" onclick="triggerFileInput()">
                                        <span class="uploader-icon">📸</span>
                                        <span class="uploader-text">Subir Evidencia Fotográfica</span>
                                        <span class="uploader-desc">Archivos JPG, JPEG o PNG (Máx. 15MB)</span>
                                    </div>

                                    <div class="photo-preview-container" id="previewContainer">
                                        <img src="" alt="Previsualización" class="photo-preview-image" id="previewImg">
                                        <button type="button" class="remove-preview-btn" onclick="removeSelectedPhoto(event)">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <input type="file" name="foto" id="foto_file_input" accept="image/*" style="display: none;" onchange="handleFileSelected(this)">
                                    <input type="hidden" name="foto_base64" id="foto_base64_input">
                                </div>
                            </div>

                        </div>

                        <!-- Bottom navigation actions -->
                        <div class="modal-form-footer">
                            <button type="button" class="modal-btn-cancel" id="btnPrev" onclick="prevStep()">Cancelar</button>
                            <button type="button" class="modal-btn-next" id="btnNext" onclick="nextStep()">Siguiente</button>
                            <button type="button" class="modal-btn-submit" id="btnSubmit" onclick="submitForm()">Registrar Reporte</button>
                        </div>
                    </form>

                </div>
            </div>
        @endif

    </div>

    <!-- ==================== JAVASCRIPT LOGIC ==================== -->
    <script>
        // Interactive Detail Modal logic
        function openDetailModal(reporte) {
            document.getElementById('detailImage').src = reporte.foto || 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"><rect width="100%" height="100%" fill="%23c8e6c9"/><text x="50%" y="55%" font-size="28" text-anchor="middle">🌳</text></svg>';
            document.getElementById('detailDate').textContent = 'INSPECCIÓN: ' + reporte.fecha.toUpperCase();
            document.getElementById('detailDesc').textContent = reporte.descripcion;
            document.getElementById('detailBadgeEspecie').textContent = reporte.especie;
            
            // Health Badge State configuration
            const badge = document.getElementById('detailBadgeEstado');
            const badgeEmoji = document.getElementById('detailBadgeEmoji');
            const badgeText = document.getElementById('detailBadgeEstadoText');
            const estadoLower = reporte.estado.toLowerCase();
            
            // Clean classes
            badge.className = 'tiktok-badge';
            
            if (estadoLower.includes('atención') || estadoLower.includes('alerta') || estadoLower.includes('requerida') || estadoLower.includes('enfermo')) {
                badge.classList.add('badge-estado-alerta');
                badgeEmoji.textContent = '🚨';
            } else if (estadoLower.includes('saludable') || estadoLower.includes('estable') || estadoLower.includes('bueno')) {
                badge.classList.add('badge-estado-saludable');
                badgeEmoji.textContent = '💛';
            } else {
                badge.classList.add('badge-estado-excelente');
                badgeEmoji.textContent = '❇️';
            }
            badgeText.textContent = reporte.estado;

            // Recommendations box
            const alertBox = document.getElementById('detailAlertBox');
            if (reporte.recomendacion && reporte.recomendacion.toLowerCase() !== 'ninguna') {
                document.getElementById('detailAlertText').textContent = reporte.recomendacion;
                alertBox.style.display = 'flex';
            } else {
                alertBox.style.display = 'none';
            }

            document.getElementById('detailModal').style.display = 'flex';
        }

        function closeDetailModal(e) {
            document.getElementById('detailModal').style.display = 'none';
        }

        // ==================== FORM STEP-MODAL JAVASCRIPT ====================
        let currentStep = 1;
        const totalSteps = 4;

        function openCreateModal() {
            currentStep = 1;
            updateStepView();
            document.getElementById('createModal').style.display = 'flex';
        }

        function closeCreateModal(e) {
            document.getElementById('createModal').style.display = 'none';
            resetForm();
        }

        function updateStepView() {
            // Hide all steps
            for (let i = 1; i <= totalSteps; i++) {
                document.getElementById('step' + i).classList.remove('active');
            }
            // Show active step
            document.getElementById('step' + currentStep).classList.add('active');

            // Progress bar mapping
            const progressPercentage = (currentStep / totalSteps) * 100;
            document.getElementById('formProgressBar').style.width = progressPercentage + '%';

            // Navigation buttons configuration
            const btnPrev = document.getElementById('btnPrev');
            const btnNext = document.getElementById('btnNext');
            const btnSubmit = document.getElementById('btnSubmit');

            if (currentStep === 1) {
                btnPrev.textContent = 'Cancelar';
                btnPrev.onclick = () => closeCreateModal();
            } else {
                btnPrev.textContent = 'Atrás';
                btnPrev.onclick = () => prevStep();
            }

            if (currentStep === totalSteps) {
                btnNext.style.display = 'none';
                btnSubmit.style.display = 'block';
            } else {
                btnNext.style.display = 'block';
                btnSubmit.style.display = 'none';
            }
        }

        function nextStep() {
            // Basic validation
            if (currentStep === 3) {
                const desc = document.getElementById('descripcion').value.trim();
                if (desc.length < 5) {
                    alert('Por favor ingresa una nota de inspección válida (mínimo 5 caracteres).');
                    return;
                }
            }

            if (currentStep < totalSteps) {
                currentStep++;
                updateStepView();
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateStepView();
            }
        }

        function selectHealthOption(optionValue, element) {
            // Update selected class
            const cards = document.querySelectorAll('.health-card');
            cards.forEach(card => card.classList.remove('selected'));
            element.classList.add('selected');

            // Set input value
            document.getElementById('estado_input').value = optionValue;
        }

        // Photo uploading handles
        function triggerFileInput() {
            document.getElementById('foto_file_input').click();
        }

        function handleFileSelected(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Max file limit validation
                if (file.size > 15 * 1024 * 1024) {
                    alert('El archivo es demasiado grande. El límite es de 15MB.');
                    input.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update preview source
                    document.getElementById('previewImg').src = e.target.result;
                    
                    // Show preview and hide box
                    document.getElementById('uploaderBox').style.display = 'none';
                    document.getElementById('previewContainer').style.display = 'block';

                    // Save as base64 backup for large file streams
                    document.getElementById('foto_base64_input').value = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        function removeSelectedPhoto(e) {
            e.stopPropagation();
            document.getElementById('foto_file_input').value = '';
            document.getElementById('foto_base64_input').value = '';
            document.getElementById('previewImg').src = '';
            document.getElementById('uploaderBox').style.display = 'flex';
            document.getElementById('previewContainer').style.display = 'none';
        }

        function resetForm() {
            document.getElementById('reportForm').reset();
            removeSelectedPhoto({ stopPropagation: () => {} });
            
            // Health options reset to default Excellent card
            const cards = document.querySelectorAll('.health-card');
            cards.forEach(c => c.classList.remove('selected'));
            cards[0].classList.add('selected');
            document.getElementById('estado_input').value = 'Excelente';
        }

        function submitForm() {
            const base64 = document.getElementById('foto_base64_input').value;
            const file = document.getElementById('foto_file_input').value;
            
            if (!base64 && !file) {
                alert('La fotografía de evidencia es obligatoria para registrar el reporte.');
                return;
            }

            document.getElementById('reportForm').submit();
        }

        // Toggle user profile dropdown menu
        function toggleUserDropdown(event) {
            if (event) event.stopPropagation();
            const dropdown = document.getElementById('user-dropdown');
            if (dropdown) {
                dropdown.classList.toggle('show-dropdown');
            }
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(event) {
            const dropdown = document.getElementById('user-dropdown');
            if (dropdown && dropdown.classList.contains('show-dropdown')) {
                const trigger = document.querySelector('.profile-menu-trigger');
                if (!dropdown.contains(event.target) && !trigger.contains(event.target)) {
                    dropdown.classList.remove('show-dropdown');
                }
            }
        });
    </script>
</body>

</html>
