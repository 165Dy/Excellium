<!DOCTYPE html>
<html lang="en">

@php
    use App\Helpers\FileHelper; // Importer le FileHelper
@endphp

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->

    <link rel="icon" type="image/png" href="/images/fav.png">
    <title>AESD | Annulaire des Églises et Serviteurs de Dieu </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 20px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .card {
            margin-bottom: 30px;
        }

        .overflow-hidden {
            overflow: hidden !important;
        }

        .p-0 {
            padding: 0 !important;
        }

        .mt-n5 {
            margin-top: -3rem !important;
        }

        .linear-gradient {
            background-image: linear-gradient(#50b2fc, #f44c66);
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .align-items-center {
            align-items: center !important;
        }

        .justify-content-center {
            justify-content: center !important;
        }

        .d-flex {
            display: flex !important;
        }

        .rounded-2 {
            border-radius: 7px !important;
        }

        .bg-light-info {
            --bs-bg-opacity: 1;
            background-color: rgba(235, 243, 254, 1) !important;
        }

        .card {
            margin-bottom: 30px;
        }

        .position-relative {
            position: relative !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        .overflow-hidden {
            overflow: hidden !important;
        }

        .border {
            border: 1px solid #ebf1f6 !important;
        }

        .fs-6 {
            font-size: 1.5rem !important;
        }

        .mb-2 {
            margin-bottom: 0.5rem !important;
        }

        .d-block {
            display: block !important;
        }

        a {
            text-decoration: none;
        }

        .user-profile-tab .nav-item .nav-link.active {
            color: #5d87ff;
            border-bottom: 2px solid #5d87ff;
        }

        .mb-9 {
            margin-bottom: 20px !important;
        }

        .fw-semibold {
            font-weight: 600 !important;
        }

        .fs-4 {
            font-size: 1.0rem !important;
        }

        .card,
        .bg-light {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .fs-2 {
            font-size: 0.5rem !important;
        }

        .rounded-4 {
            border-radius: 4px !important;
        }

        .ms-7 {
            margin-left: 30px !important;
        }

        .d-none {
            font-size: 1.2rem !important;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="container">
        <div class="card overflow-hidden">
            <div class="card-body p-0">
                <img src="/images/hero-welcome.jpg" alt="" class="img-fluid"
                    style="height: 200px; width: 100%;">
                <div class="row align-items-center">
                    <div class="col-lg-4 order-lg-1 order-2">

                        <div class="d-flex align-items-center justify-content-around m-4">
                            @if (Auth::check() && (Auth::user()->account_type == 'chantre' || Auth::user()->account_type == 'serviteur_de_dieu'))
                                <div class="text-center">
                                    <i class="fa fa-file fs-6 d-block mb-2"></i>
                                    <h4 class="mb-0 fw-semibold lh-1">938</h4>
                                    <p class="mb-0 fs-4">Posts</p>
                                </div>
                                <div class="text-center">
                                    <i class="fa fa-user fs-6 d-block mb-2"></i>
                                    <h4 class="mb-0 fw-semibold lh-1">3,586</h4>
                                    <p class="mb-0 fs-4">Followers</p>
                                </div>
                                <div class="text-center">
                                    <i class="fa fa-check fs-6 d-block mb-2"></i>
                                    <h4 class="mb-0 fw-semibold lh-1">2,659</h4>
                                    <p class="mb-0 fs-4">Following</p>
                                </div>
                            @elseif (Auth::check() && Auth::user()->account_type == 'fidèle')
                                <div class="text-center">

                                </div>
                                <div class="text-center">

                                </div>
                                <div class="text-center">

                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                        <div class="mt-n5">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 110px; height: 110px;" ;="">
                                    <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                        style="width: 100px; height: 100px;" ;="">
                                        <img src="{{ FileHelper::getFileUrl(Auth::user()->profile_photo) }}" alt="" class="w-100 h-100">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="fs-5 mb-0 fw-semibold">{{ $user->name }}</h5>
                                <p class="mb-0 fs-4">{{ $user->account_type }}</p>
                                <p class="mb-0 fs-4">{{ $user->serviteurDeDieu->appel ?? 'Aucun' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-last">
                        <ul
                            class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-3 gap-3">

                            <li class="position-relative">
                                <form id="profilePhotoForm" action="{{ route('user-profile-information.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="file" name="photo" id="profilePhotoInput" class="d-none" accept="image/*">
                                    <a class="text-white d-flex align-items-center justify-content-center bg-secondary p-2 fs-4 rounded-circle"
                                        href="javascript:void(0)" onclick="document.getElementById('profilePhotoInput').click()">
                                        <i class="fa fa-camera"></i>
                                    </a>

                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </form>
                                
                            </li>

                            <li class="position-relative">
                                <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                                    href="{{ route('welcome') }}" width="30" height="30">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>

                            <li class="position-relative">

                            </li>
                            <li class="position-relative">

                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" x-data>

                                    @csrf

                                    <button class="btn btn-danger">
                                        <i class="fa fa-power-off"></i>
                                        Déconnexion
                                    </button>

                                </form>

                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="nav nav-pills user-profile-tab justify-content-center mt-2 bg-light-info rounded-2"
                    id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profil" type="button"
                            role="tab" aria-controls="pills-profil" aria-selected="true">
                            <i class="fa fa-user me-2 fs-6"></i>
                            <span class="d-none d-md-block">Profil</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password"
                            type="button" role="tab" aria-controls="pills-password" aria-selected="false">
                            <i class="fa fa-lock me-2 fs-6"></i>
                            <span class="d-none d-md-block">Mot de passe</span>
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-sessions-tab" data-bs-toggle="pill" data-bs-target="#pills-sessions"
                            type="button" role="tab" aria-controls="pills-sessions" aria-selected="false">
                            <i class="fa fa-desktop me-2 fs-6"></i>
                            <span class="d-none d-md-block">Sessions</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-delete-tab" data-bs-toggle="pill" data-bs-target="#pills-delete"
                            type="button" role="tab" aria-controls="pills-delete" aria-selected="false">
                            <i class="fa fa-trash me-2 fs-6"></i>
                            <span class="d-none d-md-block">Supprimer le compte</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <!-- Profil -->
            <div class="tab-pane fade show active" id="pills-profil" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                <div class="row">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                    @endif
                </div>
            </div>

            <!-- Mot de passe -->
            <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                <div class="row">
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>
                    @endif
                </div>
            </div>

            <!-- Authentification -->


            <!-- Sessions -->
            <div class="tab-pane fade" id="pills-sessions" role="tabpanel" aria-labelledby="pills-sessions-tab">
                <div class="row">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            </div>

            <!-- Suppression de compte -->
            <div class="tab-pane fade" id="pills-delete" role="tabpanel" aria-labelledby="pills-delete-tab">
                <div class="row">
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <style>
            /* code  l'affichage des icon dans les input[type=password] */

            .mdp {
                position: relative;
                /* Position relative pour le conteneur des icônes */
            }

            .mt-2 {
                color: red;
            }

            .eye {

                width: 1rem;
                position: absolute;
                /* Position absolue pour les icônes */
                top: 50%;
                /* Position verticale au milieu du conteneur */
                transform: translateY(-50%);
                /* Décalage pour centrer verticalement */
                right: 10px;
                /* Décalage vers la droite à l'intérieur du conteneur */
                cursor: pointer;
            }
        </style>

        <script>
            function togglePasswordVisibility() {
                var passwordField = document.getElementById('current_password');
                var showButton = document.getElementById('eyeOpen');
                var hideButton = document.getElementById('eyeClosed');

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    showButton.style.display = "none";
                    hideButton.style.display = "inline-block";
                } else {
                    passwordField.type = "password";
                    showButton.style.display = "inline-block";
                    hideButton.style.display = "none";
                }
            }

            function showButtons() {
                var showButton = document.getElementById('eyeOpen');
                var passwordField = document.getElementById('current_password');
                var hideButton = document.getElementById('eyeClosed');

                if (passwordField.value.length > 0) {
                    showButton.style.display = "inline-block";
                    hideButton.style.display = "none";
                } else {
                    showButton.style.display = "none";
                    hideButton.style.display = "none";
                }
            }

            function togglePasswordVisibility0() {
                var passwordField = document.getElementById('password');
                var showButton = document.getElementById('eyeOpen0');
                var hideButton = document.getElementById('eyeClosed0');

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    showButton.style.display = "none";
                    hideButton.style.display = "inline-block";
                } else {
                    passwordField.type = "password";
                    showButton.style.display = "inline-block";
                    hideButton.style.display = "none";
                }
            }

            function showButtons0() {
                var showButton = document.getElementById('eyeOpen0');
                var passwordField = document.getElementById('password');
                var hideButton = document.getElementById('eyeClosed0');

                if (passwordField.value.length > 0) {
                    showButton.style.display = "inline-block";
                    hideButton.style.display = "none";
                } else {
                    showButton.style.display = "none";
                    hideButton.style.display = "none";
                }
            }

            //dernier input

            function showButtons1() {
                var showButton = document.getElementById('eyeOpen1');
                var passwordField = document.getElementById('password_confirmation');
                var hideButton = document.getElementById('eyeClosed1');

                if (passwordField.value.length > 0) {
                    showButton.style.display = "inline-block";
                    hideButton.style.display = "none";
                } else {
                    showButton.style.display = "none";
                    hideButton.style.display = "none";
                }
            }


            function togglePasswordVisibility1() {
                var passwordField = document.getElementById('password_confirmation');
                var showButton = document.getElementById('eyeOpen1');
                var hideButton = document.getElementById('eyeClosed1');

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    showButton.style.display = "none";
                    hideButton.style.display = "inline-block";
                } else {
                    passwordField.type = "password";
                    showButton.style.display = "inline-block";
                    hideButton.style.display = "none";
                }
            }
        </script>

        <script>
            document.getElementById('profilePhotoInput').addEventListener('change', function() {
                var formData = new FormData();
                formData.append('photo', this.files[0]);
                formData.append('_method', 'PUT');
                formData.append('_token', '{{ csrf_token() }}');

                fetch("{{ route('updateProfilePhoto') }}", {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur réseau');
                    }
                    return response.text();
                })
                .then(data => {
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Erreur lors de la mise à jour de la photo de profil');
                });
            });
        </script>

        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript"></script>
</body>

</html>
