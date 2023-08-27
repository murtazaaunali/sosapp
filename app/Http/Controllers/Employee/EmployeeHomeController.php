<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeHomeController extends Controller
{
    public function index()
    {
        $CurrentUser = Auth::user();
        $EmployeeData = Employee::where('id', $CurrentUser->id)->first();
        $EmployeeProfile = EmployeeDetails::where('employee_id', $CurrentUser->id)->first();
        return view('employee.home', ['CurrentUser' => $CurrentUser, 'EmployeeData' => $EmployeeData, 'EmployeeProfile' => $EmployeeProfile]);
    }
}
