@extends('layouts.auth')
@section('register')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            <a href="index.html" class="auth-logo">
                                <img src="/images/logo_large.png" alt="logo-dark" class="mx-auto" height="40" />
                            </a>
                        </div>

                        <div class="auth-title-section mb-4 text-center">
                            <h3 class="text-dark fs-24 fw-bold">Bienvenue</h3>
                            <p class="text-muted fs-16">Créez votre compte pour accéder à plus de fonctionnalités sur AESD.
                            </p>
                        </div>

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                            class="login-form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom & prénom</label>
                                    <input class="form-control " name="name" type="text" id="name" required
                                        autofocus autocomplete="name" placeholder="Entrez votre nom complet">
                                    @if ($errors->has('name'))
                                        <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('name') }}</div>
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control " name="email" type="email" id="email" required
                                        autocomplete="username" placeholder="Entrez votre adresse email">
                                    @if ($errors->has('email'))
                                        <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Téléphone</label>
                                    <input class="form-control " name="phone" type="text" id="phone"
                                        autocomplete="tel" placeholder="Entrez votre numéro de téléphone" required
                                        maxlength="10" pattern="[0-9]{10}" autocomplete="tel"
                                        placeholder="Entrez votre numéro de téléphone"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    @if ($errors->has('phone'))
                                        <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="account_type">Type de Compte</label>
                                    <select id="account_type" name="account_type" class="form-control " required>
                                        <option value="">Choisir</option>
                                        <option value="serviteur_de_dieu">Serviteur de Dieu</option>
                                        <option value="fidele">Fidèle</option>
                                        <option value="chantre">Chantre</option>
                                    </select>
                                    @if ($errors->has('account_type'))
                                        <div class="text-red-500 mt-1" style="color: red">
                                            {{ $errors->first('account_type') }}</div>
                                    @endif
                                </div>


                                <!-- Champs supplémentaires pour Serviteur de Dieu -->
                                <div class="col-12" id="serviteur_fields" style="display:none;">
                                    <fieldset class="form-control position-relative"
                                        style="border: 2px solid rgb(185, 225, 241); padding: 15px; border-radius: 5px;">
                                        <legend class="px-2"
                                            style="font-weight: bold; color: rgb(33, 150, 243); background: white; position: absolute; top: -12px; left: 10px; font-size: 14px;">
                                            Pièce d'identité format jpg,jpeg,png.</legend>

                                        <label for="id_card_recto" class="form-label" style="font-size:13px;">Recto</label>
                                        <input id="id_card_recto" class="form-control" type="file" name="id_card_recto"
                                            accept="image/*">
                                        @if ($errors->has('id_card_recto'))
                                            <div class="text-red-500 mt-1" style="color: red">
                                                {{ $errors->first('id_card_recto') }}
                                            </div>
                                        @endif

                                        <label for="id_card_verso" class="form-label mt-2"style="font-size:13px;">Verso</label>
                                        <input id="id_card_verso" class="form-control" type="file" name="id_card_verso"
                                            accept="image/*">
                                        @if ($errors->has('id_card_verso'))
                                            <div class="text-red-500 mt-1" style="color: red">
                                                {{ $errors->first('id_card_verso') }}
                                            </div>
                                        @endif

                                       

                                    </fieldset>

                                    <div class="col-md-12" id="serviteur_fields">
                                        <label for="appel" class="form-label mt-2">Mon Appel</label>
                                        <select name="appel" id="appel" class="form-control">
                                            <option value="APO">Apôtre</option>
                                            <option value="PRO">Prophète</option>
                                            <option value="PAS">Pasteur</option>
                                            <option value="DOC">Docteur</option>
                                            <option value="EVA">Évangéliste</option>
                                        </select>
                                        @if ($errors->has('appel'))
                                            <div class="text-red-500 mt-1" style="color: red">
                                                {{ $errors->first('appel') }}</div>
                                        @endif
                                    </div>

                                </div>

                                

                                <!-- Champs supplémentaires pour Chantre -->
                                <div class="col-12" id="chantre_fields" style="display:none;">
                                    <label for="manager" class="form-label">Manager</label>
                                    <input id="manager" class="form-control " type="text" name="manager"
                                        value="{{ old('manager') }}">
                                    <label for="description" class="form-label mt-2">Description</label>
                                    <input id="description" class="form-control " type="text" name="description"
                                        value="{{ old('description') }}">
                                    @if ($errors->has('description'))
                                        <div class="text-red-500 mt-1" style="color: red">
                                            {{ $errors->first('description') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="adresse" class="form-label">Situation géographique</label>
                                    <input id="adresse" class="form-control " type="text" name="adresse"
                                        value="{{ old('adresse') }}" required />
                                    @if ($errors->has('adresse'))
                                        <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('adresse') }}
                                        </div>
                                    @endif
                                </div>



                                <div class="col-md-6">

                                    <div class="mdp">
                                        <label for="password" class="form-label">Mot de passe</label>
                                        <input class="form-control" type="password" id="password" name="password"
                                            required autocomplete="password" placeholder="Enter your password"
                                            oninput="showButtons()">

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
                                        <div class="text-red-500 mt-1" style="color: red">
                                            {{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">

                                    <label for="password_confirmation" class="form-label">Confirmez le mot de
                                        passe</label>
                                    <div class="mdp">

                                        <input id="password_confirmation" class="form-control " type="password"
                                            name="password_confirmation" required autocomplete="new-password"
                                            oninput="showButtons0()" />

                                        <svg id="eyeOpen0" class="eye0" onclick="togglePasswordVisibility0()"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                        </svg>

                                        <svg id="eyeClosed0" class="eye0" style="display:none"
                                            onclick="togglePasswordVisibility0()" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z" />
                                        </svg>

                                    </div>

                                    @if ($errors->has('password_confirmation'))
                                        <div class="text-red-500 mt-1" style="color: red">
                                            {{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>


                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input name="terms" id="terms" type="checkbox"
                                                class="form-check-input" required />
                                            <label class="form-check-label" for="terms">
                                                {!! __('J\'accepte les :terms_of_service et la :privacy_policy', [
                                                    'terms_of_service' =>
                                                        '<a target="_blank" href="' . route('terms.show') . '" class="text-primary">Conditions d\'utilisation</a>',
                                                    'privacy_policy' =>
                                                        '<a target="_blank" href="' . route('policy.show') . '" class="text-primary">Politique de confidentialité</a>',
                                                ]) !!}
                                            </label>
                                            @if ($errors->has('terms'))
                                                <div class="text-red-500 mt-1" style="color: red">
                                                    {{ $errors->first('terms') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                @endif


                            </div>

                            <div class="d-grid mt-4">
                                <x-button class="btn btn-primary">
                                    {{ __('Nous Rejoindre') }}
                                </x-button>

                            </div>
                        </form>

                        <div class="text-center text-muted mt-4">
                            <p class="mb-0">Déjà un compte ? <a href="{{ route('login') }}"
                                    class="text-primary">Connexion</a></p>
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

        .eye0 {

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

        function showButtons0() {
            var showButton = document.getElementById('eyeOpen0');
            var passwordField = document.getElementById('password_confirmation');
            var hideButton = document.getElementById('eyeClosed0');

            if (passwordField.value.length > 0) {
                showButton.style.display = "inline-block";
                hideButton.style.display = "none";
            } else {
                showButton.style.display = "none";
                hideButton.style.display = "none";
            }
        }


        function togglePasswordVisibility0() {
            var passwordField = document.getElementById('password_confirmation');
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
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accountTypeSelect = document.getElementById('account_type');
            const serviteurFields = document.getElementById('serviteur_fields');
            const chantreFields = document.getElementById('chantre_fields');

            accountTypeSelect.addEventListener('change', function() {
                const selectedValue = accountTypeSelect.value;
                serviteurFields.style.display = selectedValue === 'serviteur_de_dieu' ? 'block' : 'none';
                chantreFields.style.display = selectedValue === 'chantre' ? 'block' : 'none';
            });
        });

        document.getElementById('phone').addEventListener('input', function(e) {
            // Supprime tous les caractères non numériques
            e.target.value = e.target.value.replace(/[^0-9]/g, '');

            // Limite à 10 caractères
            if (e.target.value.length > 10) {
                e.target.value = e.target.value.slice(0, 10);
            }
        });
    </script>
@endsection
