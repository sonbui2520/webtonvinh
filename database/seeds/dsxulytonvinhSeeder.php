<?php

use Illuminate\Database\Seeder;
use App\Model\dsxulytonvinh;
class dsxulytonvinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        dsxulytonvinh::create(
            [
                'ID_exeltonvinh'=>'1'
            ]
            );
    }
}
