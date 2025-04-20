@extends('layouts.master')
{{-- @section('Fiscalite')
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
                            <h2 class="page-title">Formations en Fiscalité</h2>
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
                            <img src="{{ asset('assets/images/img_large12.jpg') }}" alt="Service image">
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

@section('Fiscalite')
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
                            <h2 class="page-title">Formations en Fiscalité</h2>
                            <p>Maîtrisez les enjeux fiscaux et optimisez la gestion de vos finances grâce à nos formations
                                spécialisées en fiscalité. Que vous soyez professionnel ou particulier, nous vous offrons
                                les clés pour comprendre et appliquer les règles fiscales actuelles.</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Formations en Fiscalité</li>
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
                            <img src="{{ asset('assets/images/img_large12.jpg') }}" alt="Service image">
                        </div>
                        <div class="content wow fadeInDown">
                            <h3>Présentation de la Formation</h3>
                            <p>Notre formation en fiscalité vous guide à travers les principales règles fiscales en vigueur,
                                en vous offrant une compréhension approfondie des impôts, des déductions fiscales, des
                                déclarations fiscales et des stratégies d'optimisation fiscales.</p>
                            <ul class="check-list style-one mb-30">
                                <li><i class="far fa-check"></i>Comprenez les règles fiscales locales et internationales
                                </li>
                                <li><i class="far fa-check"></i>Apprenez à optimiser vos impôts et réduire les risques
                                    fiscaux</li>
                                <li><i class="far fa-check"></i>Suivi personnalisé et conseils pratiques</li>
                            </ul>
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Apprenez à gérer votre fiscalité</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Optimisez vos stratégies fiscales</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="iconic-box style-six mb-30">
                                        <div class="icon">
                                            <i class="far fa-bullhorn"></i>
                                        </div>
                                        <div class="content">
                                            <h4>Maîtrisez les aspects juridiques fiscaux</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Cette formation pratique vous permet de développer des compétences solides en matière de
                                fiscalité, que vous soyez un professionnel en quête de perfectionnement ou un particulier
                                soucieux de bien gérer ses obligations fiscales. Grâce à nos experts, vous recevrez un
                                enseignement adapté à votre niveau et à vos besoins.</p>
                        </div>
                        <div class="faq-wrapper wow fadeInDown">
                            <h3>Questions Fréquentes</h3>
                            <div class="accordion" id="accordionOne">
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse1" aria-expanded="false">
                                            Quels sont les avantages de cette formation en fiscalité ?
                                        </h6>
                                    </div>
                                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Cette formation vous permettra d’acquérir une compréhension solide des lois
                                                fiscales et de leur application pratique, vous offrant ainsi la possibilité
                                                de mieux gérer vos finances personnelles ou professionnelles.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                            aria-expanded="true">
                                            Comment cette formation peut-elle m’aider à économiser des impôts ?
                                        </h6>
                                    </div>
                                    <div id="collapse2" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Nous vous enseignons les différentes stratégies d'optimisation fiscale pour
                                                réduire vos impôts tout en restant dans les limites légales. Cela comprend
                                                les déductions fiscales, les crédits d’impôt, et les régimes fiscaux
                                                avantageux.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse3" aria-expanded="false">
                                            Est-ce que la formation est adaptée aux débutants ?
                                        </h6>
                                    </div>
                                    <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Oui, notre formation est conçue pour s'adapter à tous les niveaux. Que vous
                                                soyez un novice en fiscalité ou que vous ayez une certaine expérience, nos
                                                modules vous guideront à chaque étape de manière claire et structurée.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card mb-15">
                                    <div class="accordion-header">
                                        <h6 class="accordion-title collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapse4" aria-expanded="false">
                                            Comment s'inscrire à la formation ?
                                        </h6>
                                    </div>
                                    <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
                                        <div class="accordion-content">
                                            <p>Vous pouvez vous inscrire directement en ligne via notre plateforme, en
                                                remplissant le formulaire d'inscription et en sélectionnant la formation qui
                                                correspond à vos besoins.</p>
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
                            <h4 class="widget-title">Liste des Formations</h4>
                            <ul class="widget-nav">
                                <li><a href="#">Fiscalité des Entreprises<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Fiscalité Personnelle<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Optimisation des Impôts<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Déclarations Fiscales<i class="far fa-arrow-right"></i></a></li>
                                <li><a href="#">Droits de Succession<i class="far fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget sidebar-download-widget mb-40 wow fadeInDown">
                            <h4 class="widget-title">Brochure</h4>
                            <div class="download-content">
                                <a href="#"><i class="far fa-file-pdf"></i>Brochure des Formations <span><i
                                            class="far fa-download"></i></span></a>
                                <a href="#"><i class="far fa-file-alt"></i>Informations Complètes <span><i
                                            class="far fa-download"></i></span></a>
                            </div>
                        </div>
                        <div class="sidebar-widget sidebar-contact-widget mb-10 wow fadeInDown">
                            <div class="contact-content">
                                <h3>Un Projet en Tête ?</h3>
                                <p>Nous sommes là pour vous accompagner dans la réalisation de vos projets fiscaux</p>
                                <a href="#" class="theme-btn style-one">Contactez-nous dès maintenant</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Service Details Section ======-->
@endsection
