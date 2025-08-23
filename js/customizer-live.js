/**
 * CUSTOMIZER TEMPS RÉEL - ISABEL THEME
 * Permet de voir les modifications en temps réel sans rafraîchir la page
 */

(function($) {
    'use strict';

    console.log('🔍 Isabel Customizer Live Preview - Initialisation...');

    // ========================================
    // DEBUG - IDENTIFICATION DES SÉLECTEURS
    // ========================================

    console.log('🔍 DEBUG: Recherche des sélecteurs CSS...');

    // Fonction pour tester les sélecteurs
    function testSelectors() {
        const selectors = [
            '.site-logo img',
            '.site-name',
            '.site-subtitle',
            '.hero-badge',
            '.hero-name',
            '.hero-title',
            '.hero-description',
            '.hero-cta .btn-cta',
            '.services-section h2',
            '.service-card:nth-child(1) h3',
            '.service-card:nth-child(1) p',
            '.testimonials-section h2',
            '.cta-section h2',
            '.footer-email',
            '.page-header h1',
            '.page-header .subtitle',
            // Ajout de sélecteurs alternatifs
            'h1',
            'h2',
            'h3',
            '.title',
            '.subtitle',
            '.description',
            '.content',
            '.main-title',
            '.main-subtitle',
            '.hero h1',
            '.hero h2',
            '.hero p',
            '.services h2',
            '.services h3',
            '.services p',
            '.footer p',
            '.footer a'
        ];

        console.log('📋 SÉLECTEURS TROUVÉS:');
        selectors.forEach(selector => {
            const elements = $(selector);
            if (elements.length > 0) {
                console.log(`✅ ${selector}: ${elements.length} élément(s)`);
                elements.each(function(index) {
                    const text = $(this).text().substring(0, 50);
                    console.log(`   - Élément ${index + 1}: "${text}..."`);
                });
            } else {
                console.log(`❌ ${selector}: Aucun élément trouvé`);
            }
        });
    }

    // Exécuter le test au chargement
    testSelectors();

    // ========================================
    // FONCTIONS UTILITAIRES
    // ========================================

    /**
     * Formater le texte avec support du gras markdown
     */
    function formatText(text) {
        if (!text) return '';
        
        // Convertir **texte** en <strong>texte</strong>
        text = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        
        // Convertir les retours à la ligne en <br>
        text = text.replace(/\n/g, '<br>');
        
        return text;
    }

    /**
     * Mettre à jour le contenu d'un élément
     */
    function updateElement(selector, value, format = false) {
        const element = $(selector);
        if (element.length) {
            console.log(`🔄 Mise à jour: ${selector} = "${value}"`);
            if (format) {
                element.html(formatText(value));
            } else {
                element.text(value);
            }
        } else {
            console.log(`❌ Élément non trouvé: ${selector}`);
        }
    }

    /**
     * Mettre à jour une image
     */
    function updateImage(selector, imageUrl) {
        const element = $(selector);
        if (element.length && imageUrl) {
            console.log(`🔄 Mise à jour image: ${selector} = "${imageUrl}"`);
            element.attr('src', imageUrl);
            element.show();
        } else if (element.length && !imageUrl) {
            element.hide();
        } else {
            console.log(`❌ Image non trouvée: ${selector}`);
        }
    }

    // ========================================
    // EN-TÊTE DU SITE
    // ========================================

    // Logo du site
    wp.customize('isabel_logo', function(value) {
        value.bind(function(newVal) {
            updateImage('.site-logo img', newVal);
        });
    });

    // Nom du site
    wp.customize('isabel_site_name', function(value) {
        value.bind(function(newVal) {
            updateElement('.site-name', newVal);
        });
    });

    // Sous-titre du site
    wp.customize('isabel_site_subtitle', function(value) {
        value.bind(function(newVal) {
            updateElement('.site-subtitle', newVal);
        });
    });

    // ========================================
    // SECTION D'ACCUEIL
    // ========================================

    // Badge
    wp.customize('isabel_badge', function(value) {
        value.bind(function(newVal) {
            updateElement('.hero-badge', newVal);
        });
    });

    // Nom
    wp.customize('isabel_name', function(value) {
        value.bind(function(newVal) {
            updateElement('.hero-name', newVal);
        });
    });

    // Titre principal
    wp.customize('isabel_main_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.hero-title', newVal, true);
        });
    });

    // Présentation
    wp.customize('isabel_presentation', function(value) {
        value.bind(function(newVal) {
            updateElement('.hero-description', newVal, true);
        });
    });

    // Texte du bouton
    wp.customize('isabel_button_text', function(value) {
        value.bind(function(newVal) {
            updateElement('.hero-cta .btn-cta', newVal);
        });
    });

    // ========================================
    // SERVICES
    // ========================================

    // Titre de la section services
    wp.customize('isabel_services_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.services-section h2', newVal);
        });
    });

    // Service 1
    wp.customize('isabel_service1_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.service-card:nth-child(1) h3', newVal);
        });
    });

    wp.customize('isabel_service1_description', function(value) {
        value.bind(function(newVal) {
            updateElement('.service-card:nth-child(1) p', newVal, true);
        });
    });

    // Service 2
    wp.customize('isabel_service2_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.service-card:nth-child(2) h3', newVal);
        });
    });

    wp.customize('isabel_service2_description', function(value) {
        value.bind(function(newVal) {
            updateElement('.service-card:nth-child(2) p', newVal, true);
        });
    });

    // Service 3
    wp.customize('isabel_service3_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.service-card:nth-child(3) h3', newVal);
        });
    });

    wp.customize('isabel_service3_description', function(value) {
        value.bind(function(newVal) {
            updateElement('.service-card:nth-child(3) p', newVal, true);
        });
    });

    // Service 4
    wp.customize('isabel_service4_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.service-card:nth-child(4) h3', newVal);
        });
    });

    wp.customize('isabel_service4_description', function(value) {
        value.bind(function(newVal) {
            updateElement('.service-card:nth-child(4) p', newVal, true);
        });
    });

    // ========================================
    // TÉMOIGNAGES
    // ========================================

    wp.customize('isabel_testimonials_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.testimonials-section h2', newVal);
        });
    });

    wp.customize('isabel_testimonials_description', function(value) {
        value.bind(function(newVal) {
            updateElement('.testimonials-section p', newVal, true);
        });
    });

    // ========================================
    // APPEL À L'ACTION
    // ========================================

    wp.customize('isabel_cta_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.cta-section h2', newVal);
        });
    });

    wp.customize('isabel_cta_text', function(value) {
        value.bind(function(newVal) {
            updateElement('.cta-section p', newVal, true);
        });
    });

    wp.customize('isabel_cta_button', function(value) {
        value.bind(function(newVal) {
            updateElement('.cta-section .btn-cta', newVal);
        });
    });

    // ========================================
    // PIED DE PAGE
    // ========================================

    wp.customize('isabel_footer_email', function(value) {
        value.bind(function(newVal) {
            updateElement('.footer-email', newVal);
        });
    });

    wp.customize('isabel_footer_phone', function(value) {
        value.bind(function(newVal) {
            updateElement('.footer-phone', newVal);
        });
    });

    wp.customize('isabel_footer_text', function(value) {
        value.bind(function(newVal) {
            updateElement('.footer-text', newVal, true);
        });
    });

    // ========================================
    // PAGES DE SERVICE - VAE
    // ========================================

    wp.customize('isabel_vae_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.page-header h1', newVal);
        });
    });

    wp.customize('isabel_vae_subtitle', function(value) {
        value.bind(function(newVal) {
            updateElement('.page-header .subtitle', newVal, true);
        });
    });

    wp.customize('isabel_vae_section1_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.content-section:first h2', newVal);
        });
    });

    wp.customize('isabel_vae_intro', function(value) {
        value.bind(function(newVal) {
            updateElement('.content-section:first p:first', newVal, true);
        });
    });

    wp.customize('isabel_vae_description', function(value) {
        value.bind(function(newVal) {
            updateElement('.content-section:first p:last', newVal, true);
        });
    });

    // ========================================
    // PAGES DE SERVICE - COACHING
    // ========================================

    wp.customize('isabel_coaching_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.page-header h1', newVal);
        });
    });

    wp.customize('isabel_coaching_subtitle', function(value) {
        value.bind(function(newVal) {
            updateElement('.page-header .subtitle', newVal, true);
        });
    });

    // ========================================
    // PAGES DE SERVICE - CONSULTATION
    // ========================================

    wp.customize('isabel_consultation_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.page-header h1', newVal);
        });
    });

    wp.customize('isabel_consultation_subtitle', function(value) {
        value.bind(function(newVal) {
            updateElement('.page-header .subtitle', newVal, true);
        });
    });

    // ========================================
    // PAGES DE SERVICE - HYPNO
    // ========================================

    wp.customize('isabel_hypno_title', function(value) {
        value.bind(function(newVal) {
            updateElement('.page-header h1', newVal);
        });
    });

    wp.customize('isabel_hypno_subtitle', function(value) {
        value.bind(function(newVal) {
            updateElement('.page-header .subtitle', newVal, true);
        });
    });

    // ========================================
    // COULEURS
    // ========================================

    wp.customize('isabel_primary_color', function(value) {
        value.bind(function(newVal) {
            $(':root').css('--primary-color', newVal);
        });
    });

    wp.customize('isabel_secondary_color', function(value) {
        value.bind(function(newVal) {
            $(':root').css('--secondary-color', newVal);
        });
    });

    // ========================================
    // INITIALISATION
    // ========================================

    console.log('✅ Isabel Customizer Live Preview chargé');

    // Exposer les fonctions de test globalement
    window.isabelCustomizerDebug = {
        testSelectors: testSelectors,
        updateElement: updateElement,
        updateImage: updateImage
    };

})(jQuery);
