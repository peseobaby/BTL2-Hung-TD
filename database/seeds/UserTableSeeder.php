<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Trần Duy Hưng',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123'),
        	'active' => '1',
        ]);
    }
}
