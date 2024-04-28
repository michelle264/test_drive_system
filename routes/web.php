<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaffController;

Route::get('/', function () {
    return view('firstpage');
});

// Route::get('/register1', 'CustomerController@showRegistrationForm');
// Route::post('/register', 'CustomerController@register');
Route::get('/registerstaff', [StaffController::class, 'showRegistrationForm'])->name('registerstaff');
Route::post('/registerstaff', [StaffController::class, 'register']);
Route::get('/loginstaff', [StaffController::class, 'showLoginForm'])->name('loginstaff');
Route::post('/loginstaff', [StaffController::class, 'login']);
Route::get('/register', [CustomerController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [CustomerController::class, 'register'])->name('register.post');
Route::post('/check-eligibility/{id}', [DashboardController::class, 'checkEligibility'])->name('checkEligibility');
Route::post('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Route::post('/check-eligibility', [DashboardController::class, 'checkEligibility'])->name('checkEligibility');

// Route::post('/check-eligibility/{id}', 'DashboardController@checkEligibility')->name('checkEligibility');
// Route::get('/edit/{registration_id}', '\App\Http\Controllers\CustomerController@edit');

Route::get('/customers/update/{id}', [CustomerController::class, 'edit'])->name('update');
Route::post('/customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
// Route::get('/search', [DashboardController::class, 'search'])->name('search');

// Route::post('/edit/{id}', [CustomerController::class, 'update'])->name('customers.update');

// Example staff-only route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



