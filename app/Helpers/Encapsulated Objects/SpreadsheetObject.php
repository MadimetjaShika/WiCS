<?php namespace WiCS\Helpers\GenericHelpers;

/**
 * Encapsulates a spreadsheet object.
 */
class SpreadsheetObject{

	//Memeber Variables
	/**
	 * The title of the spreadsheet.
	 * @var string
	 */
	private $title;

	/**
	 * The description of the spreadsheet.
	 * @var string
	 */
	private $description;

	/**
	 * A user instance of the owner of the spreadsheet.
	 * @var User
	 */
	private $owner;

	/**
	 * The creation date of the spreadsheet.
	 * @var date
	 */
	private $creationDate;

	/**
	 * The last modified date of the spreadsheet.
	 * @var date
	 */
	private $lastModifiedDate;

	/**
	 * The spreadsheet validation rules.
	 * @var [type]
	 */
	private $validationRules;

	public function __construct(){
	}

	public function getTitle(){
		return $this->title;
	}

	public function getDescription(){
		return $this->description;	
	}

	public function getOwner(){
		return $this->owner;
	}

	public function getCreationDate(){
		return $this->creationDate;
	}

	public function getLastModifiedDate(){
		return $this->lastModifiedDate;
	}

	public function getValidationRules(){
		return this->validationRules;
	}

	public function setTitle($_title){
		$this->title = $_title;
	}

	public function setDescription($_description){
		$this->description = $_description;
	}

	public function setOwner($_owner){
		$this->owner = $_owner;
	}

	public function setCreationDate($_creationDate){
		$this->creationDate = $_creationDate;
	}

	public function setLastModifiedDate($_lastModifiedDate){
		$this->lastModifiedDate = $_lastModifiedDate;
	}

	public function setValidationRules($_validationRules){
		$this->validationRules = $_validationRules;
	}
}	