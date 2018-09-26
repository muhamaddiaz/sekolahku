<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Guru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id_guru');
            $table->integer('id_feedback')->nullable();
            $table->string('nama');
            $table->string('mata pelajaran');
            $table->integer('id_kelas')->nullable();
            $table->string('sekolah');
            $table->string('password');
            $table->string('email')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('guru');
    }
}
