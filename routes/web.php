<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Video\UploadController;
use App\Http\Controllers\Video\VideoController;

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

Route::get('/', [HomeController::class, '__invoke'])->name('index');
Route::get('/upload', [UploadController::class, 'index'])->name('upload_video');
Route::post('/store_video', [VideoController::class, 'store'])->name('store_video');
Route::get('/view_videos/{id}', [VideoController::class, 'view'])->name('view_video');
