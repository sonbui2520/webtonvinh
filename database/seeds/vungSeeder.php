<?php

use App\Model\Vung;
use Illuminate\Database\Seeder;

class vungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vung::create(
            [
                'tenkhuvuc'=>'Quy Nhơn',

            ]
            );
            Vung::create(
                [
                    'tenkhuvuc'=>'Hoài ân',

                ]
                );
    }
}
