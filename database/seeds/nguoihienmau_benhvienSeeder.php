<?php

use App\Model\nguoihienmau;
use App\Model\nguoihiennmau_benhvien;
use Illuminate\Database\Seeder;

class nguoihienmau_benhvienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        nguoihiennmau_benhvien::create(
            [
                'hoten'=>'Tran Quoc Viet',
                'ngaysinh'=>'25/12/2000',
                'noilamviec'=>'Quy Nhon',
                'sodienthoai'=>'1234567789',
                'diachi'=>'Quy Nhon', 
                'solanhien'=>'5',
                'nhommau'=>'A',
                'nhomRh'=>'Rh Am',
                'ID_exelbenhvien'=>'1'
            ]
            );
    }
}
