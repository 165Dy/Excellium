@extends('layouts.master')

@section('Services')
    @if ($service->slug === 'service_1')
        {{-- Audit & Conseil --}}

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
                                <h2 class="page-title">@lang('extracted.audit_conseils')</h2>
                                <p>@lang('extracted.nos_services_daudit_et_de_conseil_sont_concus_pour_aider_votre_entreprise_a_atteindre_ses_objectifs_grace_a_des_strategies_personnalisees_et_basees_sur_des_donnees_concretes_nous_mettons_notre_expertise_a_votre_service_pour_vous_guider_dans_vos_prises_de_decisions_strategiques_et_operationnelles')</p>
                                <ul class="breadcrumb-link text-white">
                                    <li><a href="index.html">@lang('extracted.pages')</a></li>
                                    <li class="active">@lang('extracted.audits_conseils')</li>
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

                                <h3>@lang('extracted.optimisez_vos_performances_grace_a_nos_audits_specialises')</h3>
                                <p>@lang('extracted.nous_analysons_en_profondeur_vos_processus_internes_et_vos_pratiques_commerciales_pour_identifier_des_emplois_damelioration_nos_recommandations_sont_basees_sur_des_analyses_objectives_et_des_benchmarks_industriels_pour_vous_offrir_des_solutions_pratiques_et_efficaces_adaptees_a_votre_contexte_specifique')</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>@lang('extracted.audit_approfondi_de_vos_processus_internes')</li>
                                            <li><i class="far fa-check"></i>Conseils pratiques pour améliorer votre
                                                rentabilité
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>Suivi personnalisé pour une mise en œuvre
                                                réussie
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
                                                    <p>@lang('extracted.clients_satisfaits')</p>
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
                                                    <p>@lang('extracted.projets_accomplis')</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="counter-item mb-25 wow fadeInDown">
                                                <div class="icon">
                                                    <i class="icon-target-2"></i>
                                                </div>
                                                <div class="content">
                                                    <h2><span class="count">56</span>@lang('extracted.k')</h2>
                                                    <p>@lang('extracted.reussites_globales')</p>
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
                                            <h3>@lang('extracted.notre_expertise_pour_resoudre_vos_defis_complexes')</h3>
                                            <p>@lang('extracted.nous_proposons_des_solutions_sur_mesure_pour_resoudre_vos_problematiques_complexes_que_vous_ayez_besoin_de_reorganiser_vos_processus_ou_de_prendre_des_decisions_strategiques_notre_equipe_vous_accompagne_a_chaque_etape_nos_experts_travaillent_avec_vous_pour_assurer_une_transition_fluide_et_un_impact_tangible_sur_vos_resultats')</p>
                                            <ul class="check-list style-one mb-30">
                                                <li><i class="far fa-check"></i>@lang('extracted.conseils_strategiques_pour_une_transformation_reussie')</li>
                                                <li><i class="far fa-check"></i>@lang('extracted.amelioration_continue_des_performances_a_travers_des_recommandations_personnalisees')</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="read-button2 mb-30 text-center">
                    <a href="#" class="btn-inscription-service"
                        style="color: #222; border: none; font-size: 1.3rem; border-radius: 12px; font-weight: bold; box-shadow: 0 4px 18px rgba(0,0,0,0.08); transition: background 0.2s; padding: 14px 36px;">
                        <svg width="50" height="50" viewBox="0 0 64 64" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="8" width="40" height="48" rx="4" ry="4" stroke="#000"
                                stroke-width="2" fill="white" />
                            <circle cx="44" cy="44" r="8" stroke="#000" stroke-width="2" />
                            <line x1="49" y1="49" x2="58" y2="58" stroke="#000"
                                stroke-width="2" />
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

                        Vous souhaitez optimiser vos performances ? Inscrivez-vous pour échanger avec nos experts en audit et conseil sur vos enjeux stratégiques.
                    </a>
                </div>
            </div>
        </section>
        <!--====== End Case Details Section ======-->


    @elseif($service->slug === 'service_2')
        {{-- Comptabilité & Fiscalité --}}

        <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
            <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                        alt="shape"></span>
            </div>
            <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                        alt="shape"></span>
            </div>
            <div class="shape shape-three"><span><img src="{{ asset('assets/images/shape/p-3.png') }}"
                        alt="shape"></span>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="row">
                            <!--=== Page Banner Content ===-->
                            <div class="page-banner-content text-center text-white">
                                <h2 class="page-title">@lang('extracted.comptable_fiscale')</h2>
                                <p>@lang('extracted.notre_equipe_dexperts_en_comptabilite_et_fiscalite_vous_accompagne_dans_la_gestion_optimale_de_vos_finances_tout_en_vous_assurant_de_respecter_les_obligations_legales_grace_a_des_solutions_personnalisees_nous_vous_aidons_a_optimiser_vos_ressources_tout_en_maximisant_vos_avantages_fiscaux')</p>
                                <ul class="breadcrumb-link text-white">
                                    <li><a href="index.html">@lang('extracted.pages')</a></li>
                                    <li class="active">@lang('extracted.comptable_fiscale')</li>
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

                                <h3>@lang('extracted.maximisez_votre_rentabilite_avec_une_gestion_fiscale_optimisee')</h3>
                                <p>@lang('extracted.notre_service_daudit_fiscal_vous_permet_didentifier_les_meilleures_strategies_pour_optimiser_vos_impots_tout_en_restant_conforme_aux_exigences_legales_nous_vous_proposons_des_solutions_personnalisees_qui_repondent_aux_besoins_specifiques_de_votre_entreprise_tout_en_vous_permettant_de_profiter_des_avantages_fiscaux_disponibles')</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>@lang('extracted.optimisation_de_votre_declaration_fiscale')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.audit_complet_de_votre_situation_fiscale')</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>@lang('extracted.conseils_sur_les_dispositifs_fiscaux_avantageux')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.suivi_personnalise_et_adapte_a_votre_activite')</li>
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
                                                    <p>@lang('extracted.clients_satisfaits')</p>
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
                                                    <p>@lang('extracted.optimisation_realisee')</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="counter-item mb-25 wow fadeInDown">
                                                <div class="icon">
                                                    <i class="icon-target-2"></i>
                                                </div>
                                                <div class="content">
                                                    <h2><span class="count">75</span>@lang('extracted.k')</h2>
                                                    <p>@lang('extracted.reductions_fiscales_obtenues')</p>
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
                                            <h3>@lang('extracted.une_approche_strategique_pour_la_gestion_fiscale')</h3>
                                            <p>@lang('extracted.notre_equipe_dexperts_vous_guide_a_travers_les_differentes_etapes_pour_vous_assurer_une_gestion_fiscale_efficace_et_optimale_nous_identifions_les_emplois_fiscales_qui_vous_permettent_de_reduire_vos_couts_tout_en_respectant_la_legislation_en_vigueur_grace_a_notre_accompagnement_vous_gagnez_en_efficacite_et_en_rentabilite')</p>
                                            <ul class="check-list style-one mb-30">
                                                <li><i class="far fa-check"></i>Conseils pratiques pour optimiser vos
                                                    finances
                                                </li>
                                                <li><i class="far fa-check"></i>@lang('extracted.suivi_et_gestion_continue_de_vos_obligations_fiscales')</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="read-button2 mb-30 text-center">

                    <svg width="50" height="50" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="12" y="8" width="40" height="48" rx="4" ry="4" stroke="#000"
                            stroke-width="2" />
                        <rect x="20" y="20" width="8" height="8" fill="#000" />
                        <rect x="32" y="20" width="8" height="8" fill="#000" />
                        <rect x="20" y="32" width="8" height="8" fill="#000" />
                        <circle cx="48" cy="48" r="6" stroke="#000" stroke-width="2" />
                        <text x="45" y="52" font-size="10" fill="black">@lang('extracted.eur')</text>
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

                    Simplifiez la gestion de vos obligations comptables : contactez-nous via ce formulaire pour une
                    collaboration sur mesure.
                </div>
                <!-- Bouton d'inscription pour service_2 -->
                <div class="text-center mb-4">
                    <a href="#" class="btn-inscription-service btn btn-primary btn-lg">
                        <i class="fas fa-calculator me-2"></i>
                        Inscrivez-vous pour nos services comptables
                    </a>
                </div>
        </section>
        <!--====== End Case Details Section ======-->
    @elseif($service->slug === 'service_3')       
        {{-- Financement --}}

        <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
            <div class="shape shape-one scene"><span data-depth="1"><img
                        src="{{ asset('assets/images/shape/p-1.png') }}" alt="shape"></span>
            </div>
            <div class="shape shape-two scene"><span data-depth="2"><img
                        src="{{ asset('assets/images/shape/p-2.png') }}" alt="shape"></span>
            </div>
            <div class="shape shape-three"><span><img src="{{ asset('assets/images/shape/p-3.png') }}"
                        alt="shape"></span>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="row">
                            <!--=== Page Banner Content ===-->
                            <div class="page-banner-content text-center text-white">
                                <h2 class="page-title">@lang('extracted.financement')</h2>
                                <p>
                                    Découvrez nos solutions de financement adaptées à vos besoins professionnels. Que vous
                                    souhaitiez lancer un nouveau projet, développer votre activité ou optimiser votre
                                    trésorerie, notre équipe vous accompagne à chaque étape pour trouver la solution la plus
                                    avantageuse. Profitez de notre expertise pour concrétiser vos ambitions en toute
                                    sérénité.
                                </p>
                                <ul class="breadcrumb-link text-white">
                                    <li><a href="index.html">@lang('extracted.pages')</a></li>
                                    <li class="active">@lang('extracted.financements')</li>
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
                                <img src="{{ asset('assets/images/7.jpg') }}" alt="case image">
                            </div><br>
                            <div class="case-content">
                                <h3>@lang('extracted.maximisez_votre_capital_avec_notre_expertise_en_financement')</h3>
                                <p> Nous vous offrons des solutions de financement innovantes pour propulser
                                    votre projet au sommet. Notre équipe d'experts met en œuvre des stratégies de
                                    financement
                                    sur mesure pour répondre à vos besoins spécifiques.</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>@lang('extracted.nous_offrons_des_solutions_flexibles_pour_tous_vos_besoins_financiers')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.nous_vous_accompagnons_tout_au_long_de_votre_processus_de_financement')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.notre_approche_est_personnalisee_pour_maximiser_vos_chances_de_succes')</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>@lang('extracted.des_solutions_de_financement_adaptees_aux_petites_et_grandes_entreprises')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.un_suivi_regulier_pour_garantir_la_reussite_de_votre_projet')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.nous_vous_aidons_a_choisir_le_bon_financement_pour_votre_entreprise')</li>
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
                                                    <p>@lang('extracted.clients_satisfaits')</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="counter-item mb-25 wow fadeInDown">
                                                <div class="icon">
                                                    <i class="icon-group"></i>
                                                </div>
                                                <div class="content">
                                                    <h2><span class="count">50</span>@lang('extracted.k')</h2>
                                                    <p>@lang('extracted.projets_finances')</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="counter-item mb-25 wow fadeInDown">
                                                <div class="icon">
                                                    <i class="icon-target-2"></i>
                                                </div>
                                                <div class="content">
                                                    <h2><span class="count">75</span>@lang('extracted.k')</h2>
                                                    <p>@lang('extracted.financements_reussis')</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-xl-6">
                                        <div class="block-image mb-50 wow fadeInLeft">
                                            <img src="{{ asset('assets/images/18.jpg') }}" alt="case image">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="content-box mb-50 wow fadeInRight">
                                            <h3>@lang('extracted.optimisez_votre_projet_avec_des_solutions_financieres_personnalisees')</h3>
                                            <p>@lang('extracted.notre_equipe_de_professionnels_sengage_a_vous_fournir_les_meilleures_options_de_financement_pour_faire_grandir_votre_entreprise_que_vous_soyez_une_startup_ou_une_entreprise_etablie_nous_avons_les_outils_necessaires_pour_repondre_a_vos_besoins_financiers_specifiques_nous_comprenons_limportance_de_chaque_decision_financiere_et_nous_nous_engageons_a_vous_offrir_une_solution_a_la_fois_rapide_et_efficace')</p>
                                            <ul class="check-list style-one mb-30">
                                                <li><i class="far fa-check"></i>@lang('extracted.obtenez_des_conseils_sur_mesure_pour_chaque_etape_de_votre_projet')</li>
                                                <li><i class="far fa-check"></i>@lang('extracted.accedez_a_des_financements_adaptes_a_vos_objectifs_a_long_terme')</li>
                                                <li><i class="far fa-check"></i>@lang('extracted.profitez_de_notre_expertise_pour_naviguer_dans_le_monde_complexe_du_financement')</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="read-button2 mb-30 text-center">

                    <svg width="50" height="50" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 12 L28 20 H36 L32 12 Z" fill="#000" />
                        <path d="M24 20 C16 32, 16 44, 32 52 C48 44, 48 32, 40 20 Z" fill="white" stroke="#000"
                            stroke-width="2" />
                        <text x="28" y="40" font-size="14" fill="black">$</text>
                        <polyline points="40,40 48,32 56,36" fill="none" stroke="green" stroke-width="2">
                            <animate attributeName="points"
                                values="40,40 48,32 56,36; 40,42 48,34 56,38; 40,40 48,32 56,36" dur="1.5s"
                                repeatCount="indefinite" />
                        </polyline>
                    </svg>
                    Vous recherchez des solutions de financement adaptées ? Inscrivez-vous pour explorer avec nous les
                    meilleures opportunités.
                </div>
                <!-- Bouton d'inscription pour service_3 -->
                <div class="text-center mb-4">
                    <a href="#" class="btn-inscription-service btn btn-primary btn-lg">
                        <i class="fas fa-coins me-2"></i>
                        Inscrivez-vous pour nos solutions de financement
                    </a>
                </div>
        </section>
        <!--====== End Case Details Section ======-->
    @elseif($service->slug === 'service_4')
        {{-- Gestion de la Paie --}}

        <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
            <div class="shape shape-one scene"><span data-depth="1"><img
                        src="{{ asset('assets/images/shape/p-1.png') }}" alt="shape"></span>
            </div>
            <div class="shape shape-two scene"><span data-depth="2"><img
                        src="{{ asset('assets/images/shape/p-2.png') }}" alt="shape"></span>
            </div>
            <div class="shape shape-three"><span><img src="{{ asset('assets/images/shape/p-3.png') }}"
                        alt="shape"></span>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="row">
                            <!--=== Page Banner Content ===-->
                            <div class="page-banner-content text-center text-white">
                                <h2 class="page-title">@lang('extracted.gestion_de_la_paie')</h2>
                                <p>
                                    Simplifiez la gestion de vos salaires grâce à notre service professionnel et sécurisé.
                                    Confiez-nous la gestion de la paie de votre entreprise et bénéficiez d’un traitement
                                    rapide,
                                    conforme à la législation,
                                    tout en réduisant les risques d’erreurs. Gagnez du temps et assurez la satisfaction de
                                    vos
                                    employés avec une solution fiable et adaptée à vos besoins.
                                </p>
                                <ul class="breadcrumb-link text-white">
                                    <li><a href="index.html">@lang('extracted.pages')</a></li>
                                    <li class="active">@lang('extracted.gestion_de_la_paie')</li>
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

                                <h3>@lang('extracted.optimisez_la_gestion_de_la_paie_avec_notre_expertise')</h3>
                                <p>
                                    Confiez la gestion de la paie de votre entreprise à des experts et concentrez-vous sur
                                    le
                                    développement de votre activité.
                                    Notre équipe vous accompagne pour garantir un traitement rapide, sécurisé et conforme à
                                    la
                                    législation en vigueur.
                                    Réduisez les risques d’erreurs, gagnez du temps et assurez la satisfaction de vos
                                    collaborateurs grâce à une gestion de la paie fiable, transparente et adaptée à vos
                                    besoins.
                                </p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>@lang('extracted.gestion_fiable_et_conforme_a_la_legislation')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.calculs_de_paie_rapides_et_precis')</li>
                                            <li><i class="far fa-check"></i>Assistance dans la gestion des déclarations
                                                fiscales
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>@lang('extracted.rapports_detailles_pour_la_gestion_rh')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.reduction_des_risques_derreurs_de_paie')</li>
                                            <li><i class="far fa-check"></i>@lang('extracted.acces_securise_aux_informations_des_employes')</li>
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
                                                    <p>@lang('extracted.salaires_traites_chaque_mois')</p>
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
                                                    <p>@lang('extracted.employes_payes_chaque_mois')</p>
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
                                                    <p>@lang('extracted.clients_satisfaits')</p>
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
                                            <h3>@lang('extracted.ameliorez_votre_gestion_de_paie_pour_un_meilleur_suivi')</h3>
                                            <p>@lang('extracted.notre_service_de_gestion_de_la_paie_vous_offre_une_solution_complete_et_personnalisee_que_vous_soyez_une_pme_ou_une_grande_entreprise_nous_vous_garantissons_une_gestion_fluide_et_conforme_de_la_paie_permettant_a_vos_employes_de_recevoir_leur_salaire_en_toute_securite_et_dans_les_delais_de_plus_nous_nous_occupons_des_declarations_fiscales_et_des_cotisations_sociales_pour_vous')</p>
                                            <ul class="check-list style-one mb-30">
                                                <li><i class="far fa-check"></i>@lang('extracted.conformite_complete_avec_les_lois_fiscales_locales')</li>
                                                <li><i class="far fa-check"></i>@lang('extracted.traitement_des_salaires_sans_erreur')</li>
                                                <li><i class="far fa-check"></i>@lang('extracted.gain_de_temps_pour_votre_equipe_rh')</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="read-button2 mb-30 text-center">
                    <svg width="50" height="50" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="12" y="12" width="36" height="48" rx="2" ry="2" stroke="#000"
                            stroke-width="2" fill="white" />
                        <line x1="16" y1="20" x2="40" y2="20" stroke="#000"
                            stroke-width="2" />
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
                <!-- Bouton d'inscription pour service_4 -->
                <div class="text-center mb-4">
                    <a href="#" class="btn-inscription-service btn btn-primary btn-lg">
                        <i class="fas fa-money-check-alt me-2"></i>
                        Inscrivez-vous pour nos services de gestion de paie
                    </a>
                </div>

        </section><!--====== End Case Details Section ======-->
    @elseif($service->slug === 'service_5')
        {{-- Ressources Humaines --}}

        <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
            <div class="shape shape-one scene"><span data-depth="1"><img
                        src="{{ asset('assets/images/shape/p-1.png') }}" alt="shape"></span>
            </div>
            <div class="shape shape-two scene"><span data-depth="2"><img
                        src="{{ asset('assets/images/shape/p-2.png') }}" alt="shape"></span>
            </div>
            <div class="shape shape-three"><span><img src="{{ asset('assets/images/shape/p-3.png') }}"
                        alt="shape"></span>
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

                <div class="read-button2 mb-30 text-center">
                    <svg width="120" height="50" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
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
                    Vous souhaitez renforcer votre capital humain ? Remplissez ce formulaire pour échanger sur nos services
                    RH.
                </div>
                <!-- Bouton d'inscription pour service_5 -->
                <div class="text-center mb-4">
                    <a href="#" class="btn-inscription-service btn btn-primary btn-lg">
                        <i class="fas fa-users me-2"></i>
                        Inscrivez-vous pour nos services RH
                    </a>
                </div>
        </section>
        <!--====== End Case Details Section ======-->
    
    @else
        {{-- Aucun service trouvé --}}
        <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
            <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}" alt="shape"></span></div>
            <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}" alt="shape"></span></div>
            <div class="shape shape-three"><span><img src="{{ asset('assets/images/shape/p-3.png') }}" alt="shape"></span></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="page-banner-content text-center text-white">
                            <h2 class="page-title">Service en cours de préparation</h2>
                            <p>Nous travaillons actuellement sur de nouveaux services pour mieux vous servir. Revenez bientôt pour découvrir nos offres !</p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="{{ route('welcome') }}">Accueil</a></li>
                                <li class="active">Services</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="case-details-section secondary-dark-bg pt-140 pb-140">
            <div class="container" style="margin-top: -80px;">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="case-details-wrapper wow fadeInDown text-center">
                            <div class="case-img mb-4">
                                <svg width="200" height="200" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="100" cy="100" r="80" stroke="#6C63FF" stroke-width="4" fill="none" opacity="0.3"/>
                                    <circle cx="100" cy="100" r="60" stroke="#6C63FF" stroke-width="3" fill="none" opacity="0.5"/>
                                    <circle cx="100" cy="100" r="40" stroke="#6C63FF" stroke-width="2" fill="none" opacity="0.7"/>
                                    <circle cx="100" cy="100" r="20" fill="#6C63FF" opacity="0.9">
                                        <animate attributeName="r" values="20;25;20" dur="2s" repeatCount="indefinite"/>
                                        <animate attributeName="opacity" values="0.9;0.6;0.9" dur="2s" repeatCount="indefinite"/>
                                    </circle>
                                    <text x="100" y="105" text-anchor="middle" fill="#6C63FF" font-size="24" font-weight="bold">...</text>
                                </svg>
                            </div>
                            <div class="case-content">
                                <h3 class="mb-4">🚀 Nouveaux services en préparation</h3>
                                <p class="lead mb-4">
                                    Notre équipe d'experts travaille actuellement sur le développement de nouveaux services 
                                    innovants pour répondre encore mieux à vos besoins professionnels.
                                </p>
                                
                                <div class="row mt-5">
                                    <div class="col-md-4 mb-4">
                                        <div class="feature-box text-center p-4" style="background: rgba(108, 99, 255, 0.8); border-radius: 15px;">
                                            <i class="fas fa-cogs fa-2x mb-3" style="color: white;"></i>
                                            <h5 style="color: white;">En développement</h5>
                                            <p class="small" style="color: white; opacity: 0.9;">Services sur mesure en cours d'élaboration</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="feature-box text-center p-4" style="background: rgba(40, 167, 69, 0.8); border-radius: 15px;">
                                            <i class="fas fa-rocket fa-2x mb-3" style="color: white;"></i>
                                            <h5 style="color: white;">Bientôt disponible</h5>
                                            <p class="small" style="color: white; opacity: 0.9;">Lancement prévu très prochainement</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="feature-box text-center p-4" style="background: rgba(255, 193, 7, 0.8); border-radius: 15px;">
                                            <i class="fas fa-bell fa-2x mb-3" style="color: white;"></i>
                                            <h5 style="color: white;">Restez informé</h5>
                                            <p class="small" style="color: white; opacity: 0.9;">Soyez notifié du lancement</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h4 class="mb-3">💼 En attendant, découvrez nos autres services</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <a href="{{ route('welcome') }}" class="btn btn-outline-primary btn-lg w-100">
                                                <i class="fas fa-home me-2"></i>Retour à l'accueil
                                            </a>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <a href="{{ route('contacts') }}" class="btn btn-primary btn-lg w-100">
                                                <i class="fas fa-envelope me-2"></i>Nous contacter
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info mt-4" style="border-radius: 15px; border: none; background: linear-gradient(135deg, #e3f2fd, #bbdefb);">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Besoin d'un service spécifique ?</strong><br>
                                    N'hésitez pas à nous contacter pour discuter de vos besoins. 
                                    Nous pourrons peut-être vous proposer une solution personnalisée !
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    
    <style>
        .read-button2 {
            background: linear-gradient(135deg, #f3f2ef, #e0dfdc);
            color: #333;
            border: 1px solid #ccc;
            /* padding: 10px 10px; */
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            /* text-transform: uppercase; */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .read-button2:hover {
            background: linear-gradient(135deg, #e0dfdc, #cac9c7);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        .read-button2:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(100, 100, 100, 0.2);
        }
    </style>

    <!-- Modales d'inscription communes à tous les services -->
    <!-- Modal d'inscription -->
    <div class="modal fade" id="modalInscriptionService" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formInscriptionService">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            <i class="fas fa-user-plus me-2"></i>
                            Inscription au service {{ $service->nom }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Remplissez ce formulaire pour être contacté par nos experts.
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nom" class="form-label text-primary fw-semibold">@lang('extracted.nom') <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nom" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prenom" class="form-label text-primary fw-semibold">@lang('extracted.prenom') <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="prenom" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-primary fw-semibold">@lang('extracted.e_mail') <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label text-primary fw-semibold">@lang('extracted.telephone') <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="telephone" required
                                placeholder="+225 XX XX XX XX XX">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label text-primary fw-semibold">Description de vos besoins <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" rows="4" required placeholder="Décrivez vos besoins spécifiques..."></textarea>
                        </div>
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Annuler
                        </button>
                        <button type="submit" class="btn btn-primary" id="btnSubmit">
                            <i class="fas fa-paper-plane me-1"></i>Envoyer ma demande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Succès -->
    <div class="modal fade" id="modalSuccess" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header bg-success text-white border-0">
                    <h5 class="modal-title">
                        <i class="fas fa-check-circle me-2"></i>
                        Inscription réussie !
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h6 class="text-success mb-3">@lang('extracted.merci_pour_votre_inscription')</h6>
                    <p class="text-muted mb-0">
                        Un email de confirmation vous a été envoyé.<br>
                        Notre équipe vous contactera dans les plus brefs délais.
                    </p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                        <i class="fas fa-check me-1"></i>Parfait !
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Échec -->
    <div class="modal fade" id="modalError" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-danger">
                <div class="modal-header bg-danger text-white border-0">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Erreur d'inscription
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-times-circle text-danger" style="font-size: 4rem;"></i>
                    </div>
                    <h6 class="text-danger mb-3">@lang('extracted.une_erreur_est_survenue')</h6>
                    <p id="errorMessage" class="text-muted mb-0">
                        Veuillez réessayer ou nous contacter directement.
                    </p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ouvrir la modale d'inscription (générique pour tous les services)
            document.querySelectorAll('.btn-inscription-service').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var modal = new bootstrap.Modal(document.getElementById('modalInscriptionService'));
                    modal.show();
                });
            });

            // Soumission AJAX du formulaire
            document.getElementById('formInscriptionService').addEventListener('submit', function(e) {
                e.preventDefault();

                var form = this;
                var submitBtn = document.getElementById('btnSubmit');
                var originalText = submitBtn.innerHTML;

                // Désactiver le bouton et afficher le loader
                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>Envoi en cours...';

                var formData = new FormData(form);

                fetch("{{ route('inscription.services') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Fermer la modale d'inscription
                        bootstrap.Modal.getInstance(document.getElementById('modalInscriptionService'))
                            .hide();

                        if (data.success) {
                            // Réinitialiser le formulaire
                            form.reset();

                            // Afficher la modale de succès
                            var modalSuccess = new bootstrap.Modal(document.getElementById(
                                'modalSuccess'));
                            modalSuccess.show();
                        } else {
                            // Afficher le message d'erreur
                            document.getElementById('errorMessage').textContent = data.message ||
                                'Erreur lors de l\'inscription';
                            var modalError = new bootstrap.Modal(document.getElementById('modalError'));
                            modalError.show();
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);

                        // Fermer la modale d'inscription
                        bootstrap.Modal.getInstance(document.getElementById('modalInscriptionService'))
                            .hide();

                        // Afficher l'erreur
                        document.getElementById('errorMessage').textContent =
                            'Erreur de connexion. Veuillez réessayer.';
                        var modalError = new bootstrap.Modal(document.getElementById('modalError'));
                        modalError.show();
                    })
                    .finally(() => {
                        // Réactiver le bouton
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    });
            });
        });
    </script>
@endsection
