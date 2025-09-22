@extends('layouts.master')
@section('showEmploi')
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
                            <h1 class="page-title">@lang('extracted.details')</h1>
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
                                    <a href="#" class="img-popup">
                                        <img src="{{ asset('assets/images/emploi.jpeg') }}" alt="Product1">
                                    </a>
                                </div>
                            </div>
                            <hr>

                            @php
                                // Offres similaires par type de contrat, hors offre courante
                                $memeEmplois = \App\Models\Emploi::where('type_contrat', $emploi->type_contrat)
                                    ->where('id', '!=', $emploi->id)
                                    ->latest()
                                    ->limit(3)
                                    ->get();
                            @endphp

                            <div class="categ">
                                <h3>@lang('extracted.offres_similaires')</h3>
                            </div>
                            <br>

                            @if ($memeEmplois->isEmpty())
                                <div class="section-content-box pr-xl-400 mb-40 wow fadeInLeft" style="width:500px">
                                    <div class="iconic-box style-two mb-80" style="width: 500px">
                                        <h5 style="color: rgb(243, 35, 35)">@lang('extracted.aucune_autre_offre_disponible_avec_ce_type_de_contrat')</h5>
                                    </div>
                                </div>
                            @else
                                <div class="product-thumb-slider">
                                    @foreach ($memeEmplois as $memeEmploi)
                                        <div class="product-img">
                                            <img src="{{ asset('assets/images/products/thumb-1.jpg') }}" alt="Product">
                                            <p
                                                style="max-width: 100%; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $memeEmploi->description }}
                                            </p>
                                            <p><i class="far fa-calendar-alt"></i> {{ $memeEmploi->date_expiration }}
                                            </p>
                                            <a
                                                href="{{ route('emplois.clients.show', $memeEmploi->id) }}">{{ $memeEmploi->entreprise }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <!--=== Product Info ===-->
                        <div class="product-info mb-50 wow fadeInRight">
                            <span class="stock">Expire le : {{ $emploi->date_expiration }}</span>
                            <h4>{{ $emploi->titre }}</h4>

                            <ul class="ratings">
                                <li><i class="icon-map"></i> {{ $emploi->localisation }}</li>
                                {{-- <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li> --}}

                            </ul>
                            <hr>
                            <p>{{ $emploi->description }}</p>
                            <hr>
                            <div class="description-content">
                                <ul>
                                    <ul class="check-list style-one">
                                        <li><i class="far fa-check"></i>Entreprise :
                                            {{ $emploi->entreprise }} </li>
                                        <li><i class="far fa-check"></i>Type de Contrat :
                                            {{ $emploi->type_contrat }}
                                        </li>

                                        <li><i class="far fa-check"></i>Salaire :
                                            <span
                                                class="text-white fw-bold">{{ number_format($emploi->salaire_min, 0, ',', ' ') }}
                                                FCFA</span> -
                                            <span
                                                class="text-wite fw-bold">{{ number_format($emploi->salaire_max, 0, ',', ' ') }}
                                                FCFA</span>
                                            </p>
                                        </li>
                                        <li><i class="far fa-check"></i>Experience :
                                            {{ $emploi->experience_requise }}
                                        </li>
                                        <li><i class="far fa-check"></i>Niveau :
                                            {{ $emploi->niveau_etude }} </li>
                                        <li><i class="far fa-check"></i>Poste Disponible :
                                            {{ $emploi->nombre_postes }} </li>
                                        <li><i class="far fa-check"></i>Contact :
                                            {{ $emploi->contact_telephone }}
                                        </li>

                                    </ul><br>

                                    {{-- filepath: c:\Users\home\Desktop\Projet_Excellium\Excellium\resources\views\clients\Emplois\show.blade.php --}}
                                    @php
                                        use Carbon\Carbon;
                                        $estExpiree =
                                            $emploi->date_expiration &&
                                            Carbon::parse($emploi->date_expiration)->isPast();
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
                                                <i class="icon-briefcase"> Oups !!! Cette offre n'est
                                                    plus disponible </i>
                                            </div>
                                        </button>
                                    @endif


                                </ul>
                            </div><br>

                        </div>
                    </div>
                </div>
                <div class="row wow fadeInDown">
                    <div class="col-lg-12">
                        <div class="description-tabs mt-50 mb-40">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#descrptions">
                                        Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#reviews">@lang('extracted.avis')</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="descrptions">
                                <div class="description-content">
                                    <p>
                                        Cette opportunité vous permet de rejoindre une entreprise dynamique et innovante,
                                        reconnue pour son engagement envers le développement professionnel de ses
                                        collaborateurs.
                                        Vous aurez l’occasion de mettre en valeur vos compétences, de relever de nouveaux
                                        défis et de contribuer activement à la réussite de l’équipe.
                                        Nous recherchons des candidats motivés, rigoureux et passionnés, prêts à s’investir
                                        dans un environnement stimulant et évolutif.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews">
                                <div class="description-content">
                                    <p>
                                        Nos anciens candidats témoignent de leur satisfaction quant à la qualité de
                                        l’accompagnement et à la diversité des opportunités proposées.
                                        Rejoignez une communauté de professionnels ambitieux et bénéficiez d’un suivi
                                        personnalisé tout au long de votre parcours avec Excellium Conseils.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--====== End Section ======-->

    <!--====== modal offre fermer ======-->
    <div class="modal fade" id="offre_fermer" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple">
            <div class="modal-content">
                <div class="modal-body p-0">
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button> --}}
                    <div class="text-center mb-4 p-4">
                        <!-- SVG Warning Icon -->
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="12" fill="#ffe5e5" />
                            <path d="M12 7v5" stroke="#e74c3c" stroke-width="2" stroke-linecap="round" />
                            <circle cx="12" cy="16" r="1" fill="#e74c3c" />
                        </svg>
                        <h5 class="mb-3 mt-3" style="color: #e74c3c;">
                            <i class="ri ri-warning"></i>
                            Offre indisponible
                        </h5>
                        <p class="mb-4" style="color: #333;">
                            Cette offre n'est plus disponible, vous ne pouvez plus
                            candidater.<br>
                            Revenez à la page des opportunités pour découvrir d'autres
                            offres similaires.
                        </p>
                        <a href="{{ route('emplois.clients.index') }}" class="btn btn-danger px-4">
                            OK
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de candidature -->
    <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background: #2c3e50; color: white;">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title text-warning" id="inscriptionModalLabel">
                        <i class="fas fa-graduation-cap me-2"></i>Inscription - {{ $emploi->entreprise }}-
                        {{ $emploi->type_contrat }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Fermer"></button>
                </div>

                <form id="inscriptionForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="emploi_id" value="{{ $emploi->id }}">

                    <div class="modal-body">
                        <div class="row">
                            {{-- Informations de la formation --}}
                            <div class="col-md-12 mb-4">
                                <div class="alert alert-info">
                                    <h6 class="text-dark mb-2">
                                        <i class="fas fa-info-circle me-1"></i>Détails de - {{ $emploi->titre }}
                                    </h6>
                                    <p class="text-dark mb-1">
                                        <strong>@lang('extracted.date')</strong>
                                        {{ $emploi->created_at ? \Carbon\Carbon::parse($emploi->created_at)->format('d/m/Y') : 'À définir' }}
                                        @if ($emploi->date_expiration)
                                            - {{ \Carbon\Carbon::parse($emploi->date_expiration)->format('d/m/Y') }}
                                        @endif
                                    </p>
                                    @if ($emploi->localisation)
                                        <p class="text-dark mb-1"><strong>@lang('extracted.lieu')</strong>
                                            {{ $emploi->localisation }}</p>
                                    @endif
                                    @if ($emploi->salaire_min)
                                        <p class="text-dark mb-0">
                                            <strong>@lang('extracted.salaire')</strong>
                                            <span
                                                class="text-success fw-bold">{{ number_format($emploi->salaire_min, 0, ',', ' ') }}
                                                FCFA</span> -
                                            <span
                                                class="text-success fw-bold">{{ number_format($emploi->salaire_max, 0, ',', ' ') }}
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
                                    <div id="emailError" class="text-danger mt-1" style="font-size: 0.95em;"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="telephone" class="form-label text-warning fw-bold">
                                        <i class="fas fa-phone me-1"></i>Numéro de téléphone
                                    </label>
                                    <input type="tel" class="form-control" id="telephone" name="telephone"
                                        placeholder="Ex: 0700000000"
                                        style="background-color: #34495e; border: 1px solid #ffc107; color: white;">
                                    <div id="telError" class="text-danger mt-1" style="font-size: 0.95em;"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="file" class="form-label text-warning fw-bold">
                                        <i class="fas fa-file me-1"></i>Curriculum Vitae (CV) au Format PDF*
                                    </label>
                                    <input type="file" class="form-control" id="file" name="file"
                                        style="background-color: #34495e; border: 1px solid #ffc107; color: white;">
                                    <div id="cvError" class="text-danger mt-1" style="font-size: 0.95em;"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="lettre_motivation" class="form-label text-warning fw-bold">
                                        <i class="fas fa-file me-1"></i>Lettre de motivation au Format PDF*
                                    </label>
                                    <input type="file" class="form-control" id="lettre_motivation"
                                        name="lettre_motivation"
                                        style="background-color: #34495e; border: 1px solid #ffc107; color: white;">
                                    <div id="lettreError" class="text-danger mt-1" style="font-size: 0.95em;"></div>
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
                                        <strong> <u>@lang('extracted.jaccepte_detre_contacte_par_excellium_conseil')</strong> concernant
                                        cette
                                        formation et je consens au traitement de mes données personnelles. *</u>
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

    <!-- Modal de chargement -->
    <div class="modal fade" id="loadingModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center" style="background:white; border: none; box-shadow: none;">
                <div class="modal-body" style="background:white;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <svg width="70" height="70" viewBox="0 0 50 50">
                            <circle cx="25" cy="25" r="20" fill="none" stroke="#FFD22F"
                                stroke-width="5" stroke-linecap="round" stroke-dasharray="31.4 31.4">
                                <animateTransform attributeName="transform" type="rotate" from="0 25 25" to="360 25 25"
                                    dur="1s" repeatCount="indefinite" />
                            </circle>
                        </svg>
                        <div style="color:#FFD22F; font-weight:bold; margin-top:18px; font-size:1.2rem;">
                            Traitement de votre demande...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de succès -->
    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <h5 style="color: black">@lang('extracted.votre_candidature_a_bien_ete_envoyee')</h5>
                    <p>@lang('extracted.un_email_de_confirmation_vous_a_ete_envoye')</p>
                    <button type="button" class="btn btn-success mt-3"
                        data-bs-dismiss="modal">@lang('extracted.fermer')</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'erreur -->
    <div class="modal fade" id="errorModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <h5 style="color: red" id="errorMsg">
                        Cette adresse email a déjà été utilisée pour postuler à cette offre. Veuillez en saisir une autre.
                    </h5>
                    <button type="button" class="btn btn-warning mt-3"
                        data-bs-dismiss="modal">@lang('extracted.fermer')</button>
                </div>
            </div>
        </div>
    </div>
    <!--====== End Modal Section ======-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('inscriptionForm').addEventListener('submit', function(e) {
                e.preventDefault();

                let hasError = false;

                // Email
                const email = document.getElementById('email').value;
                if (!email.endsWith('@gmail.com')) {
                    document.getElementById('emailError').textContent =
                        "L'email doit se terminer par @gmail.com";
                    hasError = true;
                } else {
                    document.getElementById('emailError').textContent = "";
                }

                // Téléphone
                const tel = document.getElementById('telephone').value.replace(/\D/g, '');
                if (tel.length !== 10) {
                    document.getElementById('telError').textContent =
                        "Le numéro de téléphone doit contenir exactement 10 chiffres.";
                    hasError = true;
                } else {
                    document.getElementById('telError').textContent = "";
                }

                // CV
                const cv = document.getElementById('file').files[0];
                if (!cv || cv.type !== "application/pdf") {
                    document.getElementById('cvError').textContent = "Le CV doit être un fichier PDF.";
                    hasError = true;
                } else {
                    document.getElementById('cvError').textContent = "";
                }

                // Lettre de motivation
                const lettre = document.getElementById('lettre_motivation').files[0];
                if (!lettre || lettre.type !== "application/pdf") {
                    document.getElementById('lettreError').textContent =
                        "La lettre de motivation doit être un fichier PDF.";
                    hasError = true;
                } else {
                    document.getElementById('lettreError').textContent = "";
                }

                if (hasError) {
                    return false;
                }

                // Afficher la modal de chargement
                var loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
                loadingModal.show();

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
                        loadingModal.hide();
                        if (data.success) {
                            bootstrap.Modal.getInstance(document.getElementById('inscriptionModal'))
                                .hide();
                            var modalSuccess = new bootstrap.Modal(document.getElementById(
                                'successModal'));
                            modalSuccess.show();
                            form.reset();
                        } else {
                            if (data.errors) {
                                let msg = '';
                                for (const field in data.errors) {
                                    msg += data.errors[field].join('<br>');
                                }
                                document.getElementById('errorMsg').innerHTML = msg;
                            } else {
                                document.getElementById('errorMsg').textContent = data.message ||
                                    "Une erreur est survenue, veuillez réessayer.";
                            }
                            var modalError = new bootstrap.Modal(document.getElementById('errorModal'));
                            modalError.show();
                        }
                    })
                    .catch(() => {
                        loadingModal.hide();
                        document.getElementById('errorMsg').textContent =
                            "Erreur serveur, veuillez réessayer.";
                        var modalError = new bootstrap.Modal(document.getElementById('errorModal'));
                        modalError.show();
                    });
            });

            // Validation en temps réel (inchangée)
            document.getElementById('email').addEventListener('input', function() {
                const email = this.value;
                const errorDiv = document.getElementById('emailError');
                if (!email.endsWith('@gmail.com')) {
                    errorDiv.textContent = "L'email doit se terminer par @gmail.com";
                } else {
                    errorDiv.textContent = "";
                }
            });

            document.getElementById('telephone').addEventListener('input', function() {
                const tel = this.value.replace(/\D/g, '');
                const errorDiv = document.getElementById('telError');
                if (tel.length !== 10) {
                    errorDiv.textContent = "Le numéro de téléphone doit contenir exactement 10 chiffres.";
                } else {
                    errorDiv.textContent = "";
                }
            });

            document.getElementById('file').addEventListener('change', function() {
                const file = this.files[0];
                const errorDiv = document.getElementById('cvError');
                if (file && file.type !== "application/pdf") {
                    errorDiv.textContent = "Le CV doit être un fichier PDF.";
                    this.value = "";
                } else {
                    errorDiv.textContent = "";
                }
            });

            document.getElementById('lettre_motivation').addEventListener('change', function() {
                const file = this.files[0];
                const errorDiv = document.getElementById('lettreError');
                if (file && file.type !== "application/pdf") {
                    errorDiv.textContent = "La lettre de motivation doit être un fichier PDF.";
                    this.value = "";
                } else {
                    errorDiv.textContent = "";
                }
            });
        });
    </script>
@endsection
