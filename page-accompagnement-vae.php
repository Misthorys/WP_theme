<?php get_header(); ?>

<!-- Page Header -->
<section class="page-header">
  <div class="section-container">
    <h1><?php echo esc_html(isabel_get_option('isabel_vae_title', 'Accompagnement VAE')); ?></h1>
    <p class="subtitle"><?php echo esc_html(isabel_get_option('isabel_vae_subtitle', 'Valorisez votre expérience et obtenez une reconnaissance officielle de vos compétences')); ?></p>
  </div>
</section>

<!-- Page Content -->
<div class="page-content">
  <div class="content-section">
    <h2>Qu'est-ce que la VAE ?</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_vae_intro', 'La Validation des Acquis de l\'Expérience (VAE) est un dispositif qui permet de faire reconnaître officiellement vos compétences acquises par l\'expérience professionnelle. Cette démarche vous permet d\'obtenir un diplôme, un titre ou une certification sans retourner en formation.')); ?></p>
    
    <p><?php echo esc_html(isabel_get_option('isabel_vae_description', 'Avec au moins 3 ans d\'expérience dans le domaine visé, vous pouvez prétendre à une VAE. C\'est une opportunité unique de valoriser votre parcours et d\'évoluer professionnellement sans contrainte de temps ou de lieu.')); ?></p>
  </div>

  <!-- Benefits Grid -->
  <div class="benefits-grid">
    <div class="benefit-card">
      <h3><span class="benefit-icon">🎓</span> Reconnaissance officielle</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_vae_benefit1', 'Obtenez un diplôme ou une certification reconnue par l\'État, équivalente à une formation traditionnelle.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">⚡</span> Gain de temps</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_vae_benefit2', 'Évitez de reprendre des études longues grâce à la valorisation de votre expérience existante.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">💼</span> Evolution professionnelle</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_vae_benefit3', 'Accédez à de nouvelles opportunités de carrière et augmentez votre employabilité.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">💰</span> Rentabilité</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_vae_benefit4', 'Investissement réduit comparé à une formation complète, avec un retour sur investissement rapide.')); ?></p>
    </div>
  </div>

  <!-- Process Steps -->
  <div class="process-steps">
    <h3>Les étapes de votre VAE</h3>
    <div class="steps-list">
      <div class="step-item">
        <div class="step-number">1</div>
        <div class="step-content">
          <h4>Étude de faisabilité</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_vae_step1', 'Analyse de votre parcours et identification du diplôme le plus adapté à votre expérience professionnelle.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">2</div>
        <div class="step-content">
          <h4>Constitution du dossier</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_vae_step2', 'Aide à la rédaction du livret 1 (recevabilité) et accompagnement dans les démarches administratives.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">3</div>
        <div class="step-content">
          <h4>Rédaction du livret 2</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_vae_step3', 'Accompagnement personnalisé pour la rédaction du dossier de validation détaillant vos compétences.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">4</div>
        <div class="step-content">
          <h4>Préparation au jury</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_vae_step4', 'Simulation d\'entretien et conseils pour présenter votre dossier avec confiance devant le jury.')); ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Detailed Content -->
  <div class="content-section">
    <h2>Qui peut bénéficier de la VAE ?</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_vae_who', 'Toute personne justifiant d\'au moins 3 ans d\'expérience professionnelle, bénévole ou de formation en rapport avec le diplôme visé. Que vous soyez salarié, indépendant, demandeur d\'emploi ou bénévole, la VAE est accessible à tous, quel que soit votre âge, votre niveau d\'études ou votre statut.')); ?></p>
  </div>

  <div class="content-section">
    <h2>Mon expertise VAE</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_vae_expertise', 'Forte de mon expérience en accompagnement VAE, je vous guide dans toutes les étapes de votre démarche. Mon approche personnalisée vous permet de mettre en valeur vos compétences de manière optimale et d\'maximiser vos chances de réussite. Je connais les attentes des jurys et les spécificités de chaque diplôme pour vous accompagner efficacement.')); ?></p>
  </div>

  <div class="content-section">
    <h2>Diplômes et certifications concernés</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_vae_diplomas', 'La VAE permet d\'obtenir des diplômes de tous niveaux : CAP, Bac professionnel, BTS, DUT, Licence, Master, titres professionnels, certificats de qualification professionnelle (CQP), et bien d\'autres. Nous identifierons ensemble le diplôme le plus adapté à votre profil et à vos objectifs professionnels.')); ?></p>
  </div>

  <!-- CTA Section -->
  <div class="cta-service">
    <h3><?php echo esc_html(isabel_get_option('isabel_vae_cta_title', 'Prêt(e) à valoriser votre expérience ?')); ?></h3>
    <p><?php echo esc_html(isabel_get_option('isabel_vae_cta_text', 'Contactez-moi pour une première évaluation de votre projet VAE et découvrons ensemble les possibilités qui s\'offrent à vous.')); ?></p>
    <button class="btn-cta" onclick="openPopup()">Évaluer mon projet VAE</button>
  </div>
</div>

<?php get_footer(); ?>