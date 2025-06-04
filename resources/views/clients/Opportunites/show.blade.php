@extends('layouts.master')
@section('showOpportunite')
    <!--====== Start Page Section ======-->
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shape"></span></div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h1 class="page-title">Details</h1>
                            <p>Lorem voluptatem accusantium dolorem </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->
    <!--====== Start Product Details Section ======-->
    <section class="product-details-section secondary-dark-bg pt-140 pb-130">
        <div class="container" style="margin-top: -100px">
            <div class="product-details-wrapper">
                <div class="row align-items-xl-center">
                    <div class="col-xl-6">
                        <!--=== Product Gallery ===-->
                        <div class="product-gallery-area mb-50 wow fadeInLeft">
                            <div class="product-big mb-30">
                                <div class="product-img">
                                    <a href="{{ asset('assets/images/products/product-big-1.jpg') }}" class="img-popup">
                                        <img src="{{ asset('assets/images/products/product-big-1.jpg') }}" alt="Product1">
                                    </a>
                                </div>

                            </div>
                            <div class="categ">
                                <h3>Offres similaires</h3>
                            </div><br>
                            <div class="product-thumb-slider">
                                <div class="product-img">
                                    <img src="{{ asset('assets/images/products/thumb-1.jpg') }}" alt="Product">
                                    <p>lorem ipsum re....</p>

                                    <p>04 jan 2025</p>

                                    <li>CIE</li>
                                </div>
                                <div class="product-img">
                                    <img src="{{ asset('assets/images/products/thumb-2.jpg') }}" alt="Product">
                                    <p>lorem ipsum re....</p>


                                    <p>04 jan 2025</p>

                                    <li>CIE</li>


                                </div>
                                <div class="product-img">
                                    <img src="{{ asset('assets/images/products/thumb-3.jpg') }}" alt="Product">
                                    <p>lorem ipsum re....</p>

                                    <p>04 jan 2025</p>

                                    <li>CIE</li>
                                </div>
                                <div class="product-img">
                                    <img src="{{ asset('assets/images/products/thumb-2.jpg ') }}" alt="Product">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <!--=== Product Info ===-->
                        <div class="product-info mb-50 wow fadeInRight">
                            <span class="stock">Expire le : 25 juin 2025</span>
                            <h4>Sport Streaming Application</h4>
                            <ul class="ratings">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <p>Digital agencies are a driving force behind the success of many businesses, helping them
                                navigate the complex world online marketing, web development, and digital branding. In this
                                article, we will explore the essential role of digital agencies in modern business and why
                                partnering with one can be a game-changer marketing is not just about having a website and a
                                few social media profiles encompasses various disciplines</p>
                            <div class="product-cart mt-20 mb-30">
                                <ul>

                                    <button class="theme-btn style-one">
                                        <div class="icon">
                                            <i class="icon-briefcase"> Postuler</i>

                                        </div>

                                    </button>
                                </ul>
                            </div>
                            <ul class="product-meta pb-35 mb-40">
                                <li><span>Categories</span><a href="#">Restaurant</a></li>
                                <li><span>Tags</span><a href="#">Pizza, Burger, Soup</a></li>
                                <li><span>Share</span>
                                    <a href="#" class="social facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="social plane"><i class="far fa-paper-plane"></i></a>
                                    <a href="#" class="social instagram"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInDown">
                    <div class="col-lg-12">
                        <div class="description-tabs mt-50 mb-40">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#descrptions">Product
                                        Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#reviews">Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="descrptions">
                                <div class="description-content">
                                    <p>Digital marketing is not just about having a website and a few social media profiles.
                                        It encompasses various disciplines, including search engine optimization (SEO),
                                        content marketing, pay-per-click (PPC) advertising, email marketing, social media
                                        management, and more. Digital agencies specialize in these areas, staying up-to-date
                                        with the latest trends, algorithms, and technologies to ensure their clients'
                                        success.s</p>
                                    <ul class="check-list style-one">
                                        <li><i class="far fa-check"></i>Yes, we provide ongoing engagement to ensure the
                                            sustained success</li>
                                        <li><i class="far fa-check"></i>We excel in financial analysis, helping you make
                                            informed decisions</li>
                                        <li><i class="far fa-check"></i>Yes, we provide ongoing engagement to ensure the
                                            sustained success</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews">
                                <div class="description-content">
                                    <p>Digital marketing is not just about having a website and a few social media profiles.
                                        It encompasses various disciplines, including search engine optimization (SEO),
                                        content marketing, pay-per-click (PPC) advertising, email marketing, social media
                                        management, and more. Digital agencies specialize in these areas, staying up-to-date
                                        with the latest trends, algorithms, and technologies to ensure their clients'
                                        success.s</p>
                                    <ul class="check-list style-one">
                                        <li><i class="far fa-check"></i>Yes, we provide ongoing engagement to ensure the
                                            sustained success</li>
                                        <li><i class="far fa-check"></i>We excel in financial analysis, helping you make
                                            informed decisions</li>
                                        <li><i class="far fa-check"></i>Yes, we provide ongoing engagement to ensure the
                                            sustained success</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Product Details Section ======-->
    <!--====== Start Footer Section ======-->
@endsection
