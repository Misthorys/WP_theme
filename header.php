<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr(isabel_get_option('isabel_intro_text', 'Isabel GONCALVES - Coach Certifiée & Hypnocoach. Transformez votre vie avec un accompagnement personnalisé en coaching, VAE et hypnocoaching.')); ?>">
    <meta name="keywords" content="coach, hypnocoaching, VAE, développement personnel, Isabel GONCALVES, coaching personnel, transformation">
    <meta name="author" content="<?php echo esc_attr(isabel_get_option('isabel_main_name', 'Isabel GONCALVES')); ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    <meta property="og:title" content="<?php echo esc_attr(isabel_get_option('isabel_main_name', 'Isabel GONCALVES')); ?> - <?php echo esc_attr(isabel_get_option('isabel_subtitle', 'Coach Certifiée & Hypnocoach')); ?>">
    <meta property="og:description" content="<?php echo esc_attr(isabel_get_option('isabel_intro_text', 'Transformez votre vie avec un accompagnement personnalisé en coaching, VAE et hypnocoaching.')); ?>">
    <?php 
    $profile_image = isabel_get_option('isabel_profile_image', '');
    if (!empty($profile_image)) {
        echo '<meta property="og:image" content="' . esc_url($profile_image) . '">';
    }
    ?>

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo esc_url(home_url('/')); ?>">
    <meta property="twitter:title" content="<?php echo esc_attr(isabel_get_option('isabel_main_name', 'Isabel GONCALVES')); ?> - <?php echo esc_attr(isabel_get_option('isabel_subtitle', 'Coach Certifiée & Hypnocoach')); ?>">
    <meta property="twitter:description" content="<?php echo esc_attr(isabel_get_option('isabel_intro_text', 'Transformez votre vie avec un accompagnement personnalisé en coaching, VAE et hypnocoaching.')); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><circle cx='50' cy='50' r='40' fill='%23e4a7f5'/><circle cx='50' cy='50' r='25' fill='%23c47dd9'/></svg>">
    
    <!-- Preconnect pour optimiser les performances -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Schema.org pour le SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "<?php echo esc_js(isabel_get_option('isabel_main_name', 'Isabel GONCALVES')); ?>",
        "jobTitle": "<?php echo esc_js(isabel_get_option('isabel_subtitle', 'Coach Certifiée & Hypnocoach')); ?>",
        "description": "<?php echo esc_js(isabel_get_option('isabel_intro_text', 'Accompagnement personnalisé pour votre transformation')); ?>",
        "url": "<?php echo esc_url(home_url('/')); ?>",
        <?php if (!empty($profile_image)) : ?>
        "image": "<?php echo esc_url($profile_image); ?>",
        <?php endif; ?>
        "telephone": "<?php echo esc_js(isabel_get_option('isabel_phone', '+33123456789')); ?>",
        "email": "<?php echo esc_js(isabel_get_option('isabel_email', 'contact@forma-coach.com')); ?>",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "FR"
        },
        "offers": [
            {
                "@type": "Service",
                "name": "<?php echo esc_js(isabel_get_option('isabel_service1_title', 'Coaching Personnel')); ?>",
                "description": "<?php echo esc_js(isabel_get_option('isabel_service1_desc', 'Accompagnement personnalisé pour développer votre potentiel')); ?>"
            },
            {
                "@type": "Service",
                "name": "<?php echo esc_js(isabel_get_option('isabel_service2_title', 'Accompagnement VAE')); ?>",
                "description": "<?php echo esc_js(isabel_get_option('isabel_service2_desc', 'Valorisez votre expérience professionnelle')); ?>"
            },
            {
                "@type": "Service",
                "name": "<?php echo esc_js(isabel_get_option('isabel_service3_title', 'Hypnocoaching')); ?>",
                "description": "<?php echo esc_js(isabel_get_option('isabel_service3_desc', 'Libérez-vous de vos blocages en profondeur')); ?>"
            }
        ],
        "sameAs": [
            "<?php echo esc_url(home_url('/')); ?>"
        ]
    }
    </script>
    
    <?php wp_head(); ?>
    
    <!-- CSS critique en ligne pour éviter le FOUC -->
    <style>
        /* CSS critique pour le chargement initial */
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
            background: #ffffff;
            color: #2d1b3d;
        }
        
        /* Éviter le flash de contenu non stylé */
        .header {
            opacity: 0;
            animation: fadeIn 0.3s ease-in-out 0.1s forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Loader simple pendant le chargement */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #e6d7ff, #ffd6f7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 99999;
            transition: opacity 0.5s ease;
        }
        
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(196, 125, 217, 0.3);
            border-top: 3px solid #c47dd9;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .loaded .loading-overlay {
            opacity: 0;
            pointer-events: none;
        }
        
        /* Styles pour le mode sans JavaScript */
        .no-js .modal-overlay {
            display: none !important;
        }
        
        .no-js .dragonfly {
            display: none !important;
        }

        /* STYLES POUR LE MODAL - CRITIQUE */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            padding: 20px;
            backdrop-filter: blur(5px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            max-width: 500px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            transform: translateY(20px);
            transition: transform 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-overlay.active .modal-content {
            transform: translateY(0);
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #999;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: #f0f0f0;
            color: #333;
        }

        .modal-title {
            margin: 0 0 0.5rem 0;
            font-size: 1.8rem;
            font-weight: 700;
            color: #2d1b3d;
        }

        .modal-subtitle {
            margin: 0 0 2rem 0;
            color: #666;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: #e4a7f5;
            box-shadow: 0 0 0 3px rgba(228, 167, 245, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-note {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            color: #666;
            margin: 1.5rem 0;
            border-left: 4px solid #e4a7f5;
        }

        .form-submit {
            width: 100%;
            background: linear-gradient(135deg, #e4a7f5, #c47dd9);
            color: white;
            border: none;
            padding: 16px 24px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(228, 167, 245, 0.4);
        }

        .form-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Responsive pour mobile */
        @media (max-width: 768px) {
            .modal-content {
                margin: 10px;
                padding: 1.5rem;
            }
            
            .modal-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <!-- Loader élégant -->
    <div class="loading-overlay" id="loading-overlay">
        <div style="text-align: center;">
            <div class="loading-spinner"></div>
            <p style="color: #c47dd9; font-weight: 600; margin-top: 1rem; font-size: 0.9rem;">
                Chargement...
            </p>
        </div>
    </div>

    <?php wp_body_open(); ?>
    
    <!-- Skip link pour l'accessibilité -->
    <a class="skip-link screen-reader-text" href="#main" style="position: absolute; left: -9999px; top: auto; width: 1px; height: 1px; overflow: hidden;">
        Aller au contenu principal
    </a>
    
    <div id="main">
    
    <!-- Script pour masquer le loader ET initialiser le modal -->
    <script>
        // Ajouter la classe 'no-js' par défaut, puis la retirer avec JS
        document.documentElement.classList.remove('no-js');
        
        // Masquer le loader une fois que le contenu est chargé
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
            setTimeout(function() {
                const loader = document.getElementById('loading-overlay');
                if (loader) {
                    loader.style.display = 'none';
                }
            }, 500);
        });
        
        // Fallback: masquer le loader après 3 secondes maximum
        setTimeout(function() {
            document.body.classList.add('loaded');
            const loader = document.getElementById('loading-overlay');
            if (loader) {
                loader.style.display = 'none';
            }
        }, 3000);

        // FONCTIONS MODAL - ESSENTIELLES
        window.openPopup = function() {
            const overlay = document.getElementById('modal-overlay');
            if (overlay) {
                overlay.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                setTimeout(function() {
                    overlay.classList.add('active');
                }, 10);
            }
        };

        window.closePopup = function() {
            const overlay = document.getElementById('modal-overlay');
            if (overlay) {
                overlay.classList.remove('active');
                document.body.style.overflow = '';
                setTimeout(function() {
                    overlay.style.display = 'none';
                }, 300);
            }
        };

        // Fermeture avec Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                window.closePopup();
            }
        });
        
        // Optimisation des performances: prefetch des ressources importantes
        if ('requestIdleCallback' in window) {
            requestIdleCallback(function() {
                // Preload des images importantes
                const profileImage = '<?php echo esc_js(isabel_get_option('isabel_profile_image', '')); ?>';
                if (profileImage) {
                    const img = new Image();
                    img.src = profileImage;
                }
            });
        }
        
        // Détection de la préférence pour les animations réduites
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            document.documentElement.style.setProperty('--animation-duration', '0.01ms');
        }
        
        console.log('🎨 Header Isabel GONCALVES - Modal ready !');
    </script>
    
    <!-- CSS pour le skip link -->
    <style>
        .skip-link:focus {
            position: absolute !important;
            left: 6px !important;
            top: 7px !important;
            width: auto !important;
            height: auto !important;
            overflow: visible !important;
            background: var(--rose-700, #c47dd9) !important;
            color: white !important;
            padding: 8px 16px !important;
            text-decoration: none !important;
            border-radius: 4px !important;
            z-index: 100000 !important;
            font-weight: 600 !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3) !important;
        }
        
        /* Support pour les navigateurs qui ne supportent pas les CSS custom properties */
        @supports not (color: var(--test)) {
            .skip-link:focus {
                background: #c47dd9 !important;
            }
        }
    </style>
</head>
</html>