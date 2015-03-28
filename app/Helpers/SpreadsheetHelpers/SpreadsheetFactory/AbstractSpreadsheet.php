<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Abstract Product' in the Factory Design Pattern. 
 */
abstract class AbstractSpreadsheet{
	
	//Member variables
	/**
	 * Spreadsheet Object encapsulating all the spreadsheet details.
	 */
	private $spreadsheetObject;

	/**
	 * Abstract Spreadsheet constructor.
	 * 
	 * @param $_spreadsheetObject Spreadsheet Object encapsulating the spreadsheet details.
	 */
	public function __construct(SpreadsheetObject $_spreadsheetObject){
		$this->spreadsheetObject = $_spreadsheetObject;
   	}

   	/**
   	 * Getter for the title of the spreadsheet.
   	 * 
   	 * @return Returns the title of the spreadsheet or throws an exception with a descriptive 
   	 * error message.
   	 */
	public function getTitle(){
		return $this->spreadsheetObject->getTitle();
	}

	/**
   	 * Getter for the description of the spreadsheet.
   	 * 
   	 * @return Returns the description of the spreadsheet or throws an exception with a descriptive 
   	 * error message.
   	 */
	public function getDescription(){
		return $this->spreadsheetObject->getDescription();
	}

	/**
   	 * Getter for the user instance of the owner of the spreadsheet.
   	 * 
   	 * @return Returns the user instance of the owner of the spreadsheet or throws an exception 
   	 * with a descriptive error message.
   	 */
	public function getOwner(){
		return $this->spreadsheetObject->getOwner();
	}

	/**
   	 * Getter for the creation date of the spreadsheet.
   	 * 
   	 * @return Returns the creation date of the spreadsheet or throws an exception with a descriptive 
   	 * error message.
   	 */
	public function getCreationDate(){
		return $this->spreadsheetObject->getCreationDate();
	}

	/**
   	 * Getter for the last modified date of the spreadsheet.
   	 * 
   	 * @return Returns the last modified date of the spreadsheet or throws an exception with a 
   	 * descriptive error message.
   	 */
	public function getLastModifiedDate(){
		return $this->spreadsheetObject->getLastModifiedDate();
	}

	/**
	 * Getter for the spreadsheet validation rules.
	 * 
	 * @return JSON Object housing the spreadsheet validation rules.
	 */
	public function getValidationRulse(){
		return $this->getValidationRules();
	}
}