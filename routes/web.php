<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Users
// List all user
Route::get('/users', 'UsersController@index')->name('users.index');
// Create new user
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users', 'UsersController@store')->name('users.store');
// Show individual user
Route::get('/users/{user}', 'UsersController@show')->name('users.show');

// Update user
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::put('/users/{user}', 'UsersController@update')->name('users.update');

// Articles
// List all articles
Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
// Create new article
Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
Route::post('/articles', 'ArticlesController@store')->name('articles.store');
// Update article
Route::get('/articles/{article}/edit', 'ArticlesController@edit')->name('articles.edit');
Route::put('/articles/{article}', 'ArticlesController@update')->name('articles.update');

// ArticleCategories
// List all ArticleCategories
Route::get('/article/categories', 'ArticleCategoriesController@index')->name('article_categories.index');
Route::get('/article/categories/{category}', 'ArticleCategoriesController@show')->name('article_categories.show');

// Create new article
Route::get('/article/categories/create', 'ArticleCategoriesController@create')->name('article_categories.create');
Route::post('/article/categories', 'ArticleCategoriesController@store')->name('article_categories.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
