@extends('layouts.master')
@section('Opportunites')
    <!--====== Start Page Section ======-->
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shape"></span>
        </div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span>
        </div>
        <div class="shape shape-three"><span><img src="{{ asset('assets/images/shape/p-3.png') }}" alt="shape"></span>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h2 class="page-title">Opportunités d'Affaire</h2>
                            <p>Découvrez les opportunités d'affaire qui s'offrent à vous et développez votre réseau
                                professionnel</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="{{ route('welcome') }}">Accueil</a></li>
                                <li class="active">Opportunités d'Affaire</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->

    <!--====== Start Opportunities Section ======-->
    <section class="blog-grid-section secondary-dark-bg pt-140 pb-140">
        <div class="container" style="margin-top: -100px">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-dark border-secondary">
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="searchInput" class="form-label text-white me-2 mb-0">Rechercher</label>
                                    <input type="text" id="searchInput" class="form-control"
                                        placeholder="🔍...Rechercher une opportunité">
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="categoryFilter" class="form-label text-white me-2 mb-0">Catégorie</label>
                                    <select id="categoryFilter" class="form-select">
                                        <option value="">Toutes les catégories</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="statusFilter" class="form-label text-white me-2 mb-0">Statut</label>
                                    <select id="statusFilter" class="form-select">
                                        <option value="">Tous les statuts</option>
                                        <option value="en_ligne">En ligne</option>
                                        <option value="ferme">Fermé</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div><br>


            <!-- Liste des opportunités -->
            <div class="row" id="opportunitiesContainer">
                @forelse($opportunites as $opportunite)
                    <div class="col-lg-4 col-md-6 col-sm-12 opportunity-item"
                        data-category="{{ $opportunite->categorie_id }}" data-status="{{ $opportunite->statut }}"
                        data-title="{{ strtolower($opportunite->titre) }}"
                        data-description="{{ strtolower($opportunite->description) }}">
                        <div class="blog-post-item style-two mb-30 wow fadeInDown">
                            <div class="post-thumbnail">
                                <img src="{{ asset('assets/images/opportunities/opportunity-' . (($loop->iteration % 6) + 1) . '.jpg') }}"
                                    alt="{{ $opportunite->titre }}"
                                    onerror="this.src='{{ asset('assets/images/blog/blog-6.jpg') }}'">
                                <ul class="post-categories">
                                    <li><a href="#">{{ $opportunite->categorie->nom ?? 'Général' }}</a></li>
                                </ul>
                                @if ($opportunite->statut === 'en_ligne')
                                    <div class="status-badge bg-success">
                                        <i class="fas fa-check-circle"></i> En ligne
                                    </div>
                                @elseif($opportunite->statut === 'ferme')
                                    <div class="status-badge bg-danger">
                                        <i class="fas fa-times-circle"></i> Fermé
                                    </div>
                                @endif
                            </div>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#" class="post-admin">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ $opportunite->created_at->format('d M Y') }}
                                    </a>
                                    @if ($opportunite->lieu)
                                        <a href="#" class="post-date">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $opportunite->lieu }}
                                        </a>
                                    @endif
                                </div>
                                <h4 class="title">
                                    <a href="{{ route('clients.opportunites.business.show', $opportunite->slug) }}">{{ $opportunite->titre }}</a>
                                </h4>
                                <p class="description">{{ \Illuminate\Support\Str::limit($opportunite->description, 120) }}
                                </p>

                                @if ($opportunite->date_fin)
                                    <div class="deadline-info">
                                        <i class="fas fa-clock"></i>
                                        <span class="text-muted">
                                            Clôture : {{ \Carbon\Carbon::parse($opportunite->date_fin)->format('d/m/Y') }}
                                        </span>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="candidats-count">
                                        <i class="fas fa-users"></i>
                                        {{ $opportunite->postulations_count ?? 0 }}
                                        candidat{{ ($opportunite->postulations_count ?? 0) > 1 ? 's' : '' }}
                                    </div>
                                    <a href="{{ route('clients.opportunites.business.show', $opportunite->slug) }}"
                                        class="btn btn-primary btn-sm">
                                        Voir détails
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <div class="empty-state">
                                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                <h4 class="text-white">Aucune opportunité trouvée</h4>
                                <p class="text-muted">Il n'y a actuellement aucune opportunité d'affaire disponible.</p>
                                <a href="{{ route('welcome') }}" class="btn btn-primary">
                                    <i class="fas fa-home me-2"></i>Retour à l'accueil
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($opportunites->hasPages())
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center mt-50">
                            {{ $opportunites->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section><!--====== End Opportunities Section ======-->

    <!-- Modal de candidature -->
    <div class="modal fade" id="candidatureModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title text-white">
                        <i class="fas fa-handshake me-2"></i>Postuler à cette opportunité
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="candidatureForm">
                        @csrf
                        <input type="hidden" id="opportunite_id" name="opportunite_id">

                        <div class="mb-3">
                            <label class="form-label text-white">Nom complet</label>
                            <input type="text" id="nom_complet" name="nom_complet" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white">Message de motivation</label>
                            <textarea id="message" name="message" class="form-control" rows="4"
                                placeholder="Expliquez pourquoi vous êtes intéressé par cette opportunité..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" onclick="submitCandidature()">
                        <i class="fas fa-paper-plane me-2"></i>Envoyer ma candidature
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .status-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            color: white;
            z-index: 2;
        }

        .deadline-info {
            margin-top: 10px;
            padding: 8px 12px;
            background-color: rgba(255, 193, 7, 0.1);
            border-left: 3px solid #ffc107;
            border-radius: 4px;
        }

        .candidats-count {
            color: #6c757d;
            font-size: 14px;
        }

        .empty-state {
            padding: 60px 20px;
        }

        .opportunity-item {
            transition: all 0.3s ease;
        }

        .opportunity-item:hover {
            transform: translateY(-5px);
        }

        .post-thumbnail {
            position: relative;
            overflow: hidden;
        }

        .post-thumbnail img {
            transition: transform 0.3s ease;
        }

        .opportunity-item:hover .post-thumbnail img {
            transform: scale(1.05);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const statusFilter = document.getElementById('statusFilter');
            const opportunitiesContainer = document.getElementById('opportunitiesContainer');

            function filterOpportunities() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value;
                const selectedStatus = statusFilter.value;

                const opportunities = document.querySelectorAll('.opportunity-item');

                opportunities.forEach(opportunity => {
                    const title = opportunity.dataset.title;
                    const description = opportunity.dataset.description;
                    const category = opportunity.dataset.category;
                    const status = opportunity.dataset.status;

                    let show = true;

                    // Filtre par recherche
                    if (searchTerm && !title.includes(searchTerm) && !description.includes(searchTerm)) {
                        show = false;
                    }

                    // Filtre par catégorie
                    if (selectedCategory && category !== selectedCategory) {
                        show = false;
                    }

                    // Filtre par statut
                    if (selectedStatus && status !== selectedStatus) {
                        show = false;
                    }

                    opportunity.style.display = show ? 'block' : 'none';
                });

                // Vérifier s'il y a des résultats
                const visibleOpportunities = document.querySelectorAll(
                    '.opportunity-item[style*="block"], .opportunity-item:not([style])');
                if (visibleOpportunities.length === 0) {
                    opportunitiesContainer.innerHTML = `
                        <div class="col-12">
                            <div class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                    <h4 class="text-white">Aucun résultat trouvé</h4>
                                    <p class="text-muted">Essayez de modifier vos critères de recherche.</p>
                                </div>
                            </div>
                        </div>
                    `;
                }
            }

            searchInput.addEventListener('input', filterOpportunities);
            categoryFilter.addEventListener('change', filterOpportunities);
            statusFilter.addEventListener('change', filterOpportunities);
        });

        function openCandidatureModal(opportuniteId) {
            document.getElementById('opportunite_id').value = opportuniteId;
            const modal = new bootstrap.Modal(document.getElementById('candidatureModal'));
            modal.show();
        }

        function submitCandidature() {
            const form = document.getElementById('candidatureForm');
            const formData = new FormData(form);

            // Afficher un indicateur de chargement
            const submitBtn = document.querySelector('#candidatureModal .btn-primary');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Envoi en cours...';
            submitBtn.disabled = true;

            fetch('{{ route('clients.opportunites.business.candidature') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Fermer la modale
                        const modal = bootstrap.Modal.getInstance(document.getElementById('candidatureModal'));
                        modal.hide();

                        // Afficher un message de succès
                        Swal.fire({
                            title: 'Candidature envoyée !',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Réinitialiser le formulaire
                        form.reset();
                    } else {
                        let errorMessage = data.message || 'Erreur lors de l\'envoi de la candidature';
                        if (data.errors) {
                            errorMessage += '\n\nErreurs :\n';
                            Object.values(data.errors).forEach(error => {
                                errorMessage += '- ' + error[0] + '\n';
                            });
                        }
                        Swal.fire('Erreur', errorMessage, 'error');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    Swal.fire('Erreur', 'Une erreur inattendue est survenue', 'error');
                })
                .finally(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
        }
    </script>

@endsection
