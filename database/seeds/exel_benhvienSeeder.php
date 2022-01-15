<?php

use App\Model\exel_benhvien;
use Illuminate\Database\Seeder;

class exel_benhvienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        exel_benhvien::create(
            [
                'tenexelbenhvien'=>'Bệnh viện Quy Nhơn',
                'ID_donvibenhvien'=>'1',
                
            ]
            );
    }
}
