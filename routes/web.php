<?php

use App\Http\Controllers\ClassetaController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\GenusController;
use App\Http\Controllers\KingdomController;
use App\Http\Controllers\PhylumController;
use App\Http\Controllers\RankController;




use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/log', function () {
    return view('login');
});
Route::get('/adminDashboard', function () {
    return view('dashboard.pages.index');
})->name('dashboard');

Route::resource('kingdom-admin',KingdomController::class);
Route::resource('class-admin',ClassetaController::class);
Route::resource('phylum-admin',PhylumController::class);
Route::resource('rank-admin',RankController::class);
Route::resource('family-admin',FamilyController::class);
Route::resource('genus-admin',GenusController::class);



