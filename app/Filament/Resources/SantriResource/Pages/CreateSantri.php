<?php

namespace App\Filament\Resources\SantriResource\Pages;

use App\Models\User;
use App\Filament\Resources\SantriResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSantri extends CreateRecord
{
    protected static string $resource = SantriResource::class;

    // protected function getRedirectUrl(): string
    // {
    //     $name = Auth::user()->name;

    //     Notification::make()
    //         ->success()
    //         ->title('Santri Berhasil Di Tambahkan')
    //         ->body('Saat Ini Santri Nya Sudah Berhasil di Tambahkan' . $name)
    //         ->actions([
    //             Action::make('view')
    //                 ->url(fn()=> 'santris/show/'.$this->record->id, shouldOpenInNewTab:true)
    //         ])
    //         ->sendToDatabase(User::whereNot('id', Auth::user()->id)->get());

    //     return '/users';
    // }
}
