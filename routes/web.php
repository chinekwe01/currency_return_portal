<?php

use App\Http\Controllers\CustomerDataController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;


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
})->name('welcome');

Route::get('/return-currency', [CustomerDataController::class, 'create'])->name('return-currency');
Route::post('/return-currency', [CustomerDataController::class, 'store'])->name('return-currency.store');
Auth::routes();
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Super Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:super-admin'])->group(function () {

    Route::get('/super-admin/home', [HomeController::class, 'superAdminHome'])->name('super.admin.home');
    Route::get('/super-admin/create-staff', [StaffController::class, 'create'])->name('super.admin.create');
    Route::post('/super-admin/store-staff', [StaffController::class,'store'])->name('super.admin.store');
    Route::delete('/super-admin/staff/{id}', [StaffController::class, 'destroy'])->name('super.admin.destroy');;
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [CustomerDataController::class, 'index'])->name('manager.home');
    Route::get('customer/data/show/{id}', [CustomerDataController::class, 'show'])->name('manager.show');
    Route::delete('/customer/data/{id}', [CustomerDataController::class, 'destroy'])->name('manager.delete');
});
