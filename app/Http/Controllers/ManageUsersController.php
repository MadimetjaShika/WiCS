<?php namespace WiCS\Http\Controllers;

use WiCS\Http\Requests;
use WiCS\Http\Controllers\Controller;

use Illuminate\Http\Request;

/**
 * Controller to hanlde all functionality to do directly with users.
 * Specific logic should not be defined in this class, but should be 
 * referenced from the helper classes. Ensure that logic is not alread 
 * defined before writing anything.
 */
class ManageUsersController extends Controller {

	/**
	 * Show the user's profile
	 *
	 * @return Response
	 */
	public function showProfile(){
		//
	}

	/**
	 * Show all users on the system to the super user.
	 *
	 * @return Response
	 */
	public function showUsersForSuperUser(){
		//
	}

	/**
	 * Remove a user from the system
	 *
	 * @return Response
	 */
	public function removeUserForSuperUser(){
		//
	}

	/**
	 * Show the page for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function modifyUserProfile($id){
		//
	}
}
