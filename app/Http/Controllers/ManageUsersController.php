<?php namespace WiCS\Http\Controllers;

use WiCS\Http\Requests;
use WiCS\Http\Controllers\Controller;

use Illuminate\Http\Request;

/**
 * Controller to hanlde all functionality to do directly with users.
 * Specific logic should not be defined in this class, but should be 
 * referenced from the helper classes. Ensure that logic is not already 
 * defined before writing anything.
 */
class ManageUsersController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the user's profile
	 *
	 * @return Response
	 */
	public function showProfile(){
		return view('user.profile')
			->with('userData', userProfileData());
	}

	/**
	 * Show all users on the system to the super user.
	 *
	 * @return Response
	 */
	public function showUsersForSuperUser(){
		return view('user.super.userList')
			->with('userList', listAllUsers());
	}

	/**
	 * Remove a user from the system
	 *
	 * @return Response
	 */
	public function removeUserForSuperUser(){
		removeUserTemporarily();
	}

	/**
	 * Show the page for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function modifyUserProfile($id){
		return view('user.editProfile')
			->with('userData', userProfileData());
	}
}