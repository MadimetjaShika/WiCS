<?php

use Vinelab\NeoEloquent\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class nRootUser extends NeoEloquent implements UserInterface, RemindableInterface {

	use SoftDeletingTrait;

	protected $connection = 'neo4j';
	protected $label = 'Root';
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
     * This function specifies that this user is the root user of all administrators.
     * @return Returns all the administrators.
     */
    public function administrator()
    {
        return $this->hasMany('nAdminUser', 'SUPER');
    }

    /**
     * This function specifies that this user is the root user of all contributors.
     * @return Returns all the contributors.
     */
    public function contributor()
    {
        return $this->hasMany('nContributorUser', 'SUPER');
    }

    /**
     * This function specifies that this root user is the root user of all spreadhseets.
     * @return Returns all the spreadsheets. 
     */
    public function authoredSpreadsheets()
    {
        return $this->hasMany('nSpreadsheet', 'AUTHOR');
    }

    /**
     * This function specifies that this user is a contributor to zero or more spreadsheets.
     * @return Return all the spreasheets that this root user is a contributor to.
     */
    public function contributedSheets()
    {
        return $this->hasMany('nSheet', 'CONTRIBUTOR');
    }

}
