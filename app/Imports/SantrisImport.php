<?php

namespace App\Imports;

use App\Models\santri;
use Maatwebsite\Excel\Concerns\ToModel;

class SantrisImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Santri([
            'nama' => $row[0],
            'jenis_kelamin' => $row[1],
            'tempat_lahir' => $row[2],
            'tanggal_lahir' => $row[3],
            'alamat' => $row[4],
            'no_hp' => $row[5],
            'nama_ayah' => $row[6],
            'nama_ibu' => $row[7],
            'pekerjaans_id' => $row[8],
            'kelas_id' => $row[9]
        ]);
    }
}
