@extends('layouts.admin')
@section('index_emplois')
    <br><br>
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
                <button type="button" class="btn btn-outline-primary" onclick="refreshEmplois()">
                    <i class="fas fa-sync-alt me-1"></i>Actualiser
                </button>
                <button type="button" class="btn btn-primary btn-lg shadow-sm" data-bs-toggle="modal"
                    data-bs-target="#create_emplois">
                    <i class="fas fa-plus-circle me-2"></i>Nouvelle Opportunité
                </button>
            </div>
        </div>

        {{-- Debug : Vérifier si les données arrivent --}}
        @if ($emplois->isEmpty())
            <div class="alert alert-danger mb-4">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Alerte :</strong> Opportunités non définies
            </div>
        @else
            <div class="alert alert-success mb-4">
                <i class="fas fa-check-circle me-2"></i>
                <strong>Données chargées :</strong> {{ $emplois->count() }} opportunité(s) trouvée(s)
            </div>
        @endif


        {{-- Statistiques rapides --}}
        @if (isset($emplois) && $emplois->count() > 0)
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-gradient-primary text-white shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="d-flex justify-content-center align-items-center mb-2">
                                <div class="rounded-circle bg-white bg-opacity-25 p-3">
                                    <i class="fas fa-briefcase fa-2x"></i>
                                </div>
                            </div>
                            <h3 class="fw-bold mb-1">{{ $emplois->count() }}</h3>
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
                            <h3 class="fw-bold mb-1">{{ $emplois->where('statut', 'active')->count() }}</h3>
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
                                {{ $emplois->sum(function ($o) {return $o->totalCandidatures();}) }}</h3>
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
                            <h3 class="fw-bold mb-1">{{ $emplois->where('date_expiration', '>=', now())->count() }}
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
                @if (isset($emplois) && $emplois->count() > 0)
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
                                @foreach ($emplois as $emploi)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                                    <i class="fas fa-briefcase text-primary"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold">{{ $emploi->titre }}</h6>
                                                    <small class="text-muted">
                                                        💰 {{ $emploi->salaire_formate ?? 'Non spécifié' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">{{ $emploi->entreprise }}</span>
                                        </td>
                                        <td>{!! $emploi->type_contrat_badge !!}</td>
                                        <td>
                                            <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                            {{ $emploi->localisation }}
                                        </td>
                                        <td>
                                            <span class="badge bg-primary rounded-pill">
                                                {{ $emploi->totalCandidatures() }}
                                            </span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $emploi->date_expiration }}
                                                @if ($emploi->isExpired())
                                                    <br><span class="text-danger">Expirée</span>
                                                @else
                                                    <br><span class="text-success">{{ $emploi->joursRestants() }}
                                                        jour(s)</span>
                                                @endif
                                            </small>
                                        </td>
                                        <td>{!! $emploi->statut_badge !!}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalVoirEmploi" title="Voir détails"
                                                    data-id="{{ $emploi->id }}" data-titre="{{ $emploi->titre }}"
                                                    data-entreprise="{{ $emploi->entreprise }}"
                                                    data-salaireMin="{{ $emploi->salaire_min . ' FCFA' }}"
                                                    data-salaireMax="{{ $emploi->salaire_max . ' FCFA' }}"
                                                    data-localisation="{{ $emploi->localisation }}"
                                                    data-contrat="{{ $emploi->type_contrat }}"
                                                    data-expiration="{{ $emploi->date_expiration }}"
                                                    data-statut="{{ $emploi->statut }}">
                                                    <i class="ri ri-eye-line"></i>
                                                </button>
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditEmploi" title="Modifier"
                                                    data-id="{{ $emploi->id }}" data-titre="{{ $emploi->titre }}"
                                                    data-entreprise="{{ $emploi->entreprise }}"
                                                    data-salaireMin="{{ $emploi->salaire_min . ' FCFA' }}"
                                                    data-salaireMax="{{ $emploi->salaire_max . ' FCFA' }}"
                                                    data-localisation="{{ $emploi->localisation }}"
                                                    data-contrat="{{ $emploi->type_contrat }}"
                                                    data-expiration="{{ $emploi->date_expiration }}"
                                                    data-statut="{{ $emploi->statut }}">
                                                    <i class="ri ri-edit-line"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" title="Supprimer">
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
                            data-bs-target="#create_emplois">
                            <i class="fas fa-plus me-2"></i>Créer une opportunité
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Modal Voir Détails -->
    <div class="modal fade" id="modalVoirEmploi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Détails de l'emploi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Titre :</strong> <span id="emploiTitre"></span></li>
                        <li class="list-group-item"><strong>Entreprise :</strong> <span id="emploiEntreprise"></span></li>
                        <li class="list-group-item"><strong>Salaire minimum :</strong> <span id="emploiSalaireMin"></span>
                        </li>
                        <li class="list-group-item"><strong>Salaire maximum :</strong> <span id="emploiSalaireMax"></span>
                        </li>
                        <li class="list-group-item"><strong>Localisation :</strong> <span id="emploiLocalisation"></span>
                        </li>
                        <li class="list-group-item"><strong>Type de contrat :</strong> <span id="emploiContrat"></span>
                        </li>
                        <li class="list-group-item"><strong>Date d’expiration :</strong> <span
                                id="emploiExpiration"></span></li>
                        <li class="list-group-item"><strong>Statut :</strong> <span id="emploiStatut"></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Éditer -->
    <div class="modal fade" id="modalEditEmploi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Modifier l'emploi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEditEmploi">
                    <div class="modal-body">
                        <input type="hidden" id="editId" name="id">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Titre</label>
                                <input type="text" class="form-control" id="editTitre" name="titre" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Entreprise</label>
                                <input type="text" class="form-control" id="editEntreprise" name="entreprise"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Salaire min</label>
                                <input type="text" class="form-control" id="editSalaireMin" name="salaire_min">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Salaire max</label>
                                <input type="text" class="form-control" id="editSalaireMax" name="salaire_max">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Localisation</label>
                                <input type="text" class="form-control" id="editLocalisation" name="localisation">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Type de contrat</label>
                                <select class="form-select" id="editContrat" name="type_contrat">
                                    <option value="CDI">CDI</option>
                                    <option value="CDD">CDD</option>
                                    <option value="Stage">Stage</option>
                                    <option value="Freelance">Freelance</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Date d’expiration</label>
                                <input type="date" class="form-control" id="editExpiration" name="date_expiration">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Statut</label>
                                <select class="form-select" id="editStatut" name="statut">
                                    <option value="Actif">Actif</option>
                                    <option value="Inactif">Inactif</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>



    <script>
        function refreshEmplois() {
            window.location.reload();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Quand la modale Voir s’ouvre
            var voirModal = document.getElementById('modalVoirEmploi');
            voirModal.addEventListener('show.bs.modal', function(event) {
                let button = event.relatedTarget; // bouton qui a ouvert la modale

                document.getElementById("emploiTitre").textContent = button.getAttribute('data-titre');
                document.getElementById("emploiEntreprise").textContent = button.getAttribute(
                    'data-entreprise');
                document.getElementById("emploiSalaireMin").textContent = button.getAttribute(
                    'data-salaireMin');
                document.getElementById("emploiSalaireMax").textContent = button.getAttribute(
                    'data-salaireMax');
                document.getElementById("emploiLocalisation").textContent = button.getAttribute(
                    'data-localisation');
                document.getElementById("emploiContrat").textContent = button.getAttribute('data-contrat');
                document.getElementById("emploiExpiration").textContent = button.getAttribute(
                    'data-expiration');
                document.getElementById("emploiStatut").textContent = button.getAttribute('data-statut');
            });

            // Quand la modale Edit s’ouvre
            var editModal = document.getElementById('modalEditEmploi');
            editModal.addEventListener('show.bs.modal', function(event) {
                let button = event.relatedTarget;

                document.getElementById("editId").value = button.getAttribute('data-id');
                document.getElementById("editTitre").value = button.getAttribute('data-titre');
                document.getElementById("editEntreprise").value = button.getAttribute('data-entreprise');
                document.getElementById("editSalaireMin").value = button.getAttribute('data-salaireMin');
                document.getElementById("editSalaireMax").value = button.getAttribute('data-salaireMax');
                document.getElementById("editLocalisation").value = button.getAttribute(
                'data-localisation');
                document.getElementById("editContrat").value = button.getAttribute('data-contrat');
                document.getElementById("editExpiration").value = button.getAttribute('data-expiration');
                document.getElementById("editStatut").value = button.getAttribute('data-statut');
            });
        });
    </script>





@endsection
