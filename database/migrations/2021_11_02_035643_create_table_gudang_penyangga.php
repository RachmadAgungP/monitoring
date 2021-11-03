<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGudangPenyangga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudang_penyangga', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_rekanan');
            $table->string('lokasi_gudang');
            $table->string('alamat_gudang');
            $table->string('provinsi');
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
        Schema::dropIfExists('gudang_penyangga');
    }
}
