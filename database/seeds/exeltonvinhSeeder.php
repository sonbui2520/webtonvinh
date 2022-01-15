<?php

use App\Model\Exceltonvinh;
use Illuminate\Database\Seeder;

class exeltonvinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exceltonvinh::create(
            [
                'tenexeltonvinh'=>'Exel ton vinh lan 1',
                'ID_dot'=>1,
                'ID_vung'=>2,
                
            ]
            );
    }
}
