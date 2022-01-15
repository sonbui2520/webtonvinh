<?php

use App\Model\nguoitonhvinh;
use Illuminate\Database\Seeder;

class nguoitonvinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        nguoitonhvinh::create(
            [
                'ID_exeltonvinh'=>1,
                'hoten'=>'Tran Quoc Viet',
                'ngaysinh'=>"25/12/2000",
                'sodienthoai'=>'1234567789',
                'diachi'=>'Quy Nhon',
                'nhommau'=>'A',
                'nhomRh'=>"Rh Am",
                'muctonvinh'=>'5',
                'solanhien'=>'10'
            ]
            );
    }
}
