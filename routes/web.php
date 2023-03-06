<?php

use App\Http\Controllers\TestController;
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

Route::match(['get', 'post'], 'array-unique', [TestController::class, 'arrayUnique'])->name('arrayUnique');
Route::match(['get', 'post'], 'validate-input', [TestController::class, 'interleaveStrings'])->name('validateInput');
Route::get('image-form', [TestController::class, 'imageUploadView'])->name('imageUploadView');
Route::post('upload-image', [TestController::class, 'imageUpload'])->name('uploadImage');

Route::get('str-reverse', [TestController::class, 'strReverse'])->name('str-reverse');

