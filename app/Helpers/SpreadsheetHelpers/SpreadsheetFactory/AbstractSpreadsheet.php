<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Abstract Product' in the Factory Design Pattern. 
 */
abstract class AbstractSpreadsheet{
	
	//Member variables
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
	 * Abstract Spreadsheet constructor.
	 * 
	 * @param $_title The title of the spreadsheet to be created.
	 * 
	 * @param $_description The description of teh spreadsheet to be created.
	 * 
	 * @param $_owner A user instance of the owner of the spreadsheet.
	 * 
	 * @param $_creationDate The creation date of the spreadsheet.
	 * 
	 * @param $_lastModifiedDate The last modified date of the spreadsheet.
	 */
	public function __construct($_title, $_description, $_owner, $_creationDate, $_lastModifiedDate) {
		$this->title = $_title;
		$this->description = $_description;
		$this->owner = $_owner;
		$this->creationDate = $_creationDate;
		$this->lastModifiedDate = $_lastModifiedDate;
   	}

   	/**
   	 * Getter for the title of the spreadsheet.
   	 * 
   	 * @return Returns the title of the spreadsheet or throws an exception with a descriptive 
   	 * error message.
   	 */
	public function getTitle(){
		return $this->title;
	}

	/**
   	 * Getter for the description of the spreadsheet.
   	 * 
   	 * @return Returns the description of the spreadsheet or throws an exception with a descriptive 
   	 * error message.
   	 */
	public function getDescription(){
		return $this->description;
	}

	/**
   	 * Getter for the user instance of the owner of the spreadsheet.
   	 * 
   	 * @return Returns the user instance of the owner of the spreadsheet or throws an exception 
   	 * with a descriptive error message.
   	 */
	public function getOwner(){
		return $this->owner;
	}

	/**
   	 * Getter for the creation date of the spreadsheet.
   	 * 
   	 * @return Returns the creation date of the spreadsheet or throws an exception with a descriptive 
   	 * error message.
   	 */
	public function getCreationDate(){
		return $this->creationDate;
	}

	/**
   	 * Getter for the last modified date of the spreadsheet.
   	 * 
   	 * @return Returns the last modified date of the spreadsheet or throws an exception with a 
   	 * descriptive error message.
   	 */
	public function getLastModifiedDate(){
		return $this->lastModifiedDate;
	}
}