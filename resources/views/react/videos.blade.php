@extends('adminlte::page')
@section('title', 'Videos')
@section('content_header')
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Videos</title>
@stop
@section('content_top_nav_right')
	<div id="TopNavDiv"></div>
@stop
@section('content')
	<div className="container" id="video"></div>
	
@stop
@section('css')
@stop
@section('js')
	@viteReactRefresh
	@vite('resources/js/app.js')
@stop