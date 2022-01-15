<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoihienmausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoihienmaus', function (Blueprint $table) {
            $table->id();
            $table->string('hoten');
            $table->string('ngaysinh');
            $table->string('noilamviec');
            $table->string('sodienthoai');
            $table->string('diachi');
            $table->integer('solanhien');
            $table->string('nhommau');
            $table->string('nhomRh');
            $table->date('Muc_5')->nullable();
            $table->date('Muc_10')->nullable();
            $table->date('Muc_15')->nullable();
            $table->date('Muc_20')->nullable();
            $table->date('Muc_30')->nullable();
            $table->date('Muc_40')->nullable();
            $table->date('Muc_50')->nullable();
            $table->date('Muc_60')->nullable();
            $table->date('Muc_70')->nullable();
            $table->date('Muc_80')->nullable();
            $table->date('Muc_90')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoihienmaus');
    }
}
