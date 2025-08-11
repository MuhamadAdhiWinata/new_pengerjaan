<?php
use Illuminate\Support\Facades\Route;

// Auto-generated for Unggas
use App\Http\Controllers\Api\unggas\CreateUnggasController;
use App\Http\Controllers\Api\unggas\GetAllUnggasController;
use App\Http\Controllers\Api\unggas\GetOneUnggasController;
use App\Http\Controllers\Api\unggas\UpdateUnggasController;
use App\Http\Controllers\Api\unggas\DeleteUnggasController;

Route::prefix('unggass')->name('unggas.')->group(function () {
    Route::get('/', GetAllUnggasController::class)->name('index');
    Route::get('/{id}', GetOneUnggasController::class)->name('show');
    Route::post('/', CreateUnggasController::class)->name('store');
    Route::put('/{id}', UpdateUnggasController::class)->name('update');
    Route::delete('/{id}', DeleteUnggasController::class)->name('destroy');
});



// Auto-generated for Botol
use App\Http\Controllers\Api\botol\CreateBotolController;
use App\Http\Controllers\Api\botol\GetAllBotolController;
use App\Http\Controllers\Api\botol\GetOneBotolController;
use App\Http\Controllers\Api\botol\UpdateBotolController;
use App\Http\Controllers\Api\botol\DeleteBotolController;

Route::prefix('botols')->name('botol.')->group(function () {
    Route::get('/', GetAllBotolController::class);
    Route::get('/{id}', GetOneBotolController::class);
    Route::post('/', CreateBotolController::class);
    Route::put('/{id}', UpdateBotolController::class);
    Route::delete('/{id}', DeleteBotolController::class);
});
