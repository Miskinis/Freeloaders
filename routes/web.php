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

Route::get('/', 'PublicController@showCategories')->name('categories');
Route::post('/', 'PublicController@showSearchPosts')->name('search');

Route::prefix('subcategories')->group(function() {
    Route::get('/{category}', 'PublicController@showSubcategories')->name('categories.subcategories');
    Route::get('/{category}/{subcategory}', 'PublicController@showPosts')->name('subcategories.posts');
    Route::get('/{category}/{subcategory}/{post}', 'PublicController@showPost')->name('posts.post');
});

Auth::routes();

Route::prefix('user')->group(function() {
    Route::get('/dashboard', 'ProfileController@index')->name('dashboard');
    Route::resource('/dashboard/posts', 'PostController');
});

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@index')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::resource('/dashboard/subcategories', 'SubcategoryController');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
});
