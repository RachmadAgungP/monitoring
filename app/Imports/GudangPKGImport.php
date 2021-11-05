<?php

namespace App\Imports;

use App\GudangPKG;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GudangPKGImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new GudangPKG([
            'ids' => $row['ids'],
            'lokasi_gudangs' => $row['lokasi_gudangs'],
            'kap_GP_Ton' => $row['kap'],
            'Kapasitas_Anper_Lain'      => $row['kapasitas_anper_lain'],
            'sewa_Gudang_Rpbulan'       => $row['sewa_gudang_rpbulan'],
            'pengelolan_Stock_Rpbulan'  => $row['pengelolan_stock_rpbulan'],
            'BM_RpTon'                  => $row['bm_rpton'],
            'rebag_RpTon'               => $row['rebag_rpton'],
            'lembur_RpTon'              => $row['lembur_rpton'],
            'restapel_RpTon'            => $row['restapel_rpton'],
            'nomor_surat'               => $row['nomor_surat'],
            'tgl_kontrak'               => $row['tgl_kontrak'],
            'mulai'                     => $row['mulai'],
            'akhir'                     => $row['akhir'],
            'jenis_surat'               => $row['jenis_surat'],
            'keterangan'                => $row['keterangan'],
        ]);
    }
}
