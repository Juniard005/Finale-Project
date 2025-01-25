<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Kelas;
use Filament\Notifications\Notification;

class KelasObserver
{
    /**
     * Handle the Kelas "created" event.
     */
    public function created(Kelas $kelas): void
    {
        Notification::make()
        ->success()
        ->title('Data Kelas Telah Terdaftar')
        ->body('Data Sebuah Kelas Periode Baru Berhasil Ditambahkan')
        ->sendToDatabase(User::whereHas('roles',function($query){
            $query->where('name','admin');
        })->get());
    }

    /**
     * Handle the Kelas "updated" event.
     */
    public function updated(Kelas $kelas): void
    {
        Notification::make()
        ->success()
        ->title('Data Kelas Telah DiUpdate')
        ->body('Data Sebuah Kelas Periode Tersebut Berhasil Di Update')
        ->sendToDatabase(User::whereHas('roles',function($query){
            $query->where('name','admin');
        })->get());
    }

    /**
     * Handle the Kelas "deleted" event.
     */
    public function deleted(Kelas $kelas): void
    {
        Notification::make()
        ->success()
        ->title('Data Kelas Telah Dihapus')
        ->body('Data Sebuah Kelas Periode Lama Berhasil Dihapus')
        ->sendToDatabase(User::whereHas('roles',function($query){
            $query->where('name','admin');
        })->get());
    }

    /**
     * Handle the Kelas "restored" event.
     */
    public function restored(Kelas $kelas): void
    {
        //
    }

    /**
     * Handle the Kelas "force deleted" event.
     */
    public function forceDeleted(Kelas $kelas): void
    {
        //
    }
}
