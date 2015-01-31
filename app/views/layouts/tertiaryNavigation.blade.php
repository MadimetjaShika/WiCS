<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
    	@if ( Auth::user()->userGroup == 'Root' )
        	<li>
                <a href="/"><i class="fa fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#manageSpreadsheetsDD">Manage Spreadsheets</a>
	            <ul id="manageSpreadsheetsDD" class="collapse">
                	 <li>
                	 	{{ HTML::link('spreadsheet/view', 'View Spreadsheets') }}
                    </li>
                    <li>
                    	{{ HTML::link('spreadsheet/create', 'Create Spreadsheets') }}
                    </li>
                    <li>
                    	{{ HTML::link('spreadsheet/download', 'Download Spreadsheets') }}
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#manageUsersDD">Manage Users</a>
	            <ul id="manageUsersDD" class="collapse">
                	<li>
                		{{ HTML::link('users/view', 'View Users') }}
                    </li>
               	    <li>
               	    	{{ HTML::link('users/add', 'Add Users') }}
                    </li>
                </ul>
            </li>
            <li>
            	<p>You are a: Super (root) User</p>
            </li>
    	@elseif ( Auth::user()->userGroup == 'Administrator' )
           	<li>
                <a href="/"><i class="fa fa-fw"></i> Dashboard</a>
            </li>
            <li>
	            <a href="javascript:;" data-toggle="collapse" data-target="#manageSpreadsheetsDD">Manage Spreadsheets</a>
	            <ul id="manageSpreadsheetsDD" class="collapse">
	                <li>
	            	 	{{ HTML::link('spreadsheet/view', 'View Spreadsheets') }}
	                </li>
	                <li>
	                	{{ HTML::link('spreadsheet/create', 'Create Spreadsheets') }}
	                </li>
	                <li>
	                	{{ HTML::link('spreadsheet/download', 'Download Spreadsheets') }}
	                </li>
	            </ul>
            </li>
            <li>
            	<a href="javascript:;" data-toggle="collapse" data-target="#manageUsersDD">Manage Users</a>
	            <ul id="manageUsersDD" class="collapse">
                	<li>
                		{{ HTML::link('users/view', 'View Users') }}
                    </li>
               	    <li>
               	    	{{ HTML::link('users/add', 'Add Users') }}
                    </li>
                </ul>
            </li>
            <li>
            	<p>You are an: administrator</p>
            </li>
        @elseif ( Auth::user()->userGroup == 'Contributor' )
        	<li>
                <a href="javascript:;" data-toggle="collapse" data-target="#manageSpreadsheetsDD">Manage Spreadsheets</a>
	            <ul id="manageSpreadsheetsDD" class="collapse">
                	 <li>
                	 	{{ HTML::link('spreadsheet/view', 'View spreadsheets') }}
                    </li>
                    <li>
                    	{{ HTML::link('spreadsheet/download', 'Download Spreadsheets') }}
                    </li>
                </ul>
            </li>
            <li>
            	<p>You are a: contributor</p>
            </li>
        @else
        	<li>
        		<p>Your administrator has not set your profile permissions. Please inform him/her to set them so that you can make use of this application's funcionality.</p>
        	</li>
        @endif      
    </ul>
</div>