@extends('layouts.auth')
@section('login')
    <div class="authentication-wrapper authentication-basic container-p-y p-4 p-sm-0">
        <div class="authentication-inner py-6">
            <!-- Login -->
            <div class="card p-md-7 p-1">
                <!-- Logo -->
                <div class="app-brand justify-content-center mt-5">
                    <a href="#" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <span class="text-primary">
                                {{-- <svg width="32" height="18" viewBox="0 0 38 20" fill="none"
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
                                        <linearGradient id="paint1_linear_2989_100980" x1="5.19475" y1="0.849139"
                                            x2="10.3357" y2="24.1155" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-opacity="1" />
                                            <stop offset="1" stop-opacity="0" />
                                        </linearGradient>
                                    </defs>
                                </svg> --}}
                                <img src="assets_2/img/favicon/favicon_excellium.ico" alt=""
                                    style="width:50px;height:50px ;">
                            </span>
                        </span>
                        {{-- <span class="app-brand-text demo text-heading fw-semibold  ">Excellium</span> --}}
                    </a>
                </div>
                <!-- /Logo -->

                <div class="card-body mt-1">
                    <h4 class="mb-1">Bienvenue sur Excellium</h4>
                    <p class="mb-5">Veuillez vous connecter à votre compte </p>

                    <form id="formAuthentication" class="mb-5" action="{{ route('login') }}" method="POST">
                        @csrf
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="form-floating form-floating-outline mb-5 form-control-validation">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Entrez votre adresse e-mail" value="{{ old('email') }}"
                                autofocus required />
                            <label for="email">Adresse e-mail</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <div class="form-password-toggle form-control-validation">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" required />
                                        <label for="password">Mot de passe</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <span class="input-group-text cursor-pointer">
                                        <i class="icon-base ri ri-eye-off-line icon-20px"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5 d-flex justify-content-between mt-5">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>
                            <a href="{{ route('forgot-password') }}" class="float-end mb-1 mt-2">
                                <span>Mot de passe oublié ?</span>
                            </a>
                        </div>

                        <div class="mb-5">
                            <button class="btn btn-primary d-grid w-100" type="submit">Se connecter</button>
                        </div>
                    </form>

                    {{-- Les comptes ne sont créés que par invitation --}}
                </div>

            </div>
            <!-- /Login -->
            <img alt="mask" src="{{ asset('assets_2/img/illustrations/auth-basic-login-mask-light.png') }}"
                class="authentication-image d-none d-lg-block"
                data-app-light-img="{{ asset('illustrations/auth-basic-login-mask-light.png') }}"
                data-app-dark-img="{{ asset('illustrations/auth-basic-login-mask-dark.png') }}" />
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionne tous les boutons "eye" dans des blocs .form-password-toggle
            const toggles = document.querySelectorAll('.form-password-toggle .input-group-text.cursor-pointer');

            toggles.forEach(toggle => {
                toggle.setAttribute('role', 'button');
                toggle.setAttribute('tabindex', '0');
                toggle.setAttribute('aria-pressed', 'false');

                // Trouve le champ password à proximité (dans le même input-group)
                const inputGroup = toggle.closest('.input-group');
                const passwordInput = inputGroup ? inputGroup.querySelector(
                    'input[type="password"], input[type="text"]') : null;

                // Si pas de champ, on ignore
                if (!passwordInput) return;

                // Fonction qui bascule la visibilité
                function togglePasswordVisibility() {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    // Met à jour l'icône (RemixIcon classes)
                    const icon = toggle.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('ri-eye-line', isPassword);
                        icon.classList.toggle('ri-eye-off-line', !isPassword);
                    } else {
                        // Fallback : change le texte si pas d'icône
                        toggle.textContent = isPassword ? 'Masquer' : 'Afficher';
                    }
                    // accessibilité
                    toggle.setAttribute('aria-pressed', String(isPassword));
                    // garde le focus sur l'input
                    passwordInput.focus();
                    // replacer le curseur à la fin si on a affiché le texte
                    if (isPassword) {
                        const len = passwordInput.value.length;
                        passwordInput.setSelectionRange(len, len);
                    }
                }

                // Click et touche entrée/espace pour activation clavier
                toggle.addEventListener('click', (e) => {
                    e.preventDefault();
                    togglePasswordVisibility();
                });

                toggle.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ' || e.key === 'Spacebar') {
                        e.preventDefault();
                        togglePasswordVisibility();
                    }
                });
            });
        });
    </script>
@endsection
