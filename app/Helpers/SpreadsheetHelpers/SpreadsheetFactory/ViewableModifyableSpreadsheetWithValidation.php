<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Concrete Product' in the Factory Design Pattern. 
 *
 * This class creates a spreadsheet that has readon only priviledges, and modify priviledges with 
 * validation enforced on the modifications.
 */
class ViewableModifyableSpreadsheetWithValidation extends AbstractSpreadsheet{
	
	//Member variable
	/**
	 * JSON object with the validation rules to be specified on the spreadsheet.
	 * @var string
	 */
	private $validationRules;

	/**
	 * View Only Spreadsheet constructor.
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
	public function __construct($_title, $_description, $_owner, $_creationDate, $_lastModifiedDate, $_validationRules) {
       parent::__construct($_title, $_description, $_owner, $_creationDate, $_lastModifiedDate);
       $this->validationRules = $_validationRules;
   }

   /**
    * Getter for the validation rules for the spreadsheet.
    * @return Returns a JSON object with the validation rules for the spreadsheet.
    */
   public function getValidationRules(){
   		return $this->validationRules;
   }
}