<?php
	$pageTitle = 'Reccap - '.Auth::user()->userName;
?>
@extends('layouts.default')

@section('heading')
	Add new users
@stop

@section('content')
	@if ( Auth::user()->userGroup == 'Root' )
		<div>
			{{ Form::open(array('url' => 'users/add', 'role' => 'form')) }}
				<div>
					<div class="form-group">
						{{ Form::label('firstName', 'First Name', array('for' => 'email')) }}
						{{ Form::text('firstName', $val = null, $attributes = array('placeholder' => 'First Name', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('lastName', 'Last Name') }}
						{{ Form::text('lastName', $val = null, $attributes = array('placeholder' => 'Last Name', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('email', 'Email') }}
						{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('userName', 'Username') }}
						{{ Form::text('userName', $val = null, $attributes = array('placeholder' => 'Username', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Password') }}
						{{ Form::password('password', array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('userGroup', 'User Group (Permissions)') }}
						{{ Form::select('userGroup', $userGroupList, null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('admin', 'Responsible Administrator (only neccessary if adding a contributor)') }}
						{{ Form::select('admin', $adminList, null, array('class' => 'form-control')) }}
					</div>
					<p>{{ Form::submit('Add User', array('class' => 'btn btn-default')) }}</p>
				</div>
			{{ Form::close() }}
		</div>
	@elseif ( Auth::user()->userGroup == 'Administrator' )
		<div>
			{{ Form::open(array('url' => 'users/add', 'role' => 'form')) }}
				<div>
					<div class="form-group">
						{{ Form::label('firstName', 'First Name', array('for' => 'email')) }}
						{{ Form::text('firstName', $val = null, $attributes = array('placeholder' => 'First Name', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('lastName', 'Last Name') }}
						{{ Form::text('lastName', $val = null, $attributes = array('placeholder' => 'Last Name', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('email', 'Email') }}
						{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('userName', 'Username') }}
						{{ Form::text('userName', $val = null, $attributes = array('placeholder' => 'Username', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Password') }}
						{{ Form::password('password', array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('userGroup', 'User Group (Permissions)') }}
						{{ Form::select('userGroup', $userGroupList, null, array('class' => 'form-control')) }}
					</div>
					<p>{{ Form::submit('Add User', array('class' => 'btn btn-default')) }}</p>
				</div>
			{{ Form::close() }}
		</div>
	@else
		<p>You do not have the neccesarry permission to perform this task. If you believe this is in error, please contact you administrator.</p>
	@endif
@stop