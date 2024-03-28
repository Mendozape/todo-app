@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
	<div id="header"></div>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel 10 - REACT 18</title>
@stop
@section('content_top_nav_right')
	<div id="TopNavDiv"></div>
@stop
@section('content')
	<div id="content"></div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
	@viteReactRefresh
	@vite('resources/js/app.js')
@stop

