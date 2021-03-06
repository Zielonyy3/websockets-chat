<?php

use App\Http\Controllers\Api\UsersApiController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('send-message', [MessagesController::class, 'sendMessage'])->name('messages.send');
Route::get('get-messages', [MessagesController::class, 'getMessages'])->name('messages.send');

Route::get('get-all-users', [UsersApiController::class, 'getAllUsers'])->name('messages.send');
