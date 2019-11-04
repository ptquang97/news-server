<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// User
Route::group(['namespace' => 'api', 'prefix' => 'user'], function () {
    // Get user
    Route::get('getProfile/{userId}', 'UserController@getProfile');
    // create uer
    Route::post('createUser', 'UserController@createUser');
    // login
    Route::post('login', 'UserController@login');
});

// Tag
Route::group(['namespace' => 'api', 'prefix' => 'tag'], function () {
    // Get tag
    Route::get('getTags', 'TagsController@getTags');
    // create tag
    Route::post('createTag', 'TagsController@createTag');
    // edi tag
    Route::put('updateTag', 'TagsController@updateTag');
    // delete tag
    Route::put('deleteTag', 'TagsController@deleteTag');
});

// Category
Route::group(['namespace' => 'api', 'prefix' => 'category'], function () {
    // Get tag
    Route::get('getCategory', 'CategoryController@getCategory');
    // create tag
    Route::post('createCategory', 'CategoryController@createCategory');
    // edi tag
    Route::put('updateCategory', 'CategoryController@updateCategory');
    // delete tag
    Route::put('deleteCategory', 'CategoryController@deleteCategory');
});

// Category
Route::group(['namespace' => 'api', 'prefix' => 'comment'], function () {
    // Get tag
    Route::get('getComment', 'CommentController@getComment');
    // create tag
    Route::post('createComment', 'CommentController@createComment');
    // edi tag
    Route::put('updateComment', 'CommentController@updateComment');
    // delete tag
    Route::put('deleteComment', 'CommentController@deleteComment');
});
