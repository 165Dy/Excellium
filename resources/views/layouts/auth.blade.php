<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Excellium | Authentification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary-subtle">
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-0">

                @yield('login')
                @yield('register')

            </div>
        </div>
    </div>

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


    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.js"></script>

</body>

</html>
