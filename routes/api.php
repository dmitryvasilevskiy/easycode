<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UserChannelController;
use Illuminate\Http\Request;
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

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::post('login', [AuthenticationController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthenticationController::class, 'destroy'])->middleware('auth:api');
    Route::get('/user', fn(Request $request) => $request->user());
    Route::get('user-channels', [UserChannelController::class, 'index']); //Получение доступных каналов связи
    Route::post('user-channels', [UserChannelController::class, 'store']); //Обновление канала связи для пользователя
    Route::post('send-code', [AuthenticationController::class, 'sendCode']); //Отправление кода
    Route::post('settings/{id}', [SettingController::class, 'store']); //Обновление настройки
});

