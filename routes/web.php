<?php

use App\Http\Controllers\AjaxController;
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


Route::get('/ajax-form',[AjaxController::class,'index'])-> name('ajax.index');
Route::get('/getState/{id}',[AjaxController::class,'getState'])-> name('ajax.state');

Route::get('/index',[AjaxController::class,'indexSer'])-> name('index');
Route::get('/services/{id}',[AjaxController::class,'services'])-> name('services');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
