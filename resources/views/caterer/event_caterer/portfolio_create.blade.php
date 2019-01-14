@php
    $themeConfig['body_classes'] = 'page-event-caterer page-portfolio';

@endphp

@extends('caterer.layouts.app')

@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	

    @component('caterer.components.breadcrumb', [
        'title' => 'Create Portfolio', 
        'crumbs' => [
            'Portfolio' => url('caterer/event-caterer/portfolio')
        ],
    ])@endcomponent

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    

    <div class="row">
        <div class="col-md-12">
            <div class="card">
        
                <div class="card-body">
                    <h4 class="card-title">Add new Portfolio</h4>
                    <h6 class="card-subtitle">lorem ipsium valor et dolor merius etim</h6>
                    <hr />
                    <form class="form-material m-t-40" method="post" action="{{url('caterer/event-caterer/portfolio/create')}}" enctype="multipart/form-data" onkeypress="return event.keyCode != 13;">
                        @csrf
                        <input type="hidden" name="id" value="{{$event_caterer->id}}">


                        <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
                            <label class="col-md-12">Title</label>
                            <div class="col-md-12">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-line">

                                @if ($errors->has('title'))
                                    <div class="form-control-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <input type="text" name="description" value="{{ old('description') }}" class="form-control form-control-line">

                                @if ($errors->has('description'))
                                    <div class="form-control-feedback">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tags</label>
                            <div class="col-md-12">
                                <input type="text" name="tags" value="{{ old('tags') }}" class="form-control form-control-line w-100" data-role="tagsinput">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>File upload</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> 
                                        <i class="fa fa-file fileinput-exists"></i> 
                                        <span class="fileinput-filename"></span>
                                    </div> 
                                    <span class="input-group-addon btn btn-default btn-file"> 
                                        <span class="fileinput-new">Select file</span> 
                                        <span class="fileinput-exists">Change</span>

                                        <input type="hidden">
                                        <input type="file" name="image"> 
                                    </span> 
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                </div>
                            </div>
                        </div>

                        <div class="float-right pb-4">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>



@endsection
