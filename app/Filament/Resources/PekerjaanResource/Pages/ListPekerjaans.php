<?php

namespace App\Filament\Resources\PekerjaanResource\Pages;

use App\Filament\Resources\PekerjaanResource;
use App\Models\Pekerjaan;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PekerjaansImport;
use Illuminate\View\View;

class ListPekerjaans extends ListRecords
{
    protected static string $resource = PekerjaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeader(): ?View
    {
        $data = Actions\CreateAction::make();
        return view('filament.custom.upload-file-pekerjaan', compact('data'));
    }

    public $file = '';

    public function save()
    {
        if($this->file != '') {
            Excel::import(new PekerjaansImport, $this->file);
        }
    }
}
