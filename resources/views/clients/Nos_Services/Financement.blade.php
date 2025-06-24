@extends('layouts.master')

@section('financement')
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
                            <h2 class="page-title">Financement</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque euismod neque et arcu
                                blandit, at aliquam libero facilisis.</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Financements</li>
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
                            <img src="{{ asset('assets/images/7.jpg') }}" alt="case image" style="width: 100%; height:520px;">
                        </div><br>
                        <div class="case-content">  
                            <h3>Maximisez Votre Capital avec Notre Expertise en Financement</h3>
                            <p> Nous vous offrons des solutions de financement innovantes pour propulser
                                votre projet au sommet. Notre équipe d'experts met en œuvre des stratégies de financement
                                sur mesure pour répondre à vos besoins spécifiques.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Nous offrons des solutions flexibles pour tous vos
                                            besoins financiers.</li>
                                        <li><i class="far fa-check"></i>Nous vous accompagnons tout au long de votre
                                            processus de financement.</li>
                                        <li><i class="far fa-check"></i>Notre approche est personnalisée pour maximiser vos
                                            chances de succès.</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Des solutions de financement adaptées aux petites et
                                            grandes entreprises.</li>
                                        <li><i class="far fa-check"></i>Un suivi régulier pour garantir la réussite de votre
                                            projet.</li>
                                        <li><i class="far fa-check"></i>Nous vous aidons à choisir le bon financement pour
                                            votre entreprise.</li>
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
                                                <h2><span class="count">100</span>K</h2>
                                                <p>Clients satisfaits</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="counter-item mb-25 wow fadeInDown">
                                            <div class="icon">
                                                <i class="icon-group"></i>
                                            </div>
                                            <div class="content">
                                                <h2><span class="count">50</span>K+</h2>
                                                <p>Projets financés</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="counter-item mb-25 wow fadeInDown">
                                            <div class="icon">
                                                <i class="icon-target-2"></i>
                                            </div>
                                            <div class="content">
                                                <h2><span class="count">75</span>K+</h2>
                                                <p>Financements réussis</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <div class="block-image mb-50 wow fadeInLeft" >
                                        <img src="{{ asset('assets/images/18.jpg') }}" alt="case image" >
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="content-box mb-50 wow fadeInRight">
                                        <h3>Optimisez Votre Projet avec des Solutions Financières Personnalisées</h3>
                                        <p>Notre équipe de professionnels s'engage à vous fournir les meilleures options de
                                            financement pour faire grandir votre entreprise. Que vous soyez une startup ou
                                            une entreprise établie, nous avons les outils nécessaires pour répondre à vos
                                            besoins financiers spécifiques. Nous comprenons l'importance de chaque décision
                                            financière et nous nous engageons à vous offrir une solution à la fois rapide et
                                            efficace.</p>
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>Obtenez des conseils sur mesure pour chaque
                                                étape de votre projet.</li>
                                            <li><i class="far fa-check"></i>Accédez à des financements adaptés à vos
                                                objectifs à long terme.</li>
                                            <li><i class="far fa-check"></i>Profitez de notre expertise pour naviguer dans
                                                le monde complexe du financement.</li>
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
