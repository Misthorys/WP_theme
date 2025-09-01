<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 📋 PAGE FORMATIONS PROFESSIONNELLES
 * Personnalisation complète de la page de formations professionnelles
 * Première page de service détaillée
 */

function isabel_customizer_coaching($wp_customize) {
    
    // ==========================================
    // SECTION : PAGE FORMATIONS PROFESSIONNELLES
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_coaching_section',
        '📋 Page Formations Professionnelles',
        'Personnalisez entièrement votre page de formations professionnelles',
        91 // Priorité 91 = pages détaillées
    );
    
    // ==========================================
    // EN-TÊTE DE LA PAGE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_title',
        'isabel_coaching_section',
        'Titre de la page',
        'Le titre principal affiché en haut de la page.
Exemple : "Formations Professionnelles", "Accompagnement Formation"

📢 Où ça apparaît : Grand titre en haut de la page formations.',
        'Formations Professionnelles'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_subtitle',
        'isabel_coaching_section',
        'Sous-titre de la page',
        'Phrase d\'accroche sous le titre principal.
Exemple : "Révélez votre potentiel et transformez votre vie"

💫 Où ça apparaît : Sous le titre principal, en plus petit.',
        'Révélez votre potentiel et transformez votre vie personnelle et professionnelle'
    );
    
    // ==========================================
    // SECTION INTRODUCTION
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_section1_title',
        'isabel_coaching_section',
        'Titre section introduction',
        'Titre de votre première section de contenu.
Exemple : "Qu\'est-ce que les formations professionnelles ?"',
        'Qu\'est-ce que les formations professionnelles ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_coaching_intro',
        'isabel_coaching_section',
        'Texte d\'introduction',
        'Premier paragraphe qui explique votre service.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : Les formations professionnelles sont un accompagnement **sur mesure** qui vous aide
à clarifier vos objectifs et développer votre potentiel.',
        'Les formations professionnelles sont un accompagnement sur mesure qui vous aide à clarifier vos objectifs, développer votre potentiel et créer la vie que vous désirez vraiment.'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_coaching_description',
        'isabel_coaching_section',
        'Description détaillée',
        'Deuxième paragraphe avec plus de détails sur votre approche.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.',
        'Que vous souhaitiez améliorer votre confiance en vous, changer de carrière, améliorer vos relations ou simplement mieux vous connaître, les formations professionnelles vous offrent l\'espace et les ressources nécessaires.'
    );
    
    // ==========================================
    // BOXES DE BÉNÉFICES (2 texte + 2 images)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_benefits_title',
        'isabel_coaching_section',
        'Titre des bénéfices',
        'Titre au-dessus de vos 4 boxes de bénéfices.
Exemple : "Pourquoi choisir le coaching ?", "Mes atouts"',
        'Ce que vous obtenez avec mon coaching'
    );
    
    // Box 1 - Texte
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_box1_icon',
        'isabel_coaching_section',
        'Box 1 - Icône',
        'Icône pour la première box (emoji ou texte court).
Exemple : "🎯", "💬", "01"',
        '💬'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_box1_title',
        'isabel_coaching_section',
        'Box 1 - Titre',
        'Titre de votre premier bénéfice.',
        'Échange personnalisé'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_coaching_box1_text',
        'isabel_coaching_section',
        'Box 1 - Texte',
        'Description du premier bénéfice.
Vous pouvez utiliser **texte** en gras.',
        'Définissez clairement vos priorités et tracez un chemin précis vers vos aspirations personnelles et professionnelles.'
    );
    
    // Box 2 - Image
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_box2_icon',
        'isabel_coaching_section',
        'Box 2 - Icône (optionnel)',
        'Icône pour la deuxième box (qui aura une image).',
        '🎯'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_box2_title',
        'isabel_coaching_section',
        'Box 2 - Titre',
        'Titre affiché sur l\'image.',
        'Approche adaptée'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_coaching_box2_text',
        'isabel_coaching_section',
        'Box 2 - Texte',
        'Description du deuxième bénéfice.',
        'Développez une estime de soi solide et apprenez à croire en vos capacités pour relever tous les défis.'
    );
    
    isabel_add_image_control(
        $wp_customize,
        'isabel_coaching_box2_image',
        'isabel_coaching_section',
        'Box 2 - Image',
        'Image pour illustrer ce bénéfice.
Taille recommandée : 400x300 pixels.'
    );
    
    // Box 3 - Texte
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_box3_icon',
        'isabel_coaching_section',
        'Box 3 - Icône',
        'Icône pour la troisième box.',
        '🧰'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_box3_title',
        'isabel_coaching_section',
        'Box 3 - Titre',
        'Titre du troisième bénéfice.',
        'Outils concrets'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_coaching_box3_text',
        'isabel_coaching_section',
        'Box 3 - Texte',
        'Description du troisième bénéfice.',
        'Naviguez sereinement dans les transitions de vie et transformez les obstacles en opportunités de croissance.'
    );
    
    // Box 4 - Image
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_box4_icon',
        'isabel_coaching_section',
        'Box 4 - Icône (optionnel)',
        'Icône pour la quatrième box.',
        '🗺️'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_box4_title',
        'isabel_coaching_section',
        'Box 4 - Titre',
        'Titre affiché sur l\'image.',
        'Plan personnalisé'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_coaching_box4_text',
        'isabel_coaching_section',
        'Box 4 - Texte',
        'Description du quatrième bénéfice.',
        'Trouvez l\'harmonie parfaite entre vos ambitions professionnelles et votre épanouissement personnel.'
    );
    
    isabel_add_image_control(
        $wp_customize,
        'isabel_coaching_box4_image',
        'isabel_coaching_section',
        'Box 4 - Image',
        'Image pour illustrer ce quatrième bénéfice.'
    );
    
    // ==========================================
    // PROCESSUS EN 4 ÉTAPES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_process_title',
        'isabel_coaching_section',
        'Titre du processus',
        'Titre au-dessus de vos 4 étapes.
Exemple : "Mon processus d\'accompagnement", "Les 4 étapes"',
        'Mon processus d\'accompagnement'
    );
    
    // 4 étapes du processus
    $step_defaults = array(
        1 => 'Nous explorons ensemble votre situation actuelle, vos défis et vos aspirations pour définir un plan d\'action personnalisé.',
        2 => 'Nous clarifions vos objectifs SMART et établissons une feuille de route claire avec des étapes concrètes.',
        3 => 'Sessions régulières pour travailler sur vos blocages, développer de nouvelles compétences et avancer vers vos objectifs.',
        4 => 'Évaluation continue de vos progrès et adaptation de la stratégie pour optimiser votre réussite.'
    );
    
    for ($i = 1; $i <= 4; $i++) {
        isabel_add_textarea_control(
            $wp_customize,
            "isabel_coaching_step$i",
            'isabel_coaching_section',
            "Étape $i du processus",
            "Description de l\'étape $i de votre processus d\'accompagnement.
Vous pouvez utiliser **texte** en gras.",
            $step_defaults[$i]
        );
    }
    
    // ==========================================
    // SECTIONS SUPPLÉMENTAIRES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_section2_title',
        'isabel_coaching_section',
        'Titre section 2',
        'Titre de votre deuxième section de contenu.
Exemple : "Pour qui ?", "À qui s\'adresse le coaching ?"',
        'Pour qui ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_coaching_who',
        'isabel_coaching_section',
        'Pour qui est ce service',
        'Décrivez votre cible et qui peut bénéficier de ce service.',
        'Les formations professionnelles s\'adressent à toute personne qui souhaite évoluer, qu\'elle soit en questionnement professionnel, en transition de vie, ou simplement désireuse d\'améliorer sa qualité de vie.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_section3_title',
        'isabel_coaching_section',
        'Titre section 3',
        'Titre de votre troisième section.
Exemple : "Mon expertise", "Mes domaines d\'accompagnement"',
        'Mes domaines d\'expertise'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_coaching_expertise',
        'isabel_coaching_section',
        'Votre expertise',
        'Présentez votre expérience et vos domaines d\'expertise.',
        'Fort de mon expérience et de ma certification professionnelle, je vous accompagne sur diverses thématiques : développement de la confiance en soi, gestion du stress et des émotions.'
    );
    
    // ==========================================
    // APPEL À L'ACTION FINAL
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_cta_title',
        'isabel_coaching_section',
        'Titre de l\'appel à l\'action',
        'Titre encourageant pour finaliser la conversion.
Exemple : "Prêt(e) à commencer ?", "Transformez votre vie dès maintenant"',
        'Prêt(e) à commencer votre transformation ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_coaching_cta_text',
        'isabel_coaching_section',
        'Texte de l\'appel à l\'action',
        'Message encourageant avant le bouton.
Vous pouvez utiliser **texte** en gras.',
        'Contactez-moi pour discuter de vos objectifs et découvrir comment les formations professionnelles peuvent vous aider.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_coaching_cta_button',
        'isabel_coaching_section',
        'Texte du bouton',
        'Texte affiché sur le bouton d\'action final.
Exemple : "Prendre rendez-vous", "Commencer maintenant"',
        'Prendre rendez-vous'
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION PAGE FORMATIONS PROFESSIONNELLES :
 * 
 * Cette section vous permet de personnaliser entièrement votre page
 * de formations professionnelles pour convertir vos visiteurs en clients.
 * 
 * 📍 STRUCTURE DE LA PAGE :
 * 
 * 1. 📢 EN-TÊTE
 *    → Titre principal et sous-titre accrocheur
 * 
 * 2. 📝 INTRODUCTION
 *    → Explication de votre service
 *    → Description détaillée de votre approche
 * 
 * 3. 📋 BOXES DE BÉNÉFICES (2+2)
 *    → 2 boxes texte + 2 boxes avec images
 *    → Met en avant vos 4 principaux atouts
 * 
 * 4. 🔄 PROCESSUS EN 4 ÉTAPES
 *    → Explique votre méthode de travail
 *    → Rassure sur le déroulement
 * 
 * 5. 🎯 SECTIONS DÉTAILLÉES
 *    → Pour qui s'adresse le service
 *    → Votre expertise et domaines
 * 
 * 6. 📞 APPEL À L'ACTION FINAL
 *    → Conversion vers prise de contact
 * 
 * 💡 CONSEILS DE RÉDACTION :
 * 
 * ✅ ORIENTÉ BÉNÉFICES : "Vous obtiendrez..." plutôt que "Je propose..."
 * ✅ CONCRET : Résultats mesurables et exemples précis
 * ✅ RASSURANT : Processus clair et méthodologie expliquée
 * ✅ PERSONNEL : Votre approche unique et différenciante
 * ✅ ACTIONNABLE : CTA clair pour passer à l'étape suivante
 * 
 * 🎨 ÉLÉMENTS VISUELS :
 * 
 * • BOXES ALTERNÉES : Texte + Image pour rythmer la lecture
 * • ÉTAPES NUMÉROTÉES : Processus visuel et structuré
 * • ICONS PERSONNALISÉS : Identifient rapidement chaque bénéfice
 * 
 * 📱 RESPONSIVE :
 * - Desktop : 2 colonnes pour les boxes
 * - Mobile : 1 colonne, tout empilé
 * 
 * 🔄 RÉSULTAT ATTENDU :
 * Une page complète qui explique clairement votre service,
 * rassure sur votre méthode et incite à la prise de contact.
 */