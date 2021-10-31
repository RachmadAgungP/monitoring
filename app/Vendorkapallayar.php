<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendorkapallayar extends Model
{
    protected $table = "vendor_kapallayar";
    protected $fillable = ['id_vendor','nama_vendor','keterangan_vendor'];
}
