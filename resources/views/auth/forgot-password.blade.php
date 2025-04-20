


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
                        <h3 class="text-dark fs-20 fw-medium mb-2"></h3>
                        <p class="text-muted fs-8">Vous avez oublié votre mot de passe ? Pas de problème 
                            Il vous suffit de nous communiquer votre adresse e-mail et nous vous enverrons un lien de <br>  réinitialisation  
                            de mot de passe qui vous permettra d'en choisir un nouveau..</p>
                    </div>

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                   @endif

                    <!-- Formulaire -->
                    <form action="{{ route('password.email') }}" method="POST" class="my-4">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="emailaddress" class="form-label">Adresse email</label>
                            <input 
                                class="form-control" 
                                type="email" 
                                id="emailaddress" 
                                name="email" 
                                value="{{ old('email', 'example@domain.com') }}" 
                                required autocomplete="email" 
                                placeholder="Enter your email">
                                @if ($errors->has('email'))
                                        <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('email') }}</div>
                                @endif
                        </div>

                        <div class="d-grid">
                            <x-button class="btn btn-primary">
                                {{ __('Reinitialiser') }}
                            </x-button>
                            {{-- <button  type="submit"></button> --}}
                        </div>
                    </form>

                    <!-- Lien d'inscription -->
                    <div class="text-center text-muted mt-4">
                        <p class="mb-0">Vous n'avez pas de compte? <a class="text-primary ms-2 fw-medium" href="{{ route('register') }}">S'inscrire</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
