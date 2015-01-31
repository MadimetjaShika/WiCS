@extends('layouts.default')

@section('heading')
	<h1 class="page-header">Available Content</h1>
@stop

@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
   		<h1 class="page-header">{{ $reconListHeading }}</h1>
   		<ul>
   			@foreach()
   				<li></li>
   			@endfor
   		</ul>
   	</div>
@stop