<?php

//Used for testing. Remove for production
Route::get('tester', function()
{
    return View::make('tester');
});

/**
 * Guest User Routes.
 * This group of routes is ONLY accessible by guest users, i.e. users who are not currently
 * authenticated by the application.
 */
Route::group(array('before' => 'guest'), function(){

	//CSRF Protection.
	Route::group(array('before' => 'csrf'), function(){
		//Route to process login
		Route::post('login', array('as' => 'login', 'uses' => 'LoginController@doLogin'));
	});

	//Route to welcome page
	Route::get('/', array('as' => 'welcome', 'uses' => 'HomeController@showWelcome'));
	
	//Route to login page
	Route::get('login', array('as' => 'login', 'uses' => 'LoginController@showLogin'));

	//Route to forgot password page
	Route::get('forgotPassword', array('as'=>'forgotPassword', 'uses' => 'LoginController@forgotPassword'));

});

/**
 * Authenticated User Routes.
 * This group of routes us ONLY accessible by users who have already been authenticated
 * by the user and are still 'logged' into the system.
 */
Route::group(array('before' => 'auth'), function(){

	/**
	 * This group of routes can only be executed/visited by an administrator or super user.
	 */
	Route::group(array('before' => 'adminOrRoot'), function(){

		/**********************************************************/
		/******************User Specific Routes********************/
		/**********************************************************/
		
		//Route to view users
		Route::get('users/view', array('as' => 'viewUsers', 'uses' => 'UserController@viewUsers'));

		//Route to add users
		Route::get('users/add', array('as' => 'addUsers', 'uses' => 'UserController@addUser'));

		//Route to process add users
		Route::post('users/add', array('as' => 'doAddUsers', 'uses' => 'UserController@doAddUser'));

		//Route to update users
		Route::get('users/update', array('as' => 'updateUsers', 'uses' => 'UserController@updateUser'));

		//Route to process update users
		Route::post('users/update', array('as' => 'doUpdateUsers', 'uses' => 'UserController@doUpdateUser'));

		//Route to remove users
		Route::get('users/remove', array('as' => 'removeUsers', 'uses' => 'UserController@removeUser'));

		//Route to process remove users
		Route::post('users/remove', array('as' => 'doRemoveUsers', 'uses' => 'UserController@doRemoveUsers'));

		/**********************************************************/
		/***************Spreadsheet Specific Routes****************/
		/**********************************************************/

		//Route to create spreadsheet
		Route::get('spreadsheet/create', array('as' => 'createSpreadsheet', 'uses' => 'SpreadsheetController@createSpreadsheet'));

		//Route to process create recons
		Route::post('spreadsheet/create', array('as' => 'doCreateSpreadsheet', 'uses' => 'SpreadsheetController@doCreateSpreadsheet'));

		//Route to modify (i.e. change recon properties and not add data to recon) recons
		Route::get('spreadsheet/modify', array('as' => 'modifySpreadsheet', 'uses' => 'SpreadsheetController@modifySpreadsheet'));

		//Route to process modify (i.e. change recon properties and not add data to recon) recons
		Route::post('spreadsheet/modify', array('as' => 'doModifySpreadsheet', 'uses' => 'SpreadsheetController@doModifySpreadsheet'));

		//Route to remove/close recons
		Route::get('spreadsheet/remove', array('as' => 'removeSpreadsheet', 'uses' => 'SpreadsheetController@removeSpreadsheet'));

		//Route to process remove/close recons
		Route::post('spreadsheet/remove', array('as' => 'doRemoveSpreadsheet', 'uses' => 'SpreadsheetController@doRemoveSpreadsheet'));
	});

	/**********************************************************/
	/******************User Specific Routes********************/
	/**********************************************************/

	//Route to Home when logged in
	Route::get('/', array('as' => 'home', 'uses' => 'UserController@showHome'));

	//Route to current authenticated user profile page
	Route::get('profile', array('as' => 'profile', 'uses' => 'UserController@showProfile'));

	//Route to view a specific user's profile
	Route::get('users/view/{item}', array('as' => 'getUser', 'uses' =>'UserController@getUser'));

	//Route to display the password reset page
	Route::get('password/reset', array('as' => 'resetPassword', 'uses' => 'LoginController@resetPassword'));

	//Route to process a reset password request
	Route::post('password/reset', array('as' => 'resetPassword', 'uses' => 'LoginController@doResetPassword'));

	//Route to process logout request
	Route::get('logout', array('as'=>'logout', 'uses' => 'LoginController@doLogout'));

	/**********************************************************/
	/***************Spreadsheet Specific Routes****************/
	/**********************************************************/

	//Route to view 'all' spreadsheets, relative to the requesting user
	Route::get('spreadsheet/view', array('as' => 'viewSpreadsheet', 'uses' => 'SpreadsheetController@showSpreadsheet'));

	//Route to view a specific spreadsheet
	Route::get('spreadsheet/view/{item}', array('as' => 'getSpreadsheet', 'uses' => 'SpreadsheetController@getSpreadsheet'));

	//Route to update (add data to or modify existing data in) spreadhseet
	Route::get('spreadsheet/update', array('as' => 'updateSpreadsheet', 'uses' => 'SpreadsheetController@updateSpreadsheet'));

	//Route to process update (add data to or modify existing data in) spreadsheet request
	Route::post('spreadsheet/update', array('as' => 'doUpdateSpreadsheet', 'uses' => 'SpreadsheetController@doUpdateSpreadsheet'));

	//Route to download spreadsheet
	Route::get('spreadsheet/download', array('as' => 'downloadspreadsheet', 'uses' => 'SpreadsheetController@downloadSpreadsheet'));

	//Route to submit spreadsheet
	Route::get('spreadsheet/submit', array('as' => 'submitSpreadsheet', 'uses' => 'SpreadsheetController@submitSpreadsheet'));
});

/**
 * General routes. (Accessible by all users [Guests and Authenticated users])
 */
//Route to help page
Route::get('help', array('as' => 'help', 'uses' => 'HomeController@showHelp'));

//Route to insufficient privileges page
Route::get('insufficientPrivileges', array('as' => 'insufficientPrivileges', 'uses' => 'HouseKeepingController@showInsufficientPrivileges'));