<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Pekerjaan;
use Illuminate\Database\Eloquent\Model;

class santri extends Model
{
    protected $guarded = [];

    public function Pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaans_id', 'id');
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
