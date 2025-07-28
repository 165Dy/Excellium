@extends('layouts.master')
@section('welcome')
    <!--====== Start Header Section ======-->

    <section class="hero-section">

        <div class="hero-wrapper-two bg_cover" style="background-image: url(assets/images/hero/hero-bg-1.png);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="hero-content mb-50 wow fadeInLeft">
                            <h1>@lang('extracted.excellium_conseils')</h1>
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
                                    <button class="theme-btn style-one">@lang('extracted.inscrivez_vous')</button>
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
                        <h2>@lang('extracted.pourquoi_choisir_excellium_conseils')</h2>
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
                                        <li><i class="far fa-check"></i>@lang('extracted.votre_reussite_est_notre_priorite')</li>
                                        <li><i class="far fa-check"></i>@lang('extracted.des_conseils_adaptes_a_chaque_etape_de_votre_developpement')</li>
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
                                        <li><i class="far fa-check"></i>@lang('extracted.anticiper_les_defis_de_demain')</li>
                                        <li><i class="far fa-check"></i>@lang('extracted.vous_accompagner_vers_un_avenir_meilleur')</li>
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
            <span class="text" style="color: white">@lang('extracted.contactez_nous')</span>
            <span class="text" style="color: white">@lang('extracted.07_07_67_29_57')</span>
            <span class="text"></span>
            <span class="text" style="color: white">@lang('extracted.07_07_67_29_57')</span>
            <span class="text" style="color: white">@lang('extracted.contactez_nous')</span>
            <span class="text" style="color: white">@lang('extracted.07_07_67_29_57')</span>
            <span class="text" style="color: white">@lang('extracted.contactez_nous')</span>
            <span class="text" style="color: white">@lang('extracted.07_07_67_29_57')</span>
            <span class="text" style="color: white">@lang('extracted.contactez_nous')</span>
        </div>
    </section><!--====== End Slider text Section ======-->
    <br>
    <!--====== Start Case Section ======-->
    <section class="case-section pt-130 pb-110" style="margin-bottom:-100px">
        <div class="container">
            <div class="row justify-content-center" style="margin-top:-100px;">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-50 wow fadeInDown">
                        <h2>@lang('extracted.nos_services')</h2>
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
                                            <span><a href="{{ route('Compta_Fiscale') }}">@lang('extracted.tenue_de_comptabilite_declarations_fiscales_et_optimisation_fiscale')</a></span>
                                            <h4 class="title"><a href="{{ route('Compta_Fiscale') }}">Assistance comptable
                                                    et fiscale
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
                                            <span><a href="{{ route('audit&Conseil') }}">@lang('extracted.analyse_financiere_gestion_des_risques_et_amelioration_des_performances')</a></span>
                                            <h4 class="title"><a
                                                    href="{{ route('audit&Conseil') }}">@lang('extracted.audit_et_conseil')</a>
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
                                            <span><a
                                                    href="{{ route('Ressources_humaines') }}">@lang('extracted.mise_en_relation_avec_des_talents_qualifies_pour_renforcer_vos_equipes')</a></span>
                                            <h4 class="title"><a
                                                    href="{{ route('Ressources_humaines') }}">@lang('extracted.recrutement_et_placement')</a>
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
                                            <span><a href="{{ route('Gestion_Paie') }}"> Externalisation de la gestion
                                                    salariale pour garantir
                                                    conformité et efficacité.</a></span>
                                            <h4 class="title"><a
                                                    href="{{ route('Gestion_Paie') }}">@lang('extracted.gestion_de_la_paie')</a>
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
                                            <span><a href="{{ route('Financement') }}">@lang('extracted.accompagnement_dans_lobtention_de_credits_et_subventions')</a></span>
                                            <h4 class="title"><a href="{{ route('Financement') }}">Recherche de
                                                    financement </a>
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
                        <h2>@lang('extracted.nos_formations')</h2>
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
                        <h2>@lang('extracted.nos_opportunites')</h2><br>
                        <p class="mb-20" style="font-size: 1.1rem">
                            Découvrez nos offres d'emploi et de stage sélectionnées pour vous !
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
                                        <li><a href="{{ route('opportunites.clients.index') }}">@lang('extracted.marketing')</a>
                                        </li>
                                    </ul>
                                    <div class="post-meta">

                                    </div>
                                    <h4 class="title"><a
                                            href="{{ route('opportunites.clients.index') }}">@lang('extracted.chargee_de_communication_digitale')</a></h4>
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
                                        <li><a href="{{ route('opportunites.clients.index') }}">@lang('extracted.audit')</a>
                                        </li>
                                    </ul>
                                    <div class="post-meta">

                                    </div>
                                    <h4 class="title"><a
                                            href="{{ route('opportunites.clients.index') }}">@lang('extracted.consultante_audit_financier')</a></h4>
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
                                        <li><a href="{{ route('opportunites.clients.index') }}">@lang('extracted.comptabilite')</a>
                                        </li>
                                    </ul>
                                    <div class="post-meta">

                                    </div>
                                    <h4 class="title"><a
                                            href="{{ route('opportunites.clients.index') }}">@lang('extracted.comptable_generale')</a></h4>
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
                                        <li><a href="{{ route('opportunites.clients.index') }}">@lang('extracted.informatique')</a>
                                        </li>
                                    </ul>
                                    <div class="post-meta">
                                    </div>
                                    <h4 class="title"><a
                                            href="{{ route('opportunites.clients.index') }}">@lang('extracted.developpeur_web_fullstack')</a></h4>
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
                            <span class="sub-title">@lang('extracted.temoignages')</span>
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
                                <p>
                                    "Grâce à l'accompagnement d'Excellium Conseils, notre service comptable a pu optimiser
                                    ses processus et gagner en efficacité. Leur expertise et leur disponibilité ont fait la
                                    différence dans la gestion de notre entreprise."
                                </p>
                                <div class="author-thumb-title style-one">
                                    <div class="author-thumb">
                                        <img src="{{ asset('assets/images/T_3.jpg') }}" alt="Author Image">
                                        <div class="quote"><i class="fas fa-quote-right"></i></div>
                                    </div>
                                    <div class="author-info">
                                        <h4>@lang('extracted.fatou_kone')</h4>
                                        <span class="position">@lang('extracted.comptable')</span>
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
                                <p>
                                    "L'équipe RH a bénéficié de conseils personnalisés pour la gestion de la paie et des
                                    ressources humaines. Nous recommandons Excellium Conseils pour leur professionnalisme et
                                    leur approche humaine."
                                </p>
                                <div class="author-thumb-title style-one">
                                    <div class="author-thumb">
                                        <img src="{{ asset('assets/images/T_4.jpg') }}" alt="Author Image">
                                        <div class="quote"><i class="fas fa-quote-right"></i></div>
                                    </div>
                                    <div class="author-info">
                                        <h4>@lang('extracted.jean_kouadio')</h4>
                                        <span class="position">@lang('extracted.responsable_rh')</span>
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
                                <p>
                                    "Nous avons sollicité Excellium Conseils pour un audit financier. Leur analyse détaillée
                                    et leurs recommandations concrètes nous ont permis d'améliorer notre rentabilité et de
                                    sécuriser nos opérations."
                                </p>
                                <div class="author-thumb-title style-one">
                                    <div class="author-thumb">
                                        <img src="{{ asset('assets/images/T_1.png') }}" alt="Author Image">
                                        <div class="quote"><i class="fas fa-quote-right"></i></div>
                                    </div>
                                    <div class="author-info">
                                        <h4>@lang('extracted.marie_diallo')</h4>
                                        <span class="position">@lang('extracted.directrice_financiere')</span>
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
                            <label for="nom" class="form-label" style="color: #222;">@lang('extracted.nom')</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                placeholder="Votre nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label" style="color: #222;">@lang('extracted.prenom')</label>
                            <input type="text" class="form-control" id="prenom" name="prenom"
                                placeholder="Votre prénom" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label" style="color: #222;">@lang('extracted.telephone')</label>
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
                        <button type="submit" class="btn btn-primary">@lang('extracted.valider_mon_inscription')</button>
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
                    <h5 style="color: black">@lang('extracted.compte_cree_avec_succes')</h5>
                    <br>
                    <button type="button" id="successRedirect" class="btn btn-success mt-3"
                        data-bs-dismiss="modal">@lang('extracted.choisir_un_service')</button>
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
                        style="font-weight:bold; border-radius:8px;" data-bs-dismiss="modal">@lang('extracted.fermer')</button>
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
                    <h5 style="color:rgb(245, 21, 21); font-weight:600;">@lang('extracted.erreur_cet_email_est_deja_enregistre')</h5>
                    <button type="button" class="btn btn-warning mt-4 px-5 py-2"
                        style="font-weight:bold; border-radius:8px;" data-bs-dismiss="modal">@lang('extracted.fermer')</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Choix des produits améliorée -->
    <div class="modal fade" id="choixProduitModal" tabindex="-1" aria-labelledby="choixProduitModalLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 18px;">
                <form id="choixProduitForm">
                    <div class="modal-header border-0" style="background: #FFD22F; border-radius: 18px 18px 0 0;">
                        <img src="{{ asset('assets/images/logo_new.jpg') }}" alt="Logo"
                            style="height: 60px; margin-right: 16px;">
                        <div>
                            <h5 class="modal-title" id="choixProduitModalLabel" style="color: #222; font-weight: bold;">
                                Bienvenue dans notre menu produits</h5>
                            <p style="margin:0; color:#444; font-size:15px;">@lang('extracted.veuillez_selectionner_les_produits_qui_vous_interessent')</p>
                        </div>
                    </div>
                    <div class="modal-body py-4">
                        <div id="produit-alert" class="alert alert-danger" style="display:none; font-size:15px;">
                            Veuillez sélectionner au moins un produit pour continuer.
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="selectAllProduits">
                            <label class="form-check-label fw-bold" for="selectAllProduits">@lang('extracted.tout_selectionner')</label>
                        </div>
                        @php
                            $count = $produits->count();
                            $chunkSize = $count > 0 ? ceil($count / 2) : 1; // au moins 1
                            $chunks = array_chunk($produits->all(), $chunkSize);
                        @endphp

                        <div id="produits-list" class="row">
                            <!-- Exemple de checkboxes produits, à adapter dynamiquement si besoin -->
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input produit-checkbox" type="checkbox" name="produits[]"
                                        value="1" id="produit1">
                                    <label class="form-check-label" for="produit1">@lang('extracted.produit_1')</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input produit-checkbox" type="checkbox" name="produits[]"
                                        value="2" id="produit2">
                                    <label class="form-check-label" for="produit2">@lang('extracted.produit_2')</label>
                                </div>
                                <hr>
                                <!-- Ajoute d'autres produits ici -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input produit-checkbox" type="checkbox" name="produits[]"
                                        value="3" id="produit3">
                                    <label class="form-check-label" for="produit3">@lang('extracted.produit_3')</label>
                                </div>
                                <hr>
                                <div class="form-check mb-3">
                                    <input class="form-check-input produit-checkbox" type="checkbox" name="produits[]"
                                        value="4" id="produit4">
                                    <label class="form-check-label" for="produit4">@lang('extracted.produit_4')</label>
                                </div>
                                <hr>
                                <!-- Ajoute d'autres produits ici -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" class="btn btn-primary">@lang('extracted.envoyer_mes_choix')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de succès produits -->
    <div class="modal fade" id="produituccessModal" tabindex="-1" aria-labelledby="produituccessModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
                        <path fill="#498830"
                            d="M4 12a8 8 0 1 1 16 0a8 8 0 0 1-16 0m8-10C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5.457 7.457l-1.414-1.414L11 13.086l-2.793-2.793l-1.414 1.414L11 15.914z" />
                    </svg><br>
                    <h5 style="color: black">@lang('extracted.vos_choix_ont_bien_ete_enregistres')<br>@lang('extracted.un_email_de_bienvenue_vous_a_ete_envoye')</h5>
                    <br>
                    <button type="button" class="btn btn-success mt-3"
                        data-bs-dismiss="modal">@lang('extracted.fermer')</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'erreur produits -->
    <div class="modal fade" id="serviceErrorModal" tabindex="-1" aria-labelledby="serviceErrorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24">
                        <path fill="#df291c"
                            d="M4 20v-6a8 8 0 1 1 16 0v6h1v2H3v-2zm2 0h12v-6a6 6 0 0 0-12 0zm5-18h2v3h-2zm8.778 2.808l1.414 1.414l-2.12 2.121l-1.415-1.414zM2.808 6.222l1.414-1.414l2.121 2.12L4.93 8.344zM7 14a5 5 0 0 1 5-5v2a3 3 0 0 0-3 3z" />
                    </svg><br>
                    <h5 style="color:black" id="serviceErrorMsg">@lang('extracted.une_erreur_est_survenue_veuillez_reessayer')</h5>
                    <button type="button" class="btn btn-warning mt-3"
                        data-bs-dismiss="modal">@lang('extracted.fermer')</button>
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
                                    'choixProduitModal'));
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

            // Gestion du bouton "Tout sélectionner" pour les produits
            document.getElementById('selectAllProduits').addEventListener('change', function() {
                const checked = this.checked;
                document.querySelectorAll('.produit-checkbox').forEach(cb => cb.checked = checked);
            });

            // Soumission du choix des produits
            document.getElementById('choixProduitForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const checkedProduits = Array.from(document.querySelectorAll('.produit-checkbox:checked'))
                    .map(cb => parseInt(cb.value));
                const email = document.getElementById('modal_email').value;

                if (checkedProduits.length === 0) {
                    document.getElementById('produit-alert').style.display = 'block';
                    return;
                }

                fetch('/choix-produit', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            email,
                            produits: checkedProduits
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Ferme la modale de choix de produit
                            bootstrap.Modal.getInstance(document.getElementById('choixProduitModal'))
                                .hide();
                            // Affiche la modale de succès
                            var modalSuccess = new bootstrap.Modal(document.getElementById(
                                'produituccessModal'));
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
            document.getElementById('choixProduitModal').addEventListener('keydown', function(e) {
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

        #choixProduitModal .modal-content {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
            border: 2px solid #FFD22F;
        }

        #choixProduitModal .modal-header {
            border-bottom: 1px solid #eee;
        }

        #choixProduitModal .modal-footer {
            border-top: 1px solid #eee;
            background: #fafafa;
            border-radius: 0 0 18px 18px;
        }

        #choixProduitModal .form-check-label {
            font-size: 16px;
            color: #222;
        }

        #choixProduitModal hr {
            margin: 0.5rem 0;
            border-top: 1px dashed #FFD22F;
        }

        @media (max-width: 767px) {
            #choixProduitModal .modal-dialog {
                max-width: 98vw;
            }

            #choixProduitModal .modal-content {
                padding: 0 5px;
            }

            #choixProduitModal .modal-header img {
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

        /* Limite la hauteur et ajoute un effet de texte tronqué avec "..." pour les témoignages */
        .testimonial-content p {
            max-width: 100%;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            /* Limite à 4 lignes, ajuste selon besoin */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 90px;
            /* Garde une hauteur uniforme même si le texte est court */
        }

        .author-info h4 {

            max-width: 100%;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            /* Limite à 4 lignes, ajuste selon besoin */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    
@endsection
