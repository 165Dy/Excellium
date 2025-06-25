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
                            <h2 class="page-title">Nos Formations</h2>
                            <p>
                                Nous vous proposons des formations adaptées à vos besoins et à votre niveau.
                            </p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="{{ route('welcome') }}">Accueil</a></li>
                                <li class="active">Nos Formations</li>
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
                    <div class="product-filter">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <div class="show-text wow fadeInLeft">
                                    <span>Nombre d'offres : {{ $formations->count() }}</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="filter-dropdown float-md-end wow fadeInRight">
                                    <select class="wide" id="typeContratSelect">
                                        <option value="TOUT">TOUT</option>
                                        <option value="STAGE">COMPTABILITE</option>
                                        <option value="CDI">AUDIT</option>
                                        <option value="CDD">R.HUMAINES</option>
                                        <option value="CDD">R.FINANCEMENT</option>
                                        <option value="CDD">GESTION.PAIE</option>
                                        <option value="CDD">AUTRES</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($formations->isEmpty())
                    <div class="col-12">
                        <div class="text-center text-white py-5">
                            <h3>Aucune formation disponible</h3>
                            <p>Revenez bientôt pour découvrir nos nouvelles formations !</p>
                        </div>
                    </div>
                @else
                    @foreach ($formations as $formation)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="blog-post-item style-two mb-30 wow fadeInDown">
                                <div class="post-thumbnail">
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
                                        <li><a
                                                href="{{ route('Formations.index', ['categorie_id' => $formation->categorie_id]) }}">
                                                {{ $formation->categorie->nom }}
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#" class="post-admin">
                                            <i class="far fa-user-alt"></i>Par Excellium
                                        </a>
                                        <a href="#" class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($formation->date_debut)->format('d M Y') }}
                                        </a>
                                    </div>

                                    <h4 class="title">
                                        <a href="{{ route('Formations.show_public', $formation->id) }}">
                                            {{ ucfirst(strtolower($formation->titre)) }}
                                        </a>
                                    </h4>
                                    <hr>
                                    <p
                                        style="max-width: 100%; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ str($formation->programme)->limit(100) ?? 'Programme de formation complet disponible.' }}
                                    </p>
                                    <div class="post-meta d-flex align-items-center gap-3" style="gap: 18px;">
                                        @if ($formation->cout)
                                            <div class="formation-price mt-2"
                                                style="border-right: 1.5px solid #FFD22F; padding-right: 16px; margin-right: 8px;">
                                                <span class="text-warning fw-bold">
                                                    <i class="fas fa-tag"></i>
                                                    {{ number_format($formation->cout, 0, ',', ' ') }} FCFA
                                                </span>
                                            </div>
                                        @endif

                                        @if ($formation->lieu)
                                            <div class="formation-lieu mt-1">
                                                <span class="text-light">
                                                    <i class="fas fa-map-marker-alt"></i> {{ $formation->lieu }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

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
            console.log('🎬 Initialisation autoplay vidéos formations');

            // Intersection Observer pour détecter quand les vidéos sont visibles
            const videoObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const video = entry.target;

                    if (entry.isIntersecting) {
                        // La vidéo est visible, on la lance
                        if (video.paused) {
                            video.play().then(() => {
                                console.log('✅ Vidéo lancée:', video.src);
                            }).catch(error => {
                                console.log('❌ Erreur autoplay:', error);
                                // Fallback: afficher les contrôles si autoplay échoue
                                video.controls = true;
                            });
                        }
                    } else {
                        // La vidéo n'est plus visible, on la pause
                        if (!video.paused) {
                            video.pause();
                            console.log('⏸️ Vidéo pausée:', video.src);
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
            console.log(`📹 ${formationVideos.length} vidéo(s) détectée(s)`);

            formationVideos.forEach((video, index) => {
                console.log(`Vidéo ${index + 1}:`, video.src);

                // Ajouter l'observer
                videoObserver.observe(video);

                // Événements pour debug
                video.addEventListener('play', () => {
                    console.log(`▶️ Vidéo ${index + 1} en lecture`);
                });

                video.addEventListener('pause', () => {
                    console.log(`⏸️ Vidéo ${index + 1} en pause`);
                });

                video.addEventListener('error', (e) => {
                    console.error(`❌ Erreur vidéo ${index + 1}:`, e);
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

@endsection
