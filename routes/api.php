<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingsController;

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

// Public APIs

Route::get('listings-public', [ListingsController::class, 'get']);

Route::get('public-listings/{id}', [ListingsController::class, 'getById']);

Route::post('add-listings-public', [ListingsController::class, 'addNew']);

Route::put('public-update-listings/{id}', [ListingsController::class, 'updateApi']);

Route::delete('public-delete-listings/{id}', [ListingsController::class, 'delete']);




//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    // Get listings that belong to user logged
    Route::get('api-listings', function () {
        return response()->json([
            'listings' => auth()->user()->listings()->get()
        ]);
    });
    // 

    // Get one listing
    Route::get('api-listings/{id}', [ListingsController::class, 'getById']);
    // 

    // Add listing
    Route::post('add-listings', [ListingsController::class, 'addNew']);
    // 

    // Update listing
    Route::put('update-listings/{id}', [ListingsController::class, 'updateApi']);
    // 

    //  Delete listing
    Route::delete('delete-listings/{id}', [ListingsController::class, 'delete']);
    // 

    // Log out
    Route::post('/logout', [AuthController::class, 'logout']);
    // 
    
});

//  Register & Log in
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);