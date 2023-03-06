<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\authGoogleController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\googleController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\userController;
use App\Http\Controllers\userPageController;
use App\Models\Announcement;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Route::get('/elenco/annunci', [AnnouncementController::class, 'index'])->name('index.announcements');
Route::post('/richiesta/info/annuncio', [FrontController::class, 'contactSeller'])->name('contact.seller');
//Gestione multi-language
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set.language.locale');
// Ricerca annuncio
Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

//Rotte utente loggato
Route::middleware('auth')->group(function () {
    Route::get('/user/announcements', [userPageController::class, 'index'])->name('user.page');
    Route::get('/nuovo/annuncio', [AnnouncementController::class, 'create'])->name('announcement.create');
});

//Rotte Admin
// Route::middleware('auth')->prefix('admin')->group(function () {
// });

//************ Rotte Revisore *************
// rotta per la home del revisore, display di tutti gli annunci da revisionare
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
// rotta form lavora con noi
Route::get('/Lavora_con_noi', [FrontController::class, 'workWithUs'])->middleware('auth')->name('work.with.us');
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
Route::get('/make/user/revisor/{user}', [RevisorController::class, 'makeUserRevisor'])->name('make.user.revisor');
// *********************************





// Prova di login con provider esterno

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', [userController::class, 'users']);



Route::get('/auth/google/login', [authGoogleController::class, 'login']);

Route::get('/auth/google/callback', [authGoogleController::class, 'callback']);
