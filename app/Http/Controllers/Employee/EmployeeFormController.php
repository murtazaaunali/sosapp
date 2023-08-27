<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeeFormController extends Controller
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
        $EmployeeProfileInfo = EmployeeDetails::where('employee_id', $CurrentUser->id)->first();
        return view('employee.employee_form', ['CurrentUser' => $CurrentUser, 'EmployeeProfile' => $EmployeeProfile, 'EmployeeProfileInfo' => $EmployeeProfileInfo]);
    }

    public function create(Request $request)
    {
        $CurrentUser = Auth::user();
        $employeeid = $CurrentUser->id;

        $validation = Validator::make($request->all(),[
            'password'                  => 'required',
            'email'                     => 'required',
            'status'                    => 'required',
            'faranchise_id'             => 'required',
            'firstname'                 => 'required',
            'lastname'                  => 'required',
            'dob'                       => 'required',
            'job_title'                 => 'required',
            'crew'                      => 'required',
            'dateemploymentStarted'     => 'required',
            'dateprobation'             => 'required',
            'initalpayrate'             => 'required',
            'currentpayrate'            => 'required',
            'insuranceplan'             => 'required',
            'retirementplan'            => 'required',
            'allowedpaidvacations'      => 'required',
            'remainingpaidbalance'      => 'required',
            'sickdaysallowed'           => 'required',
            'balancesickdays'           => 'required',
            'profilepicture'            => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if ($validation->fails()) {
            return view('employee.employee_form', ['errors' => $validation->errors()->all()]);
        }

        $employee = new Employee;

        $employee->name = $request->firstname." ".$request->lastname;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);

        //Uploading image 
        $imageName = $request->file('profilepicture')->getClientOriginalName();
        $path = base_path() . '/public/employee_images/';
        $request->file('profilepicture')->move($path,$imageName);
        $employee->picture = $imageName;

        $employee->created_at = date('Y-m-d H:i:s');
        $employee->updated_at = date('Y-m-d H:i:s');
        $employee->status = $request->status;
        $employee->save();

        $employeeDetails = new EmployeeDetails;

        $employeeDetails->faranchise_id = $request->faranchise_id;
        $employeeDetails->employee_id = $employee->id;
        $employeeDetails->firstname = $request->firstname;
        $employeeDetails->middlename = $request->middlename;
        $employeeDetails->lastname = $request->lastname;
        $employeeDetails->dob = $request->dob;
        $employeeDetails->job_title = $request->job_title;

        $employeeDetails->crew = $request->crew;
        $employeeDetails->dateemploymentStarted = $request->dateemploymentStarted;
        $employeeDetails->dateprobation = $request->dateprobation;
        $employeeDetails->initalpayrate = $request->initalpayrate;
        $employeeDetails->currentpayrate = $request->currentpayrate;
        $employeeDetails->insuranceplan = $request->insuranceplan;

        $employeeDetails->retirementplan = $request->retirementplan;
        $employeeDetails->allowedpaidvacations = $request->allowedpaidvacations;
        $employeeDetails->remainingpaidbalance = $request->remainingpaidbalance;
        $employeeDetails->sickdaysallowed = $request->sickdaysallowed;
        $employeeDetails->balancesickdays = $request->balancesickdays;

        $employeeDetails->save();
    
        return redirect('/employee/employee-list')->with('success', "Record is Added successfully");
    }

    public function editProfile( Request $request ){
        $CurrentUser = Auth::user();
        $userId = Auth::id();

        $records = Employee::where('id', $request->employee_id)->first();
        $record = EmployeeDetails::where('employee_id', $request->employee_id)->first();
        $formURL = "/employee/editemployee/";
        return view('employee.employee_form', ['CurrentUser' => $CurrentUser, 'records' => $records, 'record' => $record, 'formURL' => $formURL]);
    }

    public function update(Request $request)
    {
        $CurrentUser = Auth::user();
        $employeeid = $CurrentUser->id;

        $validation = Validator::make($request->all(),[
            'status'                    => 'required',
            'faranchise_id'             => 'required',
            'firstname'                 => 'required',
            'lastname'                  => 'required',
            'dob'                       => 'required',
            'job_title'                 => 'required',
            'crew'                      => 'required',
            'dateemploymentStarted'     => 'required',
            'dateprobation'             => 'required',
            'initalpayrate'             => 'required',
            'currentpayrate'            => 'required',
            'insuranceplan'             => 'required',
            'retirementplan'            => 'required',
            'allowedpaidvacations'      => 'required',
            'remainingpaidbalance'      => 'required',
            'sickdaysallowed'           => 'required',
            'balancesickdays'           => 'required',
            'profilepicture'            => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if ($validation->fails()) {
            return view('employee.employee_form', ['errors' => $validation->errors()->all()]);
        }

        $name = $request->firstname." ".$request->lastname;
        $email = $request->email;
        $password = bcrypt($request->password);

        if( !empty($request->file('profilepicture')) ){
            //Uploading image 
            $imageName = $request->file('profilepicture')->getClientOriginalName();
            $path = base_path() . '/public/employee_images/';
            $request->file('profilepicture')->move($path,$imageName);

            Employee::where('id', $request->employee_id)
                       ->update(['picture' => $imageName]);
        }
        
        // Employee::where('id', $request->employee_id)
        //                ->update(['status' => $request->status, 'name' => $name, 'email' => $email, 'password' => $password]);

        Employee::where('id', $request->employee_id)
                       ->update(['status' => $request->status, 'name' => $name]);

        EmployeeDetails::where('employee_id', $request->employee_id)
                       ->update(['firstname' => $request->firstname,'middlename' => $request->middlename, 'lastname' => $request->lastname, 'dob' => $request->dob, 'job_title' => $request->job_title, 'crew' => $request->crew, 'dateemploymentStarted' => $request->dateemploymentStarted, 'dateprobation' => $request->dateprobation, 'initalpayrate' => $request->initalpayrate, 'currentpayrate' => $request->currentpayrate, 'insuranceplan' => $request->insuranceplan, 'retirementplan' => $request->retirementplan, 'allowedpaidvacations' => $request->allowedpaidvacations, 'remainingpaidbalance' => $request->remainingpaidbalance, 'sickdaysallowed' => $request->sickdaysallowed, 'balancesickdays' => $request->balancesickdays]);

        return redirect('/employee/employee-list')->with('success', "Record is updated successfully");
    }

    public function delete(Request $request){
        Employee::where('id', $request->employee_id)->delete();
        EmployeeDetails::where('employee_id', $request->employee_id)->delete();
        return redirect('/employee/employee-list')->with('success', "Record is deleted successfully");
    }

}
