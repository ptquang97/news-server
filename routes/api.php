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
    // Get Category
    Route::get('getCategory', 'CategoryController@getCategory');
    // create Category
    Route::post('createCategory', 'CategoryController@createCategory');
    // edi Category
    Route::put('updateCategory', 'CategoryController@updateCategory');
    // delete tag
    Route::put('deleteCategory/{categoryId}', 'CategoryController@deleteCategory');
    // Get Category Info
    Route::get('getCategoryInfo/{categoryId}', 'CategoryController@getCategoryInfo');
});

// Comment
Route::group(['middleware' => ['api', 'cors'],'namespace' => 'api', 'prefix' => 'comment'], function () {
    // Get tag
    Route::get('getComment/{newsId}', 'CommentController@getComment');
    // create tag
    Route::post('createComment', 'CommentController@createComment');
    // edi tag
    Route::put('updateComment', 'CommentController@updateComment');
    // delete tag
    Route::put('deleteComment/{commentId}', 'CommentController@deleteComment');
});

// News
Route::group(['middleware' => ['api', 'cors'],'namespace' => 'api', 'prefix' => 'news'], function () {
    // Get newsInfo
    Route::get('getNewsInfo/{newsId}', 'NewsController@getNewsInfo');
    // Get news
    Route::get('getNews', 'NewsController@getNews');
    // create news
    Route::post('createNews', 'NewsController@createNews');
    // edi news
    Route::put('updateNews/{newsId}', 'NewsController@updateNews');
    // delete news
    Route::delete('deleteNews/{newsId}', 'NewsController@deleteNews');
    // add image
    Route::post('uploadImage', 'NewsController@uploadImage');
    // GetNewsByCategory
    Route::get('getNewsByCategory/{categoryId}', 'NewsController@getNewsByCategory');
    // GetNewsByTag
    Route::get('getNewsByTag/{tagId}', 'NewsController@getNewsByTag');
    // getNewsEachCategory
    Route::get('getNewsEachCategory', 'NewsController@getNewsEachCategory');
    // searchNews
    Route::get('searchNews/{request}', 'NewsController@searchNews');
});
