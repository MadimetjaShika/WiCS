<?php namespace WiCS\Helpers\GenericHelpers;

/**
 * Defines and houses ALL error messages used throughout the application.
 */
class ErrorMessages{

	/********************************************
	*********************************************
	********** ----------------------- **********
	*********************************************
	*********************************************/

	/********************************************
	*********************************************
	********** EMAIL SPECIFIC MESSAGES **********
	*********************************************
	*********************************************/
	private $unableToSendMailToIntendedReceipient = "Please note that the email could not be delievered to the intended receipient.";
	
	public function getUnableToSendMailToIntendedReceipient(){
		return $this->unableToSendMailToIntendedReceipient;
	}

	/********************************************
	*********************************************
	********** ----------------------- **********
	*********************************************
	*********************************************/
}