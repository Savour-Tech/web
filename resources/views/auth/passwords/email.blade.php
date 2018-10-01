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
                    <form class="form-horizontal form-material" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <a href="javascript:void(0)" class="close">
                            <i class="fa fa-close">&nbsp;</i>
                        </a>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12 {{ $errors->has('email') ? 'has-danger' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail') }}" required>
                                    @component('auth.components.message_input', ['errors' => $errors, 'field' => 'email'])@endcomponent
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block btn-loading text-uppercase waves-effect waves-light" type="submit">
                                    Reset
                                    <i class="fa fa-spinner fa-spin"></i>
                                </button>
                            </div>
                        </div>

                        <div class="text-center text-danger form-error"> </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection
