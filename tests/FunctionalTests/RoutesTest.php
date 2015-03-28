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
	public function testNotSignedInWelcomePageRequest(){
		//Check that there is currently no user logged in.
		$this->assertEquals(false, Auth::check());

		//Check accessibility of home page
		$this->call('GET', '/');
		$this->assertResponseOk();
	}

	/**
	 * Tests home page accessibility when user is signed in.
	 * 
	 * @return void
	 */
	public function testSignedInHomePageRequest(){
		//Check that a user is currently logged in.
		$this->assertEquals(true, Auth::check());

		//Check accessibility of home page
		$this->call('GET', '/');
		$this->assertResponseOk();	}

	/**
	 * Tests accessibility of the login page.
	 * 
	 * @return void
	 */
	public function testLogInPageRequest(){
		//Test accessibility when the user is not signed in already.
		$this->assertEquals(false, Auth::check());
		$this->call('GET', 'login');
		$this->assertResponseOk();

		//Test accessibility when the user is already signed in.
		$this->assertEquals(true, Auth::check());
		$this->call('GET', 'login');
		$this->assertResponseOk();
	}

	/**
	 * Test if the doLogin post requests works as it should.
	 * 
	 * @return void
	 */
	public function testDoLoginRequest(){
		$testUsername = "";
		$testInvalidUsername = "";
		$testPassword = "";
		$testInvalidPassword = "";

		/**************************************/
		/**** Test With Valid Creadentials ****/
		/**************************************/
		$this->assertEquals(false, Auth::check());

		$this->call('POST', 'doLogin');
		$this->assertResponseOk();

		/*********************************************************/
		/**** Test With Invalid Username And Correct Password ****/
		/*********************************************************/
		$this->assertEquals(false, Auth::check());

		$this->call('POST', 'doLogin');
		$this->assertResponseStatus(400);

		/*********************************************************/
		/**** Test With Invalid Password And Correct Username ****/
		/*********************************************************/
		$this->assertEquals(false, Auth::check());

		$this->call('POST', 'doLogin');
		$this->assertResponseStatus(400);

		/*********************************************************/
		/**** Test With Invalid Username And Invalid Password ****/
		/*********************************************************/
		$this->assertEquals(false, Auth::check());

		$this->call('POST', 'doLogin');
		$this->assertResponseStatus(400);

		/*********************************************************/
		/************* Test With SQL Injected Values *************/
		/*********************************************************/
		$this->assertEquals(false, Auth::check());

		$this->call('POST', 'doLogin');
		$this->assertResponseStatus(400);
	}

	/**
	 * [registerPageRequestTest description]
	 * @return void
	 */
	public function testRegisterPageRequest(){
		//Test accessibility when the user is not signed in already.
		$this->assertEquals(false, Auth::check());
		$this->call('GET', 'register');
		$this->assertResponseOk();

		//Test accessibility when the user is already signed in.
		$this->assertEquals(true, Auth::check());
		$this->call('GET', 'register');
		$this->assertResponseOk();
	}

	/**
	 * Tests register page accessibility when user not signed in.
	 * 
	 * @return void
	 */
	public function testDoRegisterUserRequest(){
		//Ensure that no user is currently logged in.
		$this->assertEquals(false, Auth::check());

		$this->call('POST', 'doRegister');
		$this->assertResponseOk();

		/*********************************************************/
		/************* Test With Invalid User Input **************/
		/*********************************************************/
	}

	/**
	 * Tests user view profile page accessibility.
	 * 
	 * @return void
	 */
	public function testViewUserProfileRequest(){
		$this->call('GET', 'showProfile');

		$this->assertResponseOk();
	}

	/**
	 * Tests modify user page accessibility.
	 * 
	 * @return void
	 */
	public function testModifyUserProfileRequest(){
		$this->call('GET', '');

		$this->assertResponseOk();
	}

	/**
	 * Tests remove user page accessibility.
	 * 
	 * @return void
	 */
	public function testDoRemoveSpreadsheetForSuperUserRequest(){
		$this->call('GET', 'doRemoveSpreadsheetForSuperUser');

		$this->assertResponseOk();
	}

	/**
	 * Tests create spreadsheet page accessibility.
	 * 
	 * @return void
	 */
	public function testShowCreateSpreadsheetRequest(){
		$this->call('GET', 'showCreateSpreadsheet');

		$this->assertResponseOk();
	}

	/**
	 * Test the route to process the reqeust to create a spreadsheet.
	 * 
	 * @return void
	 */
	public function testDoCreateSpreadsheetRequest(){

	}

	/**
	 * Tests view spreadsheet page accessibility.
	 * 
	 * @return void
	 */
	public function testGetAllSpreadsheetsRequest(){
		$this->call('GET', 'getAllSpreadsheets');

		$this->assertResponseOk();
	}

	/**
	 * Tests remove spreadsheet page accessibility..
	 * 
	 * @return void
	 */
	public function testRemoveSpreadsheetRequest(){
		$this->call('GET', 'doRemoveSpreadsheets');

		$this->assertResponseOk();
	}

}