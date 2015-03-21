<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Abstract Creator' in the Factory Design Pattern. 
 */
abstract class AbstractSpreadsheetCreator{

	/**
	 * Factory method to produce and return a new spreadsheet.
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
	 * @param $_validationRules JSON object with the validation rules to be enforced for this spreadsheet. This
	 * field is conditional on the type of spreadsheet to  be created.
	 */
	public abstract function FactoryMethod($_title, $_description, $_owner, $_creationDate, $_lastModifiedDate,  $_validationRules);
}