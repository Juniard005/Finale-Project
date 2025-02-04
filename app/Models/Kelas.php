<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Periode;
use App\Observers\KelasObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
#[ObservedBy([KelasObserver::class])]

class Kelas extends Model
{
    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'gurus_id', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periodes_id', 'id');
    }

    public function santri()
    {
        return $this->hasMany(Santri::class, 'kelas_id', 'id');
    }
}
