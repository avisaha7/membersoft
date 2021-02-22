<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ config('app.name', 'BIBS') }}</title>

        <!-- Scripts -->
<!--        <link rel="icon" href="favicon.ico" type="image/x-icon">-->

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{asset('assets/backend/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

 
        <!-- Custom Css -->
        <link href="{{asset('assets/backend/css/style.css')}}" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="{{asset('assets/backend/css/themes/all-themes.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


        @stack('css')
    </head>
    <body class="theme-red">

        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
       
        @include('layouts.backend.partial.topbar')
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            @include('layouts.backend.partial.sidebar')
            <!-- #END# Left Sidebar -->
            <!-- Right Sidebar -->

            <!-- #END# Right Sidebar -->
        </section>

        <section class="content">
            @yield('content')
        </section>
<script src="{{asset('assets/backend/js/jquery-3.5.0.min.js')}}"></script>
<script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#price, #qty").keyup(function(){

    	var total=0;    	
    	var x = Number($("#price").val());
    	var y = Number($("#qty").val());
    	var total=x * y;  

    	$('#total').val(total);

    });
});
</script>
<script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#price2, #qty2").keyup(function(){

    	var total=0;    	
    	var x = Number($("#price2").val());
    	var y = Number($("#qty2").val());
    	var total=x * y;  

    	$('#total').val(total);

    });
});
</script>
        <script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.js')}}"></script>

        <!-- Select Plugin Js -->
        <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="{{asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{asset('assets/backend/plugins/node-waves/waves.js')}}"></script><!--
        -->
       
       
        <!-- Custom Js -->
        <script src="{{asset('assets/backend/js/admin.js')}}"></script>


        <!-- Demo Js -->
        <script src="{{asset('assets/backend/js/demo.js')}}"></script>


        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <script>
            @if($errors->any())
                @foreach($errors->all() as $error)
            toastr.error('{{ $error }}','Error',{
                closeButton:true,
                progressBar:true,
            });
            @endforeach
            @endif
        </script>
       
        @stack('js')
    </body>
</html>
