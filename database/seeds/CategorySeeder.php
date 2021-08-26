<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id'=>1,
            'name'=>'Gà Jaja',
            'parent_id'=>0,
            'slug'=>'ga-jaja',], 
            
            [
                'id'=>11,
                'name'=>'Gà cay',
                'parent_id'=>1,
                'slug'=>'ga-cay',
                'created_at'=>'2021-06-30 01:53:54',
                'updated_at'=>'2021-06-30 01:53:54',
                'deleted_at'=>NULL
            ],
            [
                'id'=>12,
                'name'=>'Gà truyền thống',
                'parent_id'=>1,
                'slug'=>'ga-truyen-thong',
                'created_at'=>'2021-06-30 03:19:33',
                'updated_at'=>'2021-06-30 03:19:33',
                'deleted_at'=>NULL
            ],
            [
                'id'=>13,
                'name'=>'Gà cay ngọt',
                'parent_id'=>20,
                'slug'=>'ga-cay-ngot',
                'created_at'=>'2021-06-30 03:19:48',
                'updated_at'=>'2021-06-30 03:20:01',
                'deleted_at'=>NULL
                ]
                
            
        ]);
    }
}