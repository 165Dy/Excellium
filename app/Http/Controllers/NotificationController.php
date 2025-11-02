<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Obtenir toutes les notifications récentes
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', 20);
        $notifications = Notification::orderByDesc('created_at')->limit($limit)->get();
        
        $unreadCount = Notification::unreadCount();
        
        return response()->json([
            'success' => true,
            'notifications' => $notifications,
            'unread_count' => $unreadCount,
        ]);
    }

    /**
     * Obtenir uniquement les notifications non lues
     */
    public function unread()
    {
        $notifications = Notification::unread()->orderByDesc('created_at')->get();
        
        return response()->json([
            'success' => true,
            'notifications' => $notifications,
            'count' => $notifications->count(),
        ]);
    }

    /**
     * Obtenir le nombre de notifications non lues
     */
    public function unreadCount()
    {
        return response()->json([
            'success' => true,
            'count' => Notification::unreadCount(),
        ]);
    }

    /**
     * Obtenir les détails d'une notification
     */
    public function show($id)
    {
        try {
            $notification = Notification::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'notification' => $notification,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Notification non trouvée',
            ], 404);
        }
    }

    /**
     * Marquer une notification comme lue
     */
    public function markAsRead($id)
    {
        try {
            $notification = Notification::findOrFail($id);
            $notification->markAsRead();
            
            return response()->json([
                'success' => true,
                'message' => 'Notification marquée comme lue',
                'unread_count' => Notification::unreadCount(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour',
            ], 500);
        }
    }

    /**
     * Marquer toutes les notifications comme lues
     */
    public function markAllAsRead()
    {
        try {
            Notification::unread()->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Toutes les notifications ont été marquées comme lues',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour',
            ], 500);
        }
    }

    /**
     * Supprimer une notification
     */
    public function destroy($id)
    {
        try {
            $notification = Notification::findOrFail($id);
            $notification->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Notification supprimée',
                'unread_count' => Notification::unreadCount(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression',
            ], 500);
        }
    }

    /**
     * Supprimer toutes les notifications lues
     */
    public function deleteAllRead()
    {
        try {
            $count = Notification::read()->delete();
            
            return response()->json([
                'success' => true,
                'message' => "$count notification(s) supprimée(s)",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression',
            ], 500);
        }
    }

    /**
     * Afficher la page de gestion des notifications
     */
    public function manage(Request $request)
    {
        // Construire la requête de base
        $query = Notification::query();
        
        // Filtrer par type si spécifié
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        
        // Filtrer par statut (lu/non lu)
        if ($request->filled('status')) {
            if ($request->status === 'read') {
                $query->where('is_read', true);
            } elseif ($request->status === 'unread') {
                $query->where('is_read', false);
            }
        }
        
        // Filtrer par priorité
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }
        
        // Calculer les statistiques AVANT la pagination (sur toutes les données filtrées)
        $filteredQuery = clone $query; // Cloner pour garder les mêmes filtres
        $filteredStats = [
            'total' => $filteredQuery->count(),
            'unread' => (clone $query)->where('is_read', false)->count(),
            'read' => (clone $query)->where('is_read', true)->count(),
            'high_priority' => (clone $query)->where('priority', 'high')->count(),
        ];
        
        // Ordonner par date décroissante et paginer
        $notifications = $query->orderByDesc('created_at')->paginate(50);
        
        // Statistiques globales par type (non filtrées)
        $stats = Notification::statsByType();
        
        return view('Admin.notifications.index', compact('notifications', 'stats', 'filteredStats'));
    }

    /**
     * Statistiques des notifications
     */
    public function stats()
    {
        $total = Notification::count();
        $unread = Notification::unreadCount();
        $byType = Notification::statsByType();
        $today = Notification::whereDate('created_at', today())->count();
        $thisWeek = Notification::where('created_at', '>=', now()->subDays(7))->count();
        
        return response()->json([
            'success' => true,
            'stats' => [
                'total' => $total,
                'unread' => $unread,
                'read' => $total - $unread,
                'today' => $today,
                'this_week' => $thisWeek,
                'by_type' => $byType,
            ],
        ]);
    }

    /**
     * Créer une notification de test
     */
    public function createTest()
    {
        $notification = Notification::create([
            'type' => 'system',
            'title' => 'Notification de test',
            'message' => 'Ceci est une notification de test générée automatiquement',
            'priority' => 'normal',
            'icon' => 'ri-notification-line',
            'badge_color' => 'primary',
            'action_url' => route('admin.dashboard'),
            'action_text' => 'Voir le dashboard',
        ]);

        return response()->json([
            'success' => true,
            'notification' => $notification,
            'message' => 'Notification de test créée',
        ]);
    }
}

