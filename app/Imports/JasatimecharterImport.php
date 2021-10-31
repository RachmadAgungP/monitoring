<?php

namespace App\Imports;

use App\Jasatimecharter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JasatimecharterImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jasatimecharter([
            'nama_angkutan' => $row['nama_angkutan'],
            'kelas_kapasitas'=> $row['kelas_kapasitas'],
            'nama_vendor'=> $row['nama_vendor'],
            'tarif'=> $row['tarif'],
            'kapasitas'=> $row['kapasitas'],
            'kontrak'=> $row['kontrak'],
            'tgl_kontrak'=> $row['tgl_kontrak'],
            'mulai'=> $row['mulai'],
            'akhir'=> $row['akhir'],
        ]);
    }
}
