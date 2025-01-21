<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne(Santri::class, 'kelas_id', 'id');
    }
}
