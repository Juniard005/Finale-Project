<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\AbsensiStatus;
use App\Models\Guru;
use App\Models\santri;

class Absensi extends Model
{
    protected $casts = [
        'status' => AbsensiStatus::class,
    ];

    protected $guarded = [];

    public function Santri()
    {
        return $this->belongsTo(Santri::class, 'santris_id', 'id');
    }

    public function Periode()
    {
        return $this->belongsTo(Periode::class, 'periodes_id', 'id');
    }
}
