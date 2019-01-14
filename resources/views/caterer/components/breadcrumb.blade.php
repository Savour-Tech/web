<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">{{$title}}</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
        	<li class="breadcrumb-item">
        		<a href="{{url('')}}">Home</a>
        	</li>
        	@foreach($crumbs as $k => $v)
            
            	<li class="breadcrumb-item">
	            	<a href="{{$v}}">{{$k}}</a>
	            </li>
            
            @endforeach
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
    </div>
    <div class="">
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>