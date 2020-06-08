<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function(){
    return view('welcome');
});

Route::get('/forum',[
    'uses' => 'ForumsController@index',
    'as' => 'forum'
]);

Route::get('/discuss', function () {
    return view('discuss');
});

Route::get('discussion/{slug}',[
    'uses' => 'DiscussionsController@show',
    'as' => 'discussion'
]);
Route::get('channel/{slug}',[
    'uses' => 'ForumsController@channel',
    'as' => 'channel'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels', 'ChannelsController');

    Route::get('discussion/create/new',[
        'uses' => 'DiscussionsController@create',
        'as' => 'discussions.create'
    ]);
    Route::post('discussion/store',[
        'uses' => 'DiscussionsController@store',
        'as' => 'discussions.store'
    ]);

    Route::post('discussions/reply/{id}',[
        'uses' => 'DiscussionsController@reply',
        'as' => 'discussions.reply'
    ]);
    Route::get('reply/like/{id}', [
        'uses' => 'RepliesController@like',
        'as' => 'reply.like'
    ]);
    Route::get('reply/unlike/{id}', [
        'uses' => 'RepliesController@unlike',
        'as' => 'reply.unlike'
    ]);
    Route::get('discussion/watch/{id}',[
        'uses' => 'WatchersController@watch',
        'as' => 'discussion.watch'
    ]);
    Route::get('/discussion/best/answer/{id}', [
        'uses' => 'RepliesController@best_answer',
        'as' => 'discussion.best.answer'
    ]);
    Route::get('discussion/unwatch/{id}',[
        'uses' => 'WatchersController@unwatch',
        'as' => 'discussion.unwatch'
    ]);
    Route::get('/discussion/edit/{slug}',[
        'uses' => 'DiscussionsController@edit',
        'as' => 'discussion.edit'
    ]);
    Route::post('/discussion/update/{id}',[
        'uses' => 'DiscussionsController@update',
        'as' => 'discussions.update'
    ]);
    Route::get('/reply/edit/{id}',[
        'uses' => 'RepliesController@edit',
        'as' => 'replies.edit'
    ]);
    Route::post('/reply/update/{id}',[
        'uses' => 'RepliesController@update',
        'as' => 'replies.update'
    ]);
});

Auth::routes();


