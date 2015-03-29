<?php

use WiCS\Helpers\GenericHelpers\InformativeMessages;
use WiCS\Helpers\GenericHelpers\ErrorMessages;
use WiCS\Helpers\GenericHelpers\WarningMessages;

/**
 * Functional tests for all error, warning and informative messages used in the application.
 */
class MessagesFunctionalTest extends TestCase {

	/**
	 * Tests if the 'unable to send email' error message returned by the global error message
	 * function is as expected and as defined in documentation.
	 *  
	 * @return void
	 */
	public function testErrorMessageGetUnableToSendMailToIntendedReceipient(){
		$errorMessages = new ErrorMessages();
		$this->assertEquals("Please note that the email could not be delievered to the intended receipient.", $errorMessages->getUnableToSendMailToIntendedReceipient());
	}
	
	/**
	 * Tests if the 'reset passwored subject line' informative message returned by the global
	 * informative message function is as expected and as defined in documentation.
	 * 
	 * @return void
	 */
	public function testInformativeMessageGetResetPasswordSubjectLine(){
		$informativeMessages = new InformativeMessages();
		$this->assertEquals("WiCS Password Reset", $informativeMessages->getResetPasswordSubjectLine());
	}
}