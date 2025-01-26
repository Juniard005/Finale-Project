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
            'kode_kelas' => $row[0],
            'nama_kelas' => $row[1],
            'periodes_id' => $row[2],
            'gurus_id' => $row[3]
        ]);
    }
}
