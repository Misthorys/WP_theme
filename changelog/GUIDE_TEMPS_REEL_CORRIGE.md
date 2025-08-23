# 🔧 GUIDE CORRECTION TEMPS RÉEL - ISABEL THEME

## ✅ **PROBLÈME RÉSOLU**

Le problème était que `wp.customize` n'était pas disponible dans l'iframe de prévisualisation. J'ai créé une solution avec **deux scripts séparés** qui communiquent via `postMessage`.

## 📁 **NOUVEAUX FICHIERS CRÉÉS**

### **1. `js/customizer-live.js` (MIS À JOUR)**
- Script pour l'**iframe de prévisualisation**
- Écoute les messages du panneau de contrôle
- Met à jour le DOM en temps réel

### **2. `js/customizer-control.js` (NOUVEAU)**
- Script pour le **panneau de contrôle**
- Envoie les messages à l'iframe
- Utilise `wp.customize` qui est disponible ici

### **3. `functions.php` (MIS À JOUR)**
- Enregistre les deux scripts
- `customize_preview_init` pour l'iframe
- `customize_controls_enqueue_scripts` pour le panneau

## 🔧 **FONCTIONNEMENT**

### **Architecture :**
```
PANNEAU DE CONTRÔLE (wp.customize disponible)
    ↓ postMessage
IFRAME DE PRÉVISUALISATION (wp.customize non disponible)
    ↓ DOM manipulation
AFFICHAGE TEMPS RÉEL
```

### **Flux de données :**
1. **Utilisateur modifie** un setting dans le panneau
2. **`customizer-control.js`** détecte le changement
3. **Message envoyé** à l'iframe via `postMessage`
4. **`customizer-live.js`** reçoit le message
5. **DOM mis à jour** instantanément

## 📋 **FICHIERS À METTRE SUR LE SERVEUR**

### **Obligatoires :**
- `js/customizer-live.js` ✅ (version mise à jour)
- `js/customizer-control.js` ✅ (nouveau fichier)
- `functions.php` ✅ (version mise à jour)
- Tous les autres fichiers du thème ✅

### **À ne pas mettre :**
- `changelog/` (tout le dossier)
- `test-temps-reel.php`
- `LISTE_FICHIERS_TEMPS_REEL.md`

## 🎯 **TEST DE FONCTIONNEMENT**

### **1. Vérification dans la console :**
Dans l'iframe de prévisualisation :
```
✅ Isabel Customizer Live Preview chargé dans l'iframe
🔍 DEBUG: Recherche des sélecteurs CSS...
📋 SÉLECTEURS TROUVÉS:
```

Dans le panneau de contrôle :
```
✅ Isabel Customizer Control chargé dans le panneau de contrôle
```

### **2. Test de communication :**
Quand vous modifiez un setting, vous devriez voir :
```
📤 Envoi: isabel_main_title = "Nouveau titre"
📨 Message reçu: {type: "isabel-customizer-update", setting: "isabel_main_title", value: "Nouveau titre"}
🔄 Mise à jour: .hero-title = "Nouveau titre"
```

### **3. Test manuel :**
Dans la console de l'iframe :
```javascript
// Test de mise à jour manuelle
isabelCustomizerDebug.updateElement('h1', 'Test temps réel');
```

## 🚨 **PROBLÈMES POTENTIELS**

### **1. Scripts non chargés :**
- Vérifiez que les fichiers sont uploadés
- Vérifiez les permissions (644 ou 755)
- Vérifiez qu'il n'y a pas d'erreur PHP

### **2. Communication bloquée :**
- Vérifiez que l'iframe n'est pas bloquée par des extensions
- Testez en navigation privée
- Vérifiez les paramètres de sécurité du navigateur

### **3. Sélecteurs incorrects :**
- Utilisez le debug pour identifier les vrais sélecteurs
- Modifiez `customizer-live.js` si nécessaire

## 📝 **COMMANDES DE DEBUG**

### **Dans l'iframe :**
```javascript
// Relancer le test des sélecteurs
isabelCustomizerDebug.testSelectors();

// Test manuel d'un élément
isabelCustomizerDebug.updateElement('h1', 'Test manuel');
```

### **Dans le panneau :**
```javascript
// Vérifier wp.customize
typeof wp.customize;

// Test d'envoi manuel
wp.customize.previewer.send('isabel-customizer-update', {
    type: 'isabel-customizer-update',
    setting: 'isabel_main_title',
    value: 'Test manuel'
});
```

## 🎯 **RÉSULTAT ATTENDU**

Après mise à jour :
- ✅ **Modifications instantanées** dans le customizer
- ✅ **Pas de rafraîchissement** de page nécessaire
- ✅ **Debug visible** dans les deux consoles
- ✅ **Communication** entre panneau et iframe
- ✅ **Sélecteurs corrects** identifiés et utilisés

## 🔄 **PROCHAINES ÉTAPES**

1. **Uploadez les nouveaux fichiers**
2. **Testez le temps réel**
3. **Vérifiez les messages de debug**
4. **Identifiez les vrais sélecteurs** si nécessaire
5. **Corrigez les sélecteurs** si besoin

## 📞 **SUPPORT**

Si le problème persiste :
1. **Screenshots des deux consoles** (panneau + iframe)
2. **Messages d'erreur** exacts
3. **Liste des sélecteurs** trouvés par le debug
