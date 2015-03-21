<?php namespace WiCS\Helpers\GenericHelpers;

/**
 * Defines and houses all generic and general functionality used throughout the application.
 * Controllers should not define any logic, all general and generic logic should be defined
 * in this helper class an referenced from here.
 */
class GenericHelpers{

	//Member variables
	//
	
	/**
	 * Sends an email to the specified receipient(s) with the specified subject and body.
	 * 
	 * @param  $receipients An array or string containing the address of the receipient(s). If
	 * there are multiple receipients, this will be indicated by the '$multipleReceipientsFlag' flag.
	 * 
	 * @param  $multipleReceipientsFlag A flag which is set to true if there are multiple receipients
	 * in the $receipients variable, otherwise set to false if the is only one receipient.
	 * 
	 * @param  $subject The text to be set as the subject of the email to be sent.
	 * 
	 * @param  $body The text to be set as the body of the email to be sent.
	 * 
	 * @return Returns true if the email was successfully sent, else throws an exception with a 
	 * descriptive error message if the email was unable to be sent successfully.
	 */
	public function sendMail($receipients, $multipleReceipientsFlag, $subject, $body){

	}
}