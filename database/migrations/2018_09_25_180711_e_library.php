<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ELibrary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('library', function (Blueprint $table) {
            $table->increments('id_library');
            $table->integer('id_siswa')->unsigned();
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('kategori');
            $table->string('video')->nullable();
            $table->foreign('id_siswa')
                    ->references('id_siswa')
                    ->on('siswa')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library');
    }
}
