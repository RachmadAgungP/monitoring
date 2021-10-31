<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendorgeneralcargo extends Model
{
    protected $table = "vendor_generalcargo";
    protected $fillable = ['id_vendor','nama_vendor','keterangan_vendor'];
}
