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
                            <p>Nos services d'audit et de conseil sont conçus pour aider votre entreprise à atteindre ses
                                objectifs grâce à des stratégies personnalisées et basées sur des données concrètes. Nous
                                mettons notre expertise à votre service pour vous guider dans vos prises de décisions
                                stratégiques et opérationnelles.</p>
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
        <div class="container" style="margin-top: -80px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-details-wrapper wow fadeInDown">
                        <div class="case-img">
                            <img src="{{ asset('assets/images/audit.jfif') }}" alt="case image">
                        </div><br>
                        <div class="case-content">

                            <h3>Optimisez vos performances grâce à nos audits spécialisés</h3>
                            <p>Nous analysons en profondeur vos processus internes et vos pratiques commerciales pour
                                identifier des opportunités d’amélioration. Nos recommandations sont basées sur des analyses
                                objectives et des benchmarks industriels pour vous offrir des solutions pratiques et
                                efficaces, adaptées à votre contexte spécifique.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Audit approfondi de vos processus internes</li>
                                        <li><i class="far fa-check"></i>Conseils pratiques pour améliorer votre rentabilité
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>Suivi personnalisé pour une mise en œuvre réussie
                                        </li>
                                        <li><i class="far fa-check"></i>Accompagnement stratégique pour vos choix futurs
                                        </li>
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
                                        <img src="{{ asset('assets/images/1.jpg') }}" alt="case image">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="content-box mb-50 wow fadeInRight">
                                        <h3>Notre expertise pour résoudre vos défis complexes</h3>
                                        <p>Nous proposons des solutions sur mesure pour résoudre vos problématiques
                                            complexes. Que vous ayez besoin de réorganiser vos processus ou de prendre des
                                            décisions stratégiques, notre équipe vous accompagne à chaque étape. Nos experts
                                            travaillent avec vous pour assurer une transition fluide et un impact tangible
                                            sur vos résultats.</p>
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>Conseils stratégiques pour une transformation
                                                réussie</li>
                                            <li><i class="far fa-check"></i>Amélioration continue des performances à travers
                                                des recommandations personnalisées</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="read-button mb-30 text-center">
                <a href="{{ route('Formations.index') }}" class="read-more"
                    style="background: #FFD22F; color: #222; border: none; font-size: 1.3rem; border-radius: 12px; font-weight: bold; box-shadow: 0 4px 18px rgba(0,0,0,0.08); transition: background 0.2s; padding: 14px 36px;">
                    <svg width="100" height="100" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="8" y="8" width="40" height="48" rx="4" ry="4" stroke="#000"
                            stroke-width="2" fill="white" />
                        <circle cx="44" cy="44" r="8" stroke="#000" stroke-width="2" />
                        <line x1="49" y1="49" x2="58" y2="58" stroke="#000" stroke-width="2" />
                        <line x1="14" y1="20" x2="36" y2="20" stroke="#000"
                            stroke-width="2" />
                        <line x1="14" y1="28" x2="32" y2="28" stroke="#000"
                            stroke-width="2" />
                        <style>
                            circle {
                                animation: pulse 1.5s infinite;
                            }

                            @keyframes pulse {
                                0% {
                                    r: 8;
                                    opacity: 1;
                                }

                                50% {
                                    r: 10;
                                    opacity: 0.6;
                                }

                                100% {
                                    r: 8;
                                    opacity: 1;
                                }
                            }
                        </style>
                    </svg>

                    Voir toutes les Formations a ce sujet
                </a>
            </div>
        </div>
    </section><!--====== End Case Details Section ======-->
@endsection
