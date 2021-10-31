<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angkutantime extends Model
{
    protected $table = "angkutan_time";
    protected $fillable = ['kode_angkutan','nama_angkutan','keterangan_angkutan'];
}
