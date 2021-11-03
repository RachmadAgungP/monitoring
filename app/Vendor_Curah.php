<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_Curah extends Model
{
    protected $table = "vendor_curah";
    protected $fillable = ['id_vendor', 'nama_vendor', 'keterangan_vendor'];
}
