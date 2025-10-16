@extends('layouts.master')
@section('formations.show')
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shape"></span></div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h1 class="page-title">{{ $formations->titre }}</h1>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="{{ route('formations.index') }}">@lang('extracted.formations')</a></li>
                                <li class="active">{{ $formations->categorie->nom }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->
    <!--====== Start Blog Details Section ======-->
    <section class="blog-details-section secondary-dark-bg pt-130 pb-100">
        <div class="container" style="margin-top: -100px">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-wrapper">
                        <div class="blog-post mb-50 wow fadeInDown">
                            <div class="main-post">
                                {{-- Affichage du média de la formation --}}
                                @if ($formations->file_path)
                                    <div class="block-image mb-4">
                                        @if ($formations->file_type === 'image')
                                            <img src="{{ asset('storage/' . $formations->file_path) }}"
                                                alt="{{ $formations->titre }}"
                                                style="width: 100%; height: 400px; object-fit: cover; border-radius: 8px;">
                                        @elseif($formations->file_type === 'video')
                                            <video controls style="width: 100%; height: 400px; border-radius: 8px;">
                                                <source src="{{ asset('storage/' . $formations->file_path) }}"
                                                    type="video/mp4">
                                                Votre navigateur ne supporte pas la vidéo.
                                            </video>
                                        @endif
                                    </div>
                                @endif

                                {{-- Informations de la formation --}}
                                <div class="formation-meta mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="meta-item mb-3">
                                                <strong class="text-warning">@lang('extracted.date_de_debut')</strong>
                                                <span class="text-light">
                                                    {{ $formations->date_debut ? \Carbon\Carbon::parse($formations->date_debut)->format('d/m/Y') : 'À définir' }}
                                                </span>
                                            </div>
                                            @if ($formations->date_fin)
                                                <div class="meta-item mb-3">
                                                    <strong class="text-warning">@lang('extracted.date_de_fin')</strong>
                                                    <span class="text-light">
                                                        {{ \Carbon\Carbon::parse($formations->date_fin)->format('d/m/Y') }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            @if ($formations->cout)
                                                <div class="meta-item mb-3">
                                                    <strong class="text-warning">@lang('extracted.cout')</strong>
                                                    <span class="text-success fw-bold">
                                                        {{ number_format($formations->cout, 0, ',', ' ') }} FCFA
                                                    </span>
                                                </div>
                                            @endif
                                            @if ($formations->lieu)
                                                <div class="meta-item mb-3">
                                                    <strong class="text-warning">@lang('extracted.lieu')</strong>
                                                    <span class="text-light">{{ $formations->lieu }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="entry-content">
                                    {{-- Programme de la formation --}}
                                    @if ($formations->programme)
                                        <h3 class="text-warning mb-3">@lang('extracted.programme_de_la_formation')</h3>
                                        <div class="formation-programme mb-4 p-3"
                                            style="background: rgba(255,255,255,0.1); border-radius: 8px;">
                                            <p class="text-light" style="line-height: 1.8;">
                                                {!! nl2br(e($formations->programme)) !!}
                                            </p>
                                        </div>
                                    @endif

                                    {{-- Prérequis --}}
                                    @if ($formations->prerequis)
                                        <h3 class="text-warning mb-3">@lang('extracted.prerequis')</h3>
                                        <div class="formation-prerequis mb-4 p-3"
                                            style="background: rgba(255,193,7,0.1); border-left: 4px solid #ffc107; border-radius: 0 8px 8px 0;">
                                            <p class="text-light" style="line-height: 1.8;">
                                                {!! nl2br(e($formations->prerequis)) !!}
                                            </p>
                                        </div>
                                    @endif

                                    {{-- Bonus --}}
                                    @if ($formations->bonus)
                                        <h3 class="text-warning mb-3">@lang('extracted.bonus_inclus')</h3>
                                        <div class="formation-bonus mb-4 p-3"
                                            style="background: rgba(40,167,69,0.1); border-left: 4px solid #28a745; border-radius: 0 8px 8px 0;">
                                            <p class="text-light" style="line-height: 1.8;">
                                                {!! nl2br(e($formations->bonus)) !!}
                                            </p>
                                        </div>
                                    @endif

                                    <!--===  Section Contact  ===-->
                                    <div class="formation-cta text-center mt-5 p-4"
                                        style="background: linear-gradient(45deg, #ffc107, #ff8c00); border-radius: 12px;">
                                        <h4 class="text-dark mb-3">@lang('extracted.interesse_par_cette_formation')</h4>
                                        <p class="text-dark mb-3">@lang('extracted.contactez_nous_pour_plus_dinformations_ou_pour_vous_inscrire')</p>
                                        <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal"
                                            data-bs-target="#inscriptionModal">
                                            <i class="fas fa-phone me-2"></i>Nous contacter
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="entry-footer wow fadeInUp">

                                <div class="social-share">
                                    <a href="#" class="social facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social linkedin"><i class="fab fa-linkedin-in"></i></a>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widget-area">
                        <div class="sidebar-widget sidebar-search-widget mb-35 wow fadeInDown">
                            <form action="{{ route('Formations.index') }}" method="GET">
                                <div class="form-group">
                                    <input type="text" placeholder="Rechercher..." name="search"
                                        style="color:#fff">
                                    <button class="search-btn" type="submit"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <!--===  Autres formations  ===-->
                        <div class="sidebar-widget sidebar-post-widget mb-35 wow fadeInDown">
                            <h4 class="widget-title">@lang('extracted.autres_formations')<span class="line"></span></h4>
                            <ul class="recent-post-list">
                                @php
                                    $autresFormations = \App\Models\Formation::where('id', '!=', $formations->id)
                                        ->latest()
                                        ->limit(4)
                                        ->get();
                                @endphp

                                @foreach ($autresFormations as $autre)
                                    <li class="post-thumbnail-content">
                                        {{-- Affichage de l'image ou du média de la formation --}}
                                        @if ($autre->file_path && $autre->file_type === 'image')
                                            <img src="{{ asset('storage/' . $autre->file_path) }}"
                                                alt="{{ $autre->titre }}"
                                                style="width: 80px; height: 60px; object-fit: cover;">
                                        @elseif ($autre->file_path && $autre->file_type === 'video')
                                            <video width="80" height="60" style="object-fit: cover;" controls>
                                                <source src="{{ asset('storage/' . $autre->file_path) }}"
                                                    type="video/mp4">
                                                Votre navigateur ne supporte pas la lecture de vidéo.
                                            </video>
                                        @else
                                            <img src="{{ asset('assets/images/blog/post-thumb-1.jpg') }}" alt="Formation"
                                                style="width: 80px; height: 60px; object-fit: cover;">
                                        @endif

                                        <div class="post-title-date">
                                            <h6><a href="{{ route('Formations.show_public', $autre->id) }}">
                                                    {{ str($autre->titre)->limit(40) }}
                                                </a></h6>
                                            <span class="posted-on">
                                                <a href="#">
                                                    {{ $autre->date_debut ? \Carbon\Carbon::parse($autre->date_debut)->format('d M Y') : 'À définir' }}
                                                </a>
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--===  Category Widget  ===-->
                        <div class="sidebar-widget sidebar-category-widget mb-35 wow fadeInDown">
                            <h4 class="widget-title">@lang('extracted.categories')<span class="line"></span></h4>
                            <ul class="category-nav">
                                @foreach ($categories as $categorie)
                                    @php
                                        $nombreFormations = \App\Models\Formation::where(
                                            'categorie_id',
                                            $categorie->id,
                                        )->count();
                                    @endphp
                                    <li>
                                        <a href="{{ route('Formations.index', ['categorie_id' => $categorie->id]) }}">
                                            <i class="far fa-angle-right"></i>
                                            {{ $categorie->nom }}
                                            <span>({{ $nombreFormations }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar-widget sidebar-post-widget mb-35 wow fadeInDown">
                            <h4 class="widget-title">@lang('extracted.contenu_qui_pourrait_vous_interesser')<span class="line"></span>
                            </h4>
                            <ul class="recent-post-list">
                                @php
                                    // Formations de la même catégorie
                                    $formationsMemeCategorie = \App\Models\Formation::where(
                                        'categorie_id',
                                        $formations->categorie_id,
                                    )
                                        ->where('id', '!=', $formations->categorie_id)
                                        ->latest()
                                        ->limit(4)
                                        ->get();
                                @endphp

                                @if ($formationsMemeCategorie->isEmpty())

                                <h3 style="color: rgb(243, 125, 125)"> Aucune autre formation disponible pour cette categorie ..!!!</h3>
                                @else
                                    @foreach ($formationsMemeCategorie as $autrecategorie)
                                        <li class="post-thumbnail-content">
                                            {{-- Affichage de l'image ou du média de la formation --}}
                                            @if ($autrecategorie->file_path && $autrecategorie->file_type === 'image')
                                                <img src="{{ asset('storage/' . $autrecategorie->file_path) }}"
                                                    alt="{{ $autrecategorie->titre }}"
                                                    style="width: 80px; height: 60px; object-fit: cover;">
                                            @elseif ($autrecategorie->file_path && $autrecategorie->file_type === 'video')
                                                <video width="80" height="60" style="object-fit: cover;" controls>
                                                    <source src="{{ asset('storage/' . $autrecategorie->file_path) }}"
                                                        type="video/mp4">
                                                    Votre navigateur ne supporte pas la lecture de vidéo.
                                                </video>
                                            @else
                                                <img src="{{ asset('assets/images/blog/post-thumb-1.jpg') }}"
                                                    alt="Formation" style="width: 80px; height: 60px; object-fit: cover;">
                                            @endif

                                            <div class="post-title-date">
                                                <h6><a href="{{ route('Formations.show_public', $autrecategorie->id) }}">
                                                        {{ str($autrecategorie->titre)->limit(40) }}
                                                    </a></h6>
                                                <span class="posted-on">
                                                    <a href="#">
                                                        {{ $autrecategorie->date_debut ? \Carbon\Carbon::parse($autrecategorie->date_debut)->format('d M Y') : 'À définir' }}
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Blog Details Section ======-->
    <!--====== Start Footer Section ======-->

    {{-- Modale d'inscription --}}
    <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background: #2c3e50; color: white;">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title text-warning" id="inscriptionModalLabel">
                        <i class="fas fa-graduation-cap me-2"></i>Inscription - {{ $formations->titre }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Fermer"></button>
                </div>

                <form id="inscriptionForm" method="POST" action="{{ route('clients.formations.participer') }}">
                    @csrf
                    <input type="hidden" name="formation_id" value="{{ $formations->id }}">

                    <div class="modal-body">
                        <div class="row">
                            {{-- Informations de la formation --}}
                            <div class="col-md-12 mb-4">
                                <div class="alert alert-info">
                                    <h6 class="text-dark mb-2">
                                        <i class="fas fa-info-circle me-1"></i>Détails de la formation
                                    </h6>
                                    <p class="text-dark mb-1">
                                        <strong>@lang('extracted.date')</strong>
                                        {{ $formations->date_debut ? \Carbon\Carbon::parse($formations->date_debut)->format('d/m/Y') : 'À définir' }}
                                        @if ($formations->date_fin)
                                            - {{ \Carbon\Carbon::parse($formations->date_fin)->format('d/m/Y') }}
                                        @endif
                                    </p>
                                    @if ($formations->lieu)
                                        <p class="text-dark mb-1"><strong>@lang('extracted.lieu')</strong> {{ $formations->lieu }}</p>
                                    @endif
                                    @if ($formations->cout)
                                        <p class="text-dark mb-0">
                                            <strong>@lang('extracted.cout')</strong>
                                            <span
                                                class="text-success fw-bold">{{ number_format($formations->cout, 0, ',', ' ') }}
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
                                        <strong>@lang('extracted.jaccepte_detre_contacte_par_excellium_conseil')</strong> concernant cette
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

    {{-- CSS personnalisé pour améliorer l'affichage --}}
    <style>
        /* Style pour les inputs focus */
        #inscriptionModal .form-control:focus {
            background-color: #34495e !important;
            border-color: #f39c12 !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25) !important;
            color: white !important;
        }

        /* Style pour les placeholders */
        #inscriptionModal .form-control::placeholder {
            color: #bdc3c7 !important;
            opacity: 0.8;
        }

        /* Style pour la checkbox */
        #inscriptionModal .form-check-input:checked {
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
        }

        #inscriptionModal .form-check-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25) !important;
        }

        /* Animation pour les labels */
        #inscriptionModal .form-label {
            transition: all 0.3s ease;
            margin-bottom: 8px;
            display: block;
        }

        #inscriptionModal .form-control {
            transition: all 0.3s ease;
        }
    </style>

    {{-- Script pour gérer la soumission avec message personnalisé --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🎯 Initialisation formulaire inscription');

            const inscriptionForm = document.getElementById('inscriptionForm');

            if (inscriptionForm) {
                console.log('✅ Formulaire trouvé');

                inscriptionForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('📤 Soumission formulaire interceptée');

                    // Vérification SweetAlert
                    if (typeof Swal === 'undefined') {
                        console.error('❌ SweetAlert non disponible - soumission normale');
                        this.submit();
                        return;
                    }

                    const formData = new FormData(this);
                    console.log('📋 Données du formulaire:', Object.fromEntries(formData));

                    // Modal de chargement
                    Swal.fire({
                        title: 'Envoi en cours...',
                        html: `
                        <div class="d-flex flex-column align-items-center">
                            <div class="spinner-border text-warning mb-3" role="status">
                                <span class="visually-hidden">@lang('extracted.envoi')</span>
                            </div>
                            <p class="mb-0">@lang('extracted.envoi_de_votre_demande_dinscription')</p>
                        </div>
                    `,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        background: '#2c3e50',
                        color: '#ffffff'
                    });

                    // Envoi AJAX
                    fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => {
                            console.log('📥 Réponse reçue:', response.status, response.statusText);

                            // Vérifier si la réponse est OK
                            if (!response.ok) {
                                throw new Error(
                                    `Erreur HTTP: ${response.status} - ${response.statusText}`);
                            }

                            return response.json();
                        })
                        .then(data => {
                            console.log('✅ Données reçues:', data);

                            if (data.success) {
                                // Message de succès personnalisé
                                Swal.fire({
                                    icon: 'success',
                                    title: '<span class="text-success">@lang('extracted.demande_envoyee_avec_succes')</span>',
                                    html: `
                                <div class="text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-check-circle text-success" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                                    </div>
                                    <h5 class="text-dark mb-3">Merci ${data.inscription ? data.inscription.nom : formData.get('nom')} !</h5>
                                    <p class="text-dark mb-2">
                                        <strong>Votre demande d'inscription à la formation "${data.inscription ? data.inscription.formation_titre : '{{ $formations->titre }}'}" a été reçue.</strong>
                                    </p>
                                    <div class="alert alert-info mt-3">
                                        <p class="mb-2"><strong>@lang('extracted.prochaines_etapes')</strong></p>
                                        <ul class="text-start mb-0">
                                            <li>@lang('extracted.notre_equipe_va_examiner_votre_demande')</li>
                                            <li>Nous vous recontacterons dans les <strong>@lang('extracted.24_48h')</strong></li>
                                            <li>@lang('extracted.vous_recevrez_les_details_de_confirmation_par_email')</li>
                                        </ul>
                                    </div>
                                    <p class="text-muted mt-3">
                                        <small>💌 Un email de confirmation va être envoyé à <strong>${formData.get('email')}</strong></small>
                                    </p>
                                </div>
                            `,
                                    confirmButtonText: '🎯 Parfait, merci !',
                                    confirmButtonColor: '#28a745',
                                    background: '#ffffff',
                                    color: '#2c3e50',
                                    width: '600px',
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    }
                                }).then(() => {
                                    // Fermer la modale
                                    const modal = bootstrap.Modal.getInstance(document
                                        .getElementById('inscriptionModal'));
                                    if (modal) {
                                        modal.hide();
                                    }

                                    // Réinitialiser le formulaire
                                    inscriptionForm.reset();

                                    // Animation de succès sur le bouton principal
                                    const mainButton = document.querySelector(
                                        '[data-bs-target="#inscriptionModal"]');
                                    if (mainButton) {
                                        mainButton.innerHTML =
                                            '<i class="fas fa-check me-2"></i>Demande envoyée !';
                                        mainButton.classList.remove('btn-dark');
                                        mainButton.classList.add('btn-success');

                                        // Remettre le bouton normal après 5 secondes
                                        setTimeout(() => {
                                            mainButton.innerHTML =
                                                '<i class="fas fa-phone me-2"></i>Nous contacter';
                                            mainButton.classList.remove('btn-success');
                                            mainButton.classList.add('btn-dark');
                                        }, 5000);
                                    }
                                });
                            } else {
                                // Erreur de validation
                                console.warn('⚠️ Erreur de validation:', data);

                                let errorMessage = data.message || 'Erreur lors de l\'envoi';

                                if (data.errors) {
                                    errorMessage =
                                        '<div class="text-start"><strong>@lang('extracted.veuillez_corriger_les_erreurs_suivantes')</strong><ul class="mt-2">';
                                    for (const field in data.errors) {
                                        errorMessage += `<li>${data.errors[field].join(', ')}</li>`;
                                    }
                                    errorMessage += '</ul></div>';
                                }

                                Swal.fire({
                                    icon: 'error',
                                    title: '❌ Erreur de validation',
                                    html: errorMessage,
                                    confirmButtonText: '📝 Corriger les erreurs',
                                    confirmButtonColor: '#dc3545',
                                    background: '#ffffff',
                                    color: '#2c3e50'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('❌ Erreur inscription:', error);

                            Swal.fire({
                                icon: 'error',
                                title: '🚫 Erreur de connexion',
                                html: `
                            <div class="text-center">
                                <p><strong>@lang('extracted.impossible_denvoyer_votre_demande_actuellement')</strong></p>
                                <p class="text-muted">Détails de l'erreur : ${error.message}</p>
                                <p class="text-muted">@lang('extracted.veuillez_verifier_votre_connexion_internet_et_reessayer')</p>
                            </div>
                        `,
                                confirmButtonText: '🔄 Réessayer',
                                confirmButtonColor: '#dc3545',
                                background: '#ffffff',
                                color: '#2c3e50'
                            });
                        });
                });
            } else {
                console.error('❌ Formulaire d\'inscription non trouvé !');
            }
        });
    </script>
@endsection
