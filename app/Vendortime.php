<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendortime extends Model
{
    protected $table = "vendor_time";
    protected $fillable = ['id_vendor','nama_vendor','keterangan_vendor'];
}
