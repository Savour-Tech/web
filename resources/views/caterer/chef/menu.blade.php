@php
    $themeConfig['body_classes'] = 'page-profile';

@endphp

@extends('caterer.layouts.app')

@section('content')
<style type="text/css">
    .bootstrap-tagsinput{
        width: 100%;
    }
</style>

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex no-block">
                        <div>
                            <h4 class="card-title"><span class="lstick"></span>Chef's Menu</h4>
                        </div>
                        <div class="ml-auto">
                            
                            <form class="form-material">
                                <div class="row">
                                    <input type="text" class="form-control d-inline-block">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="m-t-20 no-wrap">
                        <div class="border-bottom">
                            <h3 class="text-capitalize">Agoyin</h3>
                            <p class="pb-1 mb-1">Ceps, Aged parmesan, Alba Truffle</p>
                            <div class="pb-4">
                                <div class="d-inline-block mr-2">
                                    <i class="fa fa-clock-o"></i> <span>2 hrs</span>
                                </div>
                                <div class="d-inline-block mr-2">
                                    <i class="fa fa-cutlery"></i> <span>2 servings</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 border-bottom">
                            <div class="dropdown float-right">
                                <a href="JavaScript:void(0)" class="icon-options-vertical link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>

                            <h3 class="text-capitalize">Amala</h3>
                            <p class="pb-1 mb-1">Ceps, Aged parmesan, Alba Truffle</p>
                            <div class="pb-4">
                                <div class="d-inline-block mr-2">
                                    <i class="fa fa-clock-o"></i> <span>2 hrs</span>
                                </div>
                                <div class="d-inline-block mr-2">
                                    <i class="fa fa-cutlery"></i> <span>2 servings</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @foreach($chef->menus as $menu)

            @endforeach
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body bg-primary d-flex flex-column justify-content-center" style="min-height: 200px;">
                    <h1 class="text-center">
                        <a href="#" class="text-light"  data-toggle="modal" data-target="#add-menu-modal">Add New Menu</a>
                    </h1>
                </div>
            </div>


            <div class="card">
                <div class="card-body bg-secondary d-flex flex-column justify-content-center" style="min-height: 400px;">
                    <h1 class="text-center">
                        <a href="#" class="text-light"  data-toggle="modal" data-target="#add-menu-modal">Place advert here</a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>


<!-- Modal -->
<div class="modal fade" id="add-menu-modal" tabindex="-1" role="dialog" aria-labelledby="add-menu-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
             <form class="form-horizontal form-material" method="post" action="{{url('caterer/chef/menu')}}" onkeypress="return event.keyCode != 13;">
                @csrf
                <input type="hidden" name="id" value="{{$chef->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12">Meal Name</label>
                        <div class="col-md-12">
                            <input type="text" name="name"value="{{ $model->name }}" class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Description</label>
                        <div class="col-md-12">
                            <input type="text" name="description"value="{{ $model->description }}" class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Ingredents</label>
                        <div class="col-md-12">
                            <input type="text" name="ingredients" value="{{ $model->ingredients }}" class="form-control form-control-line w-100" data-role="tagsinput">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label class="col-md-12">Cook time (minutes)</label>
                            <div class="col-md-12">
                                <input type="number" name="cook_time"value="{{ $model->cook_time }}" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label class="col-md-12">Servings</label>
                            <div class="col-md-12">
                                <input type="text" name="servings"value="{{ $model->servings }}" class="form-control form-control-line">
                            </div>
                        </div>
                    </div>

                    <div class="float-right pb-4">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                    <br />

                </div>
                    
            </form>
        </div>
    </div>
</div>
@endsection
