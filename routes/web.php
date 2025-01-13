<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    Destinations\Destination,
    Clients\Client,
    Caisses\Caisse,
    Employers\Employer,
    Secteurs\Secteur,
    Dossiers\Dossier,
    Depenses\Depense,
    DetailsCaisse\DetailsCaisse,
    DetailMvt\DetailsMvt,
    Printdetail\Printdetail,
    Taux\Taux,
    Ticket\Ticket,
    Rapport\Rapport,
    ShortDetails\ShortDetails,
    Trash\Trash,
    Archives\Archives,
    Compilation\Compilation,
    Banque\Banque,
    Kcc\KccDashboard
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Register web routes for your application. These routes are loaded by the
| RouteServiceProvider and are assigned to the "web" middleware group.
|
*/

Route::get('/', fn() => view('auth.login'));


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', Dossier::class)->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::get('/destination', Destination::class)->name('destination.index');
        Route::get('/depense', Depense::class)->name('depense.index');
        Route::get('/client', Client::class)->name('client.index');
        Route::get('/secteur', Secteur::class)->name('secteur.index');
        Route::get('/employer', Employer::class)->name('employer.index');
        Route::get('/caisse', Caisse::class)->name('caisse.index');
        Route::get('/dossier', Dossier::class)->name('dossier.index');
    });

    Route::prefix('details')->group(function () {
        Route::get('/caisse/{id}', DetailsCaisse::class)->name('detailcaisse.index');
       // Route::get('/mvt/{id}/{devise}', DetailsMvt::class)->name('details.mvt');
        Route::get('/print/{id}', Printdetail::class)->name('print.details');
        Route::get('/ticket/{id}', Ticket::class)->name('ticket.details');
    });


    Route::get('/kcc', KccDashboard::class)->name('kcc.dashboard');

    Route::prefix('management')->group(function () {
        Route::get('/taux', Taux::class)->name('taux.index');
        Route::get('/rapport', Rapport::class)->name('rapport.index');
        Route::get('/shortdetails/{op}', ShortDetails::class)->name('short.index');
        Route::get('/corbeille', Trash::class)->name('trash.index');
        Route::get('/archives', Archives::class)->name('archives.index');
        Route::get('/compile', Compilation::class)->name('compilation.index');
        Route::get('/banque', Banque::class)->name('banque.situation');
    });
});

Route::get('logout', fn() => tap(auth()->logout(), fn() => Session()->flush()) ?: redirect('/'))->name('logout');
