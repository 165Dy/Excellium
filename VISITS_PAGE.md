# 📊 Page de Gestion des Visites - Documentation

Page détaillée d'analyse du trafic avec statistiques avancées et graphiques interactifs.

---

## 🎯 Vue d'ensemble

Une page complète d'administration dédiée à l'analyse approfondie des visites sur la plateforme Excellium.

### Fonctionnalités principales

✅ **Statistiques en temps réel** (4 cartes)  
✅ **Graphique des visites par jour** (7 derniers jours)  
✅ **Top 10 pages visitées** avec barres de progression  
✅ **Visites par heure** (graphique aujourd'hui)  
✅ **Répartition par appareil** (donut chart)  
✅ **Tableau des 100 dernières visites** avec pagination  
✅ **Filtrage par date**  
✅ **Export complet en CSV**  

---

## 📍 Accès à la page

### URL
```
http://127.0.0.1:8000/admin/visits
```

### Depuis le dashboard
Cliquez sur la **flèche** → dans la carte "Visites par jour"

### Depuis le menu
**Menu latéral** → "Gestion des visites"

---

## 🎨 Interface utilisateur

### 1. En-tête
- **Titre** : "📊 Gestion des Visites"
- **Actions** :
  - `Actualiser` : Recharge toutes les données
  - `Exporter` : Télécharge un CSV complet

### 2. Cartes statistiques (ligne 1)

| Carte | Icône | Badge | Donnée |
|-------|-------|-------|--------|
| Visites totales | 👁️ | Aujourd'hui | Nombre de visites du jour |
| Visiteurs uniques | 👤 | Uniques | IPs distinctes aujourd'hui |
| Utilisateurs authentifiés | 🛡️ | Connectés | Users connectés aujourd'hui |
| Total semaine | 📅 | 7 jours | Total des 7 derniers jours |

### 3. Graphiques (ligne 2)

#### Graphique principal (gauche)
- **Type** : Area chart (graphique en aire)
- **Période** : 7 derniers jours
- **Couleur** : Violet (#7367F0)
- **Animation** : Smooth gradient
- **Actions** : Export via menu déroulant

#### Top pages (droite)
- **Format** : Liste avec badges numérotés
- **Affichage** : Top 10 pages
- **Détails** : URL + nombre de visites
- **Barre** : Progression relative

### 4. Graphiques secondaires (ligne 3)

#### Visites par heure (gauche)
- **Type** : Bar chart
- **Période** : Aujourd'hui (0h-23h)
- **Couleur** : Vert (#28C76F)
- **Format** : Labels en heures (0h, 1h, ..., 23h)

#### Répartition appareils (droite)
- **Type** : Donut chart
- **Données** : Desktop, Mobile, Tablet
- **Couleurs** : Palette variée
- **Centre** : Total des visites

### 5. Tableau des visites récentes

**Colonnes** :
1. **#** : Numéro de ligne
2. **Date & Heure** : Format FR (dd/mm/yyyy HH:mm:ss)
3. **Page** : URL en format `<code>`
4. **IP** : Adresse IP du visiteur
5. **Appareil** : Badge coloré (Desktop/Mobile/Tablet)
6. **Navigateur** : Nom du browser
7. **Utilisateur** : Badge vert si connecté, "Anonyme" sinon
8. **Référent** : Hostname du referrer

**Fonctionnalités** :
- ✅ Pagination (100 visites par page)
- ✅ Filtre par date (input date)
- ✅ Bouton "Effacer les filtres"
- ✅ Navigation pages précédente/suivante

---

## 🔌 Routes et API

### Routes créées

| Méthode | URL | Contrôleur | Description |
|---------|-----|------------|-------------|
| GET | `/admin/visits` | `index()` | Affiche la page |
| GET | `/admin/visits/stats` | `dashboardStats()` | Stats dashboard |
| GET | `/admin/visits/by-day` | `visitsByDay()` | Visites par jour |
| GET | `/admin/visits/by-hour` | `visitsByHour()` | Visites par heure |
| GET | `/admin/visits/top-pages` | `topPages()` | Top pages |
| GET | `/admin/visits/device-stats` | `deviceStats()` | ✨ **NOUVEAU** Stats devices |
| GET | `/admin/visits/recent?page=X` | `recent()` | ✨ **NOUVEAU** Visites récentes |
| GET | `/admin/visits/export` | `export()` | ✨ **NOUVEAU** Export CSV |

### Nouvelles méthodes du contrôleur

#### `index()` - Afficher la page
```php
public function index()
{
    return view('admin.visits.index');
}
```

#### `deviceStats()` - Statistiques par appareil
```php
public function deviceStats()
{
    $stats = Visit::where('visited_at', '>=', now()->subDays(7))
        ->selectRaw('device, COUNT(*) as count')
        ->groupBy('device')
        ->orderByDesc('count')
        ->get();

    return response()->json(['data' => $stats]);
}
```

**Réponse JSON** :
```json
{
  "data": [
    {"device": "desktop", "count": 245},
    {"device": "mobile", "count": 198},
    {"device": "tablet", "count": 42}
  ]
}
```

#### `recent()` - Visites récentes paginées
```php
public function recent(Request $request)
{
    $query = Visit::with('user')->orderByDesc('visited_at');
    
    if ($request->has('date')) {
        $query->whereDate('visited_at', $request->date);
    }
    
    $visits = $query->paginate(100);
    
    return response()->json([
        'data' => $visits->items(),
        'meta' => [...]
    ]);
}
```

**Paramètres** :
- `page` : Numéro de page (défaut: 1)
- `date` : Date au format YYYY-MM-DD (optionnel)

**Réponse JSON** :
```json
{
  "data": [
    {
      "id": 575,
      "url": "formations",
      "ip": "192.168.1.100",
      "device": "desktop",
      "browser": "Chrome",
      "platform": "Windows",
      "visited_at": "2025-10-30T14:23:15",
      "user": {
        "id": 1,
        "nom": "Dupont"
      }
    }
  ],
  "meta": {
    "current_page": 1,
    "last_page": 6,
    "per_page": 100,
    "total": 575
  }
}
```

#### `export()` - Export CSV complet
```php
public function export()
{
    $visits = Visit::with('user')
        ->orderByDesc('visited_at')
        ->limit(10000)
        ->get();
    
    // Génération CSV avec BOM UTF-8
    // Séparateur: point-virgule (;)
    // Encodage: UTF-8
    
    return response()->stream($callback, 200, $headers);
}
```

**Fichier téléchargé** : `visites_2025-10-30_14-23-15.csv`

**Structure CSV** :
```csv
Date;Heure;Page;IP;Appareil;Navigateur;Plateforme;Utilisateur;Référent
30/10/2025;14:23:15;formations;192.168.1.100;desktop;Chrome;Windows;Dupont;google.com
```

---

## 📊 Graphiques ApexCharts

### 1. Visites par jour (Area Chart)

```javascript
{
    series: [{name: 'Visites', data: [74, 46, 79, 102, 58, 117, 99]}],
    chart: {
        type: 'area',
        height: 350,
        animations: {enabled: true, easing: 'easeinout', speed: 800}
    },
    colors: ['#7367F0'],
    stroke: {curve: 'smooth', width: 3},
    fill: {
        type: 'gradient',
        gradient: {shadeIntensity: 1, opacityFrom: 0.7, opacityTo: 0.3}
    }
}
```

### 2. Visites par heure (Bar Chart)

```javascript
{
    series: [{name: 'Visites', data: [5, 3, 2, ...]}],
    chart: {type: 'bar', height: 300},
    plotOptions: {
        bar: {borderRadius: 6, columnWidth: '60%'}
    },
    colors: ['#28C76F']
}
```

### 3. Répartition appareils (Donut Chart)

```javascript
{
    series: [245, 198, 42],
    labels: ['Desktop', 'Mobile', 'Tablet'],
    chart: {type: 'donut', height: 300},
    colors: ['#7367F0', '#28C76F', '#FF9F43', '#EA5455'],
    plotOptions: {
        pie: {
            donut: {
                size: '65%',
                labels: {
                    show: true,
                    total: {show: true, label: 'Total'}
                }
            }
        }
    }
}
```

---

## 🔄 Fonctions JavaScript

### Initialisation
```javascript
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Initialisation page visites...');
    loadAllData();
});
```

### Chargement des données
```javascript
async function loadAllData() {
    await Promise.all([
        loadStats(),
        loadVisitsByDay(),
        loadVisitsByHour(),
        loadTopPages(),
        loadDeviceStats(),
        loadRecentVisits()
    ]);
}
```

### Actualiser toutes les données
```javascript
function refreshAllData() {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'info',
        title: 'Actualisation en cours...',
        timer: 1000
    });
    
    loadAllData().then(() => {
        Swal.fire({
            toast: true,
            icon: 'success',
            title: 'Données actualisées',
            timer: 2000
        });
    });
}
```

### Filtrer par date
```javascript
function filterByDate(date) {
    filterDate = date;
    loadRecentVisits(1);
}
```

### Exporter toutes les données
```javascript
function exportAllData() {
    window.location.href = '/admin/visits/export';
}
```

---

## 📁 Fichiers créés/modifiés

### 1. Vue Blade
**Fichier** : `resources/views/admin/visits/index.blade.php`  
**Lignes** : 639 lignes  
**Sections** :
- En-tête avec actions
- 4 cartes statistiques
- Graphique principal (visites par jour)
- Top pages
- Visites par heure
- Répartition devices
- Tableau visites récentes
- Pagination

### 2. Contrôleur
**Fichier** : `app/Http/Controllers/VisitController.php`  
**Lignes ajoutées** : 106 lignes  
**Méthodes ajoutées** :
- `index()` : Affichage de la page
- `deviceStats()` : Stats par appareil
- `recent()` : Visites récentes paginées
- `export()` : Export CSV complet

### 3. Routes
**Fichier** : `routes/web.php`  
**Routes ajoutées** : 3 nouvelles routes
- `GET /admin/visits` → page principale
- `GET /admin/visits/device-stats` → stats devices
- `GET /admin/visits/recent?page=X&date=Y` → visites récentes
- `GET /admin/visits/export` → export CSV

### 4. Dashboard
**Fichier** : `resources/views/dashboard.blade.php`  
**Modification** : Ligne 247-251  
**Changement** : Ajout d'un lien `<a>` sur la flèche pour rediriger vers `/admin/visits`

### 5. Menu admin
**Fichier** : `resources/views/layouts/admin.blade.php`  
**Modification** : Ligne 758-763  
**Changement** : Activation du lien "Gestion des visites" avec classe `active` conditionnelle

---

## 🧪 Tests à effectuer

### Test 1 : Accès depuis le dashboard
1. Accédez au dashboard : `/admin/dashboard`
2. Localisez la carte "Visites par jour"
3. Cliquez sur la **flèche** → en bas à droite
4. **Attendu** : Redirection vers `/admin/visits`

### Test 2 : Accès depuis le menu
1. Ouvrez le menu latéral
2. Cliquez sur "Gestion des visites" (icône graphique)
3. **Attendu** : Page s'ouvre, menu item actif

### Test 3 : Chargement des statistiques
1. Sur la page `/admin/visits`
2. Ouvrez la console (F12)
3. **Attendu** :
   - ✅ `🚀 Initialisation page visites...`
   - ✅ 4 cartes affichent des chiffres
   - ✅ Graphiques se chargent
   - ✅ Tableau se remplit

### Test 4 : Actualiser
1. Cliquez sur le bouton "Actualiser"
2. **Attendu** :
   - ✅ Toast "Actualisation en cours..."
   - ✅ Toast "Données actualisées"
   - ✅ Toutes les sections se rechargent

### Test 5 : Export CSV
1. Cliquez sur le bouton "Exporter"
2. **Attendu** :
   - ✅ Fichier CSV téléchargé
   - ✅ Nom : `visites_YYYY-MM-DD_HH-MM-SS.csv`
   - ✅ Données correctes, encodage UTF-8

### Test 6 : Filtrer par date
1. Sélectionnez une date dans l'input date
2. **Attendu** :
   - ✅ Tableau mis à jour avec visites du jour
   - ✅ Pagination recalculée

### Test 7 : Pagination
1. Naviguez entre les pages (si > 100 visites)
2. **Attendu** :
   - ✅ Tableau mis à jour
   - ✅ Numérotation correcte
   - ✅ Page active mise en surbrillance

---

## 📈 Données affichées

### Cartes statistiques
- **Aujourd'hui** : Visites du jour (depuis minuit)
- **Visiteurs uniques** : IPs distinctes aujourd'hui
- **Utilisateurs authentifiés** : Users connectés aujourd'hui
- **Total semaine** : Somme des 7 derniers jours

### Graphique visites par jour
- **Période** : 7 derniers jours (glissant)
- **Format** : Jours de la semaine (Lun, Mar, ...)
- **Données** : Nombre de visites par jour

### Top pages
- **Période** : 7 derniers jours
- **Limite** : 10 pages
- **Tri** : Par nombre de visites décroissant
- **Affichage** : URL + badge numéroté + barre de progression

### Visites par heure
- **Période** : Aujourd'hui uniquement
- **Format** : 24 heures (0h-23h)
- **Données** : Nombre de visites par heure

### Répartition appareils
- **Période** : 7 derniers jours
- **Catégories** : Desktop, Mobile, Tablet
- **Format** : Donut chart avec total au centre

### Tableau visites récentes
- **Limite** : 100 visites par page
- **Tri** : Par date décroissante (plus récentes en premier)
- **Données** : Toutes les colonnes de la table `visits` + relation `user`

---

## 🎨 Palette de couleurs

| Élément | Couleur | Hex |
|---------|---------|-----|
| Graphique principal | Violet | #7367F0 |
| Graphique heure | Vert | #28C76F |
| Device - Desktop | Violet | #7367F0 |
| Device - Mobile | Vert | #28C76F |
| Device - Tablet | Orange | #FF9F43 |
| Badge Desktop | Primary | Bootstrap primary |
| Badge Mobile | Success | Bootstrap success |
| Badge Tablet | Info | Bootstrap info |

---

## 💡 Améliorations futures possibles

1. **Filtre par appareil** : Filtrer le tableau par desktop/mobile/tablet
2. **Filtre par page** : Dropdown avec liste des pages
3. **Graphique browser** : Répartition par navigateur (Chrome, Firefox, ...)
4. **Graphique platform** : Répartition par OS (Windows, Mac, Linux, ...)
5. **Heatmap** : Visites par jour de la semaine et par heure
6. **Export PDF** : Génération d'un rapport PDF
7. **Alerte email** : Notification si trafic anormal
8. **Comparaison période** : Comparer avec semaine précédente
9. **Carte géographique** : Si géolocalisation activée
10. **Temps réel** : WebSocket pour visites en direct

---

## 🚀 Commandes utiles

```bash
# Accéder à la page
open http://127.0.0.1:8000/admin/visits

# Vider les caches
php artisan route:clear
php artisan view:clear

# Générer des visites de test
php artisan visits:generate-test 7

# Voir les logs
tail -f storage/logs/laravel.log
```

---

## ✅ Checklist complète

### Interface
- [x] Page accessible depuis dashboard
- [x] Page accessible depuis menu
- [x] 4 cartes statistiques fonctionnelles
- [x] Graphique visites par jour
- [x] Top pages affiché
- [x] Graphique visites par heure
- [x] Graphique répartition devices
- [x] Tableau visites récentes
- [x] Pagination fonctionnelle

### Fonctionnalités
- [x] Bouton "Actualiser" fonctionnel
- [x] Bouton "Exporter" fonctionnel
- [x] Filtre par date fonctionnel
- [x] Bouton "Effacer filtres" fonctionnel
- [x] Navigation pagination

### Techniques
- [x] Routes créées
- [x] Contrôleur mis à jour
- [x] Vue créée
- [x] Menu mis à jour
- [x] Dashboard mis à jour
- [x] JavaScript fonctionnel
- [x] API fonctionnelles
- [x] Export CSV fonctionnel

---

**Créé le** : 30 octobre 2025  
**Version** : 1.0.0  
**Statut** : ✅ Opérationnel

