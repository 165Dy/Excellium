@extends('layouts.master')
@section('Divers')
    
<section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
    <div class="shape shape-one scene"><span data-depth="1"><img src="{{asset('assets/images/shape/p-1.png')}}" alt="shape"></span>
    </div>
    <div class="shape shape-two scene"><span data-depth="2"><img src="{{asset('assets/images/shape/p-2.png')}}" alt="shape"></span>
    </div>
    <div class="shape shape-three"><span><img src="{{asset('assets/images/shape/p-3.png')}}" alt="shape"></span></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="row">
                    <!--=== Page Banner Content ===-->
                    <div class="page-banner-content text-center text-white">
                        <h2 class="page-title">@lang('extracted.services_divers')</h2>
                        <p>Lorem voluptatem accusantium dolorem quis its tium totamrem aperiam eaque ipsaquae inventore
                        </p>
                        <ul class="breadcrumb-link text-white">
                            <li><a href="index.html">@lang('extracted.pages')</a></li>
                            <li class="active">@lang('extracted.entrepreunariat')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Page Section ======-->


 <section class="blog-grid-section secondary-dark-bg pt-140 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-two mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="{{asset('assets/images/blog/blog-6.jpg')}}" alt="Post Image">
                            <ul class="post-categories">
                                <li><a href="#">@lang('extracted.marketing')</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#" class="post-admin"><i class="far fa-user-alt"></i>@lang('extracted.by_admin')</a>
                                <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>@lang('extracted.25_sep_2023')</a>
                            </div>
                            <h4 class="title"><a href="blog-details.html">@lang('extracted.reflect_your_brilliance_with_business_captivating')</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-two mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="{{asset('assets/images/blog/blog-7.jpg')}}" alt="Post Image">
                            <ul class="post-categories">
                                <li><a href="#">@lang('extracted.business')</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#" class="post-admin"><i class="far fa-user-alt"></i>@lang('extracted.by_admin')</a>
                                <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>@lang('extracted.25_sep_2023')</a>
                            </div>
                            <h4 class="title"><a href="blog-details.html">@lang('extracted.lets_the_wave_of_cleints_splash_you')</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-two mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="{{asset('assets/images/blog/blog-8.jpg')}}" alt="Post Image">
                            <ul class="post-categories">
                                <li><a href="#">@lang('extracted.marketing')</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#" class="post-admin"><i class="far fa-user-alt"></i>@lang('extracted.by_admin')</a>
                                <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>@lang('extracted.25_sep_2023')</a>
                            </div>
                            <h4 class="title"><a href="blog-details.html">@lang('extracted.sharing_you_and_your_company_with_the_world')</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-two mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="{{asset('assets/images/blog/blog-9.jpg')}}" alt="Post Image">
                            <ul class="post-categories">
                                <li><a href="#">@lang('extracted.business')</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#" class="post-admin"><i class="far fa-user-alt"></i>@lang('extracted.by_admin')</a>
                                <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>@lang('extracted.25_sep_2023')</a>
                            </div>
                            <h4 class="title"><a href="blog-details.html">@lang('extracted.the_breeding_ground_for_breakthrough_ideas')</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-two mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="{{asset('assets/images/blog/blog-10.jpg')}}" alt="Post Image">
                            <ul class="post-categories">
                                <li><a href="#">@lang('extracted.marketing')</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#" class="post-admin"><i class="far fa-user-alt"></i>@lang('extracted.by_admin')</a>
                                <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>@lang('extracted.25_sep_2023')</a>
                            </div>
                            <h4 class="title"><a href="blog-details.html">@lang('extracted.unleash_growth_with_ingenious_hacks')</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-two mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="{{asset('assets/images/blog/blog-11.jpg')}}" alt="Post Image">
                            <ul class="post-categories">
                                <li><a href="#">@lang('extracted.business')</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#" class="post-admin"><i class="far fa-user-alt"></i>@lang('extracted.by_admin')</a>
                                <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>@lang('extracted.25_sep_2023')</a>
                            </div>
                            <h4 class="title"><a href="blog-details.html">@lang('extracted.propel_forward_with_data_driven_marketing')</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-two mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="{{asset('assets/images/blog/blog-12.jpg')}}" alt="Post Image">
                            <ul class="post-categories">
                                <li><a href="#">@lang('extracted.marketing')</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#" class="post-admin"><i class="far fa-user-alt"></i>@lang('extracted.by_admin')</a>
                                <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>@lang('extracted.25_sep_2023')</a>
                            </div>
                            <h4 class="title"><a href="blog-details.html">@lang('extracted.maximize_roi_with_our_expert_insights')</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-two mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="{{asset('assets/images/blog/blog-13.jpg')}}" alt="Post Image">
                            <ul class="post-categories">
                                <li><a href="#">@lang('extracted.business')</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#" class="post-admin"><i class="far fa-user-alt"></i>@lang('extracted.by_admin')</a>
                                <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>@lang('extracted.25_sep_2023')</a>
                            </div>
                            <h4 class="title"><a href="blog-details.html">@lang('extracted.build_futures_of_the_leave_excuses_behind')</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item style-two mb-30 wow fadeInDown">
                        <div class="post-thumbnail">
                            <img src="{{asset('assets/images/blog/blog-14.jpg')}}" alt="Post Image">
                            <ul class="post-categories">
                                <li><a href="#">@lang('extracted.marketing')</a></li>
                            </ul>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="#" class="post-admin"><i class="far fa-user-alt"></i>@lang('extracted.by_admin')</a>
                                <a href="#" class="post-date"><i class="far fa-calendar-alt"></i>@lang('extracted.25_sep_2023')</a>
                            </div>
                            <h4 class="title"><a href="blog-details.html">@lang('extracted.grow_smarter_with_the_strategic_marketing')</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="zency-pagination text-center mt-30 wow fadeInDown">
                        <li><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                        <li><a href="#" class="active"><i class="far fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--====== End Blog Section ======-->


@endsection