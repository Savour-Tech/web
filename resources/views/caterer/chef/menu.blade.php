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
                        
                        @forelse($chef->menus as $menu)

                        @empty
                            <h2 class="text-secondary">You have no menu</h2>
                            <p>Click on add menu to add to menu</p>
                        @endforelse
                        
                    </div>
                </div>
            </div>
            

        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body bg-primary d-flex flex-column justify-content-center ad-box">
                    <h1 class="text-center">
                        <a href="{{url('caterer/chef/menu/create')}}" class="text-light">Add New Menu</a>
                    </h1>
                </div>
            </div>


            <div class="card">
                <div class="card-body bg-secondary d-flex flex-column justify-content-center ad-box long">
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



@endsection
