<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Mail\ContactMail;
use App\Models\Visit;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/visitas/{year}', function ($year) {
    return Visit::whereYear('created_at', $year)->count();
});
Route::get('/visitas-detail', function () {

    $visits =Visit::get();
    return $visits?$visits->toArray():[];
});

Route::get('/clear-cache', function () {
    // Limpiar caché de la aplicación
    Artisan::call('cache:clear');

    // Limpiar caché de configuración
    Artisan::call('config:clear');

    // Limpiar caché de rutas
    Artisan::call('route:clear');

    // Limpiar caché de vistas
    Artisan::call('view:clear');

    // Opción para limpiar todo en un paso
    // Artisan::call('optimize:clear');

    return response()->json(['message' => 'Caches cleared successfully']);
});
