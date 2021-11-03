<?php

namespace App\Imports;

use App\Vendor_Curah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Vendor_CurahImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vendor_Curah([
            'id_vendor' => $row['id_vendor'],
            'nama_vendor' => $row['nama_vendor'], 
            'keterangan_vendor' => $row['keterangan_vendor'],
        ]);
    }
}
