<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Periode; // Ensure that the Periode class exists in this namespace
use App\Observers\JadBelObserver; // Ensure that the JadBelObserver class exists in this namespace
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
#[ObservedBy([JadBelObserver::class])]

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
