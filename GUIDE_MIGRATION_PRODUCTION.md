# 🚀 Guide Migration Production - Excellium Conseils

**Date** : 03 Novembre 2025  
**Environnement** : Production (excelliumconseils.com)

---

## ✅ Corrections Appliquées

### 1️⃣ Système de Visites (CORRIGÉ) ✅
**Problème** : Tables `visits` et `visit_summaries` restaient vides  
**Solution** : Job `RecordVisit` rendu synchrone (retrait de `implements ShouldQueue`)

### 2️⃣ Erreur Page Détails Formation (CORRIGÉ) ✅
**Problème** : Erreur "statut sur valeur nulle" sur `/admin/formations/{id}/details-page`  
**Solution** : Correction accès `$inscription->statut` avec `optional()`

### 3️⃣ Contraintes Anti-Doublons (AJOUTÉ) ✅
**Ajout** : Contraintes uniques en base de données
- `formation_user` : `UNIQUE(formation_id, email)`
- `postulations` : `UNIQUE(user_id, opportunite_id)`
- `candidatures` : `UNIQUE(email, emploi_id)` (déjà existant)

### 4️⃣ Configuration Mailgun (AJOUTÉ) ✅
**Ajout** : Configuration complète de Mailgun dans `config/services.php`

### 5️⃣ Validations Médias (DÉJÀ EN PLACE) ✅
Toutes les validations sont strictes et fonctionnelles.

---

## 🔧 ÉTAPE 1 : Configuration Mailgun (.env)

Vérifiez/modifiez votre fichier `.env` :

```env
# Configuration Mail - MAILGUN
MAIL_MAILER=mailgun
MAIL_FROM_ADDRESS=noreply@excelliumconseils.com
MAIL_FROM_NAME="Excellium Conseils"

# Mailgun Configuration
MAILGUN_DOMAIN=excelliumconseils.com
MAILGUN_SECRET=votre-clé-api-mailgun
MAILGUN_ENDPOINT=api.eu.mailgun.net
```

**⚠️ Important** :
- Si votre compte Mailgun est en **région EU**, utilisez : `MAILGUN_ENDPOINT=api.eu.mailgun.net`
- Si votre compte Mailgun est en **région US**, utilisez : `MAILGUN_ENDPOINT=api.mailgun.net`
- Récupérez votre **API Key** depuis votre dashboard Mailgun : https://app.mailgun.com/app/sending/domains

---

## 🚀 ÉTAPE 2 : Commandes à Exécuter

Connectez-vous en SSH à votre serveur et exécutez :

```bash
# Se placer dans le dossier du projet
cd /htdocs

# 1. Appliquer la migration anti-doublons
php artisan migrate --force

# 2. Vider tous les caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# 3. Optimiser pour la production
php artisan config:cache
php artisan route:cache

# 4. Vérifier permissions storage
chmod -R 775 storage bootstrap/cache

# 5. Créer dossiers upload si nécessaire
mkdir -p storage/app/public/cvs
mkdir -p storage/app/public/lettres_motivation
mkdir -p storage/app/public/documents

# 6. Créer symbolic link
php artisan storage:link
```

---

## 📧 ÉTAPE 3 : Tester Mailgun

### Test 1 : Via Tinker

```bash
php artisan tinker
```

Puis dans tinker :
```php
Mail::raw('Email de test Excellium', function($message) {
    $message->to('votre-email@test.com')
            ->subject('Test Mailgun - Excellium Conseils');
});
exit
```

✅ **Résultat attendu** : Vous recevez l'email dans les 30 secondes

### Test 2 : Vérifier les logs Mailgun

1. Allez sur https://app.mailgun.com/app/sending/domains
2. Cliquez sur votre domaine `excelliumconseils.com`
3. Allez dans l'onglet "Logs"
4. Vérifiez que l'email de test apparaît

### Test 3 : Tester une postulation emploi

1. Allez sur le site public
2. Postulez à une offre d'emploi
3. Vérifiez que :
   - ✅ La candidature est enregistrée en BD (table `candidatures`)
   - ✅ L'email est envoyé aux super_admin
   - ✅ Visible dans les logs Mailgun

---

## 🔍 ÉTAPE 4 : Vérifications Post-Migration

### Vérification 1 : Visites enregistrées

```bash
# Connectez-vous au dashboard admin
# Puis vérifiez dans phpMyAdmin ou via SQL :
SELECT COUNT(*) FROM visits WHERE DATE(visited_at) = CURDATE();
```

✅ **Attendu** : Nombre > 0 après avoir navigué sur le site

### Vérification 2 : Anti-doublons

```bash
# Dans phpMyAdmin, exécutez :
SHOW INDEXES FROM formation_user WHERE Key_name = 'unique_formation_user';
SHOW INDEXES FROM postulations WHERE Key_name = 'unique_user_opportunite';
```

✅ **Attendu** : Les contraintes uniques existent

### Vérification 3 : Postulations emplois

1. Postulez à un emploi depuis le site
2. Vérifiez dans phpMyAdmin :
```sql
SELECT * FROM candidatures ORDER BY created_at DESC LIMIT 5;
```

✅ **Attendu** : La nouvelle candidature apparaît

### Vérification 4 : Emails envoyés

```bash
# Vérifier les logs Laravel
tail -100 storage/logs/laravel.log | grep "Email envoyé"
```

✅ **Attendu** : Logs confirmant l'envoi d'emails

---

## 📊 Checklist Finale

| Élément | Statut | Comment Vérifier |
|---------|--------|------------------|
| Migration appliquée | ⬜ | `php artisan migrate:status` |
| Caches vidés | ⬜ | `ls -la bootstrap/cache/` doit être vide |
| Config Mailgun OK | ⬜ | `php artisan config:show mail` |
| Symbolic link créé | ⬜ | `ls -la public/storage` existe |
| Permissions OK | ⬜ | `ls -la storage/` = `drwxrwxr-x` |
| Visites enregistrées | ⬜ | Vérifier table `visits` |
| Anti-doublons actifs | ⬜ | Essayer de s'inscrire 2x |
| Emails envoyés | ⬜ | Test Mailgun réussi |
| Postulations sauvegardées | ⬜ | Vérifier table `candidatures` |

---

## 🆘 Dépannage

### Problème : Erreur "Class 'Mailgun\Mailgun' not found"

**Solution** :
```bash
composer require mailgun/mailgun-php guzzlehttp/guzzle
```

### Problème : Erreur "Invalid domain" Mailgun

**Solution** :
1. Vérifiez que `MAILGUN_DOMAIN` correspond exactement au domaine dans votre compte Mailgun
2. Le domaine doit être **vérifié** dans Mailgun (DNS configuré)

### Problème : Emails non reçus mais pas d'erreur

**Solutions** :
1. Vérifiez les **logs Mailgun** (app.mailgun.com)
2. Vérifiez les **spams** de votre boîte email
3. Vérifiez que les enregistrements DNS SPF/DKIM sont configurés :
   ```bash
   dig TXT excelliumconseils.com
   dig TXT _domainkey.excelliumconseils.com
   ```

### Problème : Postulations non enregistrées

**Solution** :
```bash
# Vérifier les logs d'erreurs
tail -50 storage/logs/laravel.log

# Vérifier les permissions
ls -la storage/app/public/cvs
chmod -R 775 storage/app/public
```

### Problème : Contrainte unique bloque une inscription légitime

**Solution** :
```sql
-- Vérifier les doublons
SELECT email, formation_id, COUNT(*) 
FROM formation_user 
GROUP BY email, formation_id 
HAVING COUNT(*) > 1;

-- Supprimer le doublon (garder le plus récent)
DELETE FROM formation_user WHERE id = ID_DU_DOUBLON;
```

---

## 📞 Support

Si un problème persiste :

1. **Vérifier les logs** :
   ```bash
   tail -100 storage/logs/laravel.log
   ```

2. **Mode debug** (temporairement) :
   ```env
   APP_DEBUG=true
   ```
   ⚠️ Remettre à `false` après débogage !

3. **Tester en local** avec les mêmes configs

---

## 📝 Notes Importantes

- ✅ Tous les fichiers modifiés sont versionnés Git
- ✅ Aucune donnée utilisateur n'a été supprimée
- ✅ Les migrations sont réversibles (`php artisan migrate:rollback`)
- ⚠️ Pensez à **tester** tous les formulaires après migration
- ⚠️ Surveillez les **logs Mailgun** les premières 24h

---

**Dernière mise à jour** : 03/11/2025 13:45

