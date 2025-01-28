<?php

namespace App\Filament\Service;

use App\Models\User;
use App\Models\santri;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use App\Filament\Widgets\SantriChart;
use Illuminate\Http\RedirectResponse;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\VerifyEmailNotification;
use id;

class SantriService
{
    public function createSantri (array $data) : santri
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'is_active' => true,
        ]);
        $user->assignRole('Santri');
        $user->givePermissionTo('santri');

        $data['user_id'] = $user->id;

        $santri = Santri::create($data);
        $this->sendEmailReminder($santri);

        return $santri;
    }

    public function setValidateEmail(Request $request)
    {
        $user = User::findOrFail($request->input('id'));
        if(is_null($user->email_verified_at)) {
            $user->email_verified_at = now();
            $user->save();
            $user->santri()->update([
                'state' => 1
            ]);
        }

        if(!Auth::loginUsingId($user->id)) {
            abort(403);
        }

        return redirect()->to('admin.login');
    }

    public function sendEmailReminder(Santri $santri, $toNotify = false): void
    {
        try {
            // this is important!
            $santri->user->notify(new VerifyEmailNotification());
            // my custom logics
            if($toNotify) {
                Notification::make()
                    ->title('Avviso')
                    ->body('Email di notifica Attivazione Account inviata')
                    ->success()
                    ->send();
            }
        } catch(\Exception $e) {
            Notification::make()
                ->title('Errore durante la richiesta')
                ->body($e->getMessage())
                ->danger()
                ->persistent()
                ->send();
        }
    }
}
