<?php
use Illuminate\Support\Facades\Route;


// Auto-generated for Pengajar
use App\Http\Controllers\Api\pengajar\CreatePengajarController;
use App\Http\Controllers\Api\pengajar\GetAllPengajarController;
use App\Http\Controllers\Api\pengajar\GetOnePengajarController;
use App\Http\Controllers\Api\pengajar\UpdatePengajarController;
use App\Http\Controllers\Api\pengajar\DeletePengajarController;

    Route::prefix('pengajars')->name('pengajar.')->group(function () {
    Route::get('/', GetAllPengajarController::class)->name('index');
    Route::get('/{id}', GetOnePengajarController::class)->name('show');
    Route::post('/', CreatePengajarController::class)->name('store');
    Route::put('/{id}', UpdatePengajarController::class)->name('update');
    Route::delete('/{id}', DeletePengajarController::class)->name('destroy');
});

// Auto-generated for Pesawat
use App\Http\Controllers\Api\pesawat\CreatePesawatController;
use App\Http\Controllers\Api\pesawat\GetAllPesawatController;
use App\Http\Controllers\Api\pesawat\GetOnePesawatController;
use App\Http\Controllers\Api\pesawat\UpdatePesawatController;
use App\Http\Controllers\Api\pesawat\DeletePesawatController;

    Route::prefix('pesawats')->name('pesawat.')->group(function () {
    Route::get('/', GetAllPesawatController::class)->name('index');
    Route::get('/{id}', GetOnePesawatController::class)->name('show');
    Route::post('/', CreatePesawatController::class)->name('store');
    Route::put('/{id}', UpdatePesawatController::class)->name('update');
    Route::delete('/{id}', DeletePesawatController::class)->name('destroy');
});

// Auto-generated for Laptop
use App\Http\Controllers\Api\laptop\CreateLaptopController;
use App\Http\Controllers\Api\laptop\GetAllLaptopController;
use App\Http\Controllers\Api\laptop\GetOneLaptopController;
use App\Http\Controllers\Api\laptop\UpdateLaptopController;
use App\Http\Controllers\Api\laptop\DeleteLaptopController;

    Route::prefix('laptops')->name('laptop.')->group(function () {
    Route::get('/', GetAllLaptopController::class)->name('index');
    Route::get('/{id}', GetOneLaptopController::class)->name('show');
    Route::post('/', CreateLaptopController::class)->name('store');
    Route::put('/{id}', UpdateLaptopController::class)->name('update');
    Route::delete('/{id}', DeleteLaptopController::class)->name('destroy');
});
