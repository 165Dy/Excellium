<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'message',
        'user_id',
        'user_name',
        'user_email',
        'related_type',
        'related_id',
        'data',
        'action_url',
        'action_text',
        'is_read',
        'read_at',
        'priority',
        'icon',
        'badge_color',
    ];

    protected $casts = [
        'data' => 'array',
        'is_read' => 'boolean',
        'read_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    /**
     * Relation avec l'utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope pour les notifications non lues
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope pour les notifications lues
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    /**
     * Scope par type
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope par priorité
     */
    public function scopeHighPriority($query)
    {
        return $query->where('priority', 'high');
    }

    /**
     * Marquer comme lue
     */
    public function markAsRead()
    {
        $this->update([
            'is_read' => true,
            'read_at' => now(),
        ]);
    }

    /**
     * Marquer comme non lue
     */
    public function markAsUnread()
    {
        $this->update([
            'is_read' => false,
            'read_at' => null,
        ]);
    }

    /**
     * Obtenir le nombre de notifications non lues
     */
    public static function unreadCount()
    {
        return self::unread()->count();
    }

    /**
     * Obtenir les notifications récentes (non lues + 10 dernières lues)
     */
    public static function recent($limit = 20)
    {
        $unread = self::unread()->orderByDesc('created_at')->get();
        $read = self::read()->orderByDesc('created_at')->limit($limit - $unread->count())->get();
        
        return $unread->merge($read)->sortByDesc('created_at')->take($limit);
    }

    /**
     * Créer une notification d'inscription à une formation
     */
    public static function createFormationInscription($inscription, $formation)
    {
        return self::create([
            'type' => 'formation_inscription',
            'title' => 'Nouvelle inscription',
            'message' => ($inscription->nom ?? ($inscription->user->prenom ?? 'Un utilisateur')) . ' s\'est inscrit(e) à la formation "' . $formation->titre . '"',
            'user_id' => $inscription->user_id,
            'user_name' => $inscription->nom ?? ($inscription->user ? $inscription->user->nom . ' ' . $inscription->user->prenom : null),
            'user_email' => $inscription->email ?? ($inscription->user->email ?? null),
            'related_type' => 'Formation',
            'related_id' => $formation->id,
            'action_url' => route('admin.formations.details', $formation->id),
            'action_text' => 'Voir la formation',
            'priority' => 'high',
            'icon' => 'ri-book-open-line',
            'badge_color' => 'primary',
            'data' => [
                'formation_titre' => $formation->titre,
                'inscription_id' => $inscription->id,
                'statut' => $inscription->statut,
            ],
        ]);
    }

    /**
     * Créer une notification de candidature
     */
    public static function createCandidature($candidature, $emploi)
    {
        return self::create([
            'type' => 'candidature_nouvelle',
            'title' => 'Nouvelle candidature',
            'message' => $candidature->nom . ' a postulé pour "' . $emploi->titre . '"',
            'user_id' => null,
            'user_name' => $candidature->nom,
            'user_email' => $candidature->email,
            'related_type' => 'Emploi',
            'related_id' => $emploi->id,
            'action_url' => route('admin.candidatures.show', $candidature->id),
            'action_text' => 'Voir la candidature',
            'priority' => 'high',
            'icon' => 'ri-briefcase-line',
            'badge_color' => 'success',
            'data' => [
                'emploi_titre' => $emploi->titre,
                'candidature_id' => $candidature->id,
                'telephone' => $candidature->telephone,
            ],
        ]);
    }

    /**
     * Créer une notification de postulation à une opportunité
     */
    public static function createPostulation($postulation, $opportunite)
    {
        $user = $postulation->user;
        
        return self::create([
            'type' => 'postulation_nouvelle',
            'title' => 'Nouvelle postulation',
            'message' => ($user ? $user->prenom . ' ' . $user->nom : 'Un utilisateur') . ' a postulé pour "' . $opportunite->titre . '"',
            'user_id' => $postulation->user_id,
            'user_name' => $user ? $user->nom . ' ' . $user->prenom : null,
            'user_email' => $user->email ?? null,
            'related_type' => 'Opportunite',
            'related_id' => $opportunite->id,
            'action_url' => route('admin.opportunites.show', $opportunite->id),
            'action_text' => 'Voir l\'opportunité',
            'priority' => 'high',
            'icon' => 'ri-hand-coin-line',
            'badge_color' => 'info',
            'data' => [
                'opportunite_titre' => $opportunite->titre,
                'postulation_id' => $postulation->id,
                'message' => $postulation->message,
            ],
        ]);
    }

    /**
     * Créer une notification d'inscription à un service
     */
    public static function createServiceInscription($userService, $service)
    {
        $user = $userService->user;
        
        return self::create([
            'type' => 'service_inscription',
            'title' => 'Nouvelle inscription à un service',
            'message' => $user->prenom . ' ' . $user->nom . ' s\'est inscrit(e) au service "' . $service->nom . '"',
            'user_id' => $userService->user_id,
            'user_name' => $user->nom . ' ' . $user->prenom,
            'user_email' => $user->email,
            'related_type' => 'Service',
            'related_id' => $service->id,
            'action_url' => route('admin.services.show', $service->id),
            'action_text' => 'Voir le service',
            'priority' => 'high',
            'icon' => 'ri-customer-service-2-line',
            'badge_color' => 'warning',
            'data' => [
                'service_nom' => $service->nom,
                'type_contrat' => $userService->type_contrat,
                'prix_indicatif' => $userService->prix_indicatif,
            ],
        ]);
    }

    /**
     * Créer une notification de sélection de produit
     */
    public static function createProduitSelection($user, $produits)
    {
        $produitsNames = $produits->pluck('nom')->join(', ');
        
        return self::create([
            'type' => 'produit_selection',
            'title' => 'Sélection de produit(s)',
            'message' => $user->prenom . ' ' . $user->nom . ' a sélectionné : ' . $produitsNames,
            'user_id' => $user->id,
            'user_name' => $user->nom . ' ' . $user->prenom,
            'user_email' => $user->email,
            'related_type' => 'Produit',
            'related_id' => null,
            'action_url' => route('admin.users.show', $user->id),
            'action_text' => 'Voir l\'utilisateur',
            'priority' => 'normal',
            'icon' => 'ri-shopping-bag-line',
            'badge_color' => 'secondary',
            'data' => [
                'produits' => $produits->pluck('nom')->toArray(),
                'count' => $produits->count(),
            ],
        ]);
    }

    /**
     * Créer une notification de changement de statut
     */
    public static function createStatutChange($type, $entity, $oldStatut, $newStatut)
    {
        $messages = [
            'formation' => 'Statut d\'inscription modifié : ' . $oldStatut . ' → ' . $newStatut,
            'candidature' => 'Statut de candidature modifié : ' . $oldStatut . ' → ' . $newStatut,
            'postulation' => 'Statut de postulation modifié : ' . $oldStatut . ' → ' . $newStatut,
            'service' => 'Statut de service modifié : ' . $oldStatut . ' → ' . $newStatut,
        ];

        return self::create([
            'type' => $type . '_statut',
            'title' => 'Changement de statut',
            'message' => $messages[$type] ?? 'Statut modifié',
            'priority' => $newStatut === 'refuse' || $newStatut === 'rejete' ? 'high' : 'normal',
            'icon' => 'ri-refresh-line',
            'badge_color' => 'info',
            'data' => [
                'old_statut' => $oldStatut,
                'new_statut' => $newStatut,
            ],
        ]);
    }

    /**
     * Statistiques des notifications par type
     */
    public static function statsByType()
    {
        return self::select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->orderByDesc('count')
            ->get();
    }
}

