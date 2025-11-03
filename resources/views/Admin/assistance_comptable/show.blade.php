@extends('layouts.admin')

@section('assistance_comptable_show')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.assistance_comptable.index') }}">Assistances comptables</a>
                            </li>
                            <li class="breadcrumb-item active">Détails #{{ $assistance->id }}</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1">
                        <i class="ri-file-text-line me-2"></i>
                        Détails de l'assistance comptable
                    </h4>
                    <p class="mb-0 text-muted">{{ $assistance->entreprise->nom }}</p>
                </div>
                <div>
                    <a href="{{ route('admin.assistance_comptable.index') }}" class="btn btn-outline-secondary">
                        <i class="ri-arrow-left-line me-1"></i>
                        Retour à la liste
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- Informations principales -->
                <div class="col-lg-8 mb-4">
                    <!-- Carte principale -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="ri-information-line me-2"></i>
                                Informations générales
                            </h5>
                            @php $badge = $assistance->getStatutBadge(); @endphp
                            <span class="badge {{ $badge['class'] }}" id="statutBadge">{{ $badge['text'] }}</span>
                        </div>
                        <div class="card-body">
                            <!-- Entreprise -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted">Entreprise</label>
                                    <div class="d-flex align-items-center">
                                        @if($assistance->entreprise->image)
                                            <img src="{{ asset('storage/' . $assistance->entreprise->image) }}" 
                                                 alt="{{ $assistance->entreprise->nom }}" 
                                                 class="rounded me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <a href="{{ route('admin.entreprises.show', $assistance->entreprise) }}" 
                                               class="text-decoration-none fw-bold">
                                                {{ $assistance->entreprise->nom }}
                                            </a>
                                            @if($assistance->entreprise->assist)
                                                <span class="badge bg-success ms-1">Assistée</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Administrateur -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted">Administrateur assigné</label>
                                    <div>
                                        <i class="ri-user-line me-1"></i>
                                        {{ $assistance->user->nom }} {{ $assistance->user->prenoms }}
                                        <span class="badge bg-info ms-1">
                                            {{ $assistance->user->type === 'super_admin' ? 'Super Admin' : 'Admin' }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Description</label>
                                <p class="mb-0">{{ $assistance->description }}</p>
                            </div>

                            <!-- Objectifs -->
                            @if($assistance->objectifs)
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Objectifs</label>
                                <p class="mb-0">{{ $assistance->objectifs }}</p>
                            </div>
                            @endif

                            <!-- Caractéristiques -->
                            @if($assistance->caracteristiques && count($assistance->caracteristiques) > 0)
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Caractéristiques</label>
                                <ul class="list-unstyled">
                                    @foreach($assistance->caracteristiques as $caracteristique)
                                        <li class="mb-1">
                                            <i class="ri-check-line text-success me-2"></i>
                                            {{ $caracteristique }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <hr>

                            <!-- Type de contrat et facturation -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted">Type de contrat</label>
                                    <div>
                                        @php
                                            $typeContrats = [
                                                'mensuel_renouvelable' => 'Mensuel renouvelable',
                                                'factuel_objectif' => 'Factuel sur objectif',
                                                'annuel' => 'Annuel',
                                                'ponctuel' => 'Ponctuel'
                                            ];
                                        @endphp
                                        <span class="badge bg-primary">
                                            {{ $typeContrats[$assistance->type_contrat] ?? $assistance->type_contrat }}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted">Fréquence de facturation</label>
                                    <div>
                                        @php
                                            $frequences = [
                                                'mensuelle' => 'Mensuelle',
                                                'trimestrielle' => 'Trimestrielle',
                                                'fin_mission' => 'Fin de mission',
                                                'sur_mesure' => 'Sur mesure'
                                            ];
                                        @endphp
                                        <span class="badge bg-info">
                                            {{ $frequences[$assistance->frequence_facturation] ?? $assistance->frequence_facturation }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Prix et durée -->
                            <div class="row mb-3">
                                @if($assistance->prix_indicatif)
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted">Prix indicatif</label>
                                    <div class="fs-5 fw-bold text-success">
                                        {{ number_format($assistance->prix_indicatif, 0, ',', ' ') }} FCFA
                                    </div>
                                </div>
                                @endif

                                @if($assistance->duree_estimee)
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted">Durée estimée</label>
                                    <div>
                                        <i class="ri-time-line me-1"></i>
                                        {{ $assistance->duree_estimee }} jour(s)
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Renouvellement automatique -->
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Renouvellement automatique</label>
                                <div>
                                    @if($assistance->renouvellement_auto)
                                        <span class="badge bg-success">
                                            <i class="ri-check-line me-1"></i>Activé
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="ri-close-line me-1"></i>Désactivé
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline des dates -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="ri-calendar-line me-2"></i>
                                Planning et échéances
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                @if($assistance->date_debut)
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-icon bg-primary">
                                            <i class="ri-play-line"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-1">Date de début</h6>
                                            <p class="mb-0 text-muted">{{ $assistance->date_debut->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($assistance->date_fin_prevue)
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-icon bg-info">
                                            <i class="ri-flag-line"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-1">Date de fin prévue</h6>
                                            <p class="mb-0 text-muted">{{ $assistance->date_fin_prevue->format('d/m/Y') }}</p>
                                            @if($assistance->getDureeRestante() !== null)
                                                @php $dureeRestante = $assistance->getDureeRestante(); @endphp
                                                @if($dureeRestante > 0)
                                                    <small class="text-success">Dans {{ $dureeRestante }} jour(s)</small>
                                                @elseif($dureeRestante == 0)
                                                    <small class="text-warning">Aujourd'hui</small>
                                                @else
                                                    <small class="text-danger">Dépassée de {{ abs($dureeRestante) }} jour(s)</small>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($assistance->prochaine_echeance)
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-icon bg-warning">
                                            <i class="ri-alarm-line"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-1">Prochaine échéance</h6>
                                            <p class="mb-0 text-muted">{{ $assistance->prochaine_echeance->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($assistance->date_fin_reelle)
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-icon bg-success">
                                            <i class="ri-check-line"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-1">Date de fin réelle</h6>
                                            <p class="mb-0 text-muted">{{ $assistance->date_fin_reelle->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if(!$assistance->date_debut && !$assistance->date_fin_prevue && !$assistance->prochaine_echeance && !$assistance->date_fin_reelle)
                                <div class="text-center text-muted">
                                    <i class="ri-calendar-2-line fs-1 mb-2"></i>
                                    <p class="mb-0">Aucune date définie</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Actions rapides -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="ri-settings-line me-2"></i>
                                Actions
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.assistance_comptable.edit', $assistance) }}" 
                                   class="btn btn-primary">
                                    <i class="ri-edit-line me-1"></i>
                                    Modifier
                                </a>
                                
                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#changeStatutModal">
                                    <i class="ri-refresh-line me-1"></i>
                                    Changer le statut
                                </button>

                                <a href="{{ route('admin.entreprises.show', $assistance->entreprise) }}" 
                                   class="btn btn-outline-secondary">
                                    <i class="ri-building-line me-1"></i>
                                    Voir l'entreprise
                                </a>

                                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()">
                                    <i class="ri-delete-bin-line me-1"></i>
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Informations système -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="ri-information-line me-2"></i>
                                Informations système
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <small class="text-muted">ID de l'assistance</small>
                                <div class="fw-bold">#{{ $assistance->id }}</div>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">Date de création</small>
                                <div>{{ $assistance->created_at->format('d/m/Y à H:i') }}</div>
                            </div>

                            <div class="mb-0">
                                <small class="text-muted">Dernière modification</small>
                                <div>{{ $assistance->updated_at->format('d/m/Y à H:i') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour changer le statut -->
<div class="modal fade" id="changeStatutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="ri-refresh-line me-2"></i>
                    Changer le statut
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="changeStatutForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nouveau statut</label>
                        <select class="form-select" name="statut" id="nouveauStatut" required>
                            <option value="brouillon" {{ $assistance->statut == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                            <option value="en_negociation" {{ $assistance->statut == 'en_negociation' ? 'selected' : '' }}>En négociation</option>
                            <option value="valide" {{ $assistance->statut == 'valide' ? 'selected' : '' }}>Validé</option>
                            <option value="en_cours" {{ $assistance->statut == 'en_cours' ? 'selected' : '' }}>En cours</option>
                            <option value="suspendu" {{ $assistance->statut == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                            <option value="termine" {{ $assistance->statut == 'termine' ? 'selected' : '' }}>Terminé</option>
                            <option value="annule" {{ $assistance->statut == 'annule' ? 'selected' : '' }}>Annulé</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" onclick="updateStatut()">
                    <i class="ri-check-line me-1"></i>
                    Confirmer
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Formulaire de suppression caché -->
<form id="deleteForm" action="{{ route('admin.assistance_comptable.destroy', $assistance) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
$(document).ready(function() {
    // Initialiser les tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

function updateStatut() {
    const statut = $('#nouveauStatut').val();
    
    Swal.fire({
        title: 'Confirmation',
        text: 'Êtes-vous sûr de vouloir changer le statut ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Oui, changer',
        cancelButtonText: 'Annuler',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.assistance_comptable.update_statut", $assistance) }}',
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    statut: statut
                },
                success: function(response) {
                    if (response.success) {
                        // Mettre à jour le badge
                        $('#statutBadge').removeClass().addClass('badge ' + response.badge.class).text(response.badge.text);
                        
                        // Fermer le modal
                        $('#changeStatutModal').modal('hide');
                        
                        // Afficher un message de succès
                        Swal.fire({
                            icon: 'success',
                            title: 'Succès',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: 'Une erreur est survenue lors du changement de statut.'
                    });
                }
            });
        }
    });
}

function confirmDelete() {
    Swal.fire({
        title: 'Êtes-vous sûr ?',
        text: "Cette action supprimera définitivement cette assistance comptable !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oui, supprimer',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#deleteForm').submit();
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

.timeline {
    position: relative;
}

.timeline-item {
    position: relative;
}

.timeline-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.timeline-icon i {
    font-size: 1.2rem;
}

.card-header h5 {
    margin-bottom: 0;
}

.badge {
    font-size: 0.85rem;
    padding: 0.5em 0.75em;
}

.modal-header {
    background-color: #f8f9fa;
}

.btn-outline-danger:hover {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}
</style>
@endpush
@endsection

