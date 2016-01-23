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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#form").submit(function(event) {
              /* stop form from submitting normally */
              event.preventDefault();
              /* get some values from elements on the page: */
              var $form = $( this ),
                  url = $form.attr( 'action' );

              /* Send the data using post */
              var posting = $.post( url, {
                  _token: $('#form > input[name="_token"]').val(),
                  name : $('#name').val(),
                  email  : $('#email').val(),
                  message  : $('#message').val(),
              } );

              /* Alerts the results */
              posting.done(function( data ) {
                $('#form').trigger("reset");
                $(".full-alert").show();
              });
              return false;
            });
        });
    </script>
@stop
