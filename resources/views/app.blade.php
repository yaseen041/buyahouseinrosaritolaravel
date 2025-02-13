<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.jpg') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
<<<<<<< HEAD
=======
	{{-- <title>{{ get_section_content('project', 'site_title') }} </title> --}}
	<!-- Default Meta Tags (if not set in child views) -->
	<title>@yield('meta_title', get_section_content('project', 'site_title'))</title>
	<meta name="description" content="@yield('meta_description')">
	<meta name="keywords" content="@yield('meta_keywords')">

	<!-- Open Graph / Facebook Meta Tags -->
	<meta property="og:type" content="website">
	<meta property="og:title" content="@yield('fb_title')">
	<meta property="og:description" content="@yield('fb_description')">
	<meta property="og:image" content="@yield('fb_image')">

	<!-- Twitter Meta Tags -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="@yield('twitter_title')">
	<meta name="twitter:description" content="@yield('twitter_description')">
	<meta name="twitter:image" content="@yield('twitter_image')">

	<!-- JSON-LD Structured Data -->
	<script>
		@yield('json_ld_code')
	</script>
>>>>>>> bc9d2d86f5ad5ab0596cd6bafbef7366edf66f15

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