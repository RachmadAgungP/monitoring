<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jalurgeneralcargo extends Model
{
    protected $table = "jalur_generalcargo";
    protected $fillable = ['kode_rute','asal','tujuan','wilayah','tarif'];
}
