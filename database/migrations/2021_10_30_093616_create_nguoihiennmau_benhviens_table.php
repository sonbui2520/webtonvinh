<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoihiennmauBenhviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoihiennmau_benhviens', function (Blueprint $table) {
            $table->id();
            $table->string('hoten');
            $table->string('ngaysinh');
            $table->string('noilamviec');
            $table->string('sodienthoai');
            $table->string('diachi');
            $table->integer('solanhien');
            $table->string('nhommau');
            $table->string('nhomRh');
            $table->integer('ID_exelbenhvien');
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
        Schema::dropIfExists('nguoihiennmau_benhviens');
    }
}
