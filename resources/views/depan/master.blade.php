<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>MUSIQUE</title>
 
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('/electro/css/bootstrap.min.css')}}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{asset('/electro/css/slick.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('/electro/css/slick-theme.css')}}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset('/electro/css/nouislider.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('/electro/css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset('/electro/css/style.css')}}"/>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	    <style>
		    .ck-editor__editable {
		      min-height: 250px;
		    }
	    </style>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
@yield('header')
    </head>
	<body>
		<!-- HEADER -->
		@include('depan.includes._header')
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		@include('depan.includes._nav')
		<!-- /NAVIGATION -->
		@yield('content')
		<!-- FOOTER -->
		@include('depan.includes._footer')
		<!-- /FOOTER -->
	</body>
		<!-- jQuery Plugins -->
		<script src="{{asset('/electro/js/jquery.min.js')}}"></script>
		<script src="{{asset('/electro/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('/electro/js/slick.min.js')}}"></script>
		<script src="{{asset('/electro/js/nouislider.min.js')}}"></script>
		<script src="{{asset('/electro/js/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('/electro/js/main.js')}}"></script>
		<script src="{{asset('/adminlte/js/ckeditor.js')}}"></script> 
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 

		<script>
		    @if(Session::has('success'))
		        toastr.success("{{Session::get('success')}}", "Sukses")
		    @endif
		    @if(Session::has('successlama'))
		        toastr.success("{{Session::get('successlama')}}", "Sukses", {timeOut: 18000})
		    @endif
		    @if(Session::has('warning'))
		        toastr.warning("{{Session::get('warning')}}", "Maaf")
		    @endif
		    @if(Session::has('error'))
		        toastr.error("{{Session::get('error')}}", "Error")
		    @endif
		</script>
		@yield('footer')



</html>
