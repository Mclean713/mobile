<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware("guest")->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

});

Route::middleware(['auth:sanctum'])->group(function () {

         Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

         Route::get('/user', function (Request $request) {    return $request->user(); });
         Route::get('/buses', function(){  return response()->json([
        [
            'id' => '1',
            'name' => 'Sososo Express',
            'time' => '07:00 AM',
            'price' => 50000,
            'route' => 'Zalewa',
            'availableSeats' => 15,
        ],
        [
            'id' => '2',
            'name' => 'EazyGo Bus',
            'time' => '08:30 AM',
            'price' => 45000,
            'route' => 'Chingeni',
            'availableSeats' => 10,
        ],
    ]);});
});


