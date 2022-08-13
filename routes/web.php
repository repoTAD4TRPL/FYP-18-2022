<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ScrapingController;
use App\Http\Controllers\SavedPromoController;
use App\Http\Controllers\PromoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/registration', [PageController::class, 'showRegistration']);
Route::get('/login', [PageController::class, 'showLogin']);
Route::get('/logout', [PageController::class, 'logoutProcess']);

Route::get('/dashboard', [PageController::class, 'dashboard']);
Route::get('/promo', [PageController::class, 'showPromo']);
Route::get('/akun', [PageController::class, 'showAkun']);
Route::get('/scrape', [ScrapingController::class, 'runScrape']);

Route::get('/', [PageController::class, 'index']);
Route::get('/searchResult', [PageController::class, 'searchResult']);
Route::get('/searchBasedOn/{val}', [PageController::class, 'searchBasedOn']);
Route::post('/loginProcess', [PageController::class, 'loginProcess']);
Route::get('/promoUser/{val}', [PageController::class, 'promoUser']);
Route::get('/saved', [PageController::class, 'savedPromo']);

Route::get('/savedPromo/{id}', [SavedPromoController::class, 'store']);
Route::get('/unsavedPromo/{id}', [SavedPromoController::class, 'destroy']);

Route::get('/detailPromo/{id}', [PromoController::class, 'show']);
Route::get('/promo/editPromo/{id}', [PromoController::class, 'edit']);
Route::post('/promo/editProcess/{id}', [PromoController::class, 'update']);
Route::get('/deletePromo/{id}', [PromoController::class, 'destroy']);
Route::get('/expire', [PromoController::class, 'expire']);

Route::get('/akun/edit/{id}', [UsersController::class, 'edit']);
Route::post('/akun/editProcess/{id}', [UsersController::class, 'update']);
Route::post('/registrationProcess', [UsersController::class, 'store']);
Route::get('/verify/{email}', [UsersController::class, 'verify']);
Route::get('/deleteUser/{id}', [UsersController::class, 'destroy']);
