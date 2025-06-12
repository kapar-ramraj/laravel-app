<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLoanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::redirect('/', '/login');
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('page.aboutus');
Route::get('/books-detail', [HomeController::class, 'getBooks'])->name('page.books');
Route::get('/authors-detail', [HomeController::class, 'getAuthors'])->name('page.authors');
Route::get('/events', [HomeController::class, 'getEvents'])->name('page.events');
Route::get('/contact-us', [HomeController::class, 'getContactUs'])->name('page.contactus');
Route::post('/contact-us/store', [HomeController::class, 'storeContactUs'])->name('page.store.contactus');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/first', [DashboardController::class, 'getDashboardFirst'])->name('dashboard.first')->middleware('permission:dashboard-list');

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

    Route::resource('authors', AuthorController::class);

    Route::resource('books', BookController::class);
    Route::resource('book-loans', BookLoanController::class);
    Route::resource('permissions', PermissionController::class);

    Route::resource('roles', RoleController::class);

    Route::get('/change/password', [UserController::class, 'changePassword'])->name('change.password');
    Route::post('/change/password', [UserController::class, 'updatePassword'])->name('change.password');
});
