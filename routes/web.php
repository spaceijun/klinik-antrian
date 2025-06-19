<?php

use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Pasien\PendaftaranController as PasienPendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Superadmin\DeviceController;
use App\Http\Controllers\Superadmin\DokterController;
use App\Http\Controllers\Superadmin\PendaftaranController;
use App\Http\Controllers\Superadmin\RekamMediseController;
use App\Http\Controllers\Superadmin\SettingwebsiteController;
use App\Http\Controllers\Superadmin\UserController;
use App\Models\Superadmin\RekamMedise;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'role:Superadmin')->group(function () {
    Route::prefix('superadmin')->name('superadmin.')->group(function () {

        // Dokter
        Route::resource('dokters', DokterController::class);
        // Pendaftaran
        Route::resource('pendaftarans', PendaftaranController::class);
        Route::patch('pendaftarans/{pendaftaran}/status', [PasienPendaftaranController::class, 'updateStatus'])->name('pendaftarans.updateStatus');
        // Rekam Medis
        // Route::resource('rekam-medises', RekamMediseController::class);
        Route::get('rekam-medis/{pendaftaran_id}', [RekamMediseController::class, 'create'])->name('rekam-medises.create');
        Route::post('rekam-medis', [RekamMediseController::class, 'store'])->name('rekam-medises.store');
        // WA Gateway Fonnte
        Route::resource('devices', DeviceController::class);
        Route::post('send-message', [DeviceController::class, 'sendMessage'])->name('send.message');
        Route::post('devices/status', [DeviceController::class, 'checkDeviceStatus']);
        Route::post('devices/activate', [DeviceController::class, 'activateDevice'])->name('devices.activate');
        Route::post('devices/disconnect', [DeviceController::class, 'disconnect'])->name('devices.disconnect');

        // Management Users 
        Route::resource('users', UserController::class);

        // settings
        Route::get('/settings', [SettingwebsiteController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingwebsiteController::class, 'update'])->name('settings.update');
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::view('superadmin/dashboard', 'superadmin.home.index');
    // Route::get('/', function () {
    //     return view('superadmin.home.index')->name('superadmin.index');
    // });
});

/**
 * Route Pasien
 */

Route::middleware('auth', 'role:Pasien')->group(
    function () {
        Route::prefix('pasien')->name('pasien.')->group(function () {
            Route::get('/dashboard', [PasienController::class, 'index'])->name('dashboard');
            // pendaftaran
            Route::resource('pendaftaran', PasienPendaftaranController::class);
            Route::patch('pendaftaran/{pendaftaran}/status', [PasienPendaftaranController::class, 'updateStatus'])->name('pendaftaran.updateStatus');
            Route::get('antrian', [PasienPendaftaranController::class, 'antrianHariIni'])->name('pendaftaran.antrian');
        });
    }
);


require __DIR__ . '/auth.php';
