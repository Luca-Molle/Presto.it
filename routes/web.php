<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\userPageController;
use App\Models\Announcement;

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

// Rotte per le pagine che non hanno un Autore
Route::get('/', [FrontController::class, 'homePage'])->name('welcome');
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');
Route::get('/dettaglio/categoria/{announcement}', [FrontController::class, 'showAnnouncement'])->name('announcements.show');
Route::get('elenco/annunci', [AnnouncementController::class, 'index'])->name('index.announcements');

//Rotte utente loggato
Route::middleware('auth')->group(function () {
    Route::get('/nuovo/annuncio', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::get('/user/announcements', [userPageController::class, 'index'])->name('user.page');
});

//Rotte Admin
Route::middleware('auth')->prefix('admin')->group(function () {
});

//Rotte Revisor
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');

Route::get('/revisor/rev/{announcement}', function (Announcement $announcement) {
    return view('revisor.rev', compact('announcement'));
})->name('announcements.rev');


//Accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');

//rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
