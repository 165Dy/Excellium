@extends('layouts.auth')
@section('reset-password')
    <div class="authentication-wrapper authentication-basic container-p-y p-4 p-sm-0">
        <div class="authentication-inner py-6">
            <div class="card p-md-7 p-1">
                <!-- Logo -->
                <div class="app-brand justify-content-center mt-5">
                    <a href="#" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <span class="text-primary">
                                <!-- Votre logo SVG ici -->
                            </span>
                        </span>
                        <span class="app-brand-text demo text-heading fw-semibold">@lang('extracted.materialize')</span>
                    </a>
                </div>
                <!-- /Logo -->

                <div class="card-body mt-1">
                    <h4 class="mb-1">@lang('extracted.bienvenue')</h4>
                    <p class="mb-5">@lang('extracted.reinitialiser_votre_mot_de_passe')</p>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="form-floating form-floating-outline mb-5 form-control-validation">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', $email) }}" required autofocus
                                autocomplete="username" />
                            <label for="email">@lang('extracted.adresse_email')</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5 form-password-toggle form-control-validation">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <label for="password">@lang('extracted.mot_de_passe')</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <span class="input-group-text cursor-pointer"><i
                                        class="icon-base ri ri-eye-off-line icon-20px"></i></span>
                            </div>
                        </div>

                        <div class="mb-5 form-password-toggle form-control-validation">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    <label for="password_confirmation">Confirmer le mot de passe</label>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <span class="input-group-text cursor-pointer"><i
                                        class="icon-base ri ri-eye-off-line icon-20px"></i></span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <button class="btn btn-primary d-grid w-100" type="submit">
                                @lang('extracted.reinitialiser')
                            </button>
                        </div>
                    </form>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                            <i class="icon-base ri ri-arrow-left-s-line scaleX-n1-rtl icon-20px me-1_5"></i>
                            Retour à la connexion
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection