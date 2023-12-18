<?php

use App\Http\Controllers\ClassetaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\GenusController;
use App\Http\Controllers\KingdomController;
use App\Http\Controllers\PhylumController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\TypeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/', function () {
    return view('index');
});


Route::middleware(['auth', 'verified', 'Role:admin,volunteer'])->group(function () {
    Route::get('/adminDashboard', function () {
        return view('dashboard.pages.index');
    })->name('dashboard');
    Route::resource('kingdom-admin', KingdomController::class);
    Route::resource('class-admin', ClassetaController::class);
    Route::resource('phylum-admin', PhylumController::class);
    Route::resource('rank-admin', RankController::class);
    Route::resource('family-admin', FamilyController::class);
    Route::resource('genus-admin', GenusController::class);
    Route::resource('species-admin', SpeciesController::class);
    Route::get('Details/{id}', [SpeciesController::class, 'showDetails'])->name('showDetails');
    Route::resource('types-admin', TypeController::class);
    Route::resource('user-admin', UserController::class);
    Route::get('Details/{id}', [SpeciesController::class, 'showDetails'])->name('showDetails');
});


