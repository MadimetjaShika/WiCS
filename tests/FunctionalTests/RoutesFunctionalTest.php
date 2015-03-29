<?php

/**
 * Functional tests for all routes used in the application.
 */
class RoutesFunctionalTest extends TestCase {

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
	 * Tests the functionality of the 'doLogin' request when the user is unauthenticated and 
	 * the user provides valid login credentials.
	 * 
	 * @return void
	 */
	public function testDoLoginRequestWithValidUsernameAndValidPasswordUnauthenticated(){
		$validTestUserName = $this->getTestUserName();
		$validTestUserPassword = $this->getTestUserPassword();

		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		$this->call('POST', 'login', ['userName' => $validTestUserName, 'password' => $validTestUserPassword]);
		$this->assertResponseOk();
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		
	}

	/**
	 * Tests the functionality of the 'doLogin' request when the user is unauthenticated and 
	 * the user provides an invalid user name and a valid password (i.e. a password existing in the database).
	 * 
	 * @return void
	 */
	public function testDoLoginRequestWithInvalidUsernameAndValidPasswordUnauthenticated(){
		$validTestUserPassword = $this->getTestUserPassword();
		$invalidUserName = ""; //Get randomly generated 64 character string.

		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		$this->call('POST', 'login', ['userName' => $invalidUserName, 'password' => $validTestUserPassword]);
		$this->assertResponseStatus(400);
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests the functionality of the 'doLogin' request when the user is unauthenticated and 
	 * the user provides a valid user name and an ivalid password.
	 * 
	 * @return void
	 */
	public function testDoLoginRequestWithValidUsernameAndInvalidPasswordUnauthenticated(){
		$validTestUserName = $this->getTestUserName();
		$invalidUserPassword = ""; //Get randomly generated 64 character string.

		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		$this->call('POST', 'login', ['userName' => $validTestUserName, 'password' => $invalidUserPassword]);
		$this->assertResponseStatus(400);
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests the functionality of the 'doLogin' request when the user is unauthenticated and 
	 * the user provides invalid login credentials (invalid user name and invalid password).
	 * 
	 * @return void
	 */
	public function testDoLoginRequestWithInvalidUsernameAndInvalidPasswordUnauthenticated(){
		$invalidUserName = ""; //Get randomly generated 64 character string.
		$invalidUserPassword = ""; //Get randomly generated 64 character string.

		$this->checkIfUserLoggedInAndlogCurrentUserOut();

		$this->call('POST', 'login', ['userName' => $invalidUserName, 'password' => $invalidUserPassword]);
		$this->assertResponseStatus(400);
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
	}

	/**
	 * Tests the functionality of the 'doLogin' request when the user is unauthenticated and 
	 * the user provides SQL Injection values in the user name and password fields.
	 * 
	 * @return void
	 */
	public function testDoLoginRequestWithSQLInjectedValuesUnauthenticated(){
		$sqlInjectedUserName = "";
		$sqlInjectedUserPassword = "";

		$this->checkIfUserLoggedInAndlogCurrentUserOut();

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
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		$this->logTestUserIn();
		$this->assertEquals(true, Auth::check());

		$this->call('GET', 'users/view/TestProfile');
		$this->assertResponseOk();

		$this->checkIfUserLoggedInAndlogCurrentUserOut();
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
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		$this->assertEquals(false, Auth::check());

		$this->call('GET', 'spreadsheet/create');
		$this->assertResponseStatus(400);
	}

	/**
	 * Tests if an authenticated user can create a spreadsheet on the application.
	 * 
	 * @return void
	 */
	public function testShowCreateSpreadsheetRequestAuthenticated(){
		$this->checkIfUserLoggedInAndlogCurrentUserOut();
		$this->logTestUserIn();
		$this->assertEquals(true, Auth::check());

		$this->call('GET', 'spreadsheet/create');
		$this->assertResponseOk();

		$this->checkIfUserLoggedInAndlogCurrentUserOut();
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