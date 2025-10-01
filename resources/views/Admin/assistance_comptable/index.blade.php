@extends('layouts.admin')

@section('assistance_comptable_index')
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
                            <li class="breadcrumb-item active">Assistances comptables</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1">
                        <i class="ri-file-list-line me-2"></i>
                        Gestion des assistances comptables
                    </h4>
                    <p class="mb-0 text-muted">Gérez les assistances comptables des entreprises</p>
                </div>
                <div>
                    <a href="{{ route('admin.assistance_comptable.create') }}" class="btn btn-primary">
                        <i class="ri-add-line me-1"></i>
                        Nouvelle assistance
                    </a>
                </div>
            </div>

            <!-- Filtres et statistiques -->
            <div class="row mb-4">
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary p-2 me-3">
                                    <i class="ri-file-list-3-line fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted small">Total</p>
                                    <h5 class="mb-0">{{ $assistances->total() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success p-2 me-3">
                                    <i class="ri-check-line fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted small">En cours</p>
                                    <h5 class="mb-0">{{ $assistances->filter(fn($a) => in_array($a->statut, ['valide', 'en_cours']))->count() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-warning p-2 me-3">
                                    <i class="ri-time-line fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted small">En attente</p>
                                    <h5 class="mb-0">{{ $assistances->filter(fn($a) => in_array($a->statut, ['brouillon', 'en_negociation']))->count() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info p-2 me-3">
                                    <i class="ri-shield-check-line fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-muted small">Terminées</p>
                                    <h5 class="mb-0">{{ $assistances->filter(fn($a) => $a->statut === 'termine')->count() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages de succès/erreur -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="ri-check-line me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="ri-error-warning-line me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Liste des assistances -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Liste des assistances</h5>
                    <div class="d-flex gap-2">
                        <input type="text" class="form-control form-control-sm" id="searchInput" 
                               placeholder="Rechercher..." style="width: 250px;">
                        <select class="form-select form-select-sm" id="filterStatut" style="width: 150px;">
                            <option value="">Tous les statuts</option>
                            <option value="brouillon">Brouillon</option>
                            <option value="en_negociation">En négociation</option>
                            <option value="valide">Validé</option>
                            <option value="en_cours">En cours</option>
                            <option value="suspendu">Suspendu</option>
                            <option value="termine">Terminé</option>
                            <option value="annule">Annulé</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="assistancesTable">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Entreprise</th>
                                <th>Administrateur</th>
                                <th>Type de contrat</th>
                                <th>Statut</th>
                                <th>Date de début</th>
                                <th>Prix indicatif</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assistances as $assistance)
                                <tr data-statut="{{ $assistance->statut }}">
                                    <td><strong>#{{ $assistance->id }}</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($assistance->entreprise->image)
                                                <img src="{{ asset('storage/' . $assistance->entreprise->image) }}" 
                                                     alt="{{ $assistance->entreprise->nom }}" 
                                                     class="rounded me-2" style="width: 32px; height: 32px; object-fit: cover;">
                                            @endif
                                            <div>
                                                <a href="{{ route('admin.entreprises.show', $assistance->entreprise) }}" 
                                                   class="text-decoration-none">
                                                    {{ $assistance->entreprise->nom }}
                                                </a>
                                                @if($assistance->entreprise->assist)
                                                    <span class="badge bg-success badge-sm ms-1">Assistée</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <small>{{ $assistance->user->nom }} {{ $assistance->user->prenoms }}</small>
                                    </td>
                                    <td>
                                        @php
                                            $typeContrats = [
                                                'mensuel_renouvelable' => 'Mensuel',
                                                'factuel_objectif' => 'Factuel',
                                                'annuel' => 'Annuel',
                                                'ponctuel' => 'Ponctuel'
                                            ];
                                        @endphp
                                        <span class="badge bg-primary">
                                            {{ $typeContrats[$assistance->type_contrat] ?? $assistance->type_contrat }}
                                        </span>
                                    </td>
                                    <td>
                                        @php $badge = $assistance->getStatutBadge(); @endphp
                                        <span class="badge {{ $badge['class'] }}">{{ $badge['text'] }}</span>
                                    </td>
                                    <td>
                                        @if($assistance->date_debut)
                                            {{ $assistance->date_debut->format('d/m/Y') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($assistance->prix_indicatif)
                                            <strong class="text-success">{{ number_format($assistance->prix_indicatif, 0, ',', ' ') }} F</strong>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-line"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('admin.assistance_comptable.show', $assistance) }}">
                                                        <i class="ri-eye-line me-2"></i>Voir les détails
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('admin.assistance_comptable.edit', $assistance) }}">
                                                        <i class="ri-edit-line me-2"></i>Modifier
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#" 
                                                       onclick="confirmDelete({{ $assistance->id }}); return false;">
                                                        <i class="ri-delete-bin-line me-2"></i>Supprimer
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="ri-inbox-line fs-1 mb-3 d-block"></i>
                                            <p class="mb-2">Aucune assistance comptable trouvée</p>
                                            <a href="{{ route('admin.assistance_comptable.create') }}" class="btn btn-sm btn-primary">
                                                <i class="ri-add-line me-1"></i>
                                                Créer une assistance
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($assistances->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            Affichage de {{ $assistances->firstItem() }} à {{ $assistances->lastItem() }} sur {{ $assistances->total() }} résultats
                        </div>
                        <div>
                            {{ $assistances->links() }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Formulaire de suppression caché -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
$(document).ready(function() {
    // Recherche en temps réel
    $('#searchInput').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        filterTable();
    });

    // Filtre par statut
    $('#filterStatut').on('change', function() {
        filterTable();
    });

    function filterTable() {
        const searchTerm = $('#searchInput').val().toLowerCase();
        const statutFilter = $('#filterStatut').val();

        $('#assistancesTable tbody tr').each(function() {
            const row = $(this);
            const text = row.text().toLowerCase();
            const statut = row.data('statut');

            const matchesSearch = text.includes(searchTerm);
            const matchesStatut = !statutFilter || statut === statutFilter;

            if (matchesSearch && matchesStatut) {
                row.show();
            } else {
                row.hide();
            }
        });
    }
});

function confirmDelete(assistanceId) {
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
            const form = $('#deleteForm');
            form.attr('action', `/admin/assistance-comptable/${assistanceId}`);
            form.submit();
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

.badge-sm {
    font-size: 0.7rem;
    padding: 0.25em 0.5em;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
}

.table td {
    vertical-align: middle;
}

.dropdown-toggle::after {
    display: none;
}

.card-body .badge {
    font-size: 0.75rem;
}
</style>
@endpush
@endsection

