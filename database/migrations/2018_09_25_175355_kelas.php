<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id_kelas');
            $table->integer('id_siswa');
            $table->string('tingkat_kelas');
            $table->string('jurusan_kelas');
            $table->integer('id_guru');
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
        Schema::dropIfExists('kelas');
    }
}
