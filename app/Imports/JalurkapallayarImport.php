<?php

namespace App\Imports;

use App\Jalurkapallayar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class JalurkapallayarImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jalurkapallayar([
            'kode_rute' => $row['kode_rute'],
            'tarif' => $row['tarif'], 
            'wilayah' => $row['wilayah'],
        ]);
    }
}
