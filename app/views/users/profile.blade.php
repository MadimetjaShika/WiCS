<?php
	$pageTitle = 'Reccap - '.Auth::user()->userName;
?>
@extends('layouts.default')

@section('heading')
	Your profile
@stop

@section('content')
	<p>First Name 	:	{{{ $user->firstName }}}</p>
	<p>Last Name 	:	{{{ $user->lastName }}}</p>
	<p>Email 		:	{{{ $user->email }}}</p>
	@if ( Auth::user()->userGroup == 'Administrator' )
		<p>Administrator:	{{{ $user->super->firstName }}} {{{ $user->super->lastName }}}</p>
	@elseif ( Auth::user()->userGroup == 'Contributor' )
		<p>Administrator:	{{{ $user->administrator->firstName }}} {{{ $user->administrator->lastName }}}</p>
	@endif
	<p>User Group	:	{{{ Auth::user()->userGroup }}} </p>
	<p>{{ HTML::link('password/reset', 'Reset Password') }}</p>
@stop