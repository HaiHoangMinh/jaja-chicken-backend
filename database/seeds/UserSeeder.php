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
            'id' => '1998','feature_image_path' => 'https://thumbs.dreamstime.com/z/gentleman-avatar-profile-icon-image-default-user-hairstyle-vector-illustration-182197665.jpg'], 
            
        ]);
        DB::table('role_user')->insert([
            ['user_id' => '1998', 'role_id' => '1',], 
            
        ]);
    }
}