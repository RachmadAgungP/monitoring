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
        'kap_GP_(Ton)',
        'Kapasitas_Anper_Lain',
        'sewa_Gudang_(Rp/bulan)',
        'pengelolan_Stock_(Rp/bulan)',
        'B/M_(Rp/Ton)',
        'rebag_(Rp/Ton)',
        'lembur_(Rp/Ton)',
        'restapel_(Rp/Ton)',
        'nomor_surat',
        'tgl_kontrak',
        'mulai',
        'akhir',
        'jenis_surat',
        'keterangan',
    ];
}
