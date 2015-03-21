<?php namespace WiCS\Http\Controllers;

 use Auth;

/**
 * Application home controller. Handles all 'general'requests that are not directly
 * specific to users or spreadsheets.
 * Specific logic should not be defined in this class, but should be 
 * referenced from the helper classes. Ensure that logic is not alread 
 * defined before writing anything.
 */
class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user if the user if authenticated.
	 * Else present the user with the welcome page for guest users.
	 *
	 * @return Response
	 */
	public function showIndex()
	{
		if( Auth::check() )
			return view('home');
		else
			return view('welcome');
	}

	/**
	 * Show the application help page to the user.
	 * 
	 * @return Response
	 */
	public function showHelp(){

	}

	/**
	 * Show the application 'Insufficient Privileges' page to the user.
	 * 
	 * @return Response
	 */
	public function showInsufficientPrivileges(){

	}
}
