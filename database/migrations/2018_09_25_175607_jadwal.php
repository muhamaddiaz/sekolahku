<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->integer('id_kelas')->unsigned();
            $table->string('tanggal_jadwal');
            $table->string('status_jadwa;');
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
        Schema::dropIfExists('jadwal');
    }
}
