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
Route::group(['middleware' => ['api', 'cors'],'namespace' => 'api', 'prefix' => 'user'], function () {
    // Get user
    Route::get('getProfile/{userId}', 'UserController@getProfile');
    // create uer
    Route::post('createUser', 'UserController@createUser');
    // login
    Route::post('login', 'UserController@login');
});

// Tag
Route::group(['middleware' => ['api', 'cors'],'namespace' => 'api', 'prefix' => 'tag'], function () {
    // Get tag
    Route::get('getTags', 'TagsController@getTags');
    // create tag
    Route::post('createTag', 'TagsController@createTag');
    // edi tag
    Route::put('updateTag', 'TagsController@updateTag');
    // delete tag
    Route::put('deleteTag/{tagId}', 'TagsController@deleteTag');
});

// Category
Route::group(['middleware' => ['api', 'cors'],'namespace' => 'api', 'prefix' => 'category'], function () {
    // Get tag
    Route::get('getCategory', 'CategoryController@getCategory');
    // create tag
    Route::post('createCategory', 'CategoryController@createCategory');
    // edi tag
    Route::put('updateCategory', 'CategoryController@updateCategory');
    // delete tag
    Route::put('deleteCategory/{categoryId}', 'CategoryController@deleteCategory');
});

// Comment
Route::group(['middleware' => ['api', 'cors'],'namespace' => 'api', 'prefix' => 'comment'], function () {
    // Get tag
    Route::get('getComment', 'CommentController@getComment');
    // create tag
    Route::post('createComment', 'CommentController@createComment');
    // edi tag
    Route::put('updateComment', 'CommentController@updateComment');
    // delete tag
    Route::put('deleteComment/{commentId}', 'CommentController@deleteComment');
});

// News
Route::group(['middleware' => ['api', 'cors'],'namespace' => 'api', 'prefix' => 'news'], function () {
    // Get tag
    Route::get('getNews', 'CommentController@getNewsInfo');
    // create tag
    Route::post('createNews', 'CommentController@createNews');
    // edi tag
    Route::put('updateNews', 'CommentController@updateNews');
    // delete tag
    Route::put('deleteNews/{newsId}', 'CommentController@deleteNews');
});
