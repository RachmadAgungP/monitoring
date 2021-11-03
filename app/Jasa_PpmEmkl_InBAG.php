<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasa_PpmEmkl_InBAG extends Model
{
    public $table = "jasa_ppmemkl_inbag";
    protected $fillable = [
        'tujuan',
        'wilayah',
        'tarif_PBM',
        'tarif_EMKL',
        'total_PBM_EMKL',
        'crane',
        'pemegang_kontrak',
        'status_pemenang',
        'kontrak',
        'tgl_kontrak',
        'mulai',
        'akhir',
        'keterangan'
    ];
}
