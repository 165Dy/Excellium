@extends('layouts.master')

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
                            <p>
                                Optimisez la gestion de vos ressources humaines grâce à notre expertise. 
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
        <div class="container" style="margin-top: -80px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-details-wrapper wow fadeInDown">
                        <div class="case-img">
                            <img src="{{ asset('assets/images/8.jpg') }}" alt="case image" style="height:520px; width:100%;">
                        </div> <br>
                        <div class="case-content">
                            <h3>la Gestion des Ressources Humaines avec nos Solutions</h3>
                            <p>Nous vous
                                accompagnons dans le recrutement, la formation et le développement de vos équipes pour
                                garantir la performance et le bien-être au sein de votre entreprise. Faites confiance à nos
                                solutions RH sur mesure pour répondre à tous vos besoins. Nos experts en gestion des ressources humaines vous
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
                                                <h2><span class="count">65</span>+</h2>
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
                                                <h2><span class="count">100</span>+</h2>
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
                                        <img src="{{ asset('assets/images/6.jpg') }}" alt="case image">
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
                   
                </div>
            </div>
        </div>
    </section><!--====== End Case Details Section ======-->
@endsection
