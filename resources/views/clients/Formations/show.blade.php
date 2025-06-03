@extends('layouts.master')
@section('formations.show')
    <section class="page-banner p-r z-1 pt-170 pb-70 overflow-hidden">
        <div class="shape shape-one scene"><span data-depth="1"><img src="{{ asset('assets/images/shape/p-1.png') }}"
                    alt="shape"></span></div>
        <div class="shape shape-two scene"><span data-depth="2"><img src="{{ asset('assets/images/shape/p-2.png') }}"
                    alt="shape"></span></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <!--=== Page Banner Content ===-->
                        <div class="page-banner-content text-center text-white">
                            <h1 class="page-title">Theme: {{ $formation->titre }}</h1>
                            <ul class="breadcrumb-link text-white">
                                <li><a href="index.html">Pages</a></li>
                                <li class="active">Blog Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Page Section ======-->
    <!--====== Start Blog Details Section ======-->
    <section class="blog-details-section secondary-dark-bg pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-wrapper">
                        <div class="blog-post mb-50 wow fadeInDown">
                            <div class="main-post">
                                <div class="entry-content">
                                    <p>Businesses are increasingly relying expertise of digital agencies to navigate the
                                        complexities of online presence and engagement. A digital agency serves as a
                                        strategic partner, providing a comprehensive suite of services aimed at optimizing a
                                        company's digital</p>
                                    <div class="block-image">
                                        <img src="{{ asset('assets/images/blog/blog-single-1.jpg') }}" alt="">
                                    </div>
                                    <p>From web design and development to social media management, search engine
                                        optimization, and content creation, digital agencies offer a tailored approach to
                                        enhancing brand visibility and customer engagement. These agencies bring together
                                        creative minds, tech-savvy professionals, and data analysts to create compelling and
                                        cohesive online experiences.</p>

                                    <p>From web design and development to social media management, search engine
                                        optimization, and content creation, digital agencies offer a tailored approach to
                                        enhancing brand visibility and customer engagement. These agencies bring together
                                        creative minds, tech-savvy professionals, and data analysts to create compelling and
                                        cohesive online experiences.</p>
                                </div>
                            </div>
                            <div class="entry-footer wow fadeInUp">
                                <div class="tag-links">
                                    <h6>Peut-vous intéresser ? dans la categorie <span ><br>
                                            <h5>
                                                @foreach ($categories as $categorie)
                                                    @if ($formation->categorie_id == $categorie->id)
                                                        <li><a href="#">{{ $categorie->nom }}</a></li>
                                                    @endif
                                                @endforeach
                                            </h5>

                                        </span></h6>

                                </div>
                                <div class="social-share">
                                    <a href="#" class="social facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social linkedin"><i class="fab fa-linkedin-in"></i></a>
                
                                </div>
                            </div>
                        </div>
                        <!--===  Post Navigation  ===-->
                        <div class="post-navigation-item pb-30 mb-55 wow fadeInUp">
                            @foreach ($formationsMemeCategorie as $formationsMemeCategories)
                                <div class="prev-post post-nav-item d-flex mb-30">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/blog/prev.jpg') }}" alt="Post Thumb">
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('Formations.show_public', $formationsMemeCategories->id) }}"
                                            class="read-more"
                                            style=" max-width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                            {{ $formationsMemeCategories->programme }}</a>
                                        </a>
                                        <h6><a href="{{ route('Formations.show_public', $formationsMemeCategories->id) }}">
                                                {{ $formationsMemeCategories->titre }}</a></h6>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!--===  Comments Area  ===-->

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widget-area">
                        <div class="sidebar-widget sidebar-search-widget mb-35 wow fadeInDown">
                            <form>
                                <div class="form-group">
                                    <input type="email" placeholder="Search here..." name="email" style="color:#fff">
                                    <button class="search-btn"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <!--===  Recent Post Widget  ===-->
                        <div class="sidebar-widget sidebar-post-widget mb-35 wow fadeInDown">
                            <h4 class="widget-title">Autres Formations<span class="line"></span></h4>
                            <ul class="recent-post-list">
                                @foreach ($autresFormations as $autreFormation)
                                    <li class="post-thumbnail-content">
                                        <img src="{{ asset('assets/images/blog/post-thumb-1.jpg ') }}" alt="post thumb">
                                        <div class="post-title-date">
                                            <h6><a href="{{ route('Formations.show_public', $autreFormation->id) }}">
                                                    {{ $autreFormation->titre }}</a></h6>
                                            <span class="posted-on"><a
                                                    href="#">{{ $autreFormation->created_at }}</a></span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--===  Category Widget  ===-->
                        <div class="sidebar-widget sidebar-category-widget mb-35 wow fadeInDown">
                            <h4 class="widget-title">Categories<span class="line"></span></h4>
                            <ul class="category-nav">
                                @foreach ($categories as $categorie)
                                    <li><a href=""><i class="far fa-angle-right"></i>
                                            {{ $categorie->nom }} <span></span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Blog Details Section ======-->
    <!--====== Start Footer Section ======-->
@endsection
