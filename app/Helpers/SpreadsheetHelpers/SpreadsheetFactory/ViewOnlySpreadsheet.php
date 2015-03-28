<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Concrete Product' in the Factory Design Pattern.
 *
 * This class creates a spreadsheet that only has read-only priviliedges. These priviladges
 * are default for all spreadsheets. 
 */
class ViewOnlySpreadsheet extends AbstractSpreadsheet{

	/**
	 * View Only Spreadsheet constructor.
	 * 
	 * @param $_spreadsheetObject Spreadsheet Object encapsulating the spreadsheet details.
	 */
	public function __construct(SpreadsheetObject $_spreadsheetObject) {
       parent::__construct($_spreadsheetObject);
   	}
}