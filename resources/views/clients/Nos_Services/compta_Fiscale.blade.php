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
                                        <p>@lang('extracted.notre_equipe_dexperts_vous_guide_a_travers_les_differentes_etapes_pour_vous_assurer_une_gestion_fiscale_efficace_et_optimale_nous_identifions_les_opportunites_fiscales_qui_vous_permettent_de_reduire_vos_couts_tout_en_respectant_la_legislation_en_vigueur_grace_a_notre_accompagnement_vous_gagnez_en_efficacite_et_en_rentabilite')</p>
                                        <ul class="check-list style-one mb-30">
                                            <li><i class="far fa-check"></i>Conseils pratiques pour optimiser vos finances
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
            <div class="read-button mb-30 text-center">
                
                <svg width="100" height="100" viewBox="0 0 64 64" fill="none"
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

                Simplifiez la gestion de vos obligations comptables : contactez-nous via ce formulaire pour une collaboration sur mesure.
            </div>
    </section>
    <!--====== End Case Details Section ======-->
@endsection
