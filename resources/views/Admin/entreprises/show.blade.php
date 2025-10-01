@extends('layouts.admin')

@section('entreprises_show')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Actions Header -->
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.entreprises.index') }}">Entreprises</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $entreprise->nom }}</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1">
                        <i class="ri-building-line me-2"></i>
                        {{ $entreprise->nom }}
                    </h4>
                    <p class="mb-0 text-muted">Détails de l'entreprise et gestion des assistances</p>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success" data-create-assistance data-entreprise-id="{{ $entreprise->id }}" data-entreprise-nom="{{ $entreprise->nom }}">
                        <i class="ri-building-2-line me-1"></i>
                        Créer assistance
                    </button>
                    <a href="{{ route('admin.entreprises.edit', $entreprise) }}" class="btn btn-primary">
                        <i class="ri-edit-line me-1"></i>
                        Modifier
                    </a>
                    <button type="button" class="btn btn-outline-danger" onclick="deleteEntreprise({{ $entreprise->id }})">
                        <i class="ri-delete-bin-line me-1"></i>
                        Supprimer
                    </button>
                </div>
            </div>
        </div>

        <!-- Informations de l'entreprise -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="ri-information-line me-2"></i>
                        Informations de l'entreprise
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center mb-3">
                            @if($entreprise->image)
                                <img src="{{ asset('storage/' . $entreprise->image) }}" alt="{{ $entreprise->nom }}" 
                                     class="img-fluid rounded border" style="max-width: 120px;">
                            @else
                                <div class="avatar avatar-xl mx-auto">
                                    <div class="avatar-initial rounded bg-label-primary">
                                        <i class="ri-building-line ri-2x"></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Nom de l'entreprise</label>
                                    <h6 class="mb-0">{{ $entreprise->nom }}</h6>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Statut d'assistance</label>
                                    <div>
                                        @php $badge = $entreprise->getAssistBadge(); @endphp
                                        <span class="badge {{ $badge['class'] }}" onclick="toggleAssist({{ $entreprise->id }})" style="cursor: pointer;">
                                            <i class="{{ $badge['icon'] }} me-1"></i>
                                            {{ $badge['text'] }}
                                        </span>
                                    </div>
                                </div>

                                @if($entreprise->activite)
                                <div class="col-12 mb-3">
                                    <label class="form-label text-muted">Activité</label>
                                    <p class="mb-0">{{ $entreprise->activite }}</p>
                                </div>
                                @endif

                                @if($entreprise->situation_geographique)
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Localisation</label>
                                    <div class="d-flex align-items-center">
                                        <i class="ri-map-pin-line me-2 text-muted"></i>
                                        <span>{{ $entreprise->situation_geographique }}</span>
                                    </div>
                                </div>
                                @endif

                                @if($entreprise->nom_dirigeant)
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Dirigeant</label>
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-line me-2 text-muted"></i>
                                        <span>{{ $entreprise->nom_dirigeant }}</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations légales -->
            @if($entreprise->rccm || $entreprise->ncc || $entreprise->tdu)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="ri-file-text-line me-2"></i>
                        Informations légales
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($entreprise->rccm)
                        <div class="col-md-4 mb-2">
                            <small class="text-muted">RCCM</small>
                            <div class="fw-medium">{{ $entreprise->rccm }}</div>
                        </div>
                        @endif

                        @if($entreprise->ncc)
                        <div class="col-md-4 mb-2">
                            <small class="text-muted">NCC</small>
                            <div class="fw-medium">{{ $entreprise->ncc }}</div>
                        </div>
                        @endif

                        @if($entreprise->tdu)
                        <div class="col-md-4 mb-2">
                            <small class="text-muted">TDU</small>
                            <div class="fw-medium">{{ $entreprise->tdu }}</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Assistances comptables -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="ri-building-2-line me-2"></i>
                        Assistances comptables
                    </h5>
                    <button type="button" class="btn btn-sm btn-success" data-create-assistance data-entreprise-id="{{ $entreprise->id }}" data-entreprise-nom="{{ $entreprise->nom }}">
                        <i class="ri-add-line me-1"></i>
                        Nouvelle assistance
                    </button>
                </div>
                <div class="card-body">
                    @forelse($entreprise->assistancesComptables as $assistance)
                        <div class="d-flex justify-content-between align-items-center p-3 border rounded mb-2">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <div class="avatar-initial rounded-circle bg-label-info">
                                        <i class="ri-user-line"></i>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-0">{{ $assistance->user->prenom }} {{ $assistance->user->nom }}</h6>
                                    <small class="text-muted">{{ Illuminate\Support\Str::limit($assistance->description, 50) }}</small>
                                </div>
                            </div>
                            <div class="text-end">
                                @php $badge = $assistance->getStatutBadge(); @endphp
                                <span class="badge {{ $badge['class'] }} mb-1">{{ $badge['text'] }}</span>
                                <div>
                                    <a href="{{ route('admin.assistance_comptable.show', $assistance) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="{{ route('admin.assistance_comptable.edit', $assistance) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <i class="ri-building-2-line ri-2x text-muted mb-2"></i>
                            <p class="text-muted">Aucune assistance comptable</p>
                            <button type="button" class="btn btn-sm btn-success" data-create-assistance data-entreprise-id="{{ $entreprise->id }}" data-entreprise-nom="{{ $entreprise->nom }}">
                                Créer la première assistance
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <!-- Statistiques -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="ri-bar-chart-line me-2"></i>
                        Statistiques
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Total assistances</span>
                        <span class="badge bg-primary">{{ $entreprise->assistancesComptables->count() }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Assistances actives</span>
                        <span class="badge bg-success">{{ $entreprise->assistancesActives->count() }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Assistances terminées</span>
                        <span class="badge bg-secondary">{{ $entreprise->assistancesTerminees->count() }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Statut</span>
                        @php $badge = $entreprise->getAssistBadge(); @endphp
                        <span class="badge {{ $badge['class'] }}">{{ $badge['text'] }}</span>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="ri-settings-3-line me-2"></i>
                        Actions rapides
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success btn-sm" data-create-assistance data-entreprise-id="{{ $entreprise->id }}" data-entreprise-nom="{{ $entreprise->nom }}">
                            <i class="ri-building-2-line me-1"></i>
                            Créer assistance
                        </button>
                        <button type="button" class="btn btn-outline-info btn-sm" onclick="toggleAssist({{ $entreprise->id }})">
                            <i class="ri-refresh-line me-1"></i>
                            Basculer statut assistance
                        </button>
                        <a href="{{ route('admin.entreprises.edit', $entreprise) }}" class="btn btn-outline-primary btn-sm">
                            <i class="ri-edit-line me-1"></i>
                            Modifier informations
                        </a>
                    </div>
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
                <input type="hidden" id="assistance_entreprise_id" name="entreprise_id" value="{{ $entreprise->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-muted">Entreprise</label>
                        <div class="fw-bold">{{ $entreprise->nom }}</div>
                    </div>

                    <div class="row">
                        <!-- Administrateur -->
                        <div class="col-12 mb-3">
                            <label class="form-label">Administrateur responsable <span class="text-danger">*</span></label>
                            <select class="form-select" name="user_id" required>
                                <option value="">Sélectionner un administrateur</option>
                                @foreach($admins as $admin)
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
$(document).ready(function() {
    console.log('=== ENTREPRISE SHOW - Initialisation ===');
    console.log('jQuery version:', $.fn.jquery);
    console.log('Bootstrap disponible:', typeof bootstrap !== 'undefined');
    console.log('SweetAlert disponible:', typeof Swal !== 'undefined');
    console.log('Modale #createAssistanceModal trouvée:', $('#createAssistanceModal').length);
    console.log('Boutons [data-create-assistance] trouvés:', $('[data-create-assistance]').length);
    console.log('Fonction showCreateAssistanceModal définie:', typeof window.showCreateAssistanceModal);
    
    // Gestion des boutons de création d'assistance
    $(document).on('click', '[data-create-assistance]', function(e) {
        e.preventDefault();
        const entrepriseId = $(this).data('entreprise-id');
        const entrepriseNom = $(this).data('entreprise-nom');
        console.log('=== CLIC BOUTON ASSISTANCE ===');
        console.log('ID entreprise:', entrepriseId);
        console.log('Nom entreprise:', entrepriseNom);
        console.log('Appel de showCreateAssistanceModal...');
        
        if (typeof window.showCreateAssistanceModal === 'function') {
            window.showCreateAssistanceModal(entrepriseId, entrepriseNom);
        } else {
            console.error('La fonction showCreateAssistanceModal n\'existe pas !');
        }
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
        
        // Validation côté client
        const userIdSelect = $(this).find('select[name="user_id"]');
        const descriptionField = $(this).find('textarea[name="description"]');
        
        if (!userIdSelect.val()) {
            userIdSelect.focus();
            Swal.fire({
                icon: 'warning',
                title: 'Champ requis',
                text: 'Veuillez sélectionner un administrateur responsable.'
            });
            return;
        }
        
        if (!descriptionField.val().trim()) {
            descriptionField.focus();
            Swal.fire({
                icon: 'warning',
                title: 'Champ requis',
                text: 'Veuillez saisir une description pour l\'assistance.'
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
});

// Afficher le modal de création d'assistance (fonction globale)
window.showCreateAssistanceModal = function(entrepriseId, entrepriseName) {
    console.log('Fonction showCreateAssistanceModal appelée avec:', entrepriseId, entrepriseName);
    
    // Réinitialiser le formulaire
    $('#createAssistanceForm')[0].reset();
    
    // Définir l'entreprise
    $('#assistance_entreprise_id').val(entrepriseId);
    
    // Réactiver le bouton submit s'il était désactivé
    const submitBtn = $('#createAssistanceForm').find('button[type="submit"]');
    submitBtn.prop('disabled', false).html('<i class="ri-save-line me-1"></i>Créer l\'assistance');
    
    // Afficher la modale
    $('#createAssistanceModal').modal('show');
};

// Basculer le statut d'assistance
function toggleAssist(entrepriseId) {
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
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
}

// Supprimer une entreprise
function deleteEntreprise(id) {
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
                        // Rediriger vers la liste des entreprises
                        window.location.href = '{{ route("admin.entreprises.index") }}';
                    });
                } else {
                    // Redirection normale (réponse HTML)
                    window.location.href = '{{ route("admin.entreprises.index") }}';
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
}
</script>
@endpush

@push('styles')
<style>
.breadcrumb-style1 {
    background: none;
    padding: 0;
    margin-bottom: 0.5rem;
}

.breadcrumb-style1 .breadcrumb-item + .breadcrumb-item::before {
    content: '/';
    color: #8592a3;
}

.avatar-xl {
    width: 4rem;
    height: 4rem;
}

.badge:hover {
    opacity: 0.8;
}
</style>
@endpush
@endsection
