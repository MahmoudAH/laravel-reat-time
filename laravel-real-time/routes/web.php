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
Route::get('/testcom', function () {
    return view('test_component');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/friends', 'FriendController@index')->name('friends.index');
Route::post ( '/add-friend/{user}', 'FriendController@addFriend' )->name('friend.add');
Route::post ( '/accept-friend/{user}', 'FriendController@acceptFriend' )->name('friend.accept');

//Route::get ( '/get-friend/{user}', 'HomeController@getFriend' )->name('friend.get');
Route::post ( '/remove-friend/{user}', 'FriendController@removeFriend' )->name('friend.remove');

Route::resource('/posts', 'PostController');
Route::get('/notify/{user_id}/{post_id}', 'PostController@notify');
Route::get('/test', function () {
    return view('test');
});
Route::get('/home-posts', 'TestController@home_posts');

/*like route*/
//Route::post('/home/like', 'LikeController@store');
Route::post('/like/{post}', 'LikeController@likePost');
Route::post('/unlike/{post}', 'LikeController@unlikePost');

//get post likes
Route::get('/posts/{post}/likes', 'LikeController@showLikes')->name('post.likes');
//chat routes
Route::get('/chat', 'ChatsController@index')->name('chat');
Route::get('/messages', 'ChatsController@fetchMessages');
Route::post('/messages', 'ChatsController@sendMessage');