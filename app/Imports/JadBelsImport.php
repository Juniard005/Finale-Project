<?php

namespace App\Imports;

use App\Models\JadBel;
use Maatwebsite\Excel\Concerns\ToModel;

class JadBelsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JadBel([
            //
        ]);
    }
}
