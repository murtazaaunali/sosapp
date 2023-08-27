<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('franchisee')->user();

    //dd($users);

    return view('franchisee.home');
})->name('home');


// Route::get('/add-employee', 'Franchisee\EmployeeController@index');
// Route::post('/add-employee', 'Franchisee\EmployeeController@addEmployee')->name('addEmployee');
