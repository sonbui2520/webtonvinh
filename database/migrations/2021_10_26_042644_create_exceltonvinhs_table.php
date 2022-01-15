<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExceltonvinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exceltonvinhs', function (Blueprint $table) {
            $table->id();
            $table->string("tenexeltonvinh");
            $table->integer("ID_dot");
            $table->integer("ID_vung");          
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
        Schema::dropIfExists('exceltonvinhs');
    }
}
