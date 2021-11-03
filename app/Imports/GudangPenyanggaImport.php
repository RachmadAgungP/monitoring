<?php

namespace App\Imports;

use App\GudangPenyangga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GudangPenyanggaImport implements ToModel, WithHeadingRow

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GudangPenyangga([
            'id' => $row['id'],
            'nama_rekanan' => $row['nama_rekanan'],
            'lokasi_gudang' => $row['lokasi_gudang'],
            'alamat_gudang' => $row['alamat_gudang'],
            'provinsi' => $row['provinsi'],
            'keterangan' => $row['keterangan'],

        ]);
    }
}
