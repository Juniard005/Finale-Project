<?php

use App\Models\santri;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\sendEmailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify/{id}/{hash}', function (Request $request, Santri $santri) {
    return $santri->setValidatedEmail($request);
})->name('verification.verify');
