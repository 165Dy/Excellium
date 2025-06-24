@extends('layouts.master')
@section('welcome')
    <!--====== Start Header Section ======-->


    <section class="hero-section">

        <div class="hero-wrapper-two bg_cover" style="background-image: url(assets/images/hero/hero-bg-1.png);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="hero-content mb-50 wow fadeInLeft">
                            <h1>Excellium Conseils</h1>
                            <p>
                                Bienvenue chez Excellium Conseils, votre partenaire stratégique
                                en gestion financière et comptable. Nous accompagnons les entrepreneurs,
                                les entreprises et les professionnels dans l'optimisation de leurs finances
                                grâce à des solutions sur mesure. Notre mission : vous aider à prendre les
                                meilleures décisions pour assurer la croissance et la pérennité de votre activité.
                            </p>
                            <form class="newsletter-form mb-60">
                                <div class="form-group">
                                    <label><i class="far fa-envelope" aria-hidden="true"></i></label>
                                    <input type="email" placeholder="Entrer une adresse mail" name="email">
                                    <button class="theme-btn style-one">Inscrivez-vous</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="hero-image mb-50 wow fadeInRight">
                            <img src="assets/images/excellium_photo_3.jfif" alt="Hero Image"
                                style="border-radius:10px 10px ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center mb-60 wow fadeInDown">
                        <h2>Pourquoi choisir Excellium Conseils ?</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-5">
                    <div class="section-content-box mb-50 wow fadeInLeft">
                        <p class="mb-30">
                            Chez Excellium Conseils, nous mettons tout en œuvre pour vous offrir un accompagnement de
                            qualité, adapté à vos besoins spécifiques. Voici 4 raisons de nous faire confiance :
                        </p>
                        <div class="section-nav-tab mb-30">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#mission">
                                        Notre mission
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#vision">
                                        Notre vision
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="mission">
                                <div class="content-box">
                                    <p class="mb-20">
                                        Notre mission est d'accompagner chaque client dans la réussite de ses projets grâce
                                        à des solutions innovantes et personnalisées. Nous croyons que chaque entreprise
                                        mérite un accompagnement sur mesure pour atteindre ses objectifs.
                                    </p>
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Votre réussite est notre priorité</li>
                                        <li><i class="far fa-check"></i>Des conseils adaptés à chaque étape de votre
                                            développement</li>
                                    </ul>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="vision">
                                <div class="content-box">
                                    <p class="mb-20">
                                        Notre vision est de devenir le partenaire incontournable des entreprises en matière
                                        de gestion, de conseil et d'innovation. Nous aspirons à bâtir un avenir prospère
                                        avec nos clients, fondé sur la confiance et l'excellence.
                                    </p>
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Anticiper les défis de demain</li>
                                        <li><i class="far fa-check"></i>Vous accompagner vers un avenir meilleur</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="choose-image mb-50 wow fadeInRight">
                        <img src="assets/images/excellium_photo_1.jfif" alt="choose image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Start Why-choose Section ======-->
    {{-- <section class="why-choose-us pt-130 pb-90"> --}}
    <!--====== Start Slider text Section ======-->
    <section class="headline-text primary-bg pt-55 pb-55">
        <div class="animate-text">
            <span class="text" style="color: white">Contactez-nous</span>
            <span class="text" style="color: white">07 07 67 29 57</span>
            <span class="text"></span>
            <span class="text" style="color: white">07 07 67 29 57</span>
            <span class="text" style="color: white">Contactez-nous</span>
            <span class="text" style="color: white">07 07 67 29 57</span>
            <span class="text" style="color: white">Contactez-nous</span>
            <span class="text" style="color: white">07 07 67 29 57</span>
            <span class="text" style="color: white">Contactez-nous</span>
        </div>
    </section><!--====== End Slider text Section ======-->
    <br>
    <!--====== Start Case Section ======-->
    <section class="case-section pt-130 pb-110" style="margin-bottom:-100px">
        <div class="container">
            <div class="row justify-content-center" style="margin-top:-100px;">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-50 wow fadeInDown">
                        <h2>Nos Services</h2>
                    </div>
                </div>
            </div>
            <div class="zency-isotope wow fadeInDown">
                <div class="row isotope-masonry-grid">
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/compta.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="{{ route('Compta_Fiscale') }}">Tenue de comptabilité, déclarations fiscales et
                                                    optimisation fiscale.</a></span>
                                            <h4 class="title"><a href="{{ route('Compta_Fiscale') }}">Assistance comptable et fiscale
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/img_1.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="{{ route('audit&Conseil') }}">Analyse financière, gestion des risques et amélioration
                                                    des performances.</a></span>
                                            <h4 class="title"><a href="{{ route('audit&Conseil') }}">Audit et conseil</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/recru.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="{{ route('Ressources_humaines') }}">Mise en relation avec des talents qualifiés pour
                                                    renforcer vos équipes.</a></span>
                                            <h4 class="title"><a href="{{ route('Ressources_humaines') }}">Recrutement et placement</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/paie.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="{{ route('Gestion_Paie') }}"> Externalisation de la gestion salariale pour garantir
                                                    conformité et efficacité.</a></span>
                                            <h4 class="title"><a href="{{ route('Gestion_Paie') }}">Gestion de la paie</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 isotope-filter-item">
                        <div class="case-item style-one mb-30">
                            <div class="case-image">
                                <img src="assets/images/finance.jpg" alt="Case Image">
                                <div class="hover-content">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <span><a href="{{ route('Financement') }}">Accompagnement dans l'obtention de crédits et
                                                    subventions.</a></span>
                                            <h4 class="title"><a href="{{ route('Financement') }}">Recherche de financement </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Case Section ======-->
    <!--====== Start Testimonial Section ======-->

    <section class="case-section pt-130 pb-110" style="margin-bottom:-100px">
        <div class="container">
            <div class="row justify-content-center" style="margin-top:-100px;">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-50 wow fadeInDown">
                        <h2>Nos Formations</h2>
                    </div>
                    <p class="mb-20">
                        Nous proposons des formations en ligne et en présentiel, adaptées à vos besoins et à votre rythme.
                        Notre objectif est de vous accompagner dans le développement de vos compétences grâce à des
                        programmes innovants, interactifs et conçus pour répondre aux exigences du marché actuel.
                    </p>
                </div>
                <div class="zency-isotope wow fadeInDown" style="text-align:center;">
                    <video width="100%" height="500" controls autoplay loop muted
                        poster="assets/images/formation_poster.jpg" class="case-img"
                        style="max-width:900px; border-radius:10px; display:block; margin:0 auto;">
                        <source src="{{ asset('assets/images/10.mp4') }}" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de vidéos.
                    </video>

                    <a href="{{ route('Formations.index') }}" class="btn btn-lg btn-primary mt-4"
                        style="background: #FFD22F; color: #222; border: none; font-size: 1.3rem; padding: 18px 40px; border-radius: 12px; font-weight: bold; box-shadow: 0 4px 18px rgba(0,0,0,0.08); transition: background 0.2s;">
                        <i class="fas fa-graduation-cap" style="margin-right:10px"></i>
                        Aller au menu formation
                    </a>

                </div>
            </div>
    </section><!--====== End Case Section ======-->

    <!--====== Start Case Section ======-->
    <section class="blog-section pt-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=== Section Title ===-->
                    <div class="section-title mb-35 wow fadeInDown text-center">
                        <h2>Nos Opportunités</h2><br>
                        <p class="mb-20" style="font-size: 1.1rem">
                            Découvrez nos offres d’emploi et de stage sélectionnées pour vous !
                            Excellium Conseils vous connecte aux meilleures opportunités du marché, dans des secteurs
                            variés.
                            Pour postuler, déposez votre CV directement sur notre plateforme dédiée en cliquant sur le
                            bouton ci-dessous.
                            Donnez un nouvel élan à votre carrière avec Excellium Conseils !
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Exemple d'opportunité 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-one mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="assets/images/15.jpg" alt="Développement">
                            <div class="hover-content">
                                <div class="post-content">
                                    <ul class="post-categories">
                                        <li><a href="#">Marketing</a></li>
                                    </ul>
                                    <div class="post-meta">
                                        <a href="{{ route('opportunites.clients.index') }}" class="post-date">28 Mai
                                            2023</a>
                                    </div>
                                    <h4 class="title"><a href="#">Chargé(e) de Communication Digitale</a></h4>
                                </div>
                            </div>
                        </div>
                    </div> <br>
                    <div class="blog-post-item style-one mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="assets/images/17.jpg" alt="Développement">
                            <div class="hover-content">
                                <div class="post-content">
                                    <ul class="post-categories">
                                        <li><a href="#">Audit</a></li>
                                    </ul>
                                    <div class="post-meta">
                                        <a href="{{ route('opportunites.clients.index') }}" class="post-date">15 Mai
                                            2025</a>
                                    </div>
                                    <h4 class="title"><a href="{{ route('opportunites.clients.index') }}">Consultant(e)
                                            Audit Financier</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Exemple d'opportunité 2 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-one mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="assets/images/3.jpg" alt="Informatique">
                            <div class="hover-content">
                                <div class="post-content">
                                    <ul class="post-categories">
                                        <li><a href="#">Informatique</a></li>
                                    </ul>
                                    <div class="post-meta">
                                        <a href="{{ route('opportunites.clients.index') }}" class="post-date">28 Mai
                                            2023</a>
                                    </div>
                                    <h4 class="title"><a href="{{ route('opportunites.clients.index') }}">Technicien
                                            Support IT</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Exemple d'opportunité 3 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-one mb-35 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="assets/images/2.jpg" alt="Marketing">
                            <div class="hover-content">
                                <div class="post-content">
                                    <ul class="post-categories">
                                        <li><a href="#">Informatique</a></li>
                                    </ul>
                                    <div class="post-meta">
                                        <a href="{{ route('opportunites.clients.index') }}" class="post-date">28 Mai
                                            2023</a>
                                    </div>
                                    <h4 class="title"><a href="{{ route('opportunites.clients.index') }}">Développeur Web
                                            Fullstack</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="read-button mb-30 text-center">
                        <a href="{{ route('opportunites.clients.index') }}" class="read-more"
                            style="background: #FFD22F; color: #222; border: none; font-size: 1.3rem; border-radius: 12px; font-weight: bold; box-shadow: 0 4px 18px rgba(0,0,0,0.08); transition: background 0.2s; padding: 14px 36px;">
                            <i class="fas fa-eye" style="margin-right:10px"></i>
                            Voir toutes les opportunités
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Blog Section ======-->


    <section class="testimonial-section secondary-dark-bg pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="seciton-content-box mb-40 wow fadeInLeft">
                        <div class="section-title mb-20">
                            <span class="sub-title">Témoignages</span>
                            <h2>Nos clients parlent de nous ! </h2>
                        </div>
                        <p>
                            Découvrez les retours d'expérience de ceux
                            qui nous font confiance et comment Excellium Conseils
                            les a aidés à optimiser leur gestion financière et à atteindre leurs objectifs.
                        </p>
                        <div class="testimonial-arrows mt-50"></div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="testimonial-slider-one wow fadeInRight">
                        <div class="testimonial-item style-two mb-40">
                            <div class="testimonial-content">
                                <ul class="ratings">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <p>"There're many variation of this a passages Ipsum available but the majority have
                                    suffered alteration a some form by injected humour randomised from this words."</p>
                                <div class="author-thumb-title style-one">
                                    <div class="author-thumb">
                                        <img src="assets/images/testimoinal/author-1.jpg" alt="Author Image">
                                        <div class="quote"><i class="fas fa-quote-right"></i></div>
                                    </div>
                                    <div class="author-info">
                                        <h4>David Patel</h4>
                                        <span class="position">Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item style-two mb-40">
                            <div class="testimonial-content">
                                <ul class="ratings">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <p>"There're many variation of this a passages Ipsum available but the majority have
                                    suffered alteration a some form by injected humour randomised from this words."</p>
                                <div class="author-thumb-title style-one">
                                    <div class="author-thumb">
                                        <img src="assets/images/testimoinal/author-2.jpg" alt="Author Image">
                                        <div class="quote"><i class="fas fa-quote-right"></i></div>
                                    </div>
                                    <div class="author-info">
                                        <h4>David Patel</h4>
                                        <span class="position">Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item style-two mb-40">
                            <div class="testimonial-content">
                                <ul class="ratings">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <p>"There're many variation of this a passages Ipsum available but the majority have
                                    suffered alteration a some form by injected humour randomised from this words."</p>
                                <div class="author-thumb-title style-one">
                                    <div class="author-thumb">
                                        <img src="assets/images/testimoinal/author-2.jpg" alt="Author Image">
                                        <div class="quote"><i class="fas fa-quote-right"></i></div>
                                    </div>
                                    <div class="author-info">
                                        <h4>David Patel</h4>
                                        <span class="position">Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Testimonial Section ======-->

    <!--====== End Blog Section ======-->

    <!-- Modal d'inscription étape 2 -->
    <div class="modal fade" id="inscriptionModal" tabindex="-1" aria-labelledby="inscriptionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 18px;">
                <form id="inscriptionForm">
                    <div class="modal-header border-0" style="background: #FFD22F; border-radius: 18px 18px 0 0;">
                        <h5 class="modal-title" id="inscriptionModalLabel" style="color: #222; font-weight: bold;">
                            Bienvenue !</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body py-4">
                        <p style="color:#444; font-size:15px; text-align:center; margin-bottom:25px;">
                            Veuillez entrer vos informations personnelles pour la suite de votre inscription.
                        </p>
                        <input type="hidden" name="email" id="modal_email">
                        <div class="mb-3">
                            <label for="nom" class="form-label" style="color: #222;">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                placeholder="Votre nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label" style="color: #222;">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom"
                                placeholder="Votre prénom" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label" style="color: #222;">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone"
                                placeholder="ex: 0749095585" maxlength="10" pattern="\d{10}" required>
                            <div id="tel-error" style="color:red; display:none;">
                                <p style="font-size: 13px">
                                    Le numéro doit contenir exactement 10 chiffres.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end"
                        style="border-top: 1px solid #eee; background: #fafafa; border-radius: 0 0 18px 18px;">
                        <button type="submit" class="btn btn-primary">Valider mon inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation succès -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
                        <path fill="#498830"
                            d="M4 12a8 8 0 1 1 16 0a8 8 0 0 1-16 0m8-10C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5.457 7.457l-1.414-1.414L11 13.086l-2.793-2.793l-1.414 1.414L11 15.914z" />
                    </svg><br>
                    <h5 style="color: black">Compte créé avec succès !</h5>
                    <br>
                    <button type="button" id="successRedirect" class="btn btn-success mt-3"
                        data-bs-dismiss="modal">Choisir un service</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal d'alerte email requis -->
    <div class="modal fade" id="alertEmailModal" tabindex="-1" aria-labelledby="alertEmailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center"
                style="border-radius: 18px; box-shadow: 0 8px 32px rgba(223,41,28,0.18); border: 2px solid #FFD22F;">
                <div class="modal-body py-5">
                    <!-- SVG animé : cercle qui pulse -->
                    <svg width="100" height="100" viewBox="0 0 100 100" style="margin-bottom: 10px;">
                        <circle cx="50" cy="50" r="40" fill="#ffd22f">
                            <animate attributeName="r" values="40;45;40" dur="1s" repeatCount="indefinite" />
                            <animate attributeName="opacity" values="1;0.7;1" dur="1s" repeatCount="indefinite" />
                        </circle>
                        <text x="50" y="58" text-anchor="middle" font-size="40" fill="#df291c" font-weight="bold"
                            font-family="Arial">!</text>
                    </svg>
                    <h5 style="color:#222; font-weight:600;">Veuillez entrer une adresse email valide avant de continuer
                    </h5>
                    <button type="button" class="btn btn-warning mt-4 px-5 py-2"
                        style="font-weight:bold; border-radius:8px;" data-bs-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'alerte email déjà existant -->
    <div class="modal fade" id="emailExistsModal" tabindex="-1" aria-labelledby="emailExistsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center"
                style="border-radius: 18px; box-shadow: 0 8px 32px rgba(245,21,21,0.18); border: 2px solid #FFD22F;">
                <div class="modal-body py-5">
                    <!-- SVG animé : enveloppe qui "saute" -->
                    <svg width="100" height="80" viewBox="0 0 100 80" style="margin-bottom: 10px;">
                        <rect x="10" y="30" width="80" height="40" rx="8" ry="8" fill="gold"
                            stroke="orange" stroke-width="4">
                            <animate attributeName="y" values="30;25;30" dur="0.8s" repeatCount="indefinite" />
                        </rect>
                        <polyline points="10,30 50,60 90,30" fill="none" stroke="orange" stroke-width="4">
                            <animate attributeName="points" values="10,30 50,60 90,30;10,25 50,55 90,25;10,30 50,60 90,30"
                                dur="0.8s" repeatCount="indefinite" />
                        </polyline>
                    </svg>
                    <h5 style="color:rgb(245, 21, 21); font-weight:600;">Erreur... Cet email est déjà enregistré.</h5>
                    <button type="button" class="btn btn-warning mt-4 px-5 py-2"
                        style="font-weight:bold; border-radius:8px;" data-bs-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Choix des services améliorée -->
    <div class="modal fade" id="choixServiceModal" tabindex="-1" aria-labelledby="choixServiceModalLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 18px;">
                <form id="choixServiceForm">
                    <div class="modal-header border-0" style="background: #FFD22F; border-radius: 18px 18px 0 0;">
                        <img src="{{ asset('assets/images/logo_new.jpg') }}" alt="Logo"
                            style="height: 60px; margin-right: 16px;">
                        <div>
                            <h5 class="modal-title" id="choixServiceModalLabel" style="color: #222; font-weight: bold;">
                                Bienvenue dans notre menu services</h5>
                            <p style="margin:0; color:#444; font-size:15px;">Veuillez sélectionner les services qui vous
                                intéressent.</p>
                        </div>
                        <!-- Suppression du bouton de fermeture -->
                    </div>
                    <div class="modal-body py-4">
                        <div id="service-alert" class="alert alert-danger" style="display:none; font-size:15px;">
                            Veuillez sélectionner au moins un service pour continuer.
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="selectAllServices">
                            <label class="form-check-label fw-bold" for="selectAllServices">Tout sélectionner</label>
                        </div>
                        <div id="services-list" class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 1" id="service1">
                                    <label class="form-check-label" for="service1">Formation et Développement des
                                        compétences</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 2" id="service2">
                                    <label class="form-check-label" for="service2">Assistance Comptable et Fiscale</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 3" id="service3">
                                    <label class="form-check-label" for="service3">Création, modification et Gestion
                                        d'Entreprise</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 4" id="service4">
                                    <label class="form-check-label" for="service4">Audit et Conseil Financier</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 5" id="service5">
                                    <label class="form-check-label" for="service5">Gestion de la Paie et des Ressources
                                        Humaines</label>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 6" id="service6">
                                    <label class="form-check-label" for="service6">Recrutement et Placement de Personnel
                                        Qualifié</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 7" id="service7">
                                    <label class="form-check-label" for="service7">Conseil en Recherche de Financement et
                                        en Investissement</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 8" id="service8">
                                    <label class="form-check-label" for="service8">Commerce Générale</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 9" id="service9">
                                    <label class="form-check-label" for="service9">Import-Export</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 10" id="service10">
                                    <label class="form-check-label" for="service10">Achat, Location et Vente de Biens
                                        Mobiliers et Immobiliers</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input service-checkbox" type="checkbox" name="services[]"
                                        value="Service 11" id="service11">
                                    <label class="form-check-label" for="service11">Prestations de Services Divers</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" class="btn btn-primary">Envoyer mes choix</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de succès services -->
    <div class="modal fade" id="serviceSuccessModal" tabindex="-1" aria-labelledby="serviceSuccessModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
                        <path fill="#498830"
                            d="M4 12a8 8 0 1 1 16 0a8 8 0 0 1-16 0m8-10C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5.457 7.457l-1.414-1.414L11 13.086l-2.793-2.793l-1.414 1.414L11 15.914z" />
                    </svg><br>
                    <h5 style="color: black">Vos choix ont bien été enregistrés !<br>Un email de bienvenue vous a été
                        envoyé.</h5>
                    <br>
                    <button type="button" class="btn btn-success mt-3" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'erreur services -->
    <div class="modal fade" id="serviceErrorModal" tabindex="-1" aria-labelledby="serviceErrorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
                        <path fill="#df291c"
                            d="M4 20v-6a8 8 0 1 1 16 0v6h1v2H3v-2zm2 0h12v-6a6 6 0 0 0-12 0zm5-18h2v3h-2zm8.778 2.808l1.414 1.414l-2.12 2.121l-1.415-1.414zM2.808 6.222l1.414-1.414l2.121 2.12L4.93 8.344zM7 14a5 5 0 0 1 5-5v2a3 3 0 0 0-3 3z" />
                    </svg><br>
                    <h5 style="color:black" id="serviceErrorMsg">Une erreur est survenue, veuillez réessayer.</h5>
                    <button type="button" class="btn btn-warning mt-3" data-bs-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour la création du compte et la confirmation du succès -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intercepte le submit de la newsletter
            document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.email.value.trim();
                // Vérification simple de l'email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!email || !emailRegex.test(email)) {
                    var alertModal = new bootstrap.Modal(document.getElementById('alertEmailModal'));
                    alertModal.show();
                    return;
                }
                // On place l'email dans la modale et l'affiche
                document.getElementById('modal_email').value = email;
                var modal = new bootstrap.Modal(document.getElementById('inscriptionModal'));
                modal.show();
            });

            // Soumission du formulaire de la modale d'inscription
            document.getElementById('inscriptionForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                fetch('{{ route('inscription.ajax') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Ferme modale inscription, ouvre succès
                            bootstrap.Modal.getInstance(document.getElementById('inscriptionModal'))
                                .hide();
                            var modalSuccess = new bootstrap.Modal(document.getElementById(
                                'successModal'));
                            modalSuccess.show();

                            // Ouvre la modal choix service après clic sur "Choisir un service"
                            document.getElementById('successRedirect').onclick = function() {
                                bootstrap.Modal.getInstance(document.getElementById('successModal'))
                                    .hide();
                                var choixModal = new bootstrap.Modal(document.getElementById(
                                    'choixServiceModal'));
                                choixModal.show();
                            };
                        } else if (data.email_exists) {
                            // Ferme la modale inscription et affiche la modale email déjà existant
                            bootstrap.Modal.getInstance(document.getElementById('inscriptionModal'))
                                .hide();
                            var existsModal = new bootstrap.Modal(document.getElementById(
                                'emailExistsModal'));
                            existsModal.show();
                        } else {
                            alert(data.message || "Erreur inconnue");
                        }
                    })
                    .catch(() => alert("Erreur serveur, veuillez réessayer."));
            });

            // Validation en temps réel du téléphone
            const telInput = document.getElementById('telephone');
            const telError = document.getElementById('tel-error');

            telInput.addEventListener('input', function() {
                // Retire tout sauf les chiffres
                this.value = this.value.replace(/\D/g, '');
                if (this.value.length !== 10) {
                    telError.style.display = 'block';
                } else {
                    telError.style.display = 'none';
                }
            });

            // Empêche la soumission si le numéro n'est pas valide
            document.getElementById('inscriptionForm').addEventListener('submit', function(e) {
                if (telInput.value.length !== 10) {
                    telError.style.display = 'block';
                    telInput.focus();
                    e.preventDefault();
                    return false;
                }
            });

            // Gestion du bouton "Tout cocher"
            document.getElementById('selectAllServices').addEventListener('change', function() {
                const checked = this.checked;
                document.querySelectorAll('.service-checkbox').forEach(cb => cb.checked = checked);
            });

            // Soumission du choix des services
            document.getElementById('choixServiceForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const checkedServices = Array.from(document.querySelectorAll('.service-checkbox:checked'))
                    .map(cb => cb.nextElementSibling.textContent.trim());
                const email = document.getElementById('modal_email').value;

                if (checkedServices.length === 0) {
                    document.getElementById('service-alert').style.display = 'block';
                    return;
                }

                fetch('/inscription/services', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            email,
                            services: checkedServices
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Ferme la modale de choix de service
                            bootstrap.Modal.getInstance(document.getElementById('choixServiceModal'))
                                .hide();
                            // Affiche la modale de succès
                            var modalSuccess = new bootstrap.Modal(document.getElementById(
                                'serviceSuccessModal'));
                            modalSuccess.show();
                        } else {
                            // Affiche la modale d'erreur avec le message retourné
                            document.getElementById('serviceErrorMsg').textContent = data.message ||
                                "Une erreur est survenue, veuillez réessayer.";
                            var modalError = new bootstrap.Modal(document.getElementById(
                                'serviceErrorModal'));
                            modalError.show();
                        }
                    })
                    .catch(() => {
                        // Affiche la modale d'erreur en cas d'erreur réseau/serveur
                        document.getElementById('serviceErrorMsg').textContent =
                            "Erreur serveur, veuillez réessayer.";
                        var modalError = new bootstrap.Modal(document.getElementById(
                            'serviceErrorModal'));
                        modalError.show();
                    });
            });

            // Sécurité supplémentaire : empêche la fermeture de la modal par touche ESC
            document.getElementById('choixServiceModal').addEventListener('keydown', function(e) {
                if (e.key === "Escape") {
                    e.preventDefault();
                }
            });
        });
    </script>

    <style>
        .form-check-label,
        .modal-title {
            color: black;
        }

        .pulse {
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }

            100% {
                opacity: 1;
            }
        }

        #choixServiceModal .modal-content {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
            border: 2px solid #FFD22F;
        }

        #choixServiceModal .modal-header {
            border-bottom: 1px solid #eee;
        }

        #choixServiceModal .modal-footer {
            border-top: 1px solid #eee;
            background: #fafafa;
            border-radius: 0 0 18px 18px;
        }

        #choixServiceModal .form-check-label {
            font-size: 16px;
            color: #222;
        }

        #choixServiceModal hr {
            margin: 0.5rem 0;
            border-top: 1px dashed #FFD22F;
        }

        @media (max-width: 767px) {
            #choixServiceModal .modal-dialog {
                max-width: 98vw;
            }

            #choixServiceModal .modal-content {
                padding: 0 5px;
            }

            #choixServiceModal .modal-header img {
                height: 40px;
            }
        }

        #inscriptionModal .modal-content {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
            border: 2px solid #FFD22F;
        }

        #inscriptionModal .modal-header {
            border-bottom: 1px solid #eee;
            background: #FFD22F;
            border-radius: 18px 18px 0 0;
        }

        #inscriptionModal .modal-title {
            font-size: 1.5rem;
            color: #222;
            font-weight: bold;
        }

        #inscriptionModal .form-label {
            color: #222;
            font-weight: 500;
        }

        #inscriptionModal .form-control {
            border-radius: 8px;
            border: 1px solid #FFD22F;
        }

        #inscriptionModal .modal-footer {
            border-top: 1px solid #eee;
            background: #fafafa;
            border-radius: 0 0 18px 18px;
        }

        @media (max-width: 767px) {
            #inscriptionModal .modal-dialog {
                max-width: 98vw;
            }

            #inscriptionModal .modal-content {
                padding: 0 5px;
            }
        }
    </style>
@endsection
