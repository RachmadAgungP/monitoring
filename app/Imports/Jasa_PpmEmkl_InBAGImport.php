<?php

namespace App\Imports;

use App\Jasa_PpmEmkl_InBAG;
use Maatwebsite\Excel\Concerns\ToModel;

class Jasa_PpmEmkl_InBAGImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jasa_PpmEmkl_InBAG([
        'tujuan' => $row['tujuan'],
        'wilayah' => $row['wilayah'],
        'tarif_PBM' => $row['tarif_PBM'],
        'tarif_EMKL' => $row['tarif_EMKL'],
        'total_PBM_EMKL'=> $row['total_PBM_EMKL'],
        'crane'=> $row['crane'],
        'pemegang_kontrak'=> $row['pemegang_kontrak'],
        'status_pemenang'=> $row['status_pemenang'],
        'kontrak'=> $row['kontrak'],
        'tgl_kontrak'=> $row['tgl_kontrak'],
        'mulai'=> $row['mulai'],
        'akhir'=> $row['akhir'],
        'keterangan' => $row['keterangan']
        ]);
    }
}
