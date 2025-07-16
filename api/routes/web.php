<?php

use App\Http\Controllers\announcementController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\MainfestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
use App\Models\announcement;
use App\Models\Payment;


Route::redirect('/','/welcome')->name('dashboard');
Route::middleware(['auth','verified'])->group( function(){

                Route::get('/welcome',[DashboardController::class,'view'])->name('welcome.index');
                Route::get('/home',function(){return view('home');})->name('home.index');
                Route::get('/register', [RegisteredUserController::class,'create'])->name('register');
                Route::get('/driver', [DriverController::class,'view']);
                Route::get('/route', [RouteController::class,'view']);
                Route::get('/schedule', [ScheduleController::class,'view'])->name('schedule.view');
                Route::get('/adddriver', [DriverController::class,'view']);
                Route::get('/addbus', [BusController::class,'view']);
                Route::get('/busEdit/{id}', [BusController::class,'edit']);
                Route::get('/editPayment/{id}', [PaymentController::class,'edit']);
                Route::get('/driverEdit/{id}', [DriverController::class,'edit']);
                Route::get('/routeEdit/{id}', [RouteController::class,'edit']);
                Route::get('/routelist', [RouteController::class,'view'])->name('routelist.view');
                Route::get('/paymentList', [PaymentController::class,'viewlist'])->name('paymentlist.view');
                Route::get('/buslist', [BusController::class,'viewlist'])->name('buslist.view');
                Route::get('/driverlist', [DriverController::class,'viewlist'])->name('driverlist.view');
                Route::get('/payment', function () {return view('payment.payment');});
                Route::get('/revenue', [RevenueController::class,'view']);
                Route::get('/mainfest', [MainfestController::class,'view'])->name('mainfest.view');
                Route::delete('/routelist/{id}', [RouteController::class,'delete'])->name('delete.route');
                Route::delete('/buslist/{id}', [BusController::class,'delete']);
                Route::delete('/driverlist/{id}', [DriverController::class,'delete']);
                Route::delete('/schedule/{id}', [ScheduleController::class,'destroy']);
                Route::post('/scheduleEdit/{id}', [ScheduleController::class,'edit']);
                Route::get('/scheduleEditview/{id}', [ScheduleController::class,'editView']);
                Route::delete('/paymentlist/{id}', [PaymentController::class,'delete'])->name('delete.payment');
                Route::post('/adddriver', [DriverController::class,'store']);
                Route::post('/route', [RouteController::class,'store'])->name('route.store');
                Route::post('/schedule', [ScheduleController::class,'store'])->name('schedule.store');
                Route::post('/bus', [BusController::class,'Store'])->name('bus.store');
                Route::post('/payment', [PaymentController::class,'store'])->name('payment.store');
                Route::put('/addbus/{id}', [BusController::class,'update'])->name('bus.update');
                Route::put('/adddriver/{id}', [DriverController::class,'update'])->name('driver.update');
                Route::put('/addroute/{id}', [RouteController::class,'update'])->name('route.update');
                Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy'])
                                                                                 ->name('delete.schedule');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
