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

//************ Rotte Revisore *************
// rotta per la home del revisore, display di tutti gli annunci da revisionare
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
// rotta form lavora con noi
Route::get('/Lavora_con_noi', [FrontController::class, 'workWithUs'])->name('work.with.us');
Route::post('/richiesta/revisor/inviata', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
// rotta per pagina accetta o riufiuta annuncio
Route::get('/revisor/rev/{announcement}', function (Announcement $announcement) {
    return view('revisor.rev', compact('announcement'));
})->middleware('isRevisor')->name('announcements.rev');


//Accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

//rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

//make user revisor
Route::get('/make/user/revisor/{revisor}', [RevisorController::class, 'makeUserRevisor'])->name('make.user.revisor'); 