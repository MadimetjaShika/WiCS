@if( Auth::check() )
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<i class="fa fa-bell fa-fw"></i> Notifications
		    </div>
			<div class="panel-body">
				<div class="list-group">
			    	<a href="#" class="list-group-item">Travel Recon Opened
			        	<span class="pull-right text-muted small"><em>4 minutes ago</em></span>
			        </a>
			        <a href="#" class="list-group-item">Move Info Sheet closed
			            <span class="pull-right text-muted small"><em>1 day ago</em></span>
			        </a>
			    </div>
			</div>
		</div>
	</div>
@endif