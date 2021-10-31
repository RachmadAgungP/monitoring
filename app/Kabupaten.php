<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = "kabupaten";
    protected $fillable = [
        'id',
        'nama_kabupaten',
        'provinsi',
        'keterangan',
    ];
}
