<?php

namespace App\Imports;

use App\Rekaptaripfranco;
use Maatwebsite\Excel\Concerns\ToModel;

class RekaptaripfrancoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rekaptaripfranco([
            //
        ]);
    }
}
