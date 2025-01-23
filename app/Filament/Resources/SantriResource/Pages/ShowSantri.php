<?php

namespace App\Filament\Resources\SantriResource\Pages;

use App\Models\santri;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\SantriResource;


class ShowSantri extends Page
{
    protected static string $resource = SantriResource::class;

    protected static string $view = 'filament.resources.santri-resource.pages.show-santri';

    // public function getData(): ?Object
    // {
    //     $id = request()->segment(4);

    //     $result = santri::whereSlug($id)->first();

    //     return $result;
    // }
}
