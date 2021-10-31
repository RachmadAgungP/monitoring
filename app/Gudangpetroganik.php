<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudangpetroganik extends Model
{
    protected $table = "gudang_petroganik";
    protected $fillable = [
        'id',
        'nama_rekanan',
        'lokasi_gudang',
        'alamat_gudang',
        'provinsi',
        'keterangan',
    ];
}
