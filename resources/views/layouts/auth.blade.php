
<!doctype html>

<html
  lang="en"
  class="layout-wide customizer-hide"
  dir="ltr"
  data-skin="default"
  data-bs-theme="light"
  data-assets-path="{{ asset('assets_2/')}}"
  data-template="horizontal-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Demo: Login Basic - Pages | Materialize - Bootstrap Dashboard PRO</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets_2/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets_2/vendor/fonts/iconify-icons.css')}}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css')}} -->

    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/node-waves/node-waves.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/pickr/pickr-themes.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets_2/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets_2/css/demo.css')}}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- endbuild -->

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/libs/@form-validation/form-validation.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets_2/vendor/css/pages/page-auth.css')}}" />

    <!-- Helpers -->
    {{-- <script src="{{ asset('assets_2/vendor/js/helpers.js')}}"></script> --}}
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js')}} in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js')}}. -->
    <script src="{{ asset('assets_2/vendor/js/template-customizer.js')}}"></script>

    <!--? Config: Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file. -->

    <script src="{{ asset('assets_2/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="position-relative">
      @yield('login')
      @yield('register')
      @yield('forgot-password')
      @yield('reset-password')
      @yield('confirm-password')
    </div>

    <!-- / Content -->

    <!-- Core JS -->

    <!-- build:js assets/vendor/js/theme.js')}}  -->

    <script src="{{ asset('assets_2/vendor/libs/jquery/jquery.js')}}"></script>

    <script src="{{ asset('assets_2/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets_2/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets_2/vendor/libs/node-waves/node-waves.js')}}"></script>

    <script src="{{ asset('assets_2/vendor/libs/@algolia/autocomplete-js.js')}}"></script>

    <script src="{{ asset('assets_2/vendor/libs/pickr/pickr.js')}}"></script>

    <script src="{{ asset('assets_2/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{ asset('assets_2/vendor/libs/hammer/hammer.js')}}"></script>

    <script src="{{ asset('assets_2/vendor/libs/i18n/i18n.js')}}"></script>

    <script src="{{ asset('assets_2/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets_2/vendor/libs/@form-validation/popular.js')}}"></script>
    <script src="{{ asset('assets_2/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
    <script src="{{ asset('assets_2/vendor/libs/@form-validation/auto-focus.js')}}"></script>

    <!-- Main JS -->

    <script src="{{ asset('assets_2/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets_2/js/pages-auth.js')}}"></script>
  </body>
</html>
