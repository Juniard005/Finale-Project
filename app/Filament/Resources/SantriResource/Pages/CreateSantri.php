<?php

namespace App\Filament\Resources\SantriResource\Pages;

use App\Models\User;
use App\Filament\Resources\SantriResource;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;

class CreateSantri extends CreateRecord
{
    protected static string $resource = SantriResource::class;

    // protected function getCreatedNotification(): ?Notification
    // {
    //     return;
    // }
}
