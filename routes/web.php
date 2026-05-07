<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $markup = file_get_contents(resource_path('views/welcome.blade.php'));

    $markup = str_replace(
        "{{ str_replace('_', '-', app()->getLocale()) }}",
        str_replace('_', '-', app()->getLocale()),
        $markup
    );

    return response($markup)->header('Content-Type', 'text/html');
});
