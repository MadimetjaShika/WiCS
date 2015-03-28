<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Concrete Creator' in the Factory Design Pattern. 
 */
class ConcreteViewableModifyableSpreadsheetWithValidationCreator extends AbstractSpreadsheetCreator{

	/**
	 * Factory method to produce and return a new viewable and modifiable (with validation enforced) spreadsheet.
	 * 
	 * @param $_spreadsheetObject Spreadsheet Object encapsulating the spreadsheet details.
	 */
	public function FactoryMethod(SpreadsheetObject $_spreadsheetObject) {
        return new ViewableModifyableSpreadsheetWithValidation($_spreadsheetObject);
    }
}