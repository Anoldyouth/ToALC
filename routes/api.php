<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('calculate', [\App\Http\Controllers\CalculatorController::class, 'calculate']);

Route::get('state-machine', [\App\Http\Controllers\StateMachineController::class, 'stateMachine']);

Route::post('pda', [\App\Http\Controllers\PushDownAutomatonController::class, 'pda']);

Route::post('syntax-analyzer', [\App\Http\Controllers\SyntaxAnalyzerController::class, 'syntaxAnalyzer']);
