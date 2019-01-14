@php
    $themeConfig['body_classes'] = 'page-chef page-portfolio';

@endphp

@extends('caterer.layouts.app')

@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	

    @component('caterer.components.breadcrumb', [
        'title' => 'Update Portfolio', 
        'crumbs' => [
            'Portfolio' => url('caterer/chef/portfolio')
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
                    <h4 class="card-title">Update Portfolio</h4>
                    <h6 class="card-subtitle">lorem ipsium valor et dolor merius etim</h6>
                    <hr />
                    <form class="form-material m-t-40" method="post" action="{{url('caterer/chef/portfolio/update', ['id' => $model->id])}}" enctype="multipart/form-data" onkeypress="return event.keyCode != 13;">
                        @csrf
                        
                        @component('caterer.chef.components.menu_input', ['text' => 'Title', 'field' => 'title', 'model' => $model, 'errors' => $errors])@endcomponent

                        @component('caterer.chef.components.menu_input', ['text' => 'Description', 'field' => 'description', 'model' => $model, 'errors' => $errors])@endcomponent

                        <div class="form-group">
                            <label class="col-md-12">Tags</label>
                            <div class="col-md-12">
                                <input type="text" name="tags" value="{{ $model->tags }}" class="form-control form-control-line w-100" data-role="tagsinput">
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
