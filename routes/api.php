<?php

use Illuminate\Support\Facades\Route;
use Vendor\Quotes\Http\Controllers\QuoteController;

Route::prefix('quotes')->group(function () {
    Route::get('/', [QuoteController::class, 'index']);
    Route::get('/random', [QuoteController::class, 'random']);
    Route::get('/{id}', [QuoteController::class, 'show']);
});