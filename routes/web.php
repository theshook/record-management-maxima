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
Route::post('/send/{routeNotificationForSemaphore}', 'WelcomeController@routeNotificationForSemaphore');
Route::get('/', 'WelcomeController@index');
Route::get('apply-for-assessment', 'WelcomeController@apply')->name('apply-assessment');
Route::post('apply-for-assessment', 'WelcomeController@apply_store')->name('apply-assessment-store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoryController');
Route::resource('news', 'NewsController');

Route::resource('qualifications', 'QualificationController');
Route::get('getqualification', 'QualificationController@getQualifications')->name('get.qualification');

Route::get('courseRegistered', 'QualificationController@courseRegistered')->name('courseRegistered');
Route::get('course/{qualification}', 'QualificationController@showCourses')->name('show_courses');

Route::resource('schedule', 'SchedulesController');

Route::get('schedule/create/{qualification}', 'SchedulesController@scheduleAssessor')->name('schedule.assessor');
Route::get('schedule/show/students', 'SchedulesController@showStudents')->name('schedule.students');
Route::any('schedule/show/students/search', 'SchedulesController@searchStudents')->name('schedule.search.students');
Route::get('schedule/{schedule}/{assessor}', 'SchedulesController@show')->name('schedule.showList');
Route::any('schedule/{schedule}/{assessor}/search', 'SchedulesController@search')->name('schedule.search');
Route::post('schedule/addstudents', 'SchedulesController@addStudents')->name('schedule.addstudents');
Route::put('schedule/removestudents/{applicant}', 'SchedulesController@removeStudents')->name('schedule.removestudents');

Route::resource('applicants', 'ApplicantController');
Route::any('applicants/search', 'ApplicantController@searchApplicants')->name('applicants.search');
Route::get('applicants/print/{applicant}', 'ApplicantController@printApplicants')->name('applicants.print');

Route::resource('feedback', 'FeedbackController');
Route::any('feedback/search', 'FeedbackController@search')->name('feedback.search');

Route::resource('verification', 'VerificationController');
Route::any('verification/search', 'VerificationController@search')->name('verification.search');

Route::resource('request', 'RequestCertificateController');
Route::resource('student', 'StudentController');
Route::any('student/search', 'StudentController@search')->name('student.search');
Route::resource('assessor', 'AssessorController');

Route::get('certificate', 'CertificateController@print_certificate_index')->name('print_certificate_index');
Route::any('certificate/search', 'CertificateController@print_certificate_search')->name('print_certificate_search');
Route::get('certificate/{requestCertificate}/show', 'CertificateController@showCertificate')->name('cert.show');
Route::get('certificate/{requestCertificate}/print', 'CertificateController@printCertificate')->name('cert.print');

Route::resource('/users', 'UsersController');
Route::any('/users/search', 'UsersController@search')->name('users.search');

Route::resource('/print', 'PrintCertificateController');
Route::get('/print/qualification/{qualification}', 'PrintCertificateController@addCocQualifications')->name('add.coc');
Route::get('/print/students/status', 'PrintCertificateController@certificateStatus')->name('certificate.status');
Route::any('/print/students/status/search', 'PrintCertificateController@certificateStatusSearch')->name('certificate.status.search');
Route::post('/print/storecoc', 'PrintCertificateController@storeCocQualifications')->name('save.coc');
Route::get('/print/coc/{print}/edit', 'PrintCertificateController@editCoc')->name('coc.edit');
Route::put('/print/coc/{print}/update', 'PrintCertificateController@updateCoc')->name('coc.update');
Route::delete('/print/coc/{print}/delete', 'PrintCertificateController@deleteCoc')->name('coc.delete');
Route::any('/print/coc/search/{qualification}', 'PrintCertificateController@searchCoc')->name('search.coc');
// Route::middleware(['auth'])->group(function () {
//     Route::get('/home', 'HomeController@index')->name('home');
//     Route::resource('categories', 'CategoryController');
//     Route::resource('/news', 'NewsController');
// });
