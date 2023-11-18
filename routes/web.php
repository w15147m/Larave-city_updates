<?php

use App\Http\Controllers\UsersCity;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/{a}', [UsersCity::class, 'ShowCity'])->name('home');
Route::post('/update/{id}', [UsersCity::class, 'update_id'])-> name ('update_real_id');
// Route::post('/update', [UsersCity::class, 'update_id'])->name('update_real_id');
