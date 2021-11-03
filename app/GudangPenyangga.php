<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GudangPenyangga extends Model
{
    protected $table = "gudang_penyangga";
    protected $fillable = [
        'id',
        'nama_rekanan',
        'lokasi_gudang',
        'alamat_gudang',
        'provinsi',
        'keterangan',
    ];
}
