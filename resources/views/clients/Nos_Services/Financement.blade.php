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
                            <h2 class="page-title">@lang('extracted.financement')</h2>
                            <p>
                                Découvrez nos solutions de financement adaptées à vos besoins professionnels. Que vous
                                souhaitiez lancer un nouveau projet, développer votre activité ou optimiser votre
                                trésorerie, notre équipe vous accompagne à chaque étape pour trouver la solution la plus
                                avantageuse. Profitez de notre expertise pour concrétiser vos ambitions en toute sérénité.
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
                                votre projet au sommet. Notre équipe d'experts met en œuvre des stratégies de financement
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

            <div class="read-button mb-30 text-center">
                
                <svg width="100" height="100" viewBox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M32 12 L28 20 H36 L32 12 Z" fill="#000" />
                    <path d="M24 20 C16 32, 16 44, 32 52 C48 44, 48 32, 40 20 Z" fill="white" stroke="#000"
                        stroke-width="2" />
                    <text x="28" y="40" font-size="14" fill="black">$</text>
                    <polyline points="40,40 48,32 56,36" fill="none" stroke="green" stroke-width="2">
                        <animate attributeName="points" values="40,40 48,32 56,36; 40,42 48,34 56,38; 40,40 48,32 56,36"
                            dur="1.5s" repeatCount="indefinite" />
                    </polyline>
                </svg>

                Vous recherchez des solutions de financement adaptées ? Inscrivez-vous pour explorer avec nous les meilleures opportunités.
                

            </div>
    </section>
    <!--====== End Case Details Section ======-->
@endsection
