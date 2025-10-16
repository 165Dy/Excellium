<!doctype html>

<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
    data-bs-theme="light" data-assets-path="{{ asset('assets_2/') }}" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>admin | Excellium conseils </title>

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
     <script src="{{ asset('assets_2/js/modal.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes bounceIn {

            0%,
            20%,
            40%,
            60%,
            80% {
                transform: scale(0.3);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes shakeX {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-10px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(10px);
            }
        }

        /* Style personnalisé pour SweetAlert */
        .swal2-popup {
            border-radius: 15px !important;
        }

        .swal2-html-container .card {
            margin: 10px 0;
        }

        .swal2-input {
            background: #fff !important;
            color: #333 !important;
            pointer-events: auto !important;
            opacity: 1 !important;
        }

        .swal2-card {
            border-radius: 24px !important;
            box-shadow: 0 6px 32px rgba(80, 105, 151, 0.13);
            padding-bottom: 0 !important;
        }

        .swal2-confirm--primary {
            background: linear-gradient(90deg, #6C63FF, #3b94fa) !important;
            border-radius: 18px !important;
            font-size: 1em !important;
            font-weight: 600 !important;
            box-shadow: 0 2px 8px #a4bce7a0;
        }

        .swal2-popup .swal2-input {
            border-radius: 10px !important;
            border: 1px solid #e0e6ed !important;
            background: #fff !important;
            font-size: 1em !important;
            margin-top: 0.2em !important;
        }

        .swal2-popup label {
            margin-bottom: 0.2em;
            display: block;
        }
    </style>

    <!-- Styles from child views -->
    @stack('styles')
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
                                            <linearGradient id="paint0_linear_2989_100980" x1="5.36642"
                                                y1="0.849138" x2="10.532" y2="24.104"
                                                gradientUnits="userSpaceOnUse">
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
                            <span class="app-brand-text demo menu-text fw-semibold ms-1">materialize</span>
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
                                    <span class="d-none ms-2" id="nav-theme-text">toggle_theme</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-theme-text">
                                    <li>
                                        <button type="button" class="dropdown-item align-items-center active"
                                            data-bs-theme-value="light" aria-pressed="false">
                                            <span><i class="icon-base ri ri-sun-line icon-22px me-3"
                                                    data-icon="sun-line"></i>light</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item align-items-center"
                                            data-bs-theme-value="dark" aria-pressed="true">
                                            <span><i class="icon-base ri ri-moon-clear-line icon-22px me-3"
                                                    data-icon="moon-clear-line"></i>dark</span>
                                        </button>
                                    </li>

                                </ul>
                            </li>
                            <!-- / Style Switcher-->

                            <!-- Quick links -->
                            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-sm-2 me-xl-0">
                                {{-- <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                                    href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                    aria-expanded="false">
                                    <i class="icon-base ri ri-star-smile-line icon-22px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <div class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h6 class="mb-0 me-auto">shortcuts</h6>
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
                                                <a href="app-calendar.html" class="stretched-link">calendar</a>
                                                <small>appointments</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-file-text-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="app-invoice-list.html" class="stretched-link">invoice app</a>
                                                <small>manage accounts</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="icon-base ri ri-user-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="app-user-list.html" class="stretched-link">user app</a>
                                                <small>manage users</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-computer-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="app-access-roles.html"
                                                    class="stretched-link">role_management</a>
                                                <small>permission</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-pie-chart-2-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="#" class="stretched-link">dashboard </a>
                                                <small>user_dashboard</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-settings-4-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="pages-account-settings-account.html"
                                                    class="stretched-link">setting</a>
                                                <small>account settings</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i
                                                        class="icon-base ri ri-question-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="pages-faq.html" class="stretched-link">faqs</a>
                                                <small>faqs_articles</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                                    <i class="icon-base ri ri-tv-2-line icon-26px text-heading"></i>
                                                </span>
                                                <a href="modal-examples.html" class="stretched-link">modals</a>
                                                <small>useful popups</small>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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
                                            <h6 class="mb-0 me-auto">notification</h6>
                                            <div class="d-flex align-items-center h6 mb-0">
                                                <span
                                                    class="badge rounded-pill bg-label-primary fs-xsmall me-2">8_new</span>
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
                                                        <h6 class="small mb-1">congratulation lettie
                                                        </h6>
                                                        <small class="mb-1 d-block text-body">won the monthly best
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
                                                                class="avatar-initial rounded-circle bg-label-danger">cf</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="small mb-1">charles_franklin</h6>
                                                        <small
                                                            class="mb-1 d-block text-body">accepted_your_connection</small>
                                                        <small class="text-body-secondary">12h ago</small>
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
                                                        <h6 class="small mb-1">nouveau message</h6>
                                                        <small class="mb-1 d-block text-body">you have new_message from
                                                            natalie</small>
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
                                                        <h6 class="small mb-1">
                                                            whoo you have new order</h6>
                                                        <small class="mb-1 d-block text-body">acme inc made new
                                                            order</small>
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
                                                        <h6 class="small mb-1">
                                                            application_has_been_approved</h6>
                                                        <small
                                                            class="mb-1 d-block text-body">your_abc_project_application_has_been_approved</small>
                                                        <small class="text-body-secondary">2_days_ago</small>
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
                                                        <h6 class="small mb-1">
                                                            monthly_report_is_generated</h6>
                                                        <small class="mb-1 d-block text-body">July monthly financial
                                                            report is generated </small>
                                                        <small class="text-body-secondary">3_days_ago</small>
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
                                                        <h6 class="small mb-1">
                                                            send_connection_request</h6>
                                                        <small
                                                            class="mb-1 d-block text-body">peter_sent_you_connection_request</small>
                                                        <small class="text-body-secondary">4_days_ago</small>
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
                                                        <h6 class="small mb-1">new_message_from_jane')
                                                        </h6>
                                                        <small
                                                            class="mb-1 d-block text-body">your_have_new_message_from_jane</small>
                                                        <small class="text-body-secondary">5_days_ago</small>
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
                                                        <h6 class="small mb-1">cpu is running high
                                                        </h6>
                                                        <small class="mb-1 d-block text-body">cpu
                                                            utilization_percent_is_currently_at_8863</small>
                                                        <small class="text-body-secondary">5_days_ago</small>
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
                                                <small class="align-middle">view_all_notifications</small>
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
                                                    <h6 class="mb-0 small">john_doe</h6>
                                                    <small class="text-body-secondary">admin</small>
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
                                                class="align-middle">my_profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <i class="icon-base ri ri-settings-4-line icon-22px me-3"></i><span
                                                class="align-middle">settings</span>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>

                                    <li>
                                        <div class="d-grid px-4 pt-2 pb-1">
                                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger d-flex"
                                                    style="width: 100%;">
                                                    <small class="align-middle">logout</small>
                                                    <i class="icon-base ri ri-logout-box-r-line ms-2 icon-16px"></i>
                                                </button>
                                            </form>
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
                                    <a href="{{ route('admin.dashboard') }}" class="menu-link ">
                                        <i class="menu-icon icon-base ri ri-home-smile-line"></i>
                                        <div data-i18n="Dashboards">dashboards</div>
                                    </a>
                                </li>

                                <!-- Apps -->
                                <li class="menu-item active">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-mail-open-line"></i>
                                        <div data-i18n="Apps">apps</div>
                                    </a>
                                    <ul class="menu-sub">
                                        <li class="menu-item">
                                            <a href="{{ route('admin.users.index') }}" class="menu-link ">
                                                <i class="menu-icon icon-base ri ri-user-line"></i>
                                                <div data-i18n="Users">users</div>
                                            </a>
                                        </li>
                                        @if (auth()->user()->type === 'super_admin')
                                            <li class="menu-item">
                                                <a href="{{ route('admin.invitations.index') }}" class="menu-link">
                                                    <i class="menu-icon icon-base ri ri-mail-send-line"></i>
                                                    <div data-i18n="Invitations">Invitations Admin</div>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="menu-item">
                                            <a href="{{ route('admin.entreprises.index') }}" class="menu-link">
                                                <i class="menu-icon icon-base ri ri-building-line"></i>
                                                <div data-i18n="Entreprises">Entreprises</div>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <!-- Formation -->
                                <li class="menu-item ">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-drag-drop-line"></i>
                                        <div data-i18n="Formation">formation</div>
                                    </a>
                                    <ul class="menu-sub">

                                        <li class="menu-item">
                                            <a href="javascript:;" class="menu-link"
                                                data-bs-target="#create_formations" data-bs-toggle="modal">
                                                <i
                                                    class="icon-base ri ri-edit-box-line text-primary icon-22px me-2"></i>
                                                <div>creer une formation</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#" class="menu-link" data-bs-target="#liste_formations"
                                                data-bs-toggle="modal">
                                                <i class="menu-icon icon-base ri ri-list-settings-fill"></i>
                                                <div>voir la liste</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Emplois -->
                                <li
                                    class="menu-item {{ request()->routeIs('admin.emplois.*') ? 'active open' : '' }}">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-computer-line"></i>
                                        <div data-i18n="Offres d'emploi">emplois</div>
                                        <div class="badge badge-center rounded-pill bg-primary ms-auto"
                                            style="width:10px, height:10px">
                                            <!-- Count active emplois -->
                                            {{ App\Models\Emploi::where('statut', 'active')->count() }}
                                        </div>
                                    </a>
                                    <ul class="menu-sub">
                                        <li
                                            class="menu-item {{ request()->routeIs('emplois.index') ? 'active' : '' }}">
                                            <a href="{{ route('admin.emplois.index') }}" class="menu-link">
                                                <i class="menu-icon tf-icons ri ri-list-unordered"></i>
                                                <div data-i18n="Liste des emplois">liste des emplois
                                                </div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0);" class="menu-link" data-bs-toggle="modal"
                                                data-bs-target="#create_emplois">
                                                <i class="menu-icon tf-icons ri ri-add-circle-line"></i>
                                                <div data-i18n="Nouvelle emploi">nouvel emploi
                                                </div>
                                            </a>
                                        </li>
                                        <li
                                            class="menu-item {{ request()->routeIs('admin.candidatures.*') ? 'active' : '' }}">
                                            <a href="{{ route('admin.emplois.candidatures.index') }}"
                                                class="menu-link">
                                                <i class="menu-icon tf-icons ri ri-group-2-line"></i>
                                                <div data-i18n="Candidatures">candidatures </div>
                                                <div class="badge badge-center rounded-pill bg-warning ms-auto">
                                                    {{ App\Models\Candidature::where('statut', 'en_attente')->count() }}
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Opportunités d'affaire -->
                                <li
                                    class="menu-item {{ request()->routeIs('admin.opportunites.*') ? 'active open' : '' }}">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-briefcase-line me-2"></i>
                                        <div data-i18n="Opportunités d'affaire">Opportunités d'affaire</div>
                                        <div class="badge badge-center rounded-pill bg-primary ms-auto"
                                            style="width:10px, height:10px">
                                            <!-- Count active opportunities -->
                                            {{ App\Models\Opportunite::where('statut', 'en_ligne')->count() }}
                                        </div>
                                    </a>
                                    <ul class="menu-sub">
                                        <li class="menu-item">
                                            <a href="javascript:void(0);" class="menu-link" data-bs-toggle="modal"
                                                data-bs-target="#create_opportunite">
                                                <i class="menu-icon tf-icons ri ri-add-circle-line"></i>
                                                <div data-i18n="Nouvelle opportunité">Nouvelle opportunité</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0);" class="menu-link" data-bs-toggle="modal"
                                                data-bs-target="#liste_opportunites">
                                                <i class="menu-icon tf-icons ri ri-list-unordered"></i>
                                                <div data-i18n="Liste des opportunités">Liste des opportunités</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="javascript:void(0);" class="menu-link" data-bs-toggle="modal"
                                                data-bs-target="#candidats_opportunites">
                                                <i class="menu-icon tf-icons ri ri-group-line"></i>
                                                <div data-i18n="Candidats intéressés">Candidats intéressés</div>
                                                <div class="badge badge-center rounded-pill bg-warning ms-auto">
                                                    {{ App\Models\Postulation::where('statut', 'en_attente')->count() }}
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Divers -->
                                <li class="menu-item ">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-price-tag-line"></i>
                                        <div data-i18n="Divers">divers</div>
                                    </a>
                                    <ul class="menu-sub">

                                        <li class="menu-item">
                                            <a href="{{ route('admin.partenaires.index') }}" class="menu-link">
                                                <i
                                                    class="icon-base ri ri-account-pin-box-line text-primary icon-22px me-2"></i>
                                                <div>partenaires</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('admin.temoignages.index') }}" class="menu-link ">
                                                <i class="menu-icon icon-base ri ri-kakao-talk-line"></i>
                                                <div>temoignages </div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('admin.articles.index') }}" class="menu-link">
                                                <i class="menu-icon icon-base ri ri-book-open-line"></i>
                                                <div>articles</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Categories -->
                                <li class="menu-item ">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-folder-5-line"></i>
                                        <div data-i18n="Categories">categories </div>
                                    </a>
                                    <ul class="menu-sub">

                                        <li class="menu-item">
                                            <a href="javascript:;" class="menu-link"
                                                data-bs-target="#create_categories" data-bs-toggle="modal">
                                                <i
                                                    class="icon-base ri ri-edit-box-line text-primary icon-22px me-2"></i>
                                                <div>AJOUTER</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#" class="menu-link" data-bs-target="#liste_categories"
                                                data-bs-toggle="modal">
                                                <i class="menu-icon icon-base ri ri-list-settings-fill"></i>
                                                <div>voir_la_liste </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Produits -->
                                <li class="menu-item ">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-coupon-4-line"></i>
                                        <div data-i18n="Produits">produits</div>
                                    </a>
                                    <ul class="menu-sub">

                                        <li class="menu-item">
                                            <a href="javascript:;" class="menu-link"
                                                data-bs-target="#create_produits" data-bs-toggle="modal">
                                                <i
                                                    class="icon-base ri ri-edit-box-line text-primary icon-22px me-2"></i>
                                                <div>AJOUTER </div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#" class="menu-link" data-bs-target="#liste_produits"
                                                data-bs-toggle="modal">
                                                <i class="menu-icon icon-base ri ri-list-settings-fill"></i>
                                                <div>voir la liste </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- Services -->
                                <li class="menu-item ">
                                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                                        <i class="menu-icon icon-base ri ri-customer-service-2-line"></i>
                                        <div data-i18n="Services">Services</div>
                                    </a>
                                    <ul class="menu-sub">

                                        <li class="menu-item">
                                            <a href="javascript:;" class="menu-link"
                                                data-bs-target="#create_services" data-bs-toggle="modal">
                                                <i
                                                    class="icon-base ri ri-edit-box-line text-primary icon-22px me-2"></i>
                                                <div>AJOUTER </div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#" class="menu-link" data-bs-target="#liste_services"
                                                data-bs-toggle="modal">
                                                <i class="menu-icon icon-base ri ri-list-settings-fill"></i>
                                                <div>Voir la liste</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#" class="menu-link" data-bs-toggle="modal"
                                                data-bs-target="#liste_user_services">
                                                <i class="menu-icon icon-base ri ri-user-shared-line"></i>
                                                <div>Abonnements Utilisateurs aux Services</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </aside>


                    <!-- / Menu -->

                    <!-- Content -->
                    @yield('dashboard')
                    @yield('index_invitations')
                    @yield('entreprises_index')
                    @yield('entreprises_create')
                    @yield('entreprises_show')
                    @yield('entreprises_edit')
                    @yield('assistance_comptable_index')
                    @yield('assistance_comptable_show')
                    @yield('assistance_comptable_create')
                    @yield('assistance_comptable_edit')
                    @yield('show_users')
                    @yield('index_users')
                    @yield('calendrier_index')
                    @yield('index_email')
                    @yield('index_categorie')
                    @yield('list_candidats')
                    @yield('Detail_Candidature')

                    {{-- //Create// --}}
                    @yield('index_formations')
                    @yield('index_emplois')
                    @yield('candidatures_index')
                    @yield('index_partenaires')
                    @yield('index_articles')
                    @yield('index_temoignages')
                    @yield('user_profile')



                    <!-- Modal -->

                    <!-- Create Formation Modal -->
                    <div class="modal fade" id="create_formations" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <h4 class="mb-2">ajouter une formation </h4>
                                    </div>
                                    <!-- Formulaire de création de formation stylisé -->
                                    <form id="formationForm" action="{{ route('admin.formations.store') }}"
                                        method="POST" class="row g-4" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="titre" name="titre"
                                                    class="form-control" placeholder="Titre" required>
                                                <label for="titre">titre</label>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select name="categorie_id" id="categorie_id" class="form-select"
                                                    required>
                                                    @if (isset($categories) && $categories->count() > 0)
                                                        @foreach ($categories as $categorie)
                                                            <option value="{{ $categorie->id }}">
                                                                {{ $categorie->nom }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        <option value="">aucune categorie disponible')
                                                        </option>
                                                    @endif
                                                </select>
                                                <label for="categorie_id">categorie </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea name="programme" id="programme" class="form-control" placeholder="Programme" style="height: 100px"></textarea>
                                                <label for="programme">programme</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="number" step="0.01" id="cout" name="cout"
                                                    class="form-control" placeholder="Coût">
                                                <label for="cout">cout</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="lieu" name="lieu"
                                                    class="form-control" placeholder="Lieu">
                                                <label for="lieu">lieu</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="date" id="date_debut" name="date_debut"
                                                    class="form-control" placeholder="Date de début">
                                                <label for="date_debut">date de debut</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="date" id="date_fin" name="date_fin"
                                                    class="form-control" placeholder="Date de fin">
                                                <label for="date_fin">date de fin</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <textarea name="prerequis" id="prerequis" class="form-control" placeholder="Prérequis" style="height: 80px"></textarea>
                                                <label for="prerequis">prerequis</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <textarea name="bonus" id="bonus" class="form-control" placeholder="Bonus" style="height: 80px"></textarea>
                                                <label for="bonus">bonus</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="file" id="file" name="file"
                                                    class="form-control" accept="image/*,video/*"
                                                    onchange="previewFile(this)">
                                                <label for="file">fichier_image ou video max 150 mb</label>
                                            </div>
                                            <div id="file-error" class="mt-2" style="display: none;">
                                                <div class="alert alert-danger d-flex align-items-center">
                                                    <i class="ri ri-error-warning-line me-2"></i>
                                                    <span>la taille du fichier ne doit pas depasser 150 mb</span>
                                                </div>
                                            </div>
                                            <div id="file-preview" class="mt-3 d-flex justify-content-center"
                                                style="display: none;">
                                                <div class="preview-container">
                                                    <img id="image-preview" class="preview-media"
                                                        style="display: none; max-width: 200px; border-radius: 8px;">
                                                    <video id="video-preview" class="preview-media"
                                                        style="display: none; max-width: 200px; border-radius: 8px;"
                                                        controls>
                                                        <source id="video-source" src="" type="">
                                                    </video>
                                                    <button type="button" class="btn btn-sm btn-danger ms-2"
                                                        onclick="removeFile()">
                                                        <i class="ri ri-close-line"></i>
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
                                                <span class="spinner-border spinner-border-sm me-2"
                                                    style="display: none;" id="spinner"></span>
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6 p-4">
                                        <h4 class="mb-2 text-primary">
                                            <i class="ri-graduation-cap-line me-2"></i>
                                            LISTE DES FORMATIONS
                                        </h4>
                                        <p class="text-muted">gerez toutes vos formations disponibles
                                        </p>
                                    </div>

                                    <div class="card-datatable px-4 pb-4">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>titre</th>
                                                        <th>categorie</th>
                                                        <th class="text-center">cout</th>
                                                        <th>lieu</th>
                                                        <th class="text-center">dates</th>
                                                        <th class="text-center">actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @if (isset($formations) && $formations->count() > 0)
                                                        @foreach ($formations as $formation)
                                                            <tr data-formation-id="{{ $formation->id }}">
                                                                <td class="text-center">
                                                                    <span
                                                                        class="badge bg-label-primary rounded-pill fs-6">{{ $loop->iteration }}</span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-sm me-3">
                                                                            <div
                                                                                class="avatar-initial rounded bg-label-secondary">
                                                                                <i class="ri-file-line"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-0">{{ $formation->titre }}
                                                                            </h6>
                                                                            <small
                                                                                class="text-muted">{{ $formation->programme ? str($formation->programme)->limit(50) : '' }}</small>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span
                                                                        class="badge bg-label-success">{{ $formation->categorie ? $formation->categorie->nom : 'N/A' }}</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span
                                                                        class="fw-medium text-primary">{{ $formation->cout ? number_format($formation->cout, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span
                                                                        class="text-muted">{{ $formation->lieu ?? 'Non spécifié' }}</span>
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
                                                                        <button
                                                                            class="btn btn-sm btn-icon btn-outline-primary"
                                                                            title="Voir les détails"
                                                                            data-bs-toggle="tooltip"
                                                                            data-formation-id="{{ $formation->id }}"
                                                                            onclick="voirDetailsFormation({{ $formation->id }})">
                                                                            <i class="ri ri-eye-line"></i>
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-sm btn-icon btn-outline-warning"
                                                                            title="Modifier" data-bs-toggle="tooltip"
                                                                            data-formation-id="{{ $formation->id }}"
                                                                            onclick="editFormation({{ $formation->id }})">
                                                                            <i class="ri ri-edit-line"></i>
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-sm btn-icon btn-outline-danger"
                                                                            title="Supprimer" data-bs-toggle="tooltip"
                                                                            data-formation-id="{{ $formation->id }}"
                                                                            data-formation-title="{{ $formation->titre }}"
                                                                            onclick="confirmDelete({{ $formation->id }}, '{{ addslashes($formation->titre) }}')">
                                                                            <i class="ri ri-delete-bin-line"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="100%" class="text-center text-muted py-4">
                                                                <i class="fas fa-graduation-cap me-2"></i>Aucune
                                                                formation disponible
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        @if (isset($formations) && $formations->isNotEmpty())
                                            <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                                                <div class="text-muted">
                                                    <small>{{ $formations->count() }} formation(s)
                                                        disponible(s)</small>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary"
                                                        data-bs-target="#create_formations" data-bs-toggle="modal"
                                                        data-bs-dismiss="modal">
                                                        <i class="ri-add-line me-1"></i>
                                                        Nouvelle formation
                                                    </button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-muted">
                                                <small>aucune formation disponible</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Opportunités Class Modal -->
                    <div class="modal fade" id="create_emplois" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <div class="mb-4">
                                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-primary bg-gradient"
                                                style="width: 80px; height: 80px;">
                                                <i class="ri ri-graduation-cap-line text-white"
                                                    style="font-size: 2rem;"></i>
                                            </div>
                                        </div>
                                        <h4 class="mb-2 text-primary fw-bold">ajouter un emploi</h4>
                                        <p class="text-muted">
                                            creez une nouvelle offre d'emploi</p>
                                    </div>

                                    <form id="createEmploiForm" action="{{ route('admin.emplois.store') }}"
                                        method="POST" class="row g-4">
                                        @csrf

                                        {{-- Titre et Entreprise --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="titre" name="titre"
                                                    class="form-control" placeholder="Développeur Web Full Stack"
                                                    required />
                                                <label for="titre">
                                                    <i class="fas fa-briefcase me-1"></i>Titre du poste *
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="entreprise" name="entreprise"
                                                    class="form-control" placeholder="Excellium Conseils" required />
                                                <label for="entreprise">
                                                    <i class="fas fa-building me-1"></i>Entreprise *
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Type de contrat et Localisation --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select id="type_contrat" name="type_contrat" class="form-select"
                                                    required>
                                                    <option value="">selectionner</option>
                                                    <option value="CDI">
                                                        cdi_contrat_a_duree_indeterminee</option>
                                                    <option value="CDD">
                                                        cdd_contrat_a_duree_determinee</option>
                                                    <option value="Stage">stage</option>
                                                    <option value="Freelance">freelance</option>
                                                    <option value="Alternance">alternance</option>
                                                </select>
                                                <label for="type_contrat">
                                                    <i class="fas fa-file-contract me-1"></i>Type de contrat *
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="localisation" name="localisation"
                                                    class="form-control" placeholder="Paris, France" required />
                                                <label for="localisation">
                                                    <i class="fas fa-map-marker-alt me-1"></i>Localisation *
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Salaires --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="number" id="salaire_min" name="salaire_min"
                                                    class="form-control" placeholder="500000" min="0"
                                                    step="1000" />
                                                <label for="salaire_min">
                                                    <i class="fas fa-money-bill-wave me-1"></i>Salaire minimum (FCFA)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="number" id="salaire_max" name="salaire_max"
                                                    class="form-control" placeholder="800000" min="0"
                                                    step="1000" />
                                                <label for="salaire_max">
                                                    <i class="fas fa-money-bill-wave me-1"></i>Salaire maximum (FCFA)
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Expérience et Niveau d'étude --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select id="experience_requise" name="experience_requise"
                                                    class="form-select">
                                                    <option value="">selectionner</option>
                                                    <option value="Débutant">debutant accepte
                                                    </option>
                                                    <option value="1-2 ans">1-2 ans d'experience
                                                    </option>
                                                    <option value="3-5 ans">3-5 ans d'experience
                                                    </option>
                                                    <option value="5+ ans">5_ans_d'experience</option>
                                                    <option value="Senior">senior 10 ans</option>
                                                </select>
                                                <label for="experience_requise">
                                                    <i class="fas fa-user-tie me-1"></i>Expérience requise
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select id="niveau_etude" name="niveau_etude" class="form-select">
                                                    <option value="">selectionner</option>
                                                    <option value="Bac">baccalaureat</option>
                                                    <option value="Bac+2">bac2_btsdut</option>
                                                    <option value="Bac+3">bac3_licence</option>
                                                    <option value="Bac+5">bac5_master</option>
                                                    <option value="Doctorat">doctorat</option>
                                                </select>
                                                <label for="niveau_etude">
                                                    <i class="fas fa-graduation-cap me-1"></i>Niveau d'étude
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Nombre de postes et Date d'expiration --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="number" id="nombre_postes" name="nombre_postes"
                                                    class="form-control" value="1" min="1"
                                                    max="50" required />
                                                <label for="nombre_postes">
                                                    <i class="fas fa-users me-1"></i>Nombre de postes *
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="date" id="date_expiration" name="date_expiration"
                                                    class="form-control"
                                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}" required />
                                                <label for="date_expiration">
                                                    <i class="fas fa-calendar-alt me-1"></i>Date limite candidature *
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Contacts --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="email" id="contact_email" name="contact_email"
                                                    class="form-control" placeholder="recrutement@excellium.com" />
                                                <label for="contact_email">
                                                    <i class="fas fa-envelope me-1"></i>Email de contact
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="tel" id="contact_telephone" name="contact_telephone"
                                                    class="form-control" placeholder="+225 XX XX XX XX" />
                                                <label for="contact_telephone">
                                                    <i class="fas fa-phone me-1"></i>Téléphone de contact
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Description --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <textarea id="description" name="description" class="form-control" style="height: 120px;"
                                                    placeholder="Décrivez le poste, les missions, l'environnement de travail..." required></textarea>
                                                <label for="description">
                                                    <i class="fas fa-file-alt me-1"></i>Description du poste *
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Compétences requises --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <textarea id="competences_requises" name="competences_requises" class="form-control" style="height: 100px;"
                                                    placeholder="PHP, Laravel, JavaScript, Vue.js, MySQL..."></textarea>
                                                <label for="competences_requises">
                                                    <i class="fas fa-cogs me-1"></i>Compétences requises
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Avantages --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <textarea id="avantages" name="avantages" class="form-control" style="height: 80px;"
                                                    placeholder="Télétravail, mutuelle, tickets restaurant, formation..."></textarea>
                                                <label for="avantages">
                                                    <i class="fas fa-gift me-1"></i>Avantages
                                                </label>
                                            </div>
                                        </div>

                                        {{-- Statut --}}
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <select id="statut" name="statut" class="form-select">
                                                    <option value="active" selected>
                                                        active_visible_pour_les_candidats</option>
                                                    <option value="fermee">
                                                        fermee_plus_de_candidatures</option>
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

                    <!-- Categories Modal -->
                    <div class="modal fade" id="create_categories" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <h4 class="mb-2">nouvelle_categorie</h4>
                                    </div>
                                    <form id="createCategorieForm" class="row g-5" method="POST"
                                        action="{{ route('admin.categories.store') }}">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nomCategorie" name="nom"
                                                    class="form-control" placeholder="comptabilité" required />
                                                <label for="nomCategorie">nom_categorie</label>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center">
                                            <button type="reset" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal" aria-label="Close">fermer</button>
                                            <button type="submit" class="btn btn-primary me-3">valider</button>

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
                                        <h4 class="mb-2">liste des categories</h4>
                                    </div>
                                    <div class="card-datatable text-nowrap">
                                        <table class="dt-scrollableTable table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>nom categorie</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="categoriesTableBody">
                                                <!-- Les catégories seront injectées ici par JS -->
                                            </tbody>
                                        </table>
                                        <center>
                                            <li class="menu-item">

                                                <a href="javascript:;" data-bs-target="#create_categories"
                                                    class="" data-bs-toggle="modal">

                                                    <div class="btn btn-primary me-3">
                                                        <i class="ri ri-add-large-fill"></i>
                                                        ajouter une categorie
                                                    </div>
                                                </a>
                                            </li>
                                        </center>

                                    </div>
                                </div>
                            </div>
                            <!--/ Content -->
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>

                    <!-- Modal Création Produit -->
                    <div class="modal fade" id="create_produits" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <h4 class="mb-2">nouveau_produit</h4>
                                    </div>
                                    <form id="createProduitForm" class="row g-5" method="POST"
                                        action="{{ route('admin.produits.store') }}">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nomProduit" name="nom"
                                                    class="form-control" placeholder="Nom du produit" required />
                                                <label for="nomProduit">nom_produit</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="slugProduit" name="slug"
                                                    class="form-control" placeholder="Slug (ex: produit-1)"
                                                    required />
                                                <label for="slugProduit">slug</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <select id="categorieProduit" name="categorie_id"
                                                    class="form-control" required>
                                                    <option value="">selectionnez une categorie
                                                    </option>
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="categorieProduit">categorie</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <select id="statutProduit" name="statut" class="form-control"
                                                    required>
                                                    <option value="actif">actif</option>
                                                    <option value="inactif">inactif</option>
                                                </select>
                                                <label for="statutProduit">statut</label>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="reset" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal" aria-label="Close">fermer</button>
                                            <button type="submit" class="btn btn-primary me-3">valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Liste Produits -->
                    <div class="modal fade" id="liste_produits" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <h4 class="mb-2">liste des produits</h4>
                                    </div>

                                    <table id="tableProduits" class="table  table-responsive pt-0">
                                        <thead>
                                            <tr>
                                                <th>nom</th>
                                                <th>categorie</th>
                                                <th>statut</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                         <div class="content-backdrop fade"></div>
                    </div>

                    <!-- Modal Création Service -->
                    <div class="modal fade" id="create_services" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <h4 class="mb-2">NOUVEAU SERVICE</h4>
                                    </div>
                                    <form id="createServiceForm" class="row g-5" method="POST"
                                        action="{{ route('admin.services.store') }}">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="nomService" name="nom"
                                                    class="form-control" placeholder="Nom du service" required />
                                                <label for="nomService">Nom Service</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea id="descriptionService" name="description" class="form-control" placeholder="Description du service"
                                                    rows="4"></textarea>
                                                <label for="descriptionService">Description</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" id="slugService" name="slug"
                                                    class="form-control" placeholder="Slug (ex: service-1)"
                                                    required />
                                                <label for="slugService">Slug</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <select id="categorieService" name="categorie_id"
                                                    class="form-control" required>
                                                    <option value="">Sélectionnez une catégorie</option>
                                                    @foreach ($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="categorieService">Catégorie</label>
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
                        </div>
                    </div>


                    <!-- Modal Liste Services -->
                    <div class="modal fade" id="liste_services" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-4 mt-2">
                                        <h4 class="fw-bold text-primary">📋 LISTE DES SERVICES</h4>
                                    </div>
                                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto p-3">
                                        <table id="tableServices"
                                            class="table table-striped table-hover align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Description</th>
                                                    <th>Catégorie</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                         <div class="content-backdrop fade"></div>
                    </div>



                    <!-- Modal Liste Inscriptions Utilisateur-Service -->
                    <div class="modal fade" id="liste_user_services" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-6">
                                        <h4 class="mb-2">Abonnements Utilisateurs aux Services</h4>
                                    </div>
                                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto px-3 pb-3">
                                        <table id="tableUserServices" class="table table-hover table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Utilisateur</th>
                                                    <th>Email</th>
                                                    <th>Service</th>
                                                    <th>Statut</th>
                                                    <th>Description</th>
                                                    <th>Début</th>
                                                    <th>Fin prévue</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                max-width: 300px;
            }

            .preview-media {
                border-radius: 8px !important;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
                background: rgba(0, 0, 0, 0.6);
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
                        <form id="editFormationForm" method="POST" class="row g-4"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="edit_formation_id" name="formation_id">

                            <!-- Titre -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="edit_titre" name="titre" class="form-control"
                                        placeholder="Titre de la formation" required>
                                    <label for="edit_titre">titre</label>
                                </div>
                            </div>

                            <!-- Catégorie -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="edit_categorie_id" name="categorie_id" class="form-select"
                                        required>
                                        <option value="">choisir une categorie</option>
                                        @if (isset($categories) && $categories->count() > 0)
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="">aucune categorie disponible</option>
                                        @endif
                                    </select>
                                    <label for="edit_categorie_id">categorie</label>
                                </div>
                            </div>

                            <!-- Programme -->
                            <div class="col-12">
                                <div class="form-floating form-floating-outline">
                                    <textarea id="edit_programme" name="programme" class="form-control" placeholder="Programme de la formation"
                                        rows="3"></textarea>
                                    <label for="edit_programme">programme</label>
                                </div>
                            </div>

                            <!-- Coût -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" id="edit_cout" name="cout" class="form-control"
                                        placeholder="0" min="0" step="0.01">
                                    <label for="edit_cout">cout fcfa</label>
                                </div>
                            </div>

                            <!-- Lieu -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="edit_lieu" name="lieu" class="form-control"
                                        placeholder="Lieu de la formation">
                                    <label for="edit_lieu">lieu</label>
                                </div>
                            </div>

                            <!-- Date début -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="date" id="edit_date_debut" name="date_debut"
                                        class="form-control" min="" onchange="updateDateConstraints()">
                                    <label for="edit_date_debut">date de debut</label>
                                </div>
                            </div>

                            <!-- Date fin -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="date" id="edit_date_fin" name="date_fin"
                                        class="form-control" min="" onchange="validateDateFin()">
                                    <label for="edit_date_fin">date de fin</label>
                                </div>
                            </div>

                            <!-- Prérequis -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <textarea id="edit_prerequis" name="prerequis" class="form-control" placeholder="Prérequis" rows="2"></textarea>
                                    <label for="edit_prerequis">prerequis</label>
                                </div>
                            </div>

                            <!-- Bonus -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <textarea id="edit_bonus" name="bonus" class="form-control" placeholder="Bonus" rows="2"></textarea>
                                    <label for="edit_bonus">bonus</label>
                                </div>
                            </div>

                            <!-- Fichier -->
                            <div class="col-12">
                                <label class="form-label">fichier_image_ou_video_optionnel</label>
                                <input type="file" id="edit_file" name="file" class="form-control"
                                    accept="image/*,video/*" onchange="previewEditFile(this)">
                                <div class="form-text">
                                    formats acceptes jpg png gif mp4 avi mov wmv taille max 150mb
                                </div>
                            </div>

                            <!-- Prévisualisation -->
                            <div class="col-12">
                                <div id="edit-file-preview" style="display: none;">
                                    <img id="edit-image-preview" class="img-fluid rounded"
                                        style="max-height: 200px; display: none;">
                                    <video id="edit-video-preview" controls class="w-100 rounded"
                                        style="max-height: 200px; display: none;">
                                        <source id="edit-video-source" src="" type="">
                                    </video>
                                    <button type="button" class="btn btn-sm btn-outline-danger mt-2"
                                        onclick="removeEditFile()">
                                        Supprimer le fichier
                                    </button>
                                </div>
                            </div>

                            <!-- Boutons -->
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-outline-secondary me-2"
                                    data-bs-dismiss="modal">
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <div class="mb-4">
                                <i class="ri-error-warning-line ri-96px text-danger"></i>
                            </div>
                            <h4 class="mb-2">confirmer_la_suppression</h4>
                            <p class="text-muted mb-2">
                                etes_vous_sur_de_vouloir_supprimer_cette_formation</p>
                            <p class="fw-bold text-dark mb-2" id="formation-to-delete"></p>
                            <p class="text-danger mb-0">
                                <strong>cette_action_est_irreversible</strong>
                            </p>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-secondary me-3" data-bs-dismiss="modal">
                                Annuler
                            </button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                                <span class="spinner-border spinner-border-sm me-2" style="display: none;"
                                    id="deleteSpinner"></span>
                                Oui, supprimer définitivement
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modale des détails de formation -->
        <div class="modal fade" id="detailsFormationModal" tabindex="-1"
            aria-labelledby="detailsFormationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="detailsFormationModalLabel">
                            <i class="fas fa-graduation-cap me-2"></i>Détails de la formation
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body" id="detailsFormationContent">
                        {{-- Le contenu sera chargé dynamiquement --}}
                        <div class="text-center p-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">chargement</span>
                            </div>
                            <p class="mt-3">chargement_des_details</p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Fermer
                        </button>
                        <button type="button" class="btn btn-primary" id="exporterInscriptions"
                            style="display: none;">
                            <i class="fas fa-download me-1"></i>Exporter les inscriptions
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Création Opportunité -->
        <div class="modal fade" id="create_opportunite" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <h4 class="mb-2 text-primary">
                                <i class="ri-handshake-line me-2"></i>
                                NOUVELLE OPPORTUNITÉ D'AFFAIRE
                            </h4>
                        </div>
                        <form id="createOpportuniteForm" class="row g-5" method="POST"
                            action="{{ route('admin.opportunites.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label class="form-label" for="titre">Titre de l'opportunité</label>
                                <input type="text" id="titre" name="titre" class="form-control"
                                    required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="categorie_id">Catégorie</label>
                                <select id="categorie_id" name="categorie_id" class="form-select">
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach (App\Models\Categorie::all() as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="statut">Statut</label>
                                <select id="statut" name="statut" class="form-select" required>
                                    <option value="brouillon">Brouillon</option>
                                    <option value="en_ligne">En ligne</option>
                                    <option value="ferme">Fermé</option>
                                    <option value="archive">Archivé</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="date_debut">Date de début</label>
                                <input type="datetime-local" id="date_debut" name="date_debut"
                                    class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="date_fin">Date de fin</label>
                                <input type="datetime-local" id="date_fin" name="date_fin"
                                    class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="lieu">Lieu</label>
                                <input type="text" id="lieu" name="lieu" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="contact_email">Email de contact</label>
                                <input type="email" id="contact_email" name="contact_email"
                                    class="form-control">
                            </div>

                            <!-- Critères -->
                            <div class="col-12">
                                <label class="form-label" for="criteres">Critères requis</label>
                                <div id="criteres-container">
                                    <div class="critere-item mb-2">
                                        <div class="input-group">
                                            <input type="text" name="criteres[]" class="form-control"
                                                placeholder="Ex: Expérience minimum 3 ans">
                                            <button type="button" class="btn btn-outline-danger remove-critere"
                                                onclick="removeCritere(this)">
                                                <i class="ri ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm"
                                    onclick="addCritere()">
                                    <i class="ri ri-add-bin-line"></i>Ajouter un critère
                                </button>
                            </div>

                            <!-- Informations complémentaires -->
                            <div class="col-12">
                                <label class="form-label" for="informations">Informations complémentaires</label>
                                <div id="informations-container">
                                    <div class="information-item mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="info_keys[]" class="form-control"
                                                    placeholder="Clé (ex: Budget, Durée)">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="info_values[]" class="form-control"
                                                    placeholder="Valeur (ex: 50000€, 6 mois)">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-outline-danger w-100"
                                                    onclick="removeInformation(this)">
                                                    <i class="ri ri-delete-bin-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm"
                                    onclick="addInformation()">
                                    <i class="ri-add-line me-1"></i>Ajouter une information
                                </button>
                            </div>

                            <!-- Fichier joint -->
                            <div class="col-12">
                                <label class="form-label" for="fichier_joint">Fichier joint (optionnel)</label>
                                <input type="file" id="fichier_joint" name="fichier_joint"
                                    class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.txt">
                                <small class="form-text text-muted">
                                    Formats acceptés: PDF, DOC, DOCX, JPG, PNG, TXT (Max: 5MB)
                                </small>
                            </div>
                            <style>
                                .form-control {
                                    padding: 6px 8px;
                                }
                            </style>

                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">
                                        Annuler
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-save-line me-1"></i>
                                        Créer l'opportunité
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Liste des Opportunités -->
        <div class="modal fade" id="liste_opportunites" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-simple">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="text-center mb-6 p-4">
                            <h4 class="mb-2 text-primary">
                                <i class="ri ri-briefcase-4-fill"></i>
                                LISTE DES OPPORTUNITÉS D'AFFAIRE
                            </h4>
                            <p class="text-muted">Gérez toutes vos opportunités d'affaire disponibles</p>
                        </div>

                        <div class="card-datatable px-4 pb-4">
                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                <table id="tableOpportunites" class="table table-striped table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Titre</th>
                                            <th>Catégorie</th>
                                            <th>Statut</th>
                                            <th>Date début</th>
                                            <th>Date fin</th>
                                            <th>Lieu</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Models\Opportunite::with('categorie')->get() as $opportunite)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm me-3">
                                                            <span class="avatar-initial rounded bg-primary">
                                                                {{ substr($opportunite->titre, 0, 2) }}
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">{{ $opportunite->titre }}</h6>
                                                            <small
                                                                class="text-muted">{{ $opportunite->slug }}</small>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <span
                                                        class="badge bg-label-info">{{ $opportunite->categorie->nom ?? 'N/A' }}</span>
                                                </td>
                                                <td>
                                                    @php
                                                        $badgeClass = match ($opportunite->statut) {
                                                            'en_ligne' => 'bg-label-success',
                                                            'brouillon' => 'bg-label-warning',
                                                            'ferme' => 'bg-label-danger',
                                                            'archive' => 'bg-label-secondary',
                                                            default => 'bg-label-info',
                                                        };
                                                    @endphp
                                                    <span
                                                        class="badge {{ $badgeClass }}">{{ ucfirst($opportunite->statut) }}</span>
                                                </td>
                                                <td>{{ $opportunite->date_debut ? $opportunite->date_debut->format('d/m/Y H:i') : 'N/A' }}
                                                </td>
                                                <td>{{ $opportunite->date_fin ? $opportunite->date_fin->format('d/m/Y H:i') : 'N/A' }}
                                                </td>
                                                <td>{{ $opportunite->lieu ?? 'N/A' }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button type="button" style="width:20px;"
                                                            class="badge bg-label-primary btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="ri ri-more-2-line"
                                                                style="font-size: 2rem"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                onclick="voirDetailsOpportunite({{ $opportunite->id }})">
                                                                <i class="ri ri-eye-line me-1"></i> Voir détails
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                onclick="modifierOpportunite({{ $opportunite->id }})">
                                                                <i class="ri ri-edit-line me-1"></i> Modifier
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                onclick="supprimerOpportunite({{ $opportunite->id }})">
                                                                <i class="ri ri-delete-bin-7-line me-1"></i> Supprimer
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Fermer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Candidats Intéressés -->
        <div class="modal fade" id="candidats_opportunites" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-simple">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="text-center mb-6 p-4">
                            <h4 class="mb-2 text-primary">
                                <i class="ri-user-line me-2"></i>
                                CANDIDATS INTÉRESSÉS PAR LES OPPORTUNITÉS
                            </h4>
                            <p class="text-muted">Consultez les postulations pour chaque opportunité</p>
                        </div>

                        <div class="card-datatable px-4 pb-4">
                            <div class="mb-4">
                                <label class="form-label" for="selectOpportuniteCandidats">Sélectionner une
                                    opportunité
                                    :</label>
                                <select id="selectOpportuniteCandidats" class="form-select"
                                    onchange="chargerCandidatsOpportunite(this.value)">
                                    <option value="">Choisir une opportunité...</option>
                                    @foreach (App\Models\Opportunite::where('statut', 'en_ligne')->get() as $opportunite)
                                        <option value="{{ $opportunite->id }}">
                                            {{ $opportunite->titre }}
                                            ({{ $opportunite->postulations()->count() }}
                                            candidat{{ $opportunite->postulations()->count() > 1 ? 's' : '' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                <table id="tableCandidatsOpportunites"
                                    class="table table-striped table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Candidat</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Date de postulation</th>
                                            <th>Statut</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyCandidatsOpportunites">
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">
                                                Sélectionnez une opportunité pour voir les candidats
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Fermer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .critere-item,
            .information-item {
                transition: all 0.3s ease;
            }

            .critere-item:hover,
            .information-item:hover {
                background-color: rgba(0, 123, 255, 0.05);
                border-radius: 5px;
                padding: 5px;
            }

            .remove-critere,
            .btn-outline-danger {
                transition: all 0.3s ease;
            }

            .remove-critere:hover,
            .btn-outline-danger:hover {
                transform: scale(1.1);
            }

            .form-text {
                font-size: 0.875rem;
                color: #6c757d;
                margin-top: 0.25rem;
            }

            .input-group .form-control {
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
            }

            .input-group .btn {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
            }
        </style>

        <!--////////////////////////////////////////////////////////////////////////////////////////////////-->

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
                                    <h6 class="mb-1">fichier_actuel</h6>
                                    <p class="text-muted mb-1"><strong>${fileName}</strong></p>
                                    <p class="text-muted mb-0"><small>type_image</small></p>
                                    <small class="text-info">selectionnez_un_nouveau_fichier_pour_le_remplacer</small>
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
                                    <h6 class="mb-1">fichier_actuel</h6>
                                    <p class="text-muted mb-1"><strong>${fileName}</strong></p>
                                    <p class="text-muted mb-0"><small>type_video</small></p>
                                    <small class="text-info">selectionnez_un_nouveau_fichier_pour_le_remplacer</small>
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
                        console.log('Envoi requête POST avec _method=PUT vers:',
                            `/admin/formations/${formationId}`);

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
                                        <span class="visually-hidden">chargement</span>
                                    </div>
                                    <p class="mb-0">veuillez_patienter_pendant_la_modification</p>
                                </div>
                            `,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false
                        });

                        // Utiliser POST avec _method=PUT (Method Spoofing Laravel)
                        fetch(`/admin/formations/${formationId}`, {
                                method: 'POST', // Utiliser POST
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content'),
                                    'Accept': 'application/json'
                                    // Ne pas ajouter Content-Type, laissez le navigateur le faire pour FormData
                                },
                                body: formData // FormData avec _method=PUT
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
                                            const editModal = bootstrap.Modal.getInstance(document
                                                .getElementById('edit_formation'));
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
                                    <p>probleme_de_connexion_ou_de_format_de_reponse</p>
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
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content'),
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
                                    const deleteModal = bootstrap.Modal.getInstance(document.getElementById(
                                        'delete_confirmation'));
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
                alertDiv.className =
                    `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed custom-alert`;
                alertDiv.style.cssText =
                    'top: 20px; right: 20px; z-index: 9999; min-width: 350px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);';

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
                                        <span class="visually-hidden">chargement</span>
                                    </div>
                                    <p class="mb-0">veuillez patienter pendant la creation</p>
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
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content'),
                                    'Accept': 'application/json'
                                },
                                body: formData
                            })
                            .then(response => {
                                console.log('Response status création:', response.status);
                                console.log('Response headers création:', response.headers.get(
                                    'content-type'));

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
                                        title: 'Formation crée !',
                                        text: data.message ||
                                            'La formation a été créée avec succès',
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
                                            errorMessage +=
                                                `• ${fieldName}: ${data.errors[field].join(', ')}\n`;
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
                                    <p>probleme_de_connexion_ou_de_format_de_reponse</p>
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
                                        <span class="visually-hidden">creation</span>
                                    </div>
                                    <p class="mb-0">creation de la nouvelle formation</p>
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
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content'),
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
                                        text: data.message ||
                                            '',
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
                                            errorMessage +=
                                                `• ${fieldName}: ${data.errors[field].join(', ')}\n`;
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
                                    <p>impossible_de_creer_la_formation</p>
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
                ${isConfirm ? `
                                                                                                                                                                                            <p class="text-muted">Le candidat sera notifié de la confirmation.</p>
                                                                                                                                                                                            <p class="text-muted">Cette action peut être annulée plus tard.</p>
                                                                                                                                                                                        ` : ''}
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonColor: isConfirm ? '#28a745' : '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: isConfirm ? '✅ Oui, confirmer' : '❌ Oui, refuser',
                    cancelButtonText: '🔙 Annuler',
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
                        // Affiche une modale de chargement
                        Swal.fire({
                            title: 'Mise à jour en cours...',
                            html: `
                                <div class="d-flex flex-column align-items-center">
                                    <div class="spinner-border ${isConfirm ? 'text-success' : 'text-danger'} mb-3" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                        <p class="mb-0">Mise à jour du statut</p>
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
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                        'content'),
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({
                                    statut: nouveauStatut
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    const formationId = data.formation_id;
                                    voirDetailsFormation(formationId);

                                    Swal.fire({
                                        icon: 'success',
                                        title: isConfirm ? '🎉 Inscription confirmée !' :
                                            '✅ Inscription refusée',
                                        html: `
                                        <div class="text-center">
                                            <p>Le statut a été mis à jour avec succès.</p>
                                ${isConfirm ? `
                                                                                                                                                                                                            <p class="text-muted">Le candidat peut maintenant être contacté.</p>
                                                                                                                                                                                                            <p class="text-muted">Vous pouvez changer d'avis à tout moment.</p>
                                                                                                                                                                                                        ` : ''}
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
                        console.log('Envoi requête POST avec _method=PUT vers:',
                            `/admin/formations/${formationId}`);

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
                                        <span class="visually-hidden">chargement</span>
                                    </div>
                                    <p class="mb-0">veuillez_patienter_pendant_la_modification</p>
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
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content'),
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
                                            const editModal = bootstrap.Modal.getInstance(document
                                                .getElementById('edit_formation'));
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
                                    <p>probleme_de_connexion_ou_de_format_de_reponse</p>
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
            function voirDetailsFormation(formationId) {
                console.log('📋 Ouverture détails formation ID:', formationId);

                const modal = new bootstrap.Modal(document.getElementById('detailsFormationModal'));
                modal.show();

                const contentDiv = document.getElementById('detailsFormationContent');
                contentDiv.innerHTML = `
                    <div class="text-center p-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Chargement...</span>
                        </div>
                        <p class="mt-3">Chargement des détails en cours...</p>
                    </div>
                `;

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
                    Erreur lors du chargement des détails : ${error.message}
                        </div>
                    `;
                    });
            }

            function afficherDetailsFormation(data) {
                const formation = data.formation;
                const inscriptions = data.inscriptions;

                document.getElementById('detailsFormationModalLabel').innerHTML = `
                    <i class="fas fa-graduation-cap me-2"></i>${formation.titre}
                `;

                const contentDiv = document.getElementById('detailsFormationContent');
                contentDiv.innerHTML = `
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informations générales</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                        <strong>Description</strong>
                                            <p class="mt-1 text-muted">${formation.programme || 'Aucune description'}</p>
                                        </div>
                                        <div class="col-6 mb-2">
                                        <strong>Catégorie</strong><br>
                                            <span class="badge bg-success">${formation.categorie?.nom || 'Non définie'}</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                        <strong>Coût</strong><br>
                                            <span class="text-primary fw-bold">${formation.cout ? new Intl.NumberFormat('fr-FR').format(formation.cout) + ' FCFA' : 'Gratuit'}</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                        <strong>Date de début</strong><br>
                                            <span class="text-info">${formation.date_debut ? new Date(formation.date_debut).toLocaleDateString('fr-FR') : 'À définir'}</span>
                                        </div>
                                        <div class="col-6 mb-2">
                                        <strong>Date de fin</strong><br>
                                            <span class="text-info">${formation.date_fin ? new Date(formation.date_fin).toLocaleDateString('fr-FR') : 'À définir'}</span>
                                        </div>
                                        <div class="col-12 mb-2">
                                        <strong>Lieu</strong><br>
                                            <span class="text-secondary">${formation.lieu || 'À définir'}</span>
                                        </div>
                                        <div class="col-12">
                                        <strong>Prérequis</strong><br>
                                            <span class="text-muted">${formation.prerequis || 'Aucun prérequis'}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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
                                                <small>Total des inscriptions</small>
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
                                                <small>Confirmées</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    ${formation.file_path ? `
                                                                                                                                                                                                                            <div class="text-center mt-3">
                                                                                                                                                                                                                <strong>Média de présentation</strong><br>
                                                                                                                                                                                                                                ${formation.file_type === 'image' ? 
                                                                                                                                                                                                                                    `<img src="/storage/${formation.file_path}" alt="Formation" class="img-thumbnail mt-2" style="max-height: 150px;">` :
                                                                                                                                                                                                                                    `<video controls class="mt-2" style="max-height: 150px; max-width: 100%;">
                                                <source src="/storage/${formation.file_path}" type="video/mp4">
                                            </video>`}
                                                                                                                                                                                                                            </div>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
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
                                                                                                    <th><i class="fas fa-clock me-1"></i>Date d'inscription</th>
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
                            <td><a href="mailto:${inscription.email}">${inscription.email}</a></td>
                            <td>${inscription.telephone ? `<a href="tel:${inscription.telephone}">${inscription.telephone}</a>` : '<span class="text-muted">Non renseigné</span>'}</td>
                            <td>${inscription.message ? `<span title="${inscription.message}">${inscription.message}</span>` : '<span class="text-muted">Aucun message</span>'}</td>
                            <td>
                            <small class="text-muted">
                            ${new Date(inscription.created_at).toLocaleDateString('fr-FR')} à 
                            ${new Date(inscription.created_at).toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' })}
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
                                                                                             <button class="btn btn-success" onclick="changerStatutInscription(${inscription.id}, 'confirme')" title="Confirmer">
                                                                                            <i class="fas fa-check"></i>
                                                                                            </button>
                                                                                            <button class="btn btn-danger" onclick="changerStatutInscription(${inscription.id}, 'refuse')" title="Refuser">
                                                                                            <i class="fas fa-times"></i>
                                                                                            </button>` : ''}
                            <button class="btn btn-outline-primary" onclick="contacterCandidat('${inscription.email}', '${inscription.nom}')" title="Contacter">
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
                                                                                        <p class="text-muted">Les candidatures apparaîtront ici dès qu’il y en aura</p>
                                                                                            </div>`}
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>

                            </div>    
                            `;
            }
        </script>

        <!-- Script pour la création de nouvelles opportunités -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('createEmploiForm');
                const modal = document.getElementById('create_emplois');

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
                                    <p>veuillez_remplir_tous_les_champs_obligatoires_marques_dun_asterisque</p>
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
                            if (titre.includes('développeur') || titre.includes('web') || titre.includes(
                                    'consultant')) {
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

                    // Scripts pour la gestion des opportunités

                    // Fonctions pour gérer les critères
                    window.addCritere = function() {
                        const container = document.getElementById('criteres-container');
                        const newCritere = document.createElement('div');
                        newCritere.className = 'critere-item mb-2';
                        newCritere.innerHTML = `
                            <div class="input-group">
                                <input type="text" name="criteres[]" class="form-control" placeholder="Ex: Expérience minimum 3 ans">
                                <button type="button" class="btn btn-outline-danger remove-critere" onclick="removeCritere(this)">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        `;
                        container.appendChild(newCritere);
                    };

                    window.removeCritere = function(button) {
                        const container = document.getElementById('criteres-container');
                        if (container.children.length > 1) {
                            button.closest('.critere-item').remove();
                        } else {
                            Swal.fire('Attention', 'Au moins un critère est requis', 'warning');
                        }
                    };

                    // Fonctions pour gérer les informations
                    window.addInformation = function() {
                        const container = document.getElementById('informations-container');
                        const newInfo = document.createElement('div');
                        newInfo.className = 'information-item mb-2';
                        newInfo.innerHTML = `
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="info_keys[]" class="form-control" placeholder="Clé (ex: Budget, Durée)">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="info_values[]" class="form-control" placeholder="Valeur (ex: 50000€, 6 mois)">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-outline-danger w-100" onclick="removeInformation(this)">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </div>
                            </div>
                        `;
                        container.appendChild(newInfo);
                    };

                    window.removeInformation = function(button) {
                        const container = document.getElementById('informations-container');
                        if (container.children.length > 1) {
                            button.closest('.information-item').remove();
                        } else {
                            Swal.fire('Attention', 'Au moins une information est requise', 'warning');
                        }
                    };
                    document.addEventListener('DOMContentLoaded', function() {

                        // Gestion du formulaire de création d'opportunité
                        const createOpportuniteForm = document.getElementById('createOpportuniteForm');
                        if (createOpportuniteForm) {
                            createOpportuniteForm.addEventListener('submit', function(e) {
                                e.preventDefault();

                                const formData = new FormData(this);

                                // S'assurer que le token CSRF est inclus dans FormData
                                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content');
                                formData.append('_token', csrfToken);

                                // Afficher une animation de chargement
                                const loading = Swal.fire({
                                    title: 'Création en cours...',
                                    html: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Création...</span></div>',
                                    allowOutsideClick: false,
                                    showConfirmButton: false
                                });

                                fetch('/admin/opportunites', {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-Requested-With': 'XMLHttpRequest'
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        Swal.close();
                                        if (data.success) {
                                            Swal.fire('Succès', data.message, 'success');
                                            createOpportuniteForm.reset();
                                            $('#create_opportunite').modal('hide');
                                            // Recharger la page ou mettre à jour la liste
                                            location.reload();
                                        } else {
                                            let errorMessage = data.message || 'Erreur lors de la création';
                                            if (data.errors) {
                                                errorMessage += '\n\nErreurs :\n';
                                                Object.values(data.errors).forEach(error => {
                                                    errorMessage += '- ' + error[0] + '\n';
                                                });
                                            }
                                            Swal.fire('Erreur', errorMessage, 'error');
                                        }
                                    })
                                    .catch(error => {
                                        Swal.close();
                                        console.error('Erreur:', error);
                                        Swal.fire('Erreur', 'Une erreur inattendue est survenue', 'error');
                                    });
                            });
                        }
                    });

                    // Fonction pour voir les détails d'une opportunité
                    function voirDetailsOpportunite(id) {
                        fetch(`/admin/opportunites/${id}`, {
                                method: 'GET',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    const opp = data.opportunite;
                                    Swal.fire({
                                        title: opp.titre,
                                        html: `
                                        <form id="showOpportuniteForm">

                                            <!-- Description -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Description</label>
                                                <textarea id="show_description" class="form-control" rows="3" readonly>${opp.description || ''}</textarea>
                                            </div>

                                            <!-- Catégorie -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Catégorie</label>
                                                <input type="text" class="form-control" value="${opp.categorie ? opp.categorie.nom : 'N/A'}" readonly>
                                            </div>

                                            <!-- Statut -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Statut</label>
                                                <input type="text" class="form-control" value="${opp.statut}" readonly>
                                            </div>

                                            <!-- Dates -->
                                            <div class="row g-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Date de début</label>
                                                    <input type="text" class="form-control" value="${opp.date_debut ? new Date(opp.date_debut).toLocaleDateString('fr-FR') : 'N/A'}" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Date de fin</label>
                                                    <input type="text" class="form-control" value="${opp.date_fin ? new Date(opp.date_fin).toLocaleDateString('fr-FR') : 'N/A'}" readonly>
                                                </div>
                                            </div>

                                            <!-- Lieu et Email -->
                                            <div class="row g-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Lieu</label>
                                                    <input type="text" class="form-control" value="${opp.lieu || 'N/A'}" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Email de contact</label>
                                                    <input type="email" class="form-control" value="${opp.contact_email || 'N/A'}" readonly>
                                                </div>
                                            </div>

                                        <div class="row g-3 mb-3">
                                            <!-- Critères -->
                                            <div class="col-md-6 9mb-3">
                                                <label class="form-label fw-bold">Critères</label>
                                                <ul class="list-group">
                                                    ${(opp.criteres || []).map(c => `<li class="list-group-item">${c}</li>`).join('') || '<li class="list-group-item">Aucun critère</li>'}
                                                </ul>
                                            </div>

                                            <!-- Informations complémentaires -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Informations complémentaires</label>
                                                <ul class="list-group">
                                                    ${opp.informations ? Object.entries(opp.informations).map(([k,v]) => `
                                                                                                                        <li class="list-group-item"><strong>${k} :</strong> ${v}</li>
                                                                                                                    `).join('') : '<li class="list-group-item">Aucune information</li>'}
                                                </ul>
                                            </div>
                                        </div>
                                            <div class="row g-3 mb-3">

                                                <!-- Fichier joint -->
                                            
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Fichier joint</label>
                                                    ${opp.fichier_joint ? `
                                                                                                                        <p><a href="/${opp.fichier_joint}" target="_blank" class="text-primary">
                                                                                                                        <i class="ri ri-file-line"></i> Voir le fichier</a></p>
                                                                                                                    ` : '<p>Aucun fichier joint</p>'}
                                                </div>

                                                <!-- Nombre de candidats -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Nombre de candidats</label>
                                                    <input type="text" class="form-control" value="${opp.postulations ? opp.postulations.length : 0}" readonly>
                                                </div>
                                            </div>

                                        </form>`,
                                        width: '80%',
                                        confirmButtonText: 'Fermer'
                                    });
                                } else {
                                    Swal.fire('Erreur', 'Impossible de charger les détails', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Erreur:', error);
                                Swal.fire('Erreur', 'Une erreur est survenue', 'error');
                            });
                    }

                    // Fonction pour modifier une opportunité
                    function modifierOpportunite(id) {
                        fetch(`/admin/opportunites/${id}/edit`, {
                                method: 'GET',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                $('#liste_opportunites').modal('hide'); // ferme la modal liste
                                if (data.success) {
                                    const opp = data.opportunite;
                                    Swal.fire({
                                            title: '<h4 class="fw-bold">Modifier l\'opportunité</h4>',
                                            html: `

                                            <form id="editOpportuniteForm" enctype="multipart/form-data">

                                            <!-- Section Titre et Description -->
                                            <div class="mb-4">
                                                <label class="form-label fw-bold">Titre</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i class="ri ri-edit-box-line"></i></span>
                                                    <input type="text" id="edit_titre" name="titre" class="form-control" 
                                                        value="${opp.titre}" required placeholder="Titre de l'opportunité">
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label fw-bold">Description</label>
                                                <textarea id="edit_description" name="description" class="form-control" rows="4" required 
                                                placeholder="Description détaillée de l'opportunité">${opp.description}</textarea>
                                            </div>

                                            <!-- Catégorie et Statut -->
                                            <div class="row g-3 mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Catégorie</label>
                                                    <select id="edit_categorie_id" name="categorie_id" class="form-select">
                                                        <option value="">Sélectionner une catégorie</option>
                                                        ${data.categories.map(cat =>
                                                            `<option value="${cat.id}" ${cat.id == opp.categorie_id ? 'selected' : ''}>${cat.nom}</option>`
                                                        ).join('')}
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Statut</label>
                                                    <select id="edit_statut" name="statut" class="form-select" required>
                                                        <option value="brouillon" ${opp.statut === 'brouillon' ? 'selected' : ''}>Brouillon</option>
                                                        <option value="en_ligne" ${opp.statut === 'en_ligne' ? 'selected' : ''}>En ligne</option>
                                                        <option value="ferme" ${opp.statut === 'ferme' ? 'selected' : ''}>Fermé</option>
                                                        <option value="archive" ${opp.statut === 'archive' ? 'selected' : ''}>Archivé</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Dates -->
                                            <div class="row g-3 mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Date de début</label>
                                                    <input type="datetime-local" id="edit_date_debut" name="date_debut" class="form-control"
                                                        value="${opp.date_debut ? new Date(opp.date_debut).toISOString().slice(0, 16) : ''}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Date de fin</label>
                                                    <input type="datetime-local" id="edit_date_fin" name="date_fin" class="form-control"
                                                        value="${opp.date_fin ? new Date(opp.date_fin).toISOString().slice(0, 16) : ''}">
                                                </div>
                                            </div>

                                            <!-- Lieu et Email de contact -->
                                            <div class="row g-3 mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Lieu</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light"><i class="ri ri-map-pin-line"></i></span>
                                                        <input type="text" id="edit_lieu" name="lieu" class="form-control" 
                                                            value="${opp.lieu || ''}" placeholder="Ville, pays">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Email de contact</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light"><i class="ri ri-mail-line"></i></span>
                                                        <input type="email" id="edit_contact_email" name="contact_email" class="form-control" 
                                                            value="${opp.contact_email || ''}" placeholder="email@exemple.com">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Critères dynamiques -->
                                            <div class="mb-4">
                                                <label class="form-label fw-bold">Critères</label>
                                                <div id="criteres-container">
                                                    ${(opp.criteres || []).map((critere, index) => `
                                                                                            <div class="input-group mb-2">
                                                                                                <input type="text" name="criteres[]" class="form-control" value="${critere}" placeholder="Ajouter un critère">
                                                                                                <button type="button" class="btn btn-outline-danger remove-critere"><i class="ri ri-delete-bin-2-line"></i></button>
                                                                                            </div>
                                                                                        `).join('')}
                                                </div>
                                                <button type="button" class="btn btn-outline-primary btn-sm" id="add-critere">
                                                    <i class="ri ri-add-line"></i> Ajouter un critère
                                                </button>
                                            </div>

                                            <!-- Informations complémentaires dynamiques -->
                                            <div class="mb-4">
                                                <label class="form-label fw-bold">Informations complémentaires</label>
                                                <div id="infos-container">
                                                    ${opp.informations ? Object.entries(opp.informations).map(([key, value]) => `
                                                                                            <div class="row g-2 mb-2">
                                                                                                <div class="col-md-5">
                                                                                                    <input type="text" name="info_keys[]" class="form-control" value="${key}" placeholder="Clé">
                                                                                                </div>
                                                                                                <div class="col-md-5">
                                                                                                    <input type="text" name="info_values[]" class="form-control" value="${value}" placeholder="Valeur">
                                                                                                </div>
                                                                                                <div class="col-md-2">
                                                                                                    <button type="button" class="btn btn-outline-danger remove-info w-100"><i class="ri ri-delete-bin-2-line"></i></button>
                                                                                                </div>
                                                                                            </div>
                                                                                        `).join('') : ''}
                                                </div>
                                                <button type="button" class="btn btn-outline-primary btn-sm" id="add-info">
                                                    <i class="ri ri-add-line"></i> Ajouter une information
                                                </button>
                                            </div>

                                            <!-- Fichier joint -->
                                            <div class="mb-4">
                                                <label class="form-label fw-bold">Fichier joint</label>
                                                <input type="file" name="fichier_joint" id="edit_fichier_joint" class="form-control">
                                                ${opp.fichier_joint ? `
                                                                                                                    <p class="mt-2">
                                                                                                                        <a href="/${opp.fichier_joint}" target="_blank" class="text-primary">
                                                                                                                            <i class="ri ri-file-line"></i> Voir le fichier actuel
                                                                                                                        </a>
                                                                                                                    </p>
                                                                                                                ` : ''}
                                            </div>

                                        </form>


                                        `,
                                            width: '80%',
                                            showCancelButton: true,
                                            confirmButtonText: 'Modifier',
                                            cancelButtonText: 'Annuler',
                                            preConfirm: () => {
                                                const form = document.getElementById('editOpportuniteForm');
                                                const formData = new FormData(form);

                                                // Laravel ne reconnaît pas PUT via fetch directement, donc on ajoute :
                                                formData.append('_method', 'PUT');

                                                return fetch(`/admin/opportunites/${id}`, {
                                                        method: 'POST', // ⚠️ POST mais avec _method=PUT
                                                        headers: {
                                                            'X-CSRF-TOKEN': document.querySelector(
                                                                'meta[name="csrf-token"]').getAttribute('content'),
                                                            'X-Requested-With': 'XMLHttpRequest'
                                                        },
                                                        body: formData
                                                    })
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        if (!data.success) {
                                                            throw new Error(data.message ||
                                                                'Erreur lors de la modification');
                                                        }
                                                        return data;
                                                    });
                                            }
                                        })
                                        .then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire('Succès', 'Opportunité modifiée avec succès', 'success');
                                                location.reload();
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Erreur:', error);
                                            Swal.fire('Erreur', error.message, 'error');
                                        });
                                } else {
                                    Swal.fire('Erreur', 'Impossible de charger les données', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Erreur:', error);
                                Swal.fire('Erreur', 'Une erreur est survenue', 'error');
                            });
                    }

                    // Fonction pour supprimer une opportunité
                    function supprimerOpportunite(id) {
                        Swal.fire({
                            title: 'Supprimer cette opportunité ?',
                            text: 'Cette action est irréversible !',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Oui, supprimer',
                            cancelButtonText: 'Annuler',
                            confirmButtonColor: '#dc3545'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const loading = Swal.fire({
                                    title: 'Suppression en cours...',
                                    html: '<div class="spinner-border text-danger" role="status"><span class="visually-hidden">Suppression...</span></div>',
                                    allowOutsideClick: false,
                                    showConfirmButton: false
                                });

                                fetch(`/admin/opportunites/${id}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                'content'),
                                            'X-Requested-With': 'XMLHttpRequest'
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        Swal.close();
                                        if (data.success) {
                                            Swal.fire('Succès', data.message, 'success');
                                            location.reload();
                                        } else {
                                            Swal.fire('Erreur', data.message || 'Erreur lors de la suppression', 'error');
                                        }
                                    })
                                    .catch(error => {
                                        Swal.close();
                                        console.error('Erreur:', error);
                                        Swal.fire('Erreur', 'Une erreur inattendue est survenue', 'error');
                                    });
                            }
                        });
                    }

                    // Fonction pour charger les candidats d'une opportunité
                    function chargerCandidatsOpportunite(opportuniteId) {
                        if (!opportuniteId) {
                            document.getElementById('tbodyCandidatsOpportunites').innerHTML =
                                '<tr><td colspan="6" class="text-center text-muted">Sélectionnez une opportunité pour voir les candidats</td></tr>';
                            return;
                        }

                        // Afficher un indicateur de chargement
                        document.getElementById('tbodyCandidatsOpportunites').innerHTML =
                            '<tr><td colspan="6" class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Chargement...</span></div></td></tr>';

                        fetch(`/admin/opportunites/${opportuniteId}/candidats`, {
                                method: 'GET',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    const tbody = document.getElementById('tbodyCandidatsOpportunites');

                                    if (data.candidats.length === 0) {
                                        tbody.innerHTML =
                                            '<tr><td colspan="6" class="text-center text-muted">Aucun candidat pour cette opportunité</td></tr>';
                                        return;
                                    }

                                    tbody.innerHTML = data.candidats.map(candidat => `
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        <span class="avatar-initial rounded bg-primary">
                                            ${candidat.prenom.charAt(0)}${candidat.nom.charAt(0)}
                                        </span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">${candidat.prenom} ${candidat.nom}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>${candidat.email}</td>
                            <td>${candidat.telephone || 'N/A'}</td>
                            <td>${candidat.date_postulation}</td>
                            <td>
                                <span class="badge ${getBadgeClassForStatut(candidat.statut)}">${getStatutLabel(candidat.statut)}</span>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="changerStatutPostulation(${candidat.id}, 'accepte')">
                                            <i class="ri-check-line me-1 text-success"></i> Accepter
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);" onclick="changerStatutPostulation(${candidat.id}, 'refuse')">
                                            <i class="ri-close-line me-1 text-danger"></i> Refuser
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `).join('');
                                } else {
                                    document.getElementById('tbodyCandidatsOpportunites').innerHTML =
                                        '<tr><td colspan="6" class="text-center text-danger">Erreur lors du chargement des candidats</td></tr>';
                                }
                            })
                            .catch(error => {
                                console.error('Erreur:', error);
                                document.getElementById('tbodyCandidatsOpportunites').innerHTML =
                                    '<tr><td colspan="6" class="text-center text-danger">Erreur lors du chargement</td></tr>';
                            });
                    }

                    // Fonction pour changer le statut d'une postulation
                    function changerStatutPostulation(postulationId, nouveauStatut) {
                        const statutLabel = getStatutLabel(nouveauStatut);

                        Swal.fire({
                            title: `Changer le statut à "${statutLabel}" ?`,
                            text: 'Cette action modifiera le statut de la postulation',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Confirmer',
                            cancelButtonText: 'Annuler'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch(`/admin/postulations/${postulationId}/statut`, {
                                        method: 'PATCH',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                'content'),
                                            'X-Requested-With': 'XMLHttpRequest'
                                        },
                                        body: JSON.stringify({
                                            statut: nouveauStatut
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            Swal.fire('Succès', data.message, 'success');
                                            // Recharger les candidats
                                            const selectElement = document.getElementById('selectOpportuniteCandidats');
                                            if (selectElement.value) {
                                                chargerCandidatsOpportunite(selectElement.value);
                                            }
                                        } else {
                                            Swal.fire('Erreur', data.message || 'Erreur lors du changement de statut',
                                                'error');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Erreur:', error);
                                        Swal.fire('Erreur', 'Une erreur est survenue', 'error');
                                    });
                            }
                        });
                    }

                    // Fonctions utilitaires
                    function getBadgeClassForStatut(statut) {
                        switch (statut) {
                            case 'accepte':
                                return 'bg-label-success';
                            case 'refuse':
                                return 'bg-label-danger';
                            case 'en_attente':
                                return 'bg-label-warning';
                            default:
                                return 'bg-label-info';
                        }
                    }

                    function getStatutLabel(statut) {
                        switch (statut) {
                            case 'accepte':
                                return 'Accepté';
                            case 'refuse':
                                return 'Refusé';
                            case 'en_attente':
                                return 'En attente';
                            default:
                                return 'Inconnu';
                        }
                    }
                </script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.getElementById('createCategorieForm');
                        if (form) {
                            form.addEventListener('submit', function(e) {
                                e.preventDefault();

                                // Animation de chargement
                                Swal.fire({
                                    title: 'Création en cours...',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    },
                                    preConfirm: () => {
                                        const nom = Swal.getInputValue('nom');
                                        if (!nom) {
                                            Swal.showValidationMessage('Le nom est requis');
                                        }
                                        return nom;
                                    },
                                    didOpen: () => {
                                        setTimeout(() => {
                                            const input = Swal.getInput();
                                            if (input) input.focus();
                                        }, 100);
                                    }
                                });

                                const formData = new FormData(form);

                                fetch(form.action, {
                                        method: 'POST',
                                        headers: {
                                            'X-Requested-With': 'XMLHttpRequest',
                                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                        },
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        Swal.close();
                                        if (data.success) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Succès',
                                                text: data.message,
                                                confirmButtonText: 'OK'
                                            }).then(() => {
                                                // Optionnel : reset le formulaire ou rafraîchir la liste
                                                form.reset();
                                                // Tu peux aussi recharger dynamiquement la liste ici si besoin
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Erreur',
                                                text: data.message || 'Une erreur est survenue.'
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        Swal.close();
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erreur',
                                            text: 'Une erreur inattendue est survenue.'
                                        });
                                    });
                            });
                        }
                    });
                </script>

                <!-- Scripts pour la gestion des catégories -->
                <script>
                    function fetchCategories() {
                        fetch('/admin/categories/list')
                            .then(res => res.json())
                            .then(categories => {
                                const tbody = document.getElementById('categoriesTableBody');
                                tbody.innerHTML = '';
                                categories.forEach(cat => {
                                    tbody.innerHTML += `
                            <tr>
                            <td>${cat.id}</td>
                            <td>${cat.nom}</td>
                            <td>
                            <button class="btn btn-sm btn-primary" onclick="showEditModal(${cat.id}, '${cat.nom.replace(/'/g, "\\'")}')"><i class="ri ri-edit-line"></i></button>
                            <button class="btn btn-sm btn-danger" onclick="deleteCategorie(${cat.id})"><i class="ri ri-delete-bin-line"></i></button>
                            </td>
                            </tr>
                            `;
                                });
                            });
                    }

                    // Afficher la modale d'édition
                    function showEditModal(id, nom) {
                        // Fermer la modale Bootstrap si elle est ouverte
                        const modal = bootstrap.Modal.getInstance(document.getElementById('liste_categories'));
                        if (modal) modal.hide();

                        // Puis ouvrir SweetAlert2
                        Swal.fire({
                            title: 'Modifier la catégorie',
                            input: 'text',
                            inputValue: nom,
                            showCancelButton: true,
                            confirmButtonText: 'Enregistrer',
                            cancelButtonText: 'Annuler',
                            preConfirm: (newNom) => {
                                if (!newNom) {
                                    Swal.showValidationMessage('Le nom est requis');
                                }
                                return newNom;
                            },
                            didOpen: () => {
                                setTimeout(() => {
                                    const input = Swal.getInput();
                                    if (input) input.focus();
                                }, 100);
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                updateCategorie(id, result.value);
                            }
                        });
                    }

                    // Modifier une catégorie
                    function updateCategorie(id, nom) {
                        Swal.fire({
                            title: 'Mise à jour...',
                            allowOutsideClick: false,
                            didOpen: () => Swal.showLoading()
                        });
                        fetch(`/admin/categories/${id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'X-Requested-With': 'XMLHttpRequest'
                                },
                                body: JSON.stringify({
                                    nom
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                Swal.close();
                                if (data.success) {
                                    Swal.fire('Succès', data.message, 'success');
                                    fetchCategories();
                                } else {
                                    Swal.fire('Erreur', data.message || 'Erreur lors de la modification', 'error');
                                }
                            });
                    }

                    // Supprimer une catégorie
                    function deleteCategorie(id) {
                        Swal.fire({
                            title: 'Supprimer cette catégorie ?',
                            text: 'Cette action est irréversible !',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Oui, supprimer',
                            cancelButtonText: 'Annuler'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Suppression...',
                                    allowOutsideClick: false,
                                    didOpen: () => Swal.showLoading()
                                });
                                fetch(`/admin/categories/${id}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                            'X-Requested-With': 'XMLHttpRequest'
                                        }
                                    })
                                    .then(res => res.json())
                                    .then(data => {
                                        Swal.close();
                                        if (data.success) {
                                            Swal.fire('Succès', data.message, 'success');
                                            fetchCategories();
                                        } else {
                                            Swal.fire('Erreur', data.message || 'Erreur lors de la suppression', 'error');
                                        }
                                    });
                            }
                        });
                    }

                    // Rafraîchir la liste à l'ouverture de la modale
                    document.addEventListener('DOMContentLoaded', function() {
                        // Si tu ouvres la modale dynamiquement, appelle fetchCategories() à ce moment-là aussi
                        fetchCategories();
                    });
                </script>
                <!-- ///////////////////////////////////// -->



                <!-- Scripts pour la gestion des produits -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const createProduitForm = document.getElementById('createProduitForm');
                        if (!createProduitForm) return;

                        createProduitForm.addEventListener('submit', function(e) {
                            e.preventDefault();

                            // Afficher le chargement
                            Swal.fire({
                                title: 'Création en cours...',
                                html: ``,
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            const formData = new FormData(createProduitForm);

                            fetch(createProduitForm.action, {
                                    method: 'POST',
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                    },
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.close();

                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Succès',
                                            html: `
                                                <div class="text-center">
                                                    <p class="mb-0">${data.message}</p>
                                                </div>
                                            `,
                                            confirmButtonText: 'OK',
                                            customClass: {
                                                confirmButton: 'btn btn-success'
                                            }
                                        }).then(() => {
                                            createProduitForm.reset();
                                            if (typeof fetchProduits === 'function') {
                                                fetchProduits();
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erreur',
                                            html: ``,
                                            confirmButtonText: 'OK',
                                            customClass: {
                                                confirmButton: 'btn btn-danger'
                                            }
                                        });
                                    }
                                })
                                .catch(err => {
                                    Swal.close();
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erreur inattendue',
                                        html: ` `,
                                        confirmButtonText: 'OK',
                                        customClass: {
                                            confirmButton: 'btn btn-danger'
                                        }
                                    });
                                    console.error('Erreur lors de la requête:', err);
                                });
                        });
                    });
                </script>


        <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    const table = $('#tableProduits').DataTable({
                    ajax: '/admin/produits/list',
                    columns: [
                        { data: 'nom', title: 'Nom' },
                        { data: 'categorie', title: 'Catégorie' },
                        {
                            data: 'statut_label',
                            title: 'Statut',
                            render: function(data, type, row) {
                                const couleur = row.statut_color === 'success' ? 'green' : 'red';
                                return `<span style="color:${couleur}; font-weight:bold;">${data}</span>`;
                            }
                        },
                        { data: 'actions', title: 'Actions', orderable: false, searchable: false }
                    ]
                });

                // 🟢 Gestion des clics dans le tableau
                document.querySelector('#tableProduits').addEventListener('click', function(e) {
                    const editBtn = e.target.closest('.btn-edit-produit');
                    const deleteBtn = e.target.closest('.btn-delete-produit');

                    if (editBtn) {
                        e.preventDefault();
                        openEditProduitModal(editBtn.dataset.id);
                    }

                    if (deleteBtn) {
                        e.preventDefault();
                        const id = deleteBtn.dataset.id;

                        Swal.fire({
                            title: 'Supprimer ce produit ?',
                            text: 'Cette action est irréversible !',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Oui, supprimer',
                            cancelButtonText: 'Annuler'
                        }).then(result => {
                            if (result.isConfirmed) {
                                fetch(`/admin/produits/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                    }
                                })
                                .then(res => res.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire('Supprimé !', data.message, 'success');
                                        table.ajax.reload();
                                    } else {
                                        Swal.fire('Erreur', data.message || 'Erreur lors de la suppression', 'error');
                                    }
                                })
                                .catch(() => Swal.fire('Erreur', 'Erreur réseau', 'error'));
                            }
                        });
                    }
                });

                
            // 🟡 Ouvrir la modale d'édition (fermeture propre avant Swal)
                window.openEditProduitModal = function(id) {
                    console.log("🟡 Chargement du produit ID :", id);
                    

                        fetch(`/admin/produits/${id}`)
                            .then(res => res.json())
                            .then(produit => {
                                const modal = bootstrap.Modal.getInstance(document.getElementById('liste_produits'));
                        if (modal) modal.hide();    
                                // 🟢 Ouvrir ensuite le SweetAlert d’éition
                                showEditProduitSwal(produit, id);
                            })
                            .catch(err => {
                                console.error("❌ Erreur fetch :", err);
                                Swal.fire('Erreur', 'Impossible de charger les données du produit.', 'error');
                            });
                    };
                // 🔹 SweetAlert2 d'édition
                function showEditProduitSwal(produit, id) {
                    // Fermer la modale de liste_produits
                    Swal.fire({
                        title: `<i class="bi bi-pencil-square"></i> Modifier le produit`,
                        html: `
                            <form id="swal-edit-form" class="text-start">
                                <div class="mb-3">
                                    <label for="swal-nom" class="form-label fw-semibold">
                                        <i class="bi bi-cube"></i> Nom du produit <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="swal-nom" class="form-control" 
                                        value="${escapeHtml(produit.nom)}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="swal-slug" class="form-label fw-semibold">
                                        <i class="bi bi-link"></i> Slug <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="swal-slug" class="form-control" 
                                        value="${escapeHtml(produit.slug)}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="swal-categorie" class="form-label fw-semibold">
                                        <i class="bi bi-collection"></i> Catégorie <span class="text-danger">*</span>
                                    </label>
                                    <select id="swal-categorie" class="form-select" required>
                                        <option value="">Chargement...</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="swal-statut" class="form-label fw-semibold">
                                        <i class="bi bi-toggle2-on"></i> Statut
                                    </label>
                                    <select id="swal-statut" class="form-select w-50">
                                        <option value="actif" ${produit.statut === 'actif' ? 'selected' : ''}>Actif</option>
                                        <option value="inactif" ${produit.statut === 'inactif' ? 'selected' : ''}>Inactif</option>
                                    </select>
                                </div>
                                <div class="mt-2 text-muted small">
                                    <span class="text-danger">*</span> Champs obligatoires
                                </div>
                            </form>
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Enregistrer',
                        width: '600px',
                        didOpen: () => {
                            // Charger les catégories
                            fetch('/admin/categories/list')
                                .then(res => res.json())
                                .then(categories => {
                                    const select = document.getElementById('swal-categorie');
                                    select.innerHTML = `<option value="">-- Sélectionner --</option>`;
                                    categories.forEach(cat => {
                                        const option = document.createElement('option');
                                        option.value = cat.id;
                                        option.textContent = cat.nom;
                                        if (cat.id === produit.categorie_id) option.selected = true;
                                        select.appendChild(option);
                                    });
                                })
                                .catch(() => {
                                    document.getElementById('swal-categorie').innerHTML =
                                        '<option value="">Erreur de chargement</option>';
                                });
                        },
                        preConfirm: () => ({
                            nom: document.getElementById('swal-nom').value.trim(),
                            slug: document.getElementById('swal-slug').value.trim(),
                            categorie_id: document.getElementById('swal-categorie').value,
                            statut: document.getElementById('swal-statut').value
                        })
                    }).then(result => {
                        if (result.isConfirmed) {
                            fetch(`/admin/produits/${id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify(result.value)
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire('Succès', data.message, 'success');
                                    $('#tableProduits').DataTable().ajax.reload();
                                } else {
                                    Swal.fire('Erreur', data.message || 'Erreur lors de la mise à jour', 'error');
                                }
                            })
                            .catch(() => Swal.fire('Erreur', 'Erreur réseau lors de la mise à jour', 'error'));
                        }
                    });
                }
            });

            // Fonction d’échappement HTML
            function escapeHtml(text) {
                return text
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }
        </script>



        <!-- Scripts pour la gestion des services -->
       <script>
        document.addEventListener('DOMContentLoaded', function() {

        // ==============================
        // INITIALISATION DATATABLE SERVICES
        // ==============================
        var tableServices = $('#tableServices').DataTable({
            ajax: {
                url: '/admin/services/list',
                type: 'GET',
            },
            columns: [
                { data: 'nom', title: 'Nom' },
                { data: 'description', title: 'Description' },
                { data: 'categorie', title: 'Catégorie' },
                { 
                    data: 'actions', 
                    title: 'Actions',
                    orderable: false,
                    searchable: false
                }
            ]
        });


                // ==============================
                // CRÉATION D'UN SERVICE
                // ==============================
                const createServiceForm = document.getElementById('createServiceForm');
                if(createServiceForm) {
                    createServiceForm.addEventListener('submit', function(e){
                        e.preventDefault();

                        Swal.fire({
                            title: 'Création en cours...',
                            html: `<div class="text-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                </div>`,
                            allowOutsideClick: false,
                            didOpen: () => Swal.showLoading()
                        });

                        const formData = new FormData(createServiceForm);

                        fetch(createServiceForm.action, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        })
                        .then(res => res.json())
                        .then(data => {
                            Swal.close();
                            if(data.success){
                                Swal.fire('Succès', data.message, 'success');
                                createServiceForm.reset();
                                tableServices.ajax.reload();
                            } else {
                                Swal.fire('Erreur', data.message || 'Erreur lors de la création', 'error');
                            }
                        })
                        .catch(() => {
                            Swal.close();
                            Swal.fire('Erreur', 'Erreur réseau', 'error');
                        });
                    });
                }

                // ==============================
                // ÉDITION ET SUPPRESSION DES SERVICES
                // ==============================
                document.querySelector('#tableServices').addEventListener('click', function(e){

                    // ---- Modifier ----
                    if(e.target.closest('.btn-edit-service')){
                        e.preventDefault();
                        const id = e.target.closest('.btn-edit-service').dataset.id;
                        openEditServiceModal(id);
                    }

                    // ---- Supprimer ----
                    if(e.target.closest('.btn-delete-service')){
                        e.preventDefault();
                        const id = e.target.closest('.btn-delete-service').dataset.id;

                        Swal.fire({
                            title: 'Supprimer ce service ?',
                            text: 'Cette action est irréversible !',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Oui, supprimer',
                            cancelButtonText: 'Annuler'
                        }).then((result) => {
                            if(result.isConfirmed){
                                fetch(`/admin/services/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    }
                                })
                                .then(res => res.json())
                                .then(data => {
                                    if(data.success){
                                        Swal.fire('Supprimé !', data.message, 'success');
                                        tableServices.ajax.reload();
                                    } else {
                                        Swal.fire('Erreur', data.message || 'Erreur lors de la suppression', 'error');
                                    }
                                })
                                .catch(() => Swal.fire('Erreur', 'Erreur réseau', 'error'));
                            }
                        });
                    }
                });


                // ==============================
                // MODALE ÉDITION SERVICE
                // ==============================
              function openEditServiceModal(id) {

                    // Fermer la modale liste_services si elle est ouverte
                    const listeModalEl = document.getElementById('liste_services');
                    if(listeModalEl){
                        const modalInstance = bootstrap.Modal.getInstance(listeModalEl);
                        if(modalInstance) modalInstance.hide();
                    }

                    // Récupérer le service via AJAX
                    fetch(`/admin/services/${id}`)
                        .then(res => res.json())
                        .then(service => {

                            Swal.fire({
                                title: `<i class="bi bi-pencil-square"></i> Modifier le service`,
                                html: `
                                    <form id="swal-edit-form" class="text-start">
                                        <div class="mb-3">
                                            <label for="swal-nom" class="form-label fw-semibold">Nom <span class="text-danger">*</span></label>
                                            <input id="swal-nom" class="form-control" placeholder="Nom" value="${escapeHtml(service.nom)}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="swal-slug" class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
                                            <input id="swal-slug" class="form-control" placeholder="Slug" value="${escapeHtml(service.slug)}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="swal-description" class="form-label fw-semibold">Description</label>
                                            <textarea id="swal-description" class="form-control" placeholder="Description">${escapeHtml(service.description)}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="swal-categorie" class="form-label fw-semibold">Catégorie <span class="text-danger">*</span></label>
                                            <select id="swal-categorie" class="form-select" required></select>
                                        </div>

                                        <div class="mt-2 text-muted small"><span class="text-danger">*</span> Champs obligatoires</div>
                                    </form>
                                `,
                                showCancelButton: true,
                                confirmButtonText: '<i class="bi bi-check"></i> Enregistrer',
                                cancelButtonText: '<i class="bi bi-x-circle"></i> Annuler',
                                customClass: {
                                    popup: 'swal2-card',
                                    confirmButton: 'btn btn-primary',
                                    cancelButton: 'btn btn-outline-secondary'
                                },
                                focusConfirm: false,
                                didOpen: () => {
                                    // Charger dynamiquement les catégories
                                    fetch('/admin/categories/list')
                                        .then(res => res.json())
                                        .then(categories => {
                                            const select = document.getElementById('swal-categorie');
                                            select.innerHTML = '<option value="">Sélectionnez une catégorie</option>';
                                            categories.forEach(cat => {
                                                const opt = document.createElement('option');
                                                opt.value = cat.id;
                                                opt.textContent = cat.nom;
                                                if(cat.id === service.categorie_id) opt.selected = true;
                                                select.appendChild(opt);
                                            });
                                        });
                                },
                                preConfirm: () => {
                                    const nom = document.getElementById('swal-nom').value.trim();
                                    const slug = document.getElementById('swal-slug').value.trim();
                                    const description = document.getElementById('swal-description').value.trim();
                                    const categorie_id = document.getElementById('swal-categorie').value;

                                    if(!nom || !slug || !categorie_id){
                                        Swal.showValidationMessage('Tous les champs obligatoires doivent être remplis');
                                        return false;
                                    }

                                    return { nom, slug, description, categorie_id };
                                }
                            }).then(result => {
                                if(result.isConfirmed && result.value){
                                    Swal.fire({
                                        title: 'Mise à jour...',
                                        allowOutsideClick: false,
                                        didOpen: () => Swal.showLoading()
                                    });

                                    fetch(`/admin/services/${id}`, {
                                        method: 'PUT',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                        },
                                        body: JSON.stringify(result.value)
                                    })
                                    .then(res => res.json())
                                    .then(data => {
                                        Swal.close();
                                        if(data.success){
                                            Swal.fire('Succès', data.message, 'success');
                                            tableServices.ajax.reload();
                                        } else {
                                            Swal.fire('Erreur', data.message || 'Erreur lors de la modification', 'error');
                                        }
                                    })
                                    .catch(() => Swal.fire('Erreur', 'Erreur réseau', 'error'));
                                }
                            });

                        })
                        .catch(() => Swal.fire('Erreur', 'Impossible de charger le service.', 'error'));
                    }


                // ==============================
                // FONCTION D’ÉCHAPPEMENT HTML
                // ==============================
                function escapeHtml(text){
                    if(!text) return '';
                    return text
                        .replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")
                        .replace(/"/g, "&quot;")
                        .replace(/'/g, "&#039;");
                }

                 });
        </script>








        <script>
            document.addEventListener("DOMContentLoaded", function() {
                if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès',
                        text: "{{ session('success') }}",
                        confirmButtonColor: '#198754',
                        timer: 2500,
                        timerProgressBar: true
                    });
                endif

                if (session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: "{{ session('error') }}",
                        confirmButtonColor: '#dc3545',
                    });
                endif

                if ($errors - > any())
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreurs de validation',
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                        confirmButtonColor: '#dc3545',
                    });
                endif
            });
        </script>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Scripts from child views -->
        @stack('scripts')

</body>

</html>
