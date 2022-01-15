<?php

use Illuminate\Database\Seeder;
use App\Model\donvi_benhvien;
class donvi_benhvienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        donvi_benhvien::create(
            [
                'tendonvi'=>'Đơn vị Quy Nhơn'
            ]
            );
        
            donvi_benhvien::create(
                [
                    'tendonvi'=>'Đơn vị Tuy Phước'
                ]
                );
    }
}
