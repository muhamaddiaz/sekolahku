<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id')->unsigned()->nullable();
            $table->integer('school_info_id')->unsigned();
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('kategori');
            $table->string('video')->nullable();
            $table->foreign('siswa_id')
                    ->references('id')
                    ->on('siswa');
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
        Schema::dropIfExists('libraries');
    }
}
