@extends('layouts.master')
{{-- @section('R_humaines')
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
                            <h2 class="page-title">Ressources Humaines</h2>
                            <p>Lorem voluptatem accusantium dolorem quis its tium totamrem aperiam eaque ipsaquae inventore
                            </p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Ressources Humaines</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->

    <!--====== Start Case Details Section ======-->
    <section class="case-details-section secondary-dark-bg pt-140 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-details-wrapper wow fadeInDown">
                        <div class="case-img">
                            <img src="{{ asset('assets/images/img_large6.jpg') }}" alt="case image">
                        </div>
                        <div class="case-content">
                            <div class="project-info mb-55">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Project Title</span>
                                            <h4>Website Design</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Client</span>
                                            <h4>Michle Stiphen</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Category</span>
                                            <h4>UI/UX Design</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Price</span>
                                            <h4>$234.99 USD</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Elevate Business with Our Cutting-Edge Digital Marketing</h3>
                            <p>We work creatively within your budget constraints to deliver impactful solutions without
                                compromising quality. Our team of experts takes a systematic approach to address your
                                specific challenges, drawing from our collective experience success metrics vary by project.
                                In the rapidly evolving digital landscape, businesses are increasingly relying on the
                                expertise of digital agencies to navigate the complexities of online presence and
                                engagement. A digital agency serves as a strategic partner, providing a comprehensive suite
                                of services aimed at optimizing a company's digital footprint.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Yes, we provide ongoing engagement to ensure the
                                            sustained success</li>
                                        <li><i class="far fa-check"></i>We excel in financial analysis, helping you make
                                            informed decisions</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Yes, we provide ongoing engagement to ensure the
                                            sustained success</li>
                                        <li><i class="far fa-check"></i>We excel in financial analysis, helping you make
                                            informed decisions</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="counter-wrapper mt-40 mb-65">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="counter-item mb-25 wow fadeInDown">
                                            <div class="icon">
                                                <i class="icon-chart-2"></i>
                                            </div>
                                            <div class="content">
                                                <h2><span class="count">20</span>K</h2>
                                                <p>Satisfied Client’</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="counter-item mb-25 wow fadeInDown">
                                            <div class="icon">
                                                <i class="icon-group"></i>
                                            </div>
                                            <div class="content">
                                                <h2><span class="count">40</span>K</h2>
                                                <p>Satisfied Client’</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="counter-item mb-25 wow fadeInDown">
                                            <div class="icon">
                                                <i class="icon-target-2"></i>
                                            </div>
                                            <div class="content">
                                                <h2><span class="count">56</span>K+</h2>
                                                <p>Satisfied Client’</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <div class="block-image mb-50 wow fadeInLeft">
                                        <img src="{{ asset('assets/images/img_6.jpg') }}" alt="case image">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="content-box mb-50 wow fadeInRight">
                                        <h3>The Triple C Force: Creativity, Content, Customers</h3>
                                        <p>We work creatively with your budget constraints to deliver impactful solutions
                                            without compromising quality. Our team of experts takes systematic approach to
                                            address your specific challenges, drawing from our collective experience success
                                            metrics vary by project.</p>
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>Yes, we provide ongoing engagement to ensure the
                                                sustained success</li>
                                            <li><i class="far fa-check"></i>We excel in financial analysis, helping you make
                                                informed decisions</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-navigation wow fadeInDown">
                        <div class="navigation-item prev-post">
                            <a href="#"><i class="far fa-arrow-left"></i>Previous</a>
                        </div>
                        <div class="navigation-item next-post">
                            <a href="#"><i class="far fa-arrow-right"></i>Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Case Details Section ======-->
@endsection --}}



@section('R_humaines')
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
                            <h2 class="page-title">Ressources Humaines</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer molestie lectus eu magna
                                gravida, sed feugiat neque ullamcorper.</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Ressources Humaines</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->

    <!--====== Start Case Details Section ======-->
    <section class="case-details-section secondary-dark-bg pt-140 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-details-wrapper wow fadeInDown">
                        <div class="case-img">
                            <img src="{{ asset('assets/images/img_large6.jpg') }}" alt="case image">
                        </div>
                        <div class="case-content">
                            <div class="project-info mb-55">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Titre du projet</span>
                                            <h4>Gestion des Ressources Humaines</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Client</span>
                                            <h4>Sophie Dufresne</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Catégorie</span>
                                            <h4>Consultation RH</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Prix</span>
                                            <h4>$3000 USD</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Optimisez la Gestion des Ressources Humaines avec nos Solutions</h3>
                            <p> Nos experts en gestion des ressources humaines vous
                                aident à mieux structurer et organiser votre équipe, tout en favorisant un environnement de
                                travail sain et performant. Avec des stratégies de recrutement adaptées et des solutions de
                                gestion des talents, nous vous accompagnons pour atteindre vos objectifs RH.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Optimisation du processus de recrutement</li>
                                        <li><i class="far fa-check"></i>Formation continue pour vos employés</li>
                                        <li><i class="far fa-check"></i>Création d'une culture d'entreprise positive</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Gestion efficace des talents et compétences</li>
                                        <li><i class="far fa-check"></i>Accompagnement personnalisé dans le développement
                                            des équipes</li>
                                        <li><i class="far fa-check"></i>Évaluation continue des performances des
                                            collaborateurs</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="counter-wrapper mt-40 mb-65">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="counter-item mb-25 wow fadeInDown">
                                            <div class="icon">
                                                <i class="icon-chart-2"></i>
                                            </div>
                                            <div class="content">
                                                <h2><span class="count">50</span>K</h2>
                                                <p>Recrutements réussis</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="counter-item mb-25 wow fadeInDown">
                                            <div class="icon">
                                                <i class="icon-group"></i>
                                            </div>
                                            <div class="content">
                                                <h2><span class="count">100</span>K+</h2>
                                                <p>Employés formés</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="counter-item mb-25 wow fadeInDown">
                                            <div class="icon">
                                                <i class="icon-target-2"></i>
                                            </div>
                                            <div class="content">
                                                <h2><span class="count">200</span>+</h2>
                                                <p>Clients satisfaits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <div class="block-image mb-50 wow fadeInLeft">
                                        <img src="{{ asset('assets/images/img_6.jpg') }}" alt="case image">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="content-box mb-50 wow fadeInRight">
                                        <h3>Stratégies RH Personnalisées pour Chaque Entreprise</h3>
                                        <p>Nous proposons des stratégies RH sur mesure qui répondent aux besoins spécifiques
                                            de chaque entreprise. Que ce soit pour la gestion des talents, l'amélioration de
                                            la culture d'entreprise, ou l'optimisation des processus de recrutement, nous
                                            mettons en œuvre des solutions adaptées à votre organisation.</p>
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>Accompagnement dans le changement
                                                organisationnel</li>
                                            <li><i class="far fa-check"></i>Évaluation des besoins RH spécifiques</li>
                                            <li><i class="far fa-check"></i>Développement d'une stratégie RH durable</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-navigation wow fadeInDown">
                        <div class="navigation-item prev-post">
                            <a href="#"><i class="far fa-arrow-left"></i>Précédent</a>
                        </div>
                        <div class="navigation-item next-post">
                            <a href="#"><i class="far fa-arrow-right"></i>Suivant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Case Details Section ======-->
@endsection
