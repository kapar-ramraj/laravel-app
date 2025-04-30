<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/create', [UserController::class,'getUserForm']);
Route::post('/user/store', [UserController::class,'storeUser']);
