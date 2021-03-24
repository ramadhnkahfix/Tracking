<!DOCTYPE html>
<html>
<head>
	<title>Bea Cukai Kediri</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="Shortcut Icon" type="image/ico" href="{{asset('assets/assets/img/logo_bea_cukai.png')}}">
		<!-- CSS Fontawesome -->
		<link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome/css/all.css')}}">
		<!-- CSS Bootstrap -->
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}" id="bootstrap-css">
		<!-- CSS OwlCarousel -->
		<link rel="stylesheet" href="{{asset('assets/owl-carousel/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('assets/owl-carousel/owl.theme.css')}}">
		<!-- JQuery JS Files -->
		<script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
		<!-- DatePicker -->
		<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    	<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
		@yield ('extracss')
		<!-- google Recaptcha -->
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<style type="text/css">
			body {
	          background-color:  #ffff;
	        }
		</style>
	@include('layouts.includes.topbar')

	@include('layouts.includes.header')

	@include('layouts.includes.navbar')
</head>
<body>		
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					
					@yield('content')

				</div>			
			</div>
		</div>
				
	@include('layouts.includes.footer')

	<!-- Fontawesome JS Files -->
	<script type="text/javascript" src="{{asset('assets/fontawesome/js/all.js')}}"></script>
	<!-- Bootstrap JS Files -->
  	<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
  	<!-- Carousel JS Files -->
  	<script type="text/javascript" src="{{asset('assets/owl-carousel/owl.carousel.min.js')}}"></script>

</body>
</html>