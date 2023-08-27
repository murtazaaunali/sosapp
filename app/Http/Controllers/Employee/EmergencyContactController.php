<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeEmergencyContact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EmergencyContactController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    public function index()
    {	
        $CurrentUser = Auth::user();
        $EmployeeProfile = Employee::where('id', $CurrentUser->id)->first();

        $userId = Auth::id();
        $employee = new EmployeeEmergencyContact;
        $result = EmployeeEmergencyContact::where('emp_id', $userId)->first();
        if( !empty($result) ){
            $rows = json_decode($result->employee_contact);
        }
        else{
            $rows = "";
        }

        return view('employee.emergency_contact', ['CurrentUser' => $CurrentUser, 'EmployeeProfile' => $EmployeeProfile, "rows" => $rows]); 

        
    }

    public function create(Request $request)
    {
        $CurrentUser = Auth::user();
        $employeeid = $CurrentUser->id;
        $userId = Auth::id();

        $deletedRows = EmployeeEmergencyContact::where('emp_id', $userId)->delete();

        $employee = new EmployeeEmergencyContact;

        $employee->emp_id = $userId;
        $employee->employee_contact = json_encode($request->emergency_contact);
        $employee->save();

        return redirect('/employee/emergency-contact');
    }
}
