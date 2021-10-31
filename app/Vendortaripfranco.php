<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendortaripfranco extends Model
{
    protected $table = "vendor_taripfranco";
    protected $fillable = ['id_vendor','nama_vendor','keterangan_vendor'];
}
