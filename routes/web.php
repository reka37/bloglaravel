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

Route::post('/addcomment-form', 'ContactController@addcomment');

Route::get('/cats/{menus}', 'AllController@category');

Route::get('/show_one_autor/{id}', 'AllController@show_one_autor')->name('show_one_autor');

Route::get('/one/{id}', 'AllController@one');

Route::post('/search', 'AllController@search');

Route::post('/setview','AjaxController@index')->name('setview');

Route::post('/setlike','AjaxController@setlike')->name('setlike');

Route::get('/', 'AllController@all');

Route::post('/contact-form', 'ContactController@submit');

Route::get('/contact', function() {	
	return view('contact');	
});

Route::post('/lk-form', 'LkController@submit');

Route::get('/lk', 'LkController@index')->name('lk');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>['auth']], function(){	
	Route::get('/', 'DashboardController@dashboard')->name('admin.index');
	Route::get('/category', 'CategoryController@index')->name('admin.category');
	Route::get('/addcategory', 'CategoryController@add')->name('admin.addcategory');
	Route::get('/addpublication', 'PublicationsController@add')->name('admin.addpublication');
	Route::post('/addpublicationsave', 'PublicationsController@save')->name('admin.addpublicationsave');
	Route::get('/publications', 'PublicationsController@index')->name('admin.publications');
	Route::get('/comments', 'CommentsController@index')->name('admin.comments');
	Route::post('/category-form', 'CategoryController@save');	
	Route::get('/editcomment/{id}', 'CommentsController@editcomment')->name('admin.editcomment');
	Route::post('/editcomment-form', 'CommentsController@editcommentform');	
	Route::get('/deletecomment/{id}', 'CommentsController@deletecomment');	
});