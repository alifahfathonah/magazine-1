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

// use Illuminate\Routing\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    
    // @Category Route
    Route::resource('/category', 'CategoryController');
    // @End Category Route
    
    // @Tags Route
    Route::resource('/tags', 'TagController');
    // @End Tags Route
    
    // @Post Route
    Route::get('/posts/trash', 'PostController@trash_posts')->name('posts.trash');
    Route::get('/posts/restore/{id}', 'PostController@restore_posts')->name('posts.restore');
    Route::delete('/posts/kill/{id}', 'PostController@permanent_delete')->name('posts.kill');
    Route::resource('/posts', 'PostController');
    // @End Post Route
    
});
 

