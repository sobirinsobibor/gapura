<?php

use Illuminate\Support\Facades\Route;
use Modules\PengajuanDana\Http\Controllers\PengajuanDanaController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pengajuandanas', PengajuanDanaController::class)->names('pengajuandana');
});
