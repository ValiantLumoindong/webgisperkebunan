<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>{{ config('app.name') }}</title>
	<!-- mobile responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{url('assetsdepan/img/logo(1).png')}}" type="image/x-icon">

	<link rel="stylesheet" href="{{url('assetsdepan/css/style.css')}}">
	<link rel="stylesheet" href="{{url('assetsdepan/css/responsive.css')}}">

    <!-- Color css -->
    <link rel="stylesheet" href="{{url('assetsdepan/css/skin/color1.css')}}">

	  <!-- Load Leaflet from CDN -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
		 integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
		 crossorigin=""/>
 <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

	  <!-- Load Esri Leaflet from CDN -->
	<script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
		integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
		crossorigin=""></script>

	  <!-- Load Esri Leaflet Geocoder from CDN -->
	<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.0.0/dist/esri-leaflet-geocoder.css"
		integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
		crossorigin="">
	<script src="https://unpkg.com/esri-leaflet-geocoder@3.0.0/dist/esri-leaflet-geocoder.js"
		integrity="sha512-vZbMwAf1/rpBExyV27ey3zAEwxelsO4Nf+mfT7s6VTJPUbYmD2KSuTRXTxOFhIYqhajaBU+X5PuFK1QJ1U9Myg=="
		crossorigin=""></script>	
		<script src='https://unpkg.com/wicg-inert@latest/dist/inert.min.js'></script>
		<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
		<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

	  <style>
		#map { height:500px;, position: absolute; top:0; bottom:0; right:0; left:0; }
	  </style>
	  <style>
		#mapke2 { height:500px;, position: absolute; top:0; bottom:0; right:0; left:0; }
	  </style>     

</head>
<body>


<header class="header header-5 site-header">
    <div class="header-top white-color-bg">
        <div class="container">
            <div class="logo text-center">
                <a href="#" class="navbar-brand">
                    <img src="{{url('assetsdepan/img/logo(2).png')}}" alt="Awesome Image"/>
                </a>
            </div><!-- /.logo -->
            <div class="contact-infos">
                <p><i class="fa fa-phone"></i> &nbsp;&nbsp; Call Us: <span class="black-color-text">+62 895-8063-03151</span></p>
            </div><!-- /.contact-infos -->
            <div class="search-form">
            <form class="search-form" action="{{ route('homepage.carikebun') }}" method="get">
                <input type="text" name="cari" placeholder="Search..." />
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            </div><!-- /.search-form -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->  
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-bar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>               
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-nav-bar">
                
                <ul class="nav navbar-nav navigation-box">
                <li><a href="{{ route ('homepage.home') }}">Home</a></li>
                <li><a href="{{ route ('homepage.kebun') }}">Kebun</a></li>
                <li>
                        <a href="#">Kecamatan</a>
                        <ul class="sub-menu">
                        @forelse ($menukecamatan as $tampilmenukecamatan)							
                            <li><a href="{{ route ('homepage.detailkecamatan',$tampilmenukecamatan->id) }}">{{$tampilmenukecamatan->nama_kecamatan}}</a></li>
                            @empty
                            <li><a href="#">Tidak ada data</a></li>
						   @endforelse                             
                        </ul><!-- /.sub-menu -->
                </li>  
                <li><a href="{{ route ('login') }}">Login</a></li>              
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

</header><!-- /.header -->
