<?php

namespace App\Observers;

use App\Models\User;
use App\Models\JadBel; // Ensure that the JadBel class exists in this namespace
use Filament\Notifications\Notification;

class JadBelObserver
{
    /**
     * Handle the JadBel "created" event.
     */
    public function created(JadBel $jadBel): void
    {
        Notification::make()
        ->success()
        ->title('Data Mata Pelajaran Telah Terdaftar')
        ->body('Data Mata Pelajaran Berhasil Ditambahkan Hari Ini')
        ->sendToDatabase(User::whereHas('roles',function($query){
            $query->where('name','super_admin');
        })->get());
    }

    /**
     * Handle the JadBel "updated" event.
     */
    public function updated(JadBel $jadBel): void
    {
        Notification::make()
        ->success()
        ->title('Data Mata Pelajaran Berhasil DiUpdate')
        ->body('Data Mata Pelajaran Berhasil DiUpdate Hari Ini')
        ->sendToDatabase(User::whereHas('roles',function($query){
            $query->where('name','super_admin');
        })->get());
    }

    /**
     * Handle the JadBel "deleted" event.
     */
    public function deleted(JadBel $jadBel): void
    {
        Notification::make()
        ->success()
        ->title('Data Mata Pelajaran Telah Dihapus')
        ->body('Data Sebuah Mata Pelajaran Berhasil DiHapus')
        ->sendToDatabase(User::whereHas('roles',function($query){
            $query->where('name','super_admin');
        })->get());
    }

    /**
     * Handle the JadBel "restored" event.
     */
    public function restored(JadBel $jadBel): void
    {
        //
    }

    /**
     * Handle the JadBel "force deleted" event.
     */
    public function forceDeleted(JadBel $jadBel): void
    {
        //
    }
}
