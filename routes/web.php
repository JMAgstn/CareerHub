<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

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
//index - show all data --> listings
//show - show single data --> listing
//create - show form to create new --> listing
//store - store data --> new listing
//edit - show form to edit data
//update - update data
//destroy - delete a data


Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/{listing}', [ListingController::class, 'show']);

