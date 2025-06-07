@extends('layouts.admin')
@section('index_opportunites')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- Header avec actions --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-primary fw-bold mb-1">
                    <i class="fas fa-briefcase me-2"></i>OPPORTUNITÉS D'EMPLOI
                </h2>
                <p class="text-muted mb-0">Gérez toutes vos offres d'emploi et candidatures</p>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-primary" onclick="refreshOpportunites()">
                    <i class="fas fa-sync-alt me-1"></i>Actualiser
                </button>
                <button type="button" class="btn btn-primary btn-lg shadow-sm" data-bs-toggle="modal"
                    data-bs-target="#create_opportunites">
                    <i class="fas fa-plus-circle me-2"></i>Nouvelle Opportunité
                </button>
            </div>
        </div>

        {{-- Debug : Vérifier si les données arrivent --}}
        @if ($opportunites->isEmpty())
            <div class="alert alert-danger mb-4">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Erreur :</strong> Variable $opportunites non définie
            </div>
        @else
            <div class="alert alert-success mb-4">
                <i class="fas fa-check-circle me-2"></i>
                <strong>Données chargées :</strong> {{ $opportunites->count() }} opportunité(s) trouvée(s)
            </div>
        @endif


        {{-- Statistiques rapides --}}
        @if (isset($opportunites) && $opportunites->count() > 0)
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-gradient-primary text-white shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="d-flex justify-content-center align-items-center mb-2">
                                <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                    <i class="fas fa-briefcase fa-2x"></i>
                                </div>
                            </div>
                            <h3 class="fw-bold mb-1">{{ $opportunites->count() }}</h3>
                            <p class="mb-0 opacity-75">Total Opportunités</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-gradient-success text-white shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="d-flex justify-content-center align-items-center mb-2">
                                <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                    <i class="fas fa-check-circle fa-2x"></i>
                                </div>
                            </div>
                            <h3 class="fw-bold mb-1">{{ $opportunites->where('statut', 'active')->count() }}</h3>
                            <p class="mb-0 opacity-75">Actives</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-gradient-warning text-white shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="d-flex justify-content-center align-items-center mb-2">
                                <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                            </div>
                            <h3 class="fw-bold mb-1">
                                {{ $opportunites->sum(function ($o) {return $o->totalCandidatures();}) }}</h3>
                            <p class="mb-0 opacity-75">Candidatures</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-gradient-info text-white shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="d-flex justify-content-center align-items-center mb-2">
                                <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                    <i class="fas fa-clock fa-2x"></i>
                                </div>
                            </div>
                            <h3 class="fw-bold mb-1">{{ $opportunites->where('date_expiration', '>=', now())->count() }}
                            </h3>
                            <p class="mb-0 opacity-75">À pourvoir</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Table des opportunités --}}
        <div class="card shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i>Liste des opportunités
                </h5>
            </div>

            <div class="card-body p-0">
                @if (isset($opportunites) && $opportunites->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th><i class="fas fa-briefcase me-1"></i>Poste</th>
                                    <th><i class="fas fa-building me-1"></i>Entreprise</th>
                                    <th><i class="fas fa-file-contract me-1"></i>Type</th>
                                    <th><i class="fas fa-map-marker-alt me-1"></i>Lieu</th>
                                    <th><i class="fas fa-users me-1"></i>Candidatures</th>
                                    <th><i class="fas fa-calendar me-1"></i>Expiration</th>
                                    <th><i class="fas fa-toggle-on me-1"></i>Statut</th>
                                    <th><i class="fas fa-cogs me-1"></i>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($opportunites as $opportunite)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                                    <i class="fas fa-briefcase text-primary"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold">{{ $opportunite->titre }}</h6>
                                                    <small class="text-muted">
                                                        💰 {{ $opportunite->salaire_formate ?? 'Non spécifié' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">{{ $opportunite->entreprise }}</span>
                                        </td>
                                        <td>{!! $opportunite->type_contrat_badge !!}</td>
                                        <td>
                                            <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                            {{ $opportunite->localisation }}
                                        </td>
                                        <td>
                                            <span class="badge bg-primary rounded-pill">
                                                {{ $opportunite->totalCandidatures() }}
                                            </span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $opportunite->date_expiration }}
                                                @if ($opportunite->isExpired())
                                                    <br><span class="text-danger">Expirée</span>
                                                @else
                                                    <br><span class="text-success">{{ $opportunite->joursRestants() }}
                                                        jour(s)</span>
                                                @endif
                                            </small>
                                        </td>
                                        <td>{!! $opportunite->statut_badge !!}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-info btn-sm"
                                                    onclick="voirDetailsOpportunite({{ $opportunite->id }})"
                                                    title="Voir détails">
                                                    <i class="ri ri-eye-line"></i>
                                                </button>
                                                <button class="btn btn-warning btn-sm"
                                                    onclick="editerOpportunite({{ $opportunite->id }})" title="Modifier">
                                                    <i class="ri ri-edit-line"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="supprimerOpportunite({{ $opportunite->id }}, '{{ addslashes($opportunite->titre) }}')"
                                                    title="Supprimer">
                                                    <i class="ri ri-delete-bin-line"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Aucune opportunité</h5>
                        <p class="text-muted">Commencez par créer votre première offre d'emploi</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#create_opportunites">
                            <i class="fas fa-plus me-2"></i>Créer une opportunité
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function refreshOpportunites() {
            window.location.reload();
        }

        function voirDetailsOpportunite(id) {
            console.log('Voir détails:', id);
        }

        function editerOpportunite(id) {
            console.log('Éditer:', id);
        }

        function supprimerOpportunite(id, titre) {
            console.log('Supprimer:', id, titre);
        }
    </script>

    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #696ac3, #4f46e5) !important;
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #22c55e, #16a34a) !important;
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706) !important;
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #06b6d4, #0891b2) !important;
        }

        .card:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(var(--bs-primary-rgb), 0.05);
        }
    </style>
    
@endsection
