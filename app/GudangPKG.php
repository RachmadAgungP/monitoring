<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GudangPKG extends Model
{
    protected $table = "gudang_pkg";
    protected $fillable = [
        'id',
        'lokasi_gudang',
        'alamat_gudang',
        'provinsi',
        'nama_rekanan',
        'kap_GP_Ton',
        'Kapasitas_Anper_Lain',
        'sewa_Gudang_Rpbulan',
        'pengelolan_Stock_Rpbulan',
        'BM_RpTon',
        'rebag_RpTon',
        'lembur_RpTon',
        'restapel_RpTon',
        'nomor_surat',
        'tgl_kontrak',
        'mulai',
        'akhir',
        'jenis_surat',
        'keterangan',
    ];
}
