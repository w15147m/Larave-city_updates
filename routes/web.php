<?php

use App\Http\Controllers\UsersCity;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [UsersCity::class, 'ShowCity']);
Route::post('/update/{id}', [UsersCity::class, 'update_id'])-> name ('update_id');
