<?php

use Vinelab\NeoEloquent\Eloquent\SoftDeletingTrait;

class nSpreadsheet extends NeoEloquent {

	use SoftDeletingTrait;

	protected $connection = 'neo4j';
	protected $label = 'Spreadsheet';
	protected $dates = ['deleted_at'];

    /**
     * User data validation rules. Used for validating user input information.
     * @var array
     */
    public static $rules = array(
        'title' => 'required|min:3',
        'description' => 'required|min:10',
        'closeDate' => 'required'
    );

	/**
     * Mass Assignment Fields.
     * @var array
     */
    protected $fillable = array('title', 'description', 'closeDate', 'status', 'validationRules', 'location');

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
	 * This function specifies that this spreadsheet belongs to the root user.
	 * @return Returns the root user.
	 */
	public function root()
    {
        return $this->belongsTo('nSuperUser', 'AUTHOR');
    }

	/**
	 * This function specifies that this spreadsheet is authored by some administrator user.
	 * @return Returns the administrator user that authored this spreadsheet.
	 */
	public function author()
    {
        return $this->belongsTo('nAdminUser', 'AUTHOR');
    }

    /**
     * This function specifies that this spreadhseet has many contributors.
     * @return Returns the contributors that contribute to this spreadhseet.
     */
    public function contributor()
    {
        return $this->belongsToMany('nContributorUser', 'CONTRIBUTOR');
    }

}
