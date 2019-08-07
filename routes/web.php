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
Route::get('/discussions', 'DiscussionsController@index');
Route::get('/discussions/view/{thread_slug}', 'DiscussionsController@showThread');
Route::get('/discussions/solved', 'DiscussionsController@solved');
Route::get('/discussions/unsolved', 'DiscussionsController@unsolved');
Route::get('/discussions/noreplies', 'DiscussionsController@noreplies');
Route::get('/discussions/channel/{channel_id}/{channel}', 'DiscussionsController@channel');

/* Profile */
Route::get('/profile/{username}', 'DashboardController@index');

/* Errors */
Route::get('/errors/{type}', 'ErrorsController@error');

Route::group(['middleware' => ['auth']], function () {
    /* Discussions */
    Route::get('/discussions/create', 'DiscussionsController@createThread');
    Route::post('/discussions/create', 'DiscussionsController@storeThread');
    Route::get('/discussions/edit/{thread_slug}', 'DiscussionsController@editThread');
    Route::post('/discussions/update', 'DiscussionsController@updateThread');
    Route::get('/discussions/delete/{thread_slug}', 'DiscussionsController@deleteThread');
    Route::get('/discussions/threads', 'DiscussionsController@myThreads');
    Route::get('/discussions/participations', 'DiscussionsController@myParticipations');

    /* Channels */
    Route::get('/channels/create', 'ChannelsController@createChannel');
    Route::post('/channels/create', 'ChannelsController@storeChannel');

    /* Comments */
    Route::post('/comments/post', 'CommentsController@postComment');
    Route::post('/comments/like/{comment_id}', 'CommentsController@likeComment');
    Route::get('/comments/helpful/{comment_id}/{thread_slug}', 'CommentsController@helpfulComment');
    Route::get('/comments/notHelpful/{comment_id}/{thread_slug}', 'CommentsController@notHelpfulComment');    
    Route::get('/comments/edit/{comment_id}/{thread_slug}', 'CommentsController@editComment');
    Route::post('/comments/update', 'CommentsController@updateComment');
    Route::get('/comments/delete/{comment_id}/{thread_slug}', 'CommentsController@deleteComment');
    
    /* Profile */
    Route::get('/profile/{username}/edit', 'UsersController@editProfile');
    Route::post('/profile/update', 'UsersController@updateProfile');

    /* Countries */
    Route::get('/countries/create', 'CountriesController@create');
    Route::post('/countries/create', 'CountriesController@store');

    /* TODOs*/
    Route::get('/todos/create', 'ToDosController@create');
    Route::post('/todos/store', 'ToDosController@store');
    Route::get('/todos/update/{todo_id}', 'ToDosController@update');

    /* Sections */
    Route::get('/sections/create', 'SectionsController@create');
    Route::post('/sections/store', 'SectionsController@store');
});