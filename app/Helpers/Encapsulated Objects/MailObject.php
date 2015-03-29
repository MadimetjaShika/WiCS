<?php namespace WiCS\Helpers\GenericHelpers;

/**
 * Encapsulates an email.
 */
class MailObject{

	//Member Variables
	private $receipientArray = array();
	private $attachementsArray = array();
	private $parametersArray = array();
	private $sender = "WiCS";
	private $subject;
	private $body;

	public function __construct(){
		//Prepare default attachments for every mail (WiCS logo, etc...)
		
	}

	/**
	 * Returns the receipients specified in the receipient array.
	 * 
	 * @return Returns array of receipients.
	 */
	public function getReceipients(){
		return $this->receipientArray;
	}

	/**
	 * Returns the attachments specified in the attachments array.
	 * 
	 * @return void
	 */
	public function getAttachments(){
		return $this->attachementsArray;
	}

	/**
	 * Returns the parameters of the email.
	 * 
	 * @return void
	 */
	public function getParameters(){
		return $this->parametersArray;
	}

	/**
	 * Returns the sender of the email.
	 * 
	 * @return void
	 */
	public function getSender(){
		return $this->sender;
	}

	/**
	 * Returns the subject of the email.
	 * 
	 * @return Returns a string value of the email subject.
	 */
	public function getSubject(){
		return $this->subject;
	}

	/**
	 * Returns the body of the email.
	 * 
	 * @return Returns string value of the email body.
	 */
	public function getBody(){
		return $this->body;
	}

	/**
	 * Adds a receipient to the list of receipients in the email.
	 * 
	 * @param $address A string value of the address to add to the list of receipient addresses.
	 */
	public function addReceipient($address){
		array_push($this->receipientArray, $address);
	}

	/**
	 * Adds an attachments to the list of attachements in the email.
	 * 
	 * @param $attachment The new attachement to be appended onto the existing attachments.
	 */
	public function addAttachement($attachment){
		array_push($this->attachementsArray, $attachment);
	}

	/**
	 * Adds a new parameter to the email paraneters.
	 * 
	 * @param $key The key of the new parameter
	 * 
	 * @param $value The value of the new parameter
	 */
	public function addParameters($key, $value){
		$this->attachementsArray[$key][] = $value;
		//array_push($this->attachementsArray, $attachment);
	}

	/**
	 * Sets the sender of the email.
	 * 
	 * @param void
	 */
	public function setSender($_sender){
		$this->sender = $_sender;
	}

	/**
	 * Sets the subject of the email.
	 * 
	 * @param $_subject A string value of the subject of the email.
	 */
	public function setSubject($_subject){
		$this->subject = $_subject;
	}

	/**
	 * Sets the body of the email.
	 * 
	 * @param $_body A string value of the body of the email.
	 */
	public function setBody($_body){
		$this->body = $_body;
	}
}