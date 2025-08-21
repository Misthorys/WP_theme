<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 📋 PAGE ACCOMPAGNEMENT VAE
 * Personnalisation complète de la page VAE
 * Deuxième page de service détaillée
 */

function isabel_customizer_vae($wp_customize) {
    
    // ==========================================
    // SECTION : PAGE ACCOMPAGNEMENT VAE
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_vae_section',
        '📋 Page Accompagnement VAE',
        'Personnalisez entièrement votre page d\'accompagnement VAE',
        92 // Priorité 92 = pages détaillées
    );
    
    // ==========================================
    // EN-TÊTE DE LA PAGE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_title',
        'isabel_vae_section',
        'Titre de la page',
        'Le titre principal affiché en haut de la page.
Exemple : "Accompagnement VAE", "Validation des Acquis"

📢 Où ça apparaît : Grand titre en haut de la page VAE.',
        'Accompagnement VAE'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_subtitle',
        'isabel_vae_section',
        'Sous-titre de la page',
        'Phrase d\'accroche sous le titre principal.
Exemple : "Valorisez votre expérience et obtenez une reconnaissance officielle"

💫 Où ça apparaît : Sous le titre principal, en plus petit.',
        'Valorisez votre expérience et obtenez une reconnaissance officielle de vos compétences'
    );
    
    // ==========================================
    // SECTION INTRODUCTION
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_section1_title',
        'isabel_vae_section',
        'Titre section introduction',
        'Titre de votre première section de contenu.
Exemple : "Qu\'est-ce que la VAE ?", "La VAE expliquée"',
        'Qu\'est-ce que la VAE ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_intro',
        'isabel_vae_section',
        'Texte d\'introduction',
        'Premier paragraphe qui explique la VAE.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : La VAE permet de faire reconnaître **officiellement** vos compétences
acquises par l\'expérience professionnelle.',
        'La Validation des Acquis de l\'Expérience (VAE) est un dispositif qui permet de faire reconnaître officiellement vos compétences acquises par l\'expérience professionnelle.'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_description',
        'isabel_vae_section',
        'Description détaillée',
        'Deuxième paragraphe avec plus de détails sur les conditions.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.',
        'Avec au moins 3 ans d\'expérience dans le domaine visé, vous pouvez prétendre à une VAE. C\'est une opportunité unique de valoriser votre parcours.'
    );
    
    // ==========================================
    // BOXES DE BÉNÉFICES (2 texte + 2 images)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_benefits_title',
        'isabel_vae_section',
        'Titre des bénéfices',
        'Titre au-dessus de vos 4 boxes de bénéfices.
Exemple : "Pourquoi faire une VAE ?", "Les avantages de la VAE"',
        'Les avantages de la VAE'
    );
    
    // Box 1 - Texte
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_box1_icon',
        'isabel_vae_section',
        'Box 1 - Icône',
        'Icône pour la première box (emoji ou texte court).
Exemple : "🎓", "📜", "01"',
        '🎓'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_box1_title',
        'isabel_vae_section',
        'Box 1 - Titre',
        'Titre de votre premier bénéfice.',
        'Reconnaissance officielle'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_box1_text',
        'isabel_vae_section',
        'Box 1 - Texte',
        'Description du premier bénéfice.
Vous pouvez utiliser **texte** en gras.',
        'Obtenez un diplôme ou une certification reconnue par l\'État, équivalente à une formation traditionnelle.'
    );
    
    // Box 2 - Image
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_box2_icon',
        'isabel_vae_section',
        'Box 2 - Icône (optionnel)',
        'Icône pour la deuxième box (qui aura une image).',
        '⏰'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_box2_title',
        'isabel_vae_section',
        'Box 2 - Titre',
        'Titre affiché sur l\'image.',
        'Gain de temps'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_box2_text',
        'isabel_vae_section',
        'Box 2 - Texte',
        'Description du deuxième bénéfice.',
        'Évitez de reprendre des études longues grâce à la valorisation de votre expérience existante.'
    );
    
    isabel_add_image_control(
        $wp_customize,
        'isabel_vae_box2_image',
        'isabel_vae_section',
        'Box 2 - Image',
        'Image pour illustrer ce bénéfice.
Taille recommandée : 400x300 pixels.'
    );
    
    // Box 3 - Texte
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_box3_icon',
        'isabel_vae_section',
        'Box 3 - Icône',
        'Icône pour la troisième box.',
        '💼'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_box3_title',
        'isabel_vae_section',
        'Box 3 - Titre',
        'Titre du troisième bénéfice.',
        'Évolution professionnelle'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_box3_text',
        'isabel_vae_section',
        'Box 3 - Texte',
        'Description du troisième bénéfice.',
        'Accédez à de nouvelles opportunités de carrière et augmentez votre employabilité.'
    );
    
    // Box 4 - Image
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_box4_icon',
        'isabel_vae_section',
        'Box 4 - Icône (optionnel)',
        'Icône pour la quatrième box.',
        '💰'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_box4_title',
        'isabel_vae_section',
        'Box 4 - Titre',
        'Titre affiché sur l\'image.',
        'Investissement maîtrisé'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_box4_text',
        'isabel_vae_section',
        'Box 4 - Texte',
        'Description du quatrième bénéfice.',
        'Investissement réduit comparé à une formation complète, avec un retour sur investissement rapide.'
    );
    
    isabel_add_image_control(
        $wp_customize,
        'isabel_vae_box4_image',
        'isabel_vae_section',
        'Box 4 - Image',
        'Image pour illustrer ce quatrième bénéfice.'
    );
    
    // ==========================================
    // PROCESSUS EN 4 ÉTAPES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_process_title',
        'isabel_vae_section',
        'Titre du processus',
        'Titre au-dessus de vos 4 étapes.
Exemple : "Les étapes de votre VAE", "Mon accompagnement étape par étape"',
        'Les étapes de votre VAE'
    );
    
    // 4 étapes du processus VAE
    $step_defaults = array(
        1 => 'Analyse de votre parcours et identification du diplôme le plus adapté à votre expérience professionnelle.',
        2 => 'Aide à la rédaction du livret 1 (recevabilité) et accompagnement dans les démarches administratives.',
        3 => 'Accompagnement personnalisé pour la rédaction du dossier de validation détaillant vos compétences.',
        4 => 'Simulation d\'entretien et conseils pour présenter votre dossier avec confiance devant le jury.'
    );
    
    for ($i = 1; $i <= 4; $i++) {
        isabel_add_textarea_control(
            $wp_customize,
            "isabel_vae_step$i",
            'isabel_vae_section',
            "Étape $i du processus VAE",
            "Description de l\'étape $i de votre accompagnement VAE.
Vous pouvez utiliser **texte** en gras.",
            $step_defaults[$i]
        );
    }
    
    // ==========================================
    // SECTIONS SUPPLÉMENTAIRES
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_section2_title',
        'isabel_vae_section',
        'Titre section 2',
        'Titre de votre deuxième section de contenu.
Exemple : "Qui peut bénéficier de la VAE ?", "Conditions d\'éligibilité"',
        'Qui peut bénéficier de la VAE ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_who',
        'isabel_vae_section',
        'Conditions et éligibilité',
        'Décrivez qui peut prétendre à la VAE et les conditions.',
        'Toute personne justifiant d\'au moins 3 ans d\'expérience professionnelle, bénévole ou de formation en rapport avec le diplôme visé.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_section3_title',
        'isabel_vae_section',
        'Titre section 3',
        'Titre de votre troisième section.
Exemple : "Mon expertise VAE", "Pourquoi me choisir"',
        'Mon expertise VAE'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_expertise',
        'isabel_vae_section',
        'Votre expertise VAE',
        'Présentez votre expérience en accompagnement VAE.',
        'Forte de mon expérience en accompagnement VAE, je vous guide dans toutes les étapes de votre démarche.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_section4_title',
        'isabel_vae_section',
        'Titre section 4',
        'Titre de votre quatrième section.
Exemple : "Diplômes concernés", "Types de certifications"',
        'Diplômes et certifications concernés'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_diplomas',
        'isabel_vae_section',
        'Diplômes et certifications',
        'Listez les types de diplômes accessibles par VAE.',
        'La VAE permet d\'obtenir des diplômes de tous niveaux : CAP, Bac professionnel, BTS, DUT, Licence, Master, titres professionnels, certificats de qualification professionnelle (CQP).'
    );
    
    // ==========================================
    // APPEL À L'ACTION FINAL
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_cta_title',
        'isabel_vae_section',
        'Titre de l\'appel à l\'action',
        'Titre encourageant pour finaliser la conversion.
Exemple : "Prêt(e) à valoriser votre expérience ?", "Lancez votre VAE maintenant"',
        'Prêt(e) à valoriser votre expérience ?'
    );
    
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_vae_cta_text',
        'isabel_vae_section',
        'Texte de l\'appel à l\'action',
        'Message encourageant avant le bouton.
Vous pouvez utiliser **texte** en gras.',
        'Contactez-moi pour une première évaluation de votre projet VAE et découvrons ensemble les possibilités qui s\'offrent à vous.'
    );
    
    isabel_add_text_control(
        $wp_customize,
        'isabel_vae_cta_button',
        'isabel_vae_section',
        'Texte du bouton',
        'Texte affiché sur le bouton d\'action final.
Exemple : "Évaluer mon projet VAE", "Commencer ma VAE"',
        'Évaluer mon projet VAE'
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION PAGE ACCOMPAGNEMENT VAE :
 * 
 * Cette section vous permet de personnaliser entièrement votre page
 * VAE pour convertir les prospects en accompagnement.
 * 
 * 📍 STRUCTURE DE LA PAGE VAE :
 * 
 * 1. 📢 EN-TÊTE
 *    → Titre principal et sous-titre explicatif
 * 
 * 2. 📝 INTRODUCTION
 *    → Explication claire de ce qu'est la VAE
 *    → Conditions et possibilités
 * 
 * 3. 📋 AVANTAGES DE LA VAE (2+2)
 *    → Reconnaissance officielle + Gain de temps
 *    → Évolution professionnelle + Investissement maîtrisé
 * 
 * 4. 🔄 PROCESSUS EN 4 ÉTAPES
 *    → Étude de faisabilité
 *    → Constitution du dossier
 *    → Rédaction du livret 2
 *    → Préparation au jury
 * 
 * 5. 🎯 SECTIONS DÉTAILLÉES
 *    → Conditions d'éligibilité
 *    → Votre expertise VAE
 *    → Types de diplômes concernés
 * 
 * 6. 📞 APPEL À L'ACTION
 *    → Évaluation de projet VAE
 * 
 * 💡 CONSEILS SPÉCIFIQUES VAE :
 * 
 * ✅ PÉDAGOGIQUE : Expliquez clairement le dispositif
 * ✅ RASSURANT : Mettez en avant votre expertise
 * ✅ CONCRET : Donnez des exemples de diplômes
 * ✅ MOTIVANT : Montrez les bénéfices concrets
 * ✅ PROFESSIONNEL : Respectez la terminologie officielle
 * 
 * 🎯 MOTS-CLÉS IMPORTANTS :
 * - Validation des Acquis de l'Expérience
 * - Reconnaissance officielle
 * - Expérience professionnelle
 * - Diplôme d'État
 * - Livret 1 et 2
 * - Jury de validation
 * 
 * 📱 RESPONSIVE :
 * - Desktop : 2 colonnes pour les boxes
 * - Mobile : 1 colonne, tout empilé
 * 
 * 🔄 RÉSULTAT ATTENDU :
 * Une page complète qui démystifie la VAE,
 * rassure sur votre accompagnement et incite
 * à l'évaluation de projet.