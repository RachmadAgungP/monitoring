<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJalurvoyage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalur_voyage', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->string('kode_rute');
            $table->string('asal');
            $table->string('tujuan');
            $table->string('tarif_lebihdari_10000ton');
            $table->string('tarif_kurangdari_10000ton');
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
        Schema::dropIfExists('jalurvoyage');
    }
}
