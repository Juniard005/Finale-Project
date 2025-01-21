<?php

namespace App\Filament\Resources\JadBelResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\JadBelResource;
use Illuminate\Contracts\Support\Htmlable;

class ListJadBels extends ListRecords
{
    protected static string $resource = JadBelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Jadwal Belajar';
    }
}
