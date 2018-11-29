@php
    $themeConfig['body_classes'] = 'no-sidebar';
    $themeConfig['show_header_nav'] = $themeConfig['show_sidebar'] = false;
@endphp

@extends('caterer.layouts.app')

@section('content')

<style type="text/css">
    .cat-option{
        height: 250px;
        padding: 0;
        -webkit-transition: 0.2s ease-in;
        -o-transition: 0.2s ease-in;
        transition: 0.2s ease-in;
        cursor: pointer;
    } 

    .cat-option:hover, .cat-option.selected{
        -webkit-box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
        box-shadow: 0 14px 26px -12px rgba(116, 96, 238, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(116, 96, 238, 0.2);
        border: 1px solid #6772e5;
    }  

    .cat-option.selected{
        /*height: 300px;
        position: absolute;
        width: calc(100% - 30px);*/

        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
    }

    .cat-option.selected:after{
        content: "\f00c";
        color: #fff;
        display: inline-block;
        position: absolute;
        right: 20px;
        bottom: 15px;
        border-radius: 50%;
        line-height: 34px;
        font-size: 34px;
        padding: 5px;
        background-color: #24d2b5;
        border: 5px solid #daf9f4ff;
        font-family: FontAwesome;
    } 

    .cat-option .card-img-overlay{
        color: #fff !important;
        background-color: rgba(0,0,0,.4);
    }

    .cat-option .card-img{
        background-size: cover;
        background-size: 90%;
        background-repeat: no-repeat;
        background-position: 0px 10px;
        -webkit-transition: 0.2s ease-in;
        -o-transition: 0.2s ease-in;
        transition: 0.2s ease-in;
    } 

    .cat-option.selected .card-img{
        background-position: 30px 10px;
    } 
</style>


<br />

<div class="container pt-5">

    <div>
        <h1 class="text-capitalize">Welcome {{ Auth::user()->username }}!</h1>
        <h5>To continue select your field, you can always change it later</h5>
    </div>

    <div class="row mt-5 justify-content-center position-relative">
        <div class="col-md-4">
            <div class="card cat-option selected" data-value="chef">
                <div class="card-img h-100" style="background-image:url({{ asset('images/caterer/card-img-chef.jpg') }});"></div>
                <div class="card-img-overlay d-flex flex-column justify-content-center">
                    <h2 class="card-title text-light">Chef</h2>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card cat-option" data-value="event_caterer">
                <div class="card-img h-100" style="background-image:url({{ asset('images/caterer/card-img-event_caterer.jpg') }});"></div>
                <div class="card-img-overlay d-flex flex-column justify-content-center">
                    <h5 class="card-title">Event Caterer</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card cat-option" data-value="vendor">
                <div class="card-img h-100" style="background-image:url({{ asset('images/caterer/card-img-vendor.jpg') }});"></div>
                <div class="card-img-overlay d-flex flex-column justify-content-center">
                    <h5 class="card-title">Vendor</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <br />

    <form method="GET" action="{{ url('caterer/add-category') }}" class="form-horizontal form-material">
        @csrf

        <input type="hidden" id="cat-value" name="selected_category" value="chef">
        <div class="mt-5 pr-2">
            <button 
                type="submit" 
                id="cat-selected-btn" 
                class="btn btn-primary btn-lg pull-right">
                Continue 
                <i class="fa fa-angle-right"> </i> 
            </button>
            <br />
        </div>
    </form>
</div>

@endsection
