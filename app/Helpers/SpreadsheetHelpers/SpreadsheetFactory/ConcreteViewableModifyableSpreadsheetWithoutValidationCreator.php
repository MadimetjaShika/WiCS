<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Concrete Creator' in the Factory Design Pattern. 
 */
class ConcreteViewableModifyableSpreadsheetWithoutValidationCreator extends AbstractSpreadsheetCreator{
	
	/**
	 * Factory method to produce and return a new viewable and modifiable (with no validation enforced) spreadsheet.
	 * 
	 * @param $_spreadsheetObject Spreadsheet Object encapsulating the spreadsheet details.
	 */
	public function FactoryMethod(SpreadsheetObject $_spreadsheetObject) {
        return new ViewableModifyableSpreadsheetWithoutValidation($_spreadsheetObject);
    }
}