<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsxulytonvinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsxulytonvinhs', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_exeltonvinh');
            $table->integer("lan1")->default(0)->nullable();
            $table->integer("lan2")->default(0)->nullable();
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
        Schema::dropIfExists('dsxulytonvinhs');
    }
}
