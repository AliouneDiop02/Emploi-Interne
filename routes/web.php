<?php

use App\Http\Controllers\Admin\CandidatureOffreController;
use App\Http\Controllers\Admin\CvController;
use App\Http\Controllers\Admin\OffreEmploiController as AdminOffreEmploiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\OffreEmploiController;
use App\Http\Controllers\MesCandidaturesController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegister'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showLogin'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.post');
});
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/email/verify', function(){
    return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
    $request->fulfill();
    return redirect()->route('emplois.index')->with('success', 'Votre courriel est verifié.');
    })->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function(Request $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Un nouveau lien de vérification a été envoyé.');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::redirect('/', '/emplois');

Route::get('/emplois', [OffreEmploiController::class, 'index'])
    ->name('emplois.index');

Route::get('/emplois/{offreEmploi}', [OffreEmploiController::class, 'show'])
    ->name('emplois.show');

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/emplois/{offreEmploi}/postuler', [CandidatureController::class, 'create'])
        ->name('candidatures.create');

    Route::post('/emplois/{offreEmploi}/postuler', [CandidatureController::class, 'store'])
        ->name('candidatures.store');

    Route::get('/mes-candidatures', [MesCandidaturesController::class, 'index'])
        ->name('mes-candidatures');

    Route::get('/mes-candidatures/{id}', [MesCandidaturesController::class, 'show'])
        ->name('mes-candidatures.show');

    Route::get('/mes-candidatures/{id}/edit', [MesCandidaturesController::class, 'edit'])
        ->name('mes-candidatures.edit');

    Route::put('/mes-candidatures/{id}', [MesCandidaturesController::class, 'update'])
        ->name('mes-candidatures.update');

    Route::delete('/mes-candidatures/{id}', [MesCandidaturesController::class, 'destroy'])
        ->name('mes-candidatures.destroy');
});


Route::middleware(['auth', 'verified','admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/offres/{offreEmploi}/candidatures', [CandidatureOffreController::class, 'index'])
        ->name('offres.candidatures.index');

    Route::resource('offres', AdminOffreEmploiController::class)
        ->parameters(['offres' => 'offreEmploi'])
        ->except(['show']);

    Route::get('/candidatures/{candidature}/cv', [CvController::class, 'show'])
        ->name('candidatures.cv');
});
