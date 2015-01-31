@if( !empty($errors) )
	<div class="row">
	    <div class="col-lg-12">
	        @if( !empty($errors->first('username')) )
	        	<div class="alert alert-info alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <i class="fa fa-info-circle"></i><strong>Error: </strong>{{ $errors->first('username') }}
	            </div>
	        @endif
	        @if( !empty($errors->first('password')) )
	        	<div class="alert alert-info alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <i class="fa fa-info-circle"></i><strong>Error: </strong>{{ $errors->first('password') }}
	            </div>
	        @endif
	    </div>
	</div>
@endif
<div>
	{{ Form::open(array('url' => 'login')) }}
		{{ Form::text('username', Input::old('username'), array('id' => 'username', 'class' => 'form-control', 'type' => 'text', 'placeholder' => 'Username')) }}
		{{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')) }}
		{{ Form::submit('Login', array('class' => 'btn btn-lg btn-primary btn-block')) }}
	{{ Form::close() }}
</div>