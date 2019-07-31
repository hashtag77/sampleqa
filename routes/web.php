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

/* Profile */
Route::get('/profile/{username}', 'UsersController@profile');

Route::group(['middleware' => ['auth']], function () {
    /* Discussions */
    Route::get('/discussions/create', 'DiscussionsController@createThread');
    Route::post('/discussions/create', 'DiscussionsController@storeThread');
    Route::get('/discussions/edit/{thread_slug}', 'DiscussionsController@editThread');
    Route::post('/discussions/update', 'DiscussionsController@updateThread');
    Route::delete('/discussions/delete/{thread_slug}', 'DiscussionsController@deleteThread');
    Route::get('/discussions/questions', 'DiscussionsController@myQuestions');

    /* Channels */
    Route::get('/channels/create', 'ChannelsController@createChannel');
    Route::post('/channels/create', 'ChannelsController@storeChannel');

    /* Comments */
    Route::post('/comments/post', 'CommentsController@postComment');
    Route::get('/comments/like/{comment_id}/{thread_slug}', 'CommentsController@likeComment');
    Route::get('/comments/helpful/{comment_id}/{thread_slug}', 'CommentsController@helpfulComment');
});