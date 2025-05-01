<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-create', [UserController::class,'getUserForm']);
Route::post('/user/store', [UserController::class,'storeUser']);

Route::get('/user/delete/{id}', [UserController::class,'deleteUser'])->name('user.delete');

Route::get('/user/edit/{id}', [UserController::class,'editUser'])->name('user.edit');
Route::put('/user/update/{id}', [UserController::class,'updateUser'])->name('user.update');
