<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * Defines and houses all functionality related to managing spreadsheets.
 */
class ManageSpreadsheetsHelper{
	
	//Member variables used in the class
	//...


	/**
	 * Creates and returns an instance of the newly created View Only Spreadsheet.
	 *
	 * @return Returns an instance of ViewOnlySpreadsheet or throws an exception 
	 * with a descriptive error message if the spreadsheet could not be created.
	 *
	 * @throws 
	 */
	public function createViewOnlySpreadsheet(){

	}

	/**
	 * Create and returns an instance of the newly created View/Modify Validation-less
	 * Spreadsheet.
	 * 
	 * @return Returns an instance of ViewableModifyableSpreadsheetWithoutValidation or throws
	 * an exception with a descriptive error message if the spreadsheet could not be created.
	 *
	 * @throws 
	 */
	public function createViewableModifyableSpreadsheetWithoutValidation(){

	}

	/**
	 * Creartes and returns an instance of the newly created View/Modify Validation enforced
	 * Spreadsheet.
	 *
	 * @return Returns an instance of ViewableModifyableSpreadsheetWithtValidation or throws
	 * an exception with a descriptive error message if the spreadsheet could not be created.
	 *
	 * @throws 
	 */
	public function createViewableModifyableSpreadsheetWithValidation(){

	}

	/**
	 * Searches for and returns an instance of the spreadsheet passed as parameter.
	 *
	 * @return Returns an instance of the spreadsheet if the spreadsheet was found, 
	 * else throws an exception with a message stating that the specified spreadsheet
	 * could not be found.
	 *
	 * @throws 
	 */
	public function getSpreadsheet($spreadsheetInstance){

	}

	/**
	 * Deletes the given spreadsheet (passed as parameter) from the database.
	 *
	 * @param spreadsheetInstance An instance of the spreadsheet to be deleted from 
	 * the database.
	 *
	 * @return Returns true if the delete operation was successful or throws an exception
	 * with a descriptive error message if the operation was not successful.
	 *
	 * @throws 
	 */
	public function deleteSpreadsheet($spreadsheetInstance){

	}

	/**
	 * Merges the given spreadsheets (passed in parameters) into a single new
	 * spreadsheet and returns an instance of the newly created spreadsheet. 
	 * 
	 * Unless otherwise stated, the newly created spreadsheet will, by default, be of 
	 * the type of the two spreadsheets being merged. If the two spreadsheets being 
	 * merged are not of the same type, an output/result type must be specified as 
	 * parameter. The merge operation will fail if the given spreadsheets are of different 
	 * types and the output/result spreadsheet type is not specified.
	 *
	 * @param spreadsheetInstance1 The first spreadsheet to be considered for the merge operation.
	 *
	 * @param spreadsheetInstance2 The second spreadsheet to be considered for the merge operation.
	 *
	 * @param resultType The type of the result spreadsheet from the merge operation.
	 *
	 * @return Returns true if the operation was successful or throws an exception with a 
	 * descriptive error message if the operation was not successful.
	 *
	 * @throws 
	 */
	public function mergeSpreadsheets($spreadsheetInstance1, $spreadsheetInstance2, $resultType){

	}

	/**
	 * 
	 */
	public function downloadSpreadsheet($spreadsheetInstance){

	}

	/**
	 * 
	 */
	public function createAndDownloadPDFVersionOfSpreadsheet($spreadsheetInstance1){

	}
}