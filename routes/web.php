<?php

use App\Models\santri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/email/verify', function (Request $request, Santri $santri) {
//         return $santri->setValidatedEmail($request);
//     })->name('verification.verify');
// });

