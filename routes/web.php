<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',[EmployeeController::class, 'index'])->name('about');

Route::get('/tambahpegawai',[EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata',[EmployeeController::class, 'inserdata'])->name('insertdata');

Route::get('/tampilkandata/{id}',[EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[EmployeeController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}',[EmployeeController::class, 'delete'])->name('delete');