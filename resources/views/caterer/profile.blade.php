@php
    $themeConfig['body_classes'] = 'page-profile';

@endphp

@extends('caterer.layouts.app')

@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="{{  Auth::user()->imagePath() }}" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10">{{ Auth::user()->getFullname() }}</h4>
                        <h6 class="card-subtitle text-capitalize">{{ Auth::user()->username }}</h6>
                        <div class="row text-center justify-content-md-center">
                            @component('components.rating_stars', ['value' => $rating->value])@endcomponent
                        </div>
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> 
                	<small class="text-muted">Email address </small>
                    <h6>{{ Auth::user()->email }}</h6> 

                    <small class="text-muted p-t-30 db">Phone</small>
                    <h6>{{ Auth::user()->phone }}</h6> 

                    <small class="text-muted p-t-30 db">Address</small>
                    <h6>{{ Auth::user()->address }}</h6>

                    <small class="text-muted p-t-30 db">Website</small>
                    <h6><a href="{{ Auth::user()->website }}" target="_blank"> {{ Auth::user()->website }} </a></h6>
                    
                    <small class="text-muted p-t-30 db">Social Profile</small>
                    <br/>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> 
                        <a class="nav-link {{($tab == 'profile' || empty($tab))? 'active' : ''}}" data-toggle="tab" href="#profile" role="tab">Profile</a> 
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link {{($tab == 'settings')? 'active' : ''}}" data-toggle="tab" href="#settings" role="tab">Settings</a> 
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link {{($tab == 'ratings')? 'active' : ''}}" data-toggle="tab" href="#ratings" role="tab">Ratings/Reviews</a> 
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link {{($tab == 'security')? 'active' : ''}}" data-toggle="tab" href="#security" role="tab">Security Settings</a> 
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!--profile tab-->
                    <div class="tab-pane {{($tab == 'profile' || empty($tab))? 'active' : ''}}" id="profile" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> 
                                	<strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">{{ Auth::user()->getFullname() }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Usename</strong>
                                    <br>
                                    <p class="text-muted">{{ Auth::user()->username }}</p>
                                </div>
                                <div class="col-md-4 col-xs-6"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <p class="m-t-30">
                            	{{ Auth::user()->about }}

                            </p>

                            <h4 class="font-medium m-t-30">Skills</h4>
                            <hr>

                            @if( Auth::user()->isChef())
	                            <h5 class="m-t-30">Chef <span class="pull-right">{{$rating->value/5 * 100}}% rating</span></h5>
	                            <div class="progress">
	                                <div 
                                        class="progress-bar bg-success" 
                                        role="progressbar" 
                                        aria-valuenow="{{$rating->value/5 * 100}}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100" 
                                        style="width:{{$rating->value/5 * 100}}%; height:6px;"> 
                                            <span class="sr-only">{{$rating->value/5 * 100}}% rating</span> 
                                    </div>
	                            </div>
                            @endif

                        </div>
                    </div>
                    <!--settings tab-->
                    <div class="tab-pane {{($tab == 'settings')? 'active' : ''}}" id="settings" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material" method="post" action="{{url('caterer/profile')}}">
                                @csrf
                            	<h3 class="pl-2">Profile Settings</h3>
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="first_name"value="{{ Auth::user()->first_name }}" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" name="username" class="form-control form-control-line" value="{{ Auth::user()->username }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" class="form-control form-control-line" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="phone" placeholder="phone" value="{{ Auth::user()->phone }}" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Date of Birth</label>
                                    <div class="col-md-12">
                                        <input type="text" name="birthday" placeholder="Birth Date" value="{{ Auth::user()->birthday }}" class="form-control form-control-line datepicker">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">About</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" name="about" class="form-control form-control-line">{{Auth::user()->about}}</textarea>
                                    </div>
                                </div>

                                <h3 class="pl-2">Address Settings</h3>
                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <textarea rows="2" name="address" class="form-control form-control-line">{{Auth::user()->address}}</textarea>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="col-md-12">City</label>
                                    <div class="col-md-12">
                                        <input type="text-center" name="city" value="{{Auth::user()->city}}" class="form-control form-control-line">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select name="country" class="form-control form-control-line">
                                            <option value="nigeria" selected>Nigeria</option>
                                        </select>
                                    </div>
                                </div>

                                <h3 class="pl-2">Others </h3>

                                <div class="form-group">
                                    <label class="col-md-12">Website</label>
                                    <div class="col-md-12">
                                        <input type="text-center" name="website" value="{{Auth::user()->website}}" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Facebook URL</label>
                                    <div class="col-md-12">
                                        <input type="text-center" name="facebook_url" value="{{Auth::user()->facebook_url}}" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Website</label>
                                    <div class="col-md-12">
                                        <input type="text-center" name="twitter_url" value="{{Auth::user()->twitter_url}}" class="form-control form-control-line">
                                    </div>
                                </div>

                                
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--ratings tab-->
                    <div class="tab-pane {{($tab == 'ratings')? 'active' : ''}}" id="ratings" role="tabpanel">
                        <div class="card-body">
                            
                            <div class="rating-display mt-3">
                                <h1 class="font-medium d-inline-block mr-2">{{ number_format($rating->value,1)}}</h1>

                                <div class="d-inline-block pb-2">
                                    @component('components.rating_stars', ['value' => $rating->value])@endcomponent
                                    <span>{{$rating->cnt}}&nbsp;<i class="fa fa-user"></i></span>
                                </div>
                                
                            </div>
                            

                            <h4 class="font-medium m-t-30">Reviews</h4>
                            <hr>


                            <div class="comment-widgets m-b-20">

                                @foreach($reviews as $review)
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row p-1">
                                        <div class="p-2">
                                            <span class="round">
                                                <img src="{{  @$review->user->imagePath() }}" alt="user" width="50">
                                            </span>
                                        </div>
                                        <div class="comment-text w-100">
                                            <div class="dropdown float-right">
                                                <a href="JavaScript:void(0)" class="icon-options-vertical link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Spam</a>
                                                </div>
                                            </div>

                                            <h5>{{  @$review->user->getFullname() }}</h5>
                                            <div class="">
                                                @component('components.rating_stars', [
                                                    'value' => $review->rating, 
                                                    'class' => 'd-inline-block mr-2'
                                                ])@endcomponent
                                                <span class="date">{{ date("M d, Y", strtotime($review->updated_at) ) }}</span>
                                            </div>
                                            <p class="m-b-5 m-t-10">{{$review->review}}</p>
                                        </div>
                                        
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <!-- security tab -->
                    <div class="tab-pane {{($tab == 'security')? 'active' : ''}}" id="security" role="tabpanel">
                        <div class="card-body">
                            
                            <form class="form-horizontal form-material">
                                
                                <h3 class="pl-2">Security Settings</h3>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line">
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="col-md-12"> Confirm Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line">
                                    </div>
                                </div>

                                <h3 class="pl-2">Social Auth</h3>
                                <div class="pl-2">
                                    <div class="mb-3">
                                        <a href="#" class="">
                                            <a class="btn btn-outline-secondary btn-circle"><i class="fa fa-facebook"></i> </a>
                                            <span>Connect Facebook </span>
                                        </a>
                                    </div>

                                    <div class="mb-3">
                                        <a href="#" class="">
                                            <a class="btn btn-outline-secondary btn-circle"><i class="fa fa-twitter"></i> </a>
                                            <span>Connect Twitter </span>
                                        </a>
                                    </div>

                                    <div class="mb-3">
                                        <a href="#" class="">
                                            <a class="btn btn-outline-secondary btn-circle"><i class="fa fa-google-plus"></i> </a>
                                            <span>Connect Google </span>
                                        </a>
                                    </div>
                                </div>

                                <br /><br />
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" disabled="disabled">Save</button>
                                    </div>
                                </div>


                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
@endsection
