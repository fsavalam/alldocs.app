@php
$open_graph = [
	'name' => config('app.name'),
	'description' => config('app.description'),
	'url' => Request::fullUrl(),
	'image' => manifest('assets/images/opengraph.png', true),
];
@endphp

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="format-detection" content="telephone=no">

<title>@yield('page_title', config('app.description') . ' – ' . config('app.name'))</title>
<meta name="description" content="{{ $open_graph['description'] }}">

@if (manifest('app.css'))
	<link rel="stylesheet" type="text/css" href="{{ manifest('app.css') }}">
@endif

<meta property="og:title" content="@yield('page_title', $open_graph['name'])">
<meta property="og:description" content="{{ $open_graph['description'] }}">
<meta property="og:url" content="{{ $open_graph['url'] }}">
<meta property="og:image" content="{{ $open_graph['image'] }}">
<meta property="og:site_name" content="@yield('page_title', $open_graph['name'])">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $open_graph['url'] }}">
<meta name="twitter:title" content="@yield('page_title', $open_graph['name'])">
<meta name="twitter:description" content="{{ $open_graph['description'] }}">
<meta name="twitter:image" content="{{ $open_graph['image'] }}">

<link href="https://alldocs.app/favicon.ico" rel="shortcut icon" type="image/x-icon" >

<script>
	window.app = {!! collect([
		'csrfToken' => csrf_token(),
		'environment' => config('app.env'),
		'debug' => config('app.debug'),
	]) !!}
</script>

@stack('head')
