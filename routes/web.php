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
Route::resource('tag', 'TagController');
Route::get('/question/{pid}/tag', 'QuestionTagController@index');

Route::get('/question/{qid}/answer/{aid}', 'AnswerController@show');
Route::middleware('auth')->group(function(){
    Route::get('/question/{qid}/answer/', 'AnswerController@create');
    Route::get('/question/{qid}/answer/{aid}/edit', 'AnswerController@edit');
    Route::post('/question/{qid}/answer/', 'AnswerController@store');
    Route::put('/question/{qid}/answer/{aid}', 'AnswerController@update');
    Route::delete('/question/{qid}/answer/{aid}', 'AnswerController@delete');

    Route::post('/question/{qid}/answer/{aid}/comment', 'CommentController@store');
    Route::delete('/question/{qid}/answer/{aid}/comment/{cid}', 'CommentController@delete');

    Route::delete('/answer/{aid}/approve', 'ApproveController@delete');
    Route::post('/answer/{aid}/approve', 'ApproveController@store');

    Route::delete('/question/{pid}/watch', 'WatchController@delete');
    Route::post('/question/{pid}/watch', 'WatchController@store');

    Route::get('/question/{pid}/tag', 'QuestionTagController@index');
    Route::post('/question/{pid}/tag/{tid}', 'QuestionTagController@store');
    Route::delete('/question/{pid}/tag/{tid}', 'QuestionTagController@delete');

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
Route::get('/user/{uid}/followings', 'FollowController@showFollowings');
Route::get('/user/{uid}/followers', 'FollowController@showFollowers');
Route::put('/user/{uid}/edit', 'UserController@update');

Route::get('/login', 'LoginController@index')->name('login');
Route::get('/register', 'RegisterController@index')->name('register');

Route::post('/login', 'LoginController@login');
Route::post('/register', 'RegisterController@register');
Route::get('/logout', 'LoginController@logout');
Route::get('/changepassword', 'LoginController@changeindex');
Route::post('/changepassword', 'LoginController@changepassword');
/*
Route::get('/', 'Home\IndexController@index');
//访问后台首页
Route::get('/admin', 'Admin\IndexController@index');
//访问登录页面
Route::get('/admin/login', 'Admin\LoginController@index');
//登陆的提交动作
//退出
Route::get('/admin/logout', 'Admin\LoginController@logout');
//欢迎界面
Route::get('/admin/welcome', 'Admin\IndexController@welcome');
//前台列表页
Route::get('/list/{id}', 'Home\ListController@category');
Route::get('/list/', 'Home\ListController@index');

//前台文章详情页面
Route::get('/details/{id}.html', 'Home\DetailsController@index');

Route::get('/comments', 'Comments\CommentsController@index');
Route::post('/comments/store', 'Comments\CommentsController@store');
 */



