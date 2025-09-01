<footer class="site-footer" style="background: var(--white); margin-top: 4rem; padding: 2rem 0; border-top: 1px solid var(--rose-200);">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem;">
        
        <!-- Informations principales -->
        <div style="text-align: center; margin-bottom: 2rem;">
            <h3 style="color: var(--rose-700); margin-bottom: 0.5rem; font-size: 1.1rem; font-weight: 600;">
                <?php echo esc_html(isabel_get_option('isabel_main_name', 'Isabel GONCALVES')); ?>
            </h3>
            <p style="color: var(--text-light); font-size: 0.9rem; margin-bottom: 1.5rem;">
                <?php echo esc_html(isabel_get_option('isabel_subtitle', 'Coach Certifiée')); ?>
            </p>
            
            <!-- Liens vers les pages -->
            <div style="display: flex; justify-content: center; gap: 2rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/formations-professionnelles')); ?>" style="color: var(--rose-700); text-decoration: none; font-size: 0.9rem; font-weight: 500;">
                    Formations Professionnelles
                </a>
                <a href="<?php echo esc_url(home_url('/accompagnement-vae')); ?>" style="color: var(--rose-700); text-decoration: none; font-size: 0.9rem; font-weight: 500;">
                    Accompagnement VAE
                </a>
                <a href="<?php echo esc_url(home_url('/bilan-competences')); ?>" style="color: var(--rose-700); text-decoration: none; font-size: 0.9rem; font-weight: 500;">
                    Bilan de compétences
                </a>
                <a href="<?php echo esc_url(home_url('/coaching-professionnel-personnel')); ?>" style="color: var(--rose-700); text-decoration: none; font-size: 0.9rem; font-weight: 500;">
                    Coaching professionnel et personnel
                </a>
            </div>
            
            <!-- Bouton contact -->
            <button onclick="openPopup()" style="background: var(--rose-600); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 25px; font-weight: 500; cursor: pointer; transition: all 0.3s ease;">
                Prendre rendez-vous
            </button>
        </div>

        <!-- Séparateur -->
        <div style="height: 1px; background: var(--rose-200); margin: 1.5rem 0;"></div>

        <!-- Copyright -->
        <div style="text-align: center; color: var(--text-light); font-size: 0.85rem;">
            © <?php echo date('Y'); ?> <?php echo esc_html(isabel_get_option('isabel_main_name', 'Isabel GONCALVES')); ?>. Tous droits réservés.
        </div>
    </div>
</footer>

<!-- CSS pour les effets hover -->
<style>
footer a:hover {
    color: var(--rose-500) !important;
}

footer button:hover {
    background: var(--rose-700) !important;
    transform: translateY(-1px);
}

/* Styles pour la navigation au clavier */
.keyboard-navigation a:focus,
.keyboard-navigation button:focus {
    outline: 2px solid var(--rose-500) !important;
    outline-offset: 2px !important;
}
</style>

<!-- Script JavaScript minimaliste -->
<script>
// Navigation mobile - Version minimaliste
document.addEventListener('DOMContentLoaded', function() {
    // Vérifier si main.js a déjà initialisé les fonctions
    if (typeof window.openPopup === 'undefined') {
        console.log('🔧 Initialisation du fallback JavaScript minimaliste');
        
        // Navigation mobile
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.getElementById('nav-menu');

        if (navToggle && navMenu) {
            navToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
            });

            // Fermer le menu mobile en cliquant sur un lien
            const navLinks = navMenu.querySelectorAll('a');
            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    if (navMenu.classList.contains('active')) {
                        navMenu.classList.remove('active');
                    }
                });
            });

            // Fermer le menu en cliquant ailleurs
            document.addEventListener('click', function(e) {
                if (!navToggle.contains(e.target) && !navMenu.contains(e.target)) {
                    navMenu.classList.remove('active');
                }
            });
        }

        // Fonctions modal - Version minimaliste
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
    }
});
</script>

</body>
</html>