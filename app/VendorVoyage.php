<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorVoyage extends Model
{
    protected $table = "vendor_voyage";
    protected $fillable = ['id_vendor','nama_vendor','keterangan_vendor'];
}
