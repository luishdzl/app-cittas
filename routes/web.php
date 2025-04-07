<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('quotes');
});
Route::get('/quotes-ui', function () {
    return view('quotes');
})->name('quotes-ui');
