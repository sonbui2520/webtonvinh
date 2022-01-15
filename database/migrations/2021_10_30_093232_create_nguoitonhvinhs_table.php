<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoitonhvinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoitonhvinhs', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_exeltonvinh');
            $table->string('hoten');
            $table->string('ngaysinh');
            $table->string('sodienthoai');
            $table->string('diachi');
            $table->string('nhommau');
            $table->string('nhomRh');
            $table->integer('muctonvinh');
            $table->integer('solanhien');
            $table->integer("newmuctonvinh")->nullable();
            $table->integer('xetlan1')->nullable()->default(0);
            $table->string('xetlan2')->nullable()->default(0);
            $table->integer('loi')->nullable()->default(0);
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
        Schema::dropIfExists('nguoitonhvinhs');
    }
}
