<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Actions;
use Filament\Actions\Action;
use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // protected function aftersave() : void{
    //     Notification::make()
    //         ->success()
    //         ->title('User Berhasil Di Update')
    //         ->body('Saat Ini User Nya Sudah Berhasil Gue Edit.')
    //         ->actions([
    //             Action::make('view')
    //                 ->url(fn()=> 'users/show/'.$this->record->id, shouldOpenInNewTab:true)
    //         ])
    //         ->sendToDatabase(User::whereNot('id',auth()->user()->id)->get());
    // }
}
