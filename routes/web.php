<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoreValueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\PublicationsController;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\CoreValue;
use App\Models\Publication;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Retrieve the first banner from the database
    $banner = Banner::first();
    $coreValues = CoreValue::all();  // Fetch all core values
    $contact = Contact::first(); // Fetch the contact information
    $publications = Publication::latest()->take(6)->get();
    // Pass the banner data to the 'welcome' view
    return view('welcome', compact('banner', 'coreValues','contact','publications'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/programs', [ProgramsController::class, 'index'])->name('programs');
Route::get('/publicationsLanding', [PublicationsController::class, 'landingIndex'])->name('publicationsLanding');
Route::get('/publicationsLanding/{id}', [PublicationsController::class, 'show'])->name('publicationsLandingShow');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('home/modify')->name('home.modify.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/create', [HomeController::class, 'create'])->name('create');
        Route::post('/', [HomeController::class, 'store'])->name('store');
        Route::get('/{banner}/edit', [HomeController::class, 'edit'])->name('edit');
        Route::put('/{banner}', [HomeController::class, 'update'])->name('update');
        Route::delete('/{banner}', [HomeController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('core-values')->name('core-values.')->group(function() {
        Route::get('/', [CoreValueController::class, 'index'])->name('index');
        Route::get('create', [CoreValueController::class, 'create'])->name('create');
        Route::post('/', [CoreValueController::class, 'store'])->name('store');
        Route::get('{coreValue}/edit', [CoreValueController::class, 'edit'])->name('edit');
        Route::put('{coreValue}', [CoreValueController::class, 'update'])->name('update');
        Route::delete('{coreValue}', [CoreValueController::class, 'destroy'])->name('destroy');
    });

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'update'])->name('contact.update');

    Route::prefix('publications')->name('publications.')->group(function() {
        Route::get('/', [PublicationsController::class, 'index'])->name('index');
        Route::get('create', [PublicationsController::class, 'create'])->name('create');
        Route::post('/', [PublicationsController::class, 'store'])->name('store');
        Route::get('{publication}/edit', [PublicationsController::class, 'edit'])->name('edit');
        Route::put('{publication}', [PublicationsController::class, 'update'])->name('update');
        Route::delete('{publication}', [PublicationsController::class, 'destroy'])->name('destroy');
    });

});
require __DIR__.'/auth.php';
