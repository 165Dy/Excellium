@extends('layouts.master')

@section('Audit_conseil')
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
                            <h2 class="page-title">Audit & Conseils</h2>
                            <p>Nos services d'audit et de conseil sont conçus pour aider votre entreprise à atteindre ses objectifs grâce à des stratégies personnalisées et basées sur des données concrètes. Nous mettons notre expertise à votre service pour vous guider dans vos prises de décisions stratégiques et opérationnelles.</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Audits & Conseils</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->
    <!--====== Start Page Section ======-->

    <!--====== Start Case Details Section ======-->
    <section class="case-details-section secondary-dark-bg pt-140 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-details-wrapper wow fadeInDown">
                        <div class="case-img">
                            <img src="{{ asset('assets/images/audit.jfif') }}" alt="case image">
                        </div>
                        <div class="case-content">
                            <div class="project-info mb-55">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Titre du Projet</span>
                                            <h4>Conseil en Gestion</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Client</span>
                                            <h4>Jean Dupont</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Catégorie</span>
                                            <h4>Consulting</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="content">
                                            <span class="sub-title">Prix</span>
                                            <h4>€350.00 EUR</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Optimisez vos performances grâce à nos audits spécialisés</h3>
                            <p>Nous analysons en profondeur vos processus internes et vos pratiques commerciales pour identifier des opportunités d’amélioration. Nos recommandations sont basées sur des analyses objectives et des benchmarks industriels pour vous offrir des solutions pratiques et efficaces, adaptées à votre contexte spécifique.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Audit approfondi de vos processus internes</li>
                                        <li><i class="far fa-check"></i>Conseils pratiques pour améliorer votre rentabilité</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Suivi personnalisé pour une mise en œuvre réussie</li>
                                        <li><i class="far fa-check"></i>Accompagnement stratégique pour vos choix futurs</li>
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
                                                <p>Clients Satisfaits</p>
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
                                                <p>Projets Accomplis</p>
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
                                                <p>Réussites Globales</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <div class="block-image mb-50 wow fadeInLeft">
                                        <img src="{{ asset('assets/images/img_6.jpg') }}" alt="case image" style="border-radius: 10px 10px">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="content-box mb-50 wow fadeInRight">
                                        <h3>Notre expertise pour résoudre vos défis complexes</h3>
                                        <p>Nous proposons des solutions sur mesure pour résoudre vos problématiques complexes. Que vous ayez besoin de réorganiser vos processus ou de prendre des décisions stratégiques, notre équipe vous accompagne à chaque étape. Nos experts travaillent avec vous pour assurer une transition fluide et un impact tangible sur vos résultats.</p>
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>Conseils stratégiques pour une transformation réussie</li>
                                            <li><i class="far fa-check"></i>Amélioration continue des performances à travers des recommandations personnalisées</li>
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

