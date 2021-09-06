<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id'=>1,
                'name'=>'Đùi gà cay',
                'price'=>30000,
                'feature_image_path' => '/storage/product/1/hq8kQ0XExCGYSiRplskU.jpg',
                'content' => '<p>đ&ugrave;i g&agrave; sốt cay</p>',
                'category_id' => 5,
                'feature_image_name' => 'dui_ga_ngot.jpg',
            ],
            [
                'id'=>2,
                'name'=>'Đùi gà chiên',
                'price'=>30000,
                'feature_image_path' => '/storage/product/1/1plosF6Fzz5JZ1ydPK5j.jpg',
                'content' => '<p>Đ&ugrave;i g&agrave; chi&ecirc;n truyền thống k&egrave;m nước chấm</p>',
                'category_id' => 6,
                'feature_image_name' => 'dui_ga_chien.jpg',
            ],
            [
                'id'=>3,
                'name'=>'Pepsi',
                'price'=>10000,
                'feature_image_path' => '/storage/product/11/uLjwwddKWcVFVVx8lkLL.jpg',
                'content' => '	<p>Đồ uống</p>',
                'category_id' => 3,
                'feature_image_name' => 'pepsi.jpg',
            ],
            [
                'id'=>4,
                'name'=>'Salad khoai tây',
                'price'=>20000,
                'feature_image_path' => '/storage/product/11/hWbOGPuB1lxi59HDcAl5.jpg',
                'content' => '<p>Salad</p>',
                'category_id' => 7,
                'feature_image_name' => 'salad.jpg',
            ],
           /* [
                'id'=>5,
                'name'=>'Đùi gà cay',
                'price'=>30000,
                'feature_image_path' => '/storage/product/1/hq8kQ0XExCGYSiRplskU.jpg',
                'content' => '<p>đ&ugrave;i g&agrave; sốt cay</p>',
                'category_id' => 8,
                'feature_image_name' => 'dui_ga_ngot.jpg',
            ],
            [
                'id'=>6,
                'name'=>'Đùi gà cay',
                'price'=>30000,
                'feature_image_path' => '/storage/product/1/hq8kQ0XExCGYSiRplskU.jpg',
                'content' => '<p>đ&ugrave;i g&agrave; sốt cay</p>',
                'category_id' => 9,
                'feature_image_name' => 'dui_ga_ngot.jpg',
            ],
            [
                'id'=>7,
                'name'=>'Đùi gà cay',
                'price'=>30000,
                'feature_image_path' => '/storage/product/1/hq8kQ0XExCGYSiRplskU.jpg',
                'content' => '<p>đ&ugrave;i g&agrave; sốt cay</p>',
                'category_id' => 10,
                'feature_image_name' => 'dui_ga_ngot.jpg',
            ],*/
        ]);
    }
}