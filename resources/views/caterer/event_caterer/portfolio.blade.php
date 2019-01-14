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
        'title' => 'Portfolio', 
        'crumbs' => [],
    ])@endcomponent

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    

    <div class="row m-t-40">
        <div class="col-md-12">
            <div class="d-flex no-block">
                <div>
                    <h4 class="card-title">Your Portfolio </h4>
                    <h6 class="card-subtitle m-b-20 text-muted">you can make gallery like this</h6>
                </div>
                <div class="ml-auto">
                    <br />
                    <a href="{{url('caterer/event-caterer/portfolio/create')}}">
                        <i class="fa fa-plus"></i>
                        Add New Portfolio
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if($event_caterer->portfolios()->count() < 1)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Nothing here </h4>
                <h6 class="card-subtitle m-b-20 text-muted">you can add to the galerry by clicking the add button</h6> 
            </div>
        </div>
    @endif

    <div class="card-columns el-element-overlay">

        @foreach($event_caterer->portfolios as $item)

            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <img src="{{  $item->imagePath() }}" alt="user" />

                        <div class="el-overlay">
                            <ul class="el-info">
                                <li>
                                    <a class="btn default btn-outline" href="{{ url('caterer/event-caterer/portfolio/update', ['id' => $item->id]) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn default btn-outline action-confirm" href="{{ url('caterer/event-caterer/portfolio/delete', ['id' => $item->id]) }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">{{$item->title}}</h3> <small>{{$item->description}}</small>
                        <br/> 
                    </div>
                </div>
            </div>
        @endforeach


    </div>


    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>



@endsection
