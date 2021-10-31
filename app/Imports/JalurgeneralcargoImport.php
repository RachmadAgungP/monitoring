<?php

namespace App\Imports;

use App\Jalurgeneralcargo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JalurgeneralcargoImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jalurgeneralcargo([
            'kode_rute' => $row['kode_rute'],
            'asal'=> $row['asal'],
            'tujuan'=> $row['tujuan'],
            'wilayah' => $row['wilayah'],
            'tarif' => $row['tarif'], 
        ]);
    }
}
