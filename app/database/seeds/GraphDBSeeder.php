<?php
 
class GraphDBSeeder extends Seeder {
 
 	/**
 	 * USED FOR TESTING PURPOSES. This function creates 100 'fake' users to populate the database for testing purposes.
 	 * @return 100 fake users generated in the database.
 	 */
  	public function run()
  	{
  		/****************************************************/
  		/*******************Create Users*********************/
  		/****************************************************/

  		//1 Super User
		$Madi = nRootUser::create([
			'firstName' => 'Madimetja',
			'lastName' => 'Shika',
			'userName' => 'Madi',
			'email' => 'mmjshika@gmail.com',
			'userGroup' => 'Root'
		]);

		//4 Administrators
		$Admin1 = nAdminUser::create([
			'firstName' => 'Admin1',
			'lastName' => 'Admin',
			'userName' => 'Admin1',
			'email' => 'admin1@mail.com',
			'userGroup' => 'Administrator'
		]);

		$Admin2 = nAdminUser::create([
			'firstName' => 'Admin2',
			'lastName' => 'Admin',
			'userName' => 'Admin2',
			'email' => 'admin2@mail.com',
			'userGroup' => 'Administrator'
		]);

		$Admin3 = nAdminUser::create([
			'firstName' => 'Admin3',
			'lastName' => 'Admin',
			'userName' => 'Admin3',
			'email' => 'admin3@mail.com',
			'userGroup' => 'Administrator'
		]);

		$Admin4 = nAdminUser::create([
			'firstName' => 'Admin4',
			'lastName' => 'Admin',
			'userName' => 'Admin4',
			'email' => 'admin4@mail.com',
			'userGroup' => 'Administrator'
		]);

		//15 Contributers
		$Contributor1 = nContributorUser::create([
			'firstName' => 'Contributor1',
			'lastName' => 'Contributor',
			'userName' => 'Contributor1',
			'email' => 'contributor1@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor2 = nContributorUser::create([
			'firstName' => 'Contributor2',
			'lastName' => 'Contributor',
			'userName' => 'Contributor2',
			'email' => 'contributor2@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor3 = nContributorUser::create([
			'firstName' => 'Contributor3',
			'lastName' => 'Contributor',
			'userName' => 'Contributor3',
			'email' => 'contributor3@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor4 = nContributorUser::create([
			'firstName' => 'Contributor4',
			'lastName' => 'Contributor',
			'userName' => 'Contributor4',
			'email' => 'contributor4@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor5 = nContributorUser::create([
			'firstName' => 'Contributor5',
			'lastName' => 'Contributor',
			'userName' => 'Contributor5',
			'email' => 'contributor5@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor6 = nContributorUser::create([
			'firstName' => 'Contributor6',
			'lastName' => 'Contributor',
			'userName' => 'Contributor6',
			'email' => 'contributor6@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor7 = nContributorUser::create([
			'firstName' => 'Contributor7',
			'lastName' => 'Contributor',
			'userName' => 'Contributor7',
			'email' => 'contributor7@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor8 = nContributorUser::create([
			'firstName' => 'Contributor8',
			'lastName' => 'Contributor',
			'userName' => 'Contributor8',
			'email' => 'contributor8@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor9 = nContributorUser::create([
			'firstName' => 'Contributor9',
			'lastName' => 'Contributor',
			'userName' => 'Contributor8',
			'email' => 'contributor9@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor10 = nContributorUser::create([
			'firstName' => 'Contributor10',
			'lastName' => 'Contributor',
			'userName' => 'Contributor10',
			'email' => 'contributor10@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor11 = nContributorUser::create([
			'firstName' => 'Contributor11',
			'lastName' => 'Contributor',
			'userName' => 'Contributor11',
			'email' => 'contributor11@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor12 = nContributorUser::create([
			'firstName' => 'Contributor12',
			'lastName' => 'Contributor',
			'userName' => 'Contributor12',
			'email' => 'contributor12@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor13 = nContributorUser::create([
			'firstName' => 'Contributor13',
			'lastName' => 'Contributor',
			'userName' => 'Contributor13',
			'email' => 'contributor13@mail.com',
			'userGroup' => 'Contributor'
		]);


		$Contributor14 = nContributorUser::create([
			'firstName' => 'Contributor14',
			'lastName' => 'Contributor',
			'userName' => 'Contributor14',
			'email' => 'contributor14@mail.com',
			'userGroup' => 'Contributor'
		]);

		$Contributor15 = nContributorUser::create([
			'firstName' => 'Contributor15',
			'lastName' => 'Contributor',
			'userName' => 'Contributor15',
			'email' => 'contributor15@mail.com',
			'userGroup' => 'Contributor'
		]);

		/****************************************************/
  		/*******************Create Sheets********************/
  		/****************************************************/

  		//6 Sheets
  		$Sheet1 = nSpreadsheet::create([
			'title' => 'Travel Recon 2014',
			'description' => 'This is the 2014 travel recon spreadsheet.',
			'closeDate' => '01/12/2014',
			'status' => 'Closed',
			'location' => '\app\storage\files\csv\2014 Travel Recon.csv',
			'validationRules' => '[["Destination","Destination description","alpha",["50"]],["Amount","Amount","currency",["gbp"]]]'
		]);

		$Sheet2 = nSpreadsheet::create([
			'title' => 'Travel Recon 2015',
			'description' => 'This is the 2015 travel recon spreadsheet.',
			'closeDate' => '01/02/2015',
			'status' => 'Open',
			'location' => '\app\storage\files\csv\2015 Travel Recon.csv',
			'validationRules' => '[["First Name","Name","alpha",["10"]],["Last Name","AMount","alpha",["20"]]]'
		]);

		$Sheet3 = nSpreadsheet::create([
			'title' => 'Simmonds no.3 Office Move 2014',
			'description' => '2014 Rissik to Simmonds office move',
			'closeDate' => '21/10/2014',
			'status' => 'Closed',
			'location' => '\app\storage\files\csv\2014 Move.csv',
			'validationRules' => '[["Cost Centre","CC Description","costCentre",["10"]],["Total Spend","Total Spend","currency",["usd"]]]'
		]);

		$Sheet4 = nSpreadsheet::create([
			'title' => 'Simmonds no.3 Office Move 2015',
			'description' => '2015 Rissik to Simmonds office move',
			'closeDate' => '31/01/2015',
			'status' => 'Open',
			'location' => '\app\storage\files\csv\2015 Move.csv',
			'validationRules' => '[["First Name","Name","alpha",["10"]],["Spend","Amount","currency",["zar"]]]'
		]);

		$Sheet5 = nSpreadsheet::create([
			'title' => 'IMY 310 User Base Questionnair Responses',
			'description' => 'IMY 310 Project User Base Questionnair Results generated by Google Forms.',
			'closeDate' => '14/03/2014',
			'status' => 'Open',
			'location' => '\app\storage\files\excel\IMY 310 - User Base Questionnair (Responses).xlsx',
			'validationRules' => '[["IMY Project Name","Name","alpha",["10"]],["Project Leader","AMount","alpha",["20"]]]'
		]);

		$Sheet6 = nSpreadsheet::create([
			'title' => 'TPS Release Information 2015',
			'description' => 'Personal budget planning spreadsheet',
			'closeDate' => '31/12/2015',
			'status' => 'Open',
			'location' => '\app\storage\files\excel\budget.xlsx',
			'validationRules' => '[["Expense","Name","alpha",["20"]],["Amount","Amount","currency",["zar"]]]'
		]);

  		/****************************************************/
  		/***************Create Relationships*****************/
  		/****************************************************/

  		//Root user has super relationship with all administrators
  		$Madi->administrator()->save($Admin1);
  		$Madi->administrator()->save($Admin2);
  		$Madi->administrator()->save($Admin3);
  		$Madi->administrator()->save($Admin4);

  		//Relationships between administrators and contributors
  		$Admin1->administrator()->save($Contributor1);
  		$Admin1->administrator()->save($Contributor2);
  		$Admin1->administrator()->save($Contributor3);
  		$Admin1->administrator()->save($Contributor4);
  		$Admin1->administrator()->save($Contributor5);
  		$Admin1->administrator()->save($Contributor6);

  		$Admin2->administrator()->save($Contributor7);
  		$Admin2->administrator()->save($Contributor8);
  		$Admin2->administrator()->save($Contributor9);
  		$Admin2->administrator()->save($Contributor10);
  		$Admin2->administrator()->save($Contributor11);

  		$Admin3->administrator()->save($Contributor12);
  		$Admin3->administrator()->save($Contributor13);

  		$Admin4->administrator()->save($Contributor14);
  		$Admin4->administrator()->save($Contributor15);

  		//Relationships between administrators and sheets
  		$Admin1->authoredSpreadsheets()->save($Sheet1);
  		$Admin1->authoredSpreadsheets()->save($Sheet2);

  		$Admin2->authoredSpreadsheets()->save($Sheet3);
  		$Admin2->authoredSpreadsheets()->save($Sheet4);

  		$Admin3->authoredSpreadsheets()->save($Sheet5);

  		$Admin4->authoredSpreadsheets()->save($Sheet6);

  		//Relationships between contributors and sheets
  		$Contributor1->contributedSheets()->save($Sheet1);
  		$Contributor2->contributedSheets()->save($Sheet1);
  		$Contributor3->contributedSheets()->save($Sheet1);
  		$Contributor4->contributedSheets()->save($Sheet1);
  		$Contributor5->contributedSheets()->save($Sheet1);
  		$Contributor6->contributedSheets()->save($Sheet1);

  		$Contributor1->contributedSheets()->save($Sheet2);
  		$Contributor2->contributedSheets()->save($Sheet2);
  		$Contributor3->contributedSheets()->save($Sheet2);
  		$Contributor4->contributedSheets()->save($Sheet2);
  		$Contributor5->contributedSheets()->save($Sheet2);
  		$Contributor6->contributedSheets()->save($Sheet2);

  		$Contributor7->contributedSheets()->save($Sheet3);
  		$Contributor8->contributedSheets()->save($Sheet3);
  		$Contributor9->contributedSheets()->save($Sheet3);
  		$Contributor10->contributedSheets()->save($Sheet3);
  		$Contributor11->contributedSheets()->save($Sheet3);

  		$Contributor7->contributedSheets()->save($Sheet4);
  		$Contributor8->contributedSheets()->save($Sheet4);
  		$Contributor9->contributedSheets()->save($Sheet4);
  		$Contributor10->contributedSheets()->save($Sheet4);
  		$Contributor11->contributedSheets()->save($Sheet4);

  		$Contributor12->contributedSheets()->save($Sheet5);
  		$Contributor13->contributedSheets()->save($Sheet5);

  		$Contributor14->contributedSheets()->save($Sheet6);
  		$Contributor15->contributedSheets()->save($Sheet6);
	}
}