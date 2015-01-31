<?php
	$pageTitle = 'Reccap - '.Auth::user()->userName;
	print_r($validationRules);
	//die();
?>
@extends('layouts.default')

@section('earlyJS')
	{{ HTML::script('js/earlyJS.js') }}
@stop

@section('heading')
	{{{ $title }}}
@stop

@section('content')
	<h4><pre>Description	: {{{ $description }}}</pre></h4>
	<h4><pre>Author 		: {{ $author }}</pre></h4>
	@if ( $status != 'Closed' )
		<h4><pre>Close Date 	: {{ $closeDate }}</pre></h4>
	@else
		<h4><pre>Status 		: Closed</pre></h4>
	@endif
	@if ( $status != 'Closed' )
		<script type="text/javascript">
			alert("starting...");
			alert({{ String($validationRules) }});
			prepareValidation($validationRules);
		</script>
		{{ Form::open(array('id' => 'addDataToSheet', 'onsubmit' => 'return validateForm()', 'url' => 'spreadsheet/update', 'role' => 'form')) }}
			<div>
				<h3>Input Details below</h3>
				@foreach ( $validationRules as $rule )
					<div class="form-group">
						{{ Form::text('fieldName', $val = null, $attributes = array('placeholder' => $rule[0], 'class' => 'form-control')) }}
					</div>	
					<input type="hidden" value={{ $rule[2] }}>
				@endforeach
				{{ Form::button('Submit', array('id' => 'submitSpreadsheetUpdate', 'class' => 'btn btn-default')) }}
			</div>
		{{ Form::close() }}
	@else
		<h4>This sheet has been closed for modifications by {{ $author }}.</h4>
	@endif
@stop