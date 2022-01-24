<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/departments', DepartmentController::class);
Route::resource('/countries', CountryController::class);
Route::resource('/states', StateController::class);
Route::resource('/cities', CityController::class);

Route::resource('/users', UserController::class);
Route::post('/user/{user}/change-password', [ChangePasswordController::class, 'changePassword'])->name('users.change.password');

Route::get('{any}', function () {
    return view('employees.index');
})->where('{any}', '.*');