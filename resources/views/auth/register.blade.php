@extends('layouts.guest')
@section('content')
@if (Auth::user())

<body class="account-page">
<div class="main-wrapper">
<div class="account-content">
<div class="container">
    <div class="account-logo">
        <a href="dashboard">
            <img src="assets/img/new-castorms.jpg" alt="New Castorms"></a>
    </div>

    <div class="account-box">
        <div class="account-wrapper">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <x-label class="form-label" for="name" value="{{ __('Name') }}" />
                    <x-input class="form-control" id="name" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input class="form-control" id="email" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="form-control" id="email" type="password" name="password"
                        required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="form-control" id="email" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms
                                    of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy
                                    Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
                @endif

                <div class="flex items-center justify-end mt-4">


                    <x-button class="btn btn-primary">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>

            @endif

            <body class="error-page">

                <div class="main-wrapper">
                    <div class="error-box">
                        <h1>404</h1>
                        <h3><i class="fa fa-warning"></i> Oops! Page not found!</h3>
                        <p>The page you requested was not found.</p>
                        <a href="/" class="btn btn-custom">Back to Home</a>
                    </div>
                </div>

@endsection()