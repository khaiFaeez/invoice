<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/invoice', function () {
//     return view('invoice');
// })->middleware(['auth'])->name('invoice');

Route::get('/invoice', 'App\Http\Controllers\invoiceController@add_client_form')->middleware(['auth'])->name('invoice');

Route::get('/invoice/{id}', 'App\Http\Controllers\invoiceController@add_client_form')->middleware(['auth'])->name('invoice_id');

Route::post('/client', 'App\Http\Controllers\invoiceController@add_client');
Route::post('/invoice', 'App\Http\Controllers\invoiceController@add_invoice');