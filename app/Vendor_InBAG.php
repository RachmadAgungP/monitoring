<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_InBAG extends Model

{
    protected $table = "vendor_inbag";
    protected $fillable = ['id_vendor', 'nama_vendor', 'keterangan_vendor'];
}
