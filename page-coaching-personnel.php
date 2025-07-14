<?php get_header(); ?>

<!-- Page Header -->
<section class="page-header">
  <div class="section-container">
    <h1><?php echo esc_html(isabel_get_option('isabel_coaching_title', 'Coaching Personnel')); ?></h1>
    <p class="subtitle"><?php echo esc_html(isabel_get_option('isabel_coaching_subtitle', 'Révélez votre potentiel et transformez votre vie personnelle et professionnelle')); ?></p>
  </div>
</section>

<!-- Page Content -->
<div class="page-content">
  <div class="content-section">
    <h2>Qu'est-ce que le coaching personnel ?</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_intro', 'Le coaching personnel est un accompagnement sur mesure qui vous aide à clarifier vos objectifs, développer votre potentiel et créer la vie que vous désirez vraiment. Grâce à des outils concrets et un soutien bienveillant, je vous guide vers une transformation durable et authentique.')); ?></p>
    
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_description', 'Que vous souhaitiez améliorer votre confiance en vous, changer de carrière, améliorer vos relations ou simplement mieux vous connaître, le coaching personnel vous offre l\'espace et les ressources nécessaires pour avancer sereinement vers vos aspirations.')); ?></p>
  </div>

  <!-- Benefits Grid -->
  <div class="benefits-grid">
    <div class="benefit-card">
      <h3><span class="benefit-icon">🎯</span> Clarté des objectifs</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_coaching_benefit1', 'Définissez clairement vos priorités et tracez un chemin précis vers vos aspirations personnelles et professionnelles.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">💪</span> Confiance en soi</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_coaching_benefit2', 'Développez une estime de soi solide et apprenez à croire en vos capacités pour relever tous les défis.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">🔄</span> Gestion du changement</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_coaching_benefit3', 'Naviguez sereinement dans les transitions de vie et transformez les obstacles en opportunités de croissance.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">⚖️</span> Équilibre vie pro/perso</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_coaching_benefit4', 'Trouvez l\'harmonie parfaite entre vos ambitions professionnelles et votre épanouissement personnel.')); ?></p>
    </div>
  </div>

  <!-- Process Steps -->
  <div class="process-steps">
    <h3>Mon processus d'accompagnement</h3>
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
    <h2>Pour qui ?</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_who', 'Le coaching personnel s\'adresse à toute personne qui souhaite évoluer, qu\'elle soit en questionnement professionnel, en transition de vie, ou simplement désireuse d\'améliorer sa qualité de vie. Que vous soyez entrepreneur, salarié, en reconversion ou en recherche de sens, cet accompagnement vous aidera à avancer avec clarté et confiance.')); ?></p>
  </div>

  <div class="content-section">
    <h2>Mes domaines d'expertise</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_expertise', 'Fort de mon expérience et de ma certification professionnelle, je vous accompagne sur diverses thématiques : développement de la confiance en soi, gestion du stress et des émotions, amélioration des relations interpersonnelles, définition et atteinte d\'objectifs, équilibre vie professionnelle/personnelle, préparation aux entretiens et prise de parole en public.')); ?></p>
  </div>

  <!-- CTA Section -->
  <div class="cta-service">
    <h3><?php echo esc_html(isabel_get_option('isabel_coaching_cta_title', 'Prêt(e) à commencer votre transformation ?')); ?></h3>
    <p><?php echo esc_html(isabel_get_option('isabel_coaching_cta_text', 'Contactez-moi pour discuter de vos objectifs et découvrir comment le coaching personnel peut vous aider à les atteindre.')); ?></p>
    <button class="btn-cta" onclick="openPopup()">Prendre rendez-vous</button>
  </div>
</div>

<?php get_footer(); ?>