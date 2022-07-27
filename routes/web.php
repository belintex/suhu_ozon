<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Events\MyEvent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/ta', [Controllers\HomeController::class, 'ta'])->name('ta');

Auth::routes();

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [Controllers\HomeController::class, 'landing'])->name('landing');

Route::get('/about', [Controllers\HomeController::class, 'about'])->name('about');

Route::get('/dashboard', [Controllers\ProtectedController::class, 'dashboard'])->name('dashboard');

Route::get('/suhu', [Controllers\ProtectedController::class, 'suhu'])->name('suhu');

Route::get('/ozon', [Controllers\ProtectedController::class, 'ozon'])->name('ozon');

Route::get('/tes', function () {
    // event(new MyEvent("azzzzz"));
    MyEvent::dispatch("azzzzz2");
    return 'Berhasil';
});

Route::get('/relay', function(){
    return view('layouts.bacarelay');
});

Route::get('/fan', function(){
    return view('layouts.bacafan');
});