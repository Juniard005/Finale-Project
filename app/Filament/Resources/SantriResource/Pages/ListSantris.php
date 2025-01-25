<?php

namespace App\Filament\Resources\SantriResource\Pages;

use Filament\Actions;
use Illuminate\View\View;
use App\Imports\SantrisImport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SantriResource;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View as ViewView;

class ListSantris extends ListRecords
{
    protected static string $resource = SantriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Data Santri';
    }

    public function getHeader(): ?View
    {
        $data = Actions\CreateAction::make();
        return view('filament.custom.upload-file', compact('data'));
    }

    public $file = '';

    public function save()
    {
        if($this->file != '') {
            Excel::import(new SantrisImport, $this->file);
        }
    }
}
