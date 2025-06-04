<!doctype html>

<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
    data-bs-theme="light" data-assets-path="{{ asset('assets_2/') }}" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Admin | Excellium Conseils</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets_2/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets_2/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css')}} -->

    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/fullcalendar/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_2/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/datatables-select-bs5/select.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_2/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_2/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/css/pages/app-calendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/css/pages/app-ecommerce-dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/css/pages/app-email.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets_2/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets_2/js/config.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        /* Animations pour SweetAlert */
        .animated {
            animation-duration: 0.5s;
            animation-fill-mode: both;
        }
        
        .fadeIn {
            animation-name: fadeIn;
        }
        
        .bounceIn {
            animation-name: bounceIn;
        }
        
        .shakeX {
            animation-name: shakeX;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes bounceIn {
            0%, 20%, 40%, 60%, 80% {
                transform: scale(0.3);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        @keyframes shakeX {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
            20%, 40%, 60%, 80% { transform: translateX(10px); }
        }
        
        /* Style personnalisé pour SweetAlert */
        .swal2-popup {
            border-radius: 15px !important;
        }
        
        .swal2-html-container .card {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center" id="layout-navbar">
                <div class="container-xxl">
                    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-6">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <span class="text-primary">
                                    <svg width="32" height="18" viewBox="0 0 38 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z"
                                            fill="currentColor" />
                                        <path
                                            d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z"
                                            fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
                                        <path
                                            d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z"
                                            fill="currentColor" />
                                        <path
                                            d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                            fill="currentColor" />
                                        <path
                                            d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                            fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
                                        <path
                                            d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z"
                                            fill="currentColor" />
                                        <defs>
                                            <linearGradient id="paint0_linear_2989_100980" x1="5.36642" y1="0.849138"
                                                x2="10.532" y2="24.104" gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-opacity="1" />
                                                <stop offset="1" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_2989_100980" x1="5.19475"
                                                y1="0.849139" x2="10.3357" y2="24.1155"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-opacity="1" />
                                                <stop offset="1" stop-opacity="0" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </span>
                            </span>
                            <span class="app-brand-text demo menu-text fw-semibold ms-1">Materialize</span>
                        </a>

                        <a href="javascript:void(0);"
                            class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                            <i class="icon-base ri ri-close-line icon-sm"></i>
                        </a>
                    </div>

                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base ri ri-menu-line icon-22px"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                            <!-- Search -->
                            <li class="nav-item navbar-search-wrapper me-sm-2 me-xl-0">
                                <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                    <span class="d-inline-block text-body-secondary fw-normal"
                                        id="autocomplete"></span>
                                </a>
                            </li>
                            <!-- /Search -->


                            <!-- Style Switcher -->
                            <li class="nav-item dropdown me-sm-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                                    id="nav-theme" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <i class="icon-base ri ri-sun-line icon-22px theme-icon-active"></i>
                                    <span class="d-none ms-2" id="nav-theme-text">Toggle theme</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-theme-text">
                                    <li>
                                        <button type="button" class="dropdown-item align-items-center active"
                                            data-bs-theme-value="light" aria-pressed="false">
                                            <span><i class="icon-base ri ri-sun-line icon-22px me-3"
                                                    data-icon="sun-line"></i>Light</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item align-items-center"
                                            data-bs-theme-value="dark" aria-pressed="true">
                                            <span><i class="icon-base ri ri-moon-clear-line icon-22px me-3"
                                                    data-icon="moon-clear-line"></i>Dark</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item align-items-center"
                                            data-bs-theme-value="system" aria-pressed="false">
                                            <span><i class="icon-base ri ri-computer-line icon-22px me-3"
                                                    data-icon="computer-line"></i>System</span>
                                        </button>
                                    </li>
                                </ul>
                            </li>
                            <!-- / Style Switcher-->

                            <!-- Quick links -->
                            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-sm-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                                    href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                    aria-expanded="false">
                                    <i class="icon-base ri ri-star-smile-line icon-22px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <div class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h6 class="mb-0 me-auto">Shortcuts</h6>
                                            <a href="javascript:void(0)"
                                                class="btn btn-text-secondary rounded-pill btn-icon dropdown-shortcuts-add text-heading"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Add shortcuts">
                                                <i class="icon-base ri ri-add-line text-heading"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown-shortcuts-list scrollable-container">
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-calendar-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="app-calendar.html" class="stretched-link">Calendar</a>
                                                <small>Appointments</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-file-text-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                                                <small>Manage Accounts</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="icon-base ri ri-user-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="app-user-list.html" class="stretched-link">User App</a>
                                                <small>Manage Users</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-computer-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="app-access-roles.html" class="stretched-link">Role
                                                    Management</a>
                                                <small>Permission</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-pie-chart-2-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="#" class="stretched-link">Dashboard</a>
                                                <small>User Dashboard</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-settings-4-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="pages-account-settings-account.html"
                                                    class="stretched-link">Setting</a>
                                                <small>Account Settings</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-question-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="pages-faq.html" class="stretched-link">FAQs</a>
                                                <small>FAQs & Articles</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="icon-base ri ri-tv-2-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="modal-examples.html" class="stretched-link">Modals</a>
                                                <small>Useful Popups</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Quick links -->

                            <!-- Notification -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-4 me-xl-1">
                                <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                                    href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                    aria-expanded="false">
                                    <i class="icon-base ri ri-notification-2-line icon-22px"></i>
                                    <span
                                        class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <li class="dropdown-menu-header border-bottom py-50">
                                        <div class="dropdown-header d-flex align-items-center py-2">
                                            <h6 class="mb-0 me-auto">Notification</h6>
                                            <div class="d-flex align-items-center h6 mb-0">
                                                <span class="badge rounded-pill bg-label-primary fs-xsmall me-2">8
                                                    New</span>
                                                <a href="javascript:void(0)" class="dropdown-notifications-all p-2"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Mark all as read"><i
                                                        class="icon-base ri ri-mail-open-line text-heading"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="{{ asset('assets_2/img/avatars/1.png') }}"
                                                                alt="avatar" class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">Congratulation Lettie 🎉</h6>
                                                        <small class="mb-1 d-block text-body">Won the monthly best
                                                            seller gold badge</small>
                                                        <small class="text-body-secondary">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-read"><span
                                                                class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-archive"><span
                                                                class="icon-base ri ri-close-line"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span
                                                                class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">Charles Franklin</h6>
                                                        <small class="mb-1 d-block text-body">Accepted your
                                                            connection</small>
                                                        <small class="text-body-secondary">12hr ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-read"><span
                                                                class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-archive"><span
                                                                class="icon-base ri ri-close-line"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="{{ asset('assets_2/img/avatars/2.png') }}"
                                                                alt="avatar" class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">New Message ✉️</h6>
                                                        <small class="mb-1 d-block text-body">You have new message from
                                                            Natalie</small>
                                                        <small class="text-body-secondary">1h ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-read"><span
                                                                class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-archive"><span
                                                                class="icon-base ri ri-close-line"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span
                                                                class="avatar-initial rounded-circle bg-label-success"><i
                                                                    class="icon-base ri ri-shopping-cart-2-line icon-18px"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">Whoo! You have new order 🛒</h6>
                                                        <small class="mb-1 d-block text-body">ACME Inc. made new order
                                                            $1,154</small>
                                                        <small class="text-body-secondary">1 day ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-read"><span
                                                                class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-archive"><span
                                                                class="icon-base ri ri-close-line"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="{{ asset('assets_2/img/avatars/9.png') }}"
                                                                alt="avatar" class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">Application has been approved 🚀</h6>
                                                        <small class="mb-1 d-block text-body">Your ABC project
                                                            application has been approved.</small>
                                                        <small class="text-body-secondary">2 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-read"><span
                                                                class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-archive"><span
                                                                class="icon-base ri ri-close-line"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span
                                                                class="avatar-initial rounded-circle bg-label-success"><i
                                                                    class="icon-base ri ri-pie-chart-2-line icon-18px"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">Monthly report is generated</h6>
                                                        <small class="mb-1 d-block text-body">July monthly financial
                                                            report is generated </small>
                                                        <small class="text-body-secondary">3 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-read"><span
                                                                class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-archive"><span
                                                                class="icon-base ri ri-close-line"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="{{ asset('assets_2/img/avatars/5.png') }}"
                                                                alt="avatar" class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">Send connection request</h6>
                                                        <small class="mb-1 d-block text-body">Peter sent you connection
                                                            request</small>
                                                        <small class="text-body-secondary">4 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-read"><span
                                                                class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-archive"><span
                                                                class="icon-base ri ri-close-line"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="{{ asset('assets_2/img/avatars/6.png') }}"
                                                                alt="avatar" class="rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">New message from Jane</h6>
                                                        <small class="mb-1 d-block text-body">Your have new message
                                                            from Jane</small>
                                                        <small class="text-body-secondary">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-read"><span
                                                                class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-archive"><span
                                                                class="icon-base ri ri-close-line"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <span
                                                                class="avatar-initial rounded-circle bg-label-warning"><i
                                                                    class="icon-base ri ri-error-warning-line icon-18px"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">CPU is running high</h6>
                                                        <small class="mb-1 d-block text-body">CPU Utilization Percent
                                                            is currently at 88.63%,</small>
                                                        <small class="text-body-secondary">5 days ago</small>
                                                    </div>
                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-read"><span
                                                                class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)"
                                                            class="dropdown-notifications-archive"><span
                                                                class="icon-base ri ri-close-line"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="border-top">
                                        <div class="d-grid p-4">
                                            <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                                <small class="align-middle">View all notifications</small>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--/ Notification -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets_2/img/avatars/1.png') }}" alt="avatar"
                                            class="rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets_2/img/avatars/1.png') }}"
                                                            alt="alt" class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0 small">John Doe</h6>
                                                    <small class="text-body-secondary">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-profile-user.html">
                                            <i class="icon-base ri ri-user-3-line icon-22px me-3"></i><span
                                                class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <i class="icon-base ri ri-settings-4-line icon-22px me-3"></i><span
                                                class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-billing.html">
                                            <span class="d-flex align-items-center align-middle">
                                                <i
                                                    class="flex-shrink-0 icon-base ri ri-file-text-line icon-22px me-3"></i>
                                                <span class="flex-grow-1 align-middle">Billing Plan</span>
                                                <span
                                                    class="flex-shrink-0 badge badge-center rounded-pill bg-danger">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-pricing.html">
                                            <i
                                                class="icon-base ri ri-money-dollar-circle-line icon-22px me-3"></i><span
                                                class="align-middle">Pricing</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-faq.html">
                                            <i class="icon-base ri ri-question-line icon-22px me-3"></i><span
                                                class="align-middle">FAQ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="d-grid px-4 pt-2 pb-1">
                                            <a class="btn btn-sm btn-danger d-flex" href="auth-login-cover.html"
                                                target="_blank">
                                                <small class="align-middle">Logout</small>
                                                <i class="icon-base ri ri-logout-box-r-line ms-2 icon-16px"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu flex-grow-0">
                        <div class="container-xxl d-flex h-100">
                            <ul class="menu-inner">
                                <!-- Dashboards -->
                                <li class="menu-item">
                                    <a href="{{ route('dashboard') }}" class="menu-link ">
                                        <i class="menu-icon icon-base ri ri-home-smile-line"></i>
                                        <div data-i18n="Dashboards">Dashboards</div>
                                    </a>
                                </li>

                                <!-- Apps -->
                                <li class="menu-item active">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-mail-open-line"></i>
                                        <div data-i18n="Apps">Apps</div>
                                    </a>
                                    <ul class="menu-sub">
                                        <li class="menu-item">
                                            <a href="{{ route('users.index') }}" class="menu-link ">
                                                <i class="menu-icon icon-base ri ri-user-line"></i>
                                                <div data-i18n="Users">Users</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('email.index') }}" class="menu-link">
                                                <i class="menu-icon icon-base ri ri-mail-line"></i>
                                                <div data-i18n="Email">Email</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('calendrier.index') }}" class="menu-link">
                                                <i class="menu-icon icon-base ri ri-calendar-line"></i>
                                                <div data-i18n="Calendrier">Calendrier</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Formation -->
                                <li class="menu-item ">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-drag-drop-line"></i>
                                        <div data-i18n="Formation">Formation</div>
                                    </a>
                                    <ul class="menu-sub">

                                        <li class="menu-item">
                                            <a href="javascript:;" class="menu-link"
                                                data-bs-target="#create_formations" data-bs-toggle="modal">
                                                <i
                                                    class="icon-base ri ri-edit-box-line text-primary icon-22px me-2"></i>
                                                <div>CREER UNE FORMATION</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#" class="menu-link" data-bs-target="#liste_formations" data-bs-toggle="modal">
                                                <i class="menu-icon icon-base ri ri-bar-chart-line"></i>
                                                <div>Voir la liste</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- Opportunités --}}
                                <li class="menu-item {{ request()->routeIs('admin.opportunites.*') ? 'active open' : '' }}">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                       <i class="menu-icon icon-base ri ri-computer-line"></i>
                                        <div data-i18n="Opportunités">Opportunités</div>
                                        <div class="badge badge-center rounded-pill bg-primary ms-auto" style="width:10px, height:10px">
                                            {{-- Count active opportunities --}}
                                            {{ App\Models\Emploi::where('statut', 'active')->count() }}
                                        </div>
                                    </a>
                                    <ul class="menu-sub">
                                        <li class="menu-item {{ request()->routeIs('opportunites.index') ? 'active' : '' }}">
                                            <a href="{{ route('opportunites.index') }}" class="menu-link">
                                                <i class="menu-icon tf-icons fas fa-list"></i>
                                                <div data-i18n="Liste des opportunités">Liste des opportunités</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0);" class="menu-link" 
                                               data-bs-toggle="modal" data-bs-target="#create_opportunites">
                                                <i class="menu-icon tf-icons fas fa-plus-circle"></i>
                                                <div data-i18n="Nouvelle opportunité">Nouvelle opportunité</div>
                                            </a>
                                        </li>
                                        <li class="menu-item {{ request()->routeIs('admin.candidatures.*') ? 'active' : '' }}">
                                            <a href="#" class="menu-link">
                                                <i class="menu-icon tf-icons fas fa-users"></i>
                                                <div data-i18n="Candidatures">Candidatures</div>
                                                <div class="badge badge-center rounded-pill bg-warning ms-auto">
                                                    {{ App\Models\Candidature::where('statut', 'en_attente')->count() }}
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- Divers --}}
                                <li class="menu-item ">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-price-tag-line"></i>
                                        <div data-i18n="Divers">Divers</div>
                                    </a>
                                    <ul class="menu-sub">

                                        <li class="menu-item">
                                            <a href="{{ route('partenaires.index') }}" class="menu-link">
                                                <i
                                                    class="icon-base ri ri-group-2-line text-primary icon-22px me-2"></i>
                                                <div>Partenaires</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('temoignages.index') }}" class="menu-link ">
                                                <i class="menu-icon icon-base ri ri-kakao-talk-line"></i>
                                                <div>Temoignages</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('articles.index') }}" class="menu-link">
                                                <i class="menu-icon icon-base ri ri-book-open-line"></i>
                                                <div>Articles</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Categories -->
                                <li class="menu-item ">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-folder-5-line"></i>
                                        <div data-i18n="Categories">Categories</div>
                                    </a>
                                    <ul class="menu-sub">

                                        <li class="menu-item">
                                            <a href="javascript:;" class="menu-link"
                                                data-bs-target="#create_categories" data-bs-toggle="modal">
                                                <i
                                                    class="icon-base ri ri-edit-box-line text-primary icon-22px me-2"></i>
                                                <div>AJOUTER </div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#" class="menu-link"data-bs-target="#liste_categories"
                                                data-bs-toggle="modal">
                                                <i class="menu-icon icon-base ri ri-bar-chart-line"></i>
                                                <div>Voir la liste</div>
                                            </a>

                                    </ul>
                                </li>



                            </ul>
                        </div>
                    </aside>
                    <!-- / Menu -->

                    <!-- Content -->
                    @yield('dashboard')
                    @yield('show_users')
                    @yield('index_users')
                    @yield('calendrier_index')
                    @yield('index_email')
                    @yield('index_categorie')

                    {{-- //Create// --}}
                    @yield('index_formations')
                    @yield('index_opportunites')
                    @yield('index_partenaires')
                    @yield('index_articles')
                    @yield('index_temoignages')



                    <!-- Modal -->

                    <!-- Create Formation Modal -->
                    <div class="modal fade" id="create_formations" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <h4 class="mb-2">Ajouter une Formation</h4>
                                    </div>
                                    <!-- Formulaire de création de formation stylisé -->
                                    <form id="formationForm" action="{{ route('formations.store') }}" method="POST" class="row g-4" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="titre" name="titre"
                                                    class="form-control" placeholder="Titre" required>
                                                <label for="titre">Titre</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select name="categorie_id" id="categorie_id" class="form-select" required>
                                                    @if(isset($categories) && $categories->count() > 0)
                                                        @foreach ($categories as $categorie)
                                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="">Aucune catégorie disponible</option>
                                                    @endif
                                                </select>
                                                <label for="categorie_id">Catégorie</label>
                                            </div>
                                        </div>
                                       
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea name="programme" id="programme" class="form-control" placeholder="Programme" style="height: 100px"></textarea>
                                                <label for="programme">Programme</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="number" step="0.01" id="cout" name="cout"
                                                    class="form-control" placeholder="Coût">
                                                <label for="cout">Coût</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="lieu" name="lieu"
                                                    class="form-control" placeholder="Lieu">
                                                <label for="lieu">Lieu</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="date" id="date_debut" name="date_debut"
                                                    class="form-control" placeholder="Date de début">
                                                <label for="date_debut">Date de début</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="date" id="date_fin" name="date_fin"
                                                    class="form-control" placeholder="Date de fin">
                                                <label for="date_fin">Date de fin</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <textarea name="prerequis" id="prerequis" class="form-control" placeholder="Prérequis" style="height: 80px"></textarea>
                                                <label for="prerequis">Prérequis</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <textarea name="bonus" id="bonus" class="form-control" placeholder="Bonus" style="height: 80px"></textarea>
                                                <label for="bonus">Bonus</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="file" id="file" name="file" class="form-control" accept="image/*,video/*" onchange="previewFile(this)">
                                                <label for="file">Fichier (Image ou Vidéo) - Max 150 MB</label>
                                            </div>
                                            <div id="file-error" class="mt-2" style="display: none;">
                                                <div class="alert alert-danger d-flex align-items-center">
                                                    <i class="ri-error-warning-line me-2"></i>
                                                    <span>La taille du fichier ne doit pas dépasser 150 MB</span>
                                                </div>
                                            </div>
                                            <div id="file-preview" class="mt-3 d-flex justify-content-center" style="display: none;">
                                                <div class="preview-container">
                                                    <img id="image-preview" class="preview-media" style="display: none; max-width: 200px; border-radius: 8px;">
                                                    <video id="video-preview" class="preview-media" style="display: none; max-width: 200px; border-radius: 8px;" controls>
                                                        <source id="video-source" src="" type="">
                                                    </video>
                                                    <button type="button" class="btn btn-sm btn-danger ms-2" onclick="removeFile()">
                                                        <i class="ri-close-line"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                Annuler
                                            </button>
                                            <button type="submit" class="btn btn-primary me-3" id="submitBtn">
                                                <span class="spinner-border spinner-border-sm me-2" style="display: none;" id="spinner"></span>
                                                Créer
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                            <!--/ Content -->
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>

                    <!-- Liste Formations Modal -->
                    <div class="modal fade" id="liste_formations" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="text-center mb-6 p-4">
                                        <h4 class="mb-2 text-primary">
                                            <i class="ri-graduation-cap-line me-2"></i>
                                            LISTE DES FORMATIONS
                                        </h4>
                                        <p class="text-muted">Gérez toutes vos formations disponibles</p>
                                    </div>
                                    
                                    <div class="card-datatable px-4 pb-4">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Titre</th>
                                                        <th>Catégorie</th>
                                                        <th class="text-center">Coût</th>
                                                        <th>Lieu</th>
                                                        <th class="text-center">Dates</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @if(isset($formations) && $formations->count() > 0)
                                                        @foreach ($formations as $formation)
                                                            <tr data-formation-id="{{ $formation->id }}">
                                                                <td class="text-center">
                                                                    <span class="badge bg-label-primary rounded-pill fs-6">{{ $loop->iteration }}</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-sm me-3">
                                                                            <div class="avatar-initial rounded bg-label-secondary">
                                                                                <i class="ri-file-line"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-0">{{ $formation->titre }}</h6>
                                                                            <small class="text-muted">{{ $formation->programme ? str($formation->programme)->limit(50) : '' }}</small>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="badge bg-label-success">{{ $formation->categorie ? $formation->categorie->nom : 'N/A' }}</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="fw-medium text-primary">{{ $formation->cout ? number_format($formation->cout, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="text-muted">{{ $formation->lieu ?? 'Non spécifié' }}</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="text-success">
                                                                        <small>{{ $formation->date_debut ? $formation->date_debut->format('d/m/Y') : 'N/A' }}</small>
                                                                    </div>
                                                                    <div class="text-danger">
                                                                        <small>{{ $formation->date_fin ? $formation->date_fin->format('d/m/Y') : 'N/A' }}</small>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="d-flex justify-content-center gap-2">
                                                                        <button class="btn btn-sm btn-icon btn-outline-primary" 
                                                                                title="Voir les détails" 
                                                                                data-bs-toggle="tooltip"
                                                                                data-formation-id="{{ $formation->id }}"
                                                                                onclick="voirDetailsFormation({{ $formation->id }})">
                                                                            <i class="ri-eye-line"></i>
                                                                        </button>
                                                                        <button class="btn btn-sm btn-icon btn-outline-warning" 
                                                                                title="Modifier" 
                                                                                data-bs-toggle="tooltip"
                                                                                data-formation-id="{{ $formation->id }}"
                                                                                onclick="editFormation({{ $formation->id }})">
                                                                            <i class="ri-edit-line"></i>
                                                                        </button>
                                                                        <button class="btn btn-sm btn-icon btn-outline-danger" 
                                                                                title="Supprimer" 
                                                                                data-bs-toggle="tooltip"
                                                                                data-formation-id="{{ $formation->id }}"
                                                                                data-formation-title="{{ $formation->titre }}"
                                                                                onclick="confirmDelete({{ $formation->id }}, '{{ addslashes($formation->titre) }}')">
                                                                            <i class="ri-delete-bin-line"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="100%" class="text-center text-muted py-4">
                                                                <i class="fas fa-graduation-cap me-2"></i>Aucune formation disponible
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        @if(isset($formations) && $formations->isNotEmpty())
                                            <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                                                <div class="text-muted">
                                                    <small>{{ $formations->count() }} formation(s) disponible(s)</small>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" data-bs-target="#create_formations" data-bs-toggle="modal" data-bs-dismiss="modal">
                                                        <i class="ri-add-line me-1"></i>
                                                        Nouvelle formation
                                                    </button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-muted">
                                                <small>Aucune formation disponible</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Opportunités Class Modal -->
                    <div class="modal fade" id="create_opportunites" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <div class="mb-4">
                                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-primary bg-gradient" 
                                                 style="width: 80px; height: 80px;">
                                                <i class="fas fa-briefcase text-white" style="font-size: 2rem;"></i>
                                            </div>
                                        </div>
                                        <h4 class="mb-2 text-primary fw-bold">✨ Ajouter une Opportunité</h4>
                                        <p class="text-muted">Créez une nouvelle offre d'emploi attractive</p>
                                    </div>

                                    <form id="createOpportuniteForm" action="{{ route('admin.opportunites.store') }}" method="POST" class="row g-4">
                                        @csrf
                                        
                                        {{-- Titre et Entreprise --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="titre" name="titre" class="form-control" 
                                                       placeholder="Développeur Web Full Stack" required />
                                                <label for="titre">
                                                    <i class="fas fa-briefcase me-1"></i>Titre du poste *
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="entreprise" name="entreprise" class="form-control" 
                                                       placeholder="Excellium Conseils" required />
                                                <label for="entreprise">
                                                    <i class="fas fa-building me-1"></i>Entreprise *
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Type de contrat et Localisation --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select id="type_contrat" name="type_contrat" class="form-select" required>
                                                    <option value="">Sélectionner...</option>
                                                    <option value="CDI">CDI - Contrat à Durée Indéterminée</option>
                                                    <option value="CDD">CDD - Contrat à Durée Déterminée</option>
                                                    <option value="Stage">Stage</option>
                                                    <option value="Freelance">Freelance</option>
                                                    <option value="Alternance">Alternance</option>
                                                </select>
                                                <label for="type_contrat">
                                                    <i class="fas fa-file-contract me-1"></i>Type de contrat *
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="localisation" name="localisation" class="form-control" 
                                                       placeholder="Paris, France" required />
                                                <label for="localisation">
                                                    <i class="fas fa-map-marker-alt me-1"></i>Localisation *
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Salaires --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="number" id="salaire_min" name="salaire_min" class="form-control" 
                                                       placeholder="500000" min="0" step="1000" />
                                                <label for="salaire_min">
                                                    <i class="fas fa-money-bill-wave me-1"></i>Salaire minimum (FCFA)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="number" id="salaire_max" name="salaire_max" class="form-control" 
                                                       placeholder="800000" min="0" step="1000" />
                                                <label for="salaire_max">
                                                    <i class="fas fa-money-bill-wave me-1"></i>Salaire maximum (FCFA)
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Expérience et Niveau d'étude --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select id="experience_requise" name="experience_requise" class="form-select">
                                                    <option value="">Sélectionner...</option>
                                                    <option value="Débutant">Débutant accepté</option>
                                                    <option value="1-2 ans">1-2 ans d'expérience</option>
                                                    <option value="3-5 ans">3-5 ans d'expérience</option>
                                                    <option value="5+ ans">5+ ans d'expérience</option>
                                                    <option value="Senior">Senior (10+ ans)</option>
                                                </select>
                                                <label for="experience_requise">
                                                    <i class="fas fa-user-tie me-1"></i>Expérience requise
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select id="niveau_etude" name="niveau_etude" class="form-select">
                                                    <option value="">Sélectionner...</option>
                                                    <option value="Bac">Baccalauréat</option>
                                                    <option value="Bac+2">Bac+2 (BTS/DUT)</option>
                                                    <option value="Bac+3">Bac+3 (Licence)</option>
                                                    <option value="Bac+5">Bac+5 (Master)</option>
                                                    <option value="Doctorat">Doctorat</option>
                                                </select>
                                                <label for="niveau_etude">
                                                    <i class="fas fa-graduation-cap me-1"></i>Niveau d'étude
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Nombre de postes et Date d'expiration --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="number" id="nombre_postes" name="nombre_postes" class="form-control" 
                                                       value="1" min="1" max="50" required />
                                                <label for="nombre_postes">
                                                    <i class="fas fa-users me-1"></i>Nombre de postes *
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="date" id="date_expiration" name="date_expiration" class="form-control" 
                                                       min="{{ date('Y-m-d', strtotime('+1 day')) }}" required />
                                                <label for="date_expiration">
                                                    <i class="fas fa-calendar-alt me-1"></i>Date limite candidature *
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Contacts --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="email" id="contact_email" name="contact_email" class="form-control" 
                                                       placeholder="recrutement@excellium.com" />
                                                <label for="contact_email">
                                                    <i class="fas fa-envelope me-1"></i>Email de contact
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="tel" id="contact_telephone" name="contact_telephone" class="form-control" 
                                                       placeholder="+225 XX XX XX XX" />
                                                <label for="contact_telephone">
                                                    <i class="fas fa-phone me-1"></i>Téléphone de contact
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Description --}}
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea id="description" name="description" class="form-control" 
                                                          style="height: 120px;" placeholder="Décrivez le poste, les missions, l'environnement de travail..." required></textarea>
                                                <label for="description">
                                                    <i class="fas fa-file-alt me-1"></i>Description du poste *
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Compétences requises --}}
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea id="competences_requises" name="competences_requises" class="form-control" 
                                                          style="height: 100px;" placeholder="PHP, Laravel, JavaScript, Vue.js, MySQL..."></textarea>
                                                <label for="competences_requises">
                                                    <i class="fas fa-cogs me-1"></i>Compétences requises
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Avantages --}}
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea id="avantages" name="avantages" class="form-control" 
                                                          style="height: 80px;" placeholder="Télétravail, mutuelle, tickets restaurant, formation..."></textarea>
                                                <label for="avantages">
                                                    <i class="fas fa-gift me-1"></i>Avantages
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Statut --}}
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <select id="statut" name="statut" class="form-select">
                                                    <option value="active" selected>✅ Active - Visible pour les candidats</option>
                                                    <option value="fermee">🔒 Fermée - Plus de candidatures</option>
                                                </select>
                                                <label for="statut">
                                                    <i class="fas fa-toggle-on me-1"></i>Statut de l'offre
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Boutons d'action --}}
                                        <div class="col-12 text-center pt-4">
                                            <button type="submit" class="btn btn-primary btn-lg me-3 px-5 shadow-sm">
                                                <i class="fas fa-paper-plane me-2"></i>Publier l'opportunité
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-lg px-4" 
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times me-2"></i>Annuler
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categories User Modal -->
                    <div class="modal fade" id="create_categories" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <h4 class="mb-2">NOUVELLE CATEGORIE</h4>
                                    </div>
                                    <form id="createCategorieForm" class="row g-5" method="POST"
                                        action="{{ route('categories.store') }}">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nomCategorie" name="nom"
                                                    class="form-control" placeholder="comptabilité" required />
                                                <label for="nomCategorie">Nom Catégorie</label>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center">
                                            <button type="reset" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                                            <button type="submit" class="btn btn-primary me-3">Valider</button>

                                        </div>
                                    </form>
                                </div>


                            </div>
                            <!--/ Content -->
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>


                    <!-- Categories Liste Modal -->
                    <div class="modal fade" id="liste_categories" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <h4 class="mb-2">LISTE DES CATEGORIES</h4>
                                    </div>
                                    <div class="card-datatable text-nowrap">
                                        <table class="dt-scrollableTable table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nom Categorie</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Lorem ipsum</td>
                                                    {{-- ////////////////////ACTION ///////////////////////// --}}
                                                    <td>
                                                        <div class="action" style="justify-content: space-between">
                                                            <svg style="cursor: pointer"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24"
                                                                data-bs-target="#edit" data-bs-toggle="modal">
                                                                <path fill="#4c9edb"
                                                                    d="M9.243 18.997H21v2H3v-4.243l9.9-9.9l4.242 4.243zm5.07-13.557l2.122-2.121a1 1 0 0 1 1.414 0l2.829 2.828a1 1 0 0 1 0 1.415l-2.122 2.121z" />
                                                            </svg>&nbsp;&nbsp;

                                                            <svg id="confirm-color" style="cursor: pointer"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <path fill="#fd1800"
                                                                    d="M7 6V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6zm6.414 8l1.768-1.768l-1.414-1.414L12 12.586l-1.768-1.768l-1.414 1.414L10.586 14l-1.768 1.768l1.414 1.414L12 15.414l1.768 1.768l1.414-1.414zM9 4v2h6V4z" />
                                                            </svg>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/ Content -->
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>

                    
                    <!--/ Fin des Modales -->
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

        <!--/ Layout wrapper -->

        <!-- Core JS -->

        <!-- build:js assets/vendor/js/theme.js')}}  -->

        <script src="{{ asset('assets_2/vendor/libs/jquery/jquery.js') }}"></script>

        <script src="{{ asset('assets_2/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/node-waves/node-waves.js') }}"></script>

        <script src="{{ asset('assets_2/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

        <script src="{{ asset('assets_2/vendor/libs/pickr/pickr.js') }}"></script>

        <script src="{{ asset('assets_2/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

        <script src="{{ asset('assets_2/vendor/libs/hammer/hammer.js') }}"></script>

        <script src="{{ asset('assets_2/vendor/libs/i18n/i18n.js') }}"></script>

        <script src="{{ asset('assets_2/vendor/js/menu.js') }}"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{ asset('assets_2/vendor/libs/moment/moment.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/select2/select2.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/tagify/tagify.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/@form-validation/popular.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/@form-validation/auto-focus.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/fullcalendar/fullcalendar.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/flatpickr/flatpickr.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/apex-charts/apexcharts.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/swiper/swiper.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/quill/katex.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/quill/quill.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/notiflix/notiflix.js') }}"></script>
        <script src="{{ asset('assets_2/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>



        <!-- Main JS -->

        <script src="{{ asset('assets_2/js/main.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('assets_2/js/modal-edit-user.js') }}"></script>
        <script src="{{ asset('assets_2/js/app-user-view.js') }}"></script>
        <script src="{{ asset('assets_2/js/app-calendar-events.js') }}"></script>
        <script src="{{ asset('assets_2/js/app-calendar.js') }}"></script>
        <script src="{{ asset('assets_2/js/app-ecommerce-dashboard.js') }}"></script>
        <script src="{{ asset('assets_2/js/app-email.js') }}"></script>
        <script src="{{ asset('assets_2/js/extended-ui-sweetalert2.js') }}"></script>
        <script src="{{ asset('assets_2/js/modal-edit-user.js') }}"></script>
        <script src="{{ asset('assets_2/js/app-user-view.js') }}"></script>
        <script src="{{ asset('assets_2/js/app-user-view-account.js') }}"></script>
        <script src="{{ asset('assets_2/js/app-user-list.js') }}"></script>

        <style>
            .modal-xl {
                max-width: 90%;
            }

            .table-hover tbody tr:hover {
                background-color: rgba(67, 89, 113, 0.05);
            }

            .avatar-wrapper {
                flex-shrink: 0;
            }

            .badge {
                font-size: 0.75em;
            }

            .btn-icon {
                width: 32px;
                height: 32px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            @media (max-width: 768px) {
                .modal-xl {
                    max-width: 95%;
                }
                
                .table-responsive {
                    font-size: 0.875rem;
                }
            }

            .preview-container {
                display: flex;
                align-items: center;
                padding: 15px;
                background: #f8f9fa;
                border-radius: 12px;
                border: 1px solid #dee2e6;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                max-width: 300px;
            }

            .preview-media {
                border-radius: 8px !important;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }

            #file-preview {
                justify-content: center;
            }

            .video-thumbnail {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                overflow: hidden;
                background: #000;
            }

            .play-overlay {
                width: 16px;
                height: 16px;
                background: rgba(0,0,0,0.6);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .play-overlay i {
                font-size: 10px;
                margin-left: 1px;
            }

            .avatar-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .alert {
                border-radius: 8px;
                font-size: 0.875rem;
            }
        </style>

        

        <!-- Modale de modification -->
        <div class="modal fade" id="edit_formation" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="ri-edit-line me-2 text-warning"></i>
                            Modifier la Formation
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editFormationForm" method="POST" class="row g-4" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="edit_formation_id" name="formation_id">
                            
                            <!-- Titre -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="edit_titre" name="titre" class="form-control" placeholder="Titre de la formation" required>
                                    <label for="edit_titre">Titre</label>
                                </div>
                            </div>
                            
                            <!-- Catégorie -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="edit_categorie_id" name="categorie_id" class="form-select" required>
                                        <option value="">Choisir une catégorie</option>
                                        @if(isset($categories) && $categories->count() > 0)
                                            @foreach($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                            @endforeach
                                        @else
                                            <option value="">Aucune catégorie disponible</option>
                                        @endif
                                    </select>
                                    <label for="edit_categorie_id">Catégorie</label>
                                </div>
                            </div>
                            
                            <!-- Programme -->
                            <div class="col-12">
                                <div class="form-floating form-floating-outline">
                                    <textarea id="edit_programme" name="programme" class="form-control" placeholder="Programme de la formation" rows="3"></textarea>
                                    <label for="edit_programme">Programme</label>
                                </div>
                            </div>
                            
                            <!-- Coût -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" id="edit_cout" name="cout" class="form-control" placeholder="0" min="0" step="0.01">
                                    <label for="edit_cout">Coût (FCFA)</label>
                                </div>
                            </div>
                            
                            <!-- Lieu -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="edit_lieu" name="lieu" class="form-control" placeholder="Lieu de la formation">
                                    <label for="edit_lieu">Lieu</label>
                                </div>
                            </div>
                            
                            <!-- Date début -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="date" id="edit_date_debut" name="date_debut" class="form-control" 
                                           min="" onchange="updateDateConstraints()">
                                    <label for="edit_date_debut">Date de début</label>
                                </div>
                            </div>
                            
                            <!-- Date fin -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="date" id="edit_date_fin" name="date_fin" class="form-control" 
                                           min="" onchange="validateDateFin()">
                                    <label for="edit_date_fin">Date de fin</label>
                                </div>
                            </div>
                            
                            <!-- Prérequis -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <textarea id="edit_prerequis" name="prerequis" class="form-control" placeholder="Prérequis" rows="2"></textarea>
                                    <label for="edit_prerequis">Prérequis</label>
                                </div>
                            </div>
                            
                            <!-- Bonus -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <textarea id="edit_bonus" name="bonus" class="form-control" placeholder="Bonus" rows="2"></textarea>
                                    <label for="edit_bonus">Bonus</label>
                                </div>
                            </div>
                            
                            <!-- Fichier -->
                            <div class="col-12">
                                <label class="form-label">Fichier (Image ou Vidéo) - Optionnel</label>
                                <input type="file" id="edit_file" name="file" class="form-control" 
                                       accept="image/*,video/*" onchange="previewEditFile(this)">
                                <div class="form-text">Formats acceptés: JPG, PNG, GIF, MP4, AVI, MOV, WMV. Taille max: 150MB</div>
                            </div>
                            
                            <!-- Prévisualisation -->
                            <div class="col-12">
                                <div id="edit-file-preview" style="display: none;">
                                    <img id="edit-image-preview" class="img-fluid rounded" style="max-height: 200px; display: none;">
                                    <video id="edit-video-preview" controls class="w-100 rounded" style="max-height: 200px; display: none;">
                                        <source id="edit-video-source" src="" type="">
                                    </video>
                                    <button type="button" class="btn btn-sm btn-outline-danger mt-2" onclick="removeEditFile()">
                                        Supprimer le fichier
                                    </button>
                                </div>
                            </div>

                            <!-- Boutons -->
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">
                                    Annuler
                                </button>
                                <button type="submit" class="btn btn-warning">
                                    <i class="ri-save-line me-1"></i>
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modale de confirmation de suppression -->
        <div class="modal fade" id="delete_confirmation" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-simple">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <div class="mb-4">
                                <i class="ri-error-warning-line ri-96px text-danger"></i>
                            </div>
                            <h4 class="mb-2">Confirmer la suppression</h4>
                            <p class="text-muted mb-2">Êtes-vous sûr de vouloir supprimer cette formation ?</p>
                            <p class="fw-bold text-dark mb-2" id="formation-to-delete"></p>
                            <p class="text-danger mb-0"><strong>Cette action est irréversible.</strong></p>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-secondary me-3" data-bs-dismiss="modal">
                                Annuler
                            </button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                                <span class="spinner-border spinner-border-sm me-2" style="display: none;" id="deleteSpinner"></span>
                                Oui, supprimer définitivement
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modale des détails de formation -->
        <div class="modal fade" id="detailsFormationModal" tabindex="-1" aria-labelledby="detailsFormationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="detailsFormationModalLabel">
                            <i class="fas fa-graduation-cap me-2"></i>Détails de la formation
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body" id="detailsFormationContent">
                        {{-- Le contenu sera chargé dynamiquement --}}
                        <div class="text-center p-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Chargement...</span>
                            </div>
                            <p class="mt-3">Chargement des détails...</p>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Fermer
                        </button>
                        <button type="button" class="btn btn-primary" id="exporterInscriptions" style="display: none;">
                            <i class="fas fa-download me-1"></i>Exporter les inscriptions
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script pour la modale de Modification et de Suppression des formations -->
        <script>
            // Variables globales
            let currentFormationId = null;

            // Fonctions de prévisualisation (gardées identiques)
            function previewFile(input) {
                const file = input.files[0];
                const preview = document.getElementById('file-preview');
                const imagePreview = document.getElementById('image-preview');
                const videoPreview = document.getElementById('video-preview');
                const videoSource = document.getElementById('video-source');
                const errorDiv = document.getElementById('file-error');
                
                errorDiv.style.display = 'none';
                preview.style.display = 'none';
                
                if (file) {
                    const maxSize = 150 * 1024 * 1024;
                    
                    if (file.size > maxSize) {
                        errorDiv.style.display = 'block';
                        input.value = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        preview.style.display = 'block';
                        
                        if (file.type.startsWith('image/')) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                            videoPreview.style.display = 'none';
                        } else if (file.type.startsWith('video/')) {
                            videoSource.src = e.target.result;
                            videoSource.type = file.type;
                            videoPreview.load();
                            videoPreview.style.display = 'block';
                            imagePreview.style.display = 'none';
                        }
                    };
                    
                    reader.readAsDataURL(file);
                }
            }

            function removeFile() {
                document.getElementById('file').value = '';
                document.getElementById('file-preview').style.display = 'none';
                document.getElementById('file-error').style.display = 'none';
                document.getElementById('image-preview').style.display = 'none';
                document.getElementById('video-preview').style.display = 'none';
            }

            // Fonctions de prévisualisation pour modification
            function previewEditFile(input) {
                const file = input.files[0];
                const preview = document.getElementById('edit-file-preview');
                const imagePreview = document.getElementById('edit-image-preview');
                const videoPreview = document.getElementById('edit-video-preview');
                const videoSource = document.getElementById('edit-video-source');
                const errorDiv = document.getElementById('edit-file-error');
                const currentFile = document.getElementById('edit-current-file');
                
                errorDiv.style.display = 'none';
                preview.style.display = 'none';
                
                if (file) {
                    const maxSize = 150 * 1024 * 1024;
                    
                    if (file.size > maxSize) {
                        errorDiv.style.display = 'block';
                        input.value = '';
                        return;
                    }
                    
                    // Masquer le fichier actuel
                    currentFile.style.display = 'none';
                    
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        preview.style.display = 'block';
                        
                        if (file.type.startsWith('image/')) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                            videoPreview.style.display = 'none';
                        } else if (file.type.startsWith('video/')) {
                            videoSource.src = e.target.result;
                            videoSource.type = file.type;
                            videoPreview.load();
                            videoPreview.style.display = 'block';
                            imagePreview.style.display = 'none';
                        }
                    };
                    
                    reader.readAsDataURL(file);
                } else {
                    // Réafficher le fichier actuel si pas de nouveau fichier
                    currentFile.style.display = 'block';
                }
            }

            function removeEditFile() {
                document.getElementById('edit_file').value = '';
                document.getElementById('edit-file-preview').style.display = 'none';
                document.getElementById('edit-file-error').style.display = 'none';
                document.getElementById('edit-current-file').style.display = 'block';
            }

            // Fonction pour éditer une formation - MISE À JOUR
            function editFormation(formationId) {
                console.log('editFormation appelée avec ID:', formationId);
                
                // Masquer la modale de liste
                const listModal = bootstrap.Modal.getInstance(document.getElementById('list_formations'));
                if (listModal) {
                    listModal.hide();
                }
                
                // Charger les données de la formation
                fetch(`/admin/formations/${formationId}/edit`)
                    .then(response => {
                        console.log('Response status pour edit:', response.status);
                        return response.json();
                    })
                    .then(data => {
                        console.log('Données de formation reçues:', data);
                        
                        if (data.success) {
                            const formation = data.formation;
                            
                            console.log('Formation extraite:', formation);
                            console.log('Formation ID:', formation.id);
                            
                            // Initialiser les contraintes de dates AVANT de remplir
                            initializeDateConstraints();
                            
                            // Remplir le formulaire d'édition
                            document.getElementById('edit_formation_id').value = formation.id;
                            document.getElementById('edit_titre').value = formation.titre || '';
                            document.getElementById('edit_categorie_id').value = formation.categorie_id || '';
                            document.getElementById('edit_programme').value = formation.programme || '';
                            document.getElementById('edit_cout').value = formation.cout || '';
                            document.getElementById('edit_prerequis').value = formation.prerequis || '';
                            document.getElementById('edit_bonus').value = formation.bonus || '';
                            document.getElementById('edit_lieu').value = formation.lieu || '';
                            
                            // Formater les dates pour les inputs
                            if (formation.date_debut) {
                                const dateDebut = new Date(formation.date_debut);
                                document.getElementById('edit_date_debut').value = dateDebut.toISOString().split('T')[0];
                            }
                            
                            if (formation.date_fin) {
                                const dateFin = new Date(formation.date_fin);
                                document.getElementById('edit_date_fin').value = dateFin.toISOString().split('T')[0];
                            }
                            
                            // Mettre à jour les contraintes après avoir rempli les dates
                            updateDateConstraints();
                            
                            // Afficher la prévisualisation du fichier existant
                            const editPreview = document.getElementById('edit-file-preview');
                            const editImagePreview = document.getElementById('edit-image-preview');
                            const editVideoPreview = document.getElementById('edit-video-preview');
                            const editVideoSource = document.getElementById('edit-video-source');
                            
                            if (formation.file_path) {
                                editPreview.style.display = 'block';
                                const filePath = `/storage/${formation.file_path}`;
                                
                                if (formation.file_type === 'image') {
                                    editImagePreview.src = filePath;
                                    editImagePreview.style.display = 'block';
                                    editVideoPreview.style.display = 'none';
                                } else if (formation.file_type === 'video') {
                                    editVideoSource.src = filePath;
                                    editVideoSource.type = 'video/mp4';
                                    editVideoPreview.load();
                                    editVideoPreview.style.display = 'block';
                                    editImagePreview.style.display = 'none';
                                }
                            } else {
                                editPreview.style.display = 'none';
                            }
                            
                            // Afficher la modale d'édition
                            console.log('Ouverture de la modale d\'édition...');
                            const editModal = new bootstrap.Modal(document.getElementById('edit_formation'));
                            editModal.show();
                            
                            console.log('Modale d\'édition ouverte ✅');
                            
                        } else {
                            console.error('Erreur lors du chargement:', data.message);
                            
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreur',
                                    text: data.message || 'Impossible de charger les données de la formation'
                                });
                            } else {
                                alert('Erreur: ' + (data.message || 'Impossible de charger les données'));
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Erreur lors du chargement de la formation:', error);
                        
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur de connexion',
                                text: 'Impossible de charger les données de la formation'
                            });
                        } else {
                            alert('Erreur de connexion');
                        }
                    });
            }

            // Fonction pour confirmer la suppression
            function confirmDelete(formationId, formationTitle) {
                console.log('Suppression formation ID:', formationId, 'Titre:', formationTitle);
                
                // Stocker l'ID pour utilisation ultérieure
                currentFormationId = formationId;
                
                // Afficher le nom de la formation
                document.getElementById('formation-to-delete').textContent = `"${formationTitle}"`;
                
                // Masquer la modale de liste
                const listModal = bootstrap.Modal.getInstance(document.getElementById('list_formations'));
                if (listModal) {
                    listModal.hide();
                }
                
                // Afficher la modale de confirmation
                const deleteModal = new bootstrap.Modal(document.getElementById('delete_confirmation'));
                deleteModal.show();
            }

            // Fonction pour retourner à la liste
            function backToList() {
                // Fermer toutes les modales ouvertes
                const modals = ['edit_formation', 'delete_confirmation'];
                modals.forEach(modalId => {
                    const modalElement = document.getElementById(modalId);
                    const modalInstance = bootstrap.Modal.getInstance(modalElement);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                });
                
                // Réafficher la modale de liste après un délai
                setTimeout(() => {
                    const listModal = new bootstrap.Modal(document.getElementById('list_formations'));
                    listModal.show();
                }, 500);
            }

            // Fonction pour afficher le fichier actuel avec plus d'informations
            function showCurrentFile(formation) {
                const currentFileDiv = document.getElementById('edit-current-file');
                const currentPreview = document.getElementById('edit-current-preview');
                
                currentFileDiv.style.display = 'none';
                currentPreview.innerHTML = '';
                
                if (formation.file_path) {
                    const imagePath = `/storage/${formation.file_path}`;
                    const fileName = formation.file_path.split('/').pop(); // Extraire le nom du fichier
                    
                    let previewHTML = '';
                    
                    if (formation.file_type === 'image') {
                        previewHTML = `
                            <div class="d-flex align-items-center gap-3">
                                <img src="${imagePath}" alt="Image actuelle" style="max-width: 150px; max-height: 150px; border-radius: 8px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-1">Fichier actuel :</h6>
                                    <p class="text-muted mb-1"><strong>${fileName}</strong></p>
                                    <p class="text-muted mb-0"><small>Type: Image</small></p>
                                    <small class="text-info">Sélectionnez un nouveau fichier pour le remplacer</small>
                                </div>
                            </div>
                        `;
                    } else if (formation.file_type === 'video') {
                        previewHTML = `
                            <div class="d-flex align-items-center gap-3">
                                <video style="max-width: 150px; max-height: 150px; border-radius: 8px; object-fit: cover;" controls>
                                    <source src="${imagePath}" type="video/mp4">
                                    Votre navigateur ne supporte pas la vidéo.
                                </video>
                                <div>
                                    <h6 class="mb-1">Fichier actuel :</h6>
                                    <p class="text-muted mb-1"><strong>${fileName}</strong></p>
                                    <p class="text-muted mb-0"><small>Type: Vidéo</small></p>
                                    <small class="text-info">Sélectionnez un nouveau fichier pour le remplacer</small>
                                </div>
                            </div>
                        `;
                    }
                    
                    currentPreview.innerHTML = previewHTML;
                    currentFileDiv.style.display = 'block';
                    
                    console.log('Fichier affiché:', fileName, 'Type:', formation.file_type);
                } else {
                    console.log('Aucun fichier pour cette formation');
                }
            }

            // Événement pour la soumission du formulaire d'édition - CORRIGÉ
            document.addEventListener('DOMContentLoaded', function() {
                console.log('SweetAlert disponible:', typeof Swal !== 'undefined');
                
                const editForm = document.getElementById('editFormationForm');
                if (editForm) {
                    editForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        console.log('Formulaire soumis');
                        
                        const formationId = document.getElementById('edit_formation_id').value;
                        const formData = new FormData(this);
                        
                        // AJOUTER LA MÉTHODE PUT via method spoofing Laravel
                        formData.append('_method', 'PUT');
                        
                        console.log('Formation ID:', formationId);
                        console.log('Envoi requête POST avec _method=PUT vers:', `/admin/formations/${formationId}`);
                        
                        // Debug : Afficher toutes les données envoyées
                        console.log('Données FormData:');
                        for (let [key, value] of formData.entries()) {
                            console.log(`${key}:`, value);
                        }
                        
                        // Vérifier si SweetAlert fonctionne
                        if (typeof Swal === 'undefined') {
                            alert('SweetAlert non disponible');
                            return;
                        }
                        
                        // Afficher le loader SweetAlert
                        Swal.fire({
                            title: 'Modification en cours...',
                            html: `
                                <div class="d-flex flex-column align-items-center">
                                    <div class="spinner-border text-primary mb-3" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                    <p class="mb-0">Veuillez patienter pendant la modification</p>
                                </div>
                            `,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false
                        });
                        
                        // Utiliser POST avec _method=PUT (Method Spoofing Laravel)
                        fetch(`/admin/formations/${formationId}`, {
                            method: 'POST',  // Utiliser POST
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                                // Ne pas ajouter Content-Type, laissez le navigateur le faire pour FormData
                            },
                            body: formData  // FormData avec _method=PUT
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            console.log('Response headers:', response.headers.get('content-type'));
                            
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            
                            // Vérifier si la réponse est du JSON
                            const contentType = response.headers.get('content-type');
                            if (!contentType || !contentType.includes('application/json')) {
                                throw new Error('La réponse n\'est pas du JSON');
                            }
                            
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data:', data);
                            
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Modification réussie !',
                                    text: data.message,
                                    confirmButtonText: 'Retourner à la liste',
                                    confirmButtonColor: '#28a745'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Fermer la modale d'édition
                                        const editModal = bootstrap.Modal.getInstance(document.getElementById('edit_formation'));
                                        if (editModal) {
                                            editModal.hide();
                                        }
                                        
                                        // Retourner à la liste
                                        setTimeout(() => {
                                            backToList();
                                        }, 500);
                                    }
                                });
                            } else {
                                let errorMessage = data.message || 'Erreur lors de la modification';
                                
                                if (data.errors) {
                                    errorMessage += '\n\nDétails:\n';
                                    for (const field in data.errors) {
                                        errorMessage += `• ${data.errors[field].join(', ')}\n`;
                                    }
                                }
                                
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Échec de la modification',
                                    text: errorMessage,
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Erreur complète:', error);
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur de connexion',
                                html: `
                                    <p>Problème de connexion ou de format de réponse</p>
                                    <small class="text-muted">Détails: ${error.message}</small>
                                `,
                                confirmButtonText: 'OK'
                            });
                        });
                    });
                }
            });

            // Événement pour la confirmation de suppression - CORRIGER
            document.addEventListener('DOMContentLoaded', function() {
                // Vérifier que l'élément existe
                const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
                if (confirmDeleteBtn) {
                    console.log('Bouton de suppression trouvé ✅');
                    
                    confirmDeleteBtn.addEventListener('click', function() {
                        console.log('Bouton suppression cliqué, Formation ID:', currentFormationId);
                        
                        if (!currentFormationId) {
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreur',
                                    text: 'Aucune formation sélectionnée'
                                });
                            } else {
                                alert('Aucune formation sélectionnée');
                            }
                            return;
                        }
                        
                        const spinner = document.getElementById('deleteSpinner');
                        
                        // Afficher le spinner
                        this.disabled = true;
                        spinner.style.display = 'inline-block';
                        
                        console.log('Envoi requête DELETE vers:', `/admin/formations/${currentFormationId}`);
                        
                        fetch(`/admin/formations/${currentFormationId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data:', data);
                            
                            if (data.success) {
                                if (typeof Swal !== 'undefined') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Suppression réussie !',
                                        text: data.message,
                                        confirmButtonText: 'OK'
                                    });
                                } else {
                                    alert(data.message);
                                }
                                
                                // Supprimer la ligne du tableau
                                removeFormationFromTable(currentFormationId);
                                
                                // Fermer la modale de confirmation
                                const deleteModal = bootstrap.Modal.getInstance(document.getElementById('delete_confirmation'));
                                if (deleteModal) {
                                    deleteModal.hide();
                                }
                                
                                // Retourner à la liste
                                setTimeout(() => {
                                    backToList();
                                }, 1000);
                                
                            } else {
                                if (typeof Swal !== 'undefined') {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erreur',
                                        text: data.message || 'Erreur lors de la suppression'
                                    });
                                } else {
                                    alert(data.message || 'Erreur lors de la suppression');
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Erreur suppression:', error);
                            
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreur de connexion',
                                    text: 'Erreur de connexion lors de la suppression'
                                });
                            } else {
                                alert('Erreur de connexion lors de la suppression');
                            }
                        })
                        .finally(() => {
                            // Masquer le spinner
                            this.disabled = false;
                            spinner.style.display = 'none';
                            currentFormationId = null;
                        });
                    });
                } else {
                    console.error('Bouton confirmDeleteBtn non trouvé ❌');
                }
            });

            // Fonction pour mettre à jour une formation dans le tableau
            function updateFormationInTable(formation) {
                const row = document.querySelector(`tr[data-formation-id="${formation.id}"]`);
                if (row) {
                    // Mettre à jour le contenu de la ligne
                    row.innerHTML = `
                        <td class="text-center">
                            <span class="badge bg-label-primary rounded-pill fs-6">${row.querySelector('.badge').textContent}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <div class="avatar-initial rounded bg-label-secondary">
                                        <i class="ri-file-line"></i>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-0">${formation.titre}</h6>
                                    <small class="text-muted">${formation.programme ? formation.programme.substring(0, 50) + (formation.programme.length > 50 ? '...' : '') : ''}</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-label-success">${formation.categorie ? formation.categorie.nom : 'N/A'}</span>
                        </td>
                        <td class="text-center">
                            <span class="fw-medium text-primary">${formation.cout ? formatPrice(formation.cout) + ' FCFA' : 'Gratuit'}</span>
                        </td>
                        <td class="text-center">
                            <span class="text-muted">${formation.lieu || 'Non spécifié'}</span>
                        </td>
                        <td class="text-center">
                            <div class="text-success">
                                <small>${formation.date_debut ? formatDate(formation.date_debut) : 'N/A'}</small>
                            </div>
                            <div class="text-danger">
                                <small>${formation.date_fin ? formatDate(formation.date_fin) : 'N/A'}</small>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-icon btn-outline-warning" 
                                        title="Modifier" 
                                        data-bs-toggle="tooltip"
                                        onclick="editFormation(${formation.id})">
                                    <i class="ri-edit-line"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-outline-danger" 
                                        title="Supprimer" 
                                        data-bs-toggle="tooltip"
                                        data-formation-title="${formation.titre}"
                                        onclick="confirmDelete(${formation.id}, '${formation.titre.replace(/'/g, "\\'")}')">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    
                    // Animation de mise à jour
                    row.style.backgroundColor = '#e8f5e8';
                    row.style.transition = 'background-color 0.5s ease';
                    
                    setTimeout(() => {
                        row.style.backgroundColor = '';
                    }, 2000);
                    
                    console.log('Formation mise à jour dans le tableau:', formation.titre);
                }
            }

            // ... existing code ...

            // Fonctions utilitaires pour manipuler le tableau
            function addFormationToTable(formation) {
                const tableBody = document.querySelector('#list_formations tbody');
                if (!tableBody) return;
                
                const newRow = document.createElement('tr');
                newRow.setAttribute('data-formation-id', formation.id);
                
                newRow.innerHTML = `
                    <td class="text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="avatar avatar-md me-3">
                                ${getFilePreview(formation)}
                            </div>
                            <div>
                                <h6 class="mb-0">${formation.titre}</h6>
                                ${formation.programme ? `<small class="text-muted">${str(formation.programme).limit(50)}</small>` : ''}
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-label-success">${formation.categorie ? formation.categorie.nom : 'N/A'}</span>
                    </td>
                    <td class="text-center">
                        <span class="fw-medium text-primary">${formation.cout ? formatPrice(formation.cout) + ' FCFA' : 'Gratuit'}</span>
                    </td>
                    <td class="text-center">
                        <span class="text-muted">${formation.lieu || 'Non spécifié'}</span>
                    </td>
                    <td class="text-center">
                        <div class="text-success">
                            <small>${formation.date_debut ? formatDate(formation.date_debut) : 'N/A'}</small>
                        </div>
                        <div class="text-danger">
                            <small>${formation.date_fin ? formatDate(formation.date_fin) : 'N/A'}</small>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-sm btn-icon btn-outline-warning" title="Modifier" onclick="editFormation(${formation.id})">
                                <i class="ri-edit-line"></i>
                            </button>
                            <button class="btn btn-sm btn-icon btn-outline-danger" title="Supprimer" onclick="confirmDelete(${formation.id}, '${formation.titre}')">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </td>
                `;
                
                tableBody.insertBefore(newRow, tableBody.firstChild);
                
                // Animation d'apparition
                newRow.style.opacity = '0';
                newRow.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    newRow.style.transition = 'all 0.3s ease';
                    newRow.style.opacity = '1';
                    newRow.style.transform = 'translateY(0)';
                }, 100);
            }

            // Fonction pour supprimer une formation du tableau
            function removeFormationFromTable(formationId) {
                const row = document.querySelector(`tr[data-formation-id="${formationId}"]`);
                if (row) {
                    // Animation de suppression
                    row.style.backgroundColor = '#ffe6e6';
                    row.style.transition = 'all 0.5s ease';
                    
                    setTimeout(() => {
                        row.style.opacity = '0';
                        row.style.transform = 'translateX(-100%)';
                        
                        setTimeout(() => {
                            row.remove();
                            
                            // Réorganiser les numéros de ligne
                            reorderTableNumbers();
                        }, 500);
                    }, 500);
                }
            }

            // Fonction pour réorganiser les numéros de ligne
            function reorderTableNumbers() {
                const rows = document.querySelectorAll('tbody tr[data-formation-id]');
                rows.forEach((row, index) => {
                    const numberBadge = row.querySelector('.badge');
                    if (numberBadge) {
                        numberBadge.textContent = index + 1;
                    }
                });
            }

            // ... existing code ...

            // Fonctions utilitaires (gardées identiques)
            function getFilePreview(formation, large = false) {
                if (!formation.file_path) {
                    return `<div class="avatar-initial ${large ? 'w-100 h-auto' : 'rounded bg-label-secondary'}">
                                <i class="ri-file-line"></i>
                            </div>`;
                }
                
                const imagePath = `/storage/${formation.file_path}`;
                const sizeClass = large ? 'w-100 h-auto' : 'avatar-img rounded';
                
                if (formation.file_type === 'image') {
                    return `<img src="${imagePath}" alt="Image" class="${sizeClass}">`;
                } else {
                    return `
                        <div class="video-thumbnail position-relative ${large ? 'w-100' : ''}">
                            <video class="${sizeClass}" style="object-fit: cover;">
                                <source src="${imagePath}" type="video/mp4">
                            </video>
                            <div class="play-overlay position-absolute top-50 start-50 translate-middle">
                                <i class="ri-play-fill text-white"></i>
                            </div>
                        </div>
                    `;
                }
            }

            function formatPrice(price) {
                return new Intl.NumberFormat('fr-FR').format(price);
            }

            function formatDate(dateString) {
                return new Date(dateString).toLocaleDateString('fr-FR');
            }

            function updateCounter(change) {
                const counter = document.querySelector('.formation-counter');
                if (counter) {
                    const currentCount = parseInt(counter.textContent.match(/\d+/)[0]);
                    const newCount = currentCount + change;
                    counter.textContent = `${newCount} formation(s) au total`;
                }
            }

            // Fonction d'alerte (gardée identique)
            function showAlert(type, message) {
                const existingAlerts = document.querySelectorAll('.custom-alert');
                existingAlerts.forEach(alert => alert.remove());
                
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed custom-alert`;
                alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 350px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);';
                
                alertDiv.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="ri-${type === 'success' ? 'check-circle' : 'error-warning'}-line me-2 fs-5"></i>
                        <div>${message}</div>
                        <button type="button" class="btn-close ms-auto" onclick="this.parentElement.parentElement.remove()"></button>
                    </div>
                `;
                
                document.body.appendChild(alertDiv);
                
                setTimeout(() => {
                    if (alertDiv.parentNode) {
                        alertDiv.remove();
                    }
                }, 5000);
            }

            // Fonction pour supprimer le fichier d'édition
            function removeEditFile() {
                document.getElementById('edit_file').value = '';
                document.getElementById('edit-file-preview').style.display = 'none';
                document.getElementById('edit-image-preview').style.display = 'none';
                document.getElementById('edit-video-preview').style.display = 'none';
            }

            // Test des modales au chargement
            document.addEventListener('DOMContentLoaded', function() {
                console.log('=== TEST DES MODALES ===');
                
                // Vérifier que les modales existent
                const listModal = document.getElementById('list_formations');
                const editModal = document.getElementById('edit_formation');
                const deleteModal = document.getElementById('delete_confirmation');
                
                console.log('Modale liste:', listModal ? '✅ Trouvée' : '❌ Manquante');
                console.log('Modale édition:', editModal ? '✅ Trouvée' : '❌ Manquante');
                console.log('Modale suppression:', deleteModal ? '✅ Trouvée' : '❌ Manquante');
                
                // Vérifier Bootstrap
                if (typeof bootstrap !== 'undefined') {
                    console.log('Bootstrap: ✅ Chargé');
                } else {
                    console.error('Bootstrap: ❌ Non chargé');
                }
                
                // Vérifier SweetAlert
                if (typeof Swal !== 'undefined') {
                    console.log('SweetAlert: ✅ Chargé');
                } else {
                    console.error('SweetAlert: ❌ Non chargé');
                }
                
                console.log('=== FIN TEST ===');
            });

            // Test des éléments du formulaire d'édition
            document.addEventListener('DOMContentLoaded', function() {
                console.log('=== VÉRIFICATION FORMULAIRE ÉDITION ===');
                
                const elementsToCheck = [
                    'edit_formation_id',
                    'edit_titre', 
                    'edit_categorie_id',
                    'edit_programme',
                    'edit_cout',
                    'edit_prerequis',
                    'edit_bonus',
                    'edit_lieu',
                    'edit_date_debut',
                    'edit_date_fin',
                    'edit_file'
                ];
                
                elementsToCheck.forEach(id => {
                    const element = document.getElementById(id);
                    console.log(`${id}:`, element ? '✅ Trouvé' : '❌ Manquant');
                });
                
                console.log('=== FIN VÉRIFICATION ===');
            });

            // Gestion des contraintes de dates
            function initializeDateConstraints() {
                const today = new Date().toISOString().split('T')[0];
                
                // La date de début ne peut pas être antérieure à aujourd'hui
                const dateDebutInput = document.getElementById('edit_date_debut');
                const dateFinInput = document.getElementById('edit_date_fin');
                
                if (dateDebutInput) {
                    dateDebutInput.setAttribute('min', today);
                    console.log('Date minimum pour début:', today);
                }
                
                if (dateFinInput) {
                    dateFinInput.setAttribute('min', today);
                    console.log('Date minimum pour fin:', today);
                }
            }

            // Mettre à jour les contraintes quand la date de début change
            function updateDateConstraints() {
                const dateDebutInput = document.getElementById('edit_date_debut');
                const dateFinInput = document.getElementById('edit_date_fin');
                
                if (dateDebutInput && dateFinInput) {
                    const dateDebut = dateDebutInput.value;
                    
                    if (dateDebut) {
                        // La date de fin ne peut pas être antérieure à la date de début
                        dateFinInput.setAttribute('min', dateDebut);
                        console.log('Date minimum pour fin mise à jour:', dateDebut);
                        
                        // Vérifier si la date de fin actuelle est valide
                        const dateFin = dateFinInput.value;
                        if (dateFin && dateFin < dateDebut) {
                            dateFinInput.value = '';
                            
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Date invalide',
                                    text: 'La date de fin doit être postérieure ou égale à la date de début',
                                    timer: 3000
                                });
                            } else {
                                alert('La date de fin doit être postérieure ou égale à la date de début');
                            }
                        }
                    } else {
                        // Remettre la contrainte par défaut (aujourd'hui)
                        const today = new Date().toISOString().split('T')[0];
                        dateFinInput.setAttribute('min', today);
                    }
                }
            }

            // Valider la date de fin
            function validateDateFin() {
                const dateDebutInput = document.getElementById('edit_date_debut');
                const dateFinInput = document.getElementById('edit_date_fin');
                
                if (dateDebutInput && dateFinInput) {
                    const dateDebut = dateDebutInput.value;
                    const dateFin = dateFinInput.value;
                    
                    if (dateDebut && dateFin && dateFin < dateDebut) {
                        dateFinInput.value = '';
                        
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Date invalide',
                                text: 'La date de fin doit être postérieure ou égale à la date de début',
                                timer: 3000
                            });
                        } else {
                            alert('La date de fin doit être postérieure ou égale à la date de début');
                        }
                    }
                }
            }

            // Validation avant soumission
            function validateDatesBeforeSubmit() {
                const dateDebutInput = document.getElementById('edit_date_debut');
                const dateFinInput = document.getElementById('edit_date_fin');
                const today = new Date().toISOString().split('T')[0];
                
                if (dateDebutInput && dateDebutInput.value) {
                    if (dateDebutInput.value < today) {
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Date invalide',
                                text: 'La date de début ne peut pas être antérieure à aujourd\'hui'
                            });
                        } else {
                            alert('La date de début ne peut pas être antérieure à aujourd\'hui');
                        }
                        return false;
                    }
                }
                
                if (dateDebutInput && dateFinInput && dateDebutInput.value && dateFinInput.value) {
                    if (dateFinInput.value < dateDebutInput.value) {
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Date invalide',
                                text: 'La date de fin doit être postérieure ou égale à la date de début'
                            });
                        } else {
                            alert('La date de fin doit être postérieure ou égale à la date de début');
                        }
                        return false;
                    }
                }
                
                return true;
            }

            // Gestionnaire pour le formulaire de CRÉATION
            document.addEventListener('DOMContentLoaded', function() {
                
                // ... existing code pour edit ...
                
                // NOUVEAU : Gestionnaire pour la création
                const createForm = document.getElementById('createFormationForm');
                if (createForm) {
                    createForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        console.log('Formulaire de création soumis');
                        
                        // Valider les dates avant de continuer (pour création aussi)
                        if (!validateCreateDatesBeforeSubmit()) {
                            console.log('Validation des dates de création échouée');
                            return;
                        }
                        
                        const formData = new FormData(this);
                        
                        console.log('Envoi requête POST pour création vers: /admin/formations/store');
                        
                        // Debug : Afficher toutes les données envoyées
                        console.log('Données FormData pour création:');
                        for (let [key, value] of formData.entries()) {
                            console.log(`${key}:`, value);
                        }
                        
                        // Vérifier si SweetAlert fonctionne
                        if (typeof Swal === 'undefined') {
                            alert('SweetAlert non disponible');
                            return;
                        }
                        
                        // Afficher le loader SweetAlert
                        Swal.fire({
                            title: 'Création en cours...',
                            html: `
                                <div class="d-flex flex-column align-items-center">
                                    <div class="spinner-border text-primary mb-3" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                    <p class="mb-0">Veuillez patienter pendant la création</p>
                                </div>
                            `,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false
                        });
                        
                        // Envoyer la requête
                        fetch('/admin/formations/store', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: formData
                        })
                        .then(response => {
                            console.log('Response status création:', response.status);
                            console.log('Response headers création:', response.headers.get('content-type'));
                            
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            
                            const contentType = response.headers.get('content-type');
                            if (!contentType || !contentType.includes('application/json')) {
                                throw new Error('La réponse n\'est pas du JSON');
                            }
                            
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data création:', data);
                            
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Formation créée !',
                                    text: data.message || 'La formation a été créée avec succès',
                                    confirmButtonText: 'Fermer',
                                    confirmButtonColor: '#28a745'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Recharger la page actuelle au lieu de rediriger
                                        window.location.reload();
                                    }
                                });
                            } else {
                                let errorMessage = data.message || 'Erreur lors de la création';
                                
                                if (data.errors) {
                                    errorMessage = 'Erreur de validation:\n\n';
                                    for (const field in data.errors) {
                                        const fieldName = getFieldDisplayName(field);
                                        errorMessage += `• ${fieldName}: ${data.errors[field].join(', ')}\n`;
                                    }
                                }
                                
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Échec de la création',
                                    text: errorMessage,
                                    confirmButtonText: 'Corriger',
                                    width: '500px'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Erreur complète création:', error);
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur de connexion',
                                html: `
                                    <p>Problème de connexion ou de format de réponse</p>
                                    <small class="text-muted">Détails: ${error.message}</small>
                                `,
                                confirmButtonText: 'Réessayer'
                            });
                        });
                    });
                }
            });

            // Initialiser les contraintes de dates pour la création
            function initializeCreateDateConstraints() {
                const today = new Date().toISOString().split('T')[0];
                
                // La date de début ne peut pas être antérieure à aujourd'hui
                const dateDebutInput = document.getElementById('date_debut');
                const dateFinInput = document.getElementById('date_fin');
                
                if (dateDebutInput) {
                    dateDebutInput.setAttribute('min', today);
                    dateDebutInput.addEventListener('change', updateCreateDateConstraints);
                    console.log('Date minimum pour début (création):', today);
                }
                
                if (dateFinInput) {
                    dateFinInput.setAttribute('min', today);
                    dateFinInput.addEventListener('change', validateCreateDateFin);
                    console.log('Date minimum pour fin (création):', today);
                }
            }

            // Mettre à jour les contraintes pour la création
            function updateCreateDateConstraints() {
                const dateDebutInput = document.getElementById('date_debut');
                const dateFinInput = document.getElementById('date_fin');
                
                if (dateDebutInput && dateFinInput) {
                    const dateDebut = dateDebutInput.value;
                    
                    if (dateDebut) {
                        // La date de fin ne peut pas être antérieure à la date de début
                        dateFinInput.setAttribute('min', dateDebut);
                        console.log('Date minimum pour fin (création) mise à jour:', dateDebut);
                        
                        // Vérifier si la date de fin actuelle est valide
                        const dateFin = dateFinInput.value;
                        if (dateFin && dateFin < dateDebut) {
                            dateFinInput.value = '';
                            
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Date invalide',
                                    text: 'La date de fin doit être postérieure ou égale à la date de début',
                                    timer: 3000
                                });
                            }
                        }
                    } else {
                        // Remettre la contrainte par défaut (aujourd'hui)
                        const today = new Date().toISOString().split('T')[0];
                        dateFinInput.setAttribute('min', today);
                    }
                }
            }

            // Valider la date de fin pour la création
            function validateCreateDateFin() {
                const dateDebutInput = document.getElementById('date_debut');
                const dateFinInput = document.getElementById('date_fin');
                
                if (dateDebutInput && dateFinInput) {
                    const dateDebut = dateDebutInput.value;
                    const dateFin = dateFinInput.value;
                    
                    if (dateDebut && dateFin && dateFin < dateDebut) {
                        dateFinInput.value = '';
                        
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Date invalide',
                                text: 'La date de fin doit être postérieure ou égale à la date de début',
                                timer: 3000
                            });
                        }
                    }
                }
            }

            // Validation avant soumission pour la création
            function validateCreateDatesBeforeSubmit() {
                const dateDebutInput = document.getElementById('date_debut');
                const dateFinInput = document.getElementById('date_fin');
                const today = new Date().toISOString().split('T')[0];
                
                if (dateDebutInput && dateDebutInput.value) {
                    if (dateDebutInput.value < today) {
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Date invalide',
                                text: 'La date de début ne peut pas être antérieure à aujourd\'hui'
                            });
                        }
                        return false;
                    }
                }
                
                if (dateDebutInput && dateFinInput && dateDebutInput.value && dateFinInput.value) {
                    if (dateFinInput.value < dateDebutInput.value) {
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Date invalide',
                                text: 'La date de fin doit être postérieure ou égale à la date de début'
                            });
                        }
                        return false;
                    }
                }
                
                return true;
            }

            // Fonction pour obtenir les noms lisibles des champs
            function getFieldDisplayName(fieldName) {
                const fieldNames = {
                    'titre': 'Titre',
                    'categorie_id': 'Catégorie',
                    'programme': 'Programme',
                    'cout': 'Coût',
                    'prerequis': 'Prérequis',
                    'bonus': 'Bonus',
                    'lieu': 'Lieu',
                    'date_debut': 'Date de début',
                    'date_fin': 'Date de fin',
                    'file': 'Fichier'
                };
                
                return fieldNames[fieldName] || fieldName;
            }

            // Initialiser les contraintes au chargement de la page
            document.addEventListener('DOMContentLoaded', function() {
                // ... existing code ...
                
                // NOUVEAU : Initialiser les contraintes pour la création
                initializeCreateDateConstraints();
            });

            // NOUVELLE SECTION : Gestionnaire pour le formulaire de CRÉATION
            document.addEventListener('DOMContentLoaded', function() {
                console.log('=== INITIALISATION GESTIONNAIRES ===');
                
                // ... existing code pour editFormationForm reste intact ...
                
                // NOUVEAU : Identifier et gérer le formulaire de création
                const createForm = document.querySelector('form[action*="/store"]') || 
                                  document.getElementById('createFormationForm') ||
                                  document.querySelector('form[method="POST"]:not(#editFormationForm)');
                
                console.log('Formulaire de création trouvé:', createForm ? '✅' : '❌');
                
                if (createForm) {
                    console.log('ID du formulaire de création:', createForm.id);
                    console.log('Action du formulaire:', createForm.action);
                    
                    createForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        console.log('🆕 Formulaire de CRÉATION soumis');
                        
                        const formData = new FormData(this);
                        
                        console.log('📤 Envoi vers:', this.action || '/admin/formations/store');
                        
                        // Vérifier SweetAlert
                        if (typeof Swal === 'undefined') {
                            console.error('❌ SweetAlert non disponible');
                            alert('Erreur: SweetAlert non disponible');
                            return;
                        }
                        
                        // 🔄 Modal de chargement
                        Swal.fire({
                            title: 'Création en cours...',
                            html: `
                                <div class="d-flex flex-column align-items-center">
                                    <div class="spinner-border text-success mb-3" role="status">
                                        <span class="visually-hidden">Création...</span>
                                    </div>
                                    <p class="mb-0">Création de la nouvelle formation</p>
                                </div>
                            `,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false
                        });
                        
                        // 📡 Requête AJAX
                        fetch(this.action || '/admin/formations/store', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: formData
                        })
                        .then(response => {
                            console.log('📥 Response status création:', response.status);
                            
                            if (!response.ok) {
                                throw new Error(`HTTP ${response.status}`);
                            }
                            
                            return response.json();
                        })
                        .then(data => {
                            console.log('📋 Response data création:', data);
                            
                            if (data.success) {
                                // ✅ Succès
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Formation créée !',
                                    text: data.message || 'La formation a été créée avec succès',
                                    confirmButtonText: 'Fermer',
                                    confirmButtonColor: '#28a745'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Recharger la page actuelle au lieu de rediriger
                                        window.location.reload();
                                    }
                                });
                            } else {
                                // ❌ Erreur de validation
                                let errorMessage = data.message || 'Erreur lors de la création';
                                
                                if (data.errors) {
                                    errorMessage = 'Veuillez corriger les erreurs suivantes :\n\n';
                                    for (const field in data.errors) {
                                        const fieldName = translateFieldName(field);
                                        errorMessage += `• ${fieldName}: ${data.errors[field].join(', ')}\n`;
                                    }
                                }
                                
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreurs de validation',
                                    text: errorMessage,
                                    confirmButtonText: 'Corriger',
                                    confirmButtonColor: '#dc3545',
                                    width: '500px'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('💥 Erreur création:', error);
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur de connexion',
                                html: `
                                    <p>Impossible de créer la formation</p>
                                    <small class="text-muted">Erreur: ${error.message}</small>
                                `,
                                confirmButtonText: 'Réessayer',
                                confirmButtonColor: '#dc3545'
                            });
                        });
                    });
                    
                    console.log('✅ Gestionnaire de création attaché');
                } else {
                    console.warn('⚠️ Formulaire de création non trouvé');
                }
                
                console.log('=== FIN INITIALISATION ===');
            });

            // Fonction pour traduire les noms de champs
            function translateFieldName(fieldName) {
                const translations = {
                    'titre': 'Titre',
                    'categorie_id': 'Catégorie',
                    'programme': 'Programme',
                    'cout': 'Coût',
                    'prerequis': 'Prérequis',
                    'bonus': 'Bonus',
                    'lieu': 'Lieu',
                    'date_debut': 'Date de début',
                    'date_fin': 'Date de fin',
                    'file': 'Fichier (Image/Vidéo)'
                };
                
                return translations[fieldName] || fieldName;
            }

            // Fonction pour changer le statut d'une inscription
            function changerStatutInscription(inscriptionId, nouveauStatut) {
                const isConfirm = nouveauStatut === 'confirme';
                
                Swal.fire({
                    title: isConfirm ? '✅ Confirmer l\'inscription ?' : '❌ Refuser l\'inscription ?',
                    html: `
                        <div class="text-center">
                            <i class="fas ${isConfirm ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'} fa-3x mb-3"></i>
                            <p>Êtes-vous sûr de vouloir <strong>${isConfirm ? 'confirmer' : 'refuser'}</strong> cette inscription ?</p>
                            ${isConfirm ? '<p class="text-muted">Le candidat sera notifié de la confirmation.</p>' : '<p class="text-muted">Cette action peut être annulée plus tard.</p>'}
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonColor: isConfirm ? '#28a745' : '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: isConfirm ? '<i class="fas fa-check me-1"></i>Oui, confirmer' : '<i class="fas fa-times me-1"></i>Oui, refuser',
                    cancelButtonText: '<i class="fas fa-arrow-left me-1"></i>Annuler',
                    reverseButtons: true,
                    focusConfirm: false,
                    background: '#ffffff',
                    customClass: {
                        popup: 'border-0 shadow',
                        title: 'text-dark',
                        content: 'text-dark'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Afficher une modale de chargement
                        Swal.fire({
                            title: 'Mise à jour en cours...',
                            html: `
                                <div class="d-flex flex-column align-items-center">
                                    <div class="spinner-border ${isConfirm ? 'text-success' : 'text-danger'} mb-3" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                    <p class="mb-0">Mise à jour du statut...</p>
                                </div>
                            `,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            background: '#ffffff'
                        });
                        
                        fetch(`/admin/inscriptions/${inscriptionId}/statut`, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ statut: nouveauStatut })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Recharger les détails de la formation
                                const formationId = data.formation_id;
                                voirDetailsFormation(formationId);
                                
                                // Notification de succès
                                Swal.fire({
                                    icon: 'success',
                                    title: isConfirm ? '🎉 Inscription confirmée !' : '✅ Inscription refusée',
                                    html: `
                                        <div class="text-center">
                                            <p>Le statut a été mis à jour avec succès.</p>
                                            ${isConfirm ? '<p class="text-muted">Le candidat peut maintenant être contacté.</p>' : '<p class="text-muted">Vous pouvez changer d\'avis à tout moment.</p>'}
                                        </div>
                                    `,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    showConfirmButton: false,
                                    background: '#ffffff'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: '❌ Erreur',
                                    text: 'Erreur lors de la mise à jour du statut.',
                                    confirmButtonText: 'Compris',
                                    confirmButtonColor: '#dc3545',
                                    background: '#ffffff'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                            Swal.fire({
                                icon: 'error',
                                title: '🚫 Erreur de connexion',
                                html: `
                                    <div class="text-center">
                                        <p>Impossible de mettre à jour le statut.</p>
                                        <p class="text-muted">Vérifiez votre connexion et réessayez.</p>
                                    </div>
                                `,
                                confirmButtonText: '🔄 Réessayer',
                                confirmButtonColor: '#dc3545',
                                background: '#ffffff'
                            });
                        });
                    }
                });
            }

            // ... existing code ...
        </script>

        <!-- Événement pour la soumission du formulaire d'édition - MISE À JOUR -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('SweetAlert disponible:', typeof Swal !== 'undefined');
                
                const editForm = document.getElementById('editFormationForm');
                if (editForm) {
                    editForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        console.log('Formulaire soumis');
                        
                        // Valider les dates avant de continuer
                        if (!validateDatesBeforeSubmit()) {
                            console.log('Validation des dates échouée');
                            return;
                        }
                        
                        const formationId = document.getElementById('edit_formation_id').value;
                        const formData = new FormData(this);
                        
                        // AJOUTER LA MÉTHODE PUT via method spoofing Laravel
                        formData.append('_method', 'PUT');
                        
                        console.log('Formation ID:', formationId);
                        console.log('Envoi requête POST avec _method=PUT vers:', `/admin/formations/${formationId}`);
                        
                        // Debug : Afficher toutes les données envoyées
                        console.log('Données FormData:');
                        for (let [key, value] of formData.entries()) {
                            console.log(`${key}:`, value);
                        }
                        
                        // Vérifier si SweetAlert fonctionne
                        if (typeof Swal === 'undefined') {
                            alert('SweetAlert non disponible');
                            return;
                        }
                        
                        // Afficher le loader SweetAlert
                        Swal.fire({
                            title: 'Modification en cours...',
                            html: `
                                <div class="d-flex flex-column align-items-center">
                                    <div class="spinner-border text-primary mb-3" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                    <p class="mb-0">Veuillez patienter pendant la modification</p>
                                </div>
                            `,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false
                        });
                        
                        // Utiliser POST avec _method=PUT (Method Spoofing Laravel)
                        fetch(`/admin/formations/${formationId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: formData
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            console.log('Response headers:', response.headers.get('content-type'));
                            
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            
                            const contentType = response.headers.get('content-type');
                            if (!contentType || !contentType.includes('application/json')) {
                                throw new Error('La réponse n\'est pas du JSON');
                            }
                            
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data:', data);
                            
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Modification réussie !',
                                    text: data.message,
                                    confirmButtonText: 'Retourner à la liste',
                                    confirmButtonColor: '#28a745'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Fermer la modale d'édition
                                        const editModal = bootstrap.Modal.getInstance(document.getElementById('edit_formation'));
                                        if (editModal) {
                                            editModal.hide();
                                        }
                                        
                                        // Retourner à la liste
                                        setTimeout(() => {
                                            backToList();
                                        }, 500);
                                    }
                                });
                            } else {
                                let errorMessage = data.message || 'Erreur lors de la modification';
                                
                                if (data.errors) {
                                    errorMessage += '\n\nDétails:\n';
                                    for (const field in data.errors) {
                                        errorMessage += `• ${data.errors[field].join(', ')}\n`;
                                    }
                                }
                                
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Échec de la modification',
                                    text: errorMessage,
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Erreur complète:', error);
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur de connexion',
                                html: `
                                    <p>Problème de connexion ou de format de réponse</p>
                                    <small class="text-muted">Détails: ${error.message}</small>
                                `,
                                confirmButtonText: 'OK'
                            });
                        });
                    });
                }
            });
        </script>

        <!-- Script pour la modale des détails de formation -->
        <script>
            // Fonction pour afficher les détails d'une formation
            function voirDetailsFormation(formationId) {
                console.log('📋 Ouverture détails formation ID:', formationId);
                
                // Ouvrir la modale
                const modal = new bootstrap.Modal(document.getElementById('detailsFormationModal'));
                modal.show();
                
                // Réinitialiser le contenu
                const contentDiv = document.getElementById('detailsFormationContent');
                contentDiv.innerHTML = `
                    <div class="text-center p-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Chargement...</span>
                        </div>
                        <p class="mt-3">Chargement des détails...</p>
                    </div>
                `;
                
                // Requête AJAX pour récupérer les détails
                fetch(`/admin/formations/${formationId}/details`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Erreur HTTP: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('✅ Détails reçus:', data);
                    afficherDetailsFormation(data);
                })
                .catch(error => {
                    console.error('❌ Erreur chargement détails:', error);
                    contentDiv.innerHTML = `
                        <div class="alert alert-danger text-center">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Erreur lors du chargement des détails: ${error.message}
                        </div>
                    `;
                });
            }
        
            // Fonction pour afficher les détails dans la modale
            function afficherDetailsFormation(data) {
                const formation = data.formation;
                const inscriptions = data.inscriptions;
                
                // Mettre à jour le titre de la modale
                document.getElementById('detailsFormationModalLabel').innerHTML = `
                    <i class="fas fa-graduation-cap me-2"></i>${formation.titre}
                `;
                
                // Générer le contenu de la modale
                const contentDiv = document.getElementById('detailsFormationContent');
                contentDiv.innerHTML = `
                    <div class="row">
                        {{-- Détails de la formation --}}
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informations générales</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <strong>📝 Description:</strong>
                                            <p class="mt-1 text-muted">${formation.programme || 'Aucune description'}</p>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <strong>📂 Catégorie:</strong><br>
                                            <span class="badge bg-success">${formation.categorie?.nom || 'Non définie'}</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <strong>💰 Coût:</strong><br>
                                            <span class="text-primary fw-bold">${formation.cout ? new Intl.NumberFormat('fr-FR').format(formation.cout) + ' FCFA' : 'Gratuit'}</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <strong>📅 Date début:</strong><br>
                                            <span class="text-info">${formation.date_debut ? new Date(formation.date_debut).toLocaleDateString('fr-FR') : 'À définir'}</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <strong>📅 Date fin:</strong><br>
                                            <span class="text-info">${formation.date_fin ? new Date(formation.date_fin).toLocaleDateString('fr-FR') : 'À définir'}</span>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <strong>📍 Lieu:</strong><br>
                                            <span class="text-secondary">${formation.lieu || 'À définir'}</span>
                                        </div>
                                        <div class="col-12">
                                            <strong>🎯 Prérequis:</strong><br>
                                            <span class="text-muted">${formation.prerequis || 'Aucun prérequis'}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Statistiques --}}
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Statistiques d'inscription</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-4 mb-3">
                                            <div class="card bg-primary text-white">
                                                <div class="card-body p-3">
                                                    <i class="fas fa-users fa-2x mb-2"></i>
                                                    <h4 class="mb-0">${inscriptions.length}</h4>
                                                    <small>Total inscriptions</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <div class="card bg-warning text-white">
                                                <div class="card-body p-3">
                                                    <i class="fas fa-clock fa-2x mb-2"></i>
                                                    <h4 class="mb-0">${inscriptions.filter(i => i.statut === 'en_attente').length}</h4>
                                                    <small>En attente</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <div class="card bg-success text-white">
                                                <div class="card-body p-3">
                                                    <i class="fas fa-check fa-2x mb-2"></i>
                                                    <h4 class="mb-0">${inscriptions.filter(i => i.statut === 'confirme').length}</h4>
                                                    <small>Confirmés</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    ${formation.file_path ? `
                                    <div class="text-center mt-3">
                                        <strong>🎬 Média de présentation:</strong><br>
                                        ${formation.file_type === 'image' ? 
                                            `<img src="/storage/${formation.file_path}" alt="Formation" class="img-thumbnail mt-2" style="max-height: 150px;">` :
                                            `<video controls class="mt-2" style="max-height: 150px; max-width: 100%;">
                                                <source src="/storage/${formation.file_path}" type="video/mp4">
                                            </video>`
                                        }
                                    </div>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    {{-- Liste des inscriptions --}}
                    <div class="card">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><i class="fas fa-list me-2"></i>Liste des candidats inscrits (${inscriptions.length})</h6>
                            ${inscriptions.length > 0 ? `
                            <button class="btn btn-sm btn-outline-primary" onclick="exporterInscriptions(${formation.id})">
                                <i class="fas fa-download me-1"></i>Exporter Excel
                            </button>` : ''}
                        </div>
                        <div class="card-body p-0">
                            ${inscriptions.length > 0 ? `
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th><i class="fas fa-user me-1"></i>Nom complet</th>
                                            <th><i class="fas fa-envelope me-1"></i>Email</th>
                                            <th><i class="fas fa-phone me-1"></i>Téléphone</th>
                                            <th><i class="fas fa-comment me-1"></i>Message</th>
                                            <th><i class="fas fa-clock me-1"></i>Date inscription</th>
                                            <th><i class="fas fa-flag me-1"></i>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${inscriptions.map((inscription, index) => `
                                        <tr>
                                            <td><strong>${index + 1}</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-circle bg-primary text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                                        ${inscription.nom.charAt(0).toUpperCase()}
                                                    </div>
                                                    <strong>${inscription.nom}</strong>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="mailto:${inscription.email}" class="text-decoration-none">
                                                    ${inscription.email}
                                                </a>
                                            </td>
                                            <td>
                                                ${inscription.telephone ? `<a href="tel:${inscription.telephone}" class="text-decoration-none">${inscription.telephone}</a>` : '<span class="text-muted">Non renseigné</span>'}
                                            </td>
                                            <td>
                                                ${inscription.message ? 
                                                    `<span class="text-truncate d-inline-block" style="max-width: 200px;" title="${inscription.message}">${inscription.message}</span>` : 
                                                    '<span class="text-muted">Aucun message</span>'
                                                }
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    ${new Date(inscription.created_at).toLocaleDateString('fr-FR')} à 
                                                    ${new Date(inscription.created_at).toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'})}
                                                </small>
                                            </td>
                                            <td>
                                                <span class="badge ${inscription.statut === 'confirme' ? 'bg-success' : inscription.statut === 'refuse' ? 'bg-danger' : 'bg-warning'}">
                                                    ${inscription.statut === 'confirme' ? '✅ Confirmé' : inscription.statut === 'refuse' ? '❌ Refusé' : '⏳ En attente'}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    ${inscription.statut === 'en_attente' ? `
                                                    <button class="btn btn-success btn-sm" onclick="changerStatutInscription(${inscription.id}, 'confirme')" title="Confirmer">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" onclick="changerStatutInscription(${inscription.id}, 'refuse')" title="Refuser">
                                                        <i class="fas fa-times"></i>
                                                    </button>` : ''}
                                                    <button class="btn btn-outline-primary btn-sm" onclick="contacterCandidat('${inscription.email}', '${inscription.nom}')" title="Contacter">
                                                        <i class="fas fa-envelope"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>`).join('')}
                                    </tbody>
                                </table>
                            </div>` : `
                            <div class="text-center p-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">Aucune inscription pour le moment</h5>
                                <p class="text-muted">Les candidatures apparaîtront ici dès qu'il y en aura.</p>
                            </div>`}
                        </div>
                    </div>
                `;
                
                // Afficher le bouton d'export si il y a des inscriptions
                const exportBtn = document.getElementById('exporterInscriptions');
                if (inscriptions.length > 0) {
                    exportBtn.style.display = 'inline-block';
                    exportBtn.onclick = () => exporterInscriptions(formation.id);
                } else {
                    exportBtn.style.display = 'none';
                }
            }
        
            // Fonction pour contacter un candidat
            function contacterCandidat(email, nom) {
                const subject = `Formation Excellium Conseil - Votre candidature`;
                const body = `Bonjour ${nom},\n\nNous avons bien reçu votre demande d'inscription à notre formation.\n\nCordialement,\nL'équipe Excellium Conseil`;
                
                window.location.href = `mailto:${email}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
            }
        
            // Fonction pour exporter les inscriptions
            function exporterInscriptions(formationId) {
                const link = document.createElement('a');
                link.href = `/admin/formations/${formationId}/export-inscriptions`;
                link.download = `inscriptions_formation_${formationId}.xlsx`;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        
            // Fonction utilitaire pour afficher des notifications
            function showNotification(message, type) {
                // Tu peux utiliser ton système de notification existant
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        text: message,
                        icon: type === 'success' ? 'success' : 'error',
                        timer: 3000,
                        showConfirmButton: false
                    });
                } else {
                    alert(message);
                }
            }
            
        </script>

        <!-- Script pour la création d'opportunités -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('createOpportuniteForm');
            const modal = document.getElementById('create_opportunites');
            
            // Validation en temps réel
            form.addEventListener('input', function(e) {
                validateField(e.target);
            });
            
            // Soumission du formulaire
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (validateForm()) {
                    // Animation de chargement
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;
                    
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Publication en cours...
                    `;
                    
                    // Soumission réelle
                    setTimeout(() => {
                        form.submit();
                    }, 500);
                }
            });
            
            // Validation des champs individuels
            function validateField(field) {
                const value = field.value.trim();
                const isValid = field.checkValidity();
                
                // Supprime les classes précédentes
                field.classList.remove('is-valid', 'is-invalid');
                
                if (value !== '') {
                    if (isValid) {
                        field.classList.add('is-valid');
                        
                        // Validations spécifiques
                        if (field.name === 'salaire_max' && field.value !== '') {
                            const salaireMin = document.getElementById('salaire_min').value;
                            if (salaireMin && parseFloat(field.value) < parseFloat(salaireMin)) {
                                field.classList.remove('is-valid');
                                field.classList.add('is-invalid');
                                return;
                            }
                        }
                    } else {
                        field.classList.add('is-invalid');
                    }
                }
            }
            
            // Validation complète du formulaire
            function validateForm() {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    validateField(field);
                    if (!field.checkValidity() || field.value.trim() === '') {
                        isValid = false;
                    }
                });
                
                // Validation personnalisée des salaires
                const salaireMin = document.getElementById('salaire_min');
                const salaireMax = document.getElementById('salaire_max');
                
                if (salaireMin.value && salaireMax.value && 
                    parseFloat(salaireMax.value) < parseFloat(salaireMin.value)) {
                    salaireMax.classList.add('is-invalid');
                    isValid = false;
                }
                
                if (!isValid) {
                    Swal.fire({
                        icon: 'warning',
                        title: '⚠️ Formulaire incomplet',
                        html: `
                            <div class="text-center">
                                <p>Veuillez remplir tous les champs obligatoires marqués d'un astérisque (*).</p>
                                <div class="alert alert-light border mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-lightbulb me-1"></i>
                                        Les champs en rouge nécessitent votre attention.
                                    </small>
                                </div>
                            </div>
                        `,
                        confirmButtonText: '<i class="fas fa-edit me-1"></i>Corriger',
                        confirmButtonColor: '#ffc107'
                    });
                }
                
                return isValid;
            }
            
            // Réinitialiser le formulaire à la fermeture
            modal.addEventListener('hidden.bs.modal', function() {
                form.reset();
                form.querySelectorAll('.is-valid, .is-invalid').forEach(field => {
                    field.classList.remove('is-valid', 'is-invalid');
                });
                
                // Réinitialiser le bouton de soumission
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Publier l\'opportunité';
            });
            
            // Auto-complétion intelligente
            document.getElementById('titre').addEventListener('input', function(e) {
                const titre = e.target.value.toLowerCase();
                const entrepriseField = document.getElementById('entreprise');
                
                // Si le titre contient certains mots-clés, suggérer Excellium
                if (titre.includes('développeur') || titre.includes('web') || titre.includes('consultant')) {
                    if (!entrepriseField.value) {
                        entrepriseField.value = 'Excellium Conseils';
                        entrepriseField.classList.add('is-valid');
                    }
                }
            });
            
            // Formatage automatique du téléphone
            document.getElementById('contact_telephone').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 0 && !value.startsWith('225')) {
                    value = '225' + value;
                }
                if (value.length > 3) {
                    value = '+' + value.substring(0, 3) + ' ' + value.substring(3);
                }
                e.target.value = value;
            });
        });
        </script>

</body>

</html>
