<?php

namespace App\Filament\Facades;

use App\Filament\Services\SantriService;
use Illuminate\Support\Facades\Facade;

class SantriServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SantriService::class;
    }
}
