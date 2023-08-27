<?php

Route::get('/home', 'Client\ProfileController@index')->name('home');

Route::get('/parent-dashboard', 'Client\ProfileController@index')->name('ParentDashboard');

Route::get('/client-preauthorization', function () {
    return view('client.preauthorization');
});

// Insurance Routes
Route::get('/insurance', 'Client\InsuranceController@index');

Route::post('/insurance/displaydata', 'Client\InsuranceController@index');
Route::get('/insurance/displaydata', 'Client\InsuranceController@index');

Route::post('/insurance/addinsurance', 'Client\InsuranceController@create');
Route::get('/insurance/addinsurance', 'Client\InsuranceController@create');

Route::get('/insurance/show/{id}', [
    'uses' => 'Client\InsuranceController@retreive',
])->name('insurance.show')->middleware('signed');

Route::post('/insurance/updateinsurance', 'Client\InsuranceController@update');
Route::get('/insurance/updateinsurance', 'Client\InsuranceController@update');

Route::post('/insurance/deleteinsurance', 'Client\InsuranceController@delete');
Route::get('/insurance/deleteinsurance', 'Client\InsuranceController@delete');

// Profile Routes

Route::post('/profile/addassignedpickup', 'Client\ProfileController@add_assigned_pickups');
Route::get('/profile/addassignedpickup', 'Client\ProfileController@add_assigned_pickups');

Route::post('/profile/saveassignedpickup', 'Client\ProfileController@save_assigned_pickups');
Route::get('/profile/saveassignedpickup', 'Client\ProfileController@save_assigned_pickups');

Route::get('/profile/editassignedpickup/{id}', [
    'uses' => 'Client\ProfileController@edit_assigned_pickups',
])->name('profile.editassignedpickup')->middleware('signed');

Route::get('/profile/deleteassignedpickup/{id}', [
    'uses' => 'Client\ProfileController@delete_assigned_pickup',
])->name('profile.deleteassignedpickup')->middleware('signed');

// Documents Route
Route::get('/documents', function () {
    return view('client.documents');
});

Route::get('/documents', 'Client\DocumentController@index');
Route::post('/documents', 'Client\DocumentController@index');

Route::get('/documents/upload', 'Client\DocumentController@upload_document');
Route::post('/documents/upload', 'Client\DocumentController@upload_document');

Route::get('/reports', function () {
    return view('client.reports');
});

Route::get('/trainings', function () {
    return view('client.trainings');
});

Route::get('/schedule', 'Client\ScheduleController@index');
Route::post('/schedule', 'Client\ScheduleController@index');

Route::get('/messages', function () {
    return view('client.messages');
});
