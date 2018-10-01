<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EMading extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('mading', function (Blueprint $table) {
            $table->increments('id_mading');
            $table->integer('id_siswa')->unsigned();
            $table->string('judul_mading');
            $table->string('image_mading');
            $table->string('deskripsi');
            $table->string('kategori_mading');
            $table->foreign('id_siswa')
                    ->references('id_siswa')
                    ->on('siswa')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('library');
    }
}
