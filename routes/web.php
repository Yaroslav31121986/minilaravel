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

/*Route::get('/', function () {
    return view('welcome');
	});*/
//
//Route::get('page3', function () {
//	return 'Hello Word!!!';
//});

Route::get('/', 'IndexController@index');

Route::get('article/{id}', 'IndexController@show')->name('articleShow');

Route::get('page/add', 'IndexController@add')->name('articleStore');

Route::post('page/add', 'IndexController@store');

// Delete

Route::delete('page/delete/{article}', function (\App\Article $article) {
	$article->delete();
	return redirect('/');
//	dump($article);	
//	dd($article);
//	$article_tmp = \App\Article::where('id', $article)->first();	
//	dump($article_tmp);
//	$article_tmp->delete();	
	
})->name('articleDelete');





