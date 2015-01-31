<?php

/**
 * User Controller.
 * 
 * All User related actions and actvity are processed by this controller.
 */
class UserController extends BaseController {
	
	/**
	* This function returns the home page view for an authenticated user.
	* @return View The home page view for an authenticated user.
	*/
	public function showHome()
	{
		return View::make('users.home');
	}

	/**
	 * This function returns a view of the profile page of the calling user (i.e. the currently authenticated/logged-in user).
	 * @return [type] [description]
	 */
	public function showProfile()
	{
		//Get the relevant information for the current user.
		$userGraphId = Auth::user()->graphId;
		$userGraphNode = null;

		if ( Auth::user()->userGroup == 'Root' ){
			$userGraphNode = nRootUser::where('id', '=', $userGraphId)->first();
		}
		else if ( Auth::user()->userGroup == 'Administrator' ){
			$userGraphNode = nAdminUser::where('id', '=', $userGraphId)->first();
		}
		else if ( Auth::user()->userGroup == 'Contributor' ){
			$userGraphNode = nContributorUser::where('id', '=', $userGraphId)->first();
		}
		else{
			return View::make('users.profile')
				->with('flash_error', 'There was a problem retrieving your profile. It appears you have not been assigned to a user group. Please inform you administrator asap, as you will not be able to use any functionality without your user group being set.');
		}
		
		if ( $userGraphNode == null ){
			return View::make('users.profile')
				->with('flash_error', 'There was a problem retrieving your profile. Error Code : _______. Please inform your administrator of this error code.');
		}

		return View::make('users.profile')
			->with('user', $userGraphNode);
	}

	/**
	* This function returns the help page for authenticated users.
	* @return View The help page for authenticated users.
	*/
	public function showHelp()
	{
		return View::make('users.help');
	}

	/**
	 * This function returns a view listing all users for a particular administrator.
	 * @return [type]
	 */
	public function viewUsers()
	{
		//Get users. First ensure this user is an administrator, and if the user is
		//an administrator, then direct the user to a page where they will be able to 
		//see a list of users they created and are administrating, since user's they
		//are administering aren't necessarilly users they created.
		//Admin users may only delete users they created.
		
		$users = null;

		if( Auth::user()->userGroup == 'Root' )
			$users = DatabaseHelpers::getAllUsers();
		else if ( Auth::user()->userGroup == 'Administrator' )
			$users = DatabaseHelpers::getAdminsContributorUserList();
			//$users = DatabaseHelpers::getAdminsContributorUserList();
		else
			$users = null;

		//Return the view and pass along the data to the view
		return View::make('users.view_users')
			->with('users', $users);
		
	}

	public function getUser($item)
	{
		//Guard against null or empty $item
		if( $item == null || $item == '' || $item == ' ' )
			return Redirect::to('recon/view');

		$GETUserName = $item;
		$GETuserGroup = Input::get('uG');

		//Get the sheet file.
		$userNode = null;
		if ( $GETuserGroup == 'Adm' )
			$userNode = nAdminUser::where('userName', '=', $GETUserName)->first();
		elseif ( $GETuserGroup == 'Cbt' )
			$userNode = nContributorUser::where('userName', '=', $GETUserName)->first();
		elseif ( $GETuserGroup == 'Rt' )
			$userNode = nRootUser::where('userName', '=', $GETUserName)->first();
		
		if ( $userNode == null ){
			return Redirect::to('users/view')
				->with('flash_error', 'Unable to get display the user. The user might have been removed from the system. If you believe this is in error, please contact your administrator or the system administrator asap.');
		}	

		//Redirect the user to the view recons page, passing the relevant recons to the page.
		return View::make('users.display_user')
			->with('user', $userNode);
	}

	/**
	 * This function returns a view allowing an admin user to add other users to the system.
	 */
	public function addUser()
	{
		$userGroupList = array( 'null' => ' ',
										'Contributor' => 'Contributor',
										'Administrator' => 'Administrator');
		$temp = nAdminUser::all();
		$tempNames = array();
		$tempIds = array();

		foreach ($temp as $user) {
			array_push($tempNames, $user->firstName.' '.$user->lastName);
		}

		foreach ($temp as $user) {
			array_push($tempIds, $user->id);
		}

		$adminList = array_combine($tempIds, $tempNames);

		if ( Auth::user()->userGroup == 'Root' )
			return View::make('users.add_users')
				->with('userGroupList', $userGroupList)
				->with('adminList', $adminList);
		else
			return View::make('users.add_users')
				->with('userGroupList', $userGroupList);
	}

	/**
	 * This function proccesses an add user request and adds a user to the database.
	 * @return [type] [description]
	 */
	public function doAddUser()
	{
		$data = Input::only(
            'firstName',
            'lastName',
            'userName',
            'email',
            'password',
            'userGroup'
        );

        //The user $rules variable is defined in the User Model.
        $validator = Validator::make($data, User::$rules);

		if($validator->fails())
		{	
			$messages = $validator->messages();

			return Redirect::to('register')
			    ->withErrors($messages)
			    ->withInput();
		}
		else
		{
			//Add the user to the Neo4J Graph database first so we can obtain the node id, and thereafter
			//add the user to the relational MySQL database.
			
			//Variable set to null for the purpose of ensuring the user was successfully added to the database.
			$newUser = null;

			//First, assign the user the correct label
			if ( $data['userGroup'] === 'Administrator' ){
				$newUser = nAdminUser::create(['firstName' => $data['firstName'], 'lastName' => $data['lastName'], 'email' => $data['email']]);
				//$post = new Post(['title' => 'The Title', 'body' => 'Hot Body']);


			}
			else if ( $data['userGroup'] === 'Contributor' ){
				$newUser = nContributorUser::create(['firstName' => $data['firstName'], 'lastName' => $data['lastName'], 'email' => $data['email']]);



			}

			//At this point, if $newUser is null, we have a problem since that means the userGroup validation failed, somehow...
			//If this is the case, we return the user to the page to re-populate the new user infortmation and retry the entire process.
			if ( $newUser == null ){
				return Redirect::to('addUsers')
			    	->with('flash_error', 'There was a problem creating the new user. Please re-attempt. If this persists, please contact you administrator or the system administrator.'); 
			}

			//Second, Set the relationship with the Super User and the Administrator user who created the user.
			$callingUserGraphID = Auth::user()->graphId;

			if ( Auth::user()->userGroup == 'Root' ){
				//If we are adding a contributor, the Super use should not have a 'SUPER' relationship with the contributer.
				if ( $data['userGroup'] === 'Contributor' ){
					$responsibleAdminUser = Input::get('admin');
					$adminUser = nAdminUser::find($responsibleAdminUser);
					$adminUser->administrator()->save($newUser);
				}
				else{
					$currentUser = nRootUser::find($callingUserGraphID);
					$currentUser->administrator()->save($newUser);
				}
			}
			else if ( Auth::user()->userGroup == 'Administrator' ){
				$currentUser = nAdminUser::find($callingUserGraphID);
				$currentUser->administrator()->save($newUser);
			}
			else{
				return Redirect::to('addUsers')
			    	->with('flash_error', 'It seems you do not have the neccessary privileges to perform the requested task. If you believe this is in error, please speak to your administrator or to the system administrator.'); 
			}

			//Add the newly added user to the MySQL relational database.
			$user = User::create([
				'graphId' => $newUser->id,
	            'userName' => $data['userName'],
	            'userGroup' => $data['userGroup'],
	            'password' => Hash::make($data['password'])
	        ]);

	        if( $user )
	        {
	        	//Upon success, redirect the user to the view users page with a success message so the admin may view the new user on the users list.
				return Redirect::to('users/view')
			    	->with('flash_notice', 'The user has been successfully created!');

			    //Send email to new user to inform him/her that his/her account has been created.
	        }
	        else
	        {
	        	return Redirect::to('users/add')
			    	->with('flash_error', 'There was a critical an error in completing the new user creation. Please inform your administrator or the system administrator asap.');
	        }				        
		}
	}

	/**
	 * This function returns a view allowing an admin user to update the details of an existing user.
	 * @return [type]
	 */
	public function updateUser()
	{
		return View::make('users.update_users');
	}

	/**
	 * This function updates a users profile information.
	 * @return [type] [description]
	 */
	public function doUpdateUser()
	{

	}

	/**
	 * This function returns a view allowing an admin user to remove users on his/her user list.
	 * @return [type]
	 */
	public function removeUser()
	{
		return View::make('users.remove_users');
	}

	/**
	 * This function processes the removal of a user from the application. 
	 * @return [type] [description]
	 */
	public function doRemoveUsers()
	{

	}
}
