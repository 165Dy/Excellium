@extends('layouts.auth')
@section('register')
    <div class="authentication-wrapper authentication-basic container-p-y p-4 p-sm-0">
        <div class="authentication-inner py-6">
            <!-- Register Card -->
            <div class="card p-md-7 p-1">
                <!-- Logo -->
                <div class="app-brand justify-content-center mt-5">
                    <a href="#" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <span class="text-primary">
                                <img src="{{ asset('assets/images/logo_new.jpg') }}" alt=""
                                    style="width:100px;height:50px ;">
                                <!-- Votre logo SVG ici -->
                            </span>
                        </span>
                    </a>
                </div>
                <!-- /Logo -->
                <div class="card-body mt-1">
                    <h4 class="mb-1">L’aventure commence ici</h4>
                    <p class="mb-5">Rendez la gestion de votre application simple et agréable.</p>

                    <form id="formAuthentication" class="mb-5" action="{{ route('register') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token ?? '' }}">

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="form-floating form-floating-outline mb-5 form-control-validation">
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom"
                                name="nom" placeholder="Entrez votre nom"
                                value="{{ old('nom', $invitation->nom ?? '') }}" autofocus required />
                            <label for="nom">Nom</label>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 form-control-validation">
                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom"
                                name="prenom" placeholder="Entrez votre prénom"
                                value="{{ old('prenom', $invitation->prenom ?? '') }}" required />
                            <label for="prenom">Prénom</label>
                            @error('prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 form-control-validation">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Entrez votre adresse e-mail"
                                value="{{ old('email', $invitation->email ?? '') }}" required />
                            <label for="email">Adresse e-mail</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 form-control-validation">
                            <input type="tel" class="form-control @error('telephone') is-invalid @enderror"
                                id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone"
                                value="{{ old('telephone') }}" />
                            <label for="telephone">Téléphone</label>
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5 form-password-toggle form-control-validation">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="••••••••••••" aria-describedby="password" required />
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

                        <div class="mb-5 form-password-toggle form-control-validation">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" placeholder="••••••••••••"
                                        aria-describedby="password_confirmation" required />
                                    <label for="password_confirmation">Confirmer le mot de passe</label>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <span class="input-group-text cursor-pointer">
                                    <i class="icon-base ri ri-eye-off-line icon-20px"></i>
                                </span>
                            </div>
                        </div>

                        <button class="btn btn-primary d-grid w-100 mb-5">S’inscrire</button>
                    </form>

                    <p class="text-center mb-5">
                        <span>Vous avez déjà un compte ?</span>
                        <a href="{{ route('login') }}">
                            <span>Se connecter</span>
                        </a>
                    </p>
                </div>

            </div>
            <!-- Register Card -->
            <img alt="mask" src="{{ asset('assets_2/img/illustrations/auth-basic-register-mask-light.png') }}"
                class="authentication-image d-none d-lg-block"
                data-app-light-img="{{ asset('illustrations/auth-basic-register-mask-light.png') }}"
                data-app-dark-img="{{ asset('illustrations/auth-basic-register-mask-dark.png') }}" />
        </div>
    </div>
@endsection
