<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $guarded = [];

    public function santri()
    {
        return $this->hasMany(Santri::class, 'pekerjaans_id', 'id');
    }
}
