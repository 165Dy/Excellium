@extends('layouts.master')
@section('showPartenaire')
    <!--====== Start Team Details Section ======-->
    <section class="team-details-section secondary-dark-bg pt-140 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h1 class="page-title">Details</h1>
                            <p>Lorem voluptatem accusantium dolorem quis its tium totamrem aperiam eaque ipsaquae inventore
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="container">
            <div class="team-details-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="member-image mb-50  wow fadeInLeft">
                            <img src="{{asset('assets/images/team/member-7.jpg')}}" alt="Member image">
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
                            <h3>Benjamin R. Parker</h3>
                            <p class="position">Product Designer</p>
                            <p>Digital agencies offer businesses a competitive edge by crafting customized strategies that
                                align with specific goals. They leverage market insights to identify target audiences and
                                design campaigns that resonate across various digital platforms. By interpreting data
                                analytics, these agencies refine their strategies, ensuring maximum impact and return on
                                investment.</p>
                            <div class="member-contact mt-35">
                                <h3>Get In Touch</h3>
                                <ul>
                                    <li>
                                        <div class="iconic-box style-seven mb-50">
                                            <div class="icon">
                                                <img src="{{asset('assets/images/icon/call2.png')}}" alt="icon">
                                            </div>
                                            <div class="content">
                                                <h4>Call Us</h4>
                                                <p><a href="tel:+8802838394782">+88012 2390 3829</a></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="iconic-box style-seven mb-50">
                                            <div class="icon">
                                                <img src="{{asset('assets/images/icon/envelope2.png')}}" alt="icon">
                                            </div>
                                            <div class="content">
                                                <h4>Email Us</h4>
                                                <p><a href="mailto:yourmailaddress@gmail.com">yourmailaddress@gmail.com</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="iconic-box style-seven mb-50">
                                            <div class="icon">
                                                <img src="{{asset('assets/images/icon/map2.png')}}" alt="icon">
                                            </div>
                                            <div class="content">
                                                <h4>Location</h4>
                                                <p>Silvermist Stone Meadows, Mythosian Highlands, NY, USA</p>
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
                                <img src="{{asset('assets/images/team/c-1.jpg')}}" alt="certificate">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="certificate-item mb-40 wow fadeInDown">
                            <div class="certificate-image">
                                <img src="{{asset('assets/images/team/c-2.jpg')}}" alt="certificate">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="certificate-item mb-40 wow fadeInUp">
                            <div class="certificate-image">
                                <img src="{{asset('assets/images/team/c-3.jpg')}}" alt="certificate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Team Details Section ======-->
@endsection
