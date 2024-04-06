<?php

use App\Http\Controllers\Kitsu\KitsuController;
use Illuminate\Support\Facades\Route;

Route::controller(KitsuController::class)->group(function () {
    Route::get('/', 'show')->name('show');
})->name('kitsu');
