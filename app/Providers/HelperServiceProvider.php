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

	    //Require Spreadsheet Helpers
	    foreach (glob(app_path().'/Helpers/SpreadsheetHelpers/*.php') as $filename){
	        require_once($filename);
	    }
	}

}