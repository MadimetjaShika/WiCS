<!doctype html>
<html>
	<head>
		<title>{{ $pageTitle }}</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/sb-admin.css') }}
		{{ HTML::style('css/plugins/morris.css') }}
		{{ HTML::style('font-awesome/css/font-awesome.min.css') }}
		{{ HTML::style('css/custom.css') }}
		@yield('links')
		@yield('earlyJS')
	</head>
	<body>
		<div id="wrapper">
	        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	            @include('layouts.navigation')
	            @if( Auth::check() )
	            	@include('layouts.tertiaryNavigation')
	            @endif
	        </nav>
	        <div id="page-wrapper">
	        	<div class="container-fluid">
	        		<div class="row">
	                    <div class="col-lg-12">
	                    	@if(Session::has('message'))
	                    		<div class="alert alert-info alert-dismissable">
		                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                            <i class="fa fa-info-circle"></i><strong>Information: </strong>{{ Session::get('message') }}
		                        </div>
					        @endif
					        @if(Session::has('flash_notice'))
					        	<div class="alert alert-info alert-dismissable">
		                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                            {{ Session::get('flash_notice') }}
		                        </div>
					        @endif
					        @if(Session::has('flash_message'))
					        	<div class="alert alert-info alert-dismissable">
		                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                            <i class="fa fa-info-circle"></i><strong>Information: </strong>{{ Session::get('flash_message') }}
		                        </div>
					        @endif
					        @if(Session::has('flash_error'))
					        	<div class="alert alert-info alert-dismissable">
		                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                            <i class="fa fa-info-circle"></i><strong>Error: </strong>{{ Session::get('flash_error') }}
		                        </div>
					        @endif
					        @if(Session::has('errors'))
					            @foreach($errors->all() as $error)
					            	<div class="alert alert-info alert-dismissable">
			                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                            <i class="fa fa-info-circle"></i><strong>Error: </strong>{{ $error }}
			                        </div>
					            @endforeach
					        @endif
	                    </div>
	                </div>
		            <div class="row">
		                <div class="col-lg-12">
		                    <h1 class="page-header">@yield('heading')</h1>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-lg-8">
		                	@yield('content')
		                </div>
		               	@include('layouts.notifications')
		            </div>
		            <div class='row footer-wrapper'>
		            	<div class="col-lg-12">
		            		<footer class="footer">
								<p>&copy; Reccap 2015</p>
							</footer>
						</div>
		            </div>
		        </div>
	        </div>
	    </div>
	    {{ HTML::script('js/jquery-1.11.1.min.js') }}
	    @yield('scripts')
	    {{ HTML::script('js/bootstrap.js') }}
		{{ HTML::script('js/npm.js') }}
		{{ HTML::script('js/datepicker.js') }}
	    {{ HTML::script('js/plugins/morris/raphael.min.js') }}
	    {{ HTML::script('js/plugins/morris/morris.min.js') }}
	    {{ HTML::script('js/plugins/morris/morris-data.js') }}
	</body>
</html>