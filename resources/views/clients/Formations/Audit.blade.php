@extends('layouts.master')
{{-- @section('Audit')
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
                            <h2 class="page-title">Formation en Audit</h2>
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
                            <img src="{{ asset('assets/images/img_large4.jpg') }}" alt="Service image">
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

@section('Audit')
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
                        <!--=== Contenu de la bannière de page ===-->
                        <div class="page-banner-content text-center text-white">
                            <h2 class="page-title">Formation en Audit</h2>
                            <p>Nous vous accompagnons dans l'amélioration de vos processus d'audit et la gestion des risques
                                au sein de votre organisation.</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Articles</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== Fin de la section de la page ======-->

    <!--====== Début de la section détails du service ======-->
    <section class="service-details-section secondary-dark-bg pt-140 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="service-details-wrapper mb-25">
                        <div class="service-image mb-30 wow fadeInUp">
                            <img src="{{ asset('assets/images/img_large4.jpg') }}" alt="Image du service">
                        </div>
                        <div class="content wow fadeInDown">
                            <h3>Présentation du service</h3>
                            <p>Nous vous aidons à mettre en place des solutions adaptées à vos besoins en matière d’audit,
                                tout en respectant vos contraintes budgétaires. Notre équipe d'experts prend une approche
                                systématique pour résoudre vos défis spécifiques.</p>
                            <ul class="check-list style-one mb-30">
                                <li><i class="far fa-check"></i>Notre processus de planification d'entreprise inclut une
                                    analyse approfondie, la définition d'objectifs et une étude de marché.</li>
                                <li><i class="far fa-check"></i>Nous assurons un suivi post-engagement pour garantir le
                                    succès durable de vos projets.</li>
                                <li><i class="far fa-check"></i>Nous excellerons dans l’analyse financière pour vous aider à
                                    prendre des décisions éclairées.</li>
                            </ul>
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Adoptez le marketing pour l'ère numérique</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Transformez vos idées en réalité</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Solutions créatives et technologiques</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Nous proposons une gamme de services incluant la consultation en affaires, le développement
                                de stratégies, des solutions marketing et bien plus. Nous utilisons notre expertise pour
                                optimiser vos opérations, identifier des opportunités de croissance et mettre en place des
                                stratégies efficaces.</p>
                        </div>
                        <div class="faq-wrapper wow fadeInDown">
                            <h3>Questions fréquemment posées</h3>
                            <div class="accordion" id="accordionOne">
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse1" aria-expanded="false">
                                            Quels services proposez-vous ?
                                        </h6>
                                    </div>
                                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Nous priorisons la sécurité des données et la confidentialité, en respectant
                                                des protocoles stricts pour protéger vos informations sensibles. Nous
                                                offrons une consultation initiale gratuite pour discuter de vos besoins.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                            aria-expanded="true">
                                            Comment pouvez-vous aider ma société à se développer ?
                                        </h6>
                                    </div>
                                    <div id="collapse2" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Nous analysons les besoins de votre entreprise et vous proposons des
                                                stratégies de croissance pour vous aider à atteindre un développement
                                                durable et un succès à long terme.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse3" aria-expanded="false">
                                            Pouvez-vous partager des exemples de réussites de projets ?
                                        </h6>
                                    </div>
                                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Nous pouvons vous fournir des études de cas et des témoignages pour démontrer
                                                comment nos solutions ont permis à nos clients d’atteindre leurs objectifs.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse4" aria-expanded="false">
                                            Comment déterminez-vous les stratégies ?
                                        </h6>
                                    </div>
                                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Nous utilisons une approche basée sur les données, en analysant le marché,
                                                vos concurrents et vos objectifs commerciaux pour créer une stratégie sur
                                                mesure.</p>
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
                                    <input type="email" placeholder="Recherchez ici..." name="email">
                                    <button class="search-btn"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-widget sidebar-nav-widget mb-35 wow fadeInDown">
                            <h4 class="widget-title">Liste des services</h4>
                            <ul class="widget-nav">
                                <li><a href="#">Stratégie d'entreprise<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Stratégie marketing<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Design UI/UX<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Développement de sites web<i class="far fa-arrow-right"></i></a>
                                </li>
                                <li><a href="#">Design de sites web<i class="far fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget sidebar-download-widget mb-40 wow fadeInDown">
                            <h4 class="widget-title">Brochure</h4>
                            <div class="download-content">
                                <a href="#"><i class="far fa-file-pdf"></i>Services de l'entreprise <span><i
                                            class="far fa-download"></i></span></a>
                                <a href="#"><i class="far fa-file-alt"></i>À propos des services <span><i
                                            class="far fa-download"></i></span></a>
                            </div>
                        </div>
                        <div class="sidebar-widget sidebar-contact-widget mb-10 wow fadeInDown">
                            <div class="contact-content">
                                <h3>Avez-vous un projet en tête ?</h3>
                                <p>Nous sommes disponibles 24/7 pour vous fournir des solutions adaptées à vos besoins
                                    commerciaux.</p>
                                <a href="#" class="theme-btn style-one">Contactez-nous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== Fin de la section détails du service ======-->
@endsection
