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
            $table->integer('id_sekolah')->unsigned();
            $table->string('nama');
            $table->string('mata pelajaran');
            $table->string('wali_kelas')->nullable();
            $table->string('password');
            $table->string('email')->nullable();
            $table->foreign('id_sekolah')
                    ->references('id')
                    ->on('school_infos')
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
        Schema::dropIfExists('guru');
    }
}
