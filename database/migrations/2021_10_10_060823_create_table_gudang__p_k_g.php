<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGudangPKG extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudang_PKG', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lokasi_gudang');
            $table->string('alamat_gudang');
            $table->string('provinsi');
            $table->string('nama_rekanan');
            $table->integer('kap_GP_(Ton)');
            $table->integer('Kapasitas_Anper_Lain');
            $table->integer('sewa_Gudang_(Rp/bulan)');
            $table->integer('pengelolan_Stock_(Rp/bulan)');
            $table->integer('B/M_(Rp/Ton)');
            $table->integer('rebag_(Rp/Ton)');
            $table->integer('lembur_(Rp/Ton)');
            $table->integer('restapel_(Rp/Ton)');
            $table->string('nomor_surat');
            $table->date('tgl_kontrak');
            $table->date('mulai');
            $table->date('akhir');
            $table->string('jenis_surat');
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
        Schema::dropIfExists('gudang_PKG');
    }
}
