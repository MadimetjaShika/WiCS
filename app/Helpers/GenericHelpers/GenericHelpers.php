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
	 * Sends an email to the receipient(s) specified in the mailObject, with the subject and 
	 * body specified.
	 * 
	 * @param $mailObject An object encapsulating the details of the mail to be sent.
	 * 
	 * @return Returns true if the email was successfully sent, else throws an exception with
	 * a descriptive error message if the email was unable to be sent successfully.
	 */
	public function sendMail(MailObject $mailObject){

	}

	/**
	 * Generates a random clear text 8 character string.
	 * 
	 * @return Returns a randomly generated clear text 8 character string.
	 */
	public function generateRandom8CharacterString(){

	}

	/**
	 * Generates a random clear text 16 character string.
	 * 
	 * @return Returns a randomly generated clear text 16 character string.
	 */
	public function generateRandom16CharacterString(){

	}

	/**
	 * Generates a random clear text 32 character string.
	 * 
	 * @return Returns a randomly generated clear text 32 character string.
	 */
	public function generateRandom32CharacterString(){

	}

	/**
	 * Generates a random clear text 64 character string.
	 * 
	 * @return Returns a randomly generated clear text 64 character string.
	 */
	public function generateRandom64CharacterString(){

	}
}