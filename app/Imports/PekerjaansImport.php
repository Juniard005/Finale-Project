<?php

namespace App\Imports;

use App\Models\Pekerjaan;
use Maatwebsite\Excel\Concerns\ToModel;

class PekerjaansImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pekerjaan([
            'nama_pekerjaan' => $row[0],
        ]);
    }
}
