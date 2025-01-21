<?php

namespace App\Filament\Resources\GuruResource\Pages;

use Filament\Actions;
use App\Filament\Resources\GuruResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListGurus extends ListRecords
{
    protected static string $resource = GuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Guru Atau Pengajar';
    }
}
