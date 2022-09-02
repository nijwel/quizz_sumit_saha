<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'App\Http\Controllers\Admin', 'middleware' =>'is_admin','prefix'=>'admin'], function(){

    Route::get('home', 'AdminController@adminHome')->name('admin.home');

    Route::group(['prefix' => 'user'], function() {
        Route::get('/','UserController@index')->name('index.user');
        Route::get('/filter','UserController@indexFilter')->name('index.user.filter');
        Route::get('/details/{id}','UserController@show')->name('view.user');
        Route::get('/edit/{id}','UserController@edit');
        Route::post('/update/{id}','UserController@update')->name('update.user');
        Route::get('/approved/{id}','UserController@approved')->name('approved.user');
        Route::get('/rejected/{id}','UserController@rejected')->name('rejected.user');
        Route::get('/delete/{id}','UserController@destroy')->name('delete.user');
    });


    Route::group(['prefix' => 'quiz'], function() {
        Route::get('/','QuizController@index')->name('index.quiz');
        Route::post('/store','QuizController@store')->name('store.quiz');
        Route::get('/view/{slug}','QuizController@show')->name('view.quiz');
        Route::get('/edit/{id}','QuizController@edit');
        Route::post('/update/{id}','QuizController@update')->name('update.quiz');
        Route::get('/delete/{id}','QuizController@destroy')->name('delete.quiz');
    });

    Route::group(['prefix' => 'question'], function() {
        Route::post('/store','QuestionController@store')->name('store.question');
        Route::get('/edit/{id}','QuestionController@edit');
        Route::post('/update/{id}','QuestionController@update')->name('update.question');
        Route::get('/delete/{id}','QuestionController@destroy')->name('delete.question');
    });

});


Route::group(['namespace'=>'App\Http\Controllers', 'middleware' =>'auth','prefix'=>'user'], function(){

    Route::group(['prefix' => 'quiz'], function() {
        Route::get('/','QuizController@index')->name('index.user.quiz');
        Route::get('/start/{slug}','QuizController@quizStart')->name('quiz.start');
        Route::post('/store','QuizController@store')->name('store.user.quiz');

    });


});
