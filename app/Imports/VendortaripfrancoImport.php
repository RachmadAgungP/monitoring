<?php

namespace App\Imports;

use App\Vendortaripfranco;
use Maatwebsite\Excel\Concerns\ToModel;

class VendortaripfrancoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vendortaripfranco([
            //
        ]);
    }
}
