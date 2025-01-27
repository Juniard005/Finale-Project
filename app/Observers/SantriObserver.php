<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Santri;
use Filament\Notifications\Notification;

class SantriObserver
{
    /**
     * Handle the Santri "created" event.
     */
    public function created(Santri $santri): void
    {
        Notification::make()
        ->success()
        ->title('Santri Telah Terdaftar')
        ->body('Pendaftaran Santri Baru Sudah Berhasil.')
        ->sendToDatabase(User::whereHas('roles',function ($query){
            $query->where('name','super_admin');
        })->get());
    }

    /**
     * Handle the Santri "updated" event.
     */
    public function updated(Santri $santri): void
    {
        Notification::make()
        ->success()
        ->title('Data Santri Berhasil Diupdate')
        ->body('Data Santri Berhasil Diupdate.')
        ->sendToDatabase(User::whereHas('roles',function ($query){
            $query->where('name','super_admin');
        })->get());
    }

    /**
     * Handle the Santri "deleted" event.
     */
    public function deleted(Santri $santri): void
    {
        Notification::make()
        ->success()
        ->title('Santri Berhasil dihapus')
        ->body('Data Santri Berhasil Dihapus.')
        ->sendToDatabase(User::whereHas('roles',function ($query){
            $query->where('name','super_admin');
        })->get());
    }

    /**
     * Handle the Santri "restored" event.
     */
    public function restored(Santri $santri): void
    {
        //
    }

    /**
     * Handle the Santri "force deleted" event.
     */
    public function forceDeleted(Santri $santri): void
    {
        //
    }
}
