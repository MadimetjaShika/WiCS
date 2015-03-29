<?php namespace WiCS\Helpers\GenericHelpers;

/**
 * Defines and houses all generic and general functionality used throughout the application.
 * Controllers should not define any logic, all general and generic logic should be defined
 * in this helper class an referenced from here.
 */
class GenericHelpers{

	//Member variables
	private $randomStringCharacters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,./?!_-&#$%*";

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
		foreach ($mailObject->getReceipients() as $receipient) {
			Mail::send($mailObject->getView(), $mailObject->getParameters(), function($message){
				$message->from($mailObject->getSender());
				$message->to($receipient)->subject($mailObject->getSubject());
				foreach ($mailObject->getAttachments as $attachment) {
					$message->attach($attachment);
				}
			});
		}
	}

	/**
	 * Queues an email for sending to the receipient(s) specified in the mailObject, 
	 * with the subject and body specified.
	 * 
	 * @param $mailObject An object encapsulating the details of the mail to be sent.
	 * 
	 * @return Returns true if the email was successfully sent, else throws an exception with
	 * a descriptive error message if the email was unable to be sent successfully.
	 */
	public function sendQueuedMail(MailObject $mailObject){
		foreach ($mailObject->getReceipients() as $receipient) {
			Mail::queue($mailObject->getView(), $mailObject->getParameters(), function($message){
				$message->from($mailObject->getSender());
				$message->to($receipient)->subject($mailObject->getSubject());
				foreach ($mailObject->getAttachments as $attachment) {
					$message->attach($attachment);
				}
			});
		}
	}

	/**
	 * Generates a random clear text 8 character string.
	 * 
	 * @return Returns a randomly generated clear text 8 character string.
	 */
	public function generateRandom8CharacterString(){
	    return generateRandomString(8);
	}

	/**
	 * Generates a random clear text 16 character string.
	 * 
	 * @return Returns a randomly generated clear text 16 character string.
	 */
	public function generateRandom16CharacterString(){
		return generateRandomString(16);
	}

	/**
	 * Generates a random clear text 32 character string.
	 * 
	 * @return Returns a randomly generated clear text 32 character string.
	 */
	public function generateRandom32CharacterString(){
		return generateRandomString(32);
	}

	/**
	 * Generates a random clear text 64 character string.
	 * 
	 * @return Returns a randomly generated clear text 64 character string.
	 */
	public function generateRandom64CharacterString(){
		return generateRandomString(64);
	}

	private function generateRandomString($size){
		$result = "";
	    for ($i = 0; $i < $size; $i++) {
	        $result = $this->randomStringCharacters[rand(0, strlen($this->randomStringCharacters))];
	    }
	    return $result;
	}
}