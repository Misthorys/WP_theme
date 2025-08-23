# 🔍 GUIDE IDENTIFICATION DES SÉLECTEURS CSS

## ❌ **PROBLÈME IDENTIFIÉ**
Le temps réel ne fonctionne pas car les sélecteurs CSS dans le JavaScript ne correspondent pas à votre HTML.

## 🔧 **ÉTAPES POUR IDENTIFIER LES VRAIS SÉLECTEURS**

### **1. Mettre à jour le fichier JavaScript**
Le fichier `js/customizer-live.js` a été mis à jour avec du debug.

### **2. Tester sur le serveur**
1. **Uploadez le nouveau** `js/customizer-live.js`
2. **Allez dans Apparence > Personnaliser**
3. **Ouvrez la console** (F12)
4. **Regardez les messages** de debug

### **3. Analyser les résultats**
Dans la console, vous verrez :
```
🔍 DEBUG: Recherche des sélecteurs CSS...
📋 SÉLECTEURS TROUVÉS:
✅ h1: 2 élément(s)
   - Élément 1: "Titre de la page..."
   - Élément 2: "Autre titre..."
❌ .hero-title: Aucun élément trouvé
```

### **4. Identifier les vrais sélecteurs**
Notez tous les sélecteurs qui affichent **✅** au lieu de **❌**.

## 🎯 **EXEMPLES DE SÉLECTEURS COURANTS**

### **Titres principaux :**
- `h1` (titre principal de la page)
- `.main-title`
- `.page-title`
- `.hero h1`
- `.content h1`

### **Sous-titres :**
- `h2` (sous-titres)
- `.subtitle`
- `.hero h2`
- `.content h2`

### **Descriptions :**
- `p` (paragraphes)
- `.description`
- `.content p`
- `.hero p`

### **Services :**
- `.services h2`
- `.services h3`
- `.service h3`
- `.card h3`

## 🔧 **CORRECTION RAPIDE**

### **1. Identifier les sélecteurs manquants**
Dans la console, notez les sélecteurs qui fonctionnent.

### **2. Modifier le JavaScript**
Remplacez les sélecteurs incorrects par les vrais.

**Exemple :**
```javascript
// Avant (ne fonctionne pas)
updateElement('.hero-title', newVal, true);

// Après (fonctionne)
updateElement('h1', newVal, true);
```

### **3. Test manuel dans la console**
```javascript
// Test d'un sélecteur
jQuery('h1').text('Test manuel');

// Si ça fonctionne, utilisez ce sélecteur
```

## 📋 **CHECKLIST DE VÉRIFICATION**

- [ ] Console affiche "Isabel Customizer Live Preview chargé avec debug"
- [ ] Liste des sélecteurs trouvés visible dans la console
- [ ] Sélecteurs ✅ identifiés et notés
- [ ] Sélecteurs ❌ remplacés par les vrais
- [ ] Test manuel fonctionne dans la console
- [ ] Modifications s'appliquent en temps réel

## 🚨 **INFORMATIONS À FOURNIR**

Si vous avez besoin d'aide, fournissez :
1. **Screenshot de la console** avec la liste des sélecteurs
2. **Liste des sélecteurs ✅** qui fonctionnent
3. **Liste des sélecteurs ❌** qui ne fonctionnent pas
4. **Screenshot de votre HTML** (inspecteur)

## 🔧 **COMMANDES DE TEST**

Dans la console du customizer :
```javascript
// Relancer le test des sélecteurs
isabelCustomizerDebug.testSelectors();

// Test manuel d'un élément
isabelCustomizerDebug.updateElement('h1', 'Test temps réel');

// Test manuel d'une image
isabelCustomizerDebug.updateImage('img', 'nouvelle-image.jpg');
```

## 📝 **NOTES IMPORTANTES**

- Les sélecteurs doivent être **exacts**
- **Case sensitive** : `.Hero` ≠ `.hero`
- **Espaces** : `.hero .title` ≠ `.hero.title`
- **Ordre** : `:nth-child(1)` doit correspondre à l'ordre HTML
- **Classes multiples** : `.hero.title.subtitle`

## 🎯 **RÉSULTAT ATTENDU**

Après correction :
- ✅ **Modifications instantanées** dans le customizer
- ✅ **Pas de rafraîchissement** de page nécessaire
- ✅ **Debug visible** dans la console
- ✅ **Sélecteurs corrects** identifiés et utilisés
