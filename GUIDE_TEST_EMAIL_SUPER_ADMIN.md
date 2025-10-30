# 🧪 Guide de Test - Système Email Super Admin

## 🎯 Objectif

Tester que les emails sont bien envoyés aux super_admin pour tous les types d'événements.

---

## ⚙️ Prérequis

### 1. Créer un super_admin

```sql
-- Méthode 1 : Transformer un utilisateur existant
UPDATE users SET type = 'super_admin' WHERE id = 1;

-- Méthode 2 : Créer un nouveau super_admin
INSERT INTO users (name, email, type, password, created_at, updated_at)
VALUES ('Admin Test', 'votre-email@example.com', 'super_admin', NULL, NOW(), NOW());
```

### 2. Vérifier la configuration Mailgun

```env
# .env
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=mg.excelliumconseils.com
MAILGUN_SECRET=key-xxxxxxxxxxxxxx
MAILGUN_ENDPOINT=https://api.eu.mailgun.net
```

### 3. Vérifier le template Mailgun

- Template name : `notification-super-admin`
- Sujet : `🔔 Nouvelle action utilisateur : {{action_type}}`

---

## 🚀 Tests automatisés

### Test complet (tous les types)

```bash
php artisan email:test-super-admin
```

**Résultat attendu** :
```
🔍 Recherche des super_admin...
✅ 1 super_admin(s) trouvé(s) :
   - Admin Test (admin@example.com)

📧 Test : Inscription Formation...
   ✅ Email formation envoyé
📧 Test : Candidature Emploi...
   ✅ Email emploi envoyé
📧 Test : Postulation Opportunité...
   ✅ Email opportunité envoyé
📧 Test : Souscription Service...
   ✅ Email service envoyé
📧 Test : Sélection Produit...
   ✅ Email produit envoyé

✅ Test terminé ! Vérifiez vos logs et Mailgun.
```

### Test d'un type spécifique

```bash
# Formation
php artisan email:test-super-admin formation

# Emploi
php artisan email:test-super-admin emploi

# Opportunité
php artisan email:test-super-admin opportunite

# Service
php artisan email:test-super-admin service

# Produit
php artisan email:test-super-admin produit
```

---

## 📊 Vérification des résultats

### 1. Vérifier les logs Laravel

```bash
# Windows PowerShell
Get-Content storage/logs/laravel.log -Tail 50

# Linux/Mac
tail -f storage/logs/laravel.log
```

**Rechercher** :
```
Email envoyé au super_admin: admin@example.com pour action: Nouvelle inscription à une formation
Email envoyé au super_admin: admin@example.com pour action: Nouvelle candidature reçue
...
```

### 2. Vérifier dans Mailgun

1. Aller sur [Mailgun Dashboard](https://app.eu.mailgun.com/)
2. Sending → Logs
3. Chercher les emails récents
4. Vérifier :
   - ✅ Status : `Delivered` ou `Accepted`
   - ✅ Subject : `🔔 Nouvelle action utilisateur : ...`
   - ✅ Recipient : `admin@example.com`
   - ✅ Template : `notification-super-admin`

### 3. Vérifier dans votre boîte mail

- Ouvrir votre boîte mail
- Chercher les emails avec le sujet : `🔔 Nouvelle action utilisateur`
- Vérifier le design responsive
- Tester les liens du dashboard

---

## 🧪 Tests manuels

### Test 1 : Inscription Formation

1. **Action** : Aller sur `/formations`
2. **Action** : Cliquer sur "S'inscrire" pour une formation
3. **Action** : Remplir le formulaire et soumettre
4. **Vérification** : 
   - Email reçu par le client ✅
   - Email reçu par les super_admin ✅
   - Log dans `laravel.log` ✅

### Test 2 : Candidature Emploi

1. **Action** : Aller sur `/emplois`
2. **Action** : Cliquer sur "Postuler" pour un emploi
3. **Action** : Remplir le formulaire et uploader CV
4. **Vérification** :
   - Email reçu par le candidat ✅
   - Email reçu par les super_admin ✅
   - Log dans `laravel.log` ✅

### Test 3 : Postulation Opportunité

1. **Action** : Aller sur `/opportunites`
2. **Action** : Postuler à une opportunité
3. **Action** : Remplir le formulaire
4. **Vérification** :
   - Email reçu par les super_admin ✅
   - Log dans `laravel.log` ✅

### Test 4 : Inscription Service

1. **Action** : Aller sur `/services/{slug}`
2. **Action** : S'inscrire à un service
3. **Action** : Remplir le formulaire
4. **Vérification** :
   - Email reçu par le client ✅
   - Email reçu par les super_admin ✅
   - Log dans `laravel.log` ✅

### Test 5 : Sélection Produit

1. **Action** : Utiliser l'endpoint `/produit/selectionner`
2. **Action** : Envoyer une requête POST avec :
   ```json
   {
     "email": "test@example.com",
     "nom": "Dupont",
     "prenom": "Jean",
     "telephone": "+237 677 12 34 56",
     "produit_id": 1,
     "description": "Intéressé par ce produit"
   }
   ```
3. **Vérification** :
   - Email reçu par les super_admin ✅
   - Log dans `laravel.log` ✅

---

## 🐛 Troubleshooting

### Problème : Aucun super_admin trouvé

**Solution** :
```sql
-- Vérifier les utilisateurs
SELECT id, name, email, type FROM users;

-- Créer un super_admin
UPDATE users SET type = 'super_admin' WHERE id = 1;
```

### Problème : Emails non envoyés

**Vérifications** :
1. `.env` correctement configuré ?
2. Mailgun domain vérifié ?
3. Template Mailgun existe ?
4. Clé API Mailgun valide ?

**Commandes** :
```bash
php artisan config:clear
php artisan cache:clear
php artisan email:test-super-admin
```

### Problème : Erreur 401 Unauthorized (Mailgun)

**Solution** :
```bash
# Vérifier la clé API
grep MAILGUN_SECRET .env

# Tester la connexion
curl -s --user 'api:YOUR_API_KEY' \
    https://api.eu.mailgun.net/v3/domains
```

### Problème : Template non trouvé

**Solution** :
1. Aller sur Mailgun Dashboard
2. Sending → Templates
3. Vérifier que `notification-super-admin` existe
4. Si non, créer le template avec le code fourni

---

## 📋 Checklist de validation

### Avant de passer en production

- [ ] Au moins 1 super_admin créé
- [ ] Commande de test exécutée avec succès
- [ ] Emails reçus dans la boîte mail
- [ ] Template Mailgun responsive sur mobile
- [ ] Logs Laravel sans erreur
- [ ] Tous les liens fonctionnent
- [ ] Variables Handlebars correctement remplacées
- [ ] Design cohérent avec la charte graphique

### Validation finale

```bash
# 1. Tester tous les types
php artisan email:test-super-admin

# 2. Vérifier les logs
tail -f storage/logs/laravel.log | grep "super_admin"

# 3. Compter les emails envoyés
grep -c "Email envoyé au super_admin" storage/logs/laravel.log
```

**Résultat attendu** : Nombre d'emails = Nombre de super_admin × Nombre de types testés

---

## ✅ Critères de réussite

| Critère | Description | Statut |
|---------|-------------|--------|
| **Super_admin** | Au moins 1 super_admin en DB | ⬜ |
| **Configuration** | Mailgun correctement configuré | ⬜ |
| **Template** | Template créé et fonctionnel | ⬜ |
| **Test auto** | Commande de test sans erreur | ⬜ |
| **Réception** | Emails reçus par les super_admin | ⬜ |
| **Design** | Email responsive et professionnel | ⬜ |
| **Liens** | Tous les liens fonctionnent | ⬜ |
| **Logs** | Aucune erreur dans les logs | ⬜ |

---

## 🎯 Performance attendue

- **Temps d'envoi** : < 2 secondes par email
- **Taux de délivrance** : > 99%
- **Responsive** : ✅ Mobile, tablette, desktop
- **Compatibilité email** : Gmail, Outlook, Apple Mail, etc.

---

## 📞 Support

En cas de problème persistant :

1. Consulter `SUPER_ADMIN_EMAIL_SYSTEM.md`
2. Vérifier les logs Laravel
3. Vérifier les logs Mailgun
4. Contacter le support Mailgun si nécessaire

---

**Bonne chance avec vos tests ! 🚀**

