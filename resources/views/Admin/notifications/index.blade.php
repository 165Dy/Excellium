@extends('layouts.admin')

@section('dashboard')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">🔔 Gestion des Notifications</h4>
                <p class="text-muted mb-0">Historique complet de toutes les notifications</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-primary" onclick="location.reload()">
                    <i class="ri ri-refresh-line me-1"></i>Actualiser
                </button>
                <button class="btn btn-outline-danger" onclick="deleteAllRead()">
                    <i class="ri ri-delete-bin-line me-1"></i>Supprimer lues
                </button>
                <button class="btn btn-primary" onclick="createTestNotification()">
                    <i class="ri ri-add-line me-1"></i>Test
                </button>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row g-4 mb-4" id="statsCards">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <i class="ri ri-notification-3-line icon-24px"></i>
                                </div>
                            </div>
                            <span class="badge bg-label-primary rounded-pill">Total</span>
                        </div>
                        <h4 class="mb-0" id="statTotal">{{ $filteredStats['total'] }}</h4>
                        <p class="mb-0 small text-muted">Notifications</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="ri ri-notification-badge-line icon-24px"></i>
                                </div>
                            </div>
                            <span class="badge bg-label-warning rounded-pill">Non lues</span>
                        </div>
                        <h4 class="mb-0" id="statUnread">{{ $filteredStats['unread'] }}</h4>
                        <p class="mb-0 small text-muted">À traiter</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded">
                                    <i class="ri ri-checkbox-circle-line icon-24px"></i>
                                </div>
                            </div>
                            <span class="badge bg-label-success rounded-pill">Lues</span>
                        </div>
                        <h4 class="mb-0" id="statRead">{{ $filteredStats['read'] }}</h4>
                        <p class="mb-0 small text-muted">Traitées</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-info rounded">
                                    <i class="ri ri-alert-line icon-24px"></i>
                                </div>
                            </div>
                            <span class="badge bg-label-danger rounded-pill">Haute</span>
                        </div>
                        <h4 class="mb-0" id="statHighPriority">{{ $filteredStats['high_priority'] }}</h4>
                        <p class="mb-0 small text-muted">Priorité haute</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques par type -->
        @if($stats && $stats->count() > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">📊 Répartition par type</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($stats as $stat)
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="badge bg-label-primary rounded p-2 me-3">
                                    @switch($stat->type)
                                        @case('formation_inscription')
                                            <i class="ri ri-book-open-line"></i>
                                            @break
                                        @case('candidature_nouvelle')
                                            <i class="ri ri-briefcase-line"></i>
                                            @break
                                        @case('postulation_nouvelle')
                                            <i class="ri ri-hand-coin-line"></i>
                                            @break
                                        @case('service_inscription')
                                            <i class="ri ri-customer-service-2-line"></i>
                                            @break
                                        @default
                                            <i class="ri ri-notification-line"></i>
                                    @endswitch
                                </div>
                                <div>
                                    <h6 class="mb-0">{{ ucfirst(str_replace('_', ' ', $stat->type)) }}</h6>
                                    <small class="text-muted">{{ $stat->count }} notifications</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Filtres -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Type</label>
                        <select id="filterType" class="form-select" onchange="applyFilters()">
                            <option value="">Tous les types</option>
                            <option value="formation_inscription" {{ request('type') == 'formation_inscription' ? 'selected' : '' }}>Formation - Inscription</option>
                            <option value="candidature_nouvelle" {{ request('type') == 'candidature_nouvelle' ? 'selected' : '' }}>Candidature - Nouvelle</option>
                            <option value="postulation_nouvelle" {{ request('type') == 'postulation_nouvelle' ? 'selected' : '' }}>Postulation - Nouvelle</option>
                            <option value="service_inscription" {{ request('type') == 'service_inscription' ? 'selected' : '' }}>Service - Inscription</option>
                            <option value="produit_selection" {{ request('type') == 'produit_selection' ? 'selected' : '' }}>Produit - Sélection</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Statut</label>
                        <select id="filterStatus" class="form-select" onchange="applyFilters()">
                            <option value="">Tous</option>
                            <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Non lues</option>
                            <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Lues</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Priorité</label>
                        <select id="filterPriority" class="form-select" onchange="applyFilters()">
                            <option value="">Toutes</option>
                            <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>Haute</option>
                            <option value="normal" {{ request('priority') == 'normal' ? 'selected' : '' }}>Normale</option>
                            <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Basse</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                <i class="ri ri-close-line me-1"></i>Réinitialiser
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des notifications -->
        <div class="card" id="notificationsCard">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Liste des notifications</h5>
                <span class="badge bg-label-primary" id="notificationsCount">{{ $notifications->total() }} notifications</span>
            </div>
            <div class="table-responsive">
                <table class="table table-hover" id="notificationsTable">
                    <thead>
                        <tr>
                            <th width="40"></th>
                            <th>Type</th>
                            <th>Titre</th>
                            <th>Message</th>
                            <th>Utilisateur</th>
                            <th>Date</th>
                            <th>Priorité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notifications as $notification)
                            <tr class="{{ !$notification->is_read ? 'table-primary' : '' }}">
                                <td>
                                    @if(!$notification->is_read)
                                        <span class="badge bg-primary rounded-circle" style="width: 8px; height: 8px; padding: 0;">
                                            &nbsp;
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="avatar avatar-sm">
                                        <div class="avatar-initial bg-label-{{ $notification->badge_color }} rounded">
                                            <i class="{{ $notification->icon ?? 'ri-notification-line' }}"></i>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <strong>{{ $notification->title }}</strong>
                                </td>
                                <td>
                                    <span class="text-muted">{{ Illuminate\Support\Str::limit($notification->message, 60) }}</span>
                                </td>
                                <td>
                                    @if($notification->user_name)
                                        <span class="badge bg-label-info">{{ $notification->user_name }}</span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ $notification->created_at->format('d/m/Y H:i') }}
                                        <br>
                                        <span class="text-muted" style="font-size: 10px;">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </span>
                                    </small>
                                </td>
                                <td>
                                    @switch($notification->priority)
                                        @case('high')
                                            <span class="badge bg-danger">Haute</span>
                                            @break
                                        @case('normal')
                                            <span class="badge bg-info">Normale</span>
                                            @break
                                        @case('low')
                                            <span class="badge bg-secondary">Basse</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        @if(!$notification->is_read)
                                            <button class="btn btn-sm btn-icon btn-outline-success" 
                                                onclick="markAsRead({{ $notification->id }})"
                                                title="Marquer comme lu">
                                                <i class="ri ri-check-line"></i>
                                            </button>
                                        @endif
                                        <button class="btn btn-sm btn-icon btn-outline-primary" 
                                            onclick="viewNotificationDetails({{ $notification->id }})"
                                            title="Voir les détails">
                                            <i class="ri ri-eye-line"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-outline-danger" 
                                            onclick="deleteNotification({{ $notification->id }})"
                                            title="Supprimer">
                                            <i class="ri ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <i class="ri ri-notification-off-line" style="font-size: 48px; color: #adb5bd;"></i>
                                    <p class="text-muted mb-0">Aucune notification</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($notifications->hasPages())
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        Affichage de {{ $notifications->firstItem() }} à {{ $notifications->lastItem() }} 
                        sur {{ $notifications->total() }} notifications
                    </div>
                    <nav>
                        {{ $notifications->links() }}
                    </nav>
                </div>
            </div>
            @endif
        </div>

        <!-- Modale de détails -->
        <div class="modal fade" id="notificationDetailsModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="ri ri-notification-3-line me-2"></i>Détails de la notification
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="notificationDetailsContent">
                        <div class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Chargement...</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="markAsReadFromModal" onclick="markAsReadFromModal()">
                            <i class="ri ri-check-line me-1"></i>Marquer comme lu
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Marquer comme lue
        async function markAsRead(notificationId) {
            try {
                const response = await fetch(`/admin/notifications/${notificationId}/read`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Notification marquée comme lue',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    location.reload();
                }
            } catch (error) {
                console.error('Erreur:', error);
                Swal.fire('Erreur', 'Impossible de marquer la notification', 'error');
            }
        }

        // Supprimer une notification
        async function deleteNotification(notificationId) {
            const result = await Swal.fire({
                title: 'Supprimer cette notification ?',
                text: 'Cette action est irréversible',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            });

            if (result.isConfirmed) {
                try {
                    const response = await fetch(`/admin/notifications/${notificationId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Notification supprimée',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        location.reload();
                    }
                } catch (error) {
                    console.error('Erreur:', error);
                    Swal.fire('Erreur', 'Impossible de supprimer la notification', 'error');
                }
            }
        }

        // Supprimer toutes les notifications lues
        async function deleteAllRead() {
            const result = await Swal.fire({
                title: 'Supprimer toutes les notifications lues ?',
                text: 'Cette action est irréversible',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer tout',
                cancelButtonText: 'Annuler'
            });

            if (result.isConfirmed) {
                try {
                    const response = await fetch('/admin/notifications/read/all', {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Succès',
                            text: data.message,
                            timer: 2000
                        });
                        location.reload();
                    }
                } catch (error) {
                    console.error('Erreur:', error);
                    Swal.fire('Erreur', 'Impossible de supprimer les notifications', 'error');
                }
            }
        }

        // Créer une notification de test
        async function createTestNotification() {
            try {
                const response = await fetch('/admin/notifications/test', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Notification de test créée',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    setTimeout(() => location.reload(), 2000);
                }
            } catch (error) {
                console.error('Erreur:', error);
                Swal.fire('Erreur', 'Impossible de créer la notification', 'error');
            }
        }

        // ===== FILTRAGE AJAX =====
        let currentNotificationId = null;

        // Appliquer les filtres dynamiquement
        async function applyFilters() {
            const type = document.getElementById('filterType').value;
            const status = document.getElementById('filterStatus').value;
            const priority = document.getElementById('filterPriority').value;

            // Construire l'URL avec les paramètres
            const params = new URLSearchParams();
            if (type) params.append('type', type);
            if (status) params.append('status', status);
            if (priority) params.append('priority', priority);
            params.append('ajax', '1');

            try {
                const response = await fetch(`/admin/notifications/manage?${params.toString()}`);
                const html = await response.text();

                // Parser le HTML reçu
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');

                // Remplacer uniquement le tbody du tableau
                const newTbody = doc.querySelector('#notificationsTable tbody');
                const currentTbody = document.querySelector('#notificationsTable tbody');
                
                if (newTbody && currentTbody) {
                    currentTbody.innerHTML = newTbody.innerHTML;
                }

                // Mettre à jour le compteur
                const newCount = doc.querySelector('#notificationsCount');
                const currentCount = document.querySelector('#notificationsCount');
                if (newCount && currentCount) {
                    currentCount.textContent = newCount.textContent;
                }

                // Mettre à jour les statistiques
                const newStatTotal = doc.querySelector('#statTotal');
                const newStatUnread = doc.querySelector('#statUnread');
                const newStatRead = doc.querySelector('#statRead');
                const newStatHighPriority = doc.querySelector('#statHighPriority');

                if (newStatTotal) document.querySelector('#statTotal').textContent = newStatTotal.textContent;
                if (newStatUnread) document.querySelector('#statUnread').textContent = newStatUnread.textContent;
                if (newStatRead) document.querySelector('#statRead').textContent = newStatRead.textContent;
                if (newStatHighPriority) document.querySelector('#statHighPriority').textContent = newStatHighPriority.textContent;

                // Animation de succès
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Filtres appliqués',
                    showConfirmButton: false,
                    timer: 1000
                });

            } catch (error) {
                console.error('Erreur filtrage:', error);
                Swal.fire('Erreur', 'Impossible d\'appliquer les filtres', 'error');
            }
        }

        // Réinitialiser les filtres
        function clearFilters() {
            document.getElementById('filterType').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterPriority').value = '';
            applyFilters();
        }

        // ===== MODALE DE DÉTAILS =====
        
        // Afficher les détails d'une notification
        async function viewNotificationDetails(notificationId) {
            currentNotificationId = notificationId;
            
            // Ouvrir la modale
            const modal = new bootstrap.Modal(document.getElementById('notificationDetailsModal'));
            modal.show();
            
            // Réinitialiser le contenu
            document.getElementById('notificationDetailsContent').innerHTML = `
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </div>
            `;

            try {
                const response = await fetch(`/admin/notifications/${notificationId}`);
                const data = await response.json();

                if (data.success) {
                    const notification = data.notification;
                    
                    // Construire le HTML des détails
                    let html = `
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="alert alert-${getAlertColor(notification.badge_color)} d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        <div class="avatar-initial bg-label-${notification.badge_color} rounded">
                                            <i class="${notification.icon || 'ri-notification-line'}"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">${notification.title}</h6>
                                        <small class="text-muted">${notification.type.replace(/_/g, ' ')}</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Message</label>
                                <p class="form-control-plaintext">${notification.message}</p>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Statut</label>
                                <p class="form-control-plaintext">
                                    ${notification.is_read 
                                        ? '<span class="badge bg-success">Lue</span>' 
                                        : '<span class="badge bg-warning">Non lue</span>'}
                                </p>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Priorité</label>
                                <p class="form-control-plaintext">
                                    ${getPriorityBadge(notification.priority)}
                                </p>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Date</label>
                                <p class="form-control-plaintext">
                                    ${new Date(notification.created_at).toLocaleString('fr-FR')}
                                    <br>
                                    <small class="text-muted">${getTimeAgo(notification.created_at)}</small>
                                </p>
                            </div>
                    `;

                    // Utilisateur
                    if (notification.user_name || notification.user_email) {
                        html += `
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Utilisateur</label>
                                <p class="form-control-plaintext">
                                    ${notification.user_name ? `<strong>${notification.user_name}</strong><br>` : ''}
                                    ${notification.user_email ? `<small class="text-muted">${notification.user_email}</small>` : ''}
                                </p>
                            </div>
                        `;
                    }

                    // URL d'action
                    if (notification.action_url) {
                        html += `
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Action</label>
                                <p class="form-control-plaintext">
                                    <a href="${notification.action_url}" class="btn btn-sm btn-primary">
                                        <i class="ri ri-external-link-line me-1"></i>${notification.action_text || 'Voir'}
                                    </a>
                                </p>
                            </div>
                        `;
                    }

                    // Données supplémentaires
                    if (notification.data && Object.keys(notification.data).length > 0) {
                        html += `
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Informations supplémentaires</label>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <pre class="mb-0" style="font-size: 12px;">${JSON.stringify(notification.data, null, 2)}</pre>
                                    </div>
                                </div>
                            </div>
                        `;
                    }

                    html += '</div>';
                    
                    document.getElementById('notificationDetailsContent').innerHTML = html;
                    
                    // Cacher le bouton "Marquer comme lu" si déjà lue
                    const markAsReadBtn = document.getElementById('markAsReadFromModal');
                    if (notification.is_read) {
                        markAsReadBtn.style.display = 'none';
                    } else {
                        markAsReadBtn.style.display = 'inline-block';
                    }
                }
            } catch (error) {
                console.error('Erreur:', error);
                document.getElementById('notificationDetailsContent').innerHTML = `
                    <div class="alert alert-danger">
                        <i class="ri ri-error-warning-line me-2"></i>Erreur lors du chargement des détails
                    </div>
                `;
            }
        }

        // Marquer comme lu depuis la modale
        async function markAsReadFromModal() {
            if (!currentNotificationId) return;
            
            try {
                const response = await fetch(`/admin/notifications/${currentNotificationId}/read`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Fermer la modale
                    const modal = bootstrap.Modal.getInstance(document.getElementById('notificationDetailsModal'));
                    modal.hide();
                    
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Notification marquée comme lue',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    
                    // Recharger la page après 1 seconde
                    setTimeout(() => location.reload(), 1000);
                }
            } catch (error) {
                console.error('Erreur:', error);
                Swal.fire('Erreur', 'Impossible de marquer la notification', 'error');
            }
        }

        // Fonctions utilitaires
        function getAlertColor(badgeColor) {
            const colors = {
                'primary': 'primary',
                'success': 'success',
                'info': 'info',
                'warning': 'warning',
                'danger': 'danger',
                'secondary': 'secondary'
            };
            return colors[badgeColor] || 'primary';
        }

        function getPriorityBadge(priority) {
            const badges = {
                'high': '<span class="badge bg-danger">Haute</span>',
                'normal': '<span class="badge bg-info">Normale</span>',
                'low': '<span class="badge bg-secondary">Basse</span>'
            };
            return badges[priority] || '<span class="badge bg-secondary">-</span>';
        }

        function getTimeAgo(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const seconds = Math.floor((now - date) / 1000);

            if (seconds < 60) return 'il y a quelques secondes';
            if (seconds < 3600) return `il y a ${Math.floor(seconds / 60)} min`;
            if (seconds < 86400) return `il y a ${Math.floor(seconds / 3600)}h`;
            if (seconds < 604800) return `il y a ${Math.floor(seconds / 86400)}j`;
            return date.toLocaleDateString('fr-FR');
        }
    </script>
@endpush

