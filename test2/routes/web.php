<?php

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
Route::get('/test2/{name?}', function ($name = null) {
    if ($name) {
        echo 'Hello World' . ' ' . $name . '!';
    } else {
        echo 'Hello World!';
    }
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', function (Illuminate\Http\Request $request) {
    // todo
});
Route::post('/login', function (Illuminate\Http\Request $request) {
    if ($request->username == 'admin'
        && $request->password == 'admin') {
        return view('welcome_admin');
    }

    return view('login_error');
});
Route::get('/calculator', function () {
    return view('calculator');
});
Route::post('/calculator', function (Illuminate\Http\Request $request) {
    $productDescription = $request->productDescription;
    $price = $request->price;
    $discountPercent = $request->discountPercent;
    $discountAmount = $price * $discountPercent * 0.01;
    $discountPrice = $price - $discountAmount;
    return view('show_discount_amount', compact(['discountPrice', 'discountAmount', 'productDescription', 'price', 'discountPercent']));
});
Route::get('/dictionary', function () {
    return view('dictionary');
});
Route::post('/dictionary', function (Illuminate\Http\Request $request) {
    $library = array('word' => 'từ', 'world' => 'thế giới', 'student' => 'sinh viên', 'school' => 'trường học');
    $dictionary = $request->dictionary;
    if (array_key_exists($dictionary, $library)) {
        $value= $library[$dictionary];
        return view('show_dictionary', compact(['dictionary', 'value']));
    }
    return view('show_dictionary', compact('dictionary'));


});

