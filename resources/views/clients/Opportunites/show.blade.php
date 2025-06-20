@extends('layouts.master')
@section('showOpportunite')
    <!--====== Start Page Section ======-->
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shape"></span></div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h1 class="page-title">Details</h1>
                            {{-- <p>Lorem voluptatem accusantium dolorem </p> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->
    <!--====== Start Product Details Section ======-->
    <section class="product-details-section secondary-dark-bg pt-140 pb-130">
        <div class="container" style="margin-top: -100px">
            <div class="product-details-wrapper">
                <div class="row align-items-xl-center">
                    <div class="col-xl-6">
                        <!--=== Product Gallery ===-->
                        <div class="product-gallery-area mb-50 wow fadeInLeft">
                            <div class="product-big mb-30">
                                <div class="product-img">
                                    <a href="{{ asset('assets/images/products/product-big-1.jpg') }}" class="img-popup">
                                        <img src="{{ asset('assets/images/products/product-big-1.jpg') }}" alt="Product1">
                                    </a>
                                </div>
                            </div>
                            <hr>

                            @php
                                // opportunites de la même catégorie
                                $memeOpportunites = \App\Models\Emploi::where('id', $opportunite->id)
                                    ->where('id', '=', $opportunite->id)
                                    ->latest()
                                    ->limit(3)
                                    ->get();
                            @endphp

                            <div class="categ">
                                <h3>Offres similaires</h3>
                            </div><br>

                            @if ($memeOpportunites->isEmpty())
                                <div class="section-content-box pr-xl-400 mb-40 wow fadeInLeft"style="width:500px">
                                    <div class="iconic-box style-two mb-80" style="width: 500px">
                                        <h5 style="color: rgb(243, 35, 35)"> Aucune autre Offres disponible dans cette Categorie</h5>
                                    </div>

                                </div>
                            @else
                                <div class="product-thumb-slider">
                                    @foreach ($memeOpportunites as $memeOpportunite)
                                        <div class="product-img">
                                            <img src="{{ asset('assets/images/products/thumb-1.jpg') }}" alt="Product">
                                            <p style="max-width: 100%; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{$memeOpportunite->description}}</p>
                                            <p> <i class="far fa-calendar-alt"></i> {{ $memeOpportunite->date_expiration }}</p>
                                            <a href="{{ route('opportunites.clients.show', $opportunite->id) }}">{{ $memeOpportunite->entreprise }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif



                        </div>
                    </div>
                    <div class="col-xl-6">
                        <!--=== Product Info ===-->
                        <div class="product-info mb-50 wow fadeInRight">
                            <span class="stock">Expire le : {{ $opportunite->date_expiration }}</span>
                            <h4>{{ $opportunite->titre }}</h4>
                            
                            <ul class="ratings">
                                <li><i class="icon-map"></i> {{ $opportunite->localisation }}</li>
                                {{-- <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li> --}}
                                
                            </ul>
                            <hr>
                            <p>{{ $opportunite->description }}</p>
                            <hr>
                            <div class="description-content">
                                <ul>
                                    <ul class="check-list style-one">
                                        <li><i class="far fa-check"></i>Entreprise : {{ $opportunite->entreprise }} </li>
                                        <li><i class="far fa-check"></i>Type de Contrat : {{ $opportunite->type_contrat }}
                                        </li>
                                        <li><i class="far fa-check"></i>Experience : {{ $opportunite->experience_requise }}
                                        </li>
                                        <li><i class="far fa-check"></i>Salaire : {{ $opportunite->salaire_min }} FCFA <=>
                                                {{ $opportunite->salaire_max }} FCFA</li>
                                        <li><i class="far fa-check"></i>Niveau : {{ $opportunite->niveau_etude }} </li>
                                        <li><i class="far fa-check"></i>Poste Disponible :
                                            {{ $opportunite->nombre_postes }} </li>
                                        <li><i class="far fa-check"></i>Contact : {{ $opportunite->contact_telephone }}
                                        </li>

                                    </ul><br>

                                                                       {{-- filepath: c:\Users\home\Desktop\Projet_Excellium\Excellium\resources\views\clients\Opportunites\show.blade.php --}}
                                    @php
                                        use Carbon\Carbon;
                                        $estExpiree = $opportunite->date_expiration && Carbon::parse($opportunite->date_expiration)->isPast();
                                    @endphp
                                    
                                    @if (!$estExpiree)
                                        <button class="theme-btn style-one" data-bs-target="#inscriptionModal"
                                            data-bs-toggle="modal">
                                            <div class="icon">
                                                <i class="icon-briefcase"> Postuler</i>
                                            </div>
                                        </button>
                                    @else
                                        <button class="theme-btn style-one" data-bs-target="#offre_fermer"
                                            data-bs-toggle="modal" style="background-color: red">
                                            <div class="icon">
                                                <i class="icon-briefcase"> Oups !!! Cette offre n'est plus disponible </i>
                                            </div>
                                        </button>
                                    @endif

                                                                       {{-- filepath: c:\Users\home\Desktop\Projet_Excellium\Excellium\resources\views\clients\Opportunites\show.blade.php --}}
                                    <div class="modal fade" id="offre_fermer" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-simple">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button> --}}
                                                    <div class="text-center mb-4 p-4">
                                                        <!-- SVG Warning Icon -->
                                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none">
                                                            <circle cx="12" cy="12" r="12" fill="#ffe5e5"/>
                                                            <path d="M12 7v5" stroke="#e74c3c" stroke-width="2" stroke-linecap="round"/>
                                                            <circle cx="12" cy="16" r="1" fill="#e74c3c"/>
                                                        </svg>
                                                        <h5 class="mb-3 mt-3" style="color: #e74c3c;">
                                                            <i class="ri ri-warning"></i>
                                                            Offre indisponible
                                                        </h5>
                                                        <p class="mb-4" style="color: #333;">
                                                            Cette offre n'est plus disponible, vous ne pouvez plus candidater.<br>
                                                            Revenez à la page des opportunités pour découvrir d'autres offres similaires.
                                                        </p>
                                                        <a href="{{ route('opportunites.clients.index') }}" class="btn btn-danger px-4">
                                                            OK
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </ul>
                            </div><br>
                            <ul class="product-meta pb-35 mb-40">
                                <li><span>Categories</span><a href="#">Restaurant</a></li>
                                <li><span>Tags</span><a href="#">Pizza, Burger, Soup</a></li>
                                <li><span>Share</span>
                                    <a href="#" class="social facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="social plane"><i class="far fa-paper-plane"></i></a>
                                    <a href="#" class="social instagram"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInDown">
                    <div class="col-lg-12">
                        <div class="description-tabs mt-50 mb-40">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#descrptions">Product
                                        Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#reviews">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="descrptions">
                                <div class="description-content">
                                    <p>Digital marketing is not just about having a website and a few social media profiles.
                                        It encompasses various disciplines, including search engine optimization (SEO),
                                        content marketing, pay-per-click (PPC) advertising, email marketing, social media
                                        management, and more. Digital agencies specialize in these areas, staying up-to-date
                                        with the latest trends, algorithms, and technologies to ensure their clients'
                                        success.s</p>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews">
                                <div class="description-content">
                                    <p>Digital marketing is not just about having a website and a few social media profiles.
                                        It encompasses various disciplines, including search engine optimization (SEO),
                                        content marketing, pay-per-click (PPC) advertising, email marketing, social media
                                        management, and more. Digital agencies specialize in these areas, staying up-to-date
                                        with the latest trends, algorithms, and technologies to ensure their clients'
                                        success.s</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--====== End Section ======-->

    <!--====== Start Modal Section ======-->

    <!-- Modal de candidature -->
    <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background: #2c3e50; color: white;">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title text-warning" id="inscriptionModalLabel">
                        <i class="fas fa-graduation-cap me-2"></i>Inscription - {{ $opportunite->entreprise }}- {{ $opportunite->type_contrat }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Fermer"></button>
                </div>

                <form id="inscriptionForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="opportunite_id" value="{{ $opportunite->id }}">

                    <div class="modal-body">
                        <div class="row">
                            {{-- Informations de la formation --}}
                            <div class="col-md-12 mb-4">
                                <div class="alert alert-info">
                                    <h6 class="text-dark mb-2">
                                        <i class="fas fa-info-circle me-1"></i>Détails de - {{ $opportunite->titre }}
                                    </h6>
                                    <p class="text-dark mb-1">
                                        <strong>📅 Date:</strong>
                                        {{ $opportunite->created_at ? \Carbon\Carbon::parse($opportunite->created_at)->format('d/m/Y') : 'À définir' }}
                                        @if ($opportunite->date_expiration)
                                            - {{ \Carbon\Carbon::parse($opportunite->date_expiration)->format('d/m/Y') }}
                                        @endif
                                    </p>
                                    @if ($opportunite->localisation)
                                        <p class="text-dark mb-1"><strong>📍 Lieu:</strong> {{ $opportunite->localisation }}</p>
                                    @endif
                                    @if ($opportunite->salaire_min)
                                        <p class="text-dark mb-0">
                                            <strong>💰 Salaire:</strong>
                                            <span class="text-success fw-bold">{{ number_format($opportunite->salaire_min, 0, ',', ' ') }}
                                                FCFA</span> -
                                            <span class="text-success fw-bold">{{ number_format($opportunite->salaire_max, 0, ',', ' ') }}
                                                FCFA</span>    
                                        </p>
                                    @endif
                                </div>
                            </div>

                            {{-- Formulaire avec styles améliorés --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nom" class="form-label text-warning fw-bold">
                                        <i class="fas fa-user me-1"></i>Nom complet *
                                    </label>
                                    <input type="text" class="form-control" id="nom" name="nom"
                                        placeholder="Entrez votre nom complet" required
                                        style="background-color: #34495e; border: 1px solid #ffc107; color: white;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label text-warning fw-bold">
                                        <i class="fas fa-envelope me-1"></i>Adresse email *
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="votre@email.com" required
                                        style="background-color: #34495e; border: 1px solid #ffc107; color: white;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="telephone" class="form-label text-warning fw-bold">
                                        <i class="fas fa-phone me-1"></i>Numéro de téléphone
                                    </label>
                                    <input type="tel" class="form-control" id="telephone" name="telephone"
                                        placeholder="Ex: +225 07 xx xx xx xx"
                                        style="background-color: #34495e; border: 1px solid #ffc107; color: white;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="telephone" class="form-label text-warning fw-bold">
                                        <i class="fas fa-file me-1"></i>Curriculum Vitae (CV)
                                    </label>
                                    <input type="file" class="form-control" id="file" name="file"
                                        
                                        style="background-color: #34495e; border: 1px solid #ffc107; color: white;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="telephone" class="form-label text-warning fw-bold">
                                        <i class="fas fa-file me-1"></i>Lettre de motivation
                                    </label>
                                    <input type="file" class="form-control" id="lettre_motivation" name="lettre_motivation"
                                        
                                        style="background-color: #34495e; border: 1px solid #ffc107; color: white;">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="message" class="form-label text-warning fw-bold">
                                        <i class="fas fa-comment me-1"></i>Message ou questions (optionnel)
                                    </label>
                                    <textarea class="form-control" id="message" name="message"
                                        placeholder="Décrivez vos attentes, questions ou besoins spécifiques..." rows="4"
                                        style="background-color: #34495e; border: 1px solid #ffc107; color: white; resize: vertical;"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="acceptConditions" required
                                        style="border: 2px solid #ffc107;">
                                    <label class="form-check-label text-light" for="acceptConditions">
                                        <strong>J'accepte d'être contacté par Excellium Conseil</strong> concernant cette
                                        formation et je consens au traitement de mes données personnelles. *
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Annuler
                        </button>
                        <button type="submit" class="btn btn-warning btn-lg px-4">
                            <i class="fas fa-paper-plane me-1"></i>Envoyer ma demande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de succès -->
    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <h5 style="color: black">Votre candidature a bien été envoyée !</h5>
                    <p>Un email de confirmation vous a été envoyé.</p>
                    <button type="button" class="btn btn-success mt-3" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'erreur -->
    <div class="modal fade" id="errorModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <h5 style="color: red" id="errorMsg">Une erreur est survenue, veuillez réessayer.</h5>
                    <button type="button" class="btn btn-warning mt-3" data-bs-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>
    <!--====== End Modal Section ======-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('inscriptionForm').addEventListener('submit', function(e) {
                e.preventDefault();

                let form = this;
                let formData = new FormData(form);

                fetch('{{ route('candidature.postuler') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        // Fermer la modale d'inscription
                        bootstrap.Modal.getInstance(document.getElementById('inscriptionModal')).hide();
                        // Afficher la modale de succès
                        var modalSuccess = new bootstrap.Modal(document.getElementById('successModal'));
                        modalSuccess.show();
                        form.reset();
                    } else {
                        // Si Laravel retourne des erreurs de validation
                        if (data.errors) {
                            let msg = '';
                            for (const field in data.errors) {
                                msg += data.errors[field].join('<br>');
                            }
                            document.getElementById('errorMsg').innerHTML = msg;
                        } else {
                            document.getElementById('errorMsg').textContent = data.message || "Une erreur est survenue, veuillez réessayer.";
                        }
                        var modalError = new bootstrap.Modal(document.getElementById('errorModal'));
                        modalError.show();
                    }
                })
                .catch(() => {
                    document.getElementById('errorMsg').textContent = "Erreur serveur, veuillez réessayer.";
                    var modalError = new bootstrap.Modal(document.getElementById('errorModal'));
                    modalError.show();
                });
            });
        });
        
    </script>

@endsection
