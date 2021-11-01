<?php

namespace App\Imports;

use App\Jasacontainer;
use Maatwebsite\Excel\Concerns\ToModel;

class JasacontainerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jasacontainer([
            'kode_rutes' => $row['kode_rutes'],
            'nama_vendor'=> $row['nama_vendor'],
            'status_pemenang'=> $row['status_pemenang'],
            'kontrak'=> $row['kontrak'],
            'tgl_kontrak'=> $row['tgl_kontrak'],
            'mulai'=> $row['mulai'],
            'akhir'=> $row['akhir'], 
        ]);
    }
}
