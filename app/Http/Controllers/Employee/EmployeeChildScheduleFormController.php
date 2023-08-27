<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDetails;
use App\EmployeeDocument;
use App\EmployeeChild;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EmployeeChildScheduleFormController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    public function index( Request $request )
    {	
        $CurrentUser = Auth::user();
        $userId = Auth::id();

        return view('employee.child_schedule', ['CurrentUser' => $CurrentUser, 'faranchise_id' => $request->faranchise_id]);
    }

    public function get_childsschedules( Request $request ){
        $CurrentUser = Auth::user();
        $userId = Auth::id();
        $class_name = $request->class_name;
        return view('employee.child_schedule_listing', ['CurrentUser' => $CurrentUser, 'faranchise_id' => $request->faranchise_id, 'class_name' => $class_name]);
    }

    public function scheduledChildList( Request $request ) 
    {
        return Datatables::of(
            EmployeeChild::select(['childs.*',DB::raw("childs.id, childs.childname")])
                ->where( 'childs.crew', '=', $request->class_name )
                ->where( 'childs.faranchise_id', '=', $request->faranchise_id )
                ->where( 'childs.scheduled', '=', 1 )
        )
        ->addColumn('action', function ($user) {
             $html = '<a href="'.url('/employee/child-schedule/'. $user->faranchise_id .'/'. $user->crew .'/'.$user->id).'" class="btn btn-default waves-effect" target="_self">view</a>';
             return $html;
        })
        ->filterColumn('childname', function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('childs.childname', 'LIKE', "%{$keyword}%");
            });
        })
        ->make(true);
        
    }

     public function unscheduledChildList( Request $request ) 
    {
        return Datatables::of(
            EmployeeChild::select(['childs.*',DB::raw("childs.id, childs.childname")])
                ->where( 'childs.crew', '=', $request->class_name )
                ->where( 'childs.faranchise_id', '=', $request->faranchise_id )
                ->where( 'childs.scheduled', '=', 0 )
        )
        ->addColumn('action', function ($user) {
             $html = '<a href="'.url('/employee/child-schedule/'. $user->faranchise_id .'/'. $user->crew .'/'.$user->id).'" class="btn btn-default waves-effect" target="_self">view</a>';
             return $html;
        })
        ->filterColumn('childname', function($query, $keyword) {
            $query->where('childs.childname', 'LIKE', "%{$keyword}%");
        })
        ->make(true);
        
    }

}
