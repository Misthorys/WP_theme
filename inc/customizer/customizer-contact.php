<?php
// Empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 📞 APPEL À L'ACTION ET FORMULAIRE DE CONTACT
 * Section finale pour convertir vos visiteurs en clients
 * Comprend le CTA final et le formulaire de contact
 */

function isabel_customizer_contact($wp_customize) {
    
    // ==========================================
    // SECTION : APPEL À L'ACTION FINAL
    // ==========================================
    isabel_add_customizer_section(
        $wp_customize,
        'isabel_contact_section',
        '📞 Appel à l\'action et formulaire',
        'Convertissez vos visiteurs avec un appel à l\'action persuasif et un formulaire efficace',
        70 // Priorité 70 = après les témoignages
    );
    
    // ==========================================
    // TITRE DU CTA FINAL
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_cta_title',
        'isabel_contact_section',
        'Titre de votre appel à l\'action',
        'Le titre principal qui incite à l\'action avant le formulaire.
Exemple : "Prêt(e) à transformer votre vie ?", "Commençons votre transformation"

📢 Où ça apparaît : Grand titre dans l\'encadré coloré avant le formulaire.',
        'Prêt(e) à Commencer Votre Transformation ?'
    );
    
    // ==========================================
    // TEXTE DU CTA FINAL
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_cta_text',
        'isabel_contact_section',
        'Texte de votre appel à l\'action',
        'Message encourageant qui pousse à l\'action.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : Contactez-moi dès maintenant pour discuter de vos **objectifs**
et découvrir comment je peux vous accompagner dans votre transformation.

💬 Où ça apparaît : Texte dans l\'encadré coloré, sous le titre.',
        'Contactez-moi dès maintenant pour discuter de vos objectifs et découvrir comment je peux vous accompagner.'
    );
    
    // ==========================================
    // BOUTON DU CTA FINAL
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_cta_button',
        'isabel_contact_section',
        'Texte du bouton d\'action',
        'Texte du bouton principal qui ouvre le formulaire.
Exemple : "Prendre rendez-vous", "Me contacter maintenant", "Réserver ma consultation"

🔘 Où ça apparaît : Bouton blanc dans l\'encadré coloré.',
        'Prendre rendez-vous'
    );
    
    // ==========================================
    // STYLE DU CTA
    // ==========================================
    isabel_add_select_control(
        $wp_customize,
        'isabel_cta_style',
        'isabel_contact_section',
        'Style de l\'appel à l\'action',
        array(
            'gradient' => 'Dégradé coloré (recommandé)',
            'solid' => 'Couleur unie',
            'outline' => 'Contour seulement',
            'minimal' => 'Style minimal',
        ),
        'Style visuel de votre section d\'appel à l\'action.
Dégradé = Plus moderne et attractif.',
        'gradient'
    );
    
    // ==========================================
    // TITRE DU FORMULAIRE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_form_title',
        'isabel_contact_section',
        'Titre du formulaire de contact',
        'Titre qui apparaît en haut du formulaire modal.
Exemple : "Réservez Votre Rendez-vous", "Contactez-moi", "Prenons contact"

📝 Où ça apparaît : En haut du formulaire quand il s\'ouvre.',
        'Réservez Votre Rendez-vous'
    );
    
    // ==========================================
    // SOUS-TITRE DU FORMULAIRE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_form_subtitle',
        'isabel_contact_section',
        'Sous-titre du formulaire',
        'Sous-titre explicatif du formulaire.
Exemple : "Première consultation personnalisée", "Échange gratuit de 30 minutes"

💬 Où ça apparaît : Sous le titre du formulaire, en plus petit.',
        'Première consultation personnalisée'
    );
    
    // ==========================================
    // NOTE EXPLICATIVE DU FORMULAIRE
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_form_note',
        'isabel_contact_section',
        'Note explicative du formulaire',
        'Information rassurante dans le formulaire.
Vous pouvez utiliser **texte** pour mettre en gras et les retours à la ligne.

Exemple : 💼 Première consultation **gratuite** pour faire connaissance
et définir vos besoins ensemble.

📋 Où ça apparaît : Encadré coloré dans le formulaire.',
        '💼 Première consultation pour faire connaissance et définir vos besoins ensemble.'
    );
    
    // ==========================================
    // BOUTON DU FORMULAIRE
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_form_button',
        'isabel_contact_section',
        'Texte du bouton du formulaire',
        'Texte du bouton de soumission du formulaire.
Exemple : "Confirmer ma demande", "Envoyer ma demande", "Réserver maintenant"

🔘 Où ça apparaît : Bouton de validation du formulaire.',
        'Confirmer ma demande de rendez-vous'
    );
    
    // ==========================================
    // CHAMPS DU FORMULAIRE
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_form_phone_required',
        'isabel_contact_section',
        'Téléphone obligatoire',
        'Cochez pour rendre le champ téléphone obligatoire.
Recommandé pour faciliter le contact.',
        true
    );
    
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_form_service_required',
        'isabel_contact_section',
        'Service obligatoire',
        'Cochez pour rendre le choix du service obligatoire.
Aide à mieux qualifier les demandes.',
        true
    );
    
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_form_message_required',
        'isabel_contact_section',
        'Message obligatoire',
        'Cochez pour rendre le message obligatoire.
Recommandé pour mieux comprendre les besoins.',
        false
    );
    
    // ==========================================
    // EMAIL DE RÉCEPTION
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_contact_email',
        'isabel_contact_section',
        'Email de réception des demandes',
        'Adresse email où vous recevrez les demandes de contact.
Important : Vérifiez que cette adresse fonctionne !

📧 Où vont les demandes : Directement dans votre boîte mail.',
        'contact@forma-coach.com',
        'email'
    );
    
    // ==========================================
    // MESSAGE DE CONFIRMATION
    // ==========================================
    isabel_add_textarea_control(
        $wp_customize,
        'isabel_form_success_message',
        'isabel_contact_section',
        'Message de confirmation',
        'Message affiché quand le formulaire est envoyé avec succès.
Vous pouvez utiliser **texte** pour mettre en gras.

Exemple : 🎉 Parfait ! Votre demande a été **enregistrée**.
Isabel vous contactera très rapidement pour programmer votre rendez-vous.

✅ Où ça apparaît : Message vert après envoi réussi.',
        '🎉 Parfait ! Votre demande a été enregistrée et envoyée. Isabel vous contactera très rapidement pour programmer votre rendez-vous.'
    );
    
    // ==========================================
    // COULEUR DU CTA ET FORMULAIRE
    // ==========================================
    isabel_add_color_control(
        $wp_customize,
        'isabel_cta_color',
        'isabel_contact_section',
        'Couleur de l\'appel à l\'action',
        '#e4a7f5'
    );
    
    // ==========================================
    // ANIMATION DU CTA
    // ==========================================
    isabel_add_checkbox_control(
        $wp_customize,
        'isabel_cta_animation',
        'isabel_contact_section',
        'Animation de l\'appel à l\'action',
        'Cochez pour ajouter des effets visuels au CTA.
Recommandé pour attirer l\'attention.',
        true
    );
    
    // ==========================================
    // URGENCE / SCARCITÉ (optionnel)
    // ==========================================
    isabel_add_text_control(
        $wp_customize,
        'isabel_cta_urgency',
        'isabel_contact_section',
        'Message d\'urgence (optionnel)',
        'Message créant un sentiment d\'urgence.
Exemple : "Places limitées ce mois-ci", "Offre spéciale jusqu\'au 31/12"

⚡ Où ça apparaît : Petit texte au-dessus du CTA.',
        ''
    );
}

/**
 * Documentation pour Isabel :
 * 
 * SECTION APPEL À L'ACTION ET FORMULAIRE :
 * 
 * C'est la section de CONVERSION ! Après avoir présenté votre expertise,
 * vos services et vos témoignages, c'est ici que vos visiteurs deviennent clients.
 * 
 * 📍 STRUCTURE EN 2 PARTIES :
 * 
 * 1. 🎯 APPEL À L'ACTION (CTA)
 *    → Encadré coloré qui attire l'œil
 *    → Message persuasif et encourageant
 *    → Bouton qui ouvre le formulaire
 * 
 * 2. 📝 FORMULAIRE DE CONTACT
 *    → Modal qui s'ouvre au clic
 *    → Champs pour qualifier la demande
 *    → Envoi direct dans votre boîte mail
 * 
 * 🎯 PSYCHOLOGIE DU CTA EFFICACE :
 * 
 * ✅ TITRE ENGAGEANT : Question ou affirmation positive
 * ✅ TEXTE BÉNÉFICE : Ce que le client va gagner
 * ✅ BOUTON ACTIONNABLE : Verbe d'action clair
 * ✅ URGENCE DOUCE : Sans être agressive
 * ✅ DESIGN ATTRACTIF : Se démarque visuellement
 * 
 * 📝 CHAMPS DU FORMULAIRE :
 * 
 * • NOM : Toujours obligatoire
 * • EMAIL : Toujours obligatoire  
 * • TÉLÉPHONE : Recommandé obligatoire
 * • SERVICE : Aide à qualifier
 * • MESSAGE : Optionnel mais utile
 * 
 * 💡 CONSEILS POUR MAXIMISER LES CONVERSIONS :
 * 
 * ✅ CTA VISIBLE : Dégradé coloré recommandé
 * ✅ TITRE PERSONNEL : "Votre transformation" plutôt que "Ma méthode"
 * ✅ BOUTON PRÉCIS : "Réserver ma consultation" plutôt que "Envoyer"
 * ✅ NOTE RASSURANTE : "Gratuit", "Sans engagement"
 * ✅ CONFIRMATION CHALEUREUSE : Ton personnel et accueillant
 * 
 * 🔧 TECHNIQUE :
 * 
 * • Formulaire en modal (popup)
 * • Envoi par email automatique
 * • Sauvegarde en base de données
 * • Message de confirmation immédiat
 * • Compatible mobile et desktop
 * 
 * 📊 OPTIMISATION :
 * 
 * • Testez différents titres de CTA
 * • Surveillez le taux de conversion
 * • Ajustez selon les retours clients
 * • Vérifiez régulièrement l'email de réception
 * 
 * 🎯 OBJECTIF :
 * Transformer 2-5% de vos visiteurs en prospects qualifiés
 * qui prennent rendez-vous avec vous.
 */