<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
// localhost8000の'/store'にPOSTでリクエストが飛んできた場合、HomeControllerのstoreメソッドにいく
Route::post('/store', [HomeController::class, 'store'])->name('store');

// {id}(Controllerに渡す変数)にmemosテーブルのidを入れる
Route::get('/edit/{id}', [HomeController::class,'edit'])->name('name');
