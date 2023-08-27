<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    //dd($users);

    return view('employee.home');
})->name('home');

Route::get('/home', 'Employee\EmployeeHomeController@index')->name('Home');

Route::get('/employee-list', 'Employee\EmployeeListingController@index')->name('EmployeeListing');
Route::get('/employeelist', 'Employee\EmployeeListingController@employeelist')->name('employeelist');


Route::get('/add-employee', 'Employee\EmployeeFormController@index')->name('AddEmployee');
Route::post('/addemployee', 'Employee\EmployeeFormController@create');
Route::post('/editemployee', 'Employee\EmployeeFormController@update');
Route::get('/edit-profile/{employee_id}', 'Employee\EmployeeFormController@editProfile');
Route::get('/delete-profile/{employee_id}', 'Employee\EmployeeFormController@delete');

Route::get('/emergency-contact', 'Employee\EmergencyContactController@index')->name('EmergencyContact');
Route::post('/employee-emergency-contact-store', 'Employee\EmergencyContactController@create');

Route::get('/employee-performance', 'Employee\EmployeePerformanceController@index')->name('EmployeePerformace');
Route::get('/employee-performance-list', 'Employee\EmployeePerformanceController@employeelist');
Route::get('/employee-performance-record/{id}', 'Employee\EmployeePerformanceController@getEmployeeInformation')->name('GetEmployeeInformation');
Route::get('/employee-performance-record/{id}/{row}', 'Employee\EmployeePerformanceController@getEmployeeInformation')->name('GetEmployeeInformation');
Route::get('/employee-performance-delete/{id}/{row}', 'Employee\EmployeePerformanceController@deleteEmployeeInformation')->name('DeleteEmployeeInformation');
Route::post('/employee-performance-store', 'Employee\EmployeePerformanceController@create');

Route::get('/child-list', 'Employee\EmployeeChildListingController@index')->name('EmployeeChildListing');
Route::get('/employee-child-list', 'Employee\EmployeeChildListingController@employeechildlisting');
Route::get('/add-child', 'Employee\EmployeeChildFormController@index')->name('EmployeeChildForm');
Route::get('/delete-child/{child_id}', 'Employee\EmployeeChildFormController@delete_child');
Route::post('/addchild', 'Employee\EmployeeChildFormController@create');
Route::get('/edit-child/{child_id}', 'Employee\EmployeeChildFormController@index');
Route::get('/autocomplete/{faranchise_id}/{text}','Employee\EmployeeChildFormController@autocomplete');


Route::post('/addparent', 'Employee\EmployeeChildFormController@create_parent');

Route::get('/documents', 'Employee\EmployeeDocumentController@index');
Route::get('/employee-documents/{employee_id}', 'Employee\EmployeeDocumentController@index');
Route::post('/upload-documents', 'Employee\EmployeeDocumentController@upload_document');


Route::get('/class-schedule/{faranchise_id}', 'Employee\EmployeeChildScheduleFormController@index')->name('ChildSchedule');
Route::get('/class-schedule/{faranchise_id}/{class_name}', 'Employee\EmployeeChildScheduleFormController@get_childsschedules')->name('getChildSchedule');
Route::get('/scheduledchildlist/{faranchise_id}/{class_name}', 'Employee\EmployeeChildScheduleFormController@scheduledChildList')->name('childlist');
Route::get('/unscheduledchildlist/{faranchise_id}/{class_name}', 'Employee\EmployeeChildScheduleFormController@unscheduledChildList')->name('unchildlist');

Route::get('/child-schedule/{faranchise_id}/{class_name}/{child_id}', 'Employee\EmployeeSingleScheduleController@index')->name('SingleScheduledChildlist');
Route::get('/getChildSchedules/{faranchise_id}/{class_name}/{child_id}', 'Employee\EmployeeSingleScheduleController@singleScheduledChildList')->name('getSingleScheduledChildlist');
Route::post('/addSchedule', 'Employee\EmployeeSingleScheduleController@addSchedule')->name('AddSchedule');
Route::post('/getSingleSchedule', 'Employee\EmployeeSingleScheduleController@getSingleSchedule')->name('GetSingleSchedule');
Route::post('/editSchedule', 'Employee\EmployeeSingleScheduleController@editSchedule');
Route::get('/delete_schedule/{id}/{class_name}/{faranchise_id}/{child_id}', 'Employee\EmployeeSingleScheduleController@deleteSchedule');
Route::post('/child_bulk_schedule', 'Employee\EmployeeSingleScheduleController@deletebulkSchedule');


Route::get('/threads', 'Employee\EmployeeThreadingController@index')->name('ThreadList');
Route::get('/threadlist/{faranchise_id}/{employee_id}', 'Employee\EmployeeThreadingController@threadlist')->name('ThreadListing');
Route::post('/addthread', 'Employee\EmployeeThreadingController@addthread');
Route::get('/parent-training-calls/{training_id}', 'Employee\EmployeeThreadingController@training_detail')->name('TrainingDetail');
Route::post('/addDiscussion', 'Employee\EmployeeThreadingController@training_notes_store');
Route::post('/getSingleNote', 'Employee\EmployeeThreadingController@getSingleNote');


Route::get('/contacts', 'Employee\ContactsController@get')->name('contacts');
Route::get('/conversation/{id}', 'Employee\ContactsController@getMessagesFor')->name('conversation');
Route::post('/conversation/send', 'Employee\ContactsController@send');

Route::get('/clients', 'Employee\EmployeeClientsController@index')->name('Clients');
Route::post('/remove_client', 'Employee\EmployeeClientsController@remove')->name('Clients');
Route::get('/client/autocomplete/{text}','Employee\EmployeeClientsController@autocomplete');

Route::get('/time-punches',function () {
	return view('employee.time-punches');
});

Route::get('/performance',function () {
	return view('employee.performance');
});


Route::get('/task',function () {
	return view('employee.tasks');
});

Route::get('/trainings',function () {
	return view('employee.trainings');
});

Route::get('/messages',function () {
	return view('employee.messages');
});
