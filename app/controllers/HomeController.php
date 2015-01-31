<?php

/**
 * Home Controller.
 *
 * All Guest user actions and activity are processed by this controller.
 */
class HomeController extends BaseController {
	
	/**
	 * This function returns the unauthenticated user welcome page, i.e. page seen when visiting site url.
	 * @return View Unauthenticated user welcome page.
 	 */
	public function showWelcome()
	{
		return View::make('index');
	}

	/**
	* This function returns the help page for both guest and authenticated users.
	* @return View User help page.
	*/
	public function showHelp()
	{
		return View::make('help');
	}	
}
