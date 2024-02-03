<?php

use App\Http\Controllers\Backend\ClassetaController  as BackendClassetaController;
use App\Http\Controllers\Backend\CompanyController as BackendCompanyController;
use App\Http\Controllers\Backend\PesticideTypeController as BackendPesticideTypeController;
use App\Http\Controllers\Backend\SpeciesController as BackendSpeciesController;
use App\Http\Controllers\Backend\FamilyController as BackendFamilyController;
use App\Http\Controllers\Backend\GenusController as BackendGenusController;
use App\Http\Controllers\Backend\KingdomController as BackendKingdomController;
use App\Http\Controllers\Backend\PhylumController as BackendPhylumController;
use App\Http\Controllers\Backend\RankController as BackendRankController;
use App\Http\Controllers\Backend\SpeciesController;
use App\Http\Controllers\Backend\TypeController as BackendTypeController;
use App\Http\Controllers\Backend\PesticideController as BackendPesticideController;
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\Backend\AgricultureTypesController as BackendAgricultureTypesController;
use App\Http\Controllers\Backend\IrrigationTypesController as BackendIrrigationTypesControllerController;

use App\Http\Controllers\Backend\AdminController ;
use App\Http\Controllers\FarmerController;
use Illuminate\Support\Facades\Route;





Route::prefix('admin')->middleware(['auth', 'verified', 'checkRole:admin,volunteer'])->group(function () {
  
    Route::get('/adminDashboard',[AdminController::class, 'homeDashboard'] )->name('dashboard');
    

        Route::resource('kingdom-admin', BackendKingdomController::class);   
        Route::resource('family-admin', BackendFamilyController::class);
        Route::resource('class-admin', BackendClassetaController::class);
        Route::resource('phylum-admin', BackendPhylumController::class);
        Route::resource('rank-admin', BackendRankController::class);
        Route::resource('genus-admin', BackendGenusController::class);
        Route::resource('species-admin', BackendSpeciesController::class);
        Route::get('Details/{id}', [BackendSpeciesController::class, 'showDetails'])->name('showDetails');
        Route::resource('types-admin', BackendTypeController::class);
        Route::resource('companies-admin', BackendCompanyController::class);
        Route::resource('AgricultureTypes-admin', BackendAgricultureTypesController::class);
        Route::resource('IrrigationTypes-admin', BackendIrrigationTypesControllerController::class);

        Route::resource('pesticides-admin', BackendPesticideController::class);
        Route::resource('pesticide_type-admin', BackendPesticideTypeController::class);
    
        Route::post('pesticides-admin/connection', [BackendPesticideController::class, 'storeConnection'])->name('storeConnection');
        Route::get('pesticides-admin/createConnection/{id}', [BackendPesticideController::class, 'createConnection'])->name('pesticides-admin.createConnection');
    
    
    
        Route::get('Details/{id}', [BackendSpeciesController::class, 'showDetails'])->name('showDetails');
    });
    
    Route::middleware(['auth', 'verified', 'checkRole:admin'])->group(function () {
        Route::resource('user-admin', BackendUserController::class);
    });
    Route::middleware(['auth', 'verified', 'checkRole:admin,farmer'])->group(function () {
        Route::get('farmerDashboard', [FarmerController::class, 'count'])->name('farmerDashboard.index');
        Route::get('speciesAndTypesDetailes', [FarmerController::class, 'speciesAndTypesDetailes'])->name('speciesAndTypesDetailes.speciesAndTypesDetailes');
        Route::get('addFarmDetailes', [FarmerController::class, 'addFarmDetailes'])->name('addFarmDetailes');
        Route::get('manageFarmDetailes', [FarmerController::class, 'manageFarmDetailes'])->name('manageFarmDetailes');


        Route::get('/get-species-details/{id}', [SpeciesController::class, 'getDetails']);
    });
    

       

    
        





require __DIR__ . '/auth.php';

