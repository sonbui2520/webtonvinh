<?php

use App\Model\matkhau_doilai;
use Illuminate\Database\Seeder;

class matkhau_doilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        matkhau_doilai::create(
            [
                'email'=>'admin@gmail.com',
                'matkhaucu'=>'admin',
                'matkhaumoi'=>'admin',
            ]
            );
    }
}
