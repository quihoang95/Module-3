<?php
namespace App\Http\Controllers;
use App\Customer;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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
    return view('home');
});
Route::group(['prefix'=>'customersTH'], function () {
    Route::get('/',[UserController::class,'index'])->name('customersTH.index');
    Route::get('/create',[UserController::class,'create'])->name('customersTH.create');
    Route::post('/create',[UserController::class,'store'])->name('customersTH.store');
    Route::get('/{id}/edit',[UserController::class,'edit'])->name('customersTH.edit');
    Route::post('/{id}/edit',[UserController::class,'update'])->name('customersTH.update');
    Route::get('/{id}/destroy',[UserController::class,'destroy'])->name('customersTH.destroy');
});
