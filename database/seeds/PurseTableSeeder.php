<?php

use Illuminate\Database\Seeder;

class PurseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purses')->insert([
        	'name' => 'Ví đại gia',
        	'user_id' => '1',
        	'money' => '10000000',
        ]);
    }
}
