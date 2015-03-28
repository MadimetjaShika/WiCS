<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Concrete Product' in the Factory Design Pattern. 
 *
 * This class creates a spreadsheet that has readon only priviledges, and modify priviledges with 
 * validation enforced on the modifications.
 */
class ViewableModifyableSpreadsheetWithValidation extends AbstractSpreadsheet{

	/**
	 * View Only Spreadsheet constructor.
	 * 
	 * @param $_spreadsheetObject Spreadsheet Object encapsulating the spreadsheet details.
	 */
	public function __construct(SpreadsheetObject $_spreadsheetObject) {
       parent::__construct($_spreadsheetObject);
   }

   /**
    * Getter for the validation rules for the spreadsheet.
    * @return Returns a JSON object with the validation rules for the spreadsheet.
    */
   public function getValidationRules(){
   		return $this->getValidationRules();
   }
}