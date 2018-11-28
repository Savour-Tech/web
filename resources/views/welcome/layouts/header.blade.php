<header class="header-area">
    <div class="">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a href="{{ url('/') }}" class="navbar-brand logo">
					{{ config('app.name') }}
				</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/caterer/register')}}">Become a Caterer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/register')}}">Sign Up</a>
                        </li>
                        <li>
                        	<a class="nav-link" href="{{url('/login')}}">Log in</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>