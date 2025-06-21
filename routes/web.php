<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\VenueController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\HomeController;

Route::resource('venues', VenueController::class);
Route::resource('books',BookController::class);
Route::resource('services', ServiceController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');
