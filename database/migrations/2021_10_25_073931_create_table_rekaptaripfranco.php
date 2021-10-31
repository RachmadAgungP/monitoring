<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRekaptaripfranco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekaptaripfranco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_rute');
            $table->string('nama_vendor');
            $table->string('status_pemenang');
            $table->string('kontrak');
            $table->date('tgl_kontrak');
            $table->date('mulai');
            $table->date('akhir');
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
        Schema::dropIfExists('rekaptaripfranco');
    }
}
