<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $connection = 'mysql'; 

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Mass Assignment Fields.
	 * @var array
	 */
	protected $fillable = array('graphId', 'userName', 'userGroup', 'password');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * User data validation rules. Used for validating user information.
	 * @var array
	 */
	public static $rules = array(
		'firstName' => 'required|alpha_dash|min:2',
		'lastName' => 'required|alpha_dash|min:2',
	    'userName' => 'required|unique:users|min:3',
	    'email' => 'required|email',
	    'userGroup' => 'required|in:Administrator,Contributor',
		'password' => 'required|min:6|max:255'
	);

	//'email' => 'required|email|unique:nAdminUser,nContributorUser,nSuperUser'

	/**
	 * This function will assert whether the current authenticated/logged-in user is an administrator, and return
	 * true in the case that the user is an administrator and false otherwise.
	 * @return boolean Returns true if the current authenticated user is an administrator and false otherwise.
	 */
	public static function isAdministrator()
	{
		if( Auth::user()->userGroup === 'Administrator' )
		{
	        return true;
	    }
	    else
	    {
	        return false;
	    }
	}

	/**
	 * This function will assert whether the current authenticated/logged-in user is a contributor, and return
	 * true in the case that the user is a contributor and false otherwise
	 * @return boolean Returns true if current authenticated user is a contributer and false otherwise.
	 */
	public static function isContributor()
	{
		if( Auth::user()->userGroup === 'Contributor' )
		{
	        return true;
	    }
	    else
	    {
	        return false;
	    }
	}

	/**
	 * This function returns the current user's corresponding graph node id as stored in the MySQL database.
	 * @return integer The user's corresponding graph node id.
	 */
	public static function getUserGraphId()
	{
		return Auth::user()->graphId;
	}

}
