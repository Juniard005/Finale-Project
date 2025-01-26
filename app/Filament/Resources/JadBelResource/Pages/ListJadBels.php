<?php

namespace App\Filament\Resources\JadBelResource\Pages;

use Filament\Actions;
use Illuminate\Contracts\View\View;
use App\Imports\JadBelsImport;
use Maatwebsite\Excel\Facades\Excel;
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

    public function getHeader(): ?View
    {
        $data = Actions\CreateAction::make();
        return view('filament.custom.upload-file-jadbel', compact('data'));
    }

    public $file = '';

    public function save()
    {
        if($this->file != '') {
            Excel::import(new JadBelsImport, $this->file);
        }
    }
}
