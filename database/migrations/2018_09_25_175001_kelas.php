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
            $table->increments('id');
            $table->integer('school_info_id')->unsigned();
            $table->string('tingkat_kelas');
            $table->string('jurusan_kelas');
            $table->string('bagian_kelas');
            $table->foreign('school_info_id')
                ->references('id')
                ->on('school_infos')
                ->onDelete('cascade');
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
