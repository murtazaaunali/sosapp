<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDetails;
use App\EmployeePerformanceSheet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EmployeePerformanceController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
      
    }

    public function index(){	
        $CurrentUser = Auth::user();
        $userId = Auth::id();
        $EmployeeProfile = Employee::where('id', $userId)->first();
        $records = Employee::where('status', 1)
                   ->orderBy('name', 'asc')
                   ->get();
        return view('employee.employee_performance', ['CurrentUser' => $CurrentUser, 'EmployeeProfile' => $EmployeeProfile, 'Records' => $records]);
    }

    public function getEmployeeInformation(Request $request){
        $employee_id = $request->id;
        
        $record = EmployeeDetails::where('employee_id', $employee_id)->first();
        $results = EmployeePerformanceSheet::where('emp_id',$employee_id)
                   ->orderBy('date', 'asc')
                   ->get();
        if( isset($request->row) ){
            $action = '<button type="submit" class="btn btn-success" name="update" value="'. $request->row .'">Update Performance</button>';
            $edit_record = EmployeePerformanceSheet::where('id',$request->row)->first();
            return view('employee.employee_performance_history', ['employee_id' => $employee_id, 'employee' => $record, 'results' => $results, 'edit_record' => $edit_record, 'action' => $action]);
        }else{
            $action = '<button type="submit" class="btn btn-success" name="add" value="add">Add Performance</button>';
            return view('employee.employee_performance_history', ['employee_id' => $employee_id, 'employee' => $record, 'results' => $results, 'action' => $action]);  
        }  
    }

    public function deleteEmployeeInformation(Request $request){
        EmployeePerformanceSheet::where('id', $request->row)->delete();
        return redirect('/employee/employee-performance-record/'.$request->id)->with('success', "Record is deleted successfully");
    }
    

    public function create(Request $request)
    {
        if( isset($request->add) ){

            $employeesheet = new EmployeePerformanceSheet;
            $employeesheet->emp_id = $request->employee_id;
            $employeesheet->date = $request->date;
            $employeesheet->event = $request->event;
            $employeesheet->comment = $request->comments;
            $employeesheet->color = $request->color;
            $employeesheet->save();

            return redirect('/employee/employee-performance-record/'.$request->employee_id)->with('success', "Record is Added successfully");

        }elseif( isset($request->update) ){

            EmployeePerformanceSheet::where('id', $request->update)
                                      ->update(['date' => $request->date,'event' => $request->event, 'comment' => $request->comments, 'color' => $request->color]);
            return redirect('/employee/employee-performance-record/'.$request->employee_id)->with('success', "Record is Updated successfully");
        }

        
    }

    public function employeelist(Request $request){
        $userId = Auth::id();
        $EmployeeProfile = EmployeeDetails::where('employee_id', $userId)->first();

        return Datatables::of(
            Employee::select(['employees.*',DB::raw("employees.name, employees.email")])
                ->join('employee_details', 'employees.id', '=', 'employee_details.employee_id')
                ->where('employee_details.faranchise_id', '=', $EmployeeProfile->faranchise_id)
                ->where('employees.id', '!=', $userId)
                ->where('employees.status', '=', 1)
        )
        ->filterColumn('name', function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            });
        })
        ->filterColumn('email', function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('email', 'LIKE', "%{$keyword}%");
            });
        })
        ->addColumn('action', function ($user) {
                 $html = '<a href="/employee/employee-performance-record/'.$user->id.'">View Record</a>';
                 return $html;
        })
        ->make(true);
    }
}
