<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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
Route::get('/admin', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes Requires authentication
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->group(function () {
    // path = admin/jobs
    Route::prefix('jobs')->group(function () {
        Route::get('/',[JobController::class, 'index'])->name('admin.jobs.index');
        Route::get('/create',[JobController::class, 'create'])->name('admin.jobs.create');
        Route::post('/create',[JobController::class, 'store'])->name('admin.jobs.store');
       // job specific routes
        Route::prefix('/{jobId}')->group(function (){
            Route::get('/',[JobController::class, 'show'])->name('admin.jobs.show');
            Route::get('/edit',[JobController::class, 'edit'])->name('admin.jobs.edit');
            Route::post('/update',[JobController::class, 'update'])->name('admin.jobs.update');
            Route::delete('/delete',[JobController::class, 'destroy'])->name('admin.jobs.destroy');
        });

    });
    //Path => admin/companies
    Route::prefix('companies')->group(function () {
        Route::get('/',[CompanyController::class, 'index'])->name('admin.companies.index');
        Route::get('/create',[CompanyController::class, 'create'])->name('admin.companies.create');
        Route::post('/create',[CompanyController::class, 'store'])->name('admin.companies.store');
        //company specific routes
        Route::prefix('/{companyId}')->group(function (){
            Route::get('/',[CompanyController::class, 'show'])->name('admin.companies.show');
            Route::get('/edit',[CompanyController::class, 'edit'])->name('admin.companies.edit');
            Route::post('/update',[CompanyController::class, 'update'])->name('admin.companies.update');
            Route::delete('/delete',[CompanyController::class, 'destroy'])->name('admin.companies.destroy');

        });

    });
    //Path => admin/citys
    Route::prefix('cities')->group(function () {
        Route::get('/',[CityController::class, 'index'])->name('admin.cities.index');
        Route::get('/create',[CityController::class, 'create'])->name('admin.cities.create');
        Route::post('/create',[CityController::class, 'store'])->name('admin.cities.store');
        //city specific routes
        Route::prefix('/{cityId}')->group(function (){
            Route::get('/',[CityController::class, 'show'])->name('admin.cities.show');
            Route::get('/edit',[CityController::class, 'edit'])->name('admin.cities.edit');
            Route::post('/update',[CityController::class, 'update'])->name('admin.cities.update');
            Route::delete('/delete',[CityController::class, 'destroy'])->name('admin.cities.destroy');

        });
    });

    //Path => admin/types
    Route::prefix('types')->group(function () {
        Route::get('/',[TypeController::class, 'index'])->name('admin.types.index');
        Route::get('/create',[TypeController::class, 'create'])->name('admin.types.create');
        Route::post('/create',[TypeController::class, 'store'])->name('admin.types.store');
        //type specific routes
        Route::prefix('/{typeId}')->group(function (){
            Route::get('/',[TypeController::class, 'show'])->name('admin.types.show');
            Route::get('/edit',[TypeController::class, 'edit'])->name('admin.types.edit');
            Route::post('/update',[TypeController::class, 'update'])->name('admin.types.update');
            Route::delete('/delete',[TypeController::class, 'destroy'])->name('admin.types.destroy');
        });
    });

    // path => admin/dashboard
    Route::get('/dashboard', function () {
        return inertia('Admin/Dashboard');
    })->name('admin.dashboard');

});

Route::get('/', [HomeController::class, 'index'])->name('home');

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
