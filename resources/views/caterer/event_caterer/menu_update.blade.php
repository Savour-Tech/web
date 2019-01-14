@php
    $themeConfig['body_classes'] = 'page-event-caterer page-menu';

@endphp

@extends('caterer.layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    
    @component('caterer.components.breadcrumb', [
        'title' => 'Edit Menu', 
        'crumbs' => [
            'Menu' => url('caterer/event-caterer/menu')
        ],
    ])@endcomponent
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <div class="col-md-9">

            <div class="card">
        
                <div class="card-body">
                    <h4 class="card-title">Edit Menu</h4>
                    <h6 class="card-subtitle">lorem ipsium valor et dolor merius etim</h6>
                    <hr />
                    <form class="form-material m-t-40" method="post" action="{{url('caterer/event-caterer/menu/update/'.$model->id)}}" onkeypress="return event.keyCode != 13;">
                        @csrf

                        @component('caterer.event_caterer.components.menu_input', ['text' => 'Meal Name', 'field' => 'name', 'model' => $model, 'errors' => $errors])@endcomponent

                        @component('caterer.event_caterer.components.menu_input', ['text' => 'Description', 'field' => 'description', 'model' => $model, 'errors' => $errors])@endcomponent

                        <div class="form-group">
                            <label class="col-md-12">Ingredents</label>
                            <div class="col-md-12">
                                <input type="text" name="ingredients" value="{{ $model->ingredients }}" class="form-control form-control-line w-100" data-role="tagsinput">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class="col-md-12">Cook time (minutes)</label>
                                <div class="col-md-12">
                                    <input type="number" name="cook_time" value="{{ $model->cook_time }}" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group col-sm-8">
                                <label class="col-md-12">Servings</label>
                                <div class="col-md-12">
                                    <input type="number" name="servings" value="{{ $model->servings }}" class="form-control form-control-line">
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

        <div class="col-md-3">
            
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>



@endsection
