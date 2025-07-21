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
                            <h2 class="page-title">@lang('extracted.ressources_humaines')</h2>
                            <p>
                                Optimisez la gestion de vos ressources humaines grâce à notre expertise.
                            </p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">@lang('extracted.pages')</a></li>
                                <li class="active">@lang('extracted.ressources_humaines')</li>
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
                            <img src="{{ asset('assets/images/8.jpg') }}" alt="case image">
                        </div> <br>
                        <div class="case-content">
                            <h3>@lang('extracted.la_gestion_des_ressources_humaines_avec_nos_solutions')</h3>
                            <p>@lang('extracted.nous_vous_accompagnons_dans_le_recrutement_la_formation_et_le_developpement_de_vos_equipes_pour_garantir_la_performance_et_le_bien_etre_au_sein_de_votre_entreprise_faites_confiance_a_nos_solutions_rh_sur_mesure_pour_repondre_a_tous_vos_besoins_nos_experts_en_gestion_des_ressources_humaines_vous_aident_a_mieux_structurer_et_organiser_votre_equipe_tout_en_favorisant_un_environnement_de_travail_sain_et_performant_avec_des_strategies_de_recrutement_adaptees_et_des_solutions_de_gestion_des_talents_nous_vous_accompagnons_pour_atteindre_vos_objectifs_rh')</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>@lang('extracted.optimisation_du_processus_de_recrutement')</li>
                                        <li><i class="far fa-check"></i>@lang('extracted.formation_continue_pour_vos_employes')</li>
                                        <li><i class="far fa-check"></i>@lang('extracted.creation_dune_culture_dentreprise_positive')</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="check-list style-one mb-30">
                                        <li><i class="far fa-check"></i>@lang('extracted.gestion_efficace_des_talents_et_competences')</li>
                                        <li><i class="far fa-check"></i>@lang('extracted.accompagnement_personnalise_dans_le_developpement_des_equipes')</li>
                                        <li><i class="far fa-check"></i>@lang('extracted.evaluation_continue_des_performances_des_collaborateurs')</li>
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
                                                <p>@lang('extracted.recrutements_reussis')</p>
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
                                                <p>@lang('extracted.employes_formes')</p>
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
                                                <p>@lang('extracted.clients_satisfaits')</p>
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
                                        <h3>@lang('extracted.strategies_rh_personnalisees_pour_chaque_entreprise')</h3>
                                        <p>@lang('extracted.nous_proposons_des_strategies_rh_sur_mesure_qui_repondent_aux_besoins_specifiques_de_chaque_entreprise_que_ce_soit_pour_la_gestion_des_talents_lamelioration_de_la_culture_dentreprise_ou_loptimisation_des_processus_de_recrutement_nous_mettons_en_oeuvre_des_solutions_adaptees_a_votre_organisation')</p>
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>@lang('extracted.accompagnement_dans_le_changement_organisationnel')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.evaluation_des_besoins_rh_specifiques')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.developpement_dune_strategie_rh_durable')</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="read-button mb-30 text-center">
                

                <svg width="120" height="100" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="32" cy="16" r="6" fill="black" />
                    <rect x="26" y="24" width="12" height="18" fill="black" />
                    <circle cx="16" cy="20" r="4" fill="#555">
                        <animate attributeName="cy" values="20;18;20" dur="1s" repeatCount="indefinite" />
                    </circle>
                    <rect x="12" y="26" width="8" height="12" fill="#555" />
                    <circle cx="48" cy="20" r="4" fill="#555">
                        <animate attributeName="cy" values="20;18;20" dur="1s" repeatCount="indefinite"
                            begin="0.5s" />
                    </circle>
                    <rect x="44" y="26" width="8" height="12" fill="#555" />
                </svg>

                Vous souhaitez renforcer votre capital humain ? Remplissez ce formulaire pour échanger sur nos services RH.
                

            </div>
    </section>
    <!--====== End Case Details Section ======-->
@endsection
