<?php

use App\Model\lichsu_exeltonvinh;
use App\Model\matkhau_doilai;
use App\Model\nguoihienmau;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(donvi_benhvienSeeder::class);
        $this->call(dottonvinhSeeder::class);
        $this->call(dsxulytonvinhSeeder::class);
        $this->call(exeltonvinhSeeder::class);
        $this->call(exel_benhvienSeeder::class);
        $this->call(lichsu_exeltonvinhSeeder::class);
        $this->call(matkhau_doilaiSeeder::class);
        $this->call(nguoihienmauSeeder::class);
        $this->call(nguoihienmau_benhvienSeeder::class);
        $this->call(nguoitonvinhSeeder::class);
        $this->call(vungSeeder::class);
       
    }
}
