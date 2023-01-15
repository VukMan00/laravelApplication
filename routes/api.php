<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestQuestionController;
use App\Http\Controllers\UserTestController;

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

Route::resource('/users',UserController::class);

Route::resource('/answers',AnswerController::class);

Route::resource('/questions',QuestionController::class);

Route::resource('/tests',TestController::class);

//Ugnjezdeni resusri
Route::resource('questions.answers',QuestionAnswerController::class)->only(['index','create','update','edit','destroy']);
Route::resource('tests.questions',TestQuestionController::class)->only(['index','destroy','create','update','edit']);
Route::resource('tests.users',UserTestController::class)->only(['index','destroy','create','update','edit']);

