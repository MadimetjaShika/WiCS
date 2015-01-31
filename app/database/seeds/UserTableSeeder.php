<?php
 
class UserTableSeeder extends Seeder {
 
 	/**
 	 * USED FOR TESTING PURPOSES. This function creates 100 'fake' users to populate the database for testing purposes.
 	 * @return 100 fake users generated in the database.
 	 */
  	public function run()
  	{
  		DB::table('users')->delete();


  		//1 Super User
		$Madi = User::create([
			'graphId' => 0,
			'userName' => 'Madi',
			'userGroup' => 'Root',
			'password' => Hash::make('mypassword')
		]);

		//4 Administrators
		$Admin1 = User::create([
			'graphId' => 1,
			'userName' => 'Admin1',
			'userGroup' => 'Administrator',
			'password' => Hash::make('mypassword')
		]);

		$Admin2 = User::create([
			'graphId' => 2,
			'userName' => 'Admin2',
			'userGroup' => 'Administrator',
			'password' => Hash::make('mypassword')
		]);

		$Admin3 = User::create([
			'graphId' => 3,
			'userName' => 'Admin3',
			'userGroup' => 'Administrator',
			'password' => Hash::make('mypassword')
		]);

		$Admin4 = User::create([
			'graphId' => 4,
			'userName' => 'Admin4',
			'userGroup' => 'Administrator',
			'password' => Hash::make('mypassword')
		]);

		//15 Contributers
		$Contributor1 = User::create([
			'graphId' => 5,
			'userName' => 'Contributor1',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor2 = User::create([
			'graphId' => 6,
			'userName' => 'Contributor2',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor3 = User::create([
			'graphId' => 7,
			'userName' => 'Contributor3',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor4 = User::create([
			'graphId' => 8,
			'userName' => 'Contributor4',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor5 = User::create([
			'graphId' => 9,
			'userName' => 'Contributor5',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor6 = User::create([
			'graphId' => 10,
			'userName' => 'Contributor6',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor7 = User::create([
			'graphId' => 11,
			'userName' => 'Contributor7',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor8 = User::create([
			'graphId' => 12,
			'userName' => 'Contributor8',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor9 = User::create([
			'graphId' => 13,
			'userName' => 'Contributor9',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor10 = User::create([
			'graphId' => 14,
			'userName' => 'Contributor10',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor11 = User::create([
			'graphId' => 15,
			'userName' => 'Contributor11',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor12 = User::create([
			'graphId' => 16,
			'userName' => 'Contributor12',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor13 = User::create([
			'graphId' => 17,
			'userName' => 'Contributor13',
			'userGroup' => 'Contributor',
			'password' => User::make('mypassword')
		]);


		$Contributor14 = User::create([
			'graphId' => 18,
			'userName' => 'Contributor14',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);

		$Contributor15 = User::create([
			'graphId' => 19,
			'userName' => 'Contributor15',
			'userGroup' => 'Contributor',
			'password' => Hash::make('mypassword')
		]);
	}
}