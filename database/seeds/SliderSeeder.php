<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            [
                'id'=>1,
                'name'=>'Sinh nhật cùng JAJA',
                'description'=>'💥 ĐẶT TIỆC SINH NHẬT - ƯU ĐÃI ĐẶC BIỆT 💥',
                'image_path'=>'https://fv9-3.failiem.lv/thumb_show.php?i=v8ykj3ca4&view',
                'image_name'=>'1.jpg',

            ],
            [
                'id'=>2,
                'name'=>'Thất tịch cùng JAJA',
                'description'=>'❣️Chúc các bạn có một ngày Thất Tịch vui vẻ ',
                'image_path'=>'https://fv9-2.failiem.lv/thumb_show.php?i=hvgesydfr&view',
                'image_name'=>'2.jpg',

            ],
            [
                'id'=>3,
                'name'=>'JAJA CORONA',
                'description'=>'𝗝𝗔𝗝𝗔  CHƠI LỚN #GIẢM #CỰC #SÂU trong 𝟮 THÁNG CHỐNG DỊCH ',
                'image_path'=>'https://fv9-3.failiem.lv/thumb_show.php?i=qezpqtds8&view',
                'image_name'=>'3.jpg',

            ],
            
             
        ]);
    }
}
