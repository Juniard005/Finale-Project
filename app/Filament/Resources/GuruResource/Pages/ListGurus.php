<?php

namespace App\Filament\Resources\GuruResource\Pages;

use Filament\Actions;
use Illuminate\View\View;
use App\Imports\GurusImport;
use App\Filament\Resources\GuruResource;
use Maatwebsite\Excel\Facades\Excel;
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

    public function getHeader(): ?View
    {
        $data = Actions\CreateAction::make();
        return view('filament.custom.upload-file-guru', compact('data'));
    }

    public $file = '';

    public function save()
    {
        if($this->file != '') {
            Excel::import(new GurusImport, $this->file);
        }
    }
}
