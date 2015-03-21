<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Concrete Creator' in the Factory Design Pattern. 
 */
class ConcreteViewableModifyableSpreadsheetWithValidationCreator extends AbstractSpreadsheetCreator{

	/**
	 * Factory method to produce and return a new viewable and modifiable (with validation enforced) spreadsheet.
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
	 * 
	 * @param $_validationRules JSON object with the validation rules to be enforced for this spreadsheet.
	 */
	public function FactoryMethod($_title, $_description, $_owner, $_creationDate, $_lastModifiedDate, $_validationRules) {
        return new ViewableModifyableSpreadsheetWithValidation($_title, $_description, $_owner, $_creationDate, $_lastModifiedDate, $_validationRules);
    }
}