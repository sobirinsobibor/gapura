<?php

use Illuminate\Support\Facades\Route;
use Modules\PengajuanDana\Http\Controllers\PengajuanDanaController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('pengajuandanas', PengajuanDanaController::class)->names('pengajuandana');
});
