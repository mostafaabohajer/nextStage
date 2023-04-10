<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group(['middleware' => 'auth' , 'prefix' => 'admin'], function () {
    Route::get('', [App\Http\Controllers\AdminController::class, 'index']);
    Route::Resource('/companies',\App\Http\Controllers\CompanyController::class);
    Route::get('/companies-ajax-page', [App\Http\Controllers\CompanyController::class, 'companiesAjaxPage'])->name('companies.ajax.page');
    Route::Resource('/employee',\App\Http\Controllers\EmployeeController::class);
    Route::get('/employees-ajax-page', [App\Http\Controllers\EmployeeController::class, 'employeesAjaxPage'])->name('employees.ajax.page');
});

