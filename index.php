<?php get_header(); ?>

<!-- Header épuré -->
<header class="header">
  <div class="header-container">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-circle">
      <?php echo esc_html(isabel_get_option('isabel_main_name', 'Isabel GONCALVES')); ?>
      <div class="logo-dot"></div>
    </a>

    <button class="nav-toggle" id="nav-toggle">☰</button>

    <nav class="nav-menu" id="nav-menu">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container' => false,
        'items_wrap' => '<ul>%3$s</ul>',
        'fallback_cb' => 'isabel_default_menu'
      ));
      ?>
    </nav>

    <div class="header-cta">
      <button onclick="openPopup()">Prendre rendez-vous</button>
    </div>
  </div>
</header>

<!-- Hero Section avec toutes les images intégrées -->
<section class="hero-floating" id="accueil">
  
  <!-- Image de fond pour desktop (en arrière-plan) -->
  <?php 
  $hero_bg_image = isabel_get_option('isabel_hero_background_image', '');
  if (!empty($hero_bg_image)) {
    echo '<div class="hero-background-desktop">';
    echo '<img src="' . esc_url($hero_bg_image) . '" alt="Image de fond" class="hero-background-image-desktop" />';
    echo '</div>';
  }
  ?>

  <!-- Contenu principal de la section hero -->
  <div class="hero-content-wrapper">
    
    <!-- Image de fond mobile (visible seulement sur mobile) -->
    <div class="hero-background-mobile">
      <?php 
      if (!empty($hero_bg_image)) {
        echo '<div class="hero-bg-container">';
        echo '<img src="' . esc_url($hero_bg_image) . '" alt="Image de fond" class="hero-background-image" />';
        echo '</div>';
      }
      ?>
    </div>

    <!-- Image de profil mobile (visible seulement sur mobile) -->
    <div class="mobile-profile-section">
      <?php 
      $mobile_profile_image = isabel_get_option('isabel_mobile_profile_image', '');
      if (!empty($mobile_profile_image)) {
        echo '<div class="mobile-profile-container">';
        echo '<img src="' . esc_url($mobile_profile_image) . '" alt="Photo d\'Isabel GONCALVES" class="mobile-profile-image" />';
        echo '</div>';
      }
      ?>
    </div>

    <!-- Contenu texte -->
    <div class="intro-card">
      <div class="hero-badge">
        <span>✨</span>
        <?php echo esc_html(isabel_get_option('isabel_subtitle', 'Coach certifiée')); ?>
      </div>
      
      <div class="profile-info">
        <h1><?php echo esc_html(isabel_get_option('isabel_main_name', 'Isabel GONCALVES')); ?></h1>
      </div>
      
      <div class="profile-subtitle">
        <?php echo esc_html(isabel_get_option('isabel_subtitle', 'Coach personnelle & Hypnocoach certifiée')); ?>
      </div>
      
      <div class="intro-text">
        <?php echo esc_html(isabel_get_option('isabel_intro_text', 'Je vous accompagne avec bienveillance dans votre développement personnel et professionnel grâce au coaching, à la VAE et à l\'hypnocoaching. Révélez votre plein potentiel.')); ?>
      </div>
      
      <div class="hero-cta">
        <button class="cta-main" onclick="openPopup()">
          <span>🚀</span>
          <span><?php echo esc_html(isabel_get_option('isabel_main_button_text', 'Prendre rendez-vous')); ?></span>
        </button>
        <button class="btn-secondary">En savoir plus</button>
      </div>
    </div>

    <!-- Image de profil principale (desktop seulement) -->
    <div class="hero-right">
      <div class="hero-profile-container">
        <?php 
        $profile_image = isabel_get_option('isabel_profile_image', '');
        if (!empty($profile_image)) {
          echo '<img src="' . esc_url($profile_image) . '" alt="Photo d\'Isabel GONCALVES" class="hero-profile-image" />';
        } else {
          echo '<div class="hero-profile-placeholder">';
          echo '<svg width="280" height="280" viewBox="0 0 280 280" xmlns="http://www.w3.org/2000/svg">';
          echo '<defs>';
          echo '<linearGradient id="placeholderGradient" x1="0%" y1="0%" x2="100%" y2="100%">';
          echo '<stop offset="0%" style="stop-color:var(--rose-500);stop-opacity:0.8" />';
          echo '<stop offset="100%" style="stop-color:var(--rose-700);stop-opacity:0.8" />';
          echo '</linearGradient>';
          echo '</defs>';
          echo '<circle cx="140" cy="140" r="130" fill="url(#placeholderGradient)"/>';
          echo '<circle cx="140" cy="100" r="35" fill="white" opacity="0.9"/>';
          echo '<path d="M85 200 Q140 160 195 200 L195 240 Q140 200 85 240 Z" fill="white" opacity="0.9"/>';
          echo '</svg>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

  </div>
</section>

<!-- Services Section avec liens -->
<section class="services-section" id="services">
  <div class="section-container">
    <h2 class="section-title"><?php echo esc_html(isabel_get_option('isabel_services_title', 'Mes Accompagnements')); ?></h2>
    <p class="section-subtitle">
      Trois approches complémentaires pour révéler votre potentiel et atteindre vos objectifs personnels et professionnels.
    </p>

    <div class="services-grid">
      <a href="<?php echo esc_url(home_url('/coaching-personnel')); ?>" class="service-card service-link">
        <div class="service-icon">01</div>
        <h3><?php echo esc_html(isabel_get_option('isabel_service1_title', 'Coaching Personnel')); ?></h3>
        <p><?php echo esc_html(isabel_get_option('isabel_service1_desc', 'Accompagnement personnalisé pour développer votre potentiel, clarifier vos objectifs et transformer votre vie personnelle et professionnelle.')); ?></p>
        <div class="service-arrow">→</div>
      </a>

      <a href="<?php echo esc_url(home_url('/accompagnement-vae')); ?>" class="service-card service-link">
        <div class="service-icon">02</div>
        <h3><?php echo esc_html(isabel_get_option('isabel_service2_title', 'Validation des Acquis (VAE)')); ?></h3>
        <p><?php echo esc_html(isabel_get_option('isabel_service2_desc', 'Valorisez votre expérience professionnelle et obtenez une certification officielle grâce à un accompagnement expert dans votre démarche VAE.')); ?></p>
        <div class="service-arrow">→</div>
      </a>

      <a href="<?php echo esc_url(home_url('/hypnocoaching')); ?>" class="service-card service-link">
        <div class="service-icon">03</div>
        <h3><?php echo esc_html(isabel_get_option('isabel_service3_title', 'Hypnocoaching')); ?></h3>
        <p><?php echo esc_html(isabel_get_option('isabel_service3_desc', 'Libérez-vous de vos blocages en profondeur en combinant les bienfaits de l\'hypnose thérapeutique et du coaching pour une transformation durable.')); ?></p>
        <div class="service-arrow">→</div>
      </a>
    </div>
  </div>
</section>

<!-- Témoignages Section -->
<section class="testimonials-section" id="temoignages">
  <div class="section-container">
    <h2 class="section-title"><?php echo esc_html(isabel_get_option('isabel_testimonials_title', 'Ce que disent mes clients')); ?></h2>
    <p class="section-subtitle">
      Découvrez les témoignages de personnes qui ont transformé leur vie grâce à un accompagnement personnalisé.
    </p>

    <div class="testimonials-grid">
      <?php
      // Récupérer les témoignages depuis le type de contenu personnalisé
      $testimonials = get_posts(array(
        'post_type' => 'testimonial',
        'posts_per_page' => 3,
        'post_status' => 'publish'
      ));
      
      if (!empty($testimonials)) {
        foreach ($testimonials as $testimonial) {
          $author_name = get_post_meta($testimonial->ID, '_testimonial_author_name', true);
          $author_title = get_post_meta($testimonial->ID, '_testimonial_author_title', true);
          $author_initials = get_post_meta($testimonial->ID, '_testimonial_author_initials', true);
          ?>
          <div class="testimonial-card">
            <div class="testimonial-content">
              <?php echo esc_html(get_the_content(null, false, $testimonial)); ?>
            </div>
            <div class="testimonial-author">
              <div class="author-avatar"><?php echo esc_html($author_initials); ?></div>
              <div class="author-info">
                <div class="author-name"><?php echo esc_html($author_name); ?></div>
                <div class="author-title"><?php echo esc_html($author_title); ?></div>
              </div>
            </div>
          </div>
          <?php
        }
      } else {
        // Témoignages par défaut si aucun n'est créé
        ?>
        <div class="testimonial-card">
          <div class="testimonial-content">
            "Grâce à Isabel, j'ai enfin trouvé ma voie professionnelle. Son approche bienveillante et ses outils concrets m'ont permis de reprendre confiance en moi et d'atteindre mes objectifs."
          </div>
          <div class="testimonial-author">
            <div class="author-avatar">ML</div>
            <div class="author-info">
              <div class="author-name">Marie L.</div>
              <div class="author-title">Manager</div>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-content">
            "L'accompagnement VAE avec Isabel a été un véritable succès. Elle m'a guidé à chaque étape avec professionnalisme et empathie. Je recommande vivement ses services."
          </div>
          <div class="testimonial-author">
            <div class="author-avatar">TR</div>
            <div class="author-info">
              <div class="author-name">Thomas R.</div>
              <div class="author-title">Technicien Certifié</div>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-content">
            "Les séances d'hypnocoaching m'ont aidée à surmonter mes angoisses et à retrouver un équilibre. Merci Isabel pour cette transformation profonde et durable."
          </div>
          <div class="testimonial-author">
            <div class="author-avatar">LM</div>
            <div class="author-info">
              <div class="author-name">Léa M.</div>
              <div class="author-title">Entrepreneur</div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="contact">
  <div class="section-container">
    <div class="cta-box">
      <h2 class="cta-title"><?php echo esc_html(isabel_get_option('isabel_cta_title', 'Prêt(e) à transformer votre vie ?')); ?></h2>
      <p class="cta-text">
        <?php echo esc_html(isabel_get_option('isabel_cta_text', 'Contactez-moi dès maintenant pour discuter de vos objectifs et découvrir comment je peux vous accompagner.')); ?>
      </p>
      <button class="cta-button" onclick="openPopup()">
        <?php echo esc_html(isabel_get_option('isabel_cta_button', 'Prendre rendez-vous')); ?>
      </button>
    </div>
  </div>
</section>

<!-- Libellule animée -->
<div class="dragonfly">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 60" width="100%" height="100%">
    <ellipse cx="50" cy="30" rx="2" ry="10" fill="var(--rose-700)" opacity="0.8"/>
    <ellipse cx="38" cy="22" rx="10" ry="5" fill="var(--rose-500)" opacity="0.6"/>
    <ellipse cx="62" cy="22" rx="10" ry="5" fill="var(--rose-500)" opacity="0.6"/>
    <ellipse cx="38" cy="32" rx="8" ry="4" fill="var(--pastel-violet)" opacity="0.6"/>
    <ellipse cx="62" cy="32" rx="8" ry="4" fill="var(--pastel-violet)" opacity="0.6"/>
    <circle cx="50" cy="18" r="2.5" fill="var(--rose-700)"/>
    <circle cx="48.5" cy="16.5" r="0.8" fill="white"/>
    <circle cx="51.5" cy="16.5" r="0.8" fill="white"/>
  </svg>
</div>

<!-- Modal avec JavaScript COMPLET intégré -->
<div class="modal-overlay" id="modal-overlay">
  <div class="modal-content">
    <button class="modal-close" onclick="closePopup()">×</button>
    
    <h2 class="modal-title"><?php echo esc_html(isabel_get_option('isabel_form_title', 'Réservez votre rendez-vous')); ?></h2>
    <p class="modal-subtitle">Première consultation personnalisée</p>

    <form class="modal-form" id="contact-form">
      <div class="form-group">
        <label class="form-label">Nom complet</label>
        <input type="text" class="form-input" placeholder="Votre nom et prénom" name="name" required>
      </div>

      <div class="form-group">
        <label class="form-label">Adresse email</label>
        <input type="email" class="form-input" placeholder="votre@email.com" name="email" required>
      </div>

      <div class="form-group">
        <label class="form-label">Téléphone</label>
        <input type="tel" class="form-input" placeholder="06 12 34 56 78" name="phone" required>
      </div>

      <div class="form-group">
        <label class="form-label">Type d'accompagnement souhaité</label>
        <select class="form-input" name="service" required>
          <option value="">Choisissez une option</option>
          <option value="<?php echo esc_attr(isabel_get_option('isabel_service1_title', 'Coaching Personnel')); ?>"><?php echo esc_html(isabel_get_option('isabel_service1_title', 'Coaching Personnel')); ?></option>
          <option value="<?php echo esc_attr(isabel_get_option('isabel_service2_title', 'Accompagnement VAE')); ?>"><?php echo esc_html(isabel_get_option('isabel_service2_title', 'Accompagnement VAE')); ?></option>
          <option value="<?php echo esc_attr(isabel_get_option('isabel_service3_title', 'Hypnocoaching')); ?>"><?php echo esc_html(isabel_get_option('isabel_service3_title', 'Hypnocoaching')); ?></option>
          <option value="Première consultation">Première consultation</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Votre situation et objectifs</label>
        <textarea class="form-input form-textarea" placeholder="Décrivez-nous brièvement votre situation actuelle et ce que vous aimeriez accomplir..." rows="4" name="message"></textarea>
      </div>

      <div class="form-note">
        <?php 
        $form_note = isabel_get_option('isabel_form_note', '💼 Première consultation pour faire connaissance et définir vos besoins ensemble.');
        echo wp_kses($form_note, array('strong' => array(), 'br' => array(), 'em' => array()));
        ?>
      </div>

      <button type="submit" class="form-submit" id="submit-btn">
        <?php echo esc_html(isabel_get_option('isabel_form_button', 'Confirmer ma demande de rendez-vous')); ?>
      </button>
      
      <div id="form-messages" style="margin-top: 1rem;"></div>
    </form>
  </div>
</div>

<!-- SCRIPT COMPLET INTÉGRÉ -->
<script>
// Configuration AJAX WordPress
const ISABEL_CONFIG = {
    ajax_url: '<?php echo admin_url('admin-ajax.php'); ?>',
    nonce: '<?php echo wp_create_nonce('isabel_contact_nonce'); ?>',
    debug: <?php echo (defined('WP_DEBUG') && WP_DEBUG) ? 'true' : 'false'; ?>
};

// Fonctions globales pour les boutons
window.openPopup = function() {
    const overlay = document.getElementById('modal-overlay');
    if (overlay) {
        overlay.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            overlay.classList.add('active');
        }, 10);
    }
};

window.closePopup = function() {
    const overlay = document.getElementById('modal-overlay');
    if (overlay) {
        overlay.classList.remove('active');
        document.body.style.overflow = '';
        setTimeout(() => {
            overlay.style.display = 'none';
        }, 300);
    }
};

// Initialisation au chargement du DOM
document.addEventListener('DOMContentLoaded', function() {
    initNavigation();
    initModal();
    initContactForm();
});

function initNavigation() {
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');

    if (!navToggle || !navMenu) return;

    navToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
        const isOpen = navMenu.classList.contains('active');
        navToggle.setAttribute('aria-expanded', isOpen);
    });

    navMenu.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function() {
            if (navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
                navToggle.setAttribute('aria-expanded', 'false');
            }
        });
    });
}

function initModal() {
    const overlay = document.getElementById('modal-overlay');
    if (!overlay) return;

    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
            window.closePopup();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && overlay.classList.contains('active')) {
            window.closePopup();
        }
    });
}

function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        handleFormSubmission(form);
    });
}

function handleFormSubmission(form) {
    const submitBtn = document.getElementById('submit-btn');
    const originalText = submitBtn.textContent;
    
    const formData = new FormData(form);
    const data = {
        name: formData.get('name')?.trim() || '',
        email: formData.get('email')?.trim() || '',
        phone: formData.get('phone')?.trim() || '',
        service: formData.get('service')?.trim() || '',
        message: formData.get('message')?.trim() || ''
    };
    
    if (!data.name || !data.email || !data.phone) {
        showMessage('Veuillez remplir tous les champs obligatoires.', 'error');
        return;
    }
    
    if (!isValidEmail(data.email)) {
        showMessage('Veuillez entrer une adresse email valide.', 'error');
        return;
    }
    
    submitBtn.disabled = true;
    submitBtn.textContent = 'Envoi en cours...';
    
    const ajaxData = new FormData();
    ajaxData.append('action', 'isabel_contact');
    ajaxData.append('nonce', ISABEL_CONFIG.nonce);
    ajaxData.append('name', data.name);
    ajaxData.append('email', data.email);
    ajaxData.append('phone', data.phone);
    ajaxData.append('service', data.service);
    ajaxData.append('message', data.message);
    
    fetch(ISABEL_CONFIG.ajax_url, {
        method: 'POST',
        body: ajaxData
    })
    .then(response => response.text())
    .then(text => {
        try {
            const responseData = JSON.parse(text);
            if (responseData.success) {
                showMessage(responseData.data, 'success');
                form.reset();
                setTimeout(() => {
                    window.closePopup();
                }, 2000);
            } else {
                showMessage(responseData.data || 'Erreur lors de l\'envoi.', 'error');
            }
        } catch (e) {
            showMessage('Erreur de communication avec le serveur.', 'error');
        }
    })
    .catch(error => {
        showMessage('Erreur de connexion. Veuillez réessayer.', 'error');
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
    });
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showMessage(message, type) {
    const messagesDiv = document.getElementById('form-messages');
    const color = type === 'success' ? '#00a32a' : '#e74c3c';
    const icon = type === 'success' ? '✅' : '❌';
    
    messagesDiv.innerHTML = `
        <div style="
            padding: 15px; 
            background: ${color}; 
            color: white; 
            border-radius: 8px; 
            margin-top: 15px;
            text-align: center;
            font-weight: 500;
        ">
            ${icon} ${message}
        </div>
    `;
    
    setTimeout(() => {
        messagesDiv.innerHTML = '';
    }, 5000);
}
</script>

<?php
function isabel_default_menu() {
  echo '<ul>';
  echo '<li><a href="' . home_url('/') . '">Accueil</a></li>';
  echo '<li><a href="' . home_url('/coaching-personnel') . '">Coaching Personnel</a></li>';
  echo '<li><a href="' . home_url('/accompagnement-vae') . '">Accompagnement VAE</a></li>';
  echo '<li><a href="' . home_url('/hypnocoaching') . '">Hypnocoaching</a></li>';
  echo '<li><a href="#temoignages">Témoignages</a></li>';
  echo '<li><a href="#contact">Contact</a></li>';
  echo '</ul>';
}
?>

<?php get_footer(); ?>