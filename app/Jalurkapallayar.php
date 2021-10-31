<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jalurkapallayar extends Model
{
    protected $table = "jalur_kapallayar";
    protected $fillable = ['kode_rute','asal','tujuan','wilayah','tarif'];
}
