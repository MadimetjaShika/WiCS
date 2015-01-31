<?php

/**
 * Spreadsheet Controller.
 *
 * All Spreadsheet related actions and activity are proccessed by this controller.
 */
class SpreadsheetController extends BaseController {

	/**
	 * This function returns a view of all the spreadsheets a user currently has available
	 * @return Returns a view of all the spreadsheets linked to the calling user.
	 */
	public function showSpreadsheet()
	{
		//There are two cases here: Calling user is an admin or a contributer. 
		//-	In the case that a user is an admin, the function needs to return spreadsheets that user 
		//	is an admin of and Spreadsheet that user contributes to,
		//-	In the case that the user is a contributer, the function should only return the 
		//	spreadsheets that user contributes to.
		
		$sheets = null;
		$userGroup = null;

		if ( Auth::user()->userGroup == 'Root' ){
			$sheets = nSpreadsheet::all();
		}
		else if ( Auth::user()->userGroup == 'Administrator' ){
			$sheets = array();
			array_push($sheets, DatabaseHelpers::getAuthorSpreadsheetList());
			array_push($sheets, DatabaseHelpers::getContributorSpreadsheetList());
			//$sheets = DatabaseHelpers::getFullUserSheetList();
		}
		else if ( Auth::user()->userGroup == 'Contributor' ){
			$sheets = DatabaseHelpers::getContributorSpreadsheetList();
		}
		else
			$sheets = null;

		//Redirect the user to the view spreadsheets page, passing the relevant spreadsheets to the page.
		return View::make('spreadsheets.view_spreadsheets')
			->with('sheets', $sheets)
			->with('userGroup', Auth::user()->userGroup);
	}

	/**
	 * This function returns the specified spreadsheet.
	 * @param  String $item The spreadsheet of interest.
	 * @return Returns a view of the specified spreadsheet.
	 */
	public function getSpreadsheet($item)
	{
		//Guard against null or empty $item
		if( $item == null || $item == '' || $item == ' ' )
			return Redirect::to('spreadsheet/view');

		//Get the sheet file.
		$sheetNode = null;
		$sheetNode = nSpreadsheet::where('title', '=', $item)->first();

		if ( $sheetNode == null ){
			return Redirect::to('spreadsheet/view')
				->with('flash_error', 'It seems the file you are attempting to access has either been removed/close, or it does not exist. If you believe this is in error, please contact your administrator.');
		}

		$sheetTitle = $sheetNode->title;
		$sheetDescription = $sheetNode->description;
		$sheetLocation = $sheetNode->location;
		$author = $sheetNode->author->firstName.' '.$sheetNode->author->lastName;
		$status = $sheetNode->status;
		$closeDate = $sheetNode->closeDate;

		//echo $sheetLocation;
		//die();

		//$sheetLocation = 'C:\xampp\htdocs\Std_Bank_Reccap\app\storage\files\excel\2015 Travel Recon.xlsx';
		$workbookTitle = '';
		/*$sheetResults = Excel::load($sheetLocation, function($reader) {
			//print_r($reader);
			echo $reader->all();
			die();
			$workbookTitle = $reader->getTitle();
		})->get()->toArray();*/
		//echo $sheetLocation;
		//die();
		/*$sheetResults = Excel::load($sheetLocation, function($reader){
			$workbookTitle = $reader->getTitle();
		})->get()->toArray();

		//echo 'location : '.$sheetLocation.'<br/>';
		//echo $sheetResults;
		//die();

		$columnHeadings = array_keys($sheetResults[0]);*/

		//Get the spreadsheet validationRules
		//$validationRules = json_decode($sheetNode->validationRules);
		$validationRules = JSON_decode($sheetNode->validationRules);
		//print_r($validationRules);
		//die();

		//print_r($validationRules);
		//die();

		//Redirect the user to the view spreadsheet page, passing the relevant spreadsheet to the page.
		return View::make('spreadsheets.display_spreadsheet')
			->with('title', $sheetTitle)
			->with('description', $sheetDescription)
			->with('author', $author)
			->with('status', $status)
			->with('closeDate', $closeDate)
			//->with('columnHeadings', $columnHeadings)
			//->with('rows', $sheetResults)
			->with('validationRules', $validationRules);
	}

	/**
	 * This function returns a view allowing an admin user to create a Spreadsheet.
	 * @return Returns a view allowing the user to specify the new spreadsheet properties
	 */
	public function createSpreadsheet()
	{
		//Get the current user's contributor list
		$contributorList = DatabaseHelpers::getAdminsContributorUserList();
		
		return View::make('spreadsheets.create_spreadsheets')
					->with('contributors', $contributorList);
	}

	/**
	 * This function processes a request to create a Spreadsheet and adds the new Spreadsheet to the system
	 * @return Returns the user to the create spreadsheet page with the result this function. 
	 */
	public function doCreateSpreadsheet()
	{
		$temp = Input::get('newFieldsInput');

		$newFields = explode(",", $temp);

		$data = Input::only(
            'title',
            'description',
            'closeDate'
        );

        $userFieldValidationRules = array();
        $spreadsheetFielddNames = array();
        
        foreach ($newFields as $field) {
        	$pos = strpos($field, "_");
        	$number = substr($field, $pos+1);
        	$fn = "fieldName_".$number;
        	$fd = "fieldDescription_".$number;
        	$ft = "fieldType_".$number;

        	array_push($spreadsheetFielddNames, Input::get($fn));

        	$temp = array();
        	array_push($temp, Input::get($fn));
        	array_push($temp, Input::get($fd));
        	array_push($temp, Input::get($ft));

        	$fieldType = Input::get($ft);

        	$contraints = array();

        	if( $fieldType == 'alpha' ){
        		$ml = "maxLen".$number;
        		$minLength = Input::get($ml);
        		array_push($contraints, $minLength);
        	}
        	else if( $fieldType == 'alphaNumeric' ){
        		$minl = "minLen".$number;
        		$maxl = "maxLen".$number;
        		$minLength = Input::get($minl);
        		$maxLength = Input::get($maxl);
        		array_push($contraints, $minLength);
        		array_push($contraints, $maxLength);
        	}
        	else if( $fieldType == 'costCentre' ){
        		array_push($contraints, "cc");
        	}
        	else if( $fieldType == 'currency' ){
        		$ct = "currencyType_".$number;
        		$currType = Input::get($ct);
        		array_push($contraints, $currType);
        	}
        	else if( $fieldType == 'date' ){
        		array_push($contraints, "date");
        	}
        	else if( $fieldType == 'dropDown' ){

        	}
        	else if( $fieldType == 'numeric' ){
        		$minv = "minVal".$number;
        		$maxv = "maxVal".$number;
        		$minVal = Input::get($minv);
        		$maxVal = Input::get($maxv);
        		array_push($contraints, $minVal);
        		array_push($contraints, $maxVal);
        	}

        	array_push($temp, $contraints);
        	array_push($userFieldValidationRules, $temp);
        }

        $jsonValidationRules = json_encode($userFieldValidationRules);

        $spreadsheetTitle = Input::get('title');
		$spreadsheetDescription = Input::get('description');
		$spreadsheetCloseDate = Input::get('closeDate');
		$contributors = Input::get('contributors');

		echo '<table>';
		/*foreach ($_POST as $key => $value) {
	        echo "<tr>";
	        	echo "<td>";
	        		echo $key;
	        	echo "</td>";
	        	echo "<td>";
	        		echo $value;
	        	echo "</td>";
	        echo "</tr>";
	    }*/
	    echo '</table><br/><br/>';

	    echo 'Variable Values<br/>';
	    echo 'title : '.$spreadsheetTitle.'<br/>';
	    echo 'description'.$spreadsheetDescription.'<br/>Json Object :';
	    echo $jsonValidationRules;

        //Create new spreadsheet and store rules in new graph object
        Excel::create($spreadsheetTitle)->sheet($spreadsheetTitle)->with($spreadsheetFielddNames)->store('csv', storage_path('files/excel'));

        $newSheet = null;
        $newSheet = nSpreadsheet::create([
			'title' => Input::get('title'),
			'description' => Input::get('description'),
			'closeDate' => Input::get('closeDate'),
			'status' => 'Open',
			'validationRules' => $jsonValidationRules,
			'location' => '\app\storage\files\excel\\'.$spreadsheetTitle.'.csv'
		]);

        if ( $newSheet == null ){
        	return Redirect::to('spreadsheet/create')
			    	->with('flash_error', 'There was a problem creating the new sheet. Please re-attempt. If this persists, please contact you administrator or the system administrator.'); 
        }
        else{
        	$callingUserGraphID = Auth::user()->graphId;
			$currentUser = null;

			if ( Auth::user()->userGroup == 'Root' ){
				$currentUser = nRootUser::find($callingUserGraphID);
				if ( $currentUser == null )
					  return Redirect::to('spreadsheet/create')
						->with('flash_notice', 'The sheet has been successfully created. However there was a  problem setting you as the author of the sheet. Please inform the System Administrator ASAP as this WILL cause problems!');
				
				$currentUser->authoredSpreadsheets()->save($newSheet);
			}
			else if ( Auth::user()->userGroup == 'Administrator' ){
				$currentUser = nAdminUser::find($callingUserGraphID);
				if ( $currentUser == null )
					  return Redirect::to('spreadsheet/create')
						->with('flash_notice', 'The sheet has been successfully created. However there was a  problem setting you as the author of the sheet. Please inform the System Administrator ASAP as this WILL cause problems!');
				
				$currentUser->authoredSpreadsheets()->save($newSheet);
			}
			else{
				return Redirect::to('spreadsheet/create')
			    	->with('flash_error', 'It seems you do not have the neccessary privileges to perform the requested task. If you believe this is in error, please speak to your administrator or to the system administrator.'); 
			}

			//Get the graph object for each of the contributors
		    echo "<br/><br/>";
		    foreach ($contributors as $contributor) {
		    	$name = substr($contributor, strpos($contributor, " "));
		    	$contr = nContributorUser::where('firstName', '=', $name)->first();
				if ( $contr == null ){
					return Redirect::to('spreadsheet/create')
						->with('flash_error', 'The user ['.$name.'] could not be added as a contributor.');
				}

				$contr->contributedSheets()->save($newSheet);
		    }

	        return Redirect::to('spreadsheet/create')
				->with('flash_notice', 'The Spreadsheet has been successfully created!');
        }
	}

	/**
	 * This function returns a view allowing the user to update data within a spreadsheet.
	 * @return Returns the user to a view allowing them to modify a spreadsheets.
	 */
	public function updateSpreadsheet()
	{
		return View::make('spreadsheets.update_spreadsheets');
	}

	/**
	 * This function processes a request to update a particular Spreadsheet's data.
	 * @return Returns the user the update spreadsheet view with the results of this function.
	 */
	public function doUpdateSpreadsheet()
	{
		
	}

	/**
	 * This function returns a view allowing an admin user to modify a spreadsheets properties.
	 * @return Returns a view allowing the user to modify the properties of a spreadsheet.
	 */
	public function modifySpreadsheet()
	{
		return View::make('spreadsheets.modify_spreadsheets');
	}

	/**
	 * This function processes a request to modify a Spreadsheet's structure or properties.
	 * @return Returns the user to the modify spreadsheet view with the results ot this funtcion.
	 */
	public function doModifySpreadsheet()
	{

	}

	/**
	 * This function returns a view allowing an admin user to remove a Spreadsheet from the available Spreadsheet list.
	 * @return Returns a view allowing the user to remove exisitng spreadsheets.
	 */
	public function removeSpreadsheet()
	{
		return View::make('spreadsheets.remove_spreadsheets');
	}

	/**
	 * This function processes a request to close or remove a Spreadsheet from the application.
	 * @return Returns the user to the remove spreadsheet view with the results of this function.
	 */
	public function doRemoveSpreadsheet()
	{

	}

	/**
	 * This function returns a view allowing the user to download an existing Spreadsheet in a specified format.
	 * @return Returns the user to a view allowing them to specify the spreadsheet they wish to download.
	 */
	public function downloadSpreadsheet()
	{
		return View::make('spreadsheets.download_spreadsheets');
	}

	/**
	 * This function allows a user to submit a spreadsheet.
	 * @return Returns the user to the submit spreadsheet view
	 */
	public function submitSpreadsheet()
	{
		return View::make('spreadsheets.submit_spreadsheets');
	}
}
