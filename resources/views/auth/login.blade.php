@extends('layouts.guest')

@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif

@section('content')
<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">
                <div class="account-logo">
                    <a href="dashboard">
                        <img src="assets/img/new-castorms.jpg" alt="New Castorms"></a>
                </div>

                <div class="account-box">
                <x-validation-errors class="mb-4" />
                    <div class="account-wrapper">
                        <form method="POST" action="{{ route('login') }}" class="needs-validation custom-form mt-4 pt-2"
                            novalidate action="dashboard">
                            @csrf
                            <div class="form-group">
                                <label for="useremail" for="email" value="{{ __('Email') }}"
                                    class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Enter email" required id="email"
                                    type="email" name="email" :value="old('email')" required autofocus
                                    autocomplete="username">
                                <div class="invalid-feedback">
                                    Please Enter Email
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="password" value="{{ __('Password') }}" for="userpassword"
                                            class="form-label">Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <a class="text-muted" href="auth-recoverpw">
                                            Forgot password?
                                        </a>
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password" class="block mt-1 w-full"
                                        type="password" name="password" required autocomplete="current-password">
                                    <div class="invalid-feedback">
                                        Please Enter Password
                                    </div>
                                    <span class="fa fa-eye-slash" id="toggle-password"></span>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Login</button>
                            </div>
                            <div class="account-footer">
                                <p>Don't have an account yet? <a href="auth-register">Register</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection