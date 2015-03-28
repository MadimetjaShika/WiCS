<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	/****************************************************/
	/*************** HELPER FUNCTIONALITY ***************/
	/****************************************************/
	private $testUserName = "testProfile";
	private $testUserPassword = "testPassword";

	public function logTestUserIn(){
		$this->call('POST', 'login', ['userName' => $this->getTestUserName(), 'password' => $this->getTestUserPassword()]);
	}

	public function checkIfUserLoggedInAndlogCurrentUserOut(){
		if( Auth::check() )
			$this->call('GET', 'logout');
	}

	public function getTestUserName(){
		return $this->testUserName;
	}

	public function getTestUserPassword(){
		return $this->testUserPassword;
	}
}
