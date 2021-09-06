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
            [
                'id'=>1,
                'name'=>'Gà Jaja',
                'parent_id'=>0,
                'slug' => 'ga-jaja',
            ],
            [
                'id'=>5,
                'name'=>'Gà cay jaja',
                'parent_id'=>1,
                'slug' => 'ga-cay-jaja',
            ],
            [
                'id'=>6,
                'name'=>'Gà truyền thống',
                'parent_id'=>1,
                'slug' => 'ga-truyen-thong',
            ],
            [
                'id'=>2,
                'name'=>'Phần ăn phụ',
                'parent_id'=>0,
                'slug' => 'phan-an-phu',
            ],
            [
                'id'=>7,
                'name'=>'Đồ ăn kèm',
                'parent_id'=>2,
                'slug' => 'do-an-kem',
            ],
            [
                'id'=>3,
                'name'=>'Đồ uống',
                'parent_id'=>2,
                'slug' => 'do-uong',
            ] ,
            [
                'id'=>4,
                'name'=>'Combo',
                'parent_id'=>0,
                'slug' => 'combo',
            ],
            [
                'id'=>8,
                'name'=>'Combo gia đình',
                'parent_id'=>4,
                'slug' => 'combo-gia-dinh',
            ],
            [
                'id'=>9,
                'name'=>'Combo siêu ưu đãi',
                'parent_id'=>0,
                'slug' => 'combo-sieu-uu-dai',
            ] 
        ]);
            
    }
}