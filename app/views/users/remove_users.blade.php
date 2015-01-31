<?php
	$pageTitle = 'Reccap - '.Auth::user()->userName;
?>
@extends('layouts.default')

@section('heading')
	Remove users
@stop

@section('content')
	@if( !empty($users) )
		@foreach( $users as $user )
			<p>A user:{{ $user->Name }}</p>
		@endforeach
	@else
		<p>You currently have no users you administer.</p>
	@endif
@stop