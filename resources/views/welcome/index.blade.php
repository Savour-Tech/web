@php

    $themeConfig['body_classes'] = 'page-welcome';
    $themeConfig['show_footer'] = true;

@endphp

@extends('welcome.layouts.app')

@section('content')

<!-- ***** Header Area Start ***** -->
<header class="header-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav class="main-nav">
					<!-- ***** Logo Start ***** -->
					<a href="{{ url('/') }}" class="logo">
						<img src="{{asset('images/logo-icon.png')}}" alt="{{ config('app.name') }}"/>

						<h5>{{ config('app.name') }}</h5>
					</a>
					<!-- ***** Logo End ***** -->


					<!-- ***** Menu Start ***** -->
					<ul class="nav">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li class="submenu">
							<a href="javascript:;">What is {{ config('app.name') }}?</a>
							<ul>
								<li><a href="#features">Features</a></li>
								<li><a href="#our-team">Our Team</a></li>
								<li><a href="#pricing-plans">Pricing Plans</a></li>
								<li><a href="#blog">Latests Blogs</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:;">Products</a>
							<ul>
								<li><a href="green-about.html">About Us</a></li>
								<li><a href="green-features.html">Features</a></li>
								<li><a href="green-faq.html">FAQ's</a></li>
								<li><a href="green-blog.html">Blog</a></li>
							</ul>
						</li>
						<li><a href="#">Support</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">My Account</a></li>
					</ul>
					<a class='menu-trigger'>
						<span>Menu</span>
					</a>
					<!-- ***** Menu End ***** -->

					<!-- ***** Header Buttons Start ***** -->
					<ul class="header-buttons">
						<li><a class="btn-nav-primary" href="{{url('/login')}}">Login</a></li>
					</ul>
					<!-- ***** Header Buttons End ***** -->
				</nav>
			</div>
		</div>
	</div>
</header>
<!-- ***** Header Area End ***** -->


<!-- ***** Welcome Area Start ***** -->
<div class="welcome-area" id="welcome">
	<!-- ***** Header Background Image Start ***** -->
	<div class="right-bg">
		<img src="{{ asset('images/welcome/photos/header.jpg') }}" class="img-fluid float-right" alt="">
	</div>
	<!-- ***** Header Background Image End ***** -->

	<div class="header-bg">
		<img src="{{ asset('images/welcome/header-bg.svg') }}" class="img-fluid" alt="">
	</div>

	<!-- ***** Header Text Start ***** -->
	<div class="header-text">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-12 col-sm-12">
					<h1 class="mb-2">Savour.</h1>
					<p>
						lorem ipsium valor et marius etdam
					</p>
					<a href="#" class="btn-primary">LOGIN NOW</a>
				</div>
			</div>
		</div>
	</div>
	<!-- ***** Header Text End ***** -->
</div>
<!-- ***** Welcome Area End ***** -->


<!-- ***** Features Small Start ***** -->
<section class="section position-relative" id="features">
	<div class="bg-light position-absolute w-100 h-50" style="bottom: 0">
		<br />
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-sm-12 offset-md-1 bg-dark pt-4 pb-5 align-self-center card">
				<div class="card-body">
					<div class="center-heading mb-5">
						<h1 class="section-title section-title-underline text-light">5 Reasons to choose {{ ucfirst(config('app.name')) }}.</h1>
					</div>
					<div class="left-text mt-5 pt-3">


						<div class="row">
							<div class="col-2 text-center">
								<div class="bg-white rounded-circle d-inline-block" style="width: 90px; height: 90px;">
									
								</div>
							</div>

							<div class="col-10 text-light">
								<h5>Lorem ipsium valor et dolor.</h5>
								<p>Phasellus vitae velit sit amet diam semper commodo quis quis libero. Morbi consequat arcu augue, molestie faucibus metus ullamcorper vel.</p>
							</div>
						</div>

						<div class="row">
							<div class="col-2 text-center">
								<div class="bg-white rounded-circle d-inline-block" style="width: 90px; height: 90px;">
									
								</div>
							</div>

							<div class="col-10 text-light">
								<h5>Lorem ipsium valor et dolor.</h5>
								<p>Phasellus vitae velit sit amet diam semper commodo quis quis libero. Morbi consequat arcu augue, molestie faucibus metus ullamcorper vel.</p>
							</div>
						</div>

						<div class="row">
							<div class="col-2 text-center">
								<div class="bg-white rounded-circle d-inline-block" style="width: 90px; height: 90px;">
									
								</div>
							</div>

							<div class="col-10 text-light">
								<h5>Lorem ipsium valor et dolor.</h5>
								<p>Phasellus vitae velit sit amet diam semper commodo quis quis libero. Morbi consequat arcu augue, molestie faucibus metus ullamcorper vel.</p>
							</div>
						</div>

						<div class="row">
							<div class="col-2 text-center">
								<div class="bg-white rounded-circle d-inline-block" style="width: 90px; height: 90px;">
									
								</div>
							</div>

							<div class="col-10 text-light">
								<h5>Lorem ipsium valor et dolor.</h5>
								<p>Phasellus vitae velit sit amet diam semper commodo quis quis libero. Morbi consequat arcu augue, molestie faucibus metus ullamcorper vel.</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ***** Features Small End ***** -->



<!-- ***** Download Parallax Start ***** -->
<section class="parallax" id="download" style="background: url('{{ asset('images/welcome/photos/parallax.jpg') }}')">
	<div class="parallax-content">
		<div class="container">

			<!-- ***** Download Buttons Start ***** -->
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col-6 download-btn-content">
					<a href="#" class="btn-download">
						<span style="color: yellow;">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</span>
						<strong>98%</strong>
						<span>Rating</span>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6 download-btn-content">
					<a href="#" class="btn-download text-light">
						<i class="fa fa-building"></i>
						<strong>35</strong>
						<span>Stores Nationwide</span>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6 download-btn-content">
					<a href="#" class="btn-download text-light">
						<i class="fa fa-trophy"></i>
						<strong>10</strong>
						<span>Products</span>
					</a>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6 download-btn-content">
					<a href="#" class="btn-download text-light">
						<i class="fa fa-cube"></i>
						<strong>7982</strong>
						<span>Satisfied Customers</span>
					</a>
				</div>
			</div>
			<!-- ***** Download Buttons End ***** -->
		</div>
	</div>
</section>
<!-- ***** Download Parallax End ***** -->


<!-- ***** Team Start ***** -->
<section class="section padding-top-80" id="our-team">
	<div class="container">
		<!-- ***** Section Title Start ***** -->
		<div class="row">
			<div class="col-lg-12">
				<div class="center-heading">
					<h2 class="section-title">What people say about {{ config('app.name') }}</h2>
				</div>
			</div>
		</div>
		<!-- ***** Section Title End ***** -->

		<div class="row">
			<!-- ***** Team Item Start ***** -->
			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="team-item">
					<div class="user-image">
						<img src="{{ asset('images/welcome/photos/team/1.jpg') }}" alt="">
					</div>
					<div class="team-content">
						<h3 class="user-name">Fletch Skinner</h3>
						<span>Product Strategist</span>
						<p>Proin arcu ligula, malesuada id tincidunt laoreet, facilisis at justo. Sed at lorem.</p>
					</div>
				</div>
			</div>
			<!-- ***** Team Item End ***** -->
			
			<!-- ***** Team Item Start ***** -->
			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="team-item">
					<div class="user-image">
						<img src="{{ asset('images/welcome/photos/team/2.jpg') }}" alt="">
					</div>
					<div class="team-content">
						<h3 class="user-name">Lance Bogrol</h3>
						<span>CEO Maquis</span>
						<p>Aliquam eget convallis nunc, et porta libero. Etiam velit nulla, lobortis ut tristique.</p>
					</div>
				</div>
			</div>
			<!-- ***** Team Item End ***** -->
			
			<!-- ***** Team Item Start ***** -->
			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="team-item">
					<div class="user-image">
						<img src="{{ asset('images/welcome/photos/team/3.jpg') }}" alt="">
					</div>
					<div class="team-content">
						<h3 class="user-name">Valentino Morose</h3>
						<span>Android Developer</span>
						<p>Curabitur tristique nec orci quis porta. Aliquam leo justo, auctor eget sapien.</p>
					</div>
				</div>
			</div>
			<!-- ***** Team Item End ***** -->
			
			<!-- ***** Team Item Start ***** -->
			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="team-item">
					<div class="user-image">
						<img src="{{ asset('images/welcome/photos/team/4.jpg') }}" alt="">
					</div>
					<div class="team-content">
						<h3 class="user-name">Giles Posture</h3>
						<span>lorem ipisum</span>
						<p>Nunc posuere lectus ut aliquet facilisis. Nam varius id magna et convallis.</p>
					</div>
				</div>
			</div>
			<!-- ***** Team Item End ***** -->
		</div>

		<div class="row">
			
			<div class="offset-lg-3 col-lg-6">
				<div class="center-text">
					<a href="#">See mor user testimonials <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ***** Team End ***** -->



<!-- ***** Subscribe Parallax Start ***** -->
<section class="parallax min-auto" id="subscribe">
	<div class="parallax-content">
		<div class="container">
			<div class="row">
				<div class="offset-lg-2 col-lg-8">
					<div class="info">
						<p>Subscribe to our news letter</p>
					</div>
				</div>
			</div>

			<!-- ***** Subscribe Form Start ***** -->
			<div class="row">
				<div class="col-lg-4 mx-auto">
					<div class="subscribe-wrapper">
						<input type="email" placeholder="Enter your email">
						<button>Get started</button>
					</div>
					<!-- <span class="subscribe-info">30-day FREE trial - no credit card needed</span> -->
				</div>
			</div>
			<!-- ***** Subscribe Form End ***** -->
		</div>
	</div>
</section>
<!-- ***** Subscribe Parallax End ***** -->


<!-- ***** Blog Start ***** -->
<section class="section white padding-top-80" id="blog">
	<div class="container">
		<!-- ***** Section Title Start ***** -->
		<div class="row">
			<div class="col-lg-12">
				<div class="center-heading">
					<h2 class="section-title">Blog</h2>
				</div>
			</div>
			<div class="offset-lg-3 col-lg-6">
				<div class="center-text">
					<p>Donec vulputate urna sed rutrum venenatis. Cras consequat magna quis arcu elementum, quis congue risus volutpat.</p>
				</div>
			</div>
		</div>
		<!-- ***** Section Title End ***** -->

		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="blog-post-thumb">
					<div class="img">
						<img src="{{ asset('images/welcome/photos/blog/1.jpg') }}" alt="">
					</div>
					<div class="blog-content">
						<h3>
							<a href="green-blog-single.html">Managing Your Finances With Your Partner</a>
						</h3>
						<div class="text">
							Mauris tellus sem, ultrices varius nisl at, convallis iaculis mauris. Sed eget sem vitae purus tempus dignissim.
						</div>
						<a href="#" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="blog-post-thumb">
					<div class="img">
						<img src="{{ asset('images/welcome/photos/blog/2.jpg') }}" alt="">
					</div>
					<div class="blog-content">
						<h3>
							<a href="green-blog-single.html">5 Practical Ways Minimalism Saves Money</a>
						</h3>
						<div class="text">
							Cras imperdiet faucibus sem, a dignissim urna feugiat sed. Interdum et malesuada fames ac ante ipsum.
						</div>
						<a href="#" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="blog-post-thumb">
					<div class="img">
						<img src="{{ asset('images/welcome/photos/blog/3.jpg') }}" alt="">
					</div>
					<div class="blog-content">
						<h3>
							<a href="green-blog-single.html">How to Find the Best Travel Deals</a>
						</h3>
						<div class="text">
							Quisque euismod nec lacus sit amet maximus. Ut convallis sagittis lorem auctor malesuada. Morbi auctor tortor eu.
						</div>
						<a href="#" class="read-more">Read More <i class="fa fa-long-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ***** Blog End ***** -->


<!-- ***** Footer Start ***** -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 extra">
				<p class="copyright">© {{ config('app.name') }}. 2015 - 2018. All Rights Reserved.</p>
				<ul class="social pull-right">
					<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
					<li><a href="#"><i class="fa fa-github-square"></i></a></li>
				</ul>
				
			</div>
		</div>
	</div>
</footer>
<!-- ***** Footer End ***** -->


    
@endsection
