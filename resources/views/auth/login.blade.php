@extends('layouts.auth')
@section('login')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="card p-4">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <a href="index.html" class="auth-logo">
                                <img src="/images/logo_large.png" alt="logo-dark" class="mx-auto" height="40" />
                            </a>
                        </div>

                        <!-- Titre -->
                        <div class="auth-title-section mb-4 text-center">
                            <h3 class="text-dark fs-20 fw-medium mb-2">Bienvenue</h3>
                            <p class="text-muted fs-16">Connectez pour accéder à plus de fonctionnalités sur AESD.</p>
                        </div>

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Formulaire -->
                        <form action="{{ route('login') }}" method="POST" class="my-4">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="emailaddress" class="form-label">Adresse email</label>
                                <input class="form-control" type="email" id="emailaddress" name="email"
                                    value="{{ old('email', 'example@domain.com') }}" required autocomplete="email"
                                    placeholder="Enter your email">

                                @if ($errors->has('email'))
                                    <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('email') }}</div>
                                @endif

                            </div>

                            <div class="form-group mb-3 ">

                                <div class="mdp">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input class="form-control" type="password" id="password" name="password" required
                                        autocomplete="password" placeholder="Enter your password" oninput="showButtons()">

                                    <svg id="eyeOpen" class="eye" onclick="togglePasswordVisibility()"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>

                                    <svg id="eyeClosed" class="eye" style="display:none"
                                        onclick="togglePasswordVisibility()" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z" />
                                    </svg>
                                </div>

                                @if ($errors->has('password'))
                                    <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="form-group d-flex mb-3 align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember"
                                        checked>
                                    <label class="form-check-label" for="checkbox-signin">Souvenir</label>
                                </div>
                                <div class="ms-auto">
                                    <a class="text-primary ms-2 fw-medium" href="{{ route('password.request') }}">Mot de
                                        passe oublié?</a>
                                </div>
                            </div>

                            <div class="d-grid">
                                <x-button class="btn btn-primary">
                                    {{ __('Se connecter') }}
                                </x-button>
                                {{-- <button  type="submit"></button> --}}
                            </div>
                        </form>

                        <!-- Lien d'inscription -->
                        <div class="text-center text-muted mt-4">
                            <p class="text-muted fs-8">Vous n'avez pas de compte? <a class="text-primary ms-2 fw-medium"
                                    href="{{ route('register') }}">S'inscrire</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* code  l'affichage des icon dans les input[type=password] */

        .mdp {
            position: relative;
            /* Position relative pour le conteneur des icônes */
        }
        
        .eye {
           
            width: 1rem;
            position: absolute;
            /* Position absolue pour les icônes */
            top: 70%;
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
            var passwordField = document.getElementById('password');
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
            var passwordField = document.getElementById('password');
            var hideButton = document.getElementById('eyeClosed');

            if (passwordField.value.length > 0) {
                showButton.style.display = "inline-block";
                hideButton.style.display = "none";
            } else {
                showButton.style.display = "none";
                hideButton.style.display = "none";
            }
        }
    </script>
@endsection
