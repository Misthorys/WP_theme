/**
 * Script principal pour le thème Isabel GONCALVES - VERSION COMPLÈTE CORRIGÉE
 * Gestion robuste avec fallbacks et vérifications
 */

(function() {
    'use strict';

    // Configuration
    const CONFIG = {
        DEBOUNCE_DELAY: 16,
        MESSAGE_DURATION: 4000,
        MODAL_CLOSE_DELAY: 300
    };

    // Vérifier la disponibilité d'isabel_ajax AU DÉBUT
    if (typeof isabel_ajax === 'undefined') {
        console.error('❌ isabel_ajax non défini - Création fallback');
        
        // Créer un fallback basique
        window.isabel_ajax = {
            ajax_url: window.location.origin + '/wp-admin/admin-ajax.php',
            nonce: 'fallback_nonce',
            debug: false
        };
        
        // Essayer de récupérer les vraies valeurs depuis le DOM si disponibles
        const scripts = document.querySelectorAll('script');
        scripts.forEach(script => {
            if (script.textContent.includes('isabel_ajax')) {
                try {
                    const match = script.textContent.match(/isabel_ajax\s*=\s*({[^}]+})/);
                    if (match) {
                        const parsed = JSON.parse(match[1]);
                        window.isabel_ajax = parsed;
                        console.log('✅ isabel_ajax récupéré depuis le DOM');
                    }
                } catch(e) {
                    console.warn('Erreur parsing isabel_ajax depuis DOM');
                }
            }
        });
    } else {
        console.log('✅ isabel_ajax disponible:', isabel_ajax);
    }

    // Utilitaires
    const utils = {
        debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },

        isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },

        saveFormDraft(formData) {
            try {
                sessionStorage.setItem('isabel_form_draft', JSON.stringify(formData));
            } catch (e) {
                console.log('SessionStorage non disponible');
            }
        },

        restoreFormDraft() {
            try {
                const savedData = sessionStorage.getItem('isabel_form_draft');
                return savedData ? JSON.parse(savedData) : null;
            } catch (e) {
                return null;
            }
        },

        clearFormDraft() {
            try {
                sessionStorage.removeItem('isabel_form_draft');
            } catch (e) {
                // Silently fail
            }
        }
    };

    // Attendre que le DOM soit chargé
    document.addEventListener('DOMContentLoaded', function() {
        console.log('🔧 Initialisation du thème Isabel...');
        
        initNavigation();
        initModal();
        initFormHandling();
        initSmoothScroll();
        initAccessibility();
        initScrollAnimations();
        initParallax();
        
        console.log('🎨 Thème Isabel GONCALVES initialisé !');
    });

    /**
     * Initialisation de la navigation mobile
     */
    function initNavigation() {
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.getElementById('nav-menu');

        if (!navToggle || !navMenu) return;

        const navLinks = navMenu.querySelectorAll('a');

        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            
            // Amélioration accessibilité
            const isOpen = navMenu.classList.contains('active');
            navToggle.setAttribute('aria-expanded', isOpen);
            navMenu.setAttribute('aria-hidden', !isOpen);
        });

        // Fermer le menu en cliquant sur un lien
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                if (navMenu.classList.contains('active')) {
                    navMenu.classList.remove('active');
                    navToggle.setAttribute('aria-expanded', 'false');
                    navMenu.setAttribute('aria-hidden', 'true');
                }
            });
        });

        // Fermer le menu en cliquant ailleurs
        document.addEventListener('click', function(e) {
            if (!navToggle.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.remove('active');
                navToggle.setAttribute('aria-expanded', 'false');
                navMenu.setAttribute('aria-hidden', 'true');
            }
        });

        // Gestion clavier
        navToggle.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                navToggle.click();
            }
        });
    }

    /**
     * Initialisation des modales avec accessibilité
     */
    function initModal() {
        const overlay = document.getElementById('modal-overlay');
        const closeButton = document.querySelector('.modal-close');
        
        if (!overlay) {
            console.warn('⚠️ Modal overlay non trouvé');
            return;
        }

        const focusableElements = overlay.querySelectorAll(
            'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        let lastFocusedElement = null;

        // Fonctions globales pour les boutons - CORRECTION: Vérifier si déjà définies
        if (typeof window.openPopup === 'undefined') {
            window.openPopup = function() {
                console.log('📝 Ouverture de la modal de contact');
                lastFocusedElement = document.activeElement;
                
                overlay.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                // Restaurer le brouillon si disponible
                const draft = utils.restoreFormDraft();
                if (draft) {
                    restoreFormFromDraft(draft);
                }
                
                setTimeout(() => {
                    overlay.classList.add('active');
                    // Focus sur le premier élément focusable
                    if (focusableElements.length > 0) {
                        focusableElements[0].focus();
                    }
                }, 10);
            };
        }

        if (typeof window.closePopup === 'undefined') {
            window.closePopup = function() {
                console.log('❌ Fermeture de la modal');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
                
                setTimeout(function() {
                    overlay.style.display = 'none';
                    
                    // Restaurer le focus
                    if (lastFocusedElement) {
                        lastFocusedElement.focus();
                    }
                }, CONFIG.MODAL_CLOSE_DELAY);
            };
        }

        // Fermeture en cliquant à côté
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                window.closePopup();
            }
        });

        // Fermeture avec Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && overlay.classList.contains('active')) {
                window.closePopup();
            }
        });

        // Gestion du focus dans la modal (trap focus)
        overlay.addEventListener('keydown', function(e) {
            if (e.key === 'Tab' && overlay.classList.contains('active')) {
                const firstElement = focusableElements[0];
                const lastElement = focusableElements[focusableElements.length - 1];

                if (e.shiftKey) {
                    if (document.activeElement === firstElement) {
                        e.preventDefault();
                        lastElement.focus();
                    }
                } else {
                    if (document.activeElement === lastElement) {
                        e.preventDefault();
                        firstElement.focus();
                    }
                }
            }
        });

        // Bouton de fermeture
        if (closeButton) {
            closeButton.addEventListener('click', window.closePopup);
        }
    }

    /**
     * Gestion du formulaire avec AJAX + sauvegarde brouillon - VERSION COMPLÈTE
     */
    function initFormHandling() {
        // NOUVELLE APPROCHE: Vérifier si handleFormSubmit est déjà défini dans le header
        if (typeof window.handleFormSubmit !== 'undefined') {
            console.log('✅ handleFormSubmit déjà défini dans header.php');
            return;
        }

        // Définir la fonction de soumission si pas encore définie
        window.handleFormSubmit = function(event) {
            event.preventDefault();
            console.log('📤 Soumission du formulaire commencée (depuis main.js)');
            
            const form = event.target;
            const submitButton = form.querySelector('.form-submit');
            const originalText = submitButton.textContent;
            
            // Vérifier que isabel_ajax est disponible
            if (typeof isabel_ajax === 'undefined') {
                console.error('❌ isabel_ajax non défini lors de la soumission');
                showMessage('Erreur de configuration. Veuillez recharger la page et réessayer.', 'error');
                return;
            }
            
            console.log('✅ isabel_ajax disponible:', isabel_ajax);
            
            // Récupération des données du formulaire
            const formFields = {
                name: form.querySelector('[name="name"]')?.value?.trim() || '',
                email: form.querySelector('[name="email"]')?.value?.trim() || '',
                phone: form.querySelector('[name="phone"]')?.value?.trim() || '',
                service: form.querySelector('[name="service"]')?.value?.trim() || '',
                message: form.querySelector('[name="message"]')?.value?.trim() || ''
            };
            
            console.log('📋 Données du formulaire:', formFields);
            
            // Validation basique côté client
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(function(field) {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#e74c3c';
                    field.style.boxShadow = '0 0 0 2px rgba(231, 76, 60, 0.2)';
                    field.setAttribute('aria-invalid', 'true');
                } else {
                    field.style.borderColor = '';
                    field.style.boxShadow = '';
                    field.setAttribute('aria-invalid', 'false');
                }
            });

            if (!isValid) {
                console.log('❌ Validation échouée - champs manquants');
                showMessage('Veuillez remplir tous les champs obligatoires.', 'error');
                const firstInvalid = form.querySelector('[aria-invalid="true"]');
                if (firstInvalid) firstInvalid.focus();
                return;
            }

            // Validation email
            if (!utils.isValidEmail(formFields.email)) {
                console.log('❌ Email invalide:', formFields.email);
                const emailField = form.querySelector('[name="email"]');
                emailField.style.borderColor = '#e74c3c';
                emailField.style.boxShadow = '0 0 0 2px rgba(231, 76, 60, 0.2)';
                emailField.setAttribute('aria-invalid', 'true');
                showMessage('Veuillez entrer une adresse email valide.', 'error');
                emailField.focus();
                return;
            }

            console.log('✅ Validation réussie');

            // État de chargement
            submitButton.disabled = true;
            submitButton.style.opacity = '0.7';
            submitButton.textContent = 'Envoi en cours...';
            submitButton.setAttribute('aria-busy', 'true');

            // Préparer les données pour l'envoi AJAX
            const ajaxData = new FormData();
            ajaxData.append('action', 'isabel_contact');
            ajaxData.append('nonce', isabel_ajax.nonce);
            ajaxData.append('name', formFields.name);
            ajaxData.append('email', formFields.email);
            ajaxData.append('phone', formFields.phone);
            ajaxData.append('service', formFields.service);
            ajaxData.append('message', formFields.message);

            console.log('🌐 Envoi AJAX vers:', isabel_ajax.ajax_url);
            console.log('🔑 Nonce utilisé:', isabel_ajax.nonce);

            // Envoi AJAX avec gestion d'erreur robuste
            fetch(isabel_ajax.ajax_url, {
                method: 'POST',
                body: ajaxData
            })
            .then(response => {
                console.log('📡 Réponse reçue, status:', response.status);
                if (!response.ok) {
                    throw new Error('Erreur réseau: ' + response.status);
                }
                return response.text();
            })
            .then(text => {
                console.log('📝 Réponse brute:', text);
                try {
                    const data = JSON.parse(text);
                    console.log('✅ Réponse JSON parsée:', data);
                    return data;
                } catch (e) {
                    console.error('❌ Erreur parsing JSON:', e);
                    console.error('Contenu reçu:', text);
                    throw new Error('Réponse invalide du serveur');
                }
            })
            .then(data => {
                if (data.success) {
                    console.log('🎉 Succès!', data.data);
                    showMessage(data.data, 'success');
                    form.reset();
                    utils.clearFormDraft();
                    setTimeout(function() {
                        window.closePopup();
                    }, 1500);
                } else {
                    console.error('❌ Erreur côté serveur:', data.data);
                    showMessage(data.data || 'Erreur lors de l\'envoi. Veuillez réessayer.', 'error');
                }
            })
            .catch(error => {
                console.error('💥 Erreur catch:', error);
                showMessage('Erreur de connexion. Veuillez vérifier votre connexion internet et réessayer.', 'error');
            })
            .finally(() => {
                console.log('🏁 Fin du processus d\'envoi');
                resetSubmitButton(submitButton, originalText);
            });
        };

        // Attacher l'événement au formulaire si il n'est pas déjà attaché via onsubmit
        const form = document.querySelector('.modal-form');
        if (form && !form.getAttribute('onsubmit')) {
            form.addEventListener('submit', window.handleFormSubmit);
            console.log('📝 Event listener attaché au formulaire');
        }

        // Sauvegarder automatiquement le brouillon
        const formInputs = document.querySelectorAll('#modal-overlay input, #modal-overlay select, #modal-overlay textarea');
        const debouncedSave = utils.debounce(saveFormDraft, 1000);
        
        formInputs.forEach(input => {
            input.addEventListener('input', debouncedSave);
        });
    }

    /**
     * Sauvegarder le brouillon du formulaire
     */
    function saveFormDraft() {
        const form = document.querySelector('.modal-form');
        if (!form) return;

        const formData = {
            name: form.querySelector('[name="name"]')?.value || '',
            email: form.querySelector('[name="email"]')?.value || '',
            phone: form.querySelector('[name="phone"]')?.value || '',
            service: form.querySelector('[name="service"]')?.value || '',
            message: form.querySelector('[name="message"]')?.value || ''
        };

        const hasData = Object.values(formData).some(value => value.trim() !== '');
        if (hasData) {
            utils.saveFormDraft(formData);
        }
    }

    /**
     * Restaurer le formulaire depuis le brouillon
     */
    function restoreFormFromDraft(draft) {
        const form = document.querySelector('.modal-form');
        if (!form || !draft) return;

        Object.keys(draft).forEach(key => {
            const field = form.querySelector(`[name="${key}"]`);
            if (field && draft[key]) {
                field.value = draft[key];
            }
        });
    }

    /**
     * Réinitialiser le bouton de soumission
     */
    function resetSubmitButton(button, originalText) {
        button.disabled = false;
        button.style.opacity = '1';
        button.textContent = originalText;
        button.setAttribute('aria-busy', 'false');
    }

    /**
     * Afficher un message de notification avec barre de progression
     */
    function showMessage(message, type, duration = CONFIG.MESSAGE_DURATION) {
        console.log('💬 Affichage message:', type, message);
        
        // Supprimer les messages existants
        const existingMessages = document.querySelectorAll('.isabel-message');
        existingMessages.forEach(msg => msg.remove());

        // Créer le message
        const messageDiv = document.createElement('div');
        messageDiv.className = 'isabel-message';
        messageDiv.setAttribute('role', 'alert');
        messageDiv.setAttribute('aria-live', 'polite');
        
        const backgroundColor = type === 'success' 
            ? 'background: linear-gradient(135deg, #00a32a, #00d084);'
            : 'background: linear-gradient(135deg, #e74c3c, #c0392b);';

        messageDiv.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            z-index: 100000;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            opacity: 0;
            transition: opacity 0.3s ease;
            ${backgroundColor}
            position: relative;
            overflow: hidden;
        `;

        const textDiv = document.createElement('div');
        textDiv.textContent = message;
        messageDiv.appendChild(textDiv);

        const progressBar = document.createElement('div');
        progressBar.style.cssText = `
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: rgba(255,255,255,0.3);
            width: 100%;
            transform-origin: left;
            transform: scaleX(1);
            transition: transform ${duration}ms linear;
        `;
        messageDiv.appendChild(progressBar);

        document.body.appendChild(messageDiv);

        setTimeout(() => {
            messageDiv.style.opacity = '1';
            progressBar.style.transform = 'scaleX(0)';
        }, 50);

        setTimeout(() => {
            messageDiv.style.opacity = '0';
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.parentNode.removeChild(messageDiv);
                }
            }, 300);
        }, duration);

        messageDiv.addEventListener('click', function() {
            messageDiv.style.opacity = '0';
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    messageDiv.parentNode.removeChild(messageDiv);
                }
            }, 300);
        });
    }

    /**
     * Smooth scroll pour les ancres
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    e.preventDefault();
                    
                    const headerHeight = document.querySelector('.header')?.offsetHeight || 0;
                    const alertHeight = document.querySelector('.top-alert')?.offsetHeight || 0;
                    
                    const targetPosition = targetElement.offsetTop - headerHeight - alertHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Améliorations d'accessibilité
     */
    function initAccessibility() {
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.getElementById('nav-menu');
        
        if (navToggle && navMenu) {
            navToggle.setAttribute('aria-expanded', 'false');
            navToggle.setAttribute('aria-controls', 'nav-menu');
            navMenu.setAttribute('aria-hidden', 'true');
        }

        // Focus visible pour la navigation au clavier
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                document.body.classList.add('keyboard-navigation');
            }
        });

        document.addEventListener('mousedown', function() {
            document.body.classList.remove('keyboard-navigation');
        });
    }

    /**
     * Animations au scroll - Intersection Observer
     */
    function initScrollAnimations() {
        if (!window.IntersectionObserver) return;

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Animer les éléments au scroll
        const animatedElements = document.querySelectorAll('.service-card, .testimonial-card, .cta-box');
        
        animatedElements.forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(el);
        });
    }

    /**
     * Effet parallax subtil pour le hero
     */
    function initParallax() {
        const debouncedScroll = utils.debounce(() => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.hero-right svg');
            if (parallax) {
                const speed = scrolled * 0.3;
                parallax.style.transform = `translateY(${speed}px)`;
            }
        }, CONFIG.DEBOUNCE_DELAY);

        window.addEventListener('scroll', debouncedScroll);
    }

    /**
     * Animation flottante pour les numéros de service
     */
    function initFloatingAnimations() {
        document.querySelectorAll('.service-icon').forEach((icon, index) => {
            icon.style.animation = `pulse 2s ease-in-out infinite`;
            icon.style.animationDelay = `${index * 0.3}s`;
        });
    }

    // Gestion des erreurs JavaScript
    window.addEventListener('error', function(e) {
        console.error('💥 Erreur JavaScript:', e.error);
    });

    // Performance monitoring au chargement
    window.addEventListener('load', function() {
        if ('performance' in window) {
            const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
            console.log('⚡ Temps de chargement:', loadTime + 'ms');
        }
        
        // Initialiser les animations flottantes
        initFloatingAnimations();
        
        // Vérification finale que tout est en ordre
        console.log('🔍 Vérification finale:');
        console.log('- isabel_ajax:', typeof isabel_ajax !== 'undefined' ? '✅' : '❌');
        console.log('- Modal overlay:', document.getElementById('modal-overlay') ? '✅' : '❌');
        console.log('- Form:', document.querySelector('.modal-form') ? '✅' : '❌');
        console.log('- openPopup:', typeof window.openPopup !== 'undefined' ? '✅' : '❌');
        console.log('- handleFormSubmit:', typeof window.handleFormSubmit !== 'undefined' ? '✅' : '❌');
    });

    // Respecter les préférences d'animation réduite
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        // Désactiver les animations pour les utilisateurs qui préfèrent
        document.documentElement.style.setProperty('--animation-duration', '0.01ms');
        
        // Masquer la libellule animée
        const dragonfly = document.querySelector('.dragonfly');
        if (dragonfly) {
            dragonfly.style.display = 'none';
        }
    }

    // FONCTION DE DEBUG GLOBALE
    window.isabelDebug = function() {
        console.log('=== ISABEL DEBUG INFO ===');
        console.log('isabel_ajax:', typeof isabel_ajax !== 'undefined' ? isabel_ajax : 'UNDEFINED');
        console.log('Modal overlay:', document.getElementById('modal-overlay'));
        console.log('Form:', document.querySelector('.modal-form'));
        console.log('openPopup function:', typeof window.openPopup);
        console.log('closePopup function:', typeof window.closePopup);
        console.log('handleFormSubmit function:', typeof window.handleFormSubmit);
        console.log('========================');
    };

    // Export des fonctions principales pour usage externe si nécessaire
    window.isabelTheme = {
        openPopup: () => window.openPopup(),
        closePopup: () => window.closePopup(),
        showMessage: showMessage,
        debug: () => window.isabelDebug()
    };

})();

/**
 * Script JavaScript pour améliorer l'expérience du Customizer WYSIWYG
 * Synchronisation en temps réel et interface améliorée
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        console.log('🎨 Customizer Isabel WYSIWYG initialisé');
        
        // Améliorer l'interface des éditeurs WYSIWYG
        enhanceWysiwygInterface();
        
        // Synchronisation temps réel avec le preview
        setupRealtimeSync();
        
        // Messages d'aide contextuelle
        addHelpMessages();
        
        // Améliorer la navigation entre sections
        improveNavigation();
    });

    /**
     * Améliorer l'interface des éditeurs WYSIWYG
     */
    function enhanceWysiwygInterface() {
        // Attendre que TinyMCE soit chargé
        $(document).on('tinymce-editor-init', function(event, editor) {
            console.log('📝 Éditeur TinyMCE initialisé:', editor.id);
            
            // Personaliser la toolbar
            if (editor.id.indexOf('isabel_') === 0) {
                // Ajouter des boutons personnalisés
                editor.addButton('isabel_highlight', {
                    text: '✨ Surligneur',
                    tooltip: 'Surligner le texte important',
                    onclick: function() {
                        var selected = editor.selection.getContent();
                        if (selected) {
                            editor.selection.setContent('<mark style="background: #fff3cd; padding: 2px 4px;">' + selected + '</mark>');
                        }
                    }
                });
                
                editor.addButton('isabel_break', {
                    text: '↵ Retour ligne',
                    tooltip: 'Insérer un retour à la ligne',
                    onclick: function() {
                        editor.insertContent('<br>');
                    }
                });
                
                // Styles prédéfinis
                editor.on('init', function() {
                    editor.formatter.register('isabel_emphasis', {
                        inline: 'span',
                        styles: {
                            'font-weight': 'bold',
                            'color': '#c47dd9'
                        }
                    });
                    
                    editor.formatter.register('isabel_subtitle', {
                        block: 'p',
                        styles: {
                            'font-size': '1.2em',
                            'font-weight': '600',
                            'color': '#2d1b3d'
                        }
                    });
                });
                
                // Synchronisation avec le customizer
                editor.on('change keyup', function() {
                    var content = editor.getContent();
                    var setting_id = editor.id;
                    
                    if (wp.customize(setting_id)) {
                        wp.customize(setting_id).set(content);
                    }
                });
            }
        });
    }

    /**
     * Synchronisation temps réel avec le preview
     */
    function setupRealtimeSync() {
        // Liste des contenus WYSIWYG à synchroniser
        var wysiwygControls = [
            'isabel_intro_text_wysiwyg',
            'isabel_services_subtitle_wysiwyg',
            'isabel_service1_desc_wysiwyg',
            'isabel_service2_desc_wysiwyg',
            'isabel_service3_desc_wysiwyg',
            'isabel_service4_desc_wysiwyg',
            'isabel_testimonials_subtitle_wysiwyg',
            'isabel_cta_text_wysiwyg',
            'isabel_form_note_wysiwyg',
            'isabel_footer_note_wysiwyg',
            'isabel_qualiopi_description_wysiwyg'
        ];
        
        // Synchronisation pour les pages de services
        var servicePages = ['coaching', 'vae', 'hypno', 'consultation'];
        servicePages.forEach(function(service) {
            wysiwygControls.push('isabel_' + service + '_intro_wysiwyg');
            wysiwygControls.push('isabel_' + service + '_description_wysiwyg');
            wysiwygControls.push('isabel_' + service + '_who_wysiwyg');
            wysiwygControls.push('isabel_' + service + '_expertise_wysiwyg');
            wysiwygControls.push('isabel_' + service + '_cta_text_wysiwyg');
        });
        
        // Configurer la synchronisation pour chaque contrôle
        wysiwygControls.forEach(function(controlId) {
            if (wp.customize(controlId)) {
                wp.customize(controlId, function(value) {
                    value.bind(function(newValue) {
                        // Envoyer le nouveau contenu au preview
                        wp.customize.previewer.send('wysiwyg-update', {
                            id: controlId,
                            content: newValue
                        });
                    });
                });
            }
        });
    }

    /**
     * Ajouter des messages d'aide contextuelle
     */
    function addHelpMessages() {
        // Messages d'aide pour les différentes sections
        var helpMessages = {
            'isabel_hero_section': {
                title: '🏠 Section d\'accueil',
                message: 'Cette section apparaît en premier sur votre site. Utilisez les éditeurs visuels pour formater vos textes comme dans Word !'
            },
            'isabel_services_section': {
                title: '🎯 Services',
                message: 'Présentez vos 4 services principaux. Le formatage vous permet de mettre en valeur les points importants.'
            },
            'isabel_text_formatting_section': {
                title: '✍️ Formatage avancé',
                message: 'Tous les éditeurs visuels de ce thème fonctionnent comme Word : gras, italique, couleurs, retours à la ligne, etc.'
            }
        };
        
        // Ajouter les messages aux sections
        Object.keys(helpMessages).forEach(function(sectionId) {
            var section = $('#customize-control-' + sectionId);
            if (section.length) {
                var help = helpMessages[sectionId];
                var helpHtml = '<div class="customize-help-message" style="background: #e7f3ff; padding: 10px; border-radius: 4px; margin: 10px 0; border-left: 4px solid #0073aa;">' +
                              '<strong>' + help.title + '</strong><br>' +
                              '<small>' + help.message + '</small>' +
                              '</div>';
                section.prepend(helpHtml);
            }
        });
    }

    /**
     * Améliorer la navigation entre sections
     */
    function improveNavigation() {
        // Ajouter des raccourcis de navigation
        var $customizer = $('#customize-controls');
        
        if ($customizer.length) {
            var navigationHtml = '<div id="isabel-quick-nav" style="position: fixed; top: 50px; right: 20px; background: white; padding: 15px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); z-index: 9999; max-width: 200px;">' +
                                '<h4 style="margin: 0 0 10px 0; color: #333;">🚀 Navigation rapide</h4>' +
                                '<div style="display: flex; flex-direction: column; gap: 5px;">' +
                                '<button class="nav-btn" data-section="isabel_hero_section">🏠 Accueil</button>' +
                                '<button class="nav-btn" data-section="isabel_services_section">🎯 Services</button>' +
                                '<button class="nav-btn" data-section="isabel_testimonials_section">💬 Témoignages</button>' +
                                '<button class="nav-btn" data-section="isabel_cta_section">📞 CTA Final</button>' +
                                '<button class="nav-btn" data-section="isabel_form_section">📝 Formulaire</button>' +
                                '</div>' +
                                '<button id="toggle-nav" style="position: absolute; top: 5px; right: 5px; background: none; border: none; font-size: 12px;">✕</button>' +
                                '</div>';
            
            $('body').append(navigationHtml);
            
            // Gestion des clics
            $('.nav-btn').on('click', function() {
                var section = $(this).data('section');
                wp.customize.section(section).focus();
            });
            
            // Toggle navigation
            $('#toggle-nav').on('click', function() {
                $('#isabel-quick-nav').fadeOut();
            });
            
            // Style pour les boutons
            $('<style>')
                .prop('type', 'text/css')
                .html(`
                    .nav-btn {
                        background: #f0f0f0;
                        border: 1px solid #ddd;
                        padding: 5px 10px;
                        border-radius: 4px;
                        cursor: pointer;
                        font-size: 12px;
                        text-align: left;
                        transition: all 0.2s;
                    }
                    .nav-btn:hover {
                        background: #e4a7f5;
                        color: white;
                        transform: translateX(2px);
                    }
                `)
                .appendTo('head');
        }
    }

    /**
     * Ajouter des raccourcis clavier
     */
    $(document).on('keydown', function(e) {
        // Ctrl/Cmd + Shift + P pour ouvrir le panneau de prévisualisation
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.which === 80) {
            e.preventDefault();
            wp.customize.previewer.previewUrl(wp.customize.settings.url.home);
        }
        
        // Ctrl/Cmd + S pour sauvegarder
        if ((e.ctrlKey || e.metaKey) && e.which === 83) {
            e.preventDefault();
            if (wp.customize.state('saved').get() === false) {
                wp.customize.state('saved').set(true);
                wp.customize.notifications.add('save-success', new wp.customize.Notification('save-success', {
                    type: 'success',
                    message: '✅ Modifications sauvegardées !'
                }));
            }
        }
    });

    /**
     * Améliorer l'expérience des éditeurs WYSIWYG
     */
    function enhanceWysiwygExperience() {
        // Ajouter des styles inline pour une meilleure prévisualisation
        var customStyles = `
            <style>
                .mce-content-body {
                    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
                    font-size: 14px !important;
                    line-height: 1.6 !important;
                    color: #333 !important;
                }
                .mce-content-body strong {
                    color: #c47dd9 !important;
                }
                .mce-content-body em {
                    color: #6b5b73 !important;
                }
                .mce-content-body mark {
                    background: #fff3cd !important;
                    padding: 2px 4px !important;
                    border-radius: 2px !important;
                }
            </style>
        `;
        
        // Injecter les styles dans les éditeurs
        $(document).on('tinymce-editor-init', function(event, editor) {
            if (editor.id.indexOf('isabel_') === 0) {
                editor.on('init', function() {
                    editor.getDoc().head.innerHTML += customStyles;
                });
            }
        });
    }

    /**
     * Notifications et feedback utilisateur
     */
    function setupUserFeedback() {
        // Notification de bienvenue
        setTimeout(function() {
            if (wp.customize.notifications) {
                wp.customize.notifications.add('isabel-welcome', new wp.customize.Notification('isabel-welcome', {
                    type: 'info',
                    message: '🎨 <strong>Bienvenue dans l\'éditeur Isabel !</strong><br>Utilisez les éditeurs visuels (📝) pour formater vos textes comme dans Word. <a href="#" onclick="wp.customize.section(\'isabel_text_formatting_section\').focus(); return false;">Voir les options de formatage →</a>',
                    dismissible: true
                }));
            }
        }, 2000);
        
        // Notification lors des changements
        var changeCount = 0;
        wp.customize.bind('change', function() {
            changeCount++;
            if (changeCount === 5) {
                wp.customize.notifications.add('isabel-save-reminder', new wp.customize.Notification('isabel-save-reminder', {
                    type: 'warning',
                    message: '💾 N\'oubliez pas de <strong>publier vos modifications</strong> pour les rendre visibles sur votre site !',
                    dismissible: true
                }));
            }
        });
    }

    /**
     * Aide contextuelle pour les éditeurs WYSIWYG
     */
    function addWysiwygHelp() {
        // Créer un panneau d'aide flottant
        var helpPanel = `
            <div id="wysiwyg-help-panel" style="
                position: fixed;
                bottom: 20px;
                left: 20px;
                background: white;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                max-width: 300px;
                z-index: 9999;
                border-left: 4px solid #e4a7f5;
                display: none;
            ">
                <h4 style="margin: 0 0 10px 0; color: #333;">📝 Aide Éditeur Visuel</h4>
                <div style="font-size: 12px; line-height: 1.4;">
                    <p><strong>Raccourcis utiles :</strong></p>
                    <ul style="margin: 5px 0; padding-left: 15px;">
                        <li><kbd>Ctrl+B</kbd> : Gras</li>
                        <li><kbd>Ctrl+I</kbd> : Italique</li>
                        <li><kbd>Ctrl+U</kbd> : Souligné</li>
                        <li><kbd>Ctrl+Z</kbd> : Annuler</li>
                        <li><kbd>Ctrl+Y</kbd> : Refaire</li>
                    </ul>
                    <p><strong>Conseils :</strong></p>
                    <ul style="margin: 5px 0; padding-left: 15px;">
                        <li>Utilisez <strong>gras</strong> pour les mots importants</li>
                        <li>Utilisez <em>italique</em> pour les nuances</li>
                        <li>Sélectionnez le texte avant de le formater</li>
                    </ul>
                </div>
                <button onclick="jQuery('#wysiwyg-help-panel').fadeOut();" style="
                    position: absolute;
                    top: 5px;
                    right: 5px;
                    background: none;
                    border: none;
                    font-size: 12px;
                    cursor: pointer;
                ">✕</button>
            </div>
        `;
        
        $('body').append(helpPanel);
        
        // Afficher l'aide au focus sur un éditeur WYSIWYG
        $(document).on('focusin', '.isabel-wysiwyg-container .mce-edit-area', function() {
            $('#wysiwyg-help-panel').fadeIn();
        });
    }

    /**
     * Prévisualisation en temps réel améliorée
     */
    function enhancePreview() {
        // Écouter les messages du preview
        wp.customize.previewer.bind('ready', function() {
            console.log('🖥️ Preview prêt - Synchronisation WYSIWYG active');
            
            // Envoyer le style personnalisé au preview
            wp.customize.previewer.send('isabel-preview-styles', {
                styles: `
                    .formatted-content strong {
                        color: #c47dd9 !important;
                        font-weight: 600 !important;
                    }
                    .formatted-content em {
                        color: #6b5b73 !important;
                        font-style: italic !important;
                    }
                    .formatted-content mark {
                        background: #fff3cd !important;
                        padding: 2px 4px !important;
                        border-radius: 2px !important;
                    }
                `
            });
        });
    }

    /**
     * Validation et suggestions de contenu
     */
    function setupContentValidation() {
        // Vérifier la longueur des textes
        var textLimits = {
            'isabel_intro_text_wysiwyg': { min: 50, max: 300, type: 'Introduction' },
            'isabel_services_subtitle_wysiwyg': { min: 30, max: 150, type: 'Sous-titre services' },
            'isabel_cta_text_wysiwyg': { min: 20, max: 100, type: 'Texte CTA' }
        };
        
        Object.keys(textLimits).forEach(function(controlId) {
            if (wp.customize(controlId)) {
                wp.customize(controlId).bind(function(value) {
                    var limit = textLimits[controlId];
                    var textLength = value.replace(/<[^>]*>/g, '').length; // Supprimer HTML pour compter
                    
                    // Supprimer les anciennes notifications de ce contrôle
                    wp.customize.notifications.remove(controlId + '-length');
                    
                    if (textLength < limit.min) {
                        wp.customize.notifications.add(controlId + '-length', new wp.customize.Notification(controlId + '-length', {
                            type: 'warning',
                            message: `📝 ${limit.type}: Votre texte est un peu court (${textLength} caractères). Minimum recommandé: ${limit.min} caractères.`
                        }));
                    } else if (textLength > limit.max) {
                        wp.customize.notifications.add(controlId + '-length', new wp.customize.Notification(controlId + '-length', {
                            type: 'warning',
                            message: `📝 ${limit.type}: Votre texte est un peu long (${textLength} caractères). Maximum recommandé: ${limit.max} caractères.`
                        }));
                    }
                });
            }
        });
    }

    /**
     * Export/Import de configurations
     */
    function setupConfigManagement() {
        // Ajouter un bouton d'export dans le customizer
        if ($('#customize-header-actions').length) {
            var exportBtn = `
                <button id="isabel-export-config" class="button" style="margin-right: 10px;">
                    💾 Exporter la config
                </button>
            `;
            $('#customize-header-actions').prepend(exportBtn);
            
            $('#isabel-export-config').on('click', function() {
                var config = {};
                
                // Collecter tous les settings Isabel
                Object.keys(wp.customize.settings.settings).forEach(function(key) {
                    if (key.indexOf('isabel_') === 0) {
                        config[key] = wp.customize(key).get();
                    }
                });
                
                // Créer un fichier de téléchargement
                var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(config, null, 2));
                var downloadAnchorNode = document.createElement('a');
                downloadAnchorNode.setAttribute("href", dataStr);
                downloadAnchorNode.setAttribute("download", "isabel-config-" + new Date().toISOString().split('T')[0] + ".json");
                document.body.appendChild(downloadAnchorNode);
                downloadAnchorNode.click();
                downloadAnchorNode.remove();
                
                wp.customize.notifications.add('export-success', new wp.customize.Notification('export-success', {
                    type: 'success',
                    message: '💾 Configuration exportée avec succès !',
                    dismissible: true
                }));
            });
        }
    }

    /**
     * Mode focus pour les éditeurs
     */
    function setupFocusMode() {
        var focusMode = false;
        
        // Ajouter un bouton de mode focus
        $(document).on('focusin', '.isabel-wysiwyg-container', function() {
            if (!$(this).find('.isabel-focus-btn').length) {
                var focusBtn = `
                    <button class="isabel-focus-btn" style="
                        position: absolute;
                        top: 5px;
                        right: 5px;
                        background: #e4a7f5;
                        color: white;
                        border: none;
                        padding: 4px 8px;
                        border-radius: 3px;
                        font-size: 11px;
                        cursor: pointer;
                        z-index: 1000;
                    ">🎯 Focus</button>
                `;
                $(this).css('position', 'relative').append(focusBtn);
            }
        });
        
        // Gestionnaire du mode focus
        $(document).on('click', '.isabel-focus-btn', function() {
            var container = $(this).closest('.isabel-wysiwyg-container');
            
            if (!focusMode) {
                // Activer le mode focus
                $('body').addClass('isabel-focus-mode');
                container.addClass('isabel-focused');
                $(this).text('↩️ Quitter');
                focusMode = true;
                
                // CSS pour le mode focus
                if (!$('#isabel-focus-style').length) {
                    $('<style id="isabel-focus-style">').html(`
                        .isabel-focus-mode #customize-controls > * {
                            display: none !important;
                        }
                        .isabel-focus-mode .isabel-focused {
                            display: block !important;
                            position: fixed !important;
                            top: 50px !important;
                            left: 50px !important;
                            right: 50px !important;
                            bottom: 50px !important;
                            background: white !important;
                            z-index: 999999 !important;
                            padding: 20px !important;
                            border-radius: 8px !important;
                            box-shadow: 0 0 30px rgba(0,0,0,0.5) !important;
                        }
                        .isabel-focused .wp-editor-wrap {
                            height: calc(100% - 40px) !important;
                        }
                        .isabel-focused .wp-editor-container {
                            height: 100% !important;
                        }
                        .isabel-focused iframe {
                            height: 100% !important;
                        }
                    `).appendTo('head');
                }
            } else {
                // Désactiver le mode focus
                $('body').removeClass('isabel-focus-mode');
                container.removeClass('isabel-focused');
                $(this).text('🎯 Focus');
                focusMode = false;
            }
        });
    }

    // Initialiser toutes les améliorations
    enhanceWysiwygExperience();
    setupUserFeedback();
    addWysiwygHelp();
    enhancePreview();
    setupContentValidation();
    setupConfigManagement();
    setupFocusMode();

    /**
     * Messages de conseils contextuels
     */
    function showContextualTips() {
        var tips = [
            {
                trigger: 'isabel_intro_text_wysiwyg',
                message: '💡 <strong>Astuce :</strong> Votre texte d\'introduction est la première chose que vos visiteurs liront. Utilisez le <strong>gras</strong> pour les mots clés importants !'
            },
            {
                trigger: 'isabel_service1_desc_wysiwyg',
                message: '🎯 <strong>Conseil :</strong> Pour vos services, mettez en valeur les <strong>bénéfices</strong> plutôt que les caractéristiques. Que va gagner votre client ?'
            },
            {
                trigger: 'isabel_cta_text_wysiwyg',
                message: '📞 <strong>Astuce CTA :</strong> Utilisez des verbes d\'action et créez de l\'urgence. Ex: "<strong>Commencez dès maintenant</strong>" au lieu de "Contactez-nous".'
            }
        ];
        
        tips.forEach(function(tip) {
            if (wp.customize(tip.trigger)) {
                $(document).on('focusin', `[data-customize-setting-link="${tip.trigger}"]`, function() {
                    setTimeout(function() {
                        wp.customize.notifications.add('tip-' + tip.trigger, new wp.customize.Notification('tip-' + tip.trigger, {
                            type: 'info',
                            message: tip.message,
                            dismissible: true
                        }));
                    }, 3000);
                });
            }
        });
    }

    showContextualTips();

})(jQuery);