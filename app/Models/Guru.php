<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\JadBel;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $guarded = [];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }

    public function jadbel()
    {
        return $this->hasMany(JadBel::class, 'gurus_id', 'id');
    }
}
