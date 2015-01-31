<?php
	$pageTitle = 'Reccap - '.Auth::user()->userName;
?>
@extends('layouts.default')

@section('heading')
	Users you are currently administrating
@stop

@section('content')
	@if( !empty($users) )
		<table class="table table-bordered table-hover table-striped">
        	<thead>
            	<tr>
                	<th>First Name</th>
                	<th>Last Name</th>
                    <th>Administrator</th>
                    <th>User Group</th>
                    <th>Date Created</th>
                </tr>
           	</thead>
            <tbody>
            	@foreach ( $users as $user )
            		<tr>
            			@if ( $user->userGroup == 'Administrator' )
            				<td>{{ HTML::link('users/view/'.$user->userName.'/?fN=Vw&uG=Adm', $user->firstName) }}</td>
            			@elseif ( $user->userGroup == 'Contributor' )
            				<td>{{ HTML::link('users/view/'.$user->userName.'/?fN=Vw&uG=Cbt', $user->firstName) }}</td>
            			@elseif ( $user->userGroup == 'Root' )
            				<td>{{ HTML::link('users/view/'.$user->userName.'/fN=Vw&uG=Rt', $user->firstName) }}</td>
            			@else
            				<td>{{ $user->firstName }}</td>
            			@endif
						<td>{{{ $user->lastName }}}</td>
						@if ( $user->root != null )
							<td>{{{ $user->root->firstName }}}</td>
						@else
							<td>{{{ $user->administrator->firstName }}}</td>
						@endif
						<td>{{ $user->userGroup }}</td>
						<td>{{{ $user->created_at }}}</td>
					</tr>
				@endforeach
            </tbody>
        </table>
	@else
		<p>You currently have no users you administer.</p>
	@endif
@stop