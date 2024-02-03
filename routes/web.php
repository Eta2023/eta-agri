<?php
// use App\Http\Controllers\Backend\ClassetaController  as BackendClassetaController;
// use App\Http\Controllers\Backend\CompanyController as BackendCompanyController;
// use App\Http\Controllers\Backend\PesticideTypeController as BackendPesticideTypeController;
// use App\Http\Controllers\Backend\SpeciesController as BackendSpeciesController;
// use App\Http\Controllers\Backend\FamilyController as BackendFamilyController;
// use App\Http\Controllers\Backend\GenusController as BackendGenusController;
// use App\Http\Controllers\Backend\KingdomController as BackendKingdomController;
// use App\Http\Controllers\Backend\PhylumController as BackendPhylumController;
// use App\Http\Controllers\Backend\RankController as BackendRankController;
// use App\Http\Controllers\Backend\TypeController as BackendTypeController;
// use App\Http\Controllers\Backend\PesticideController as BackendPesticideController;
// use App\Http\Controllers\Backend\UserController as BackendUserController;
// use App\Http\Controllers\Backend\AdminController ;

use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\ContactController;
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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
Route::get('/', function () {
    return view('index');
});
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');






// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/adminDashboard/{id}',[AdminController::class, 'homeDashboard'] )->name('dashboard');

// Route::middleware(['auth', 'verified', 'checkRole:admin,volunteer'])->group(function () {
//     Route::get('/adminDashboard', function () {
//         return view('dashboard.pages.index');
//     })->name('dashboard');
//     Route::resource('kingdom-admin', BackendKingdomController::class);   
//     Route::resource('family-admin', BackendFamilyController::class);
//     Route::resource('class-admin', BackendClassetaController::class);
//     Route::resource('phylum-admin', BackendPhylumController::class);
//     Route::resource('rank-admin', BackendRankController::class);
//     Route::resource('genus-admin', BackendGenusController::class);
//     Route::resource('species-admin', BackendSpeciesController::class);
//     Route::get('Details/{id}', [BackendSpeciesController::class, 'showDetails'])->name('showDetails');
//     Route::resource('types-admin', BackendTypeController::class);
//     Route::resource('companies-admin', BackendCompanyController::class);

//     Route::resource('pesticides-admin', BackendPesticideController::class);
//     Route::resource('pesticide_type-admin', BackendPesticideTypeController::class);

//     Route::post('pesticides-admin/connection', [BackendPesticideController::class, 'storeConnection'])->name('storeConnection');
//     Route::get('pesticides-admin/createConnection/{id}', [BackendPesticideController::class, 'createConnection'])->name('pesticides-admin.createConnection');



//     Route::get('Details/{id}', [BackendSpeciesController::class, 'showDetails'])->name('showDetails');
// });

// Route::middleware(['auth', 'verified', 'checkRole:admin'])->group(function () {
//     Route::resource('user-admin', BackendUserController::class);
// });
require __DIR__.'/admin.php';