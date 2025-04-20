@extends('layouts.master')
{{-- @section('Gestion_entreprise')
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
                            <h2 class="page-title">Gestion d'Entreprise</h2>
                            <p>Lorem voluptatem accusantium dolorem quis its tium totamrem aperiam eaque ipsaquae inventore
                            </p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Articles</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->

    <!--====== Start Service Details Section ======-->
    <section class="service-details-section secondary-dark-bg pt-140 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="service-details-wrapper mb-25">
                        <div class="service-image mb-30 wow fadeInUp">
                            <img src="{{ asset('assets/images/img_large3.jpg') }}" alt="Service image">
                        </div>
                        <div class="content wow fadeInDown">
                            <h3>Service Overview</h3>
                            <p>We work creatively within your budget constraints to deliver impactful solutions without
                                compromising quality. Our team of experts takes a systematic approach to address your
                                specific challenges, drawing from our collective experience success metrics vary by project.
                            </p>
                            <ul class="check-list style-one mb-30">
                                <li><i class="far fa-check"></i>Our business planning process involves in-depth analysis,
                                    goal setting, market research</li>
                                <li><i class="far fa-check"></i>Yes, we provide ongoing support post-engagement to ensure
                                    the sustained success</li>
                                <li><i class="far fa-check"></i>We excel in financial analysis, helping you make informed
                                    decisions</li>
                            </ul>
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Embrace Marketing for the Digital Era</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Transform Ideas Into Reality</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Creative & Tech Media Solutions</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>We offer a range of services including business consulting, strategy development, marketing
                                solutions, and more. We leverage our expertise to optimize operations, identify growth
                                opportunities, and implement effective strategies. We tailor our services based on your
                                unique needs and goals to ensure maximum impact Our agency stands out for its innovative
                                strategies</p>
                        </div>
                        <div class="faq-wrapper wow fadeInDown">
                            <h3>Some Basic Questions</h3>
                            <div class="accordion" id="accordionOne">
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse1" aria-expanded="false">
                                            What services do you offer?
                                        </h6>
                                    </div>
                                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>We prioritize data security and confidentiality, adhering to strict protocols
                                                to safeguard your sensitive information we offer a complimentary initial
                                                consultation to discuss your requirements</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                            aria-expanded="true">
                                            How can you help my business grow?
                                        </h6>
                                    </div>
                                    <div id="collapse2" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>We prioritize data security and confidentiality, adhering to strict protocols
                                                to safeguard your sensitive information we offer a complimentary initial
                                                consultation to discuss your requirements</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse3" aria-expanded="false">
                                            Can you share project success stories?
                                        </h6>
                                    </div>
                                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>We prioritize data security and confidentiality, adhering to strict protocols
                                                to safeguard your sensitive information we offer a complimentary initial
                                                consultation to discuss your requirements</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse4" aria-expanded="false">
                                            How do you determine strategies?
                                        </h6>
                                    </div>
                                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>We prioritize data security and confidentiality, adhering to strict protocols
                                                to safeguard your sensitive information we offer a complimentary initial
                                                consultation to discuss your requirements</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="sidebar-widget-area mb-40">
                        <div class="sidebar-widget sidebar-search-widget mb-35 wow fadeInDown">
                            <form>
                                <div class="form-group">
                                    <input type="email" placeholder="Search here..." name="email">
                                    <button class="search-btn"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-widget sidebar-nav-widget mb-35 wow fadeInDown">
                            <h4 class="widget-title">Service List</h4>
                            <ul class="widget-nav">
                                <li><a href="#">Business Strategy<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Marketing Strategy<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">UI/UX Design<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Websites Development<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Websites Design<i class="far fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget sidebar-download-widget mb-40 wow fadeInDown">
                            <h4 class="widget-title">Brochure</h4>
                            <div class="download-content">
                                <a href="#"><i class="far fa-file-pdf"></i>Company Services <span><i
                                            class="far fa-download"></i></span></a>
                                <a href="#"><i class="far fa-file-alt"></i>About Services <span><i
                                            class="far fa-download"></i></span></a>
                            </div>
                        </div>
                        <div class="sidebar-widget sidebar-contact-widget mb-10 wow fadeInDown">
                            <div class="contact-content">
                                <h3>Have Any Project In Your Mind?</h3>
                                <p>We are here 24/7 Supports for your business solutions</p>
                                <a href="#" class="theme-btn style-one">Let’s Contact with Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Service Details Section ======-->
@endsection --}}

@section('Gestion_entreprise')
    <!--====== Page Banner Section ======-->
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shape"></span></div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span></div>
        <div class="shape shape-three"><span><img src="{{ asset('assets/images/shape/p-3.png') }}" alt="shape"></span>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h2 class="page-title">Gestion d'Entreprise</h2>
                            <p>Votre partenaire pour optimiser la gestion de votre entreprise et assurer sa pérennité.</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Articles</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Banner Section ======-->

    <!--====== Service Details Section ======-->
    <section class="service-details-section secondary-dark-bg pt-140 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="service-details-wrapper mb-25">
                        <div class="service-image mb-30 wow fadeInUp">
                            <img src="{{ asset('assets/images/img_large3.jpg') }}" alt="Service image">
                        </div>
                        <div class="content wow fadeInDown">
                            <h3>Service Overview</h3>
                            <p>Nous vous aidons à optimiser les processus de gestion pour garantir une performance maximale.
                                Notre équipe met en œuvre des solutions adaptées à vos objectifs spécifiques, avec une
                                approche sur mesure pour chaque défi.</p>
                            <ul class="check-list style-one mb-30">
                                <li><i class="far fa-check"></i>Analyse approfondie de la situation de votre entreprise</li>
                                <li><i class="far fa-check"></i>Soutien continu après la mise en place des stratégies</li>
                                <li><i class="far fa-check"></i>Optimisation des processus de gestion pour un meilleur
                                    rendement</li>
                            </ul>
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Embrasser la gestion moderne</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Transformer la stratégie en actions concrètes</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Solutions technologiques pour un avenir durable</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Notre expertise couvre plusieurs domaines, y compris la stratégie d'entreprise, la gestion de
                                projets, la transformation numérique, et bien plus. Nous adaptons nos services à vos besoins
                                spécifiques pour assurer une gestion efficace de votre entreprise.</p>
                        </div>
                        <!-- FAQ Section -->
                        <div class="faq-wrapper wow fadeInDown">
                            <h3>Quelques Questions Fréquentes</h3>
                            <div class="accordion" id="accordionOne">
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse1" aria-expanded="false">Quels services proposez-vous ?
                                        </h6>
                                    </div>
                                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Nous proposons des services variés pour aider à la gestion de votre
                                                entreprise, incluant des conseils stratégiques, des solutions numériques et
                                                un accompagnement sur le terrain.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                            aria-expanded="true">Comment puis-je améliorer la gestion de mon entreprise ?
                                        </h6>
                                    </div>
                                    <div id="collapse2" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Nous vous offrons un plan d'action personnalisé qui vous permettra de
                                                restructurer vos opérations, d'améliorer la communication interne et de
                                                maximiser l'efficacité de vos processus.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse3" aria-expanded="false">Avez-vous des exemples de
                                            succès ?</h6>
                                    </div>
                                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Oui, nous avons une série de projets réussis dans divers secteurs. Nous
                                                serions ravis de partager ces histoires avec vous lors de notre consultation
                                                initiale.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse4" aria-expanded="false">Comment choisissez-vous les
                                            stratégies à adopter ?</h6>
                                    </div>
                                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Nos stratégies sont basées sur une analyse détaillée des besoins de votre
                                                entreprise, de son marché et de ses objectifs à court et long terme. Nous
                                                choisissons les solutions les plus adaptées à votre situation.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Section -->
                <div class="col-xl-4">
                    <div class="sidebar-widget-area mb-40">
                        <div class="sidebar-widget sidebar-search-widget mb-35 wow fadeInDown">
                            <form>
                                <div class="form-group">
                                    <input type="email" placeholder="Recherchez ici..." name="email">
                                    <button class="search-btn"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-widget sidebar-nav-widget mb-35 wow fadeInDown">
                            <h4 class="widget-title">Liste des Services</h4>
                            <ul class="widget-nav">
                                <li><a href="#">Stratégie d'Entreprise<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Marketing Digital<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Gestion des Ressources<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Transformation Digitale<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Consultation en Gestion<i class="far fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget sidebar-download-widget mb-40 wow fadeInDown">
                            <h4 class="widget-title">Brochures</h4>
                            <div class="download-content">
                                <a href="#"><i class="far fa-file-pdf"></i>Services de l'Entreprise <span><i
                                            class="far fa-download"></i></span></a>
                                <a href="#"><i class="far fa-file-alt"></i>À propos de la Gestion <span><i
                                            class="far fa-download"></i></span></a>
                            </div>
                        </div>
                        <div class="sidebar-widget sidebar-contact-widget mb-10 wow fadeInDown">
                            <div class="contact-content">
                                <h3>Un Projet en Tête ?</h3>
                                <p>Nous sommes là pour vous aider 24/7 avec des solutions adaptées à votre entreprise.</p>
                                <a href="#" class="theme-btn style-one">Contactez-nous</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!--====== End Service Details Section ======-->
@endsection
