<?php get_header(); ?>

<!-- Page Header -->
<section class="page-header">
  <div class="section-container">
    <h1><?php echo esc_html(isabel_get_option('isabel_consultation_title', 'Consultation Découverte')); ?></h1>
    <p class="subtitle"><?php echo esc_html(isabel_get_option('isabel_consultation_subtitle', 'Première rencontre gratuite pour définir ensemble votre parcours')); ?></p>
  </div>
</section>

<!-- Page Content -->
<div class="page-content">
  <div class="content-section">
    <h2>Qu'est-ce que la consultation découverte ?</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_consultation_intro', 'La consultation découverte est un moment privilégié pour faire connaissance et comprendre vos besoins spécifiques. C\'est une première approche bienveillante qui vous permet de découvrir mes méthodes d\'accompagnement sans engagement.')); ?></p>
    
    <p><?php echo esc_html(isabel_get_option('isabel_consultation_description', 'Durant cette première rencontre gratuite de 30 minutes, nous prenons le temps d\'échanger sur votre situation, vos objectifs et vos attentes. C\'est l\'occasion idéale pour poser toutes vos questions et voir si mon approche vous correspond.')); ?></p>
  </div>

  <!-- Benefits Grid -->
  <div class="benefits-grid">
    <div class="benefit-card">
      <h3><span class="benefit-icon">💬</span> Échange personnalisé</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_consultation_benefit1', 'Échange personnalisé pour comprendre votre situation et vos objectifs de vie ou professionnels.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">🎯</span> Approche adaptée</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_consultation_benefit2', 'Présentation des différentes approches de coaching adaptées à votre profil et vos besoins.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">🧰</span> Premiers outils</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_consultation_benefit3', 'Conseils immédiats et premiers outils pour commencer votre réflexion personnelle.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">🗺️</span> Plan personnalisé</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_consultation_benefit4', 'Définition ensemble du parcours d\'accompagnement le plus adapté à votre situation.')); ?></p>
    </div>
  </div>

  <!-- Process Steps -->
  <div class="process-steps">
    <h3>Déroulement de la consultation</h3>
    <div class="steps-list">
      <div class="step-item">
        <div class="step-number">1</div>
        <div class="step-content">
          <h4>Accueil et présentation</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_consultation_step1', 'Accueil et présentation mutuelle pour créer un climat de confiance et d\'écoute bienveillante.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">2</div>
        <div class="step-content">
          <h4>Écoute de vos besoins</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_consultation_step2', 'Écoute active de votre situation, vos défis actuels et vos aspirations pour l\'avenir.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">3</div>
        <div class="step-content">
          <h4>Exploration des solutions</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_consultation_step3', 'Exploration des différentes possibilités d\'accompagnement et explication de mes méthodes.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">4</div>
        <div class="step-content">
          <h4>Proposition personnalisée</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_consultation_step4', 'Proposition d\'un plan d\'accompagnement personnalisé adapté à vos besoins et votre rythme.')); ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Detailed Content -->
  <div class="content-section">
    <h2>Modalités pratiques</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_consultation_duration', 'Cette consultation dure environ 30 minutes et se déroule par téléphone ou en visioconférence, selon votre préférence. Elle est entièrement gratuite et sans engagement de votre part.')); ?></p>
  </div>

  <div class="content-section">
    <h2>Ce que vous en retirerez</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_consultation_benefits', 'Cette rencontre vous permet de poser toutes vos questions et de découvrir comment mes services peuvent vous aider à atteindre vos objectifs. Vous repartirez avec une vision plus claire de votre situation et des premières pistes de réflexion concrètes.')); ?></p>
  </div>

  <!-- Highlight Box -->
  <div style="background: linear-gradient(135deg, var(--pastel-lavender), var(--pastel-pink)); border-radius: 16px; padding: 2rem; margin: 3rem 0; text-align: center;">
    <h3 style="color: var(--rose-700); margin-bottom: 1rem; font-size: 1.3rem;">🎁 Consultation 100% gratuite</h3>
    <p style="color: var(--text-dark); font-size: 1.1rem; margin: 0; font-weight: 500;">
      Cette première rencontre est entièrement offerte et sans aucun engagement. 
      C'est mon cadeau pour vous permettre de découvrir mes services en toute sérénité.
    </p>
  </div>

  <!-- CTA Section -->
  <div class="cta-service">
    <h3><?php echo esc_html(isabel_get_option('isabel_consultation_cta_title', 'Prêt(e) à faire le premier pas ?')); ?></h3>
    <p><?php echo esc_html(isabel_get_option('isabel_consultation_cta_text', 'Réservez dès maintenant votre consultation découverte gratuite et commençons ensemble votre parcours de transformation.')); ?></p>
    <button class="btn-cta" onclick="openPopup()">Réserver ma consultation gratuite</button>
  </div>
</div>

<?php get_footer(); ?>