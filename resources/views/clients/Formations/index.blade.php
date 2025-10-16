@extends('layouts.master')
@section('formations.index')
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shapeeee"></span></div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span></div>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h2 class="page-title">@lang('extracted.nos_formations')</h2>
                            <p>
                                Nous vous proposons des formations adaptées à vos besoins et à votre niveau.
                            </p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="{{ route('welcome') }}">@lang('extracted.accueil')</a></li>
                                <li class="active">@lang('extracted.nos_formations')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br>


        </div>
    </section>

    <section class="blog-grid-section secondary-dark-bg pt-140 pb-140">
        <div class="container" style="margin-top: -100px">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-dark border-secondary">
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="searchInput" class="form-label text-white me-2 mb-0">Disponible</label>
                                    <input type="text" id="searchInput" class="form-control"
                                        value="{{ $formations->count() }}" readonly>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="searchInput" class="form-label text-white me-2 mb-0">Rechercher</label>
                                    <input type="text" id="searchInput" class="form-control"
                                        placeholder="Rechercher une formation...">
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

                            </div>

                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                @if ($formations->isEmpty())
                    <div class="col-12">
                        <div class="text-center text-white py-5">
                            <h3>@lang('extracted.aucune_formation_disponible')</h3>
                            <p>@lang('extracted.revenez_bientot_pour_decouvrir_nos_nouvelles_formations')</p>
                        </div>
                    </div>
                @else
                    @foreach ($formations as $formation)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="blog-post-item style-two mb-30 wow fadeInDown">
                                <div class="post-thumbnail"
                                    style="background-color: rgba(255, 252, 252, 0.89);border-radius: 10px">
                                    @if ($formation->file_path && $formation->file_type === 'image')
                                        <img src="{{ asset('storage/' . $formation->file_path) }}"
                                            alt="{{ $formation->titre }}"
                                            style="width: 100%; height: 250px; object-fit: cover;">
                                    @elseif($formation->file_path && $formation->file_type === 'video')
                                        <video class="formation-video"
                                            style="width: 100%; height: 250px; object-fit: cover;" muted loop
                                            preload="metadata" poster="{{ asset('assets/images/blog/blog-1.jpg') }}">
                                            <source src="{{ asset('storage/' . $formation->file_path) }}" type="video/mp4"
                                                style="width: 100%; height: 250px; object-fit: cover;">
                                            Votre navigateur ne supporte pas la vidéo.
                                        </video>
                                    @else
                                        <img src="{{ asset('assets/images/blog/blog-1.jpg') }}" alt="Image par défaut"
                                            style="width: 100%; height: 250px; object-fit: cover;">
                                    @endif

                                    <ul class="post-categories">
                                        <li>
                                            <a href="#">
                                                {{ $formation->categorie ? ucfirst($formation->categorie->nom) : 'Catégorie inconnue' }}
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="card border-0 shadow-sm mb-4"
                                        style="border-radius: 14px; background-color: #fff; transition: all 0.3s ease;">
                                        <div class="card-body p-4">
                                            <!-- Header -->
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="d-flex align-items-center gap-3 text-muted small">
                                                    <span><i class="far fa-user-alt me-1 text-warning"></i>Par
                                                        Excellium</span>
                                                    <span><i class="far fa-calendar-alt me-1 text-warning"></i>
                                                        {{ \Carbon\Carbon::parse($formation->date_debut)->format('d M Y') }}
                                                    </span>
                                                </div>

                                            </div>

                                            <!-- Titre -->
                                            <h5 class="card-title fw-bold mb-2" style="color: #23272b;">
                                                <a href="{{ route('clients.formations.show', $formation->id) }}"
                                                    class="text-decoration-none text-dark">
                                                    Titre: {{ ucfirst(strtolower($formation->titre)) }}
                                                </a>
                                            </h5>

                                            <!-- Description -->
                                            <p class="card-text text-secondary mb-3"
                                                style="font-size: 0.95rem; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ \Illuminate\Support\Str::limit($formation->programme, 150, '...') ?? 'Programme de formation complet disponible.' }}
                                            </p>

                                            <!-- Lieu -->
                                            @if ($formation->lieu)
                                                <div class="d-flex align-items-center text-secondary mb-4">
                                                    <i class="fas fa-map-marker-alt me-2 text-warning"></i>
                                                    Lieu: &nbsp;
                                                    <span class="fw-semibold text-capitalize">{{ $formation->lieu }}</span>
                                                </div>
                                            @endif

                                            <!-- Bouton -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                @if ($formation->cout)
                                                    <span class="badge bg-warning text-dark fw-semibold px-3 py-2"
                                                        style="font-size: 0.9rem; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                                        <i class="fas fa-tag me-1"></i>
                                                        {{ number_format($formation->cout, 0, ',', ' ') }} FCFA
                                                    </span>
                                                @endif
                                                &nbsp;

                                                <a href="{{ route('clients.formations.show', $formation->id) }}"
                                                    class="btn fw-semibold px-4 py-2"
                                                    style="border-radius: 8px; border: 2px solid #f9c806; color: #f9c806; transition: 0.3s;">
                                                    Details <i class="fas fa-arrow-right ms-1"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <style>
                .card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                }

                .btn:hover {
                    background-color: #f9c806;
                    color: #23272b !important;
                }
            </style>
            {{-- Pagination dynamique --}}
            @if ($formations->hasPages())
                <div class="row">
                    <div class="col-lg-12">
                        <div class="zency-pagination text-center mt-30 wow fadeInDown">
                            {{ $formations->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--====== End Blog Section ======-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🎯 Initialisation autoplay vidéos formations');

            // Intersection Observer pour détecter quand les vidéos sont visibles
            const videoObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const video = entry.target;

                    if (entry.isIntersecting) {
                        // La vidéo est visible, on la lance
                        if (video.paused) {
                            video.play().then(() => {
                                console.log('â Vidéo lancée:', video.src);
                            }).catch(error => {
                                console.log('â Erreur autoplay:', error);
                                // Fallback: afficher les contrôles si autoplay échoue
                                video.controls = true;
                            });
                        }
                    } else {
                        // La vidéo n'est plus visible, on la pause
                        if (!video.paused) {
                            video.pause();
                            console.log('â¸ï¸ Vidéo pausée:', video.src);
                        }
                    }
                });
            }, {
                // Configuration de l'observer
                threshold: 0.5, // 50% de la vidéo doit être visible
                rootMargin: '0px'
            });

            // Observer toutes les vidéos de formations
            const formationVideos = document.querySelectorAll('.formation-video');
            console.log(`ð¹ ${formationVideos.length} vidéo(s) détectée(s)`);

            formationVideos.forEach((video, index) => {
                console.log(`Vidéo ${index + 1}:`, video.src);

                // Ajouter l'observer
                videoObserver.observe(video);

                // Événements pour debug
                video.addEventListener('play', () => {
                    console.log(`â¶ï¸ Vidéo ${index + 1} en lecture`);
                });

                video.addEventListener('pause', () => {
                    console.log(`â¸ï¸ Vidéo ${index + 1} en pause`);
                });

                video.addEventListener('error', (e) => {
                    console.error(`â Erreur vidéo ${index + 1}:`, e);
                    // En cas d'erreur, afficher une image par défaut
                    const container = video.parentElement;
                    video.style.display = 'none';

                    const fallbackImg = document.createElement('img');
                    fallbackImg.src = '{{ asset('assets/images/blog/blog-1.jpg') }}';
                    fallbackImg.alt = 'Vidéo non disponible';
                    fallbackImg.style.cssText = 'width: 100%; height: 250px; object-fit: cover;';

                    container.insertBefore(fallbackImg, video);
                });
            });

            // Nettoyage lors du changement de page
            window.addEventListener('beforeunload', () => {
                formationVideos.forEach(video => {
                    video.pause();
                });
                videoObserver.disconnect();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("✅ Script filtrage formations chargé");

            const searchInput = document.querySelector('#searchInput[placeholder]');
            const categoryFilter = document.getElementById('categoryFilter');
            const formationItems = document.querySelectorAll('.blog-post-item');

            // ✅ Message "Aucun résultat"
            const noResultMessage = document.createElement('div');
            noResultMessage.textContent = "Aucune formation trouvée 😕";
            noResultMessage.style.display = "none";
            noResultMessage.style.textAlign = "center";
            noResultMessage.style.color = "#fff";
            noResultMessage.style.fontSize = "1.1rem";
            noResultMessage.style.padding = "14px";
            noResultMessage.style.marginTop = "18px";

            const filtersRow = document.querySelector('.row.g-3');
            filtersRow.parentNode.insertBefore(noResultMessage, filtersRow.nextSibling);

            function normalize(str) {
                return (str || '').toString().toLowerCase().trim();
            }

            function filterFormations() {
                const searchValue = normalize(searchInput.value);
                const selectedCategory = categoryFilter.value.trim();
                let visibleCount = 0;

                formationItems.forEach(item => {
                    // Récupération du texte utile pour la recherche
                    const title = normalize(item.querySelector('.card-title')?.textContent);
                    const description = normalize(item.querySelector('.card-text')?.textContent);
                    const category = normalize(item.querySelector('.post-categories a')?.textContent);

                    // Vérifie les correspondances
                    const matchesSearch = !searchValue ||
                        title.includes(searchValue) ||
                        description.includes(searchValue) ||
                        category.includes(searchValue);

                    const matchesCategory = !selectedCategory ||
                        item.querySelector('.post-categories a')?.textContent.trim().toLowerCase() ===
                        categoryFilter.options[categoryFilter.selectedIndex].text.trim().toLowerCase();

                    if (matchesSearch && matchesCategory) {
                        item.style.display = "";
                        visibleCount++;
                    } else {
                        item.style.display = "none";
                    }
                });

                noResultMessage.style.display = visibleCount === 0 ? "block" : "none";
            }

            // 🔄 Événements de filtrage instantané
            searchInput.addEventListener('input', filterFormations);
            categoryFilter.addEventListener('change', filterFormations);

            // ⚡ Appel initial
            filterFormations();
        });
    </script>


@endsection
