<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDetails;
use App\EmployeeDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EmployeeListingController extends Controller
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
        $userId = Auth::id();

        return view('employee.employee_listing', ['CurrentUser' => $CurrentUser]);
    }

    public function employeelist()
    {
        $userId = Auth::id();
        $EmployeeProfile = EmployeeDetails::where('employee_id', $userId)->first();

        return Datatables::of(
            Employee::select(['employees.*',DB::raw("employees.name , employee_details.job_title")])
                ->Leftjoin('employee_details', 'employee_details.employee_id', '=', 'employees.id')
                ->where('employee_details.faranchise_id', '=', $EmployeeProfile->faranchise_id)
                ->where('employees.id', '!=', $userId)
        )
        ->filterColumn('fullname', function($query, $keyword) {
            $query->where('employees.name', 'LIKE', "%{$keyword}%");
        })
        ->filterColumn('job_title', function($query, $keyword) {
            $query->where('employee_details.job_title', 'LIKE', "%{$keyword}%");
        })
        ->filterColumn('created_at', function($query, $keyword) {
            $query->where('employees.created_at', '>=', date("d F, Y",strtotime($keyword)));
        })
        ->addColumn('created_at', function ($user) {
            $html = date("d F, Y", strtotime($user->created_at));
            return $html;
        })
        ->addColumn('created_at', function ($user) { 
                $html = date("d F, Y", strtotime($user->created_at));
                return $html;
        })  
        ->addColumn('action', function ($user) {
                 $html = '<a href="'.url('/employee/employee-documents/'.$user->id).'" class="c-btn c-btn--info" target="_self"><i class="x-upload u-mr-xsmall"></i> Upload Documents</a>';
                 $html .= '<a href="'.url('/employee/edit-profile/'.$user->id).'" class="c-btn c-btn--info editPro" target="_self"><i class="x-pencil u-mr-xsmall"></i> Edit Profile</a>';
                 $html .= '<a href="'.url('/employee/delete-profile/'.$user->id).'" class="c-btn c-btn--info editPro"><i class="x-pencil u-mr-xsmall"></i> Delete Profile</a>';
                 return $html;
        })
        ->make(true);     
    }

}
