<?php

Route::get('/', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    return view('admin.dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/profile', 'Admin\UserController@Profile');
Route::post('/profile', 'Admin\UserController@Profile');

Route::get('/save_profile', 'Admin\UserController@SaveProfile');
Route::post('/save_profile', 'Admin\UserController@SaveProfile');

Route::get('/franchise/addtask', 'Admin\FranchiseController@CreateTask');
Route::post('/franchise/addtask', 'Admin\FranchiseController@CreateTask');

Route::get('/franchise/show/{id}', [
    'uses' => 'Admin\FranchiseController@ViewFranchise',
])->name('franchise.show')->middleware('signed');

Route::get('/franchise/save', 'Admin\FranchiseController@CreateNewFranchise');
Route::post('/franchise/save', 'Admin\FranchiseController@CreateNewFranchise');

Route::get('/documents', 'Admin\DocumentController@index');
Route::post('/documents', 'Admin\DocumentController@index');

Route::get('/documents/upload', 'Admin\DocumentController@upload_document');
Route::post('/documents/upload', 'Admin\DocumentController@upload_document');

Route::get('/franchisee', function () {
    return view('admin.franchisee');
});

Route::get('/reports', function () {
    return view('admin.reports');
});

Route::get('/schedule', function () {
    return view('admin.schedule');
});

Route::get('/trainings', function () {
    return view('admin.trainings');
});

Route::get('/tasks', function () {
    return view('admin.tasks');
});

// Admin/Franchises Routes

Route::get('/franchises', 'Admin\FranchiseController@ViewAllFranchises');

Route::get('/franchises/create', function () {
    return view('admin.create_franchise');
});

// Route::get('/franchises/create', 'Admin\FranchiseController@CreateNewFranchise');
Route::post('/franchises/create', 'Admin\FranchiseController@CreateNewFranchise');

Route::get('/franchisees', 'Admin\FranchiseController@ViewAllFranchisees');

Route::get('/franchisees/create', 'Admin\FranchiseController@CreateNewFranchisee');
Route::post('/franchisees/create', 'Admin\FranchiseController@CreateNewFranchisee');

Route::get('/franchisees/create', 'Admin\FranchiseController@CreateNewFranchisee');
Route::post('/franchisees/create', 'Admin\FranchiseController@CreateNewFranchisee');
