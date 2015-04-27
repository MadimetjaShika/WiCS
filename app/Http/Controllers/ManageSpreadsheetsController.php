<?php namespace WiCS\Http\Controllers;

use WiCS\Http\Requests;
use WiCS\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ManageSpreadsheetsController extends Controller {

	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Display a listing of all the spreadsheets for a user
	 *
	 * @return Response
	 */
	public function showSpreadsheets(){
		return view('spreadsheets.spreadsheetList')
			->with('spreadsheetList', spreadsheetList());
	}

	/**
	 * Display the specified spreasheet.
	 *
	 * @param  int  $id
	 * 
	 * @return Response
	 */
	public function showSpreadsheet($id){
		return view('spreadsheets.viewSpreadsheet')
			->with('spreadsheet', getSpreadsheet());
	}

	/**
	 * Render the page for creating a new spreadsheet.
	 *
	 * @return Response
	 */
	public function showCreateSpreadsheet(){
		return view('spreadsheets.createSpreadsheet');
	}

	/**
	 * Process the request to create a spreadsheet.
	 * 
	 * @return Response
	 */
	public function doCreateSpreadsheet(){
		if(/*Creating view only spreadsheet*/)
			createViewOnlySpreadsheet();
		else if(/*Creating viewable/modifyable without validation spreadsheet*/)
			createViewableModifyableSpreadsheetWithoutValidation();
		else if(/*Creating viewable/modifyable with validation spreadsheet*/)
			createViewableModifyableSpreadsheetWithValidation();
	}
	
	/**
	 * Modify the specified spreadsheet.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function modifySpreadsheet($id){
		
	}

	/**
	 * Download the specified spreadsheet.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function downloadSpreadsheet($id){
		
	}

	/**
	 * Remove a user's spreadsheet from the system.
	 * 
	 * @param  $item the spreadsheet to be removed.
	 * 
	 * @return Response
	 */
	public function doRemoveSpreadsheets($item){

	}
}