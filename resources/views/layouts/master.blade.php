<!DOCTYPE html>
<html lang="zxx">

<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Insurance, Health, Agency">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--====== Title ======-->
    <title>Excellium Conseils - Agence</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <!--====== Google Fonts ======-->
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&amp;family=Syne:wght@400;500;700&amp;display=swap"
        rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <!--====== FontAwesome css ======-->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontello/css/fontello.css') }}">
    <!--====== FontAwesome css ======-->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.min.css') }}">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--====== Slick-popup css ======-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick.css') }}">
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nice-select/css/nice-select.css') }}">
    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css') }}">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Bootstrap CSS (version 5.x) obligatoire -->
</head>

<body>
    <!--====== Start Preloader ======-->
    <div class="preloader">
        <div class="loader">
            <div class="pre-shadow"></div>
            <div class="pre-box"></div>
        </div>
    </div><!--====== End Preloader ======-->
    <!--====== Start Header Area ======-->
    <header class="header-area header-one transparent-header">
        <div class="container-fluid">
            <div class="header-navigation">
                <div class="nav-overlay"></div>
                <div class="header-nav-inner">
                    <div class="primary-menu">
                        <!--=== Site Branding ===-->
                        <div class="site-branding">
                            <a href="index.html" class="brand-logo">
                                <img src="{{ asset('assets/images/logo_new.jpg') }}" alt="Site Logo"
                                    style="width:100px;"></a>
                        </div>
                        <!--=== Zency Nav Menu ===-->
                        <div class="zency-nav-menu">
                            <!--=== Mobile Logo ===-->
                            <div class="mobile-logo mb-30 d-block d-xl-none text-center">
                                <a href="index.html" class="brand-logo"><img
                                        src="{{ asset('assets/images/logo_new.jpg') }}" alt="Site Logo"
                                        style=" width: 80px;"></a>
                            </div>

                            <!--=== Main Menu ===-->
                            <nav class="main-menu">
                                <ul>
                                    <li class="menu-item has-children"><a href="{{ route('welcome') }}">
                                            <h5>Excellium Conseil</h5>
                                        </a>

                                    </li>
                                    <li class="menu-item has-children"><a href="#">Nos Services</a>
                                        <ul class="sub-menu">
                                            <li><a href="">Audit & conseil</a></li>
                                            <li><a href="{{ route('Compta_Fiscale') }}">Comptable & Fiscale</a></li>
                                            <li><a href="{{ route('Ressources_humaines') }}">R. Humaines</a></li>
                                            <li><a href="{{ route('Gestion_Paie') }}">Gestion de la Paie</a></li>
                                            <li><a href="{{ route('Financement') }}">Financement</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children"><a href="#">Ressources</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('Ressources.conseils_actualites') }}">Actualités</a>
                                            </li>
                                            <li><a href="{{ route('Ressources.conseils_actualites') }}">Commerce
                                                    Generale</a></li>
                                            <li><a href="{{ route('Ressources.Entrepreunariat') }}">Import-Export</a>
                                            <li><a href="{{ route('Ressources.conseils_actualites') }}">Gestion de
                                                    Biens</a></li>
                                            <li><a href="{{ route('Ressources.Entrepreunariat') }}">Services Divers</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children"><a href="#">Partenaires</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('Partenaires.Collaborateurs') }}">Collaborateurs</a>
                                            </li>
                                            <li><a href="{{ route('Partenaires.Entreprises') }}">Entreprises</a></li>
                                            <li><a href="{{ route('Partenaires.show') }}">Show</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children"><a href="#">Opportunités</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('Espace_clients.documents') }}">Documents</a></li>
                                            <li><a href="{{ route('Espace_clients.outils') }}">Outils en ligne</a></li>

                                        </ul>
                                    </li>
                                    <li class="menu-item has-children"><a href="{{ route('Formations.index') }}">Formations</a></li>


                                </ul>

                            </nav>
                        </div>
                        <div class="nav-right-item">
                            <div class="navbar-toggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!--====== End Header Area ======-->


    @yield('welcome')
    {{-- // --}}
    @yield('Articles')
    @yield('Conseils_actualites')
    @yield('Ressources_entrepreunariats')
    {{-- /RESSOURCES/ --}}
    @yield('Entreprises')
    @yield('Collaborateurs')
    {{-- /PARTENAIRES/ --}}
    @yield('outils')
    @yield('documents')
    @yield('showPartenaire')
    {{-- /ESPACE_CLIENTS/ --}}
    @yield('Audit')
    @yield('Compta')
    @yield('Fiscalite')
    @yield('Gestion_entreprise')
    {{-- /FORMATIONS/ --}}
    
    @yield('formations.index')
    @yield('formations.show')
    {{-- /NOS SERVICES/ --}}
    @yield('contact')


    <!--====== Start Footer Section ======-->
    <footer class="footer-default pt-100">
        <div class="container">
            <!--=== Footer Widget Area ===-->
            <div class="footer-widget-area pb-60">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <!--=== Footer Widget ===-->
                        <div class="footer-widget about-company-widget mb-40 wow fadeInUp">
                            <div class="footer-logo mb-3">
                                <a href="index.html"><img
                                        src="{{ asset('assets/images/logo_new.jpg') }}" alt="Footer Logo"
                                        style="width:120px; max-width:100%; height:auto;"></a>
                            </div>
                            <p>
                                Excellium Conseils, c’est bien plus qu’un cabinet de conseil :
                                c’est un partenaire de confiance pour votre réussite financière 💼📊
                            </p>
                            <ul class="social-link style-one">
                                <li><a href="https://www.facebook.com/share/199uiSgsQ7/"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://ci.linkedin.com/company/excelliumconseils-ci"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://wa.me/message/XYBTJGPX4AC4E1"><i class="fab fa-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                        <!--=== Footer Widget ===-->
                        <div class="footer-widget footer-nav-widget mb-25 wow fadeInDown">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-3">
                                    <h4 class="footer-title">Explore</h4>
                                    <ul class="footer-nav">
                                        <li><a href="#">A propos de nous</a></li>
                                        <li><a href="#">Notre Equipe</a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <h4 class="footer-title">Lien</h4>
                                    <ul class="footer-nav">
                                        <li><a href="#">Pricing Plan</a></li>
                                        <li><a href="#">Notre Objectifs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-12 mb-4">
                        <!--=== Footer Widget ===-->
                        <div class="footer-widget contact-info-widget mb-15 wow fadeInUp">
                            <h4 class="footer-title">Contactez-nous</h4>
                            <ul>
                                <li>
                                    <div class="iconic-box style-five mb-25">
                                        <div class="icon">
                                            <i class="icon-map"></i>
                                        </div>
                                        <div class="content">
                                            <p>Abidjan, Yopougon Palais</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="iconic-box style-five mb-25">
                                        <div class="icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <p>
                                                <a href="mailto:direction@excelliumconseils.com">direction@excelliumconseils.com</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="iconic-box style-five mb-25">
                                        <div class="icon">
                                            <i class="icon-phone"></i>
                                        </div>
                                        <div class="content">
                                            <p><a href="tel:(+225)0707672957">(+225) 0707672957</a></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--=== Copyright Area ===-->
            <div class="copyright-area">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>Copyright &copy;2025, <span>Excellium Conseils</span> All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!--====== End Footer Section ======-->
    <!--====== Back To Top  ======-->
    <a href="{{ route('contacts') }}" class="back-to-top-message"><i class="far fa-envelope"></i></a>
    <a href="#" class="back-to-top"><i class="far fa-angle-up"></i></a>
    <!--====== Jquery js ======-->
    <script src="{{ asset('assets/vendor/jquery-3.6.0.min.js') }}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{ asset('assets/vendor/popper/popper.min.js') }}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--====== Slick js ======-->
    <script src="{{ asset('assets/vendor/slick/slick.min.js') }}"></script>
    <!--====== Images Loaded js ======-->
    <script src="{{ asset('assets/vendor/imagesloaded.min.js') }}"></script>
    <!--====== Isotope js ======-->
    <script src="{{ asset('assets/vendor/isotope.min.js') }}"></script>
    <!--====== Counterup js ======-->
    <script src="{{ asset('assets/vendor/jquery.counterup.min.js') }}"></script>
    <!--====== Waypoints js ======-->
    <script src="{{ asset('assets/vendor/jquery.waypoints.js') }}"></script>
    <!--====== Nice-select js ======-->
    <script src="{{ asset('assets/vendor/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <!--====== Parallax js ======-->
    <script src="{{ asset('assets/vendor/parallax.min.js') }}"></script>
    <!--====== WOW js ======-->
    <script src="{{ asset('assets/vendor/wow.min.js') }}"></script>
    <!--====== Main js ======-->
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <style>
        .back-to-top-message {
            border-radius: 50%;
            bottom: 400px;
            color: var(--primary-dark-color);
            /* cursor: pointer; */
            font-size: 20px;
            width: 50px;
            height: 50px;
            line-height: 50px;
            position: fixed;
            right: 30px;
            background-color: #FFD22F;
            text-align: center;
            text-decoration: none;

            z-index: 337;
        }

        .back-to-top-message:hover {
            background-color: #f5e3a3;
            animation-duration: 2s;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }
    </style>

</body>

</html>
