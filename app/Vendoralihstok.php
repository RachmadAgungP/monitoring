<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendoralihstok extends Model
{
    protected $table = "vendor_alihstok";
    protected $fillable = ['id_vendor','nama_vendor','keterangan_vendor'];
}
