@php
    $themeConfig['body_classes'] = 'page-chef page-menu';

@endphp

@extends('caterer.layouts.app')

@section('content')

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	

    @component('caterer.components.breadcrumb', [
        'title' => 'Menu', 
        'crumbs' => [],
    ])@endcomponent

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
                            <a href="{{url('caterer/chef/menu/create')}}">
                                <i class="fa fa-plus"></i>
                                Add New Menu
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive m-t-20">
                        <table class="table vm no-th-brd g-data-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Cook Time(minutes)</th>
                                    <th>Servings</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($chef->menus as $menu)
                                    <tr>
                                        <td>{{$menu->name}}</td>
                                        <td>{{$menu->cook_time}}</td>
                                        <td>{{$menu->servings}}</td>
                                        <td>{{$menu->created_at}}</td>
                                        <td>
                                            <a href="{{ url('caterer/chef/menu/update/'.$menu->id) }}" class="p-1">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ url('caterer/chef/menu/delete/'.$menu->id) }}" class="p-1 action-confirm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            

        </div>

        <div class="col-md-3">
            @include('caterer.chef._aside')
        </div>
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>



@endsection
