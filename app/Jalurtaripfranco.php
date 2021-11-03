<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jalurtaripfranco extends Model
{
    protected $table = "jalur_taripfranco";
    protected $fillable = ['kode_rute','jenisgudanga','asal','tujuan','wilayah','tarif'];
}
