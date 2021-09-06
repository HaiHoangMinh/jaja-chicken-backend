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
                'image_path'=>'https://scontent.fhan2-2.fna.fbcdn.net/v/t1.6435-9/116155939_155484552810128_8958048070849407794_n.png?_nc_cat=102&ccb=1-5&_nc_sid=730e14&_nc_ohc=GR-CEj-QIjwAX_wfst5&_nc_ht=scontent.fhan2-2.fna&oh=b009df075137329995d68b49df59ccb7&oe=615D20AF',
                'image_name'=>'1.jpg',

            ],
            [
                'id'=>2,
                'name'=>'Thất tịch cùng JAJA',
                'description'=>'❣️Chúc các bạn có một ngày Thất Tịch vui vẻ ',
                'image_path'=>'https://scontent.fhan2-2.fna.fbcdn.net/v/t1.6435-9/118464744_164864545205462_3013913295243705682_n.png?_nc_cat=110&ccb=1-5&_nc_sid=730e14&_nc_ohc=Js1GLWvVfh0AX8Msnt0&_nc_ht=scontent.fhan2-2.fna&oh=defd73b7140aaed7db0d263345ae92dd&oe=615A18D7',
                'image_name'=>'2.jpg',

            ],
            [
                'id'=>3,
                'name'=>'JAJA CORONA',
                'description'=>'𝗝𝗔𝗝𝗔  CHƠI LỚN #GIẢM #CỰC #SÂU trong 𝟮 THÁNG CHỐNG DỊCH ',
                'image_path'=>'https://scontent.fhan2-2.fna.fbcdn.net/v/t1.6435-9/117592795_162477918777458_8103968936704946635_n.png?_nc_cat=102&ccb=1-5&_nc_sid=730e14&_nc_ohc=XoiFKrsL7cgAX-3wELI&_nc_ht=scontent.fhan2-2.fna&oh=528dc3ca1ef493a164ef736c426b152b&oe=615B999B',
                'image_name'=>'3.jpg',

            ],
            
             
        ]);
    }
}
