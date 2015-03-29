<?php namespace WiCS\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap custom application helpers.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register custom application helpers.
	 *
	 * @return void
	 */
	public function register(){

		//Require generic helpers
		foreach (glob(app_path().'/Helpers/GenericHelpers/*.php') as $filename){
	        require_once($filename);
	    }

	    //Require message helpers
		foreach (glob(app_path().'/Helpers/MessageHelpers/*.php') as $filename){
	        require_once($filename);
	    }

	    //Require User Helpers
	    foreach (glob(app_path().'/Helpers/UserHelpers/*.php') as $filename){
	        require_once($filename);
	    }

	    //Require Spreadsheet Helpers
	    foreach (glob(app_path().'/Helpers/SpreadsheetHelpers/*.php') as $filename){
	        require_once($filename);
	    }

	    //Require Spreadsheet Factory
	    foreach (glob(app_path().'/Helpers/SpreadsheetHelpers/SpreadsheetFactory/*.php') as $filename){
	        require_once($filename);
	    }

	    //Require testing helpers
	    //require_once("tests/TestHelpers/TestsHelper.php");
	    /*foreach ('tests/TestHelpers/*.php' as $filename){
	        require_once($filename);
	    }*/
	}

}
