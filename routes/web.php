<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Destinations\Destination;
use App\Http\Livewire\Clients\Client;
use App\Http\Livewire\Caisses\Caisse;
use App\Http\Livewire\Employers\Employer;
use App\Http\Livewire\Secteurs\Secteur;
use App\Http\Livewire\Dossiers\Dossier;
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

Route::get('/', function () { return view('auth.login');});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    Route::get('/destination', Destination::class)->name('destination.index');
    Route::get('/client', Client::class)->name('client.index');
    Route::get('/secteur', Secteur::class)->name('secteur.index');
    Route::get('/employer', Employer::class)->name('employer.index');
    Route::get('/caisse', Caisse::class)->name('caisse.index');
    Route::get('/dossier', Dossier::class)->name('dossier.index');

});

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
