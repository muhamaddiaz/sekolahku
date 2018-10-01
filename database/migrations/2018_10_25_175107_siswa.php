<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Siswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->integer('id_sekolah')->unsigned();
            $table->string('nama');
            $table->string('NISN')->unique();
            $table->integer('id_kelas')->unsigned();
            $table->string('email');
            $table->boolean('osis')->nullable();
            $table->string('password');
            $table->foreign('id_sekolah')
                    ->references('id')
                    ->on('school_infos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('id_kelas')
                    ->references('id_kelas')
                    ->on('kelas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('siswa');
    }
}
