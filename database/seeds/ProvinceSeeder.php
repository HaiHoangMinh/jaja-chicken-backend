<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                
            
                [
                'maqh'=>3,
                'name'=>'Quận Tây Hồ',
                'type'=>'Quận',
                'matp'=>1
                ], 
                [
                'maqh'=>5,
                'name'=>'Quận Cầu Giấy',
                'type'=>'Quận',
                'matp'=>1
                ], 

                [
                'maqh'=>213,
                'name'=>'Thành phố Bắc Giang',
                'type'=>'Thành phố',
                'matp'=>24
                ], 
            
                [
                'maqh'=>221,
                'name'=>'Huyện Yên Dũng',
                'type'=>'Huyện',
                'matp'=>24
                ], 
                [
                'maqh'=>222,
                'name'=>'Huyện Việt Yên',
                'type'=>'Huyện',
                'matp'=>24
                ], 
                
            
        ]);
    }
}