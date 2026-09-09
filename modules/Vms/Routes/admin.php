<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '{company_id}/vms',
    'middleware' => ['admin', 'company'],
    'as' => 'vms.',
], function () {
    Route::get('settings', [\Modules\Vms\Http\Controllers\Settings::class, 'edit'])->name('settings.edit');
    Route::post('settings', [\Modules\Vms\Http\Controllers\Settings::class, 'update'])->name('settings.update');
    Route::get('invoices', [\Modules\Vms\Http\Controllers\Invoices::class, 'index'])->name('invoices.index');
    Route::get('invoices/{document}/fiscalize', [\Modules\Vms\Http\Controllers\Invoices::class, 'fiscalize'])->name('invoices.fiscalize');
});
