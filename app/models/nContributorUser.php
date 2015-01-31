<?php

use Vinelab\NeoEloquent\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class nContributorUser extends NeoEloquent implements UserInterface, RemindableInterface {

	use SoftDeletingTrait;

	protected $connection = 'neo4j';
	protected $label = 'Contributor';
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
     * This fucntion specifies that this user contributes to zero or more spreadsheets.
     * @return Rerurns the spreadsheets that this user is a contributor to.
     */
    public function contributedSheets()
    {
        return $this->hasMany('nSpreadsheet', 'CONTRIBUTOR');
    }

    /**
     * This function specifies that this user belongs to the root user.
     * @return Returns the root user that this user belongs to.
     */
    public function root()
    {
        return $this->belongsTo('nRootUser', 'SUPER');
    }

	/**
	 * This function specifies that this user belongs to one or more administrator user.
	 * @return Returns the administrators that this user belongs to.
	 */
	public function administrator()
    {
        return $this->belongsTo('nAdminUser', 'ADMINISTRATOR');
    }
}
