<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('tentk');
            $table->string('email')->unique();
            $table->string('matkhau')->PASSWORD_BCRYPT;
            $table->string('Hoten');
            $table->string('sdt');
            $table->string('Quyen');
            $table->string('url_hinhanh')->nullable()->default("https://scontent.fdad3-1.fna.fbcdn.net/v/t1.30497-1/143086968_2856368904622192_1959732218791162458_n.png?_nc_cat=1&ccb=1-5&_nc_sid=7206a8&_nc_ohc=NwzaeU5vaKcAX8j89Ai&_nc_ht=scontent.fdad3-1.fna&oh=b69b25065d8a84e39d683cb6bcf681eb&oe=61D93578");
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
