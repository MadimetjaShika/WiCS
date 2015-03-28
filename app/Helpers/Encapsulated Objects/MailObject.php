<?php namespace WiCS\Helpers\GenericHelpers;

/**
 * Encapsulates an email.
 */
class MailObject{

	//Member Variables
	private array $receipientArray = array();
	private $subject;
	private $body;

	public function __construct(){
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
	 * Adds a receipient to the list of receipients in the object.
	 * 
	 * @param $address A string value of the address to add to the list of receipient addresses.
	 */
	public function addReceipient($address){
		array_push($this->$receipientArray, $address);
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