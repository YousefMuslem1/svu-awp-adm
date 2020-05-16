<?php

use Illuminate\Support\Facades\DB;

DB::listen(function ($query) {
//   dd($query->sql);
});
Route::group(['prefix' => 'dashboard', 'as'=> 'dashboard.' , 'middleware' => ['auth', 'admin']], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::put('categories/up', 'CategoryController@update')->name('categories.update');
    Route::resource('categories', 'CategoryController', [
        'only' => ['index', 'create', 'show', 'store', 'destroy']
    ]);
    Route::get('categories/articles/{id}', 'CategoryController@getArticles')->name('categories.articles');

    Route::resource('articles', 'ArticleController');
    //Trash Routs
    Route::get('trash', 'TrashController@getTrash')->name('trash');
    Route::get('trash/category', 'TrashController@getCategoryTrash')->name('category.trash');
    Route::get('trash/article', 'TrashController@getArticleTrash')->name('article.trash');
    Route::post('categories/restore/{id}', 'CategoryController@restoreCategory')->name('categories.restore');
    Route::post('articles/restore/{id}', 'ArticleController@restoreArticle')->name('articles.restore');

    //Consultations Routes
    Route::resource('consultations', 'ConsultationController',[ 'only' => ['index', 'show']]);
    Route::post('consultation/replay/{consultation}', 'ConsultationController@replay')->name('consultation.replay');
});
