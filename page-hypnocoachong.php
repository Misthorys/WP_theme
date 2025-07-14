<?php get_header(); ?>

<!-- Page Header -->
<section class="page-header">
  <div class="section-container">
    <h1><?php echo esc_html(isabel_get_option('isabel_hypno_title', 'Hypnocoaching')); ?></h1>
    <p class="subtitle"><?php echo esc_html(isabel_get_option('isabel_hypno_subtitle', 'Libérez-vous de vos blocages en profondeur grâce à l\'alliance du coaching et de l\'hypnose')); ?></p>
  </div>
</section>

<!-- Page Content -->
<div class="page-content">
  <div class="content-section">
    <h2>Qu'est-ce que l'hypnocoaching ?</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_hypno_intro', 'L\'hypnocoaching est une approche innovante qui combine les bienfaits du coaching traditionnel avec la puissance de l\'hypnose thérapeutique. Cette méthode permet d\'accéder aux ressources profondes de votre inconscient pour lever les blocages, modifier les schémas limitants et installer de nouveaux comportements positifs.')); ?></p>
    
    <p><?php echo esc_html(isabel_get_option('isabel_hypno_description', 'En état d\'hypnose, votre esprit devient plus réceptif aux changements positifs. Cette approche douce et respectueuse vous permet de transformer en profondeur vos croyances limitantes et d\'atteindre vos objectifs plus rapidement et durablement.')); ?></p>
  </div>

  <!-- Benefits Grid -->
  <div class="benefits-grid">
    <div class="benefit-card">
      <h3><span class="benefit-icon">🧠</span> Accès à l'inconscient</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_hypno_benefit1', 'Travaillez directement avec votre inconscient pour identifier et transformer les blocages à leur source.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">⚡</span> Résultats rapides</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_hypno_benefit2', 'Obtenez des changements durables en moins de séances grâce à l\'efficacité de l\'hypnose thérapeutique.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">🌱</span> Transformation profonde</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_hypno_benefit3', 'Modifiez vos schémas de pensée limitants et installez de nouveaux automatismes positifs.')); ?></p>
    </div>
    
    <div class="benefit-card">
      <h3><span class="benefit-icon">🛡️</span> Approche douce</h3>
      <p><?php echo esc_html(isabel_get_option('isabel_hypno_benefit4', 'Méthode naturelle et respectueuse qui vous permet de rester maître de vos choix à tout moment.')); ?></p>
    </div>
  </div>

  <!-- Process Steps -->
  <div class="process-steps">
    <h3>Déroulement d'une séance d'hypnocoaching</h3>
    <div class="steps-list">
      <div class="step-item">
        <div class="step-number">1</div>
        <div class="step-content">
          <h4>Entretien préliminaire</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_hypno_step1', 'Discussion pour comprendre vos objectifs, vos blocages et adapter la séance à vos besoins spécifiques.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">2</div>
        <div class="step-content">
          <h4>Induction hypnotique</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_hypno_step2', 'Accompagnement vers un état de relaxation profonde où votre inconscient devient plus réceptif.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">3</div>
        <div class="step-content">
          <h4>Travail thérapeutique</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_hypno_step3', 'Utilisation de techniques spécifiques pour lever les blocages et installer de nouveaux comportements positifs.')); ?></p>
        </div>
      </div>
      
      <div class="step-item">
        <div class="step-number">4</div>
        <div class="step-content">
          <h4>Retour et intégration</h4>
          <p><?php echo esc_html(isabel_get_option('isabel_hypno_step4', 'Retour à l\'état de veille normale et échange sur l\'expérience vécue pour optimiser l\'intégration.')); ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Detailed Content -->
  <div class="content-section">
    <h2>Domaines d'application</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_hypno_applications', 'L\'hypnocoaching est particulièrement efficace pour : gérer le stress et l\'anxiété, surmonter les phobies et les peurs, améliorer la confiance en soi, arrêter de fumer ou perdre du poids, améliorer le sommeil, gérer la douleur, préparer des examens ou des entretiens, développer la créativité et la performance, traiter les traumatismes légers et les blocages émotionnels.')); ?></p>
  </div>

  <div class="content-section">
    <h2>Mythes et réalités sur l'hypnose</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_hypno_myths', 'Contrairement aux idées reçues, l\'hypnose thérapeutique n\'a rien à voir avec l\'hypnose de spectacle. Vous restez conscient(e) et maître(sse) de vos choix à tout moment. L\'hypnose est un état naturel que nous expérimentons tous quotidiennement. C\'est un outil puissant de développement personnel qui respecte votre rythme et vos valeurs.')); ?></p>
  </div>

  <div class="content-section">
    <h2>Ma formation et mon approche</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_hypno_formation', 'Certifiée en hypnose thérapeutique, je pratique une approche éthique et bienveillante. Chaque séance est adaptée à votre personnalité et à vos objectifs. Je veille à créer un environnement de confiance et de sécurité pour que vous puissiez explorer et transformer vos blocages en toute sérénité.')); ?></p>
  </div>

  <div class="content-section">
    <h2>Contre-indications</h2>
    <p><?php echo esc_html(isabel_get_option('isabel_hypno_contraindications', 'L\'hypnose est contre-indiquée en cas de troubles psychiatriques sévères, de psychose, de troubles dissociatifs ou de dépendances lourdes. Un entretien préalable permet d\'évaluer si cette approche vous convient. En cas de doute, je vous orienterai vers un professionnel de santé adapté.')); ?></p>
  </div>

  <!-- CTA Section -->
  <div class="cta-service">
    <h3><?php echo esc_html(isabel_get_option('isabel_hypno_cta_title', 'Prêt(e) à libérer votre potentiel ?')); ?></h3>
    <p><?php echo esc_html(isabel_get_option('isabel_hypno_cta_text', 'Découvrez la puissance de l\'hypnocoaching lors d\'une séance découverte. Ensemble, nous explorerons comment cette approche peut vous aider à atteindre vos objectifs.')); ?></p>
    <button class="btn-cta" onclick="openPopup()">Découvrir l'hypnocoaching</button>
  </div>
</div>

<?php get_footer(); ?>