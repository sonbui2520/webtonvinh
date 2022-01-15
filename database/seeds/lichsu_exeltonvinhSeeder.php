<?php

use App\Model\lichsu_exeltonvinh;
use Illuminate\Database\Seeder;

class lichsu_exeltonvinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        lichsu_exeltonvinh::create(
            [
                'ID_exeltonvinh'=>'1',
                
            ]
            );
    }
}
