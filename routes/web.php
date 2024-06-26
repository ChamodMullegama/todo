<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\BannerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,"index"])->name('home');
Route::get('/relationship',[HomeController::class,"relationship"])->name('relationship');
Route::prefix('/todo')->group(function(){

    Route::get('/',[TodoController::class,"index"])->name('todo');
    Route::post('/store',[TodoController::class,"store"])->name('todo.store');
    Route::get('/edit',[TodoController::class,"edit"])->name('todo.edit');
    Route::post('/{task_id}/update',[TodoController::class,"update"])->name('todo.update');
    Route::get('/{task_id}/delete',[TodoController::class,'delete'])->name(('todo.delete'));
    Route::get('/{task_id}/status',[TodoController::class,'status'])->name(('todo.status'));
    Route::get('/{task_id}/sub',[TodoController::class,'sub'])->name(('todo.sub'));
    Route::post('/sub/store',[TodoController::class,'subStore'])->name(('todo.sub.store'));



});


Route::prefix('banner')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banner');
    Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/{banner_id}/delete', [BannerController::class, 'delete'])->name('banner.delete');
    Route::get('/{banner_id}/status', [BannerController::class, 'status'])->name('banner.status');
});
