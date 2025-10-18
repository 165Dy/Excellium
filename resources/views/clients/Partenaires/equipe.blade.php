@extends('layouts.master')
@section('indexEquipe')

    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shape"></span></div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span></div>
        <div class="shape shape-three"><span><img src="{{ asset('assets/images/shape/p-3.png') }}" alt="shape"></span>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h2 class="page-title">@lang('extracted.notre_equipe')</h2>
                            <p>
                                Découvrez les membres de notre équipe, des professionnels engagés pour vous accompagner dans
                                vos projets.
                            </p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="{{ route('welcome') }}">@lang('extracted.accueil')</a></li>
                                <li class="active">@lang('extracted.notre_equipe')</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->

    <!--====== Start Team Section ======-->
    <section class="team-section secondary-dark-bg pt-140 pb-110">
        <div class="container" style="margin-top: -100px">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item style-one mb-30 wow fadeInUp">
                        <div class="member-image">
                            <img src="{{ asset('assets/images/T_3.jpg') }}" alt="Team Member">
                            <div class="share"><i class="far fa-plus"></i></div>
                            <ul class="social-link">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="member-info">
                            <h3><a href="{{ route('clients.partenaires.show') }}">@lang('extracted.lora_f_searfina')</a></h3>
                            <p class="position">@lang('extracted.uiux_designer')</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item style-one mb-30 wow fadeInUp">
                        <div class="member-image">
                            <img src="{{ asset('assets/images/T_4.jpg') }}" alt="Team Member">
                            <div class="share"><i class="far fa-plus"></i></div>
                            <ul class="social-link">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="member-info">
                            <h3><a href="{{ route('clients.partenaires.show') }}">@lang('extracted.lora_f_searfina')</a></h3>
                            <p class="position">@lang('extracted.uiux_designer')</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item style-one mb-30 wow fadeInUp">
                        <div class="member-image">
                            <img src="{{ asset('assets/images/T_2.png') }}" alt="Team Member" style="height: 420px">
                            <div class="share"><i class="far fa-plus"></i></div>
                            <ul class="social-link">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="member-info">
                            <h3><a href="{{ route('clients.partenaires.show') }}">@lang('extracted.lora_f_searfina')</a></h3>
                            <p class="position">@lang('extracted.uiux_designer')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Team Section ======-->

@endsection
