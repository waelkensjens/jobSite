<?php

use App\Http\Controllers\Auth\LoginController;
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

//admin routes

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return inertia('Auth/Login');
    });

    //Path => admin/jobs
    Route::prefix('jobs')->group(function () {
        Route::get('/', function (){
            return inertia('Admin/Jobs/Create');
        });
    });
    //Path => admin/companies
    Route::prefix('companies')->group(function () {

    });
    //Path => admin/citys
    Route::prefix('cities')->group(function () {

    });
    //Path => admin/types
    Route::prefix('types')->group(function () {

    });

    Route::get('/dashboard', function () {
        return inertia('Auth/Dashboard');
    });

});



Route::get('/contacts', function () {
    return inertia('Contacts/Index');
});
Route::get('/dashboard', function () {
    return inertia('Dashboard/Index');
});
Route::get('/organisations', function () {
    return inertia('Organizations/Index');
});
Route::get('/reports', function () {
    return inertia('Reports/Index');
});
