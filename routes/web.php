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
Route::redirect('/', '/index');
Route::redirect("/index", "/index/now");
Route::get("/index/top", "HomeController@tindex");
Route::get("/index/now", "HomeController@index");
Route::get("/index/following", "HomeController@windex");
Route::resource('question', 'QuestionController')->except(['index', 'create']);
Route::get('/tag/get', 'TagController@getAll');
Route::resource('tag', 'TagController')->except(['edit','create']);
Route::get('/question/{qid}/answer/{aid}/comment', 'CommentController@getall');
Route::get('/question/{qid}/answer/{aid}', 'AnswerController@show');

Route::middleware('auth')->group(function(){
    Route::post('/question/{qid}/answer/', 'AnswerController@store');
    Route::put('/question/{qid}/answer/{aid}', 'AnswerController@update');
    Route::delete('/question/{qid}/answer/{aid}', 'AnswerController@delete');

    Route::post('/question/{qid}/answer/{aid}/comment', 'CommentController@store');
    Route::delete('/question/{qid}/answer/{aid}/comment/{cid}', 'CommentController@delete');

    Route::delete('/answer/{aid}/approve', 'ApproveController@delete');
    Route::post('/answer/{aid}/approve', 'ApproveController@store');

    Route::delete('/question/{pid}/watch', 'WatchController@delete');
    Route::post('/question/{pid}/watch', 'WatchController@store');

    Route::get('/question/{pid}/tag', 'QuestionTagController@query');

    Route::delete('/user/{uid}/follow', 'FollowController@delete');
    Route::post('/user/{uid}/follow', 'FollowController@store');

    Route::get('/user/{uid}/ban', 'UserController@lock');
    Route::get('/question/{pid}/lock', 'QuestionController@lock');
});

Route::get('/user/{uid}',function($uid){
    return redirect()->route('userAnswers', $uid);
}) ;
Route::get('/user/{uid}/answers', 'UserController@showAnswers')->name('userAnswers');
Route::get('/user/{uid}/questions', 'UserController@showQuestions');
Route::get('/user/{uid}/watches', 'WatchController@show');
Route::put('/user/{uid}/edit', 'UserController@update');

Route::post('/login', 'LoginController@login');
Route::post('/register', 'RegisterController@register');
Route::get('/logout', 'LoginController@logout');
Route::get('/changepassword', 'LoginController@changeindex');
Route::post('/changepassword', 'LoginController@changepassword');
