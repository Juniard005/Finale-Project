<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\JadBel;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $guarded = [];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'periodes_id', 'id');
    }

    public function jadbel()
    {
        return $this->hasMany(JadBel::class, 'periodes_id', 'id');
    }
}
