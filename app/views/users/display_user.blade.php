<?php
	$pageTitle = 'Reccap - '.Auth::user()->userName;
?>
@extends('layouts.default')

@section('heading')
	{{{ $user->userName }}}
@stop

@section('content')
	<p>First Name 	:	{{{ $user->firstName }}}</p>
	<p>Last Name 	:	{{{ $user->lastName }}}</p>
	<p>Email 		:	{{{ $user->email }}}</p>
	@if ( $user->userGroup == 'Administrator' )
		<p>Administrator:	{{{ $user->root->firstName }}} {{{ $user->root->lastName }}}</p>
	@else
		<p>Administrator:	{{{ $user->administrator->firstName }}} {{{ $user->administrator->lastName }}}</p>
	@endif
	<p>User Group	:	{{{ $user->userGroup }}} </p>
@stop