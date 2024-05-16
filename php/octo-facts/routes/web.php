<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $randomFact = DB::table('facts')
        ->inRandomOrder()
        ->first();

    $images = [];
    foreach (glob(__DIR__ . '/../public/img/*.jpg') as $img) {
        $images[] = basename($img);
    }

    return view('app', [
        'fact' => $randomFact,
        'image' => $images[array_rand($images)]
    ]);
});
