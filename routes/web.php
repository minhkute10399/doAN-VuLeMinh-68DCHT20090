<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::group(['middleware' => ['localization']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::group(['middleware' => ['admin']], function () {
        Route::resource('/admin', 'AdminController');
        Route::get('/dashboard', 'AdminController@countDashboard')->name('dashboard');
        Route::get('/adminLesson/{id}', 'LessonController@detailLessonAdminCheck')->name('adminLesson');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/manageUser', 'UserController');
        Route::get('/blacklistUser', 'UserController@getBlackListUser')->name('blacklistUser');
        Route::get('searchAccount', 'UserController@searchAccountAdmin')->name('searchAccount');
        Route::get('searchCourse', 'CourseController@searchCourseAdmin')->name('searchCourse');
    });
    Route::get('/changeLanguage/{language}', 'HomeController@changeLanguage')->name('change-language');
    Route::resource('home', 'ClientController');
    Auth::routes();
    Route::resource('/manageCourse', 'CourseController');
    Route::get('/allCourses', 'ClientController@viewAllCourses')->name('allCourses');
    Route::get('singleCourse/{id}', 'ClientController@showSingleCourse')->name('singleCourse');
    Route::resource('/comment', 'CommentController');
    Route::get('/videoLesson/{id}', 'LessonController@showVideoLesson')->name('video');
    Route::resource('/lessons', 'LessonController');
    Route::resource('/profile', 'ProfileController');
    Route::get('email', 'ProfileController@showEmail')->name('email');
    Route::patch('updateEmail/{id}', 'ProfileController@updateEmailUser')->name('update');
    Route::get('chart', 'ProfileController@getDataUserChart')->name('chart');
    Route::get('courses', 'ProfileController@manageCourseByTeacher')->name('courses');
    Route::put('updateCourse/{id}', 'ProfileController@updateCoursebyTeacher')->name('updateCourse');
    Route::post('addLesson', 'ProfileController@addLessonByTeacher')->name('addLesson');
    Route::delete('destroyLesson/{id}', 'ProfileController@destroyLesson')->name('destroyLesson');
    Route::put('updateLesson/{id}', 'ProfileController@updateLesson')->name('updateLesson');
    Route::get('exercises/{id}', 'ProfileController@showExerciseByTeacher')->name('exercises');
    Route::post('addExercise', 'ProfileController@addExerciseByTeacher')->name('addexercise');
    Route::resource('sendExercise', 'ExerciseController');
    Route::get('search', 'ClientController@searchCourse')->name('search');
    Route::get('viewCategory/{id}', 'ClientController@viewCategory')->name('subject');
    Route::get('teachers', 'ClientController@allTeacher')->name('teachers');
    Route::post('searchTeacher', 'ClientController@searchTeacher')->name('searchTeacher');
    Route::get('current-user', 'CommentController@getCurrentUser')->name('currentUser');
    // Route::get('detailManageCourse/{id}', 'ProfileController');
});
Auth::routes();

