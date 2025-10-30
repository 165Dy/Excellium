# 🧪 Guide de Test - Système de Tracking des Visites

Documentation complète pour tester toutes les fonctionnalités du système de tracking.

---

## ✅ État du système

**575 visites de test** ont été générées pour les 7 derniers jours !

- **24/10/2025 (Vendredi)** : 74 visites
- **25/10/2025 (Samedi)** : 46 visites  
- **26/10/2025 (Dimanche)** : 79 visites
- **27/10/2025 (Lundi)** : 102 visites
- **28/10/2025 (Mardi)** : 58 visites
- **29/10/2025 (Mercredi)** : 117 visites
- **30/10/2025 (Jeudi)** : 99 visites

---

## 🎯 Fonctionnalités à tester

### 1. **Graphique des visites par jour** 📊

#### Ce qui a été amélioré :
✅ **Sélecteurs CSS spécifiques** avec IDs uniques (`visitsSubtitle`, `mostVisitedDayText`)  
✅ **Graphique stocké globalement** pour permettre le rafraîchissement  
✅ **Gestion des erreurs** avec messages utilisateur  
✅ **Animations fluides** lors du chargement  
✅ **Console logs détaillés** pour le débogage  

#### Test 1 : Chargement initial
1. Accédez à `/admin/dashboard`
2. Ouvrez la console JavaScript (F12)
3. **Attendu** :
   - ✅ Message : `🚀 Initialisation du dashboard...`
   - ✅ Message : `📊 Chargement des statistiques de visites...`
   - ✅ Message : `✅ Données reçues:` (avec objet JSON)
   - ✅ Message : `✅ Graphique affiché avec succès`
   - ✅ Graphique en barres avec 7 jours
   - ✅ Texte : `Total XXX visites (7 jours)`
   - ✅ Texte : `XXX visites le [Jour]`

**Capture d'écran attendue** :
```
Console:
  🚀 Initialisation du dashboard...
  📊 Chargement des statistiques de visites...
  ✅ Données reçues: {today: {...}, visits_by_day: [...], ...}
  ✅ Graphique affiché avec succès
```

---

### 2. **Action : Actualiser** 🔄

#### Test 2 : Rafraîchir le graphique
1. Cliquez sur les 3 points (⋮) en haut à droite du graphique
2. Cliquez sur **"Actualiser"**
3. **Attendu** :
   - ✅ Message console : `🔄 Actualisation du graphique...`
   - ✅ Texte change temporairement : `Actualisation...`
   - ✅ Toast de confirmation (en haut à droite) : `Graphique actualisé`
   - ✅ Graphique se recharge avec animation

**Résultat attendu** :
- Toast vert en haut à droite pendant 2 secondes
- Graphique se met à jour
- Pas d'erreur dans la console

---

### 3. **Action : Exporter (CSV)** 📥

#### Test 3 : Télécharger les données
1. Cliquez sur les 3 points (⋮) en haut à droite du graphique
2. Cliquez sur **"Exporter (CSV)"**
3. **Attendu** :
   - ✅ Message console : `📥 Export des données en CSV...`
   - ✅ Fichier CSV téléchargé : `visites_2025-10-30.csv`
   - ✅ Toast de confirmation : `Fichier CSV téléchargé`

**Contenu du CSV attendu** :
```csv
Date,Jour,Visites
2025-10-24,Ven,74
2025-10-25,Sam,46
2025-10-26,Dim,79
2025-10-27,Lun,102
2025-10-28,Mar,58
2025-10-29,Mer,117
2025-10-30,Jeu,99
```

**Vérification** :
- ✅ Le fichier s'ouvre correctement dans Excel
- ✅ Les données sont correctes
- ✅ L'encodage UTF-8 est respecté

---

### 4. **Action : Partager** 📤

#### Test 4.1 : Partage sur mobile (si disponible)
1. Ouvrez le dashboard sur un téléphone/tablette
2. Cliquez sur les 3 points puis **"Partager"**
3. **Attendu** :
   - ✅ Menu de partage natif s'ouvre
   - ✅ Possibilité de partager via WhatsApp, Email, etc.

#### Test 4.2 : Copie dans le presse-papiers (desktop)
1. Sur ordinateur, cliquez sur **"Partager"**
2. **Attendu** :
   - ✅ Toast : `Copié !`
   - ✅ Message : `Les statistiques ont été copiées dans le presse-papiers`
3. Collez (Ctrl+V) dans un éditeur de texte
4. **Contenu attendu** :
```
📊 Statistiques Excellium

Total des visites (7 jours) : 575
Jour le plus visité : Mer (117 visites)

Visiteurs uniques aujourd'hui : XX
Utilisateurs authentifiés : 0
```

#### Test 4.3 : Fallback (si clipboard échoue)
Si le presse-papiers ne fonctionne pas :
- ✅ Modale SweetAlert s'affiche
- ✅ Statistiques affichées dans un bloc `<pre>`
- ✅ Bouton "Fermer" pour fermer la modale

---

### 5. **API Endpoint** 🔌

#### Test 5 : Vérifier l'API directement
1. Ouvrez dans un nouvel onglet : `http://127.0.0.1:8000/admin/visits/stats`
2. **Attendu** : Réponse JSON valide

**Structure de réponse attendue** :
```json
{
  "today": {
    "total_visits": 99,
    "unique_visitors": 7,
    "authenticated_users": 0
  },
  "visits_by_day": [
    {"day": "Ven", "date": "2025-10-24", "count": 74},
    {"day": "Sam", "date": "2025-10-25", "count": 46},
    ...
  ],
  "most_visited_day": {
    "day": "Mer",
    "date": "2025-10-29",
    "visits": 117
  },
  "top_pages": [
    {"url": "formations", "visits": 85},
    {"url": "emplois", "visits": 72},
    ...
  ],
  "total_visits_week": 575
}
```

**Vérifications** :
- ✅ Status HTTP 200
- ✅ Content-Type: application/json
- ✅ Toutes les clés présentes
- ✅ Données cohérentes avec le graphique

---

### 6. **Gestion des erreurs** ⚠️

#### Test 6.1 : Simuler une erreur réseau
1. Ouvrez DevTools (F12) → Onglet Network
2. Activez "Offline" (simuler hors ligne)
3. Rechargez la page ou actualisez le graphique
4. **Attendu** :
   - ✅ Message console : `❌ Erreur lors du chargement des statistiques:`
   - ✅ Texte en rouge : `Erreur de chargement des données`
   - ✅ Pas de crash JavaScript

#### Test 6.2 : API retourne une erreur
1. Modifiez temporairement la route pour qu'elle retourne une erreur 500
2. Actualisez le graphique
3. **Attendu** :
   - ✅ Erreur capturée et loggée
   - ✅ Message utilisateur : `Erreur de chargement des données`

---

### 7. **Responsive Design** 📱

#### Test 7 : Affichage mobile
1. Réduisez la fenêtre du navigateur (DevTools → Toggle device toolbar)
2. Testez sur différentes tailles :
   - **Mobile (375px)** : ✅ Graphique adapté
   - **Tablet (768px)** : ✅ Graphique lisible
   - **Desktop (1920px)** : ✅ Graphique optimal

**Vérifications** :
- ✅ Barres du graphique visibles
- ✅ Labels des jours lisibles
- ✅ Menu déroulant accessible
- ✅ Pas de débordement horizontal

---

### 8. **Performance** ⚡

#### Test 8 : Temps de chargement
1. Ouvrez DevTools → Onglet Network
2. Rechargez la page
3. Mesurez le temps de la requête `/admin/visits/stats`

**Attendu** :
- ✅ Temps < 500ms pour la requête API
- ✅ Graphique affiché en < 1 seconde
- ✅ Pas de ralentissement notable

#### Test 8.2 : Mémoire
1. Onglet Performance → Enregistrer
2. Actualisez le graphique plusieurs fois
3. **Attendu** :
   - ✅ Pas de fuite mémoire
   - ✅ Ancien graphique détruit avant le nouveau (via `visitsChart.destroy()`)

---

### 9. **Commandes Artisan** 🛠️

#### Test 9.1 : Générer des visites de test
```bash
php artisan visits:generate-test 7
```

**Attendu** :
- ✅ Message : `🚀 Génération de visites de test...`
- ✅ Liste des jours avec nombre de visites
- ✅ Message : `✅ XXX visites de test créées avec succès !`
- ✅ Visites insérées dans la table `visits`

#### Test 9.2 : Générer un résumé quotidien
```bash
php artisan visits:generate-summary 2025-10-29
```

**Attendu** :
- ✅ Résumé créé dans `visit_summaries`
- ✅ Tableau avec statistiques affiché
- ✅ Top pages calculées

---

### 10. **Tracking en temps réel** 🔴

#### Test 10.1 : Vérifier que les visites sont enregistrées
1. Lancez le worker de queue :
```bash
php artisan queue:work
```

2. Naviguez sur plusieurs pages du site :
   - `/formations`
   - `/emplois`
   - `/contact`

3. Vérifiez la base de données :
```sql
SELECT * FROM visits ORDER BY visited_at DESC LIMIT 10;
```

**Attendu** :
- ✅ Nouvelles entrées dans la table `visits`
- ✅ URL correcte
- ✅ IP capturée
- ✅ Device/Browser/Platform détectés

#### Test 10.2 : Vérifier les exclusions
1. Visitez `/api/test` ou `/admin/api/something`
2. **Attendu** :
   - ✅ Pas d'entrée créée (chemins exclus)

3. Chargez un fichier CSS : `/assets/css/style.css`
4. **Attendu** :
   - ✅ Pas d'entrée créée (extensions exclues)

---

## 📋 Checklist complète

### Dashboard
- [ ] Graphique se charge au démarrage
- [ ] Total des visites affiché correctement
- [ ] Jour le plus visité affiché
- [ ] Barres colorées visibles
- [ ] Tooltip au survol des barres

### Actions
- [ ] "Actualiser" recharge le graphique
- [ ] "Exporter (CSV)" télécharge le fichier
- [ ] "Partager" copie les stats (ou ouvre le menu natif)
- [ ] Toast de confirmation apparaît pour chaque action

### API
- [ ] `/admin/visits/stats` retourne du JSON valide
- [ ] Toutes les données sont présentes
- [ ] Temps de réponse < 500ms

### Erreurs
- [ ] Erreur réseau gérée proprement
- [ ] Message utilisateur clair en cas d'erreur
- [ ] Pas de crash JavaScript

### Responsive
- [ ] Graphique s'adapte sur mobile
- [ ] Menu déroulant accessible
- [ ] Pas de débordement

### Console
- [ ] Logs clairs et utiles
- [ ] Pas d'erreur JavaScript
- [ ] Émojis visibles pour repérage rapide

---

## 🐛 Problèmes connus et solutions

### Problème 1 : "Aucune donnée à exporter"
**Cause** : Variable `visitsData` non initialisée  
**Solution** : Attendre que le graphique se charge avant d'exporter

### Problème 2 : Graphique ne s'affiche pas
**Causes possibles** :
1. ApexCharts non chargé → Vérifier `<script src="apexcharts">`
2. API en erreur → Vérifier `/admin/visits/stats`
3. Données vides → Générer des visites de test

### Problème 3 : "TypeError: Cannot read property 'textContent'"
**Cause** : Élément DOM non trouvé  
**Solution** : IDs ajoutés (`visitsSubtitle`, `mostVisitedDayText`)

---

## 🚀 Génération de nouvelles données de test

Pour tester avec différents volumes :

```bash
# 7 jours de données (défaut)
php artisan visits:generate-test 7

# 30 jours de données
php artisan visits:generate-test 30

# 1 jour seulement
php artisan visits:generate-test 1
```

**Note** : Les visites sont générées avec :
- Plus de trafic en semaine (50-150 visites) qu'en week-end (30-80)
- Concentration entre 8h et 19h (70% des visites)
- Variété de devices, browsers et pages

---

## ✅ Validation finale

Tous les tests passent ? Le système est **opérationnel** ! 🎉

**Prochaines étapes** :
1. Supprimer les visites de test : `DELETE FROM visits WHERE user_agent = 'Mozilla/5.0 (Test)'`
2. Lancer le worker en production : `php artisan queue:work`
3. Surveiller les logs : `tail -f storage/logs/laravel.log`
4. Planifier les résumés quotidiens (voir VISIT_TRACKING.md)

---

**Créé le** : 30 octobre 2025  
**Version** : 1.0.0  
**Tests effectués** : ✅ Complets

