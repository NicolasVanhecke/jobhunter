<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\JobController;

use App\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\Admin\CityController as AdminCityController;
use App\Http\Controllers\Admin\JobController as AdminJobController;

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

// User routes
Route::get( '/', [ JobController::class, 'listAllJobs' ] ); // temp
Route::get( '/jobs', [ JobController::class, 'listAllJobs' ] ); // List all jobs
Route::get( '/jobs/{job}', [ JobController::class, 'jobDetails' ] ); // Show detailed job page

// Admin routes
// Route::get( '/admin/', [ AdminController::class, 'admin-home' ] );
Route::resource( '/admin/companies', AdminCompanyController::class );
Route::put( '/admin/companies/{company}/softDelete', [ AdminCompanyController::class, 'softDelete' ] )->name( 'companies.softDelete' );
Route::resource( '/admin/cities', AdminCityController::class );
Route::put( '/admin/cities/{city}/softDelete', [ AdminCityController::class, 'softDelete' ] )->name( 'cities.softDelete' );
Route::resource( '/admin/jobs', AdminJobController::class );
Route::put( '/admin/jobs/{job}/softDelete', [ AdminJobController::class, 'softDelete' ] )->name( 'jobs.softDelete' );
