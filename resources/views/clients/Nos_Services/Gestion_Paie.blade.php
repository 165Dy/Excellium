@extends('layouts.master')

@section('Gestion_paie')
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
                            <h2 class="page-title">Gestion de la Paie</h2>
                            <p>
                                Simplifiez la gestion de vos salaires grâce à notre service professionnel et sécurisé.
                                Confiez-nous la gestion de la paie de votre entreprise et bénéficiez d’un traitement rapide,
                                conforme à la législation,
                                tout en réduisant les risques d’erreurs. Gagnez du temps et assurez la satisfaction de vos
                                employés avec une solution fiable et adaptée à vos besoins.
                            </p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Gestion de la Paie</li>
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
                            <img src="{{ asset('assets/images/4.jpg') }}" alt="case image">
                        </div><br>
                        <div class="case-content">

                            <h3>Optimisez la Gestion de la Paie avec Notre Expertise</h3>
                            <p>
                                Confiez la gestion de la paie de votre entreprise à des experts et concentrez-vous sur le
                                développement de votre activité.
                                Notre équipe vous accompagne pour garantir un traitement rapide, sécurisé et conforme à la
                                législation en vigueur.
                                Réduisez les risques d’erreurs, gagnez du temps et assurez la satisfaction de vos
                                collaborateurs grâce à une gestion de la paie fiable, transparente et adaptée à vos besoins.
                            </p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Gestion fiable et conforme à la législation</li>
                                        <li><i class="far fa-check"></i>Calculs de paie rapides et précis</li>
                                        <li><i class="far fa-check"></i>Assistance dans la gestion des déclarations fiscales
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Rapports détaillés pour la gestion RH</li>
                                        <li><i class="far fa-check"></i>Réduction des risques d'erreurs de paie</li>
                                        <li><i class="far fa-check"></i>Accès sécurisé aux informations des employés</li>
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
                                                <h2><span class="count">150</span>K</h2>
                                                <p>Salaires traités chaque mois</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="counter-item mb-25 wow fadeInDown">
                                            <div class="icon">
                                                <i class="icon-group"></i>
                                            </div>
                                            <div class="content">
                                                <h2><span class="count">150</span>+</h2>
                                                <p>Employés payés chaque mois</p>
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
                                                <p>Clients satisfaits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <div class="block-image mb-50 wow fadeInLeft">
                                        <img src="{{ asset('assets/images/11.jpg') }}" alt="case image">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="content-box mb-50 wow fadeInRight">
                                        <h3>Améliorez Votre Gestion de Paie pour un Meilleur Suivi</h3>
                                        <p>Notre service de gestion de la paie vous offre une solution complète et
                                            personnalisée, que vous soyez une PME ou une grande entreprise. Nous vous
                                            garantissons une gestion fluide et conforme de la paie, permettant à vos
                                            employés de recevoir leur salaire en toute sécurité et dans les délais. De plus,
                                            nous nous occupons des déclarations fiscales et des cotisations sociales pour
                                            vous.</p>
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>Conformité complète avec les lois fiscales
                                                locales</li>
                                            <li><i class="far fa-check"></i>Traitement des salaires sans erreur</li>
                                            <li><i class="far fa-check"></i>Gain de temps pour votre équipe RH</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="read-button mb-30 text-center">
                
                <svg width="100" height="100" viewBox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="12" y="12" width="36" height="48" rx="2" ry="2" stroke="#000"
                        stroke-width="2" fill="white" />
                    <line x1="16" y1="20" x2="40" y2="20" stroke="#000" stroke-width="2" />
                    <line x1="16" y1="28" x2="36" y2="28" stroke="#000"
                        stroke-width="2" />
                    <circle cx="50" cy="50" r="6" stroke="#000" stroke-width="2" fill="white" />
                    <text x="47" y="54" font-size="10" fill="black">$</text>
                    <style>
                        circle {
                            animation: rotate 2s linear infinite;
                            transform-origin: center;
                        }

                        @keyframes rotate {
                            0% {
                                transform: rotate(0deg);
                            }

                            100% {
                                transform: rotate(360deg);
                            }
                        }
                    </style>
                </svg>

                Optimisez la gestion salariale de votre entreprise : contactez-nous pour un accompagnement dédié.
                
            </div>

    </section><!--====== End Case Details Section ======-->
@endsection
