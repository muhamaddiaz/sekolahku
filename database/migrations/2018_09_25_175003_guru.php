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
            $table->integer('school_info_id')->unsigned();
            $table->string('nama');
            $table->string('mata pelajaran');
            $table->string('wali_kelas')->nullable();
            $table->foreign('school_info_id')
                    ->references('id')
                    ->on('school_infos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
