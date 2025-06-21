<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\VenueController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\BookController;

Route::resource('venues', VenueController::class);
Route::resource('books',BookController::class);
Route::resource('services', ServiceController::class);
