@php

    $themeConfig['body_classes'] = 'page-auth page-login card-no-border';
    $themeConfig['show_header'] = true;

@endphp

@extends('auth.layouts.app')

@section('content')

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{ asset('images/auth/login-register.jpg') }});">
            <div class="login-box card">
                <div class="card-body">
                    <div class="text-center logo">
                        <img src="{{ asset('images/auth/logo-icon.png') }}" class="img-circle">
                    </div>
                    <form method="POST" class="form-horizontal form-material" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <h3 class="text-center m-b-20">{{ __('Reset Password') }}</h3>

                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail or Username') }}">
                            </div>

                            @component('auth.components.message_input', ['errors' => $errors, 'field' => 'email'])@endcomponent
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
                            <div class="col-xs-12">
                                <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}" required> 
                            </div>

                            @component('auth.components.message_input', ['errors' => $errors, 'field' => 'password'])@endcomponent
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required> 
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">{{ __('Reset Password') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection
