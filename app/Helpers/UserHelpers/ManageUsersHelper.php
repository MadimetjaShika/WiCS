<?php namespace WiCS\Helpers\UserHelpers;

use GenericHelpers;

/**
 * Defines and houses all functionality related to managing users.
 * Controllers should not define any logic, all user specific logic should be defined
 * in this helper class an referenced from here.
 */
class ManageUsersHelper{

	//Member variables used in the class
	//...
	
	/**
	 * Creates a new user in the database with the information passed as 
	 * parameter.
	 * 
	 * @param $firstName The first name of the user.
	 *  
	 * @param $lastName The last name of the user.
	 * 
	 * @param $userName The user name selected by the user. If no username is provided,
	 * the username will be defaulted to a concatenation of the first name and last name.
	 * 
	 * @param $password The password selected by the user.
	 *
	 * @param $email The email address of the user
	 * 
	 * @param $gender The gender of the user.
	 * 
	 * @return Returns true if the user was successfully added to the database, else throws an 
	 * exception with a descriptive error message.
	 */
	public function createUser($userObject){ //Revise this function definition
	//public function createUser($firstName, $lastName, $userName, $password, $email, $gender){

	}

	/**
	 * Temporarily removes the user from the application. The user will be 'unsearchable' on the 
	 * application, but their information will still remain in the database.
	 * 
	 * @param $userInstance An instance of the user to be temporarily removed from the application.
	 * 
	 * @return Returns true if the user was successfully temporarily removed from the application, 
	 * else throws an exception with a descriptive error message.
	 */
	public function removeUserTemporarily($userInstance){

	}

	/**
	 * Permanantly removes the user from the application. The user will be 'unsearchable' on the 
	 * application and their information will be completely removed from the database.
	 * 
	 * @param $userInstance An instance of the user to be permanantly removed from the application.
	 * 
	 * @return Returns true if the user was successfully permanantly removed from the application, 
	 * else throws an exception with a descriptive error message.
	 */
	public function removeUserPermanantly($userInstance){

	}

	/**
	 * Modifies the user's current details to the newly passed details. If no changes were made to a 
	 * field, the previous information is kept.
	 * 
	 * @param $userInstance An instance of the user whose inormation is to be modified.
	 * 
	 * @param $firstName The user's first name.
	 * 
	 * @param $lastName The user's last name.
	 * 
	 * @param $userName The user's username
	 * 
	 * @param $email The user's email.
	 * 
	 * @param $gender The user's gender.
	 * 
	 * @return Returns true if the user's information was successfully changed, else throws an 
	 * exception with a descriptive error message.
	 */
	public function modifyUserDetails($userObject){ //Revise this function definition
	//public function modifyUserDetails($userInstance, $firstName, $lastName, $userName, $email, $gender){

	}

	/**
	 * Changes the user's password to the new specified password.
	 * 
	 * @param $userInstance An instance of the user to be who password is to be changed.
	 * 
	 * @param $oldPassword The current password of the user whose password is to be changed.
	 * 
	 * @param $newPassword The new password of the user whose password is to be changed.
	 * 
	 * @return Returns true if the password was successfully changed, else throws an exception 
	 * with a descriptive error message.
	 */
	public function changeUserPassword($userInstance, $oldPassword, $newPassword){

	}

	/**
	 * Resets the users password to some randomly generated 16 character temporary password once the user's 
	 * answer has been validated correctly against the user's security question. An email is 
	 * thereafter sent to the user's email account to give them the newly generated temporary 
	 * password.
	 * 
	 * @param $userInstance An instance of the user whose password is to be reset.
	 * 
	 * @param $answerToSecurityQuestion The user's answer to the user's specified security question.
	 * 
	 * @return Returns true if the user's password was successfully reset, else throws an exception
	 * with a descriptive error message.
	 */
	public function resetUserPasswordToRandomlyGeneratedTemporaryPassword($userInstance, $answerToSecurityQuestion){

		if( validateUserAnswerToSecurityQuestion($userInstance, $answerToSecurityQuestion) == true ){
			$randomlyGeneratedPassword = GenericHelpers::generateRandom16CharacterString();

			//Complete rest of code...
			

			//sendMailToSingleReceipient($userInstance->email, InformativeMessages::getResetPasswordSubjectLine(), "");
		}
		else{
			//Complete rest of code...
		}

		return true;

	}

	/**
	 * Validated the given answer against the given user's security question answer.
	 * 
	 * @param $userInstance An instance of the user whose security question answer is being validated.
	 * 
	 * @param $answerToSecurityQuestion A string of the user's given answer to the security question.
	 * 
	 * @return Returns true if the answer to the security question matched the answer currently in the 
	 * database against the user's security question answer, else returns an exception. Throws an exception
	 * with a descriptive error message if the user instance does not exist or if anything else goes wrong.
	 */
	public function validateUserAnswerToSecurityQuestion($userInstance, $answerToSecurityQuestion){

	}

	/**
	 * Invites a user who is currently not on the platform to join the platform.
	 * 
	 * @param  $personEmail The email address of the person to be invited to the platform.
	 * 
	 * @return Returns true if the user was successfully invited to the platorm, else
	 * throws an exception with a descriptive error message.
	 */
	public function inviteNewPersonToPlatform($personEmail){

	}

	/**
	 * Invites an existing user to become a contributor to an existing spreadsheet on the platform.
	 * 
	 * @param  $userInstance An instance of the user to be invited.
	 * 
	 * @param  $spreadsheetInstance An instance of the spreadsheet to which the user is being invited
	 * to contribute to.
	 * 
	 * @return Returns true if the user successfully invited to contribute to the spreadsheet, else
	 * throws an exception with a descriptive error message.
	 */
	public function inviteExistingUserToContributeToSpreadsheet($userInstance, AbstractSpreadsheet $spreadsheetInstance){

	}

	/**
	 * Makes the user instacne passed in parameter an owner of the spreadsheet
	 * instance passes as parameter.
	 * 
	 * @param $spreadsheetInstance An instance of the spreadsheet to which the user
	 * instance is to be made an owner of.
	 * 
	 * @param $userInstance An instance of the spreadsheet which the user instance is to 
	 * be made owner of.
	 * 
	 * @return Returns true if the user instance was successfully made an owner of the 
	 * spreadsheet instance, else throws an exception with a descriptive error message.
	 */
	public function makeUserOwnerOfSpreadsheet($userInstance, AbstractSpreadsheet $spreadsheetInstance){

	}

	/**
	 * Invites the user instacne passed in parameter to become an owner of the spreadsheet
	 * instance passes as parameter. Function does not make the invited user an actual owner
	 * of the spreadsheet, it only invites, as the name says.
	 * 
	 * @param $spreadsheetInstance An instance of the spreadsheet to which the user
	 * instance is to be invited to become an owner of.
	 * 
	 *  @param $userInstance An instance of the spreadsheet which the user instance is to 
	 * be invited to become owner of.
	 * 
	 * @return Returns true if the user instance was successfully invited to become an owner of the 
	 * spreadsheet instance, else throws an exception with a descriptive error message.
	 */
	public function inviteUserToBecomeNewOwnerOfSpreadsheet($userInstance, AbstractSpreadsheet $spreadsheetInstance){

	}

	/**
	 * Makes the user instance passed in parameter a contributor to the spreadsheet
	 * instance passed as parameter.
	 * 
	 * @param  $spreadsheetInstance An instance of the spreadsheet to which the given
	 * user will be assigned as a contributor.
	 * 
	 * @param  $userInstance An instance of the user that will be made a contributor
	 * to the spreadsheet passed as parameter.
	 * 
	 * @return Returns true if the user instance was successfully made a contributor
	 * to the spreadsheet instacne, else throws an exception with a descriptive error
	 * message.
	 */
	public function makeUserContributorToSpreadsheet($userInstance, AbstractSpreadsheet $spreadsheetInstance){

	}
}