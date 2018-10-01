<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Feedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id_feedback');
            $table->integer('id_siswa')->unsigned();
            $table->integer('id_guru')->unsigned();
            $table->string('isi_feedback');
            $table->foreign('id_siswa')
                    ->references('id_siswa')
                    ->on('siswa')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('id_guru')
                    ->references('id_guru')
                    ->on('guru')
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
        Schema::dropIfExists('feedback');
    }
}
