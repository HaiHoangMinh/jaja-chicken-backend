<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardsSeeder extends Seeder
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
                'xaid'=>112,
                'name'=>'Phường Thụy Khuê',
                'type'=>'Phường',
                'maqh'=>3
            ], 
            [
                    'xaid'=>109,
                    'name'=>'Phường Bưởi',
                    'type'=>'Phường',
                    'maqh'=>3
            ],
            [
                    'xaid'=>91,
                    'name'=>'Phường Phú Thượng',
                    'type'=>'Phường',
                    'maqh'=>3
            ],
            [
                'xaid'=>94,
                'name'=>'Phường Nhật Tân',
                'type'=>'Phường',
                'maqh'=>3
            ],
            [
                'xaid'=>97,
                'name'=>'Phường Tứ Liên',
                'type'=>'Phường',
                'maqh'=>3
            ],
            [
                'xaid'=>100,
                'name'=>'Phường Quảng An',
                'type'=>'Phường',
                'maqh'=>3
            ], 
            [
                    'xaid'=>103,
                    'name'=>'Phường Xuân La',
                    'type'=>'Phường',
                    'maqh'=>3
            ],
            [
                    'xaid'=>106,
                    'name'=>'Phường Yên Phụ',
                    'type'=>'Phường',
                    'maqh'=>3
            ],
            [
                'xaid'=>157,
                'name'=>'Phường Nghĩa Đô',
                'type'=>'Phường',
                'maqh'=>5
            ],
            [
                'xaid'=>160,
                'name'=>'Phường Nghĩa Tân',
                'type'=>'Phường',
                'maqh'=>5
            ],
            [
                'xaid'=>163,
                'name'=>'Phường Mai Dịch',
                'type'=>'Phường',
                'maqh'=>5
            ], 
            [
                    'xaid'=>166,
                    'name'=>'Phường Dịch Vọng',
                    'type'=>'Phường',
                    'maqh'=>5
            ],
            [
                'xaid'=>167,
                'name'=>'Phường Dịch Vọng Hậu',
                'type'=>'Phường',
                'maqh'=>5
        ],
            [
                    'xaid'=>169,
                    'name'=>'Phường Quan Hoa',
                    'type'=>'Phường',
                    'maqh'=>5
            ],
            [
                'xaid'=>172,
                'name'=>'Phường Yên Hoà',
                'type'=>'Phường',
                'maqh'=>5
            ],
            [
                'xaid'=>175,
                'name'=>'Phường Trung Hoà',
                'type'=>'Phường',
                'maqh'=>5
            ],
            [
                'xaid'=>7201,
                'name'=>'Phường Thọ Xương',
                'type'=>'Phường',
                'maqh'=>213
            ], 
            [
                    'xaid'=>7207,
                    'name'=>'Phường Trần Nguyên Hãn',
                    'type'=>'Phường',
                    'maqh'=>213
            ],
            [
                    'xaid'=>7210,
                    'name'=>'Phường Ngô Quyền',
                    'type'=>'Phường',
                    'maqh'=>213
            ],
            [
                'xaid'=>7213,
                'name'=>'Phường Hoàng Văn Thụ',
                'type'=>'Phường',
                'maqh'=>213
            ],
            [
                'xaid'=>7216,
                'name'=>'Phường Trần Phú',
                'type'=>'Phường',
                'maqh'=>213
            ],
            [
                'xaid'=>7219,
                'name'=>'Phường Mỹ Độ',
                'type'=>'Phường',
                'maqh'=>213
            ], 
            [
                    'xaid'=>7222,
                    'name'=>'Xã Song Mai',
                    'type'=>'Xã',
                    'maqh'=>213
            ],
            [
                    'xaid'=>7225,
                    'name'=>'Phường Xương Giang',
                    'type'=>'Phường',
                    'maqh'=>213
            ],
            [
                'xaid'=>7228,
                'name'=>'Phường Đa Mai',
                'type'=>'Phường',
                'maqh'=>213
            ],
            [
                'xaid'=>7231,
                'name'=>'Phường Dĩnh Kế',
                'type'=>'Phường',
                'maqh'=>213
            ],
            [
                'xaid'=>7687,
                'name'=>'Xã Tân Mỹ',
                'type'=>'Xã',
                'maqh'=>213
            ], 
            [
                    'xaid'=>7696,
                    'name'=>'Xã Đồng Sơn',
                    'type'=>'Xã',
                    'maqh'=>213
            ],
            [
                    'xaid'=>7699,
                    'name'=>'Xã Tân Tiến',
                    'type'=>'Xã',
                    'maqh'=>213
            ],
            [
                'xaid'=>7705,
                'name'=>'Xã Song Khê',
                'type'=>'Xã',
                'maqh'=>213
            ],
   
        ]);
    }
}