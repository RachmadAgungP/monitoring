<?php

namespace App\Imports;

use App\Jalurvoyage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JalurvoyageImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jalurvoyage([
            'kode_rute' => $row['kode_rute'],
            'asal'=> $row['asal'],
            'tujuan'=> $row['tujuan'],
            'tarif_lebihdari_10000ton' => $row['tarif_lebihdari_10000ton'], 
            'tarif_kurangdari_10000ton' => $row['tarif_kurangdari_10000ton'], 
        ]);
    }
}
