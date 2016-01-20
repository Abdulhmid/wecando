@extends('frontend')

@section('style')
<style type="text/css">
    /* centered columns styles */
    .row-centered {
        text-align:center;
    }
    .col-centered {
        display:inline-block;
        float:none;
        /* reset the text-align */
        text-align:center;
        /* inline-block space fix */
        margin-right:-4px;
    }
</style>
@stop

@section('content')
    <!-- Slider -->
    @include('partial.slider')
    <!--/#home-slider-->
    <hr/>
    <!-- Services -->
    @include('partial.services')
    <!--/#services-->

    <hr/>
    <!-- Actions -->
    @include('partial.actions')
    <!--/#action-->

    <hr/>
    <!-- Features -->
    @include('partial.features')
    <!--/#features-->
    <hr/>
    <!-- Clients -->
    @include('partial.partners')
    <!--/#clients-->
    
@stop

@section('script')

@stop
