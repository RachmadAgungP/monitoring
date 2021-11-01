<?php

namespace App\Imports;

use App\Rekapalihstok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RekapalihstokImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rekapalihstok([
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
