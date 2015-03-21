<?php

/**
 * Functional tests for all routes used in the application.
 */
class RoutesTest extends TestCase {

	/**
	 * Tests the accessibility of the welcome page given the user is not singed in.
	 *  
	 * @return void
	 */
	public function notSignedInWelcomePageTest(){
		//Check that there is currently no user logged in.
		$this->assertEquals(false, Auth::check());

		//Check accessibility of home page
		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests home page accessibility when user is signed in.
	 * 
	 * @return void
	 */
	public function signedInHomePageTest(){
		//Check that a user is currently logged in.
		$this->assertEquals(true, Auth::check());

		//Check accessibility of home page
		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests accessibility of the login page.
	 * 
	 * @return void
	 */
	public function logInPageRequestTest(){
		//Test accessibility when the user is not signed in already.
		$this->assertEquals(false, Auth::check());
		$response = $this->call('GET', 'login');
		$this->assertEquals(200, $response->getStatusCode());

		//Test accessibility when the user is already signed in.
		$this->assertEquals(true, Auth::check());
		$response = $this->call('GET', 'login');
		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Test if the doLogin post requests works as it should.
	 * 
	 * @return void
	 */
	public function doLoginRequestTest(){
		$testUsername = "";
		$testInvalidUsername = "";
		$testPassword = "";
		$testInvalidPassword = "";

		/**************************************/
		/**** Test With Valid Creadentials ****/
		/**************************************/
		$this->assertEquals(false, Auth::check());

		$response = $this->call('POST', 'doLogin');
		$this->assertEquals(200, $response->getStatusCode());

		/*********************************************************/
		/**** Test With Invalid Username And Correct Password ****/
		/*********************************************************/
		$this->assertEquals(false, Auth::check());

		$response = $this->call('POST', 'doLogin');
		$this->assertEquals(400, $response->getStatusCode());

		/*********************************************************/
		/**** Test With Invalid Password And Correct Username ****/
		/*********************************************************/
		$this->assertEquals(false, Auth::check());

		$response = $this->call('POST', 'doLogin');
		$this->assertEquals(400, $response->getStatusCode());

		/*********************************************************/
		/**** Test With Invalid Username And Invalid Password ****/
		/*********************************************************/
		$this->assertEquals(false, Auth::check());

		$response = $this->call('POST', 'doLogin');
		$this->assertEquals(400, $response->getStatusCode());

		/*********************************************************/
		/************* Test With SQL Injected Values *************/
		/*********************************************************/
		$this->assertEquals(false, Auth::check());

		$response = $this->call('POST', 'doLogin');
		$this->assertEquals(400, $response->getStatusCode());
	}

	/**
	 * [registerPageRequestTest description]
	 * @return void
	 */
	public function registerPageRequestTest(){
		//Test accessibility when the user is not signed in already.
		$this->assertEquals(false, Auth::check());
		$response = $this->call('GET', 'register');
		$this->assertEquals(200, $response->getStatusCode());

		//Test accessibility when the user is already signed in.
		$this->assertEquals(true, Auth::check());
		$response = $this->call('GET', 'register');
		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests register page accessibility when user not signed in.
	 * 
	 * @return void
	 */
	public function doRegisterUserTest(){
		//Ensure that no user is currently logged in.
		$this->assertEquals(false, Auth::check());

		$response = $this->call('POST', 'doRegister');
		$this->assertEquals(200, $response->getStatusCode());

		/*********************************************************/
		/************* Test With Invalid User Input **************/
		/*********************************************************/
	}

	/**
	 * Tests user view profile page accessibility.
	 * 
	 * @return void
	 */
	public function viewUserProfileTest(){
		$response = $this->call('GET', 'showProfile');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests modify user page accessibility.
	 * 
	 * @return void
	 */
	public function modifyUserProfileTest(){
		$response = $this->call('GET', '');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests remove user page accessibility.
	 * 
	 * @return void
	 */
	public function doRemoveSpreadsheetForSuperUserTest(){
		$response = $this->call('GET', 'doRemoveSpreadsheetForSuperUser');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests create spreadsheet page accessibility.
	 * 
	 * @return void
	 */
	public function showCreateSpreadsheetTest(){
		$response = $this->call('GET', 'showCreateSpreadsheet');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Test the route to process the reqeust to create a spreadsheet.
	 * 
	 * @return void
	 */
	public function doCreateSpreadsheet(){

	}

	/**
	 * Tests view spreadsheet page accessibility.
	 * 
	 * @return void
	 */
	public function getAllSpreadsheetsTest(){
		$response = $this->call('GET', 'getAllSpreadsheets');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests remove spreadsheet page accessibility..
	 * 
	 * @return void
	 */
	public function removeSpreadsheetTest(){
		$response = $this->call('GET', 'doRemoveSpreadsheets');

		$this->assertEquals(200, $response->getStatusCode());
	}

}