<?php

/**
 * HouseKeeping Controller.
 *
 * All activity and actions relating to some form of 'house keeping' and not strictly related
 * to any specific other controllers is processed by this controller.
 */
class HouseKeepingController extends BaseController {
	

	/**
	 * This function returns a view alerting the user that he/she does not have sufficient privileges to execute a certain request.
	 * @return [type]
	 */
	public function showInsufficientPrivileges()
	{
		return View::make('errors.showInsufficientPrivileges');
	}
}
