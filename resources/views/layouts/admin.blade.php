<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title> | AESD - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />

    
    <!-- Flatpickr Timepicker css -->
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}">
    <!-- Icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">



</head>

<!-- body start -->

<body data-menu-color="light" data-sidebar="default">
    <!-- Begin page -->
    <div id="app-layout">

        <!-- Topbar Start -->
        <div class="topbar-custom">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <li>
                            <button class="button-toggle-menu nav-link">
                                <i data-feather="menu" class="noti-icon"></i>
                            </button>
                        </li>
                        <li class="d-none d-lg-block">
                            <h5 class="mb-0">Welcome, {{ Auth::user()->name }}</h5>
                        </li>
                    </ul>

                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                        <li class="d-none d-lg-block">
                            <div class="position-relative topbar-search">
                                <input type="text" class="form-control bg-light bg-opacity-75 border-light ps-4"
                                    placeholder="Search...">
                                <i
                                    class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                            </div>
                        </li>

                        <li class="d-none d-sm-flex">
                            <button type="button" class="btn nav-link" data-toggle="fullscreen">
                                <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                            </button>
                        </li>

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i data-feather="bell" class="noti-icon"></i>
                                <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div class="noti-scroll" data-simplebar>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary active">
                                        <div class="notify-icon">
                                            <img src="{{ asset('assets/images/users/user-12.jpg ') }}"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Carl Steadham</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed <span class="text-reset">Improve workflow in
                                                    Figma</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ asset('assets/images/users/user-2.jpg ') }}"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Olivia McGuire</p>
                                                <small class="text-muted">1 min ago</small>
                                            </div>

                                            <div class="d-flex mt-2 align-items-center">
                                                <div class="notify-sub-icon">
                                                    <i class="mdi mdi-download-box text-dark"></i>
                                                </div>

                                                <div>
                                                    <p class="notify-details mb-0">dark-themes.zip</p>
                                                    <small class="text-muted">2.4 MB</small>
                                                </div>
                                            </div>

                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ asset('assets/images/users/user-3.jpg ') }}"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Travis Williams</p>
                                                <small class="text-muted">7 min ago</small>
                                            </div>
                                            <p class="noti-mentioned p-2 rounded-2 mb-0 mt-2"><span
                                                    class="text-primary">@Patryk</span> Please make sure that
                                                you're....</p>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ asset('assets/images/users/user-8.jpg ') }}"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Violette Lasky</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed <span class="text-reset">Create new
                                                    components</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ asset('assets/images/users/user-5.jpg ') }}"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="notify-details">Ralph Edwards</p>
                                            <small class="text-muted">5 min ago</small>
                                        </div>
                                        <p class="mb-0 user-msg">
                                            <small class="fs-14">Completed <span class="text-reset">Improve workflow
                                                    in React</span></small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item notify-item text-muted link-primary">
                                        <div class="notify-icon">
                                            <img src="{{ asset('assets/images/users/user-6.jpg ') }}"
                                                class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <div class="notify-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="notify-details">Jocab jones</p>
                                                <small class="text-muted">7 min ago</small>
                                            </div>
                                            <p class="noti-mentioned p-2 rounded-2 mb-0 mt-2"><span
                                                    class="text-reset">@Patryk</span> Please make sure that you're....
                                            </p>
                                        </div>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fe-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                @if (Auth::user()->profile_photo)
                                    <img  alt="user-image"
                                        src="{{ asset(Auth::user()->profile_photo) }}" class="rounded-circle" />
                                @else
                                    <img src="{{ asset('assets/images/users/user-5.jpg ') }}" alt="user-image"
                                        class="rounded-circle"/>
                                @endif
                                <span class="pro-user-name ms-1">
                                    {{ Auth::user()->name }}
                                    <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">{{ Auth::user()->email }}</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('profile.show') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                    <span>profil</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('welcome') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-home-outline fs-16 align-middle"></i>
                                    <span>Home</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->

                                <form method="POST" action="{{ route('logout') }}" x-data>

                                    @csrf

                                    <button class="btn btn-secondary">
                                        <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                        {{ __('Log Out') }}
                                    </button>

                                </form>

                            </div>
                        </li>

                    </ul>
                </div>

            </div>

        </div>
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        <div class="app-sidebar-menu">
            <div class="h-100" data-simplebar>

                <!--- Sidemenu -->


                <div id="sidebar-menu">

                    <div class="logo-box">


                        <a href="{{ route('welcome') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                {{-- <img src="{{asset('assets/images/favivon.ico ' ) }}" alt="" height="22"> --}}
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo_large.png ') }}" alt=""
                                    height="35">
                            </span>
                        </a>
                    </div>

                    <ul id="side-menu">

                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="{{ route('dashboard_admin') }}">
                                <i data-feather="table"></i>
                                <span> Dashboard </span>
                                <!-- <span class="menu-arrow"></span> -->
                            </a>

                        </li>

                        <li class="menu-title mt-2">Generale</li>

                        <li>
                            <a href="{{ route('admin.Eglise.index') }}" class="tp-link">
                                <i class="mdi mdi-home-silo-outline"></i>
                                <span> Mon Eglise </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.caisse.create') }}" class="tp-link">
                                <i class="mdi mdi-wallet"></i>
                                <span>Portefeuille </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.communaute.index') }}" class="tp-link">
                                <i class="mdi mdi-account-group"></i>
                                <span>Ma Communauté </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.publication.index') }}" class="tp-link">
                                <i class="mdi mdi-invoice-text-send"></i>
                                <span> Publications </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.evenement.create') }}" class="tp-link">
                                <i class="mdi mdi-receipt-text-clock"></i>
                                <span> Evenements </span>
                            </a>
                        </li>

                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    {{-- @if (session('success'))
                        <div class="alert alert-success mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif --}}


                    {{-- @if (session('success'))
                        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <i data-feather="bell" class="noti-icon"></i>
                                <strong class="me-auto">Notification</strong>
                                <small class="text-muted">Maintenant</small>
                                <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body"> {{ session('success') }}</div>
                        </div>
                    @endif --}}

                    @if (session('success'))
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                $notification({
                                    text: "{{ session('success') }}",
                                    variant: "info",
                                    position: "center-top"
                                });
                            });
                        </script>
                    @endif

                    @yield('content')
                    @yield('indexEglise')
                    @yield('createEglise')
                    @yield('editEglise')
                    @yield('showEglise')
                    @yield('indexCaisse')
                    @yield('createCaisse')
                    @yield('indexCommunaute')
                    @yield('indexPublication')
                    @yield('createPublication')
                    @yield('createEvenement')
                    @yield('showEvenement')
                    @yield('createProgramme')

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col fs-13 text-muted text-center">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a
                                href="#!" class="text-reset fw-semibold">AESD | themes</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const offlinePage = '/offline.html'; // URL de la page offline statique

                // Gestion de la déconnexion
                window.addEventListener('offline', () => {
                    if (window.location.pathname !== offlinePage) {
                        window.location.href = offlinePage; // Rediriger vers la page statique
                    }
                });

                window.addEventListener('online', () => {
                    if (window.location.pathname === offlinePage && previousPage) {
                        window.location.href = previousPage; // Retourner à la page précédente
                    }
                });

                if ('serviceWorker' in navigator) {
                    navigator.serviceWorker.register('/sw.js').then((registration) => {
                        console.log('Service Worker enregistré avec succès :', registration);
                    }).catch((error) => {
                        console.log('Erreur lors de l\'enregistrement du Service Worker :', error);
                    });
                }
            });
        </script>


    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/quill/quill.core.js') }}"></script>
    <script src="{{ asset('assets/js/pages/quilljs.init.js') }}"></script>

    <!-- Quill Editor Js -->
    <script src="{{ asset('assets/libs/quill/quill.core.js') }}"></script>
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
    <!-- Flatpickr Timepicker Plugin js -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-picker.js') }}"></script>
    <!-- Quill Demo Js -->
    <script src="{{ asset('assets/js/pages/quilljs.init.js') }}"></script>
    <!-- App js-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
     <!-- Apexcharts JS -->
     <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

     <!-- Boxplot Charts Init Js -->
     <script src="{{ asset('assets/js/pages/apexcharts-pie.init.js')}}"></script>

  

</body>

</html>
