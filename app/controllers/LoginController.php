<?php

/**
 * Login Controller.
 *
 * All login/logout ['authentication'] related actions and activity are proccessed by this controller.
 */
class LoginController extends BaseController {
	
	/**
	 * This function directs the user to the login page where the user may enter his/her login credentials in order to log into the application.
	 * @return Returns the user to the login page (obviously for guest users).
	 */
	public function showLogin()
	{
		return View::make('login');
	}

	/**
	 * This function logs the user into the application.
	 * @return Returns the user to the home page for logged-in/authenticated users.
	 */
	public function doLogin()
	{
		$data = array(
		        'userName' => Input::get('username'),
		        'password' => Input::get('password'));

		$auth = Auth::attempt($data); 
	  	if($auth) {
	  		$user = Auth::user()->userName;       
			$welcome = "Welcome ".$user."!";
		    return Redirect::to('/')
		    	->with('user', $user)
		        ->with('flash_notice', $welcome);
	    }
		else
		{
			return Redirect::to('login')
				->with('flash_error', 'You provided an incorrect username/password combination. Please re-enter your login details carefully.')
				->withInput();
		}
	}

	/**
	 * This function logs the user out of the application.
	 * @return Returns the user to the welcome page for guest users.
	 */
	public function doLogout()
	{
		$successfulLogout = Auth::logout();

		if ($successfulLogout)
			return Redirect::to('/')
				->with('flash_notice', 'You were successfully logged out.');
		else
			return Redirect::to('/')
				->with('flash_error', 'The application was unable to log you out. Please re-attempt logout. If the problem persists, please inform the system administrator.');
	}
}
