<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PendaftaranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pendaftarans;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('page1');
});

// pengaturan route untuk halaman 1
Route::get('/page1', function () {
    return view('page1');
})->name('page1');

// pengaturan route untuk halaman 2
Route::get('/page2', function () {
    return view('page2');
})->name('page2');

// route untuk input data
Route::post('/form', 'App\Http\Controllers\PendaftaranController@store')->name('form.store');

// pengaturan route untuk halaman 3
Route::get('/page3', function () {
    return view('page3');
})->name('page3');

Route::get('/page3', 'App\Http\Controllers\PendaftaranController@index')->name('page3');