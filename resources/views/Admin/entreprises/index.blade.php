@extends('layouts.admin')

@section('entreprises_index')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        <i class="ri-building-line me-2"></i>
                        Gestion des Entreprises
                    </h4>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-outline-success" id="exportBtn">
                            <i class="ri-download-line me-1"></i>
                            Exporter CSV
                            @if($entreprises->total() > 0)
                                <span class="badge bg-success ms-1">{{ $entreprises->total() }}</span>
                            @endif
                        </button>
                        <a href="{{ route('admin.entreprises.create') }}" class="btn btn-primary">
                            <i class="ri-add-line me-1"></i>
                            Nouvelle Entreprise
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <!-- Filtres avancés -->
                    <form method="GET" action="{{ route('admin.entreprises.index') }}" id="filtersForm">
                        <div class="row mb-3">
                            <!-- Statistiques rapides -->
                            <div class="col-12 mb-3">
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <div class="card bg-primary text-white">
                                            <div class="card-body p-2">
                                                <h5 class="mb-0">{{ $filterData['stats']['total'] }}</h5>
                                                <small>Total entreprises</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-success text-white">
                                            <div class="card-body p-2">
                                                <h5 class="mb-0">{{ $filterData['stats']['assistees'] }}</h5>
                                                <small>Assistées</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-secondary text-white">
                                            <div class="card-body p-2">
                                                <h5 class="mb-0">{{ $filterData['stats']['non_assistees'] }}</h5>
                                                <small>Non assistées</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-info text-white">
                                            <div class="card-body p-2">
                                                <h5 class="mb-0">{{ $filterData['stats']['avec_assistances'] }}</h5>
                                                <small>Avec assistances</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Filtres -->
                            <div class="col-md-2">
                                <label class="form-label">Statut assistance</label>
                                <select class="form-select" name="assist" onchange="submitFilters()">
                                    <option value="">Toutes</option>
                                    <option value="1" {{ request('assist') == '1' ? 'selected' : '' }}>Assistées</option>
                                    <option value="0" {{ request('assist') == '0' ? 'selected' : '' }}>Non assistées</option>
                                </select>
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label">Localisation</label>
                                <select class="form-select" name="localisation" onchange="submitFilters()">
                                    <option value="">Toutes</option>
                                    @foreach($filterData['localisations'] as $localisation)
                                        <option value="{{ $localisation }}" {{ request('localisation') == $localisation ? 'selected' : '' }}>
                                            {{ $localisation }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Dirigeant</label>
                                <select class="form-select" name="dirigeant" onchange="submitFilters()">
                                    <option value="">Tous</option>
                                    @foreach($filterData['dirigeants'] as $dirigeant)
                                        <option value="{{ $dirigeant }}" {{ request('dirigeant') == $dirigeant ? 'selected' : '' }}>
                                            {{ $dirigeant }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Trier par</label>
                                <select class="form-select" name="sort_by" onchange="submitFilters()">
                                    <option value="nom" {{ request('sort_by') == 'nom' ? 'selected' : '' }}>Nom</option>
                                    <option value="assist" {{ request('sort_by') == 'assist' ? 'selected' : '' }}>Statut assistance</option>
                                    <option value="assistances_count" {{ request('sort_by') == 'assistances_count' ? 'selected' : '' }}>Nb assistances</option>
                                    <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date création</option>
                                </select>
                            </div>

                            <div class="col-md-1">
                                <label class="form-label">Ordre</label>
                                <select class="form-select" name="sort_direction" onchange="submitFilters()">
                                    <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>↑</option>
                                    <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>↓</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Recherche globale</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" 
                                           placeholder="Rechercher..." id="globalSearch">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="ri-search-line"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Filtres avancés (collapsible) -->
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-sm btn-outline-secondary mb-3" data-bs-toggle="collapse" data-bs-target="#advancedFilters">
                                    <i class="ri-filter-line me-1"></i>
                                    Filtres avancés
                                </button>
                            </div>
                        </div>

                        <div class="collapse {{ request()->hasAny(['activite', 'assistances_min', 'assistances_max']) ? 'show' : '' }}" id="advancedFilters">
                            <div class="row mb-3 p-3 border rounded bg-light">
                                <div class="col-md-4">
                                    <label class="form-label">Activité</label>
                                    <input type="text" class="form-control" name="activite" value="{{ request('activite') }}" 
                                           placeholder="Rechercher par activité...">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Min assistances</label>
                                    <input type="number" class="form-control" name="assistances_min" value="{{ request('assistances_min') }}" 
                                           min="0" placeholder="0">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Max assistances</label>
                                    <input type="number" class="form-control" name="assistances_max" value="{{ request('assistances_max') }}" 
                                           min="0" placeholder="∞">
                                </div>
                                <div class="col-md-4 d-flex align-items-end gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-filter-line me-1"></i>
                                        Appliquer
                                    </button>
                                    <a href="{{ route('admin.entreprises.index') }}" class="btn btn-outline-secondary">
                                        <i class="ri-refresh-line me-1"></i>
                                        Réinitialiser
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Tableau -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="entreprisesTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Entreprise</th>
                                    <th>Activité</th>
                                    <th>Localisation</th>
                                    <th>Dirigeant</th>
                                    <th>Assistance</th>
                                    <th>Assistances</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($entreprises as $entreprise)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-2">
                                                    @if($entreprise->image)
                                                        <img src="{{ asset('storage/' . $entreprise->image) }}" alt="{{ $entreprise->nom }}" class="avatar-img rounded">
                                                    @else
                                                        <div class="avatar-initial rounded bg-label-primary">
                                                            <i class="ri-building-line"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <strong>{{ $entreprise->nom }}</strong>
                                                    @if($entreprise->rccm)
                                                        <small class="text-muted d-block">RCCM: {{ $entreprise->rccm }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($entreprise->activite)
                                                <span class="text-wrap">{{ \Illuminate\Support\Str::limit($entreprise->activite, 50) }}</span>
                                            @else
                                                <span class="text-muted">Non renseigné</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($entreprise->situation_geographique)
                                                <i class="ri-map-pin-line me-1 text-muted"></i>
                                                {{ $entreprise->situation_geographique }}
                                            @else
                                                <span class="text-muted">Non renseigné</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($entreprise->nom_dirigeant)
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-xs me-2">
                                                        <div class="avatar-initial rounded-circle bg-label-info">
                                                            <i class="ri-user-line"></i>
                                                        </div>
                                                    </div>
                                                    {{ $entreprise->nom_dirigeant }}
                                                </div>
                                            @else
                                                <span class="text-muted">Non renseigné</span>
                                            @endif
                                        </td>
                                        <td>
                                            @php $badge = $entreprise->getAssistBadge(); @endphp
                                            <span class="badge {{ $badge['class'] }}" onclick="toggleAssist({{ $entreprise->id }})" style="cursor: pointer;">
                                                <i class="{{ $badge['icon'] }} me-1"></i>
                                                {{ $badge['text'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="badge bg-primary me-1">{{ $entreprise->assistances_comptables_count ?? 0 }}</span>
                                                @if($entreprise->assistances_comptables_count > 0)
                                                    <small class="text-muted">assistances</small>
                                                    @if($entreprise->assistances_actives_count > 0)
                                                        <span class="badge bg-success ms-1">{{ $entreprise->assistances_actives_count }} actives</span>
                                                    @endif
                                                @else
                                                    <small class="text-muted">aucune</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="ri-more-line"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.entreprises.show', $entreprise) }}">
                                                            <i class="ri-eye-line me-2"></i>Voir détails
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.entreprises.edit', $entreprise) }}">
                                                            <i class="ri-edit-line me-2"></i>Modifier
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <a class="dropdown-item text-success" href="#" data-create-assistance data-entreprise-id="{{ $entreprise->id }}" data-entreprise-nom="{{ $entreprise->nom }}">
                                                            <i class="ri-add-line me-2"></i>Créer assistance
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#" onclick="deleteEntreprise({{ $entreprise->id }})">
                                                            <i class="ri-delete-bin-line me-2"></i>Supprimer
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="empty-state">
                                                <i class="ri-building-line ri-2x text-muted mb-2"></i>
                                                <p class="text-muted">Aucune entreprise trouvée</p>
                                                <a href="{{ route('admin.entreprises.create') }}" class="btn btn-primary btn-sm">
                                                    Créer la première entreprise
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($entreprises->hasPages())
                        <div class="d-flex justify-content-center mt-3">
                            {{ $entreprises->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de création d'assistance -->
<div class="modal fade" id="createAssistanceModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="ri-building-2-line me-2"></i>
                    Créer une assistance comptable
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createAssistanceForm">
                @csrf
                <input type="hidden" id="assistance_entreprise_id" name="entreprise_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-muted">Entreprise</label>
                        <div id="assistance_entreprise_name" class="fw-bold"></div>
                    </div>

                    <div class="row">
                        <!-- Administrateur -->
                        <div class="col-12 mb-3">
                            <label class="form-label">Administrateur responsable <span class="text-danger">*</span></label>
                            <select class="form-select" name="user_id" required>
                                <option value="">Sélectionner un administrateur</option>
                                @foreach(\App\Models\User::whereIn('type', ['admin', 'super_admin'])->orderBy('nom')->get() as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->prenom }} {{ $admin->nom }} ({{ ucfirst($admin->type) }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-12 mb-3">
                            <label class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Description de l'assistance comptable..." required></textarea>
                        </div>

                        <!-- Type de contrat -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Type de contrat <span class="text-danger">*</span></label>
                            <select class="form-select" name="type_contrat" required>
                                <option value="mensuel_renouvelable">Mensuel renouvelable</option>
                                <option value="factuel_objectif">Factuel objectif</option>
                                <option value="annuel">Annuel</option>
                                <option value="ponctuel">Ponctuel</option>
                            </select>
                        </div>

                        <!-- Fréquence de facturation -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fréquence de facturation <span class="text-danger">*</span></label>
                            <select class="form-select" name="frequence_facturation" required>
                                <option value="mensuelle">Mensuelle</option>
                                <option value="trimestrielle">Trimestrielle</option>
                                <option value="fin_mission">Fin de mission</option>
                                <option value="sur_mesure">Sur mesure</option>
                            </select>
                        </div>

                        <!-- Prix indicatif -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Prix indicatif (FCFA)</label>
                            <input type="number" class="form-control" name="prix_indicatif" placeholder="0">
                        </div>

                        <!-- Durée estimée -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Durée estimée (jours)</label>
                            <input type="number" class="form-control" name="duree_estimee" placeholder="30">
                        </div>

                        <!-- Date début -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date de début</label>
                            <input type="date" class="form-control" name="date_debut">
                        </div>

                        <!-- Date fin prévue -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date de fin prévue</label>
                            <input type="date" class="form-control" name="date_fin_prevue">
                        </div>

                        <!-- Objectifs -->
                        <div class="col-12 mb-3">
                            <label class="form-label">Objectifs</label>
                            <textarea class="form-control" name="objectifs" rows="2" placeholder="Objectifs de l'assistance..."></textarea>
                        </div>

                        <!-- Renouvellement automatique -->
                        <div class="col-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="renouvellement_auto" value="1" id="renouvellementAuto">
                                <label class="form-check-label" for="renouvellementAuto">
                                    Renouvellement automatique
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ri-save-line me-1"></i>
                        Créer l'assistance
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Déclaration globale des fonctions d'export
    window.exportResults = function() {
        console.log('Fonction exportResults appelée');
        $('#exportBtn').prop('disabled', true);

        const urlObj = new URL(window.location.href);
        urlObj.searchParams.set('export', 'csv');
        const exportUrl = urlObj.toString();

        console.log('URL d\'export:', exportUrl);

        showLoadingModal('Préparation du fichier CSV');

        fetch(exportUrl, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/csv'
            }
        })
        .then(response => {
            console.log('Réponse reçue:', response.status);
            if (!response.ok) throw new Error(`Erreur HTTP ${response.status}: ${response.statusText}`);
            return response.blob();
        })
        .then(blob => {
            console.log('Blob reçu, taille:', blob.size);
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = `entreprises_${new Date().toISOString().slice(0, 19).replace(/[:-]/g, '')}.csv`;
            link.style.display = 'none';
            document.body.appendChild(link);
            link.click();
            link.remove();
            window.URL.revokeObjectURL(url);
            hideLoadingModal();
            showExportSuccess();
        })
        .catch(error => {
            console.error('Erreur lors de l\'export:', error);
            hideLoadingModal();
            showExportError(error.message);
        })
        .finally(() => {
            $('#exportBtn').prop('disabled', false);
        });
    };

    window.showLoadingModal = function(message = 'Préparation du fichier CSV') {
        // Supprimer l'ancienne modale si elle existe
        $('#loadingModal').remove();
        
        const modalHtml = `
            <div class="modal fade" id="loadingModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-4">
                            <div class="spinner-border text-primary mb-3" role="status" style="width: 3rem; height: 3rem;">
                                <span class="visually-hidden">Chargement...</span>
                            </div>
                            <h6 class="mb-2">Export en cours...</h6>
                            <p class="text-muted mb-0" id="loadingMessage">${message}</p>
                            <div class="progress mt-3" style="height: 4px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('body').append(modalHtml);
        $('#loadingModal').modal('show');
    };

    window.hideLoadingModal = function() {
        $('#loadingModal').modal('hide');
        setTimeout(() => {
            $('#loadingModal').remove();
        }, 500);
    };

    window.showExportSuccess = function() {
        Swal.fire({
            icon: 'success',
            title: 'Export réussi !',
            text: 'Le fichier CSV a été téléchargé avec succès.',
            timer: 2000,
            showConfirmButton: false,
            position: 'top-end',
            toast: true
        });
    };

    window.showExportError = function(errorMessage = 'Une erreur est survenue lors de l\'export') {
        Swal.fire({
            icon: 'error',
            title: 'Erreur d\'export',
            text: errorMessage,
            confirmButtonText: 'OK',
            confirmButtonColor: '#d33'
        });
    };

    // Autres fonctions globales
    window.submitFilters = function() {
        $('#filtersForm').submit();
    };

     // Fonction globale pour créer une assistance
     window.showCreateAssistanceModal = function(entrepriseId, entrepriseName) {
         console.log('Ouverture modale assistance pour:', entrepriseId, entrepriseName);
         
         // Vérifier que la modale existe
         if ($('#createAssistanceModal').length === 0) {
             console.error('Modal createAssistanceModal introuvable !');
             return;
         }
         
         // Réinitialiser le formulaire
         const form = $('#createAssistanceForm')[0];
         if (form) {
             form.reset();
         }
         
         // Définir l'entreprise
         $('#assistance_entreprise_id').val(entrepriseId);
         $('#assistance_entreprise_name').text(entrepriseName);
         
         // Réactiver le bouton submit s'il était désactivé
         const submitBtn = $('#createAssistanceForm').find('button[type="submit"]');
         submitBtn.prop('disabled', false).html('<i class="ri-save-line me-1"></i>Créer l\'assistance');
         
         // Afficher la modale
         $('#createAssistanceModal').modal('show');
     };

    window.toggleAssist = function(entrepriseId) {
        fetch(`/admin/entreprises/${entrepriseId}/toggle-assist`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Statut mis à jour !',
                    text: data.message,
                    timer: 1500,
                    showConfirmButton: false,
                    position: 'top-end',
                    toast: true
                }).then(() => {
                    location.reload();
                });
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
    };

     window.deleteEntreprise = function(id) {
         console.log('Tentative de suppression de l\'entreprise:', id);
         
         Swal.fire({
             title: 'Êtes-vous sûr ?',
             html: `Cette action supprimera définitivement l'entreprise.<br><strong>Cette action ne peut pas être annulée !</strong>`,
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             confirmButtonText: '<i class="ri-delete-bin-line me-1"></i>Oui, supprimer !',
             cancelButtonText: '<i class="ri-close-line me-1"></i>Annuler',
             reverseButtons: true,
             focusCancel: true
         }).then((result) => {
             if (result.isConfirmed) {
                 // Afficher une modale de chargement
                 Swal.fire({
                     title: 'Suppression en cours...',
                     html: 'Veuillez patienter pendant la suppression de l\'entreprise.',
                     icon: 'info',
                     allowOutsideClick: false,
                     showConfirmButton: false,
                     didOpen: () => {
                         Swal.showLoading();
                     }
                 });
                 
                 // Utiliser fetch pour une meilleure gestion des erreurs
                 fetch(`/admin/entreprises/${id}`, {
                     method: 'DELETE',
                     headers: {
                         'X-CSRF-TOKEN': '{{ csrf_token() }}',
                         'Content-Type': 'application/json',
                         'Accept': 'application/json'
                     }
                 })
                 .then(response => {
                     if (!response.ok) {
                         throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                     }
                     // Si c'est une redirection, suivre
                     if (response.redirected) {
                         window.location.href = response.url;
                         return;
                     }
                     return response.json();
                 })
                 .then(data => {
                     if (data && data.success) {
                         Swal.fire({
                             icon: 'success',
                             title: 'Entreprise supprimée !',
                             text: data.message || 'L\'entreprise a été supprimée avec succès.',
                             timer: 2000,
                             showConfirmButton: false,
                             position: 'top-end',
                             toast: true
                         }).then(() => {
                             location.reload();
                         });
                     } else {
                         // Redirection normale (réponse HTML)
                         location.reload();
                     }
                 })
                 .catch(error => {
                     console.error('Erreur lors de la suppression:', error);
                     Swal.fire({
                         icon: 'error',
                         title: 'Erreur de suppression',
                         text: 'Impossible de supprimer l\'entreprise. Vérifiez s\'il n\'y a pas d\'assistances actives.',
                         confirmButtonText: 'OK'
                     });
                 });
             }
         });
     };

    // Fonction pour mettre à jour l'indicateur de filtres
    function updateFilterIndicator() {
        const params = new URLSearchParams(window.location.search);
        let activeFilters = 0;
        
        // Compter les filtres actifs
        ['assist', 'localisation', 'dirigeant', 'activite', 'search', 'assistances_min', 'assistances_max'].forEach(function(param) {
            if (params.get(param)) {
                activeFilters++;
            }
        });

        // Afficher l'indicateur
        if (activeFilters > 0) {
            if ($('#filterIndicator').length === 0) {
                $('<span id="filterIndicator" class="badge bg-warning ms-2">' + activeFilters + ' filtre(s) actif(s)</span>')
                    .insertAfter('.card-title');
            } else {
                $('#filterIndicator').text(activeFilters + ' filtre(s) actif(s)');
            }
        }
    }

    // Initialisation jQuery
    $(document).ready(function() {
        console.log('DOM Ready - Initialisation...');
        
         // Gestion du bouton d'export
         $('#exportBtn').on('click', function(e) {
             e.preventDefault();
             console.log('Bouton export cliqué');
             exportResults();
         });

         // Gestion des boutons de création d'assistance
         $(document).on('click', '[data-create-assistance]', function(e) {
             e.preventDefault();
             const entrepriseId = $(this).data('entreprise-id');
             const entrepriseNom = $(this).data('entreprise-nom');
             console.log('Clic sur création assistance pour:', entrepriseId, entrepriseNom);
             window.showCreateAssistanceModal(entrepriseId, entrepriseNom);
         });

        // Recherche en temps réel avec debounce
        let searchTimeout;
        $('#globalSearch').on('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function() {
                $('#filtersForm').submit();
            }, 500);
        });

        // Filtres par clic sur les statistiques
        $('.card.bg-success').on('click', function() {
            window.location.href = '{{ route("admin.entreprises.index") }}?assist=1';
        });

        $('.card.bg-secondary').on('click', function() {
            window.location.href = '{{ route("admin.entreprises.index") }}?assist=0';
        });

         // Soumission du formulaire d'assistance
         $('#createAssistanceForm').on('submit', function(e) {
             e.preventDefault();
             
             const entrepriseId = $('#assistance_entreprise_id').val();
             if (!entrepriseId) {
                 Swal.fire({
                     icon: 'error',
                     title: 'Erreur',
                     text: 'Entreprise non sélectionnée.'
                 });
                 return;
             }
             
             // Désactiver le bouton de soumission
             const submitBtn = $(this).find('button[type="submit"]');
             const originalText = submitBtn.html();
             submitBtn.prop('disabled', true).html('<i class="spinner-border spinner-border-sm me-1"></i>Création...');
             
             const formData = new FormData(this);
             
             fetch(`/admin/entreprises/${entrepriseId}/assistance`, {
                 method: 'POST',
                 headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                 },
                 body: formData
             })
             .then(response => {
                 if (!response.ok) {
                     throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                 }
                 return response.json();
             })
             .then(data => {
                 if (data.success) {
                     $('#createAssistanceModal').modal('hide');
                     Swal.fire({
                         icon: 'success',
                         title: 'Assistance créée !',
                         text: data.message,
                         timer: 2000,
                         showConfirmButton: false,
                         position: 'top-end',
                         toast: true
                     }).then(() => {
                         location.reload();
                     });
                 } else {
                     Swal.fire({
                         icon: 'error',
                         title: 'Erreur de validation',
                         text: data.message || 'Une erreur est survenue.'
                     });
                 }
             })
             .catch(error => {
                 console.error('Erreur lors de la création:', error);
                 Swal.fire({
                     icon: 'error',
                     title: 'Erreur de connexion',
                     text: 'Impossible de créer l\'assistance. Vérifiez votre connexion.'
                 });
             })
             .finally(() => {
                 // Réactiver le bouton
                 submitBtn.prop('disabled', false).html(originalText);
             });
         });

        // Indicateur de filtres actifs
        updateFilterIndicator();
        
        // Debug - vérifier les éléments
        console.log('Boutons create assistance trouvés:', $('[data-create-assistance]').length);
        console.log('Modal createAssistanceModal existe:', $('#createAssistanceModal').length > 0);
        console.log('Formulaire createAssistanceForm existe:', $('#createAssistanceForm').length > 0);
        
        console.log('Initialisation terminée');
    });

</script>
@endpush

@push('styles')
<style>
    .empty-state {
        padding: 2rem;
    }

    .avatar-sm {
        width: 2.5rem;
        height: 2.5rem;
    }

    .avatar-xs {
        width: 1.5rem;
        height: 1.5rem;
    }

    .table th {
        font-weight: 600;
        border-bottom: 2px solid #e7eef7;
    }

    .badge {
        font-size: 0.75rem;
    }

    .text-wrap {
        max-width: 200px;
        word-wrap: break-word;
    }

    .badge:hover {
        opacity: 0.8;
    }

    /* Styles pour les filtres */
    .form-label {
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }

    .card.bg-success:hover,
    .card.bg-secondary:hover {
        cursor: pointer;
        transform: translateY(-2px);
        transition: transform 0.2s ease;
    }

    #advancedFilters {
        transition: all 0.3s ease;
    }

    .input-group .btn {
        border-color: #d0d5dd;
    }

    .collapse.show {
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            max-height: 0;
        }
        to {
            opacity: 1;
            max-height: 200px;
        }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .row.text-center .col-md-3 {
            margin-bottom: 0.5rem;
        }
        
        .col-md-2, .col-md-1 {
            margin-bottom: 1rem;
        }
    }

    /* Styles pour la modale de chargement */
    #loadingModal .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    }

    #loadingModal .spinner-border {
        width: 3rem;
        height: 3rem;
        animation: spin 1s linear infinite;
    }

    #loadingModal .progress {
        height: 4px;
        border-radius: 2px;
        background-color: rgba(0, 123, 255, 0.1);
        overflow: hidden;
    }

    #loadingModal .progress-bar {
        background: linear-gradient(90deg, #007bff, #0056b3);
        animation: progress-animation 2s ease-in-out infinite;
    }

    @keyframes progress-animation {
        0% { width: 0%; }
        50% { width: 80%; }
        100% { width: 100%; }
    }

    #exportBtn .badge {
        font-size: 0.75rem;
        padding: 0.25em 0.5em;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    #exportBtn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    #exportBtn:disabled .badge {
        animation: none;
    }

    /* Animation d'apparition de la modale */
    #loadingModal.fade.show {
        animation: modalFadeIn 0.3s ease-out;
    }

    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
@endpush

@endsection
