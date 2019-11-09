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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

/* Discussions */
Route::group(['prefix' => 'discussions'], function () {
    Route::get('/', 'DiscussionsController@index');
    Route::get('view/{thread_slug}', 'DiscussionsController@showThread');
    Route::get('solved', 'DiscussionsController@solved');
    Route::get('unsolved', 'DiscussionsController@unsolved');
    Route::get('noreplies', 'DiscussionsController@noreplies');
    Route::get('channel/{channel_id}/{channel}', 'DiscussionsController@channel');
});

/* Profile */
Route::get('/profile/{username}', 'DashboardController@index');

/* Errors */
Route::get('/errors/{type}', 'ErrorsController@error');

Route::group(['middleware' => ['auth']], function () {
    /* Discussions */
    Route::group(['prefix' => 'discussions'], function () {
        Route::get('create', 'DiscussionsController@createThread');
        Route::post('create', 'DiscussionsController@storeThread');
        Route::get('edit/{thread_slug}', 'DiscussionsController@editThread');
        Route::post('update', 'DiscussionsController@updateThread');
        Route::get('delete/{thread_slug}', 'DiscussionsController@deleteThread');
        Route::get('threads', 'DiscussionsController@myThreads');
        Route::get('participations', 'DiscussionsController@myParticipations'); 
    });

    /* Channels */
    Route::group(['prefix' => 'channels'], function () {
        Route::get('create', 'ChannelsController@createChannel');
        Route::post('create', 'ChannelsController@storeChannel'); 
    });

    /* Comments */
    Route::group(['prefix' => 'comments'], function () {
        Route::post('post', 'CommentsController@postComment');
        Route::post('like/{comment_id}', 'CommentsController@likeComment');
        Route::get('helpful/{comment_id}/{thread_slug}', 'CommentsController@helpfulComment');
        Route::get('notHelpful/{comment_id}/{thread_slug}', 'CommentsController@notHelpfulComment');    
        Route::get('edit/{comment_id}/{thread_slug}', 'CommentsController@editComment');
        Route::post('update', 'CommentsController@updateComment');
        Route::get('delete/{comment_id}/{thread_slug}', 'CommentsController@deleteComment'); 
    });
    
    /* Profile */
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/{username}/edit', 'UsersController@editProfile');
        Route::post('update', 'UsersController@updateProfile');
    });

    /* Countries */
    Route::group(['prefix' => 'countries'], function () {
        Route::get('create', 'CountriesController@create');
        Route::post('create', 'CountriesController@store');
    });

    /* TODOs*/
    Route::group(['prefix' => 'todos'], function () {
        Route::get('create', 'ToDosController@create');
        Route::post('store', 'ToDosController@store');
        Route::get('update/{todo_id}', 'ToDosController@update'); 
    });

    /* Sections */
    Route::group(['prefix' => 'section'], function () {
        Route::get('create', 'SectionsController@create');
        Route::post('store', 'SectionsController@store'); 
    });

    /* Notifications */
    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/{id}', 'NotificationsController@getNotification');
        Route::get('view/all', 'NotificationsController@getAllNotifications');
    });
});