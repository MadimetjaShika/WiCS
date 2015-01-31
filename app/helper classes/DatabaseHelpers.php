<?php

/**
 * Helper class housing general and common database interaction functionality.
 */
class DatabaseHelpers {

	/*****************************************************************/
	/*****************************************************************/
	/******************User Related Helper Functions*****************/
	/*****************************************************************/
	/*****************************************************************/

	/**
	 * This function returns an array of all the user's currently on the system.
	 * @return String array of all users currently on the system.
	 */
	public static function getAllUsers()
	{
		$administrators = nAdminUser::all();
		$contributers = nContributorUser::all();

		$users = array();

		foreach ($administrators as $node) {
			array_push($users, $node);
		}

		foreach ($contributers as $node) {
			array_push($users, $node);
		}

		return $users;
	}

	/**
	 * This function returns a list of contributor users for which the currently authenticated administrator user
	 * is an administrator of.
	 * @return [type] [description]
	 */
	public static function getAdminsContributorUserList()
	{
		$callingUserGraphID= Auth::user()->graphId;
		$contributers = nContributorUser::with('administrator')->get();

		$users = array();

		foreach ($contributers as $node) {
			if ( $node->administrator != null )
				if ( $node->administrator['id'] === $callingUserGraphID ){
					array_push($users, $node);
				}
		}

		return $users;
	}

	/**
	 * This fucntion returns a list of all the administrators currently on the system.
	 * @return String array of all the administrators currently on the system.
	 */
	public static function getSuperUsersAdminUserList()
	{
		$callingUserGraphID= Auth::user()->graphId;
		$administrators = nAdminUser::with('super')->get();
		$contributors = nContributorUser::with('super')->get();

		$users = array();

		foreach ($administrators as $node) {
			if ( $node->super != null )
				if ( $node->super['id'] === $callingUserGraphID ){
					array_push($users, $node);
				}
		}

		foreach ($contributors as $node){
			if ( $node->super != null )
				if ( $node->super['id'] === $callingUserGraphID ){
					array_push($users, $node);
				}
		}

		return $users;
	}

	/*****************************************************************/
	/*****************************************************************/
	/******************Sheet Related Helper Functions*****************/
	/*****************************************************************/
	/*****************************************************************/

	/**
	 * This function returns a list of all the spreadsheets currently on the system.
	 * @return [type] [description]
	 */
	public static function getSuperUserSpreadsheetList()
	{
		$callingUserGraphID= Auth::user()->graphId;
		$authoredSheets = nSpreadsheet::with('super')->get();

		$sheets = array();

		foreach ($authoredSheets as $sheet) {
			if ( $sheet->author != null )
				if ( $sheet->super['id'] === $callingUserGraphID ){
					array_push($sheets, $sheet);
				}
		}
		
		return $sheets;
	}

	/**
	 * This function returns a list of all the spreadsheets the current user is an administrator of.
	 * @return String array of all spreadsheets the currently loggedin user is an administrator of.
	 */
	public static function getAuthorSpreadsheetList()
	{
		$callingUserGraphID= Auth::user()->graphId;
		$authoredSheets = nSpreadsheet::with('author')->get();

		$sheets = array();

		foreach ($authoredSheets as $sheet) {
			if ( $sheet->author != null )
				if ( $sheet->author['id'] === $callingUserGraphID ){
					array_push($sheets, $sheet);
				}
		}

		return $sheets;
	}

	/**
	 * This function returns a list of all the spreadsheets the current user contributes to.
	 * @return String array of all the spreadsheets the current user contributes to.
	 */
	public static function getContributorSpreadsheetList()
	{
		$callingUserGraphID= Auth::user()->graphId;
		$contributedSheets = nSpreadsheet::with('contributor')->get();

		$sheets = array();

		foreach ($contributedSheets as $sheet) {
			if ( $sheet->contributor != null )
				foreach ($sheet->contributor as $contributor) {
					if ( $contributor['id'] === $callingUserGraphID )
						array_push($sheets, $sheet);
				}
		}

		return $sheets;
	}

	/**
	 * [getFullUserSheetList description]
	 * @return [type] [description]
	 */
	public static function getFullUserSpreadsheetList()
	{
		$callingUserGraphID= Auth::user()->graphId;

		//The following function seems to have a problem... This seems to be a NeoEloquent issue...
		//$result =  nSheet::where('id', '=', $callingUserGraphID);
		
		//Hence the longer inefficient work-around..
		$result = nSpreadsheet::all();
		$sheets = array();

		foreach ($result as $sheet) {
			if ( $sheet->author != null )
				if ( ($sheet->author->id === $callingUserGraphID) )
					array_push($sheets, $sheet);
		}

		return $sheets;
	}
   	

}