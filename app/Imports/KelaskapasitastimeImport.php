<?php

namespace App\Imports;

use App\Kelaskapasitastime;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KelaskapasitastimeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kelaskapasitastime([
            'id_kelas_kapasitas' => $row['id_kelas_kapasitas'],
            'kelas_kapasitas' => $row['kelas_kapasitas'], 
             ]);
    }
}
