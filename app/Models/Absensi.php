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

    public function Guru()
    {
        return $this->belongsTo(Guru::class, 'gurus_id', 'id');
    }
}
