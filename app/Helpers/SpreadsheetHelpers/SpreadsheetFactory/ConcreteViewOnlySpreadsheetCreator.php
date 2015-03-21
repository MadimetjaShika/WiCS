<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Concrete Creator' in the Factory Design Pattern. 
 */
class ConcreteViewOnlySpreadsheetCreator extends AbstractSpreadsheetCreator{
	
	/**
	 * Factory method to produce and return a new viewable (read-only) spreadsheet.
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
	 * @param $_validationRules This field MUST be null and ignored.
	 */
	public function FactoryMethod($_title, $_description, $_owner, $_creationDate, $_lastModifiedDate, $_validationRules) {
        return new ViewOnlySpreadsheet($_title, $_description, $_owner, $_creationDate, $_lastModifiedDate);
    }
}