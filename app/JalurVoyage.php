<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JalurVoyage extends Model
{
    protected $table = "jalur_voyage";
    protected $fillable = ['kode_rute','asal','tujuan','tarif_lebihdari_10000ton','tarif_kurangdari_10000ton'];

}
