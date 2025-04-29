@extends('layouts.auth')
@section('reset-password')
    {{-- <div class="container">
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
                            <p class="text-muted fs-16">Réinitialiser votre mot de passe !!.</p>
                        </div>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                
                            <div class="block">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                    @if ($errors->has('email'))
                                        <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('email') }}</div>
                                    @endif
                            </div>
                
                            <div class="form-group mb-3">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                     @if ($errors->has('password'))
                                        <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('password') }}</div>
                                     @endif
                            </div>
                
                            <div class="form-group mb-3">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                @if ($errors->has('password_confirmation'))
                                <div class="text-red-500 mt-1" style="color: red">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                
                            <div class="flex items-center justify-end form-group mb-3">
                                <x-button>
                                    {{ __('Réinitialiser') }}
                                </x-button>
                            </div>
                        </form>
                       

                        
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}
@endsection
