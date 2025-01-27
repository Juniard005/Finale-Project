<?php

namespace App\Observers;

use App\Models\Guru;
use App\Models\User;
use Filament\Notifications\Notification;

class GuruObserver
{
    /**
     * Handle the Guru "created" event.
     */
    public function created(Guru $guru): void
    {
        Notification::make()
        ->success()
        ->title('Data Guru Telah Terdaftar')
        ->body('Data Seorang Guru Berhasil Ditambahkan')
        ->sendToDatabase(User::whereHas('roles',function($query){
            $query->where('name','super_admin');
        })->get());
    }

    /**
     * Handle the Guru "updated" event.
     */
    public function updated(Guru $guru): void
    {
        Notification::make()
        ->success()
        ->title('Data Guru Behasil Di Update')
        ->body('Data Seorang Guru Berhasil DiUpdate')
        ->sendToDatabase(User::whereHas('roles',function($query){
            $query->where('name','super_admin');
        })->get());
    }

    /**
     * Handle the Guru "deleted" event.
     */
    public function deleted(Guru $guru): void
    {
        Notification::make()
        ->success()
        ->title('Data Guru Behasil Hapus')
        ->body('Data Seorang Guru Berhasil DiHapus')
        ->sendToDatabase(User::whereHas('roles',function($query){
            $query->where('name','super_admin');
        })->get());
    }

    /**
     * Handle the Guru "restored" event.
     */
    public function restored(Guru $guru): void
    {
        //
    }

    /**
     * Handle the Guru "force deleted" event.
     */
    public function forceDeleted(Guru $guru): void
    {
        //
    }
}
