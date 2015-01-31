@extends('layouts.default')

@section('heading')
	<h1 class="page-header">Dashboard</h1>
@stop

@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
   		<div class="row placeholders">
   			<p>Month : </p>
   			<p>Date Created : </p>
   			<p>Last Update : </p>
   			<p>Due Date : </p>
   		</div>
   		<h2 class="sub-header">Recon Name</h2>
   		<div class="table-responsive">
   			<table class="table table-striped">
	 			<thead>
	 				@foreach()
	 					<!--Display Column Heading-->
	 				@endfor
	 			</thead>
	 			<tbody>
	 				@foreach()
	 					<!--Display Table data (i.e. table rows)-->
	 					<tr>
	 						<td></td>
	 						<td></td>
	 					</tr>
	 				@endfor
	  				<tr>
	  					<th>#</th>
	  					<th>Header</th>
	  					<th>Header</th>
	  					<th>Header</th>
	  					<th>Header</th>
	  				</tr>
	  			</tbody>
	  		</table>
	  	</div>
	</div>
@stop