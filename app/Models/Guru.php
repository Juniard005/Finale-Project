<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\JadBel;
use App\Observers\GuruObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
#[ObservedBy([GuruObserver::class])]

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
