<?php

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


Auth::routes();
Route::middleware('auth:sanctum', config('jetstream.auth_session'), 'verified')->group(function(){

    Route::get('/', \App\Http\Livewire\BooksTable::class);

    Route::resource('categories', \App\Http\Controllers\CategoryController::class)
        ->only('show')
        ->parameters(['categories' => 'category:slug']);

    Route::resource('authors', \App\Http\Controllers\AuthorController::class)
        ->only('show')
        ->parameters(['authors' => 'author:slug']);
});
