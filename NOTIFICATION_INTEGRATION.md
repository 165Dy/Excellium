# 🔔 Guide d'intégration des Notifications

Documentation complète pour intégrer le système de notifications dans les controllers existants.

---

## 📋 Table des matières

1. [Vue d'ensemble](#vue-densemble)
2. [Types de notifications](#types-de-notifications)
3. [Intégration dans les controllers](#intégration-dans-les-controllers)
4. [Exemples d'implémentation](#exemples-dimplémentation)
5. [API et méthodes](#api-et-méthodes)
6. [Testing](#testing)

---

## 🎯 Vue d'ensemble

Le système de notifications capture automatiquement les actions importantes effectuées par les utilisateurs (non-admin/super_admin) :

- ✅ Inscriptions aux formations
- ✅ Candidatures aux emplois
- ✅ Postulations aux opportunités
- ✅ Inscriptions aux services
- ✅ Sélections de produits
- ✅ Changements de statut

---

## 📊 Types de notifications

| Type | Enum | Couleur | Priorité | Icône |
|------|------|---------|----------|-------|
| **Formation - Inscription** | `formation_inscription` | `primary` | `high` | `ri-book-open-line` |
| **Formation - Statut** | `formation_statut` | `info` | `normal` | `ri-refresh-line` |
| **Candidature - Nouvelle** | `candidature_nouvelle` | `success` | `high` | `ri-briefcase-line` |
| **Candidature - Statut** | `candidature_statut` | `info` | `normal` | `ri-refresh-line` |
| **Postulation - Nouvelle** | `postulation_nouvelle` | `info` | `high` | `ri-hand-coin-line` |
| **Postulation - Statut** | `postulation_statut` | `info` | `normal` | `ri-refresh-line` |
| **Service - Inscription** | `service_inscription` | `warning` | `high` | `ri-customer-service-2-line` |
| **Service - Statut** | `service_statut` | `info` | `normal` | `ri-refresh-line` |
| **Produit - Sélection** | `produit_selection` | `secondary` | `normal` | `ri-shopping-bag-line` |

---

## 🔧 Intégration dans les controllers

### 1️⃣ FormationsController

**Fichier** : `app/Http/Controllers/formationsController.php`

**Actions à notifier** :
- Inscription d'un utilisateur à une formation
- Changement de statut d'une inscription

#### Code à ajouter

**Dans la méthode `inscriptionPost()` (après création de l'inscription)** :

```php
use App\Models\Notification;

public function inscriptionPost(Request $request)
{
    // ... code existant ...
    
    // Créer l'inscription
    $inscription = FormationUser::create([
        'formation_id' => $formation->id,
        'user_id' => auth()->id(),
        'nom' => $request->nom,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'message' => $request->message,
        'statut' => 'en_attente',
    ]);
    
    // ✅ CRÉER LA NOTIFICATION
    Notification::createFormationInscription($inscription, $formation);
    
    return response()->json(['success' => true]);
}
```

**Dans la méthode de changement de statut** :

```php
public function updateInscriptionStatut(Request $request, $inscriptionId)
{
    $inscription = FormationUser::findOrFail($inscriptionId);
    $oldStatut = $inscription->statut;
    $newStatut = $request->statut;
    
    $inscription->update(['statut' => $newStatut]);
    
    // ✅ CRÉER LA NOTIFICATION
    Notification::createStatutChange('formation', $inscription, $oldStatut, $newStatut);
    
    return response()->json(['success' => true]);
}
```

---

### 2️⃣ EmploiController

**Fichier** : `app/Http/Controllers/EmploiController.php`

**Actions à notifier** :
- Nouvelle candidature
- Changement de statut d'une candidature

#### Code à ajouter

**Dans la méthode `store()` (après création de la candidature)** :

```php
use App\Models\Notification;

public function store(Request $request)
{
    // ... validation ...
    
    // Créer la candidature
    $candidature = Candidature::create([
        'emploi_id' => $request->emploi_id,
        'nom' => $request->nom,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'cv_path' => $cvPath,
        'lettre_motivation' => $lettrePath,
        'message' => $request->message,
        'statut' => 'nouveau',
    ]);
    
    $emploi = Emploi::find($request->emploi_id);
    
    // ✅ CRÉER LA NOTIFICATION
    Notification::createCandidature($candidature, $emploi);
    
    return response()->json(['success' => true]);
}
```

**Dans la méthode de mise à jour du statut** :

```php
public function updateStatut(Request $request, $id)
{
    $candidature = Candidature::findOrFail($id);
    $oldStatut = $candidature->statut;
    $newStatut = $request->statut;
    
    $candidature->update(['statut' => $newStatut]);
    
    // ✅ CRÉER LA NOTIFICATION
    Notification::createStatutChange('candidature', $candidature, $oldStatut, $newStatut);
    
    return redirect()->back()->with('success', 'Statut mis à jour');
}
```

---

### 3️⃣ OpportuniteController

**Fichier** : `app/Http/Controllers/OpportuniteController.php`

**Actions à notifier** :
- Nouvelle postulation
- Changement de statut d'une postulation

#### Code à ajouter

**Dans la méthode de création de postulation** :

```php
use App\Models\Notification;

public function postuler(Request $request)
{
    // ... validation ...
    
    // Créer la postulation
    $postulation = Postulation::create([
        'opportunite_id' => $request->opportunite_id,
        'user_id' => auth()->id(),
        'message' => $request->message,
        'statut' => 'en_attente',
    ]);
    
    $opportunite = Opportunite::find($request->opportunite_id);
    
    // ✅ CRÉER LA NOTIFICATION
    Notification::createPostulation($postulation, $opportunite);
    
    return response()->json(['success' => true]);
}
```

**Dans la méthode de mise à jour du statut** :

```php
public function updatePostulationStatut(Request $request, $id)
{
    $postulation = Postulation::findOrFail($id);
    $oldStatut = $postulation->statut;
    $newStatut = $request->statut;
    
    $postulation->update(['statut' => $newStatut]);
    
    // ✅ CRÉER LA NOTIFICATION
    Notification::createStatutChange('postulation', $postulation, $oldStatut, $newStatut);
    
    return response()->json(['success' => true]);
}
```

---

### 4️⃣ ServiceController

**Fichier** : `app/Http/Controllers/ServiceController.php`

**Actions à notifier** :
- Inscription à un service
- Changement de statut du service

#### Code à ajouter

**Dans la méthode d'inscription** :

```php
use App\Models\Notification;

public function subscribe(Request $request)
{
    // ... validation ...
    
    // Créer l'inscription au service
    $userService = UserService::create([
        'user_id' => auth()->id(),
        'service_id' => $request->service_id,
        'description' => $request->description,
        'type_contrat' => $request->type_contrat,
        'statut' => 'brouillon',
    ]);
    
    $service = Service::find($request->service_id);
    
    // ✅ CRÉER LA NOTIFICATION
    Notification::createServiceInscription($userService, $service);
    
    return response()->json(['success' => true]);
}
```

**Dans la méthode de mise à jour du statut** :

```php
public function updateStatut(Request $request, $id)
{
    $userService = UserService::findOrFail($id);
    $oldStatut = $userService->statut;
    $newStatut = $request->statut;
    
    $userService->update(['statut' => $newStatut]);
    
    // ✅ CRÉER LA NOTIFICATION
    Notification::createStatutChange('service', $userService, $oldStatut, $newStatut);
    
    return response()->json(['success' => true]);
}
```

---

### 5️⃣ InscriptionController

**Fichier** : `app/Http/Controllers/InscriptionController.php`

**Actions à notifier** :
- Sélection de produits

#### Code à ajouter

**Dans la méthode `saveProduits()` (après enregistrement)** :

```php
use App\Models\Notification;

public function saveProduits(Request $request)
{
    // ... code existant ...
    
    $user = User::where('email', $request->email)->firstOrFail();
    $produits = Produit::whereIn('id', $request->produits)->get();
    
    // Enregistrer les produits...
    foreach ($request->produits as $produitId) {
        UserProduit::firstOrCreate([
            'user_id' => $user->id,
            'produit_id' => $produitId
        ]);
    }
    
    // ✅ CRÉER LA NOTIFICATION
    Notification::createProduitSelection($user, $produits);
    
    // Envoyer l'email...
    
    return response()->json(['success' => true]);
}
```

---

## 📚 API et méthodes

### Méthodes du modèle Notification

#### 1. Créer une notification d'inscription à une formation

```php
Notification::createFormationInscription($inscription, $formation);
```

**Paramètres** :
- `$inscription` : Instance de `FormationUser`
- `$formation` : Instance de `Formation`

**Retour** : Instance de `Notification` créée

---

#### 2. Créer une notification de candidature

```php
Notification::createCandidature($candidature, $emploi);
```

**Paramètres** :
- `$candidature` : Instance de `Candidature`
- `$emploi` : Instance de `Emploi`

**Retour** : Instance de `Notification` créée

---

#### 3. Créer une notification de postulation

```php
Notification::createPostulation($postulation, $opportunite);
```

**Paramètres** :
- `$postulation` : Instance de `Postulation`
- `$opportunite` : Instance de `Opportunite`

**Retour** : Instance de `Notification` créée

---

#### 4. Créer une notification d'inscription à un service

```php
Notification::createServiceInscription($userService, $service);
```

**Paramètres** :
- `$userService` : Instance de `UserService`
- `$service` : Instance de `Service`

**Retour** : Instance de `Notification` créée

---

#### 5. Créer une notification de sélection de produit

```php
Notification::createProduitSelection($user, $produits);
```

**Paramètres** :
- `$user` : Instance de `User`
- `$produits` : Collection de `Produit`

**Retour** : Instance de `Notification` créée

---

#### 6. Créer une notification de changement de statut

```php
Notification::createStatutChange($type, $entity, $oldStatut, $newStatut);
```

**Paramètres** :
- `$type` : String (`'formation'`, `'candidature'`, `'postulation'`, `'service'`)
- `$entity` : Instance de l'entité concernée
- `$oldStatut` : String (ancien statut)
- `$newStatut` : String (nouveau statut)

**Retour** : Instance de `Notification` créée

---

### Routes API disponibles

| Méthode | URL | Description |
|---------|-----|-------------|
| GET | `/admin/notifications` | Liste toutes les notifications |
| GET | `/admin/notifications/unread` | Liste les notifications non lues |
| GET | `/admin/notifications/unread-count` | Compte les notifications non lues |
| PATCH | `/admin/notifications/{id}/read` | Marquer comme lue |
| PATCH | `/admin/notifications/mark-all-read` | Tout marquer comme lu |
| DELETE | `/admin/notifications/{id}` | Supprimer une notification |
| POST | `/admin/notifications/test` | Créer une notification de test |

---

## 🧪 Testing

### Créer des notifications de test

```bash
# Générer 15 notifications de test
php artisan notifications:generate-test 15

# Générer 50 notifications de test
php artisan notifications:generate-test 50
```

### Tester dans la console du navigateur

```javascript
// Charger les notifications
loadNotifications();

// Créer une notification de test
createTestNotification();

// Marquer toutes comme lues
markAllNotificationsAsRead();

// Obtenir le nombre de non lues
fetch('/admin/notifications/unread-count')
    .then(r => r.json())
    .then(console.log);
```

---

## ✅ Checklist d'intégration

### Pour chaque controller :

- [ ] Importer le modèle `Notification` en haut du fichier
- [ ] Identifier les méthodes qui créent des entités (inscriptions, candidatures, etc.)
- [ ] Ajouter `Notification::create...()` après la création
- [ ] Identifier les méthodes qui modifient des statuts
- [ ] Ajouter `Notification::createStatutChange()` après la modification
- [ ] Tester avec des données réelles
- [ ] Vérifier que les notifications apparaissent dans le dropdown

---

## 📍 Emplacements des fichiers

### Contrôleurs à modifier

```
app/Http/Controllers/
├── formationsController.php     ✅ À modifier
├── EmploiController.php          ✅ À modifier
├── OpportuniteController.php     ✅ À modifier
├── ServiceController.php         ✅ À modifier
└── InscriptionController.php     ✅ À modifier
```

### Fichiers créés

```
app/
├── Models/
│   └── Notification.php                           ✅ Créé
├── Http/
│   └── Controllers/
│       └── NotificationController.php             ✅ Créé
└── Console/
    └── Commands/
        └── GenerateTestNotifications.php          ✅ Créé

database/
└── migrations/
    └── 2025_10_30_145610_create_notifications_table.php  ✅ Créé

routes/
└── web.php                                         ✅ Modifié

resources/
└── views/
    └── layouts/
        └── admin.blade.php                         ✅ Modifié
```

---

## 🎨 Interface utilisateur

### Navbar - Icône de notifications

- **Position** : Header, à droite
- **Badge** : Affiche le nombre de notifications non lues (rouge)
- **Dropdown** : 420px de largeur, jusqu'à 20 notifications
- **Actions** :
  - Clic sur une notification → Marque comme lue + Redirige
  - Bouton "Tout marquer comme lu"
  - Lien "Voir toutes les notifications"

### Polling automatique

- **Intervalle** : 30 secondes
- **Fonction** : `startNotificationPolling()`
- **Désactivation** : `stopNotificationPolling()`

---

## 🚀 Prochaines étapes

1. **Intégrer dans tous les controllers** (voir checklist ci-dessus)
2. **Tester chaque type de notification**
3. **Créer la page de gestion complète** (`/admin/notifications/manage`)
4. **Ajouter des filtres** (par type, par date, par priorité)
5. **Implémenter les notifications push** (optionnel, avec Pusher/Socket.IO)
6. **Ajouter des préférences utilisateur** (quels types de notifications recevoir)

---

**Créé le** : 30 octobre 2025  
**Version** : 1.0.0  
**Statut** : ✅ Documentation complète

