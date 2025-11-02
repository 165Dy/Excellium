@extends('layouts.master')
@section('indexEquipe')
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene">
            <span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}" alt="shape"></span>
        </div>
        <div class="shape shape-two scene">
            <span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}" alt="shape"></span>
        </div>
        <div class="shape shape-three">
            <span><img src="{{ asset('assets/images/shape/p-3.png') }}" alt="shape"></span>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="page-banner-content text-center text-white">
                        <h2 class="page-title">Notre Équipe</h2>
                        <p>
                            Rencontrez les femmes et les hommes qui œuvrent chaque jour pour offrir des solutions
                            innovantes,
                            performantes et humaines. Ensemble, nous partageons la même passion : faire réussir vos projets.
                        </p>
                        <ul class="breadcrumb-link text-white">
                            <li><a href="{{ route('welcome') }}">Accueil</a></li>
                            <li class="active">Notre Équipe</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== Start Team Section ======-->
    <section class="team-section secondary-dark-bg pt-140 pb-110">
        <div class="container" style="margin-top: -100px">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item style-one mb-30 wow fadeInUp">
                        <div class="member-image">
                            <img src="{{ asset('assets/images/image_3.jpg') }}" alt="Team Member" class="member">
                            <div class="share"><i class="far fa-plus"></i></div>
                            <ul class="social-link">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="member-info">
                            <h3><a href="{{ route('clients.partenaires.show') }}">Crepin Guy</a></h3>
                            <p class="position">PDG Excellium </p>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item style-one mb-30 wow fadeInUp">
                        <div class="member-image">
                            <img src="{{ asset('assets/images/image_2.jpg') }}" alt="Team Member" class="member">
                            <div class="share"><i class="far fa-plus"></i></div>
                            <ul class="social-link">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="member-info">
                            <h3><a href="{{ route('clients.partenaires.show') }}">Marc A. Dubois</a></h3>
                            <p class="position">Chef de Projet</p>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item style-one mb-30 wow fadeInUp">
                        <div class="member-image">
                            <img src="{{ asset('assets/images/T_2.png') }}" alt="Team Member" class="member">
                            <div class="share"><i class="far fa-plus"></i></div>
                            <ul class="social-link">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="member-info">
                            <h3><a href="{{ route('clients.partenaires.show') }}">Nadia K. Traoré</a></h3>
                            <p class="position">Responsable Communication</p>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--====== Section Détails ======-->
        <section class="case-details-section secondary-dark-bg pt-140 pb-140">
            <div class="container" style="margin-top: -80px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="case-details-wrapper wow fadeInDown">
                            <div class="case-img">
                                <img src="{{ asset('assets/images/image_1.jpg') }}" alt="case image">
                            </div><br>
                            <div class="case-content">
                                <h3>Une Équipe Dévouée à Votre Réussite</h3>
                                <p>
                                    Derrière chaque projet accompli se cache une équipe passionnée et déterminée. Notre
                                    objectif est simple : transformer vos idées en réussites concrètes.
                                    Grâce à notre expertise en stratégie, design, développement et communication, nous vous
                                    accompagnons à chaque étape pour faire grandir votre entreprise.
                                </p>

                                <div class="counter-wrapper mt-40 mb-65">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="counter-item mb-25 wow fadeInDown">
                                                <div class="icon">
                                                    <i class="icon-chart-2"></i>
                                                </div>
                                                <div class="content">
                                                    <h2><span class="count">150</span>K</h2>
                                                    <p>Projets livrés avec succès</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="counter-item mb-25 wow fadeInDown">
                                                <div class="icon">
                                                    <i class="icon-group"></i>
                                                </div>
                                                <div class="content">
                                                    <h2><span class="count">200</span>+</h2>
                                                    <p>Clients accompagnés chaque année</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="counter-item mb-25 wow fadeInDown">
                                                <div class="icon">
                                                    <i class="icon-target-2"></i>
                                                </div>
                                                <div class="content">
                                                    <h2><span class="count">500</span>+</h2>
                                                    <p>Partenaires et collaborateurs satisfaits</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- .case-content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <style>
        .member{
            height: 420px;
            width: 100%;
            object-fit: cover;  
        }
    </style>
@endsection
