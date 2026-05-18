<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrespoApp | Mi Dashboard Ecológico</title>
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

        /* Responsive Container Viewport (100% width, adapting edge-to-edge) */
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
                background-color: #0c0d0e; /* Cinematic dark background on desktop/tablet */
            }
            
            .mobile-container {
                max-width: 580px; /* Lock maximum width to 580px so it remains elegant and proportioned */
                border-left: 1px solid rgba(255, 255, 255, 0.08);
                border-right: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.5);
            }
        }

        /* Top Google-style Navigation Bar */
        .top-navbar {
            height: 64px;
            background-color: transparent !important;
            border-bottom: none !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .brand-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-box {
            background-color: #ffffff;
            padding: 6px 12px;
            border-radius: 12px; /* Caja redondeada */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .brand-logo {
            height: 22px;
            width: auto;
            max-width: 150px;
            object-fit: contain;
            display: block;
        }

        .brand-name {
            font-family: 'Google Sans', 'Plus Jakarta Sans', sans-serif;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.5px;
            color: var(--text-primary);
        }

        .brand-name span {
            color: #34a853;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar-circle {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            font-family: 'Google Sans', sans-serif;
            border: 1px solid rgba(255, 255, 255, 0.25) !important;
            backdrop-filter: blur(4px);
        }

        .btn-logout-icon {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.25) !important;
            background-color: rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            backdrop-filter: blur(4px);
        }

        .btn-logout-icon:hover {
            background-color: rgba(255, 255, 255, 0.3) !important;
            color: var(--google-red);
        }

        /* Feed container */
        .feed-content {
            flex: 1;
            padding: 16px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding-bottom: 90px;
            /* Space for FAB */
        }

        /* Dismissible Material Banner */
        .welcome-banner {
            background-color: var(--google-blue-bg);
            border-radius: var(--border-radius-lg);
            padding: 16px;
            border: 1px solid rgba(26, 115, 232, 0.12);
            position: relative;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .banner-icon {
            font-size: 24px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .banner-text-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding-right: 12px;
        }

        .banner-title {
            font-family: 'Google Sans', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: var(--google-blue);
        }

        .banner-body {
            font-size: 13px;
            color: #3c4043;
            line-height: 1.5;
        }

        .banner-close-btn {
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 20px;
            cursor: pointer;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background-color 0.2s ease;
            flex-shrink: 0;
        }

        .banner-close-btn:hover {
            background-color: rgba(60, 64, 67, 0.08);
            color: var(--text-primary);
        }

        /* Section Title */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 8px;
            padding: 0 4px;
        }

        .section-title {
            font-family: 'Google Sans', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .section-stats-badge {
            background-color: var(--bg-light);
            color: var(--text-secondary);
            font-size: 12px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 12px;
            border: 1px solid var(--border-light);
        }

        /* Beautiful Google Light Cards */
        .tree-card {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-card);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(60, 64, 67, 0.08);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
        }

        .tree-card:hover {
            box-shadow: 0 4px 12px rgba(60, 64, 67, 0.12);
            transform: translateY(-1px);
        }

        /* Image Section (Most Recent Report) */
        .image-container {
            width: 100%;
            height: 200px;
            position: relative;
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .report-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            color: #2e7d32;
            opacity: 0.85;
            text-align: center;
            padding: 20px;
        }

        .no-image-placeholder svg {
            width: 48px;
            height: 48px;
            fill: currentColor;
        }

        .no-image-placeholder span {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Status badge overlaying image */
        .status-chip {
            position: absolute;
            top: 12px;
            right: 12px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .status-chip.success {
            background-color: #e6f4ea;
            color: #137333;
            border: 1px solid rgba(30, 142, 62, 0.2);
        }

        .status-chip.warning {
            background-color: #fef7e0;
            color: #b06000;
            border: 1px solid rgba(249, 171, 0, 0.2);
        }

        .status-chip.danger {
            background-color: #fce8e6;
            color: #c5221f;
            border: 1px solid rgba(217, 48, 37, 0.2);
        }

        /* Content Section */
        .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .card-header-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .tree-title-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
        }

        .tree-name {
            font-family: 'Google Sans', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .title-code-pill {
            font-family: monospace;
            font-size: 11px;
            background-color: var(--bg-light);
            color: var(--text-secondary);
            padding: 2px 8px;
            border-radius: 6px;
            border: 1px solid var(--border-light);
            font-weight: 700;
        }

        .tree-specie {
            font-size: 12px;
            font-style: italic;
            color: var(--text-secondary);
        }

        .location-row {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: var(--text-secondary);
            margin-top: 2px;
        }

        .location-row svg {
            color: var(--text-tertiary);
            flex-shrink: 0;
        }

        /* Report Description Block */
        .report-section {
            background-color: var(--bg-light);
            border-radius: var(--border-radius-md);
            padding: 14px;
            border: 1px solid var(--border-card);
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
            color: var(--text-tertiary);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .report-desc {
            font-size: 13px;
            color: #3c4043;
            line-height: 1.5;
        }

        .alert-box {
            background-color: var(--google-yellow-bg);
            border: 1px solid rgba(249, 171, 0, 0.25);
            border-radius: var(--border-radius-sm);
            padding: 8px 12px;
            font-size: 12px;
            color: #663c00;
            display: flex;
            gap: 8px;
            align-items: flex-start;
            margin-top: 4px;
        }

        .alert-box svg {
            color: var(--google-yellow);
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* Metadata Details Grid */
        .specs-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            padding-top: 4px;
            border-top: 1px solid var(--border-card);
        }

        .spec-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .spec-label {
            font-size: 10px;
            color: var(--text-tertiary);
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .spec-value {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-primary);
        }

        /* Floating Action Button (FAB) */
        .fab-btn {
            position: absolute;
            bottom: 24px;
            right: 24px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background-color: var(--google-blue);
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 10px rgba(26, 115, 232, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 95;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fab-btn:hover {
            background-color: var(--google-blue-hover);
            transform: scale(1.05);
            box-shadow: 0 6px 14px rgba(26, 115, 232, 0.45);
        }

        .fab-btn:active {
            transform: scale(0.95);
        }

        .fab-btn svg {
            width: 24px;
            height: 24px;
            stroke: currentColor;
        }

        /* Google Material Modal Styles */
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(32, 33, 36, 0.6);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .modal-backdrop.open {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-content {
            width: 90%;
            max-width: 440px;
            background-color: var(--bg-surface);
            border-radius: var(--border-radius-lg);
            box-shadow: 0 24px 38px 3px rgba(0, 0, 0, 0.14), 0 9px 46px 8px rgba(0, 0, 0, 0.12);
            border: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            transform: translateY(20px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .modal-backdrop.open .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .modal-title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .modal-title {
            font-family: 'Google Sans', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .modal-close-btn {
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 24px;
            cursor: pointer;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s ease;
        }

        .modal-close-btn:hover {
            background-color: rgba(60, 64, 67, 0.08);
            color: var(--text-primary);
        }

        /* Step Progress indicators */
        .step-progress-bar {
            height: 4px;
            width: 100%;
            background-color: var(--border-light);
            border-radius: 2px;
            overflow: hidden;
            margin-top: 4px;
        }

        .step-progress-fill {
            height: 100%;
            width: 25%;
            background-color: var(--google-blue);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .step-header-text {
            font-size: 11px;
            font-weight: 700;
            color: var(--google-blue);
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .modal-body {
            padding: 24px;
            overflow-y: auto;
            max-height: 55vh;
        }

        /* Form Steps Wrapper */
        .form-step {
            display: flex;
            flex-direction: column;
            gap: 16px;
            animation: fade-slide 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes fade-slide {
            0% {
                opacity: 0;
                transform: translateX(10px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-select,
        .form-input,
        .form-textarea {
            width: 100%;
            padding: 10px 14px;
            border-radius: var(--border-radius-sm);
            border: 1px solid var(--border-light);
            font-size: 14px;
            background-color: var(--bg-surface);
            color: var(--text-primary);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-select:focus,
        .form-input:focus,
        .form-textarea:focus {
            border-color: var(--google-blue);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.15);
        }

        .form-textarea {
            resize: none;
        }

        /* Tree Selector Horizontal Scrollable Carousel */
        .tree-carousel-container {
            display: flex;
            gap: 16px;
            overflow-x: auto;
            padding: 8px 4px 16px 4px;
            scroll-snap-type: x mandatory;
            scrollbar-width: thin;
            scrollbar-color: var(--border-light) transparent;
            -webkit-overflow-scrolling: touch;
        }

        .tree-carousel-container::-webkit-scrollbar {
            height: 6px;
        }

        .tree-carousel-container::-webkit-scrollbar-track {
            background: transparent;
        }

        .tree-carousel-container::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .tree-carousel-card {
            flex: 0 0 160px;
            width: 160px;
            scroll-snap-align: start;
            cursor: pointer;
            border-radius: var(--border-radius-md);
            border: 2px solid var(--border-card);
            background-color: var(--bg-surface);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .tree-carousel-card:hover {
            transform: translateY(-2px);
            border-color: rgba(26, 115, 232, 0.4);
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .tree-carousel-card.selected {
            border-color: var(--google-blue);
            background-color: var(--google-blue-bg);
            box-shadow: 0 4px 12px rgba(26, 115, 232, 0.15);
        }

        .tree-card-img-wrapper {
            width: 100%;
            height: 110px;
            background: linear-gradient(135deg, #e8f0fe 0%, #e6f4ea 100%);
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid var(--border-card);
        }

        .tree-card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .tree-carousel-card:hover .tree-card-img-wrapper img {
            transform: scale(1.04);
        }

        .tree-card-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--google-green);
            background-color: var(--google-green-bg);
        }

        .tree-card-info {
            padding: 10px 12px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .tree-card-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .tree-card-details {
            font-size: 11px;
            color: var(--text-secondary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
        }

        .tree-card-check {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: var(--google-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            opacity: 0;
            transform: scale(0.7);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2;
        }

        .tree-carousel-card.selected .tree-card-check {
            opacity: 1;
            transform: scale(1);
        }

        /* Checkbox/Radio Button styled as premium health cards */
        .status-options-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 8px;
        }

        .status-option-card {
            position: relative;
            border: 2px solid var(--border-light);
            border-radius: var(--border-radius-md);
            padding: 14px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            background-color: var(--bg-surface);
        }

        .status-option-card:hover {
            border-color: var(--google-blue);
            background-color: var(--google-blue-bg);
        }

        .status-option-card input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .status-option-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .status-option-emoji {
            font-size: 24px;
        }

        .status-option-details {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .status-option-title {
            font-family: 'Google Sans', sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .status-option-subtitle {
            font-size: 11px;
            color: var(--text-secondary);
        }

        .status-option-check {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid var(--border-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: transparent;
            transition: all 0.2s ease;
        }

        /* Checkbox-button card selection styles */
        .status-option-card.selected {
            border-color: var(--google-blue);
            background-color: var(--google-blue-bg);
            box-shadow: 0 2px 6px rgba(26, 115, 232, 0.1);
        }

        .status-option-card.selected .status-option-check {
            border-color: var(--google-blue);
            background-color: var(--google-blue);
            color: #ffffff;
        }

        .status-option-card[data-state="Excelente"].selected {
            border-color: var(--google-green);
            background-color: var(--google-green-bg);
        }

        .status-option-card[data-state="Excelente"].selected .status-option-check {
            border-color: var(--google-green);
            background-color: var(--google-green);
        }

        .status-option-card[data-state="Saludable"].selected {
            border-color: var(--google-yellow);
            background-color: var(--google-yellow-bg);
        }

        .status-option-card[data-state="Saludable"].selected .status-option-check {
            border-color: var(--google-yellow);
            background-color: var(--google-yellow);
        }

        .status-option-card[data-state="Atención Requerida"].selected {
            border-color: var(--google-red);
            background-color: var(--google-red-bg);
        }

        .status-option-card[data-state="Atención Requerida"].selected .status-option-check {
            border-color: var(--google-red);
            background-color: var(--google-red);
        }

        /* Validation warning styling */
        .validation-warning-hint {
            font-size: 11px;
            color: var(--google-red);
            font-weight: 500;
            display: none;
            margin-top: 4px;
        }

        /* File Upload Box */
        .file-upload-box {
            border: 2px dashed var(--border-light);
            border-radius: var(--border-radius-md);
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: var(--text-secondary);
            background-color: var(--bg-light);
        }

        .file-upload-box:hover {
            border-color: var(--google-blue);
            background-color: var(--google-blue-bg);
            color: var(--google-blue);
        }

        .file-upload-box svg {
            width: 32px;
            height: 32px;
        }

        .file-upload-box span {
            font-size: 13px;
            font-weight: 500;
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--bg-light);
        }

        .footer-buttons-right {
            display: flex;
            gap: 12px;
            margin-left: auto;
        }

        .btn-flat {
            background: none;
            border: none;
            color: var(--text-secondary);
            padding: 10px 18px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            border-radius: var(--border-radius-sm);
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .btn-flat:hover {
            background-color: rgba(60, 64, 67, 0.08);
            color: var(--text-primary);
        }

        .btn-raised {
            background-color: var(--google-blue);
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            border-radius: var(--border-radius-sm);
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.3);
            transition: background-color 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-raised:hover {
            background-color: var(--google-blue-hover);
            box-shadow: 0 2px 6px rgba(26, 115, 232, 0.3);
        }

        .btn-raised:active {
            box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.3);
        }

        /* Error validation lists */
        .alert-error-list {
            background-color: var(--google-red-bg);
            border: 1px solid rgba(217, 48, 37, 0.2);
            color: var(--google-red);
            padding: 12px 18px;
            border-radius: var(--border-radius-md);
            font-size: 13px;
            margin-bottom: 16px;
            list-style-type: none;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        /* Bottom Floating / Footer spacing */
        .footer-logo {
            text-align: center;
            padding: 24px 0 32px 0;
            color: var(--text-tertiary);
            font-size: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .footer-logo span {
            font-weight: 700;
            color: var(--text-secondary);
        }

        /* TikTok vertical snap-scroll feed */
        .tiktok-feed {
            display: flex;
            flex-direction: column;
            height: 100vh !important;
            min-height: 100vh !important;
            overflow-y: scroll !important;
            scroll-snap-type: y mandatory;
            -webkit-overflow-scrolling: touch;
            background-color: #000000 !important;
            scrollbar-width: none;
            padding: 0 !important;
            margin: 0 !important;
            gap: 0 !important;
            position: relative;
        }
        
        .tiktok-feed::-webkit-scrollbar {
            display: none;
        }

        .tiktok-card {
            scroll-snap-align: start;
            scroll-snap-stop: always;
            height: 100vh !important;
            min-height: 100vh !important;
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            overflow: hidden;
            background-color: #000000;
        }

        .tiktok-media {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.85;
            z-index: 1;
        }

        .tiktok-media-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #111e25 0%, #070d10 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 1;
            gap: 12px;
        }

        .placeholder-icon {
            font-size: 64px;
            animation: bounce-logo 4s infinite ease-in-out;
        }

        .placeholder-text {
            color: rgba(255, 255, 255, 0.4);
            font-size: 13px;
            font-family: 'Google Sans', sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 500;
        }

        .tiktok-gradient-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 15%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%);
            z-index: 2;
            pointer-events: none;
        }

        .tiktok-gradient-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0) 100%);
            z-index: 2;
            pointer-events: none;
        }

        /* Right Floating Chips */
        .tiktok-right-actions {
            position: absolute;
            right: 14px;
            bottom: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
            z-index: 4;
        }

        .tiktok-action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .tiktok-icon-circle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
            transition: transform 0.2s;
            cursor: pointer;
            backdrop-filter: blur(8px);
        }

        .tiktok-icon-circle:active {
            transform: scale(0.9);
        }

        .tiktok-icon-label {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 600;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);
            max-width: 68px;
            text-align: center;
        }

        .truncate-label {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Bottom Content Group */
        .tiktok-overlay-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px 80px 24px 18px;
            z-index: 3;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            gap: 8px;
            pointer-events: auto;
        }

        .tiktok-user-row {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tiktok-avatar-circle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background-color: var(--google-blue);
            color: #ffffff;
            font-weight: 700;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .tiktok-username {
            font-size: 14px;
            font-weight: 700;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.8);
        }

        .tiktok-date {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.65);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.8);
        }

        .tiktok-tree-title {
            font-family: 'Google Sans', sans-serif;
            font-size: 18px;
            font-weight: 700;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            gap: 8px;
            color: #ffffff;
        }

        .tiktok-tree-code {
            font-size: 11px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            padding: 1px 6px;
            border-radius: 8px;
            font-weight: 700;
            backdrop-filter: blur(4px);
        }

        .tiktok-description {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.45;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.8);
            margin: 2px 0;
            max-height: 72px;
            overflow-y: auto;
            scrollbar-width: none;
        }
        
        .tiktok-description::-webkit-scrollbar {
            display: none;
        }

        .tiktok-meta-row {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 2px;
        }

        .tiktok-meta-pill {
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            backdrop-filter: blur(4px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .tiktok-meta-pill.bg-blue {
            background-color: rgba(26, 115, 232, 0.25);
            color: #b3d7ff;
            border: 1px solid rgba(26, 115, 232, 0.35);
        }

        .tiktok-meta-pill.bg-green {
            background-color: rgba(30, 142, 62, 0.25);
            color: #c2eedc;
            border: 1px solid rgba(30, 142, 62, 0.35);
        }

        .tiktok-alert-pill {
            margin-top: 4px;
            background-color: rgba(217, 48, 37, 0.25);
            border: 1px solid rgba(217, 48, 37, 0.35);
            border-radius: var(--border-radius-sm);
            padding: 8px 12px;
            display: flex;
            align-items: flex-start;
            gap: 6px;
            backdrop-filter: blur(4px);
        }

        .tiktok-alert-icon {
            font-size: 14px;
            flex-shrink: 0;
        }

        .tiktok-alert-text {
            font-size: 11px;
            color: #ffcdd2;
            line-height: 1.35;
        }

        .tiktok-empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
            padding: 40px;
        }

        /* Adjustments for the Floating Action Button above the Tiktok content */
        .fab-btn {
            position: absolute !important;
            bottom: 20px !important;
            right: 20px !important;
            z-index: 10 !important;
            box-shadow: 0 4px 15px rgba(26, 115, 232, 0.4) !important;
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

        .dropdown-role {
            font-size: 11px;
            color: #5f6368;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
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
            color: var(--google-red);
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.15s ease;
            text-align: left;
            font-family: 'Google Sans', sans-serif;
        }

        .dropdown-btn:hover {
            background-color: var(--google-red-bg);
        }

        .dropdown-btn svg {
            flex-shrink: 0;
        }

        /* Badges Row underneath the user/tree name */
        .tiktok-badges-row {
            display: flex;
            gap: 6px;
            margin-top: 6px;
            margin-bottom: 8px;
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
            backdrop-filter: blur(4px);
            border: 1.2px solid rgba(255, 255, 255, 0.25);
            color: #ffffff;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease;
        }

        .tiktok-badge:hover {
            transform: scale(1.02);
        }

        .badge-estado-excelente {
            background-color: rgba(52, 168, 83, 0.3) !important;
            border-color: rgba(129, 199, 132, 0.4) !important;
            color: #ffffff !important;
        }

        .badge-estado-saludable {
            background-color: rgba(249, 171, 0, 0.3) !important;
            border-color: rgba(255, 241, 118, 0.4) !important;
            color: #ffffff !important;
        }

        .badge-estado-alerta {
            background-color: rgba(217, 48, 37, 0.3) !important;
            border-color: rgba(229, 115, 115, 0.4) !important;
            color: #ffffff !important;
        }

        .badge-especie {
            background-color: rgba(255, 255, 255, 0.15) !important;
            border-color: rgba(255, 255, 255, 0.25) !important;
            color: #ffffff !important;
        }

        .badge-emoji {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 4px;
        }
    </style>
</head>

<body>

    <!-- Responsive centered mobile column container -->
    <div class="mobile-container">

        <!-- Top Google-style Navigation Bar -->
        <header class="top-navbar">
            <div class="brand-group">
                @if(request()->query('arbol_id') && $reportes->first())
                    <a href="{{ route('arbol.profile', request()->query('arbol_id')) }}" style="text-decoration: none; color: var(--text-primary); display: flex; align-items: center; gap: 8px;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--google-green);">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        <span class="brand-name" style="font-size: 16px; font-weight: 700; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $reportes->first()->titular->arbol->Nombre }}</span>
                    </a>
                @else
                    <div class="logo-box">
                        <img src="{{ asset('crespo-logo.png') }}" alt="Crespo Logo" class="brand-logo">
                    </div>
                @endif
            </div>

            <div class="user-menu" style="position: relative;">
                <!-- User initials badge or profile picture (clickable toggle) -->
                <div class="avatar-circle" style="cursor: pointer; padding: 0; overflow: hidden; border: 1.5px solid rgba(255, 255, 255, 0.85); display: flex; align-items: center; justify-content: center;" onclick="toggleUserDropdown(event)" title="{{ str_ireplace([' (titular)', ' titular'], '', $user->Nombre) }}">
                    @if($user->Foto)
                        <img src="data:image/jpeg;base64,{{ base64_encode($user->Foto) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                    @else
                        {{ strtoupper(substr(str_ireplace([' (titular)', ' titular'], '', $user->Nombre), 0, 1)) }}
                    @endif
                </div>

                <!-- Google Material style dropdown menu -->
                <div class="user-dropdown" id="user-dropdown">
                    <div class="dropdown-header-info" style="padding-bottom: 4px;">
                        <div class="dropdown-name">{{ str_ireplace([' (titular)', ' titular'], '', $user->Nombre) }}</div>
                    </div>
                    <div class="dropdown-divider"></div>
                    
                    <a href="{{ route('perfil.edit') }}" class="dropdown-btn" title="Mi Perfil" style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 10px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>Mi Perfil</span>
                    </a>
                    
                    <div class="dropdown-divider" style="margin: 4px 0;"></div>
                    
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0; width: 100%;">
                        @csrf
                        <button type="submit" class="dropdown-btn" title="Cerrar Sesión">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>Cerrar Sesión</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Main Feed list of tree cards -->
        <main class="feed-content tiktok-feed">

            <!-- Toast Success Message -->
            @if(session('success'))
                <div
                    style="position: absolute; top: 12px; left: 12px; right: 12px; z-index: 10; background: var(--google-green-bg); border: 1px solid rgba(30, 142, 62, 0.2); color: var(--google-green); padding: 12px 18px; border-radius: var(--border-radius-md); font-size: 13px; display: flex; align-items: center; gap: 10px; animation: slide-down 0.4s ease-out; box-shadow: var(--shadow-sm);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Validation Errors List -->
            @if($errors->any())
                <ul class="alert-error-list" style="position: absolute; top: 12px; left: 12px; right: 12px; z-index: 10; box-shadow: var(--shadow-sm);">
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @forelse($reportes as $reporte)
                @if($reporte->titular && $reporte->titular->arbol)
                    @php
                        $arbolDePost = $reporte->titular->arbol;
                        // Fetch the latest report of this specific tree that has an evidence photo
                        $ultimoReporteConFoto = $arbolDePost->titulares
                            ->flatMap(function($t) { return $t->reportes; })
                            ->filter(function($r) { return !empty($r->Foto_Evidencia); })
                            ->sortByDesc('Creado_El')
                            ->first();
                        
                        $fotoPerfilBase64 = $ultimoReporteConFoto 
                            ? 'data:image/jpeg;base64,' . base64_encode($ultimoReporteConFoto->Foto_Evidencia) 
                            : null;
                    @endphp
                    <article class="tiktok-card" id="report-card-{{ $reporte->Id }}">
                        
                        <!-- Media Background Image -->
                        @if($reporte->Foto_Evidencia)
                            <img class="tiktok-media"
                                src="data:image/jpeg;base64,{{ base64_encode($reporte->Foto_Evidencia) }}"
                                alt="Evidencia de {{ $arbolDePost->Nombre }}">
                        @else
                            <!-- Exquisite elegant gradient placeholder for posts without a picture -->
                            <div class="tiktok-media-placeholder">
                                <div class="placeholder-icon">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.85;">
                                        <path d="M12 22v-8"></path>
                                        <path d="M9 12H4.5a2.5 2.5 0 0 1 0-5C6 7 7 6 8 4.5a2.5 2.5 0 0 1 4.9-.6 2.5 2.5 0 0 1 4.9.6c1 1.5 2 2.5 3.5 2.5a2.5 2.5 0 0 1 0 5H15"></path>
                                    </svg>
                                </div>
                                <span class="placeholder-text">Evidencia Ecológica</span>
                            </div>
                        @endif

                        <!-- Top dark gradient overlay for visual contrast -->
                        <div class="tiktok-gradient-top"></div>
                        <!-- Bottom dark gradient overlay to guarantee text legibility -->
                        <div class="tiktok-gradient-overlay"></div>



                        <!-- Content Overlay at the bottom -->
                        <div class="tiktok-overlay-content">
                            
                            <!-- User Account Row -->
                            <div class="tiktok-user-row">
                                <div class="tiktok-avatar-circle" style="padding: 0; overflow: hidden; border: 1.5px solid rgba(255, 255, 255, 0.85); flex-shrink: 0; display: flex; align-items: center; justify-content: center; background-color: rgba(255, 255, 255, 0.2);">
                                    @if($fotoPerfilBase64)
                                        <img src="{{ $fotoPerfilBase64 }}" alt="Perfil {{ $arbolDePost->Nombre }}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                                    @else
                                        {{ strtoupper(substr($arbolDePost->Nombre ?? 'A', 0, 1)) }}
                                    @endif
                                </div>
                                <a href="{{ route('arbol.profile', $arbolDePost->Id) }}" style="text-decoration: none; color: inherit; display: inline-flex; align-items: center;">
                                    <span class="tiktok-username">{{ $arbolDePost->Nombre ?? 'Árbol' }}</span>
                                </a>
                                <span class="tiktok-date">• {{ $reporte->Creado_El ? \Carbon\Carbon::parse($reporte->Creado_El)->diffForHumans(null, true, true) : 'ahora' }}</span>
                            </div>

                            <!-- Technical inspection notes (Description) -->
                            <p class="tiktok-description">{{ $reporte->Descripcion }}</p>

                            <!-- Badges Row (Health & Species) -->
                            <div class="tiktok-badges-row">
                                @php
                                    $estadoLower = strtolower($reporte->Estado);
                                    $badgeClass = 'badge-estado-excelente';
                                    $iconSvg = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 3.58 1 9.8a7 7 0 0 1-9 8.2z"></path><path d="M9 22v-4"></path></svg>';
                                    if (str_contains($estadoLower, 'atención') || str_contains($estadoLower, 'alerta') || str_contains($estadoLower, 'requerida') || str_contains($estadoLower, 'enfermo')) {
                                        $badgeClass = 'badge-estado-alerta';
                                        $iconSvg = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>';
                                    } elseif (str_contains($estadoLower, 'saludable') || str_contains($estadoLower, 'estable') || str_contains($estadoLower, 'bueno')) {
                                        $badgeClass = 'badge-estado-saludable';
                                        $iconSvg = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>';
                                    }
                                @endphp
                                <span class="tiktok-badge {{ $badgeClass }}">
                                    <span class="badge-emoji">{!! $iconSvg !!}</span>
                                    <span>{{ $reporte->Estado }}</span>
                                </span>

                                <span class="tiktok-badge badge-especie">
                                    <span class="badge-emoji">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 22v-8"></path>
                                            <path d="M9 12H4.5a2.5 2.5 0 0 1 0-5C6 7 7 6 8 4.5a2.5 2.5 0 0 1 4.9-.6 2.5 2.5 0 0 1 4.9.6c1 1.5 2 2.5 3.5 2.5a2.5 2.5 0 0 1 0 5H15"></path>
                                        </svg>
                                    </span>
                                    <span>{{ $arbolDePost->Especie ?? 'Especie' }}</span>
                                </span>
                            </div>

                            <!-- Warning alert pill if attention is required -->
                            @if($reporte->Atencion_Requerida && strtolower($reporte->Atencion_Requerida) !== 'ninguna')
                                <div class="tiktok-alert-pill">
                                    <span class="tiktok-alert-icon">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: block;">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                        </svg>
                                    </span>
                                    <span class="tiktok-alert-text"><strong>Recomendación:</strong> {{ $reporte->Atencion_Requerida }}</span>
                                </div>
                            @endif

                        </div>

                    </article>
                @endif
            @empty
                <div class="tiktok-empty-state">
                    <div style="font-size: 48px; margin-bottom: 12px;">📭</div>
                    <h3 style="font-size: 16px; margin-bottom: 8px;">No hay publicaciones en el feed</h3>
                    <p style="font-size: 13px; color: var(--text-tertiary);">Sé el primero en registrar un reporte técnico de inspección utilizando el botón azul de abajo.</p>
                </div>
            @endforelse

        </main>

        <!-- Floating Action Button (FAB) -->
        <button class="fab-btn" onclick="openReportModal()" title="Registrar Nuevo Reporte"
            aria-label="Registrar Nuevo Reporte">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
        </button>
    </div>

    <!-- Google Material Modal Backdrop -->
    <div id="report-modal" class="modal-backdrop" onclick="handleBackdropClick(event)">
        <div class="modal-content">

            <header class="modal-header">
                <div class="modal-title-row">
                    <h3 class="modal-title">Nuevo Reporte Técnico</h3>
                    <button class="modal-close-btn" onclick="closeReportModal()" aria-label="Cerrar">&times;</button>
                </div>

                <!-- Google Steps Linear Progress indicator -->
                <div
                    style="display: flex; justify-content: space-between; align-items: center; width: 100%; margin-top: 4px;">
                    <span class="step-header-text" id="step-title-display">Paso 1 de 4: Identificación</span>
                </div>
                <div class="step-progress-bar">
                    <div class="step-progress-fill" id="step-progress-fill"></div>
                </div>
            </header>

            <form action="{{ route('reportes.store') }}" method="POST" enctype="multipart/form-data"
                id="report-multi-step-form">
                @csrf
                <div class="modal-body">

                    <!-- Form STEP 1: Identification of the tree -->
                    <div id="step-wrapper-1" class="form-step">
                        <div class="form-group">
                            <label class="form-label" style="margin-bottom: 4px;">Selecciona tu Árbol</label>
                            <span style="font-size: 12px; color: var(--text-secondary); margin-bottom: 12px; display: block; line-height: 1.4;">Elige el árbol del cual deseas registrar un nuevo reporte técnico de mantenimiento:</span>
                            
                            <!-- Carousel for selecting a tree -->
                            <div class="tree-carousel-container">
                                @foreach($titulares as $t)
                                    @if($t->arbol)
                                        @php
                                            $fotoUrl = null;
                                            if ($t->reporteMasReciente && $t->reporteMasReciente->Foto_Evidencia) {
                                                $fotoUrl = 'data:image/jpeg;base64,' . base64_encode($t->reporteMasReciente->Foto_Evidencia);
                                            }
                                        @endphp
                                        <div class="tree-carousel-card" data-id="{{ $t->Id }}" onclick="selectCarouselTree({{ $t->Id }})">
                                            <div class="tree-card-img-wrapper">
                                                @if($fotoUrl)
                                                    <img src="{{ $fotoUrl }}" alt="{{ $t->arbol->Nombre }}">
                                                @else
                                                    <!-- Default tree icon placeholder with Google green gradient -->
                                                    <div class="tree-card-placeholder">
                                                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M12 19V5m0 0L7 9m5-4l5 4"></path>
                                                            <path d="M12 2v20M17 5H7M19 9H5M21 13H3M12 17h6M12 17H6"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="tree-card-info">
                                                <span class="tree-card-name">{{ $t->arbol->Nombre }}</span>
                                                <span class="tree-card-details">{{ $t->arbol->Especie ?? 'Árbol Titular' }}</span>
                                            </div>
                                            
                                            <!-- Check selection badge -->
                                            <div class="tree-card-check">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            
                            <!-- Hidden input representing selection -->
                            <input type="hidden" name="titular_id" id="titular_id" required>
                            
                            <span class="validation-warning-hint" id="warning-titular_id" style="margin-top: 8px;">⚠️ Debes seleccionar un árbol de la lista deslizable.</span>
                        </div>
                    </div>

                    <!-- Form STEP 2: General health state styled as clickable check cards -->
                    <div id="step-wrapper-2" class="form-step" style="display: none;">
                        <label class="form-label">Estado General de Salud</label>

                        <div class="status-options-group">
                            <!-- Option 1: Excelente -->
                            <div class="status-option-card selected" data-state="Excelente"
                                onclick="selectHealthState('Excelente')">
                                <input type="radio" name="estado" id="state-excelente" value="Excelente" checked>
                                <div class="status-option-content">
                                    <span class="status-option-emoji">🟢</span>
                                    <div class="status-option-details">
                                        <span class="status-option-title">Excelente</span>
                                        <span class="status-option-subtitle">Hojas verdes, suelo hidratado,
                                            vigoroso.</span>
                                    </div>
                                </div>
                                <div class="status-option-check">✓</div>
                            </div>

                            <!-- Option 2: Saludable -->
                            <div class="status-option-card" data-state="Saludable"
                                onclick="selectHealthState('Saludable')">
                                <input type="radio" name="estado" id="state-saludable" value="Saludable">
                                <div class="status-option-content">
                                    <span class="status-option-emoji">🟡</span>
                                    <div class="status-option-details">
                                        <span class="status-option-title">Saludable</span>
                                        <span class="status-option-subtitle">Estable, con detalles menores
                                            observados.</span>
                                    </div>
                                </div>
                                <div class="status-option-check">✓</div>
                            </div>

                            <!-- Option 3: Atención Requerida -->
                            <div class="status-option-card" data-state="Atención Requerida"
                                onclick="selectHealthState('Atención Requerida')">
                                <input type="radio" name="estado" id="state-atencion" value="Atención Requerida">
                                <div class="status-option-content">
                                    <span class="status-option-emoji">🔴</span>
                                    <div class="status-option-details">
                                        <span class="status-option-title">Atención Requerida</span>
                                        <span class="status-option-subtitle">Seco, plagas o requiere intervención
                                            inmediata.</span>
                                    </div>
                                </div>
                                <div class="status-option-check">✓</div>
                            </div>
                        </div>
                    </div>

                    <!-- Form STEP 3: Description and attention recommendations -->
                    <div id="step-wrapper-3" class="form-step" style="display: none;">
                        <!-- Form Field: Descripcion -->
                        <div class="form-group">
                            <label class="form-label" for="descripcion">Descripción de Observaciones</label>
                            <textarea name="descripcion" id="descripcion" class="form-textarea" rows="3"
                                placeholder="Describe el follaje, la tierra, humedad o cambios..." required
                                oninput="hideValidationWarning('descripcion')"></textarea>
                            <span class="validation-warning-hint" id="warning-descripcion">⚠️ La descripción debe tener
                                al menos 5 caracteres.</span>
                        </div>

                        <!-- Form Field: Atencion Requerida -->
                        <div class="form-group">
                            <label class="form-label" for="atencion_requerida">Atención Requerida /
                                Recomendación</label>
                            <input type="text" name="atencion_requerida" id="atencion_requerida" class="form-input"
                                placeholder="Ej. Ninguna, aplicar fertilizante, etc.">
                        </div>
                    </div>

                    <!-- Form STEP 4: Photo evidence and uploading preview -->
                    <div id="step-wrapper-4" class="form-step" style="display: none;">
                        <div class="form-group">
                            <label class="form-label">Subir Foto de Evidencia</label>

                            <div class="file-upload-box"
                                onclick="document.getElementById('foto').click(); event.stopPropagation();"
                                id="upload-box">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="17 8 12 3 7 8"></polyline>
                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                </svg>
                                <span id="file-upload-text">Seleccionar imagen de galería...</span>
                            </div>
                            <input type="hidden" name="foto_base64" id="foto_base64">
                            <input type="file" id="foto" accept="image/*" style="display: none;"
                                onchange="handleFileSelect(this)" onclick="event.stopPropagation()">
                            <span class="validation-warning-hint" id="warning-foto">⚠️ Debes subir una fotografía de evidencia para registrar el reporte.</span>

                            <!-- Image Preview card -->
                            <div id="image-preview-container"
                                style="display: none; width: 100%; height: 140px; border-radius: 8px; overflow: hidden; border: 1px solid var(--border-light); margin-top: 8px; position: relative;">
                                <img id="image-preview" src="" style="width: 100%; height: 100%; object-fit: cover;">
                                <button type="button" onclick="removeImage(event)"
                                    style="position: absolute; top: 8px; right: 8px; width: 24px; height: 24px; border-radius: 50%; border: none; background: rgba(32,33,36,0.8); color: white; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 14px; box-shadow: 0 2px 4px rgba(0,0,0,0.2); font-weight: 700;">&times;</button>
                            </div>
                        </div>
                    </div>

                </div>

                <footer class="modal-footer">
                    <!-- Cancel / Back button -->
                    <button type="button" class="btn-flat" id="btn-modal-left"
                        onclick="handleLeftButton()">Cancelar</button>

                    <div class="footer-buttons-right">
                        <!-- Next / Submit button -->
                        <button type="button" class="btn-raised" id="btn-modal-right"
                            onclick="handleRightButton()">Siguiente</button>
                    </div>
                </footer>
            </form>

        </div>
    </div>

    <!-- Scripting for Banner, Modals, and Steps Flow -->
    <script>
        // Welcome Banner Dismissing
        document.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('crespo_banner_dismissed') === 'true') {
                const banner = document.getElementById('welcome-banner');
                if (banner) {
                    banner.style.display = 'none';
                }
            }
        });

        function dismissBanner() {
            const banner = document.getElementById('welcome-banner');
            if (banner) {
                banner.style.opacity = '0';
                banner.style.transform = 'translateY(-10px)';
                banner.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                setTimeout(() => {
                    banner.style.display = 'none';
                    localStorage.setItem('crespo_banner_dismissed', 'true');
                }, 300);
            }
        }

        // --- STEP WIZARD STATE MANAGER ---
        let currentStep = 1;
        const totalSteps = 4;
        const stepTitles = {
            1: "Paso 1 de 4: Identificación",
            2: "Paso 2 de 4: Estado de Salud",
            3: "Paso 3 de 4: Observaciones",
            4: "Paso 4 de 4: Evidencia"
        };

        function openReportModal() {
            const modal = document.getElementById('report-modal');
            modal.classList.add('open');
            document.body.style.overflow = 'hidden'; // Lock background scrolling
            goToStep(1); // Start always on Step 1
        }

        function closeReportModal() {
            const modal = document.getElementById('report-modal');
            modal.classList.remove('open');
            document.body.style.overflow = ''; // Unlock background scrolling
            resetForm();
        }

        function handleBackdropClick(event) {
            if (event.target === document.getElementById('report-modal')) {
                closeReportModal();
            }
        }

        // Navigate between steps with layout adaptations
        function goToStep(step) {
            // Hide all wrappers
            for (let i = 1; i <= totalSteps; i++) {
                document.getElementById(`step-wrapper-${i}`).style.display = 'none';
            }

            // Show target wrapper
            document.getElementById(`step-wrapper-${step}`).style.display = 'flex';
            currentStep = step;

            // Update Progress bar and title
            document.getElementById('step-title-display').innerText = stepTitles[step];
            document.getElementById('step-progress-fill').style.width = `${(step / totalSteps) * 100}%`;

            // Adjust navigation buttons based on current step
            const btnLeft = document.getElementById('btn-modal-left');
            const btnRight = document.getElementById('btn-modal-right');

            if (currentStep === 1) {
                btnLeft.innerText = "Cancelar";
                btnRight.innerText = "Siguiente";
                btnRight.type = "button";
            } else if (currentStep === 2) {
                btnLeft.innerText = "Atrás";
                btnRight.innerText = "Siguiente";
                btnRight.type = "button";
            } else if (currentStep === 3) {
                btnLeft.innerText = "Atrás";
                btnRight.innerText = "Siguiente";
                btnRight.type = "button";
            } else if (currentStep === 4) {
                btnLeft.innerText = "Atrás";
                btnRight.innerText = "Guardar Reporte";
                // Keep as button to prevent default browser auto-submissions when selecting files
                btnRight.type = "button";
            }
        }

        // Left Navigation button click handler
        function handleLeftButton() {
            if (currentStep === 1) {
                closeReportModal();
            } else {
                goToStep(currentStep - 1);
            }
        }

        // Right Navigation button click handler with strict validation
        function handleRightButton() {
            if (currentStep === 1) {
                // Validate tree selection
                const selectTree = document.getElementById('titular_id');
                if (!selectTree.value) {
                    showValidationWarning('titular_id');
                    return;
                }
                goToStep(2);
            } else if (currentStep === 2) {
                // Step 2 health state card has a default checked value, so we can just proceed.
                goToStep(3);
            } else if (currentStep === 3) {
                // Validate description min:5 length
                const descText = document.getElementById('descripcion');
                if (!descText.value || descText.value.trim().length < 5) {
                    showValidationWarning('descripcion');
                    return;
                }
                goToStep(4);
            } else if (currentStep === 4) {
                // Validate photo selection (must be mandatory)
                const fotoBase64 = document.getElementById('foto_base64');
                const fotoInput = document.getElementById('foto');
                if (!fotoBase64.value && (!fotoInput.files || fotoInput.files.length === 0)) {
                    showValidationWarning('foto');
                    return;
                }
                // On step 4, clicking next/submit will trigger form post submission
                document.getElementById('report-multi-step-form').submit();
            }
        }

        // Clickable Checkbox/Radio Health state toggle selection
        function selectHealthState(state) {
            // Remove selected class from all option cards and uncheck inputs
            const cards = document.querySelectorAll('.status-option-card');
            cards.forEach(c => {
                c.classList.remove('selected');
                const radio = c.querySelector('input[type="radio"]');
                if (radio) radio.checked = false;
            });

            // Find clicked card and check the inner input
            let targetCard;
            if (state === 'Excelente') {
                targetCard = document.querySelector('.status-option-card[data-state="Excelente"]');
                const radio = document.getElementById('state-excelente');
                if (radio) radio.checked = true;
            } else if (state === 'Saludable') {
                targetCard = document.querySelector('.status-option-card[data-state="Saludable"]');
                const radio = document.getElementById('state-saludable');
                if (radio) radio.checked = true;
            } else if (state === 'Atención Requerida') {
                targetCard = document.querySelector('.status-option-card[data-state="Atención Requerida"]');
                const radio = document.getElementById('state-atencion');
                if (radio) radio.checked = true;
            }
            if (targetCard) targetCard.classList.add('selected');
        }

        // Selection inside scrollable tree carousel
        function selectCarouselTree(titularId) {
            const input = document.getElementById('titular_id');
            if (input) input.value = titularId;

            // Remove selected class from all cards
            const cards = document.querySelectorAll('.tree-carousel-card');
            cards.forEach(c => c.classList.remove('selected'));

            // Add selected class to the active card
            const targetCard = document.querySelector(`.tree-carousel-card[data-id="${titularId}"]`);
            if (targetCard) {
                targetCard.classList.add('selected');
            }

            hideValidationWarning('titular_id');
        }

        // Custom validation warnings
        function showValidationWarning(field) {
            const hint = document.getElementById(`warning-${field}`);
            const input = document.getElementById(field);
            if (hint) hint.style.display = 'block';
            if (input && input.type !== 'hidden') {
                input.style.borderColor = 'var(--google-red)';
                input.focus();
            }
            if (field === 'titular_id') {
                const carousel = document.querySelector('.tree-carousel-container');
                if (carousel) {
                    carousel.style.border = '2px solid var(--google-red)';
                    carousel.style.borderRadius = '14px';
                }
            }
            if (field === 'foto') {
                const uploadBox = document.getElementById('upload-box');
                if (uploadBox) {
                    uploadBox.style.borderColor = 'var(--google-red)';
                    uploadBox.style.backgroundColor = 'var(--google-red-bg)';
                }
            }
        }

        function hideValidationWarning(field) {
            const hint = document.getElementById(`warning-${field}`);
            const input = document.getElementById(field);
            if (hint) hint.style.display = 'none';
            if (input && input.type !== 'hidden') {
                input.style.borderColor = 'var(--border-light)';
            }
            if (field === 'titular_id') {
                const carousel = document.querySelector('.tree-carousel-container');
                if (carousel) {
                    carousel.style.border = 'none';
                }
            }
            if (field === 'foto') {
                const uploadBox = document.getElementById('upload-box');
                if (uploadBox) {
                    uploadBox.style.borderColor = 'var(--border-light)';
                    uploadBox.style.backgroundColor = 'var(--bg-light)';
                }
            }
        }

        // Image upload handling
        function handleFileSelect(input) {
            const file = input.files[0];
            if (file) {
                hideValidationWarning('foto');
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Update preview immediately with the raw image so it feels snappy
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('image-preview-container').style.display = 'block';
                    document.getElementById('file-upload-text').innerText = file.name;
                    document.getElementById('upload-box').style.borderColor = 'var(--google-blue)';
                    document.getElementById('upload-box').style.backgroundColor = 'var(--google-blue-bg)';

                    // Now compress the image in the background using Canvas
                    const img = new Image();
                    img.src = e.target.result;
                    img.onload = function () {
                        const canvas = document.createElement('canvas');
                        let width = img.width;
                        let height = img.height;

                        // Maximum boundary for resolution: 1200px (looks extremely clear and fits in ~200-300kb)
                        const MAX_WIDTH = 1200;
                        const MAX_HEIGHT = 1200;

                        if (width > height) {
                            if (width > MAX_WIDTH) {
                                height *= MAX_WIDTH / width;
                                width = MAX_WIDTH;
                            }
                        } else {
                            if (height > MAX_HEIGHT) {
                                width *= MAX_HEIGHT / height;
                                height = MAX_HEIGHT;
                            }
                        }

                        canvas.width = width;
                        canvas.height = height;

                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, width, height);

                        // Export as JPEG with 75% quality
                        const compressedBase64 = canvas.toDataURL('image/jpeg', 0.75);
                        document.getElementById('foto_base64').value = compressedBase64;
                    };
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage(event) {
            if (event) event.preventDefault();
            document.getElementById('foto').value = '';
            document.getElementById('foto_base64').value = '';
            document.getElementById('image-preview').src = '';
            document.getElementById('image-preview-container').style.display = 'none';
            document.getElementById('file-upload-text').innerText = 'Seleccionar imagen de galería...';
            document.getElementById('upload-box').style.borderColor = 'var(--border-light)';
            document.getElementById('upload-box').style.backgroundColor = 'var(--bg-light)';
            hideValidationWarning('foto');
        }

        function resetForm() {
            const input = document.getElementById('titular_id');
            if (input) input.value = '';

            // Unselect all carousel cards
            const cards = document.querySelectorAll('.tree-carousel-card');
            cards.forEach(c => c.classList.remove('selected'));

            document.getElementById('descripcion').value = '';
            document.getElementById('atencion_requerida').value = '';
            document.getElementById('foto_base64').value = '';
            selectHealthState('Excelente'); // Reset health toggle cards to default
            removeImage(null);
            hideValidationWarning('titular_id');
            hideValidationWarning('descripcion');
            hideValidationWarning('foto');
            currentStep = 1;
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
                const avatar = document.querySelector('.avatar-circle');
                if (!dropdown.contains(event.target) && !avatar.contains(event.target)) {
                    dropdown.classList.remove('show-dropdown');
                }
            }
        });

        // Focus and center the specified report post card on page load
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const focusReportId = urlParams.get('focus_report_id');
            if (focusReportId) {
                setTimeout(function() {
                    const targetCard = document.getElementById('report-card-' + focusReportId);
                    if (targetCard) {
                        targetCard.scrollIntoView({ behavior: 'auto', block: 'center' });
                    }
                }, 150);
            }
        });
    </script>

</body>

</html>