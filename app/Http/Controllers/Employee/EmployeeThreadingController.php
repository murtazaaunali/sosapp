<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDetails;
use App\EmployeeThread;
use App\ParentTrainingNotes;
use App\ClientProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EmployeeThreadingController extends Controller
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
        $EmployeeDetail = EmployeeDetails::where('employee_id', $CurrentUser->id)->first();
        return view('employee.employee_thread_listing', ['CurrentUser' => $CurrentUser, 'employee_detail' => $EmployeeDetail]);
    }

    public function addthread( Request $request ){

        $employee = new EmployeeThread;

        $employee->faranchise_id = $request->faranchise_id;
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->thread_name;
        $employee->parent_name = $request->parent;

        $EmployeeDetail = Employee::where('id', $request->employee_id)->first();

        $employee->created_by = $EmployeeDetail['name'];
        $employee->save();

        return redirect('/employee/threads');

    }

    public function threadlist( Request $request )
    {
        return Datatables::of(
            EmployeeThread::select(['employee_threads.*',DB::raw("employee_threads.name  AS name , CONCAT(clients_profile.FatherFirstName,' ',clients_profile.FatherLastName) AS parent_name, employee_threads.parent_id, employees.name AS created_by")])->Leftjoin('clients_profile', 'employee_threads.parent_id', '=', 'clients_profile.client_id')->Leftjoin('employees', 'employee_threads.employee_id', '=', 'employees.id')->where( 'employee_threads.faranchise_id', '=', $request->faranchise_id )
        )
        ->filterColumn('name', function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('employee_threads.name', 'LIKE', "%{$keyword}%");
            });
        })
        ->filterColumn('parent_name', function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('employee_threads.parent_name', 'LIKE', "%{$keyword}%");
            });
        })
        ->filterColumn('created_by', function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('employees.name', 'LIKE', "%{$keyword}%");
            });
        })
        ->filterColumn('created_at', function($query, $keyword) {
            $query->where('employee_threads.created_at', '>=', date("Y-m-d 00:00:01",strtotime($keyword)));
        })
        ->addColumn('action', function ($user) {
                 $html = '<a href="'.url('/employee/parent-training-calls/'.$user->id).'" class="btn btn-default waves-effect" target="_blank">view</a>';
                 return $html;
        })
        ->make(true);
    }

    public function training_detail( Request $request ){
        $CurrentUser = Auth::user();
        $userId = Auth::id();

        $training_id = $request->training_id;

        $parent = EmployeeThread::where('id', $training_id)->first();

        $parent_record = ClientProfile::where('client_id', $parent['parent_id'])->first();

        $parent_training_notes = ParentTrainingNotes::where('thread_id', $training_id)->orderBy('thread_row', 'asc')->get();
        return view('employee.parent_training_calls', [ 'CurrentUser' => $CurrentUser, 'training_id' => $training_id, 'parent_training_notes' => $parent_training_notes, 'parent_record' => $parent_record ]);
    }

    public function training_notes_store( Request $request ){

        $training_id = $request->training_id;
        $discussion_title = $request->discussion_title;
        $training_date = $request->training_date;
        $discussion_notes = json_encode($request->discussion_notes);

        $Notes = ParentTrainingNotes::where('thread_id', $training_id)->orderBy('thread_row', 'desc')->first();

        if( $Notes ){
            $lastRow = $Notes['thread_row'];
            $lastRow = $lastRow + 1;
        }else{
            $lastRow = 1;
        }

        $parentNotes = new ParentTrainingNotes;

        $parentNotes->thread_id = $training_id;
        $parentNotes->thread_row = $lastRow;
        $parentNotes->column_name = $discussion_title;
        $parentNotes->column_value = $discussion_notes;
        $parentNotes->training_date = $training_date;
        $parentNotes->save();

        return redirect('/employee/parent-training-calls/'.$training_id);
    }

    public function getSingleNote( Request $request ){
        
        $Notes = ParentTrainingNotes::where( 'thread_row', $request->row_id )->first();

        if($Notes){
            return response()->json(['result' => $Notes], 200);
        }

    }

}
