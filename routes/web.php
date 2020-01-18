<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');
Route::post('/add-category', 'CategoryController@addCategory')->name('addCategory');
Route::get('categories', 'CategoryController@getAllCategory')->name('getAllCategory');
Route::get('category/{id}', 'CategoryController@deleteCategory')->name('deleteCategory');
Route::get('edit-category/{id}', 'CategoryController@getEditCategory')->name('getEditCategory');
Route::post('edit-category/{id}', 'CategoryController@postEditCategory')->name('postEditCategory');

Route::get('posts', 'PostController@getAllPost')->name('getAllPost');


