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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes(
    [
        'register' => false,
        'reset' => false,
        'verify' => false
    ]
);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/quiz/{quizId}','ExamController@getQuizQuestions')->middleware('auth');
Route::post('user/quiz/create','ExamController@postQuiz')->middleware('auth');
Route::get('/result/user/{userid}/quiz/{quizid}','ExamController@viewResult')->middleware('auth');
Route::group(['middleware'=>'isAdmin'],function(){
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('quiz','QuizController');
    Route::resource('question','QuestionController');
    Route::resource('user','UserController');
    Route::get('quiz/{id}/question','QuizController@question')->name('quiz.question');
    Route::get('exam/create','ExamController@create')->name('exam.create');
    Route::POST('exam/store','ExamController@store')->name('exam.store');
    Route::get('exam/user','ExamController@userExam')->name('view.exam');
    Route::POST('exam/remove','ExamController@removeExam')->name('exam.remove');
});
