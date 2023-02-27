<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\userPageController;

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

//Rotte Revisor
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index'); 
