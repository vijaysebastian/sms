<?php namespace Modules\Faveosms\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FaveoSmsDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		Sms::create(['provider_id'=>'1','name'=>'auth_key']);
		Sms::create(['provider_id'=>'1','name'=>'sender_id']);
		Sms::create(['provider_id'=>'1','name'=>'route']);
		Provider::create(array('name' => 'Msg91.com'));
		// $this->call("OthersTableSeeder");
	}

}