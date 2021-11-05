<?php

namespace App\Imports;

use App\Gudangpetroganik;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GudangpetroganikImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Gudangpetroganik([
            'id' => $row['id'],
            'nama_rekanan' => $row['nama_rekanan'],
            'lokasi_gudang' => $row['lokasi_gudang'],
            'alamat_gudang' => $row['alamat_gudang'],
            'provinsi' => $row['provinsi'],
            'keterangan' => $row['keterangan'],
        ]);
    }
}
