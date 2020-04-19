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

Route::get('/posts/{id}','AdminPostController@post')->name('home.post');

Route::get('/','AdminPostController@posts')->name('home.posts');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin','AdminController@index')->name('admin.index');
    Route::resource('admin/users','AdminUserController',['as'=>'admin']);
    Route::resource('admin/posts','AdminPostController',['as'=>'admin']);
    Route::resource('admin/categories','AdminCategoryController',['as'=>'admin']);
    Route::resource('admin/comments','PostCommentController',['as'=>'admin']);
    Route::resource('admin/comment/replies','CommentReplyController',['as'=>'admin']);
});

Route::group(['middleware' => ['author']], function () {

});

