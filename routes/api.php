<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('tasks', TaskController::class);

Route::get('tasks', [TaskController::class, 'index']);
Route::get('tasks/completed', [TaskController::class, 'getCompletedTasks']);
Route::get('tasks/all', [TaskController::class, 'getTasks']);
Route::post('task/create', [TaskController::class, 'store']);
Route::delete('task/delete/{id}', [TaskController::class, 'destroy']);
Route::put('task/update/{id}', [TaskController::class, 'update']);