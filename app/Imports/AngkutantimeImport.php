<?php

namespace App\Imports;

use App\Angkutantime;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AngkutantimeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Angkutantime([
            'kode_angkutan' => $row['kode_angkutan'],
            'nama_angkutan' => $row['nama_angkutan'], 
            'keterangan_angkutan' => $row['keterangan_angkutan'], 
        ]);
    }
}
