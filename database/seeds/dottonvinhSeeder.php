<?php

use App\Model\dottonvinh;
use Illuminate\Database\Seeder;

class dottonvinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        dottonvinh::create(
            [
                'tendot_tonvinh'=>'dot 2021',
            ]
            );
    }
}
