<?php

namespace App\Filament\Resources\JadBelResource\Pages;

use App\Filament\Resources\JadBelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadBel extends EditRecord
{
    protected static string $resource = JadBelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
