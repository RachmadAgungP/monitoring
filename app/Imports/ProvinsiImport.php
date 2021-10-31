<?php

namespace App\Imports;

use App\Provinsi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ProvinsiImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Provinsi([
            'id_prov' => $row['id_prov'],
            'nama_provinsi' => $row['nama_provinsi'],
        ]);
    }
}
