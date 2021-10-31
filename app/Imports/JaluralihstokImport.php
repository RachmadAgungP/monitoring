<?php

namespace App\Imports;

use App\Jaluralihstok;
use Maatwebsite\Excel\Concerns\ToModel;

class JaluralihstokImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jaluralihstok([
            //
        ]);
    }
}
