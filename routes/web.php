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



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('article/{article}', 'HomeController@getArticle')->name('show.article');
Route::get('categories/{category}', 'HomeController@getCategoriesArticles')->name('show.categories.articles');
Route::get('consultation', 'HomeController@askConsult')->name('ask.consult');
Route::post('consultation', 'UserController@saveConsult')->name('save.consult');
Route::get('inbox', 'UserController@inbox')->name('inbox');
Route::get('inbox/{consult}', 'UserController@getMessage')->name('inbox.message');
