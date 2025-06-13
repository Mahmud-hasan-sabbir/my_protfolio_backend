<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/homepage', [HomepageController::class, 'homeapifront']);
Route::get('/aboutpage', [HomepageController::class, 'aboutapifront']);
Route::get('/personalinfo', [HomepageController::class, 'personalinfo']);
Route::get('/workinginfo', [HomepageController::class, 'workinginfo']);
Route::get('/educationinfo', [HomepageController::class, 'educationinfo']);
Route::get('/skill', [HomepageController::class, 'skill']);
Route::get('/workingproject', [HomepageController::class, 'workingproject']);
