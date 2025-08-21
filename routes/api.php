<?php
use Illuminate\Support\Facades\Route;
// Auto-generated for MasterEvent
use App\Http\Controllers\Api\masterevent\CreateMasterEventController;
use App\Http\Controllers\Api\masterevent\GetAllMasterEventController;
use App\Http\Controllers\Api\masterevent\GetOneMasterEventController;
use App\Http\Controllers\Api\masterevent\UpdateMasterEventController;
use App\Http\Controllers\Api\masterevent\DeleteMasterEventController;

Route::prefix('masterevent')->name('masterevent.')->group(function () {
    Route::get('/', GetAllMasterEventController::class);
    Route::get('/{id}', GetOneMasterEventController::class);
    Route::post('/', CreateMasterEventController::class);
    Route::put('/{id}', UpdateMasterEventController::class);
    Route::delete('/{id}', DeleteMasterEventController::class);
});

// Auto-generated for Peserta
use App\Http\Controllers\Api\peserta\CreatePesertaController;
use App\Http\Controllers\Api\peserta\GetAllPesertaController;
use App\Http\Controllers\Api\peserta\GetOnePesertaController;
use App\Http\Controllers\Api\peserta\UpdatePesertaController;
use App\Http\Controllers\Api\peserta\DeletePesertaController;

Route::prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/', GetAllPesertaController::class);
    Route::get('/{id}', GetOnePesertaController::class);
    Route::post('/', CreatePesertaController::class);
    Route::put('/{id}', UpdatePesertaController::class);
    Route::delete('/{id}', DeletePesertaController::class);
});

// Auto-generated for PesertaEvent
use App\Http\Controllers\Api\pesertaevent\CreatePesertaEventController;
use App\Http\Controllers\Api\pesertaevent\GetAllPesertaEventController;
use App\Http\Controllers\Api\pesertaevent\GetOnePesertaEventController;
use App\Http\Controllers\Api\pesertaevent\UpdatePesertaEventController;
use App\Http\Controllers\Api\pesertaevent\DeletePesertaEventController;

Route::prefix('pesertaevent')->name('pesertaevent.')->group(function () {
    Route::get('/', GetAllPesertaEventController::class);
    Route::get('/{id}', GetOnePesertaEventController::class);
    Route::post('/', CreatePesertaEventController::class);
    Route::put('/{id}', UpdatePesertaEventController::class);
    Route::delete('/{id}', DeletePesertaEventController::class);
});

// Auto-generated for Jenis
use App\Http\Controllers\Api\jenis\CreateJenisController;
use App\Http\Controllers\Api\jenis\GetAllJenisController;
use App\Http\Controllers\Api\jenis\GetOneJenisController;
use App\Http\Controllers\Api\jenis\UpdateJenisController;
use App\Http\Controllers\Api\jenis\DeleteJenisController;

Route::prefix('jenis')->name('jenis.')->group(function () {
    Route::get('/', GetAllJenisController::class);
    Route::get('/{id}', GetOneJenisController::class);
    Route::post('/', CreateJenisController::class);
    Route::put('/{id}', UpdateJenisController::class);
    Route::delete('/{id}', DeleteJenisController::class);
});

// Auto-generated for Jadwal
use App\Http\Controllers\Api\jadwal\CreateJadwalController;
use App\Http\Controllers\Api\jadwal\GetAllJadwalController;
use App\Http\Controllers\Api\jadwal\GetOneJadwalController;
use App\Http\Controllers\Api\jadwal\UpdateJadwalController;
use App\Http\Controllers\Api\jadwal\DeleteJadwalController;

Route::prefix('jadwal')->name('jadwal.')->group(function () {
    Route::get('/', GetAllJadwalController::class);
    Route::get('/{id}', GetOneJadwalController::class);
    Route::post('/', CreateJadwalController::class);
    Route::put('/{id}', UpdateJadwalController::class);
    Route::delete('/{id}', DeleteJadwalController::class);
});

// Auto-generated for JawabanAkm
use App\Http\Controllers\Api\jawabanakm\CreateJawabanAkmController;
use App\Http\Controllers\Api\jawabanakm\GetAllJawabanAkmController;
use App\Http\Controllers\Api\jawabanakm\GetOneJawabanAkmController;
use App\Http\Controllers\Api\jawabanakm\UpdateJawabanAkmController;
use App\Http\Controllers\Api\jawabanakm\DeleteJawabanAkmController;

Route::prefix('jawabanakm')->name('jawabanakm.')->group(function () {
    Route::get('/', GetAllJawabanAkmController::class);
    Route::get('/{id}', GetOneJawabanAkmController::class);
    Route::post('/', CreateJawabanAkmController::class);
    Route::put('/{id}', UpdateJawabanAkmController::class);
    Route::delete('/{id}', DeleteJawabanAkmController::class);
});

use App\Http\Controllers\Api\relations\ShowPesertaWithEventsController;

Route::get('/peserta/{id}/events', ShowPesertaWithEventsController::class);

use App\Http\Controllers\Api\relations\ShowPesertaEventWithJadwalJenis;

Route::get('/peserta/{kd_peserta}/event/{kd_master_event}/jadwal-jenis', ShowPesertaEventWithJadwalJenis::class);

use App\Http\Controllers\Api\relations\ShowJadwalWithJenisController;

Route::get('/jadwal/show/{kd_ijin}', ShowJadwalWithJenisController::class);

use App\Http\Controllers\Api\relations\ValidateJenisKodeController;

Route::post('/validate-jenis-kode', ValidateJenisKodeController::class);

use App\Http\Controllers\Api\relations\ShowPesertaStatusUjiController;

Route::get('/peserta/{kd_peserta}/status-uji', ShowPesertaStatusUjiController::class);

use App\Http\Controllers\Api\relations\SubmitJawabanController;

Route::post('/jawaban/submit/{kd_jawaban}', SubmitJawabanController::class);


