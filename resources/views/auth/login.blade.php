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
	            		<img src="{{ asset('images/logo-icon.png') }}" class="img-circle">
	            	</div>
	                <form method="POST" action="{{ url('login') }}" class="form-horizontal form-material" id="loginform">
                        @csrf
	                    <h3 class="text-center m-b-20">Sign In</h3>

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

	                    <div class="form-group row">
	                        <div class="col-md-12">
	                            <div class="d-flex no-block align-items-center">
	                                <div class="custom-control custom-checkbox">
	                                    <input type="checkbox" name="remember" id="customCheck1" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}> 
	                                    <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}</label>
	                                </div>
	                                <div class="ml-auto">
	                                    <a href="{{route('password.reset')}}" class="text-muted">
	                                    	<i class="fa fa-lock m-r-5"></i> 
	                                    	{{ __('Forgot Your Password?') }}
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group text-center">
	                        <div class="col-xs-12 p-t-10 p-b-20">
	                            <button class="btn btn-block btn-info btn-rounded" type="submit">{{ __('Login') }}</button>
	                        </div>
	                    </div>
	                    <div class="form-group m-b-0">
	                        <div class="col-sm-12 text-center">
	                            Don't have an account? <a href="{{ route('register') }}" class="text-info m-l-5"><b>{{ __('Register') }}</b></a>
	                        </div>
	                    </div>
	                </form>

	            </div>
	        </div>
	    </div>
	</section>

@endsection
