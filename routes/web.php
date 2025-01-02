<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

// Route::get('/', function () {
//     return view('index');
// });

Route::resource('/', HomeController::class)->only('index');
Route::resource('/contact', ContactController::class)
//->only('store')
;

Route::get('/test-email', function () {
    Mail::to("alfredo.gutierrez.92@hotmail.com")->send(new ContactMail('1234567890', 'John Doe', 'test@mail.com', 'This is a test message'));
    return 'Correo enviado';
});