<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendorcontainer extends Model
{
    protected $table = "vendor_container";
    protected $fillable = ['id_vendor','nama_vendor','keterangan_vendor'];
}
