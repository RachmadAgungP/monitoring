<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jalurcontainer extends Model
{
    protected $table = "jalur_container";
    protected $fillable = ['kode_rute','asal','tujuan','wilayah','tarif'];
}
