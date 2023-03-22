<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\LocataireController;
use App\Http\Controllers\API\AppartementController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/list/{id}', [UserController::class, 'listUser']);
Route::post('/create', [UserController::class, 'create']);
Route::patch('/update/{id}', [UserController::class, 'update']);
Route::delete('/delete/{id}', [UserController::class, 'delete']);

Route::get('/listAp/{id}', [AppartementController::class, 'listA']);
Route::post('/createAp', [AppartementController::class, 'createA']);
Route::patch('/updateAp/{id}', [AppartementController::class, 'updateA']);
Route::delete('/deleteAp/{id}', [AppartementController::class, 'deleteA']);

Route::get('/listLo/{id}', [LocataireController::class, 'listL']);
Route::post('/createLo', [LocataireController::class, 'createL']);
Route::patch('/updateLo/{id}', [LocataireController::class, 'updateL']);
Route::delete('/deleteLo/{id}', [LocataireController::class, 'deleteL']);