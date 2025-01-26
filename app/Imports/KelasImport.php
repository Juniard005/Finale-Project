<?php

namespace App\Imports;

use App\Models\Kelas;

use Maatwebsite\Excel\Concerns\ToModel;

class KelasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kelas([
            'kode_kelas' => $row[0],
            'nama_kelas' => $row[1],
            'jurusan' => $row[2],
            'kapasitas' => $row[3],
            'gurus_id' => $row[4],
            'periodes_id' => $row[5]
        ]);
    }
}
