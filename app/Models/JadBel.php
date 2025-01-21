<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Periode;
use Illuminate\Database\Eloquent\Model;

class JadBel extends Model
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
}
