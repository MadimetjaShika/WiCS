<?php

/**
 * Functional tests for all routes used in the application.
 */
class RoutesTest extends TestCase {

	/**
	 * Tests the accessibility of the welcome page when the user is unauthenticated.
	 * 
	 * @return void
	 */
	public function testWelcomePageRequestUnauthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		$this->call('GET', '/');
		$this->assertResponseOk();
	}

	/**
	 * Tests the accessibility of the welcome page when the user is authenticated.
	 * 
	 * @return void
	 */
	public function testWelcomePageRequestAuthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		$this->logTestUserIn();
		$this->assertEquals(true, Auth::check());

		$this->call('GET', '/');
		$this->assertResponseOk();

		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests the accessibility of the login page when the user is unauthenticated.
	 * 
	 * @return void
	 */
	public function testLogInPageRequestUnauthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		$this->call('GET', 'login');
		$this->assertResponseOk();
	}

	/**
	 * Tests the accessibility of the login page when the user is authenticated.
	 * 
	 * @return void
	 */
	public function testLogInPageRequestAuthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		$this->logTestUserIn();
		$this->assertEquals(true, Auth::check());

		$this->call('GET', 'login');
		$this->assertResponseStatus(401);

		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests the functionality of the 'doLogin' request when the user is unauthenticated.
	 * i.e. tests if an unauthenticated user can be logged-into the application.
	 * 
	 * @return void
	 */
	public function testDoLoginRequestUnauthenticated(){
		$validTestUserName = $this->getTestUserName();
		$validTestUserPassword = $this->getTestUserPassword();
		$invalidUserName = ""; //Get randomly generated 64 character string.
		$invalidUserPassword = ""; //Get randomly generated 64 character string.
		$sqlInjectedUserName = "";
		$sqlInjectedUserPassword = "";

		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		/**************************************/
		/**** Test With Valid Creadentials ****/
		/**************************************/
		$this->call('POST', 'login', ['userName' => $validTestUserName, 'password' => $validTestUserPassword]);
		$this->assertResponseOk();
		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		/*********************************************************/
		/**** Test With Invalid Username And Valid Password ****/
		/*********************************************************/
		$this->call('POST', 'login', ['userName' => $invalidUserName, 'password' => $validTestUserPassword]);
		$this->assertResponseStatus(400);
		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		/*********************************************************/
		/**** Test With Invalid Password And Valid Username ****/
		/*********************************************************/
		$this->call('POST', 'login', ['userName' => $validTestUserName, 'password' => $invalidUserPassword]);
		$this->assertResponseStatus(400);
		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		/*********************************************************/
		/**** Test With Invalid Username And Invalid Password ****/
		/*********************************************************/
		$this->call('POST', 'login', ['userName' => $invalidUserName, 'password' => $invalidUserPassword]);
		$this->assertResponseStatus(400);
		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		/*********************************************************/
		/************* Test With SQL Injected Values *************/
		/*********************************************************/
		$this->call('POST', 'login', ['userName' => $sqlInjectedUserName, 'password' => $sqlInjectedUserPassword]);
		$this->assertResponseStatus(400);
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests the functionality of the 'doLogin' request when the user is authenticated.
	 * An authenticated user should not be able to call this request, i.e. request should
	 * fail if the user is logged-in
	 * 
	 * @return void
	 */
	public function testDoLoginRequestAuthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		$this->logTestUserIn();
		$this->assertEquals(true, Auth::check());

		$this->call('POST', 'login', ['userName' => 'testProfile', 'password' => 'testPassword']);
		$this->assertResponseStatus(403);

		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests accessibility to the register page for an unauthenticated user request.
	 * 
	 * @return void
	 */
	public function testRegisterPageRequestUnauthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		$this->call('GET', 'register');
		$this->assertResponseOk();
	}

	/**
	 * Tests accessibility to the register page for an authenticated user request.
	 * 
	 * @return void
	 */
	public function testRegisterPageRequestAuthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		$this->logTestUserIn();
		$this->assertEquals(true, Auth::check());

		$this->call('GET', 'register');
		$this->assertResponseStatus(401);

		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests if an unauthenticated user can register a new user on the application. If a new user
	 * is successfully registered, the function will thereafter remove the newly created user 
	 * from the database.
	 * 
	 * @return void
	 */
	public function testDoRegisterRequestUnauthenticated(){

	}

	/**
	 * Tests if an authenticated user can register a new user on the application. 
	 * An already authenticated user should not be able to register a user onto the application.
	 * 
	 * @return void
	 */
	public function testDoRegisterRequestAuthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		$this->logTestUserIn();
		$this->assertEquals(true, Auth::check());

		$this->call('POST', 'register');
		$this->assertResponseStatus(401);

		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests if an unauthenticated user can view the profile of a user on the application.
	 * 
	 * @return void
	 */
	public function testViewUserProfileRequestUnauthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		$this->call('GET', 'users/view/TestProfile');
		$this->assertResponseOk();
	}

	/**
	 * Tests if an authenticated user can view the profile of a user on the application.
	 * 
	 * @return void
	 */
	public function testViewUserProfileRequestAuthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		$this->logTestUserIn();
		$this->assertEquals(true, Auth::check());

		$this->call('GET', 'users/view/TestProfile');
		$this->assertResponseOk();

		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests if an unauthenticated user can view the modify user profile page.
	 * An unauthenticated user should not be able to view his/her modify profile page.
	 * 
	 * @return void
	 */
	public function testModifyUserProfileRequestUnauthenticated(){

	}

	/**
	 * Tests if an authenticated user can view the modify user profile page.
	 * 
	 * @return void
	 */
	public function testModifyUserProfileRequestAuthenticated(){

	}

	/**
	 * Test if an unauthenticated user can modify his/her profile.
	 * An unauthenticated user should NOT be able to modify their profile.
	 * 
	 * @return void
	 */
	public function testDoModifyUserProfileRequestUnauthenticated(){

	}

	/**
	 * Test if an authenticated user can modify his/her profile.
	 * 
	 * @return void
	 */
	public function testDoModifyUserProfileRequestAuthenticated(){

	}

	/**
	 * Tests if an unauthenticated user can execute a request to remove an existing
	 * user from the application.
	 * An unauthenticated user should not be able to remove any existing user from 
	 * the application.
	 * 
	 * @return void
	 */
	public function testDoRemoveSpreadsheetForSuperUserRequestUnauthenticated(){

	}

	/**
	 * Tests if only an authenticated super user user can execute a request to remove an existing
	 * user from the application.
	 * 
	 * @return void
	 */
	public function testDoRemoveSpreadsheetForSuperUserRequestAuthenticated(){

	}

	/**
	 * Tests if an unauthenticated user can create a spreadsheet on the application.
	 * An unauthenticated user should not be able to create a spreadsheet on the application.
	 * 
	 * @return void
	 */
	public function testShowCreateSpreadsheetRequestUnauthenticated(){

	}

	/**
	 * Tests if an authenticated user can create a spreadsheet on the application.
	 * 
	 * @return void
	 */
	public function testShowCreateSpreadsheetRequestAuthenticated(){

	}

	/**
	 * Tests if an unauthenticated user can execute a do create spreadsheet request.
	 * An unauthenticated user should NOT be able to create a spreadsheet on the application.
	 * 
	 * @return void
	 */
	public function testDoCreateSpreadsheetRequestUnauthenticated(){

	}

	/**
	 * Tests if an authenticated user can execute a do create spreadsheet request.
	 * 
	 * @return void
	 */
	public function testDoCreateSpreadsheetRequestAuthenticated(){

	}

	/**
	 * Tests if an unauthenticated user can execute a request to get all spreadsheets
	 * authored by a user on the application.
	 * An unauthenticated user should NOT be able to execute this request.
	 * 
	 * @return void
	 */
	public function testGetAllSpreadsheetsRequestUnauthenticated(){

	}

	/**
	 * Tests if an authenticated user can execute a request to get all spreadsheets
	 * authored by him/her on the application.
	 * 
	 * @return void
	 */
	public function testGetAllSpreadsheetsRequestAuthenticated(){

	} 

	/**
	 * Tests if an unauthenticated user can remove a spreadsheet authored by an existing user
	 * on the application.
	 * An unauthenticated user should NOT be able to remove any spreadsheets on the application.
	 * 
	 * @return void
	 */
	public function testRemoveSpreadsheetRequestUnauthenticated(){

	}

	/**
	 * Tests if an authenticated user can remove a spreadsheet authored by him/her on the application.
	 * 
	 * @return void
	 */
	public function testRemoveSpreadsheetRequestAuthenticated(){

	}
}