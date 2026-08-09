<?php

use Illuminate\Support\Facades\Route;
use Modules\Ticketing\Http\Controllers\PrintInvoiceController;
use Modules\Ticketing\Http\Controllers\TicketingController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('ticketings', TicketingController::class)->names('ticketing');

    Route::get('invoice-pesawat', [PrintInvoiceController::class, 'printInvoicePesawat'])->name('print-invoice-pesawat');
    Route::get('invoice-kereta', [PrintInvoiceController::class, 'printInvoiceKereta'])->name('print-invoice-kereta');
    Route::get('invoice-hotel', [PrintInvoiceController::class, 'printInvoiceHotel'])->name('print-invoice-hotel');
    Route::get('invoice-dokumen', [PrintInvoiceController::class, 'printInvoiceDokumen'])->name('print-invoice-dokumen');
});
