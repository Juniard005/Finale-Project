<?php

namespace App\Filament\Resources\KelasResource\Pages;

use Filament\Actions;
use App\Imports\KelasImport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Filament\Resources\KelasResource;
use Filament\Resources\Pages\ListRecords;

class ListKelas extends ListRecords
{
    protected static string $resource = KelasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeader(): ?View
    {
        $data = Actions\CreateAction::make();
        return view('filament.custom.upload-file-kelas', compact('data'));
    }

    public $file = '';

    public function save()
    {
        if($this->file != '') {
            Excel::import(new KelasImport, $this->file);
        }
    }
}
