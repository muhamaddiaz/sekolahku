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
            $table->integer('school_info_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('nama');
            $table->string('NISN')->unique();
            $table->string('kelas');
            $table->string('email');
            $table->boolean('osis')->nullable();
            // $table->string('password');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('school_info_id')
                    ->references('id')
                    ->on('school_infos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            // $table->rememberToken();
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
