<?php 

use Illuminate\Database\Seeder;

/**
* 
*/
class UserTableSeeder extends Seeder
{
	
	function run()
	{
		\DB::table('users')->insert(array(
			'name' 		=> 'Naffer',
			'email'	    => 'reyesnaffer@gmail.com',
			'password' 	=> \Hash::make('wizard97'),
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s")
		));
	}
}