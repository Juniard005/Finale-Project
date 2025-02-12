<?php

namespace App\Models;

use App\Enums\KegiatanStatus;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $casts = [
        'status' => KegiatanStatus::class,
    ];

    protected $guarded = [];
}
