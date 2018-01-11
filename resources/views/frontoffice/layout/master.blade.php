<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Roopcom Cargo - Service & More</title>

    <!-- Bootstrap -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('/css/animate.css')}}">
	<link href="{{url('css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{url('css/style.css')}}" rel="stylesheet" />
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="{{url('js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>
	<script src="{{url('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{url('js/jquery.isotope.min.js')}}"></script>
	<script src="{{url('js/wow.min.js')}}"></script>
	<script>
		$.ajaxSetup({
    		headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	</script>
  </head>
  <body>

    @include('frontoffice.layout.header')
    @section('content')
    @show
    @include('frontoffice.layout.footer')
</body>
</html>
