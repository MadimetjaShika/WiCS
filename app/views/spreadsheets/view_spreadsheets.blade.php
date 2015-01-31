<?php
	$pageTitle = 'Reccap - '.Auth::user()->userName;
?>
@extends('layouts.default')

@section('heading')
	Your current spreadsheets
@stop

@section('content')
	@if ( $sheets != null )
		@if ( $userGroup === 'Root' )
			<h3>Sheets currently on the system:</h3>
			@if ( !empty($sheets) )
				<table class="table table-bordered table-hover table-striped">
		        	<thead>
		            	<tr>
		                	<th>Sheet title</th>
		                	<th>Description</th>
		                    <th>Author</th>
		                    <th>Contributors</th>
		                    <th>Date Created</th>
		                    <th>Status</th>
		                </tr>
		           	</thead>
		            <tbody>
		            	@foreach ( $sheets as $sheet )
		            		<tr>
								<td>{{ HTML::link('spreadsheet/view/'.$sheet->title, $sheet->title) }}</td>
								<td>{{{ $sheet->description }}}</td>
								<td>{{ $sheet->author->firstName }}</td>
								<td>
									@foreach ( $sheet->contributor as $contributor )
										{{ HTML::link('users/view/'.$contributor->firstName, $contributor->firstName) }}-{{ HTML::link('spreadsheet/remove', 'remove') }}<br/>
									@endforeach
								</td>
								<td>{{{ $sheet->created_at }}}</td>
								<td>{{{ $sheet->status }}}</td>
							</tr>
						@endforeach
		            </tbody>
		        </table>
			@else
				<p>There are currently no sheets on the system.</p>
			@endif
		@elseif ( $userGroup === 'Administrator' )
			<h3>Sheets you authored:</h3>
			@if ( !empty($sheets[0]) )
				<table class="table table-bordered table-hover table-striped">
		        	<thead>
		            	<tr>
		                	<th>Sheet title</th>
		                	<th>Description</th>
		                    <th>Contributors</th>
		                    <th>Date Created</th>
		                    <th>Status</th>
		                </tr>
		           	</thead>
		            <tbody>
		            	@foreach ( $sheets[0] as $sheet )
		            		<tr>
								<td>{{ HTML::link('spreadsheet/view/'.$sheet->title, $sheet->title) }}</td>
								<td>{{{ $sheet->description }}}</td>
								<td>
									@foreach ( $sheet->contributor as $contributor )
										{{ HTML::link('users/view/'.$contributor->firstName, $contributor->firstName) }}-{{ HTML::link('spreadsheet/remove', 'remove') }}<br/>
									@endforeach
								</td>
								<td>{{{ $sheet->created_at }}}</td>
								<td>{{{ $sheet->status }}}</td>
							</tr>
						@endforeach
		            </tbody>
		        </table>
			@else
				<p>You currently do not have any active sheets that you authored.</p>
			@endif
			<h3>Sheets you are contributing to:<h3>
			@if ( !empty($sheets[1]) )
				<table class="table table-bordered table-hover table-striped">
		        	<thead>
		            	<tr>
		                	<th>Sheet title</th>
		                	<th>Description</th>
		                    <th>Author</th>
		                    <th>Contributors</th>
		                    <th>Date Created</th>
		                    <th>Status</th>
		                </tr>
		           	</thead>
		            <tbody>
		            	@foreach ( $sheets[1] as $sheet )
		            		<tr>
								<td>{{ HTML::link('spreadsheet/view/'.$sheet->title, $sheet->title) }}</td>
								<td>{{{ $sheet->description }}}</td>
								<td>{{ $sheet->author->firstName }}</td>
								<td>
									@foreach ( $sheet->contributor as $contributor )
										{{ HTML::link('users/view/'.$contributor->firstName, $contributor->firstName) }}-{{ HTML::link('spreadsheet/remove', 'remove') }}<br/>
									@endforeach
								</td>
								<td>{{{ $sheet->created_at }}}</td>
								<td>{{{ $sheet->status }}}</td>
							</tr>
						@endforeach
		            </tbody>
		        </table>
			@else
				<p>You currently do not have any active sheets that you contribute to.</p>
			@endif
		@elseif ( $userGroup === 'Contributor' )
			<p>Sheets you are contributing to:</p>
			@if ( !empty($sheets) )
				<table class="table table-bordered table-hover table-striped">
		        	<thead>
		            	<tr>
		                	<th>Sheet title</th>
		                	<th>Description</th>
		                    <th>Author</th>
		                    <th>Date Created</th>
		                    <th>Status</th>
		                </tr>
		           	</thead>
		            <tbody>
		            	@foreach ( $sheets as $sheet )
		            		<tr>
								<td>{{ HTML::link('spreadsheet/view/'.$sheet->title, $sheet->title) }}</td>
								<td>{{{ $sheet->description }}}</td>
								<td>{{{ $sheet->author->firstName }}}</td>
								<td>{{{ $sheet->created_at }}}</td>
								<td>{{{ $sheet->status }}}</td>
							</tr>
						@endforeach
		            </tbody>
		        </table>
			@else
				<p>You currently do not have any active sheets that you contribute to.</p>
			@endif
		@else
			<p>It appears you do not have any permissions set on you profile. Please contact your administrator so that he/she may add you to a user group.</p>
		@endif
	@else
		<p>There are currently no active sheets to view.</p>
	@endif
@stop