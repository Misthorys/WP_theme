<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 📋 PAGE CONSULTATION DÉCOUVERTE
 * Personnalisation complète de la page consultation découverte
 * Quatrième page de service détaillée
 */

function isabel_customizer_consultation($wp_customize) {
    
    // ==========================================
    // SECTION : PAGE CONSULTATION DÉCOUVERTE
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_consultation_section',
        '📋 Page Consultation Découverte',
        'Personnalisez entièrement votre page de consultation découverte',
        94 // Priorité 94 = pages détaillées
    );
    
    // ==========================================
    // EN-TÊTE DE LA PAGE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_title',
        'isabel_consultation_section',
        'Titre de la page',
        'Le titre principal affiché en haut de la page.
Exemple : "Consultation Découverte", "Rendez-vous Gratuit"

📢 Où ça apparaît : Grand titre en haut de la page consultation.',
        'Consultation Découverte'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_subtitle',
        'isabel_consultation_section',
        'Sous-titre de la page',
        'Phrase d\'accroche sous le titre principal.
Exemple : "Première rencontre gratuite pour définir ensemble votre parcours"

💫 Où ça apparaît : Sous le titre principal, en plus petit.',
        'Première rencontre gratuite pour définir ensemble votre parcours'
    );
    
    // ==========================================
    // SECTION INTRODUCTION
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_section1_title',
        'isabel_consultation_section',
        'Titre section introduction',
        'Titre de votre première section de contenu.
Exemple : "Qu\'est-ce que la consultation découverte ?", "Comment ça se passe"',
        'Qu\'est-ce que la consultation découverte ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_intro',
        'isabel_consultation_section',
        'Texte d\'introduction',
        'Premier paragraphe qui explique la consultation découverte.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : La consultation découverte est un moment **privilégié** pour faire connaissance
et comprendre vos besoins spécifiques.',
        'La consultation découverte est un moment privilégié pour faire connaissance et comprendre vos besoins spécifiques.'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_description',
        'isabel_consultation_section',
        'Description détaillée',
        'Deuxième paragraphe avec plus de détails sur le déroulement.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.',
        'Durant cette première rencontre gratuite de 30 minutes, nous prenons le temps d\'échanger sur votre situation, vos objectifs et vos attentes.'
    );
    
    // ==========================================
    // BOXES DE BÉNÉFICES (2 texte + 2 images)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_benefits_title',
        'isabel_consultation_section',
        'Titre des bénéfices',
        'Titre au-dessus de vos 4 boxes de bénéfices.
Exemple : "Ce que vous obtenez", "Pourquoi cette consultation"',
        'Déroulement de la consultation'
    );
    
    // Box 1 - Texte
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_box1_icon',
        'isabel_consultation_section',
        'Box 1 - Icône',
        'Icône pour la première box (emoji ou texte court).
Exemple : "💬", "🤝", "01"',
        '💬'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_box1_title',
        'isabel_consultation_section',
        'Box 1 - Titre',
        'Titre de votre premier bénéfice.',
        'Échange personnalisé'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_box1_text',
        'isabel_consultation_section',
        'Box 1 - Texte',
        'Description du premier bénéfice.
Vous pouvez utiliser **texte** en gras.',
        'Échange personnalisé pour comprendre votre situation et vos objectifs de vie ou professionnels.'
    );
    
    // Box 2 - Image
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_box2_icon',
        'isabel_consultation_section',
        'Box 2 - Icône (optionnel)',
        'Icône pour la deuxième box (qui aura une image).',
        '🎯'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_box2_title',
        'isabel_consultation_section',
        'Box 2 - Titre',
        'Titre affiché sur l\'image.',
        'Approche adaptée'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_box2_text',
        'isabel_consultation_section',
        'Box 2 - Texte',
        'Description du deuxième bénéfice.',
        'Présentation des différentes approches de coaching adaptées à votre profil et vos besoins.'
    );
    
    isabel_add_image_control(
        $wp_customize,
        'isabel_consultation_box2_image',
        'isabel_consultation_section',
        'Box 2 - Image',
        'Image pour illustrer ce bénéfice.
Taille recommandée : 400x300 pixels.'
    );
    
    // Box 3 - Texte
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_box3_icon',
        'isabel_consultation_section',
        'Box 3 - Icône',
        'Icône pour la troisième box.',
        '🧰'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_box3_title',
        'isabel_consultation_section',
        'Box 3 - Titre',
        'Titre du troisième bénéfice.',
        'Premiers conseils'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_box3_text',
        'isabel_consultation_section',
        'Box 3 - Texte',
        'Description du troisième bénéfice.',
        'Conseils immédiats et premiers outils pour commencer votre réflexion personnelle.'
    );
    
    // Box 4 - Image
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_box4_icon',
        'isabel_consultation_section',
        'Box 4 - Icône (optionnel)',
        'Icône pour la quatrième box.',
        '🗺️'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_box4_title',
        'isabel_consultation_section',
        'Box 4 - Titre',
        'Titre affiché sur l\'image.',
        'Plan personnalisé'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_box4_text',
        'isabel_consultation_section',
        'Box 4 - Texte',
        'Description du quatrième bénéfice.',
        'Définition ensemble du parcours d\'accompagnement le plus adapté à votre situation.'
    );
    
    isabel_add_image_control(
        $wp_customize,
        'isabel_consultation_box4_image',
        'isabel_consultation_section',
        'Box 4 - Image',
        'Image pour illustrer ce quatrième bénéfice.'
    );
    
    // ==========================================
    // PROCESSUS EN 4 ÉTAPES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_process_title',
        'isabel_consultation_section',
        'Titre du processus',
        'Titre au-dessus de vos 4 étapes.
Exemple : "Déroulement de la consultation", "Comment ça se passe"',
        'Déroulement de la consultation'
    );
    
    // 4 étapes du processus consultation
    $step_defaults = array(
        1 => 'Accueil et présentation mutuelle pour créer un climat de confiance et d\'écoute bienveillante.',
        2 => 'Écoute active de votre situation, vos défis actuels et vos aspirations pour l\'avenir.',
        3 => 'Exploration des différentes possibilités d\'accompagnement et explication de mes méthodes.',
        4 => 'Proposition d\'un plan d\'accompagnement personnalisé adapté à vos besoins et votre rythme.'
    );
    
    for ($i = 1; $i <= 4; $i++) {
        isabel_add_textarea_control(
            $wp_customize,
            "isabel_consultation_step$i",
            'isabel_consultation_section',
            "Étape $i de la consultation",
            "Description de l\'étape $i de votre consultation découverte.
Vous pouvez utiliser **texte** en gras.",
            $step_defaults[$i]
        );
    }
    
    // ==========================================
    // SECTIONS SUPPLÉMENTAIRES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_section2_title',
        'isabel_consultation_section',
        'Titre section 2',
        'Titre de votre deuxième section de contenu.
Exemple : "Modalités pratiques", "Informations pratiques"',
        'Modalités pratiques'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_duration',
        'isabel_consultation_section',
        'Durée et modalités',
        'Informations sur la durée et comment se déroule la consultation.',
        'Cette consultation dure environ 30 minutes et se déroule par téléphone ou en visioconférence, selon votre préférence.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_section3_title',
        'isabel_consultation_section',
        'Titre section 3',
        'Titre de votre troisième section.
Exemple : "Ce que vous en retirerez", "Vos bénéfices"',
        'Ce que vous en retirerez'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_benefits_text',
        'isabel_consultation_section',
        'Bénéfices de la consultation',
        'Expliquez ce que le client va retirer de cette consultation.',
        'Cette rencontre vous permet de poser toutes vos questions et de découvrir comment mes services peuvent vous aider à atteindre vos objectifs.'
    );
    
    // ==========================================
    // ENCADRÉ MISE EN AVANT
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_highlight_title',
        'isabel_consultation_section',
        'Titre encadré mise en avant',
        'Titre de votre encadré spécial (gratuit, sans engagement, etc.).
Exemple : "🎁 Consultation 100% gratuite", "✨ Sans engagement"',
        '🎁 Consultation 100% gratuite'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_highlight_text',
        'isabel_consultation_section',
        'Texte encadré mise en avant',
        'Texte rassurant dans l\'encadré coloré.
Vous pouvez utiliser **texte** en gras.',
        'Cette première rencontre est entièrement offerte et sans aucun engagement. C\'est mon cadeau pour vous permettre de découvrir mes services en toute sérénité.'
    );
    
    // ==========================================
    // APPEL À L'ACTION FINAL
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_cta_title',
        'isabel_consultation_section',
        'Titre de l\'appel à l\'action',
        'Titre encourageant pour finaliser la conversion.
Exemple : "Prêt(e) à faire le premier pas ?", "Réservez maintenant"',
        'Prêt(e) à faire le premier pas ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_consultation_cta_text',
        'isabel_consultation_section',
        'Texte de l\'appel à l\'action',
        'Message encourageant avant le bouton.
Vous pouvez utiliser **texte** en gras.',
        'Réservez dès maintenant votre consultation découverte gratuite et commençons ensemble votre parcours de transformation.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_consultation_cta_button',
        'isabel_consultation_section',
        'Texte du bouton',
        'Texte affiché sur le bouton d\'action final.
Exemple : "Réserver ma consultation gratuite", "Prendre rendez-vous"',
        'Réserver ma consultation gratuite'
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION PAGE CONSULTATION DÉCOUVERTE :
 * 
 * Cette section vous permet de personnaliser entièrement votre page
 * de consultation découverte pour convertir les prospects hésitants.
 * 
 * 📍 STRUCTURE DE LA PAGE CONSULTATION :
 * 
 * 1. 📢 EN-TÊTE
 *    → Titre principal et sous-titre rassurant
 * 
 * 2. 📝 INTRODUCTION
 *    → Explication de ce qu'est cette consultation
 *    → Durée et format (30 min gratuit)
 * 
 * 3. 📋 DÉROULEMENT (2+2)
 *    → Échange personnalisé + Approche adaptée
 *    → Premiers conseils + Plan personnalisé
 * 
 * 4. 🔄 PROCESSUS EN 4 ÉTAPES
 *    → Accueil et présentation
 *    → Écoute de vos besoins
 *    → Exploration des solutions
 *    → Proposition personnalisée
 * 
 * 5. 🎯 SECTIONS INFORMATIVES
 *    → Modalités pratiques (durée, format)
 *    → Bénéfices concrets pour le client
 * 
 * 6. 🎁 ENCADRÉ MISE EN AVANT
 *    → "Consultation 100% gratuite"
 *    → Sans engagement, rassurant
 * 
 * 7. 📞 APPEL À L'ACTION
 *    → Réservation de la consultation
 * 
 * 💡 CONSEILS SPÉCIFIQUES CONSULTATION :
 * 
 * ✅ RASSURANT : Insistez sur "gratuit" et "sans engagement"
 * ✅ PRÉCIS : Durée claire (30 minutes)
 * ✅ BÉNÉFICES : Ce que le client va obtenir
 * ✅ PROCESSUS : Déroulement étape par étape
 * ✅ ACCESSIBLE : Format flexible (téléphone/visio)
 * 
 * 🎯 OBJECTIFS DE CETTE PAGE :
 * 
 * • Lever les objections ("c'est gratuit")
 * • Rassurer sur l'engagement ("sans obligation")
 * • Expliquer clairement le déroulement
 * • Montrer la valeur de cette première rencontre
 * • Faciliter la prise de rendez-vous
 * 
 * 📞 CONVERSION :
 * 
 * Cette page transforme les "hésitants" en "prospects qualifiés"
 * en proposant un premier pas sans risque.
 * 
 * 🎯 MOTS-CLÉS IMPORTANTS :
 * - Consultation gratuite
 * - Sans engagement
 * - Première rencontre
 * - Faire connaissance
 * - Écoute bienveillante
 * - Plan personnalisé
 * 
 * 📱 RESPONSIVE :
 * - Desktop : 2 colonnes pour les boxes
 * - Mobile : 1 colonne, tout empilé
 * 
 * 🔄 RÉSULTAT ATTENDU :
 * Une page qui lève toutes les objections
 * et facilite la prise du premier rendez-vous
 * en toute confiance.
 */