<?php

namespace App\Filament\Resources\JadBelResource\Pages;

use Filament\Actions;
use App\Filament\Resources\JadBelResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateJadBel extends CreateRecord
{
    protected static string $resource = JadBelResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Jadwal Belajar';
    }
}

