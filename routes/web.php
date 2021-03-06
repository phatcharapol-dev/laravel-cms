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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts/{id}','PostController@show')->name('home.post');

Route::get('/','PostController@index')->name('home.posts');

Route::get('/post/category/{slug}','PostController@searchPostByCategory')->name('home.post.category.search');

Route::get('/post/search','SearchController@searchFrontPost')->name('home.post.search');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin','AdminController@index')->name('admin.index');
    Route::resource('admin/users','AdminUserController',['as'=>'admin']);
    Route::resource('admin/posts','AdminPostController',['as'=>'admin']);
    Route::resource('admin/categories','AdminCategoryController',['as'=>'admin']);
    Route::resource('admin/comments','PostCommentController',['as'=>'admin']);
    Route::resource('admin/comment/replies','CommentReplyController',['as'=>'admin']);

    Route::get('/admin/user/search','SearchController@searchUser');
    Route::get('/admin/category/search','SearchController@searchCategory');
    Route::get('/admin/post/search','SearchController@searchPost');
    Route::get('/admin/searchAutocomplete','SearchController@fetchAutocomplete')->name('fetchAutoComplete');
});

Route::group(['middleware' => ['admin' OR 'member']], function(){
	Route::post('post/comments','PostCommentController@store');
	Route::post('post/comment/replies','CommentReplyController@store');
});


