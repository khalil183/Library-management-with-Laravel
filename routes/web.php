<?php

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();
Route::get('admin-logout','Auth\LoginController@adminLogout');

Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('student-register','StudentController@create');
Route::post('student-register','StudentController@store')->name('store.student.reg');

Route::resource('category','CategoryController');
Route::resource('book','BookController');
Route::resource('issue-book', 'IssueBookController');
Route::get('all-issue-book','IssueBookController@allIssueBook');
Route::get('/approved-issue/{id}','IssueBookController@approvedIssueBook');
Route::get('/return-book','IssueBookController@returnBook')->name('return.book');
Route::get('/return-issue-book/{id}','IssueBookController@returnIssueBook');


// Student Section

Route::get('add-issue/{id}','StudentController@addIssue')->name('add.issue');
Route::get('my-issued-book','StudentController@myIssuedBook')->name('my.issued.book');


Route::get('data',function(){
    return view('data.index');
});
