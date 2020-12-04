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
    return view('welcome');
});

Route::get('/profile', 'ProfileController@show')->name('profile.show');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile/edit', 'ProfileController@update')->name('profile.update');

Route::get('/courses', 'CourseController@index')->name('courses.index');
Route::get('/student/courses', 'CourseController@studentCourses')->name('student.course');
Route::post('/courses/withdraw', 'CourseController@withdraw')->name('course.withdraw');
Route::post('/courses/enroll', 'CourseController@enroll')->name('course.enroll');
Route::get('/instructor/courses', 'CourseController@instructorCourses')->name('instructor.course');
Route::get('/courses/students', 'CourseController@enrolledStudents')->name('course.students');
Route::post('/courses/grade', 'CourseController@grade')->name('course.grade');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
