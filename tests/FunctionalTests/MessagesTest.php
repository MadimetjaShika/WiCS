<?php

use WiCS\Helpers\GenericHelpers\InformativeMessages;
use WiCS\Helpers\GenericHelpers\ErrorMessages;
use WiCS\Helpers\GenericHelpers\WarningMessages;

/**
 * Functional tests for all error, warning and informative messages used in the application.
 */
class MessagesFunctionalTest extends TestCase {

	private $informativeMessages;
	private $errorMessages;
	private $warningMessages;

	public function __construct(){
		$this->informativeMessages = new InformativeMessages();
		$this->errorMessages = new ErrorMessages();
		$this->warningMessages = new WarningMessages();
	}

	/**
	 * Tests if the 'unable to send email' error message returned by the global error message
	 * function is as expected and as defined in documentation.
	 *  
	 * @return void
	 */
	public function testErrorMessageGetUnableToSendMailToIntendedReceipient(){
		$this->assertEquals($this->errorMessages->getUnableToSendMailToIntendedReceipient(), "Please note that the email could not be delievered to the intended receipient.");
	}
	
	/**
	 * Tests if the 'reset passwored subject line' informative message returned by the global
	 * informative message function is as expected and as defined in documentation.
	 * 
	 * @return void
	 */
	public function testInformativeMessageGetResetPasswordSubjectLine(){
		$this->assertEquals($this->informativeMessages->getResetPasswordSubjectLine(), "WiCS Password Reset");
	}
}