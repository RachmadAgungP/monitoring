<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jaluralihstok extends Model
{
    protected $table = "jalur_alihstok";
    protected $fillable = ['kode_rute','asal','tujuan','wilayah','tarif'];
}
