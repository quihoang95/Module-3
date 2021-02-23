<?php

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
Route::prefix('staffs')->group(function (){
    Route::get('/',[UserController::class,'index'])->name('users.index');
    Route::get('/create',[UserController::class,'create'])->name('users.create');
    Route::post('/create',[UserController::class,'store'])->name('users.store');
    Route::get('/{id}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::post('/{id}/edit',[UserController::class,'update'])->name('users.update');
    Route::get('/{id}/destroy',[UserController::class,'destroy'])->name('users.destroy');
});;
