<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJasaPpmEmklINBAG extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_PpmEmkl_InBAG', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tujuan');
            $table->string('wilayah');
            $table->integer('tarif_PBM');
            $table->integer('tarif_EMKL');
            $table->integer('total_PBM_EMKL');
            $table->integer('crane');
            $table->string('pemegang_kontrak');
            $table->string('status_pemenang');
            $table->string('kontrak');
            $table->date('tgl_kontrak');
            $table->date('mulai');
            $table->date('akhir');
            $table->string('keterangan');
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
        Schema::dropIfExists('jasa_PpmEmkl_InBAG');
    }
}
