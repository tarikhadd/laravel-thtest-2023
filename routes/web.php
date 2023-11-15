<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Public
Route::get('/', function () {
    return view('public.welcome', [
        'listings' => Listing::all()
    ]);
});
Route::post('/users', [UserController::class, 'store']);
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/auth', [UserController::class, 'auth']); //login


// Must auth routes
Route::get('/dashboard', function () {
    return view('welcome', [
        'listings' => auth()->user()->listings()->get()
    ]);
})->middleware('auth');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::post('/listing', [ListingsController::class, 'store'])->middleware('auth');
Route::put('listings/{listing}', [ListingsController::class, 'update'])->middleware('auth');
Route::delete('listings/remove/{listing}', [ListingsController::class, 'destroy'])->middleware('auth');


// Public routes
Route::get('/apis', function () {

    $apiList = array(
        array(
            'GET Listings',
            request()->getHttpHost().'/api/api-listings'
        ),
        array(
            'POST Add Listings',
            request()->getHttpHost().'/api/add-listings',
            '
                {
                    "name": "postman test"
                }
            '
        ),
        array(
            'GET Listing',
            request()->getHttpHost().'/api/api-listings/{id}'
        ),
        array(
            'PUT Update Listing',
            request()->getHttpHost().'/api/update-listings/{id}',
            '
                {
                    "name": "postman test"
                }
            '
        ),
        array(
            'DELETE Listing',
            request()->getHttpHost().'/api/delete-listings/{id}'
        ),

    );

    $authApiList = array(
        array(
            'POST Register',
            request()->getHttpHost().'/api/register',
            '
                {
                    "name": "Tarik",
                    "email": "postman100@t.com",
                    "password": "1234"
                }

                Bearer Token is returned with other user data
            '
        ),
        array(
            'POST Login',
            request()->getHttpHost().'/api/login',
            '
                {
                    "email": "postman100@t.com",
                    "password": "1234"
                }

                Bearer Token is returned with other user data
            '
        ),
        array(
            'POST Logout',
            request()->getHttpHost().'/api/logout',
            '
                Successfully logged out message is returned.
            '
        ),

    );

    $publicApiList = array(
        array(
            'GET Listings',
            request()->getHttpHost().'/api/listings-public'
        ),
        array(
            'POST Add Listings',
            request()->getHttpHost().'/api/add-listings-public',
            '
                {
                    "name": "postman test"
                }
            '
        ),
        array(
            'GET Listing',
            request()->getHttpHost().'/api/public-listings/{id}'
        ),
        array(
            'PUT Update Listing',
            request()->getHttpHost().'/api/public-update-listings/{id}',
            '
                {
                    "name": "postman test"
                }
            '
        ),
        array(
            'DELETE Listing',
            request()->getHttpHost().'/api/public-delete-listings/{id}'
        ),

    );

    return view('public.api-list')->with('apiList', $apiList)->with('authApiList', $authApiList)->with('publicApiList', $publicApiList);
});