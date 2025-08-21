<?php get_header(); ?>

<!-- Page Header avec bouton retour -->
<section class="page-header">
  <div class="section-container">
    <!-- Bouton retour -->
    <div class="back-to-home">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="back-btn">
        <span class="back-arrow">←</span>
        <span>Retour à l'accueil</span>
      </a>
    </div>
    
    <h1><?php echo esc_html(isabel_get_option('isabel_coaching_title', 'Coaching Personnel')); ?></h1>
    <p class="subtitle"><?php echo esc_html(isabel_get_option('isabel_coaching_subtitle', 'Révélez votre potentiel et transformez votre vie personnelle et professionnelle')); ?></p>
  </div>
</section>

<!-- Page Content -->
<div class="page-content">
  <!-- Section Certification Qualiopi - MODIFIABLE DEPUIS LE CUSTOMIZER -->
  <?php isabel_display_qualiopi_section('page'); ?>

  <div class="content-section">
    <h2><?php echo esc_html(isabel_get_option('isabel_coaching_section1_title', 'Qu\'est-ce que le coaching personnel ?')); ?></h2>
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_intro', 'Le coaching personnel est un accompagnement sur mesure qui vous aide à clarifier vos objectifs, développer votre potentiel et créer la vie que vous désirez vraiment.')); ?></p>
    
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_description', 'Que vous souhaitiez améliorer votre confiance en vous, changer de carrière, améliorer vos relations ou simplement mieux vous connaître, le coaching personnel vous offre l\'espace et les ressources nécessaires.')); ?></p>
  </div>

  <!-- Nouvelle grille avec 2 boxes texte + 2 boxes images - TAILLES CORRIGÉES -->
  <div class="benefits-grid-fixed">
    <!-- Box 1 - Texte uniquement -->
    <div class="benefit-card-fixed text-card-fixed">
      <h3>
        <span class="benefit-icon"><?php echo esc_html(isabel_get_option('isabel_coaching_box1_icon', '💬')); ?></span> 
        <?php echo esc_html(isabel_get_option('isabel_coaching_box1_title', 'Échange personnalisé')); ?>
      </h3>
      <p><?php echo esc_html(isabel_get_option('isabel_coaching_box1_text', 'Échange personnalisé pour comprendre votre situation et vos objectifs de vie ou professionnels.')); ?></p>
    </div>
    
    <!-- Box 2 - Image pure (remplit toute la box) -->
    <div class="benefit-card-fixed image-only-card-fixed">
      <?php 
      $box2_image = isabel_get_option('isabel_coaching_box2_image', '');
      if (!empty($box2_image)) {
        echo '<div class="image-wrapper">';
        echo '<img src="' . esc_url($box2_image) . '" alt="Image coaching" class="full-box-image-fixed" />';
        echo '</div>';
      } else {
        echo '<div class="full-box-placeholder-fixed">';
        echo '<div class="placeholder-content">';
        echo '<span class="placeholder-text">IMAGE</span>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
    
    <!-- Box 3 - Texte uniquement -->
    <div class="benefit-card-fixed text-card-fixed">
      <h3>
        <span class="benefit-icon"><?php echo esc_html(isabel_get_option('isabel_coaching_box3_icon', '🧰')); ?></span> 
        <?php echo esc_html(isabel_get_option('isabel_coaching_box3_title', 'Premiers outils')); ?>
      </h3>
      <p><?php echo esc_html(isabel_get_option('isabel_coaching_box3_text', 'Conseils immédiats et premiers outils pour commencer votre réflexion personnelle.')); ?></p>
    </div>
    
    <!-- Box 4 - Image pure (remplit toute la box) -->
    <div class="benefit-card-fixed image-only-card-fixed">
      <?php 
      $box4_image = isabel_get_option('isabel_coaching_box4_image', '');
      if (!empty($box4_image)) {
        echo '<div class="image-wrapper">';
        echo '<img src="' . esc_url($box4_image) . '" alt="Image coaching" class="full-box-image-fixed" />';
        echo '</div>';
      } else {
        echo '<div class="full-box-placeholder-fixed">';
        echo '<div class="placeholder-content">';
        echo '<span class="placeholder-text">IMAGE</span>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>

  <!-- Process Steps -->
  <div class="process-steps">
    <h3><?php echo esc_html(isabel_get_option('isabel_coaching_process_title', 'Mon processus d\'accompagnement')); ?></h3>
    <div class="steps-list">
      <div class="step-item">
        <div class="step-number">1</div>
        <div class="step-content">
          <h4>Évaluation initiale</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_coaching_step1', 'Nous explorons ensemble votre situation actuelle, vos défis et vos aspirations pour définir un plan d\'action personnalisé.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">2</div>
        <div class="step-content">
          <h4>Définition d'objectifs</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_coaching_step2', 'Nous clarifions vos objectifs SMART et établissons une feuille de route claire avec des étapes concrètes.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">3</div>
        <div class="step-content">
          <h4>Séances d'accompagnement</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_coaching_step3', 'Sessions régulières pour travailler sur vos blocages, développer de nouvelles compétences et avancer vers vos objectifs.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">4</div>
        <div class="step-content">
          <h4>Suivi et ajustements</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_coaching_step4', 'Évaluation continue de vos progrès et adaptation de la stratégie pour optimiser votre réussite.')); ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Detailed Content -->
  <div class="content-section">
    <h2><?php echo esc_html(isabel_get_option('isabel_coaching_section2_title', 'Pour qui ?')); ?></h2>
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_who', 'Le coaching personnel s\'adresse à toute personne qui souhaite évoluer, qu\'elle soit en questionnement professionnel, en transition de vie, ou simplement désireuse d\'améliorer sa qualité de vie.')); ?></p>
  </div>

  <div class="content-section">
    <h2><?php echo esc_html(isabel_get_option('isabel_coaching_section3_title', 'Mes domaines d\'expertise')); ?></h2>
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_expertise', 'Fort de mon expérience et de ma certification professionnelle, je vous accompagne sur diverses thématiques : développement de la confiance en soi, gestion du stress et des émotions.')); ?></p>
  </div>

  <!-- CTA Section -->
  <div class="cta-service">
    <h3><?php echo esc_html(isabel_get_option('isabel_coaching_cta_title', 'Prêt(e) à commencer votre transformation ?')); ?></h3>
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_cta_text', 'Contactez-moi pour discuter de vos objectifs et découvrir comment le coaching personnel peut vous aider.')); ?></p>
    <button class="btn-cta" onclick="openPopup()"><?php echo esc_html(isabel_get_option('isabel_coaching_cta_button', 'Prendre rendez-vous')); ?></button>
  </div>
</div>

<!-- CSS pour le bouton retour et les boxes -->
<style>
/* Bouton retour */
.back-to-home {
  margin-bottom: 2rem;
}

.back-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  color: rgba(255, 255, 255, 0.9);
  text-decoration: none;
  font-size: 0.9rem;
  font-weight: 500;
  padding: 0.5rem 1rem;
  border-radius: 25px;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  transition: all 0.3s ease;
}

.back-btn:hover {
  background: rgba(255, 255, 255, 0.2);
  color: white;
  transform: translateX(-3px);
}

.back-arrow {
  font-size: 1.1rem;
  transition: transform 0.3s ease;
}

.back-btn:hover .back-arrow {
  transform: translateX(-2px);
}

/* Grille avec tailles réduites */
.benefits-grid-fixed {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
  margin: 2rem 0;
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

/* Box générale - TAILLE RÉDUITE */
.benefit-card-fixed {
  border-radius: 12px;
  border: 2px solid var(--rose-300);
  transition: all 0.3s ease;
  height: 180px; /* HAUTEUR FIXE RÉDUITE */
  overflow: hidden;
}

.benefit-card-fixed:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(196, 125, 217, 0.3);
}

/* Box texte */
.text-card-fixed {
  background: linear-gradient(135deg, var(--white), var(--rose-300));
  padding: 1.5rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
}

.text-card-fixed h3 {
  font-size: 1.1rem;
  font-weight: 600;
  color: var(--text-dark);
  margin-bottom: 0.75rem;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}

.text-card-fixed .benefit-icon {
  font-size: 1.3rem;
}

.text-card-fixed p {
  color: var(--text-light);
  line-height: 1.5;
  font-size: 0.9rem;
  margin: 0;
}

/* Box image pure - CORRIGÉE */
.image-only-card-fixed {
  padding: 0 !important;
  position: relative;
  background: var(--rose-300);
  opacity: 0.8;
}

.image-wrapper {
  width: 100%;
  height: 100%;
  position: relative;
  overflow: hidden;
}

.full-box-image-fixed {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transition: transform 0.3s ease;
  display: block;
}

.full-box-image-fixed:hover {
  transform: scale(1.05);
}

/* Placeholder pour les images manquantes */
.full-box-placeholder-fixed {
  width: 100%;
  height: 100%;
  background: var(--rose-300);
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

.placeholder-content {
  text-align: center;
}

.placeholder-text {
  color: var(--rose-700);
  font-size: 16px;
  font-weight: bold;
  letter-spacing: 1px;
}

/* Responsive */
@media (max-width: 768px) {
  .benefits-grid-fixed {
    grid-template-columns: 1fr;
    gap: 1rem;
    max-width: 100%;
  }
  
  .benefit-card-fixed {
    height: 150px; /* Plus petit sur mobile */
  }
  
  .text-card-fixed {
    padding: 1.25rem;
  }
  
  .text-card-fixed h3 {
    font-size: 1rem;
  }
  
  .text-card-fixed p {
    font-size: 0.85rem;
  }
  
  .back-btn {
    font-size: 0.85rem;
    padding: 0.4rem 0.8rem;
  }
}

@media (max-width: 480px) {
  .benefit-card-fixed {
    height: 140px; /* Encore plus petit sur très petit écran */
  }
  
  .text-card-fixed {
    padding: 1rem;
  }
}
</style>

<?php get_footer(); ?>