@extends('layouts.master')

@section('compta_fiscale')
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
                            <h2 class="page-title">Comptable & Fiscale</h2>
                            <p>Notre équipe d'experts en comptabilité et fiscalité vous accompagne dans la gestion optimale
                                de vos finances, tout en vous assurant de respecter les obligations légales. Grâce à des
                                solutions personnalisées, nous vous aidons à optimiser vos ressources tout en maximisant vos
                                avantages fiscaux.</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Comptable & Fiscale</li>
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
                            <img src="{{ asset('assets/images/12.jpg') }}" alt="case image">
                        </div><br>
                        <div class="case-content">

                            <h3>Maximisez votre rentabilité avec une gestion fiscale optimisée</h3>
                            <p>Notre service d'audit fiscal vous permet d'identifier les meilleures stratégies pour
                                optimiser vos impôts tout en restant conforme aux exigences légales. Nous vous proposons des
                                solutions personnalisées qui répondent aux besoins spécifiques de votre entreprise, tout en
                                vous permettant de profiter des avantages fiscaux disponibles.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Optimisation de votre déclaration fiscale</li>
                                        <li><i class="far fa-check"></i>Audit complet de votre situation fiscale</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Conseils sur les dispositifs fiscaux avantageux</li>
                                        <li><i class="far fa-check"></i>Suivi personnalisé et adapté à votre activité</li>
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
                                                <h2><span class="count">100</span>K</h2>
                                                <p>Optimisation réalisée</p>
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
                                                <p>Réductions fiscales obtenues</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-xl-6">
                                    <div class="block-image mb-50 wow fadeInLeft">
                                        <img src="{{ asset('assets/images/2.jpg') }}" alt="case image">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="content-box mb-50 wow fadeInRight">
                                        <h3>Une approche stratégique pour la gestion fiscale</h3>
                                        <p>Notre équipe d'experts vous guide à travers les différentes étapes pour vous
                                            assurer une gestion fiscale efficace et optimale. Nous identifions les
                                            opportunités fiscales qui vous permettent de réduire vos coûts tout en
                                            respectant la législation en vigueur. Grâce à notre accompagnement, vous gagnez
                                            en efficacité et en rentabilité.</p>
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>Conseils pratiques pour optimiser vos finances
                                            </li>
                                            <li><i class="far fa-check"></i>Suivi et gestion continue de vos obligations
                                                fiscales</li>
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
                    <rect x="12" y="8" width="40" height="48" rx="4" ry="4" stroke="#000"
                        stroke-width="2" />
                    <rect x="20" y="20" width="8" height="8" fill="#000" />
                    <rect x="32" y="20" width="8" height="8" fill="#000" />
                    <rect x="20" y="32" width="8" height="8" fill="#000" />
                    <circle cx="48" cy="48" r="6" stroke="#000" stroke-width="2" />
                    <text x="45" y="52" font-size="10" fill="black">€</text>
                    <style>
                        text {
                            animation: bounce 1s infinite;
                        }

                        @keyframes bounce {

                            0%,
                            100% {
                                transform: translateY(0);
                            }

                            50% {
                                transform: translateY(-3px);
                            }
                        }
                    </style>
                </svg>

                Simplifiez la gestion de vos obligations comptables : contactez-nous via ce formulaire pour une collaboration sur mesure.
            </div>
    </section>
    <!--====== End Case Details Section ======-->
@endsection
