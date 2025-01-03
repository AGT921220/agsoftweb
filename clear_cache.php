<?php

use Illuminate\Support\Facades\Artisan;

require __DIR__ . '/bootstrap/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$app->make(Illuminate\Contracts\Http\Kernel::class)->handle(
    $request = Illuminate\Http\Request::capture()
);

Artisan::call('optimize:clear');

echo "Cache cleared successfully!";
