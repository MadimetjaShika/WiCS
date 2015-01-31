<?php

use Vinelab\NeoEloquent\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class nAdminUser extends NeoEloquent implements UserInterface, RemindableInterface {

	use SoftDeletingTrait;

	protected $connection = 'neo4j';
	protected $label = 'Administrator';
	protected $dates = ['deleted_at'];

    /**
     * Mass Assignment Fields.
     * @var array
     */
    protected $fillable = array('firstName');

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($token)
    {
        $this->remember_token = $token;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * This function specifies that this user is responsible for zero or more administrator users.
     * @return Returns all the administrators that this user is responsible for
     */
    /*public function administrator()
    {
        return $this->hasMany('nAdminUser', 'RESPONSIBLE_FOR');
    }*/

    /**
     * This function specifies that this is an administrator of zero or more contributors.
     * @return Returns all users that this user is an administrator of
     */
    public function administrator()
    {
        return $this->hasMany('nContributorUser', 'ADMINISTRATOR');
    }

	/**
	 * This function specifies that this user belongs to a root user.
	 * @return Returns the root user that this user belongs to.
	 */
    public function root()
    {
        return $this->belongsTo('nRootUser', 'SUPER');
    }

    /**
     * This function specifies that this user is the responsibility of some other
     * admninistrator, i.e. an administrator requested for this user to be added on his/her
     * behalf.
     * @return Returns all admin users that are responsible for this user
     */
    /*public function adminUser()
    {
        return $this->belongsTo('nAdminUser', 'RESPONSIBLE_FOR');
    }*/

    /**
     * This function specifies that this user is an author of zero or more spreadsheets.
     * @return Returns the spreadsheets that this user has authored.
     */
    public function authoredSpreadsheets()
    {
        return $this->hasMany('nSpreadsheet', 'AUTHOR');
    }

    /**
     * This function specifies that this user is a contributor of zero or more spreadsheets.
     * @return Returns the spreadsheets that this user is a contributor to.
     */
    public function contributedSpreadsheets()
    {
        return $this->hasMany('nSpreadsheet', 'CONTRIBUTOR');
    }

}
