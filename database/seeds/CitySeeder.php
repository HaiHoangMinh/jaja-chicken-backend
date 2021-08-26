<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tinhthanhpho')->insert([
            [
                'matp'=>1,
                'name'=>'Thành phố Hà Nội',
                'type'=>'Thành phố Trung ương'
            ],
            [
                'matp'=>24,
                'name'=>'Tỉnh Bắc Giang',
                'type'=>'Tỉnh'
                ] 
        ]);
        
    }
}