<?php

namespace App\Imports;

use App\Rekapalihstok;
use Maatwebsite\Excel\Concerns\ToModel;

class RekapalihstokImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rekapalihstok([
            //
        ]);
    }
}
