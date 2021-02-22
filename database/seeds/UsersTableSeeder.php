<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        	'role_id' => '1',
        	'name' => 'admin',
        	'phone' => '01404684576',

        	'email' => 'admin@soft.com',
        	'status'=>'1',

        	'password' => bcrypt('rootadmin'),
        	'address' => 'dhaka',


        ]);


       DB::table('users')->insert([
        'role_id' => '2',
        	'name' => 'member',
        	'phone' => '01404684576',
           'status'=>'1',

        	'email' => 'member@soft.com',

        	'password' => bcrypt('rootmember'),
        	'address' => 'dhaka',
        ]);
    }
}
