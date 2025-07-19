@extends('layouts.master')
@section('showPartenaire')

        <!--====== Start Page Section ======-->
        <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
            <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png ')}}" alt="shape"></span></div>
            <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}" alt="shape"></span></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="row">
                            <!--=== Page Banner Content ===-->
                            <div class="page-banner-content text-center text-white">
                                <h1 class="page-title">@lang('extracted.team_details')</h1>
                                <ul class="breadcrumb-link text-white">
                                    <li><a href="index.html">@lang('extracted.pages')</a></li>
                                    <li class="active">@lang('extracted.team_details')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Page Section ======-->
        <!--====== Start Team Details Section ======-->
        <section class="team-details-section secondary-dark-bg pt-140 pb-100">
            <div class="container" style="margin-top: -100px">
                <div class="team-details-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="member-image mb-50  wow fadeInLeft">
                                <img src="{{ asset('assets/images/team/member-7.jpg') }}" alt="Member image">
                                <ul class="social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="member-info mb-50 wow fadeInRight">
                                <h3>@lang('extracted.benjamin_r_parker')</h3>
                                <p class="position">@lang('extracted.product_designer')</p>
                                <p>@lang('extracted.digital_agencies_offer_businesses_a_competitive_edge_by_crafting_customized_strategies_that_align_with_specific_goals_they_leverage_market_insights_to_identify_target_audiences_and_design_campaigns_that_resonate_across_various_digital_platforms_by_interpreting_data_analytics_these_agencies_refine_their_strategies_ensuring_maximum_impact_and_return_on_investment')</p>
                                <div class="member-contact mt-35">
                                    <h3>@lang('extracted.get_in_touch')</h3>
                                    <ul>
                                        <li>
                                            <div class="iconic-box style-seven mb-50">
                                                <div class="icon">
                                                    <img src="{{ asset('assets/images/icon/call2.png')}}" alt="icon">
                                                </div>
                                                <div class="content">
                                                    <h4>@lang('extracted.call_us')</h4>
                                                    <p><a href="tel:+8802838394782">@lang('extracted.88012_2390_3829')</a></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="iconic-box style-seven mb-50">
                                                <div class="icon">
                                                    <img src="{{ asset('assets/images/icon/envelope2.png')}}" alt="icon">
                                                </div>
                                                <div class="content">
                                                    <h4>@lang('extracted.email_us')</h4>
                                                    <p><a href="mailto:yourmailaddress@gmail.com">yourmailaddress@gmail.com</a></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="iconic-box style-seven mb-50">
                                                <div class="icon">
                                                    <img src="{{ asset('assets/images/icon/map2.png')}}" alt="icon">
                                                </div>
                                                <div class="content">
                                                    <h4>@lang('extracted.location')</h4>
                                                    <p>@lang('extracted.silvermist_stone_meadows_mythosian_highlands_ny_usa')</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="certificate-item mb-40 wow fadeInUp">
                                <div class="certificate-image">
                                    <img src="{{ asset('assets/images/team/c-1.jpg') }}" alt="certificate">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="certificate-item mb-40 wow fadeInDown">
                                <div class="certificate-image">
                                    <img src="{{ asset('assets/images/team/c-2.jpg')}}" alt="certificate">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="certificate-item mb-40 wow fadeInUp">
                                <div class="certificate-image">
                                    <img src="{{ asset('assets/images/team/c-3.jpg')}}" alt="certificate">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Team Details Section ======-->
        <!--====== Start Footer Section ======-->
       
    
@endsection