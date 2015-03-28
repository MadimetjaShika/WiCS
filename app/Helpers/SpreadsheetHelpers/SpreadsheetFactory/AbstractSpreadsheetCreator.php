<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Abstract Creator' in the Factory Design Pattern. 
 */
abstract class AbstractSpreadsheetCreator{

	/**
	 * Factory method to produce and return a new spreadsheet.
	 * 
	 * @param $_spreadsheetObject Spreadsheet Object encapsulating the spreadsheet details.
	 */
	public abstract function FactoryMethod(SpreadsheetObject $_spreadsheetObject);
}