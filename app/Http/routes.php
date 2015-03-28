<?php

/**
 *************************************************************************
 ************************************************************************* 
 **************************** GENERAL ROUTES *****************************
 *************************************************************************
 *************************************************************************
 * 
 * Accessible by all users (both guests and authenticated users). Some of the routes
 * will direct to the relevant page, depending on if the user is authenticated or not.
 */

//Route to welcome page if user is not authenticated, else renders dashboard if user is
//authenticated.
Route::get('/', array('as' => 'index', 'uses' => 'HomeController@showIndex'));

//Route to help page
Route::get('help', array('as' => 'help', 'uses' => 'HomeController@showHelp'));

//Route to insufficient privileges page
Route::get('insufficientPrivileges', array('as' => 'insufficientPrivileges', 'uses' => 'HomeController@showInsufficientPrivileges'));

//Route to view a specific user's profile. The display will differ based on whether or not 
//the requesting useris authenticated.
Route::get('users/view/{item}', array('as' => 'getUserProfile', 'uses' =>'ManageUsersController@getUser'));

//?????...
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
 *************************************************************************
 ************************************************************************* 
 ************************ GUEST USER ROUTES GROUP ************************
 *************************************************************************
 *************************************************************************
 *
 * This group of routes is ONLY accessible by guest users, i.e. users who are not currently
 * authenticated by the application.
 */
Route::group(array('before' => 'guest'), function(){

	//CSRF Protection.
	Route::group(array('before' => 'csrf'), function(){
		//Route to process login
		Route::post('login', array('as' => 'doLogin', 'uses' => 'Auth\AuthController@doLogin'));

		//Route to process registration
		Route::post('register', array('as' => 'doRegistration', 'uses' => 'Auth\AuthController@doRegistration'));
	});
	
	//Route to login page
	Route::get('login', array('as' => 'login', 'uses' => 'Auth\AuthController@showLogin'));

	//Route to register page
	Route::get('register', array('as' => 'register', 'uses' => 'Auth\AuthController@showRegister'));

	//Route to forgot password page
	Route::get('forgotPassword', array('as'=>'forgotPassword', 'uses' => 'Auth\AuthController@forgotPassword'));
});

/**
 *************************************************************************
 ************************************************************************* 
 ******************** AUTHENTICATED USER ROUTES GROUP ********************
 *************************************************************************
 *************************************************************************
 *
 * This group of routes is ONLY accessible by users who have already been authenticated
 * by the system and are still 'logged' into the system.
 */
Route::group(array('before' => 'auth'), function(){

	/**
	 * This group of routes can only be executed/visited by the super user.
	 */
	Route::group(array('before' => 'superUser'), function(){

		/**********************************************************/
		/******************User Specific Routes********************/
		/**********************************************************/
		
		//Route to view all users
		Route::get('users/view', array('as' => 'getAllUsersForSuperUser', 'uses' => 'ManageUsersController@showUsersForSuperUser'));

		//Route to process remove users
		Route::post('users/remove', array('as' => 'doRemoveUserForSuperUser', 'uses' => 'ManageUsersController@removeUserForSuperUser'));

		/**********************************************************/
		/***************Spreadsheet Specific Routes****************/
		/**********************************************************/

		//Route to view all spreadsheets
		Route::get('spreadsheet/view', array('as' => 'getAllSpreadsheetsForSuperUser', 'uses' => 'ManageSpreadsheetsController@showSpreadsheetsForSuperUser'));

		//Route to process remove/close recons
		Route::post('spreadsheet/remove', array('as' => 'doRemoveSpreadsheetForSuperUser', 'uses' => 'ManageSpreadsheetsController@removeSpreadsheetForSuperUser'));
	});

	/**********************************************************/
	/******************User Specific Routes********************/
	/**********************************************************/

	//Route to current authenticated user profile page
	Route::get('profile', array('as' => 'showProfile', 'uses' => 'ManageUsersController@showProfile'));

	//Route to display the password reset page
	Route::get('password/reset', array('as' => 'resetPassword', 'uses' => 'Auth\AuthController@resetPassword'));

	//Route to process a reset password request
	Route::post('password/reset', array('as' => 'doResetPassword', 'uses' => 'Auth\AuthController@doResetPassword'));

	//Route to process logout request
	Route::get('logout', array('as'=>'doLogout', 'uses' => 'Auth\AuthController@doLogout'));

	/**********************************************************/
	/***************Spreadsheet Specific Routes****************/
	/**********************************************************/

	//Route to create spreadsheet
	Route::get('spreadsheet/create', array('as' => 'showCreateSpreadsheet', 'uses' => 'ManageSpreadsheetsController@showCreateSpreadsheet'));

	//Route to process create spreadsheet
	Route::post('spreadsheet/create', array('as' => 'doCreateSpreadsheet', 'uses' => 'ManageSpreadsheetsController@doCreateSpreadsheet'));

	//Route to view 'all' spreadsheets, relative to the requesting user
	Route::get('spreadsheet/view', array('as' => 'getAllSpreadsheets', 'uses' => 'ManageSpreadsheetsController@showSpreadsheets'));

	//Route to view a specific spreadsheet
	Route::get('spreadsheet/view/{item}', array('as' => 'getSpreadsheet', 'uses' => 'ManageSpreadsheetsController@showSpreadsheet'));

	//Route to download spreadsheet
	Route::post('spreadsheet/download/{item}', array('as' => 'downloadSpreadsheet', 'uses' => 'ManageSpreadsheetsController@downloadSpreadsheet'));

	//Route to submit modified spreadsheet
	Route::post('spreadsheet/submit/{item}', array('as' => 'submitSpreadsheet', 'uses' => 'ManageSpreadsheetsController@modifySpreadsheet'));

	//Route to process removal of spreadsheet
	Route::post('spreadsheet/submit/{item}', array('as' => 'doRemoveSpreadsheets', 'uses' => 'ManageSpreadsheetsController@doRemoveSpreadsheets'));	
});