@extends('layouts.master')
@section('contact')
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
                            <h1 class="page-title">Contactez</h1>
                            <p>Lorem voluptatem accusantium dolorem quis its tium totamrem aperiam eaque ipsaquae inventore
                            </p>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->
    <!--====== Start Contact-info Section ======-->
    <section class="contact-info-section secondary-dark-bg pt-140 pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="map-box mb-50 wow fadeInLeft">
                        {{-- <iframe src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe> --}}
                        <img src="{{ asset('assets/images/img_6.jpg') }}" alt=""
                            style="border-radius: 10px 10px;height:510px">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-content-box">
                        <ul>
                            <li>
                                <div class="iconic-box style-four mb-50 wow fadeInDown" >
                                    <a href=""></a>
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/icon/map.svg') }}" alt="icon">
                                    </div>
                                    <div class="content">
                                        {{-- <h4>Localisation</h4> --}}
                                        <a href="https://www.google.com/maps/place/5%C2%B019'18.6%22N+4%C2%B004'40.9%22W/@5.3218463,-4.0805939,17z/data=!3m1!4b1!4m4!3m3!8m2!3d5.321841!4d-4.078019?entry=ttu&g_ep=EgoyMDI1MDYwMS4wIKXMDSoASAFQAw%3D%3D">
                                            <h4>Localisation</h4>
                                        <p>Yopougon Palais non loin de la Gare Jet Express,</p>
                                        </a>
                                        <style>
                                            .content a {
                                                color: #fff;
                                                text-decoration: none;
                                            }
                                            .content a:hover {
                                                color: #f0a500; /* Couleur de survol */
                                            }
                                        </style>
                                        
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="iconic-box style-four mb-50 wow fadeInDown">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/icon/call.svg') }}" alt="icon">
                                    </div>
                                    <div class="content">
                                        <h4>Notre Contact</h4>
                                        <p><a href="tel:0707672957">+255 07 07 672 957</a></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="iconic-box style-four mb-50 wow fadeInDown">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/icon/envelope.svg') }}" alt="icon">
                                    </div>
                                    <div class="content">
                                        <h4>Addresse Email</h4>
                                        <p><a href="mailto:yourmailaddress@gmail.com">direction@excelliumconseils.com</a></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="iconic-box style-four mb-50 wow fadeInDown">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/icon/send.svg') }}" alt="icon">
                                    </div>
                                    <div class="content">
                                        <h4>Website</h4>
                                        <p><a href="https://web.facebook.com/Excellium.conseils?rdid=XJWbWQrGv2Okb1cm&share_url=https%3A%2F%2Fweb.facebook.com%2Fshare%2F199uiSgsQ7%2F%3F_rdc%3D1%26_rdr#">www.facebook.com/Excellium</a></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Contact-info Section ======-->
    <!--====== Start Contact Section ======-->
    <section class="contact-section secondary-dark-bg pb-140">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-30 wow fadeInUp">
                        <span class="sub-title">Contactez-nous</span>
                        <h2>Posez vos questions</h2>
                    </div>
                </div>
            </div>
            <div class="contact-form-wrapper wow fadeInDown">
                <form class="contact-form">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><i class="far fa-user"></i></label>
                                <input type="text" placeholder="Votre nom" name="name" required style="color:rgb(253, 253, 253)">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><i class="far fa-user"></i></label>
                                <input type="email" placeholder="Votre adresse email" name="email" required style="color:rgb(253, 253, 253)">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><i class="far fa-user"></i></label>
                                <input type="text" placeholder="Numéro de téléphone" name="phone" required style="color:rgb(253, 253, 253)">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea name="message" placeholder="Tapez votre message ici..." cols="30" rows="10" style="color:rgb(253, 253, 253)"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group text-center">
                                <button class="theme-btn style-one">Envoyer votre message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section><!--====== End Contact Section ======-->
@endsection
