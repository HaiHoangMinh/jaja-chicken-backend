<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Admin', 'username' => 'admin', 'password' => '123456789',
            'id' => '1998'], 
            
        ]);
        DB::table('role_user')->insert([
            ['user_id' => '1998', 'role_id' => '1',], 
            
        ]);
    }
}