<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Destination\Destianation;
use App\Http\Livewire\Clients\Client;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('welcome');});

Route::get('/destination', Destianation::class)->name('destination.index');
Route::get('/client', Client::class)->name('client.index');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
