@extends('layouts.auth')
@section('forgot-password')
    <div class="authentication-wrapper authentication-basic container-p-y p-4 p-sm-0">
        <div class="authentication-inner py-6">
            <!-- Logo -->
            <div class="card p-md-7 p-1">
                <!-- Forgot Password -->
                <div class="app-brand justify-content-center mt-5">
                    <a href="index.html" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <span class="text-primary">
                                <img src="{{ asset('assets/images/logo_new.jpg') }}" alt=""
                                    style="width:100px;height:50px ;">
                            </span>
                        </span>
                    </a>
                </div>
                <!-- /Logo -->
                <div class="card-body mt-1">
                    <h4 class="mb-1">Mot de passe oublié</h4>
                    <p class="mb-5">Saisissez votre adresse e-mail et nous vous enverrons les instructions pour
                        réinitialiser votre mot de passe.</p>

                    <form id="formAuthentication" class="mb-5" action="{{ route('forgot-password') }}" method="POST">
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
                            <label>Adresse e-mail</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary d-grid w-100 mb-5">Envoyer le lien</button>
                    </form>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                            <i class="icon-base ri ri-arrow-left-s-line scaleX-n1-rtl icon-20px me-1_5"></i>
                            Retour à la connexion
                        </a>
                    </div>
                </div>

            </div>
            <!-- /Forgot Password -->
            <img alt="mask" src="{{ asset('assets_2/img/illustrations/auth-basic-forgot-password-mask-light.png') }}"
                class="authentication-image d-none d-lg-block"
                data-app-light-img="{{ asset('illustrations/auth-basic-forgot-password-mask-light.png') }}"
                data-app-dark-img="{{ asset('illustrations/auth-basic-forgot-password-mask-dark.png') }}" />
        </div>
    </div>
@endsection
