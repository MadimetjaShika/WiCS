<?php
	$pageTitle = 'Reccap - '.Auth::user()->userName;

	Form::macro('datetime', function($id, $placeholder) {
		return '<input type="text" id="'.$id.'" name="'.$id.'" class="form-control" placeholder="'.$placeholder.'"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>';
	});

	$fieldTypes = array(
		'text' => 'text',
		'drop-down' => 'drop-down',
		'number' => 'number',
		'password' => 'password'
	);
?>
@extends('layouts.default')

@section('heading')
	Create New Spreadsheet
@stop

@section('content')
	@if ( Auth::user()->userGroup == 'Root' )
		<p>As a root user, you cannot create sheets.</p>
	@elseif ( Auth::user()->userGroup == 'Administrator' )
		<div>
			{{ Form::open(array('id' => 'createNewSpreadsheetForm', 'url' => 'spreadsheet/create', 'role' => 'form')) }}
				<div>
					<div class="form-group">
						{{ Form::label('title', 'Title') }}
						{{ Form::text('title', $val = null, $attributes = array('placeholder' => 'Spreadsheet Title', 'class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('desription', 'Description') }}
						{{ Form::text('description', $val = null, $attributes = array('placeholder' => 'Spreadsheet Description', 'class' => 'form-control')) }}
					</div>
					<div class="form-group input-group date">
						{{ Form::label('closeDate', 'Close Date') }}
						{{ Form::datetime('closeDate','Pick Sheet Close Date') }}
					</div>
					<div>
						<h3>Add Fields To Spreadsheet</h3>
						<div id="items">
						</div>
						{{ Form::button('Add New Field', array('id' => 'add', 'class' => 'btn btn-default')) }}
						<br/><div id="contributorsDiv">
							<h4>Select Contributors for this list</h4>
							<select multiple class="form-control fieldType" id="contributors[]" name="contributors[]">
								@foreach( $contributors as $contributor )
									<option value={{  $contributor->firstName }} >{{ $contributor->firstName }} {{ $contributor->lastName }}</option>
								@endforeach
	                        </select>
	                        <small>Hold 'ctrl' to select multiple contributors</small>
						</div><br/>
					</div><br/>
					<p>{{ Form::button('Create Spreadsheet', array('id' => 'submitCreateFormButton', 'class' => 'btn btn-default')) }}</p>
				</div>
			{{ Form::close() }}
		</div>
	@else
		<p>You do not have the neccesarry permission to perform this task. If you believe this is in error, please contact you administrator.</p>
	@endif
@stop

@section('scripts')
	{{ HTML::script('js/custom_scripts.js') }}
@stop