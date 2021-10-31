<?php

namespace App\Imports;

use App\Kabupaten;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KabupatenImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kabupaten([

            'id' => $row['id'],
            'nama_kabupaten' => $row['nama_kabupaten'],
            'provinsi' => $row['provinsi'],
            'keterangan' => $row['keterangan'],

        ]);
    }
}
