<?php
	$pageTitle = 'Reccap - '.Auth::user()->userName;
?>
@extends('layouts.default')

@section('heading')
	Dashboard
@stop

@section('content')
	@if ( Auth::user()->userGroup == 'Administrator' )
		This is some admin content
	@elseif ( Auth::user()->userGroup == 'Contributor' )
		This is some contributor content
	@elseif ( Auth::user()->userGroup == 'Root' )
       	<li>
			<p>You are a super user :)</p>
	   	</li>
	@else
		<p>Please note that your administrator has not set your permissions. Please request him/her to set your permissions so that you may be able to use the application.</p>
	@endif
@stop