@php
    $themeConfig['body_classes'] = 'page-event-caterer page-cover';

@endphp

@extends('caterer.layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	
    @component('caterer.components.breadcrumb', [
        'title' => 'Cover Letter', 
        'crumbs' => [],
    ])@endcomponent

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body p-0">
                    <div class="card-hd-bg p-3">
                        <div class="float-right text-light">
                            <a class="btn" data-toggle="modal" data-target="#coverModal">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>
                        <div class="d-flex flex-column justify-content-center p-2 h-100">
                            <h6 class="text-light">Chef's Cover</h6>
                            <div class="title-underline">
                                <h1 class="text-capitalize">{{Auth::user()->getFullName()}}</h1>
                            </div>

                            <div class="cover-img">
                                <img src="{{  Auth::user()->imagePath() }}" class="img-thumbnail" alt="user">
                            </div>
                        </div>
                    </div>

                    <div class="p-3">

                        

                        @if(empty($event_caterer->cover))
                            <p class="text-center">
                                <img src="{{ asset('images/empty-white-box.png') }}" width="200">
                                
                                <h3 class="text-center">
                                    <span>You have nothing yet written </span> 
                                    <a href="#" class="btn"  data-toggle="modal" data-target="#coverModal"> Add cover </a>
                                </h3>


                                
                            </p>
                        @else

                            <h1 class="mt-3 text-primary">ABOUT ME!</h1>

                            <p>{!!$event_caterer->cover!!}</p>
                        @endif


                        <hr />


                        <div class="mb-3 cover-share">

                            <a href="#" class="btn btn-circle btn-secondary float-right">
                                <i class="fa fa-facebook">&nbsp;</i>
                            </a>

                            <a href="#" class="btn btn-circle btn-secondary float-right">
                                <i class="fa fa-whatsapp"></i>
                            </a>

                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            @include('caterer.event_caterer._aside')
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>


<!-- Modal -->
<div class="modal fade" id="coverModal" tabindex="-1" role="dialog" aria-labelledby="coverModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
             <form class="form-horizontal form-material" method="post" action="{{url('caterer/event-caterer/cover')}}">
                @csrf
                <input type="hidden" name="id" value="{{$event_caterer->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter your Bio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea name="cover" class="ckeditor">{{@$event_caterer->cover}}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
