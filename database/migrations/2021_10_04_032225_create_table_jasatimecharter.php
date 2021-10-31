<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJasatimecharter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasatimecharter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_angkutan');
            $table->string('kelas_kapasitas');
            $table->string('nama_vendor');
            $table->string('kapasitas');
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
        Schema::dropIfExists('jasatimecharter');
    }
}
