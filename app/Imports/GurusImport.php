<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class GurusImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'nama_guru' => $row[0],
            'jenis_kelamin' => $row[1],
            'guru_matpel' => $row[2],
            'pend_akhir' => $row[3],
            'tempat_lahir' => $row[4],
            'tanggal_lahir' => $row[5]
        ]);
    }
}
