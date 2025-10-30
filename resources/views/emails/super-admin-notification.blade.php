<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Admin</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #667eea;">{{ $action_type }}</h2>
        
        <p><strong>{{ $action_description }}</strong></p>
        
        <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h3>👤 Informations Utilisateur</h3>
            <p><strong>Nom :</strong> {{ $user_name }}</p>
            <p><strong>Email :</strong> {{ $user_email }}</p>
            @isset($user_phone)
            <p><strong>Téléphone :</strong> {{ $user_phone }}</p>
            @endisset
            <p><strong>Date :</strong> {{ $action_date }}</p>
        </div>
        
        <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h3>📋 Détails de l'Action</h3>
            <p><strong>Type :</strong> {{ $entity_type }}</p>
            <p><strong>Objet :</strong> {{ $entity_name }}</p>
            @isset($entity_description)
            <p><strong>Description :</strong> {{ $entity_description }}</p>
            @endisset
            @isset($additional_info)
            <p><strong>Infos supplémentaires :</strong> {{ $additional_info }}</p>
            @endisset
        </div>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $dashboard_link }}" 
               style="display: inline-block; padding: 12px 30px; background-color: #667eea; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold;">
                📊 Voir dans le Dashboard
            </a>
        </div>
        
        <hr style="margin: 30px 0; border: none; border-top: 1px solid #e9ecef;">
        
        <p style="font-size: 12px; color: #6c757d;">
            <strong>Note :</strong> Cet email a été envoyé automatiquement à tous les super administrateurs.
        </p>
        
        <div style="text-align: center; padding: 20px; background-color: #343a40; color: #ffffff; margin-top: 30px;">
            <strong>Excellium Conseils</strong>
            <p style="font-size: 12px; margin: 10px 0;">
                © {{ $current_year }} Excellium Conseils. Tous droits réservés.
            </p>
        </div>
    </div>
</body>
</html>

