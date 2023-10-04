<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('/students', StudentController::class)->except(['create', 'edit']);
Route::resource('/classrooms', ClassroomController::class)->except(['create', 'edit']);
Route::resource('/lectures', LectureController::class)->except(['create', 'edit']);
Route::get('/classrooms/get-lectures/{classroom}', [ClassroomController::class, 'getLectures'])->name('getLectures');
Route::middleware('normalizer')->post('/classrooms/update-lectures/{classroom}', [ClassroomController::class, 'updateLectures'])->name('updateLectures');
