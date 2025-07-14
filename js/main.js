/**
 * Script principal pour le thème Isabel GONCALVES - Design Minimaliste
 * VERSION CORRIGÉE avec debug amélioré
 */

(function() {
    'use strict';

    // Configuration
    const CONFIG = {
        DEBOUNCE_DELAY: 16,
        MESSAGE_DURATION: 4000,
        MODAL_CLOSE_DELAY: 300
    };

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
        
        // Vérifier que isabel_ajax est disponible
        if (typeof isabel_ajax === 'undefined') {
            console.error('❌ isabel_ajax non défini - problème de localisation du script');
            showMessage('Erreur de configuration. Veuillez recharger la page.', 'error');
        } else {
            console.log('✅ isabel_ajax disponible:', isabel_ajax);
        }
        
        initNavigation();
        initModal();
        initFormHandling();
        initSmoothScroll();
        initAccessibility();
        initScrollAnimations();
        initParallax();
        
        console.log('🎨 Thème Isabel GONCALVES - Design Minimaliste initialisé !');
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

        // Fonctions globales pour les boutons
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
     * Gestion du formulaire avec AJAX + sauvegarde brouillon - VERSION CORRIGÉE
     */
    function initFormHandling() {
        window.handleFormSubmit = function(event) {
            event.preventDefault();
            console.log('📤 Soumission du formulaire commencée');
            
            const form = event.target;
            const submitButton = form.querySelector('.form-submit');
            const originalText = submitButton.textContent;
            
            // Vérifier que isabel_ajax est disponible AVANT tout
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

            // Envoi AJAX avec debug amélioré
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
     * Afficher un message de notification avec barre de progression - VERSION AMÉLIORÉE
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
    });

    // Respecter les préférences d'animation réduite
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
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
        console.log('isabel_ajax:', isabel_ajax);
        console.log('Modal overlay:', document.getElementById('modal-overlay'));
        console.log('Form:', document.querySelector('.modal-form'));
        console.log('Actions AJAX enregistrées:', window.wp?.hooks?.hasAction('wp_ajax_isabel_contact'));
        console.log('========================');
    };

})();