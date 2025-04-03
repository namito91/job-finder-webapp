<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


/* 
Route::get('/', function () {
    return view('welcome');
});
*/

/* 
Route::get('/hello', function () {
    return response("<h1>hello world</h1>", 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');;
});


Route::get('/posts/{id}', function ($id) {
    return response("post " . $id);
})->where('id', '[0-9]+');


Route::get('/search', function (Request $request) {

    return $request->name . " " . $request->city;
});
*/


// ----------------------------------------------------------------

/**
 * common resource routes :
 * index, show all items
 * show,  show single item
 * create, show form to create new item
 * store, store an item
 * destroy, delete an item
 * edit, show form to update an item,
 * update , update an item,
 */




// show create item form
Route::get('/listing/create', [ListingController::class, 'create']);

// store listing data
Route::post('/listing', [ListingController::class, 'store']);

// all listings
Route::get('/', [ListingController::class, 'index']);

// single listing 
Route::get('/listing/{listing}', [ListingController::class, 'show']);
