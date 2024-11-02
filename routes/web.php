<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('edit');
    Route::put('/update/{task}', [TaskController::class, 'update'])->name('update');
    Route::delete('/destroy/{task}', [TaskController::class, 'destroy'])->name('destroy');
    Route::patch('/toggle-status/{task}', [TaskController::class, 'toggleStatus'])->name('toggleStatus');
});
