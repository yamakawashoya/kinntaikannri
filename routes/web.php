<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

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

Route::get('/dashboard', [AttendanceController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/start', [AttendanceController::class, 'createStart']);
Route::get('/end', [AttendanceController::class, 'createEnd']);
Route::get('/break/start', [AttendanceController::class, 'breakStart']);
Route::get('/break/end', [AttendanceController::class, 'breakEnd']);

Route::get('/attendance', [AttendanceController::class, 'showAttendance']);

Route::get('/attendance/{date?}', [AttendanceController::class, 'showAttendance'])->name('attendance.show');