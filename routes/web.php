<?php
Route::get('/', function () {
    return view('public/index');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');
Route::group(['middleware' => ['auth']], function(){
    /**
     * Route of category
     */
    Route::post('/add-category', 'CategoryController@addCategory')->name('addCategory');
    Route::get('categories', 'CategoryController@getAllCategory')->name('getAllCategory');
    Route::get('category/{id}', 'CategoryController@deleteCategory')->name('deleteCategory');
    Route::get('edit-category/{id}', 'CategoryController@getEditCategory')->name('getEditCategory');
    Route::post('edit-category/{id}', 'CategoryController@postEditCategory')->name('postEditCategory');
    /**
     * Route of post
     */
    Route::get('posts', 'PostController@getAllPost')->name('getAllPost');
    Route::post('/add-post', 'PostController@postAddPost')->name('postAddPost');
    Route::get('/delete-post/{id}', 'PostController@deletePost')->name('deletePost');
    Route::get('/post/{id}', 'PostController@editPost')->name('editPost');
    Route::post('/update-post/{id}', 'PostController@postEditPost')->name('postEditPost');
});
Route::get('blog-posts', 'BlogController@getAllBlogPost')->name('getBlogPost');





