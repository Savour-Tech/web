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
        <div class="login-register register" style="background-image:url({{ asset('images/auth/login-register.jpg') }});">
            <div class="login-box card">
                <div class="card-body">
                
                    
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" class="form-horizontal form-material">
                        @csrf

                        <input type="hidden" name="role" value="{{ App\User::ROLE_CATERER }}">

                        <h3 class="text-center m-b-20">{{ __('Register') }}</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('first_name') ? 'has-danger' : '' }}">
                                    <div class="col-xs-12">
                                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required placeholder="{{ __('First Name') }}">
                                    </div>

                                    @component('auth.components.message_input', ['errors' => $errors, 'field' => 'first_name'])@endcomponent
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('last_name') ? 'has-danger' : '' }}">
                                    <div class="col-xs-12">
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required placeholder="{{ __('Last Name') }}">
                                    </div>

                                    @component('auth.components.message_input', ['errors' => $errors, 'field' => 'last_name'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}">
                            </div>

                            @component('auth.components.message_input', ['errors' => $errors, 'field' => 'email'])@endcomponent
                        </div>

                        <div class="form-group {{ $errors->has('username') ? 'has-danger' : '' }}">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" required placeholder="{{ __('Username') }}">
                            </div>

                            @component('auth.components.message_input', ['errors' => $errors, 'field' => 'username'])@endcomponent
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}"">
                            <div class="col-xs-12">
                                <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}" required> 
                            </div>

                            @component('auth.components.message_input', ['errors' => $errors, 'field' => 'password'])@endcomponent
                        </div>

                        <div class="form-group {{ $errors->has('confirm_password') ? 'has-danger' : '' }}"">
                            <div class="col-xs-12">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required> 
                            </div>

                            @component('auth.components.message_input', ['errors' => $errors, 'field' => 'password_confirmation'])@endcomponent
                        </div>

                        <div class="text-muted text-center pt-2 pb-3 font-weight-light text-small">
                            By Registring you agree to our <a href="#">Terms of aggreement</a> and <a href="#">Privacy Policy</a>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-5">
                                <button class="btn btn-block btn-info btn-rounded" type="submit">{{ __('Register') }}</button>
                            </div>
                        </div>

                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <a href="{{ route('login') }}" class="text-info m-l-5"><b>{{ __('GO back to Login') }}</b></a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>


    
@endsection
