<?php

namespace App\Imports;

use App\Jalurcontainer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class JalurcontainerImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jalurcontainer([
            'kode_rute' => $row['kode_rute'],
            'asal'=> $row['asal'],
            'tujuan'=> $row['tujuan'],
            'wilayah' => $row['wilayah'],
            'tarif' => $row['tarif'], 
        ]);
    }
}
