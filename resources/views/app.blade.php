<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.jpg') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include('common.styles')
</head>

<body class="int_white_bg inner-pages listing homepage-4 agents hd-white">
	<div id="wrapper" class="int_main_wraapper">
		{{-- @include('common.sidebar') --}}
		@include('common.header')
		<div class="clearfix"></div>

		@yield('content')

		@include('common.footer')

		@include('common.scripts')
	</div>
</body>

</html>