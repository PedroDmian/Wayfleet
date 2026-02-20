<?php

use App\Http\Controllers\Company\CompanyCreateController;
use App\Http\Controllers\Company\CompanyDeleteController;
use App\Http\Controllers\Company\CompanyEditController;
use App\Http\Controllers\Company\CompanyIndexController;
use App\Http\Controllers\Company\CompanyStoreController;
use App\Http\Controllers\Company\CompanyUpdateController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // ? Dashbord
    Route::get('dashboard', fn () => Inertia::render('dashboard'))->name('dashboard');

    // ? Companies
    Route::get('companies', CompanyIndexController::class)->name('companies');
    Route::get('companies/create', CompanyCreateController::class)->name('companies.create');
    Route::post('companies', CompanyStoreController::class)->name('companies.store');
    Route::get('companies/{company}/edit', CompanyEditController::class)->name('companies.edit');
    Route::put('companies/{company}', CompanyUpdateController::class)->name('companies.update');
    Route::delete('companies/{company}', CompanyDeleteController::class)->name('companies.destroy');
});

require __DIR__.'/settings.php';
