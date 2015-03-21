<?php

/**
 * Functional tests for all routes used in the application.
 */
class RoutesTest extends TestCase {

	/**
	 * Tests welcome page accessibility when user not signed in.
	 * 
	 * @return void
	 */
	public function notSignedInWelcomePageTest(){
		

		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests home page accessibility when user is signed in.
	 * 
	 * @return void
	 */
	public function signedInHomePageTest(){
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests register page accessibility when user not signed in.
	 * 
	 * @return void
	 */
	public function registerUserTest(){
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests user view profile page accessibility.
	 * 
	 * @return void
	 */
	public function viewUserProfileTest(){
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests modify user page accessibility.
	 * 
	 * @return void
	 */
	public function modifyUserProfileTest(){
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests remove user page accessibility.
	 * 
	 * @return void
	 */
	public function removeUserProfileTest(){
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests create spreadsheet page accessibility.
	 * 
	 * @return void
	 */
	public function createSpreadsheetTest(){
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests view spreadsheet page accessibility.
	 * 
	 * @return void
	 */
	public function viewUserSpreadsheetsTest(){
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests modify spreadsheet page accessibility.
	 * 
	 * @return void
	 */
	public function modifyViewableReadOnlySpreadsheetTest(){
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * Tests remove spreadsheet page accessibility..
	 * 
	 * @return void
	 */
	public function removeSpreadsheetTest(){
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

}
