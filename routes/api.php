<?php

use App\Http\Controllers\Api\ProjectController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//REGISTRO LA ROTTA DEI PROJECT, trasformati in json nel file controller Api/ProjectController

Route::get('/projects', [ProjectController::class,'index']);


//creo la rotta api per il PROJECT DETAIL

Route::get('projects/{slug}',[ProjectController::class,'show']);

//registro una nuova PROVA rotta in questo file api.php

Route::get('/routetest', function(){
    return response()->json([
        'name' => 'Gabriele',
        'role' => 'admin',
    ]);
});
