<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/user/list');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/user/list', [UserController::class, 'getUserList'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'getUserForm'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'storeUser']);
    Route::get('/user/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
    Route::get('/user/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'updateUser'])->name('user.update');

    Route::get('/employee/list', [EmployeeController::class, 'getemployeeList'])->name('employee.index');
    Route::get('/employee/create', [EmployeeController::class, 'getemployeeForm'])->name('employee.create');
    Route::post('/employee/store', [EmployeeController::class, 'storeemployee']);
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'deleteemployee'])->name('employee.delete');
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'editemployee'])->name('employee.edit');
    Route::put('/employee/update/{id}', [EmployeeController::class, 'updateemployee'])->name('employee.update');

    Route::get('/user/profile', function () {});
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/student/profile', [StudentController::class, 'getProfile'])->name('student.profile');
    Route::post('/student/profile', [StudentController::class, 'updateProfile'])->name('student.profile.update');

    Route::resource('categories', CategoryController::class);
    //Publishers Route
    Route::resource('publishers', PublisherController::class);
});






