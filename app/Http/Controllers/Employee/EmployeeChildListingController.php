<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDetails;
use App\EmployeeChild;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class EmployeeChildListingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
      
    }

    public function index(Request $request){    
        $CurrentUser = Auth::user();
        $userId = Auth::id();
        $EmployeeProfile = EmployeeDetails::where('employee_id', $userId)->first();
        return view('employee.employee_child_listing', ['CurrentUser' => $CurrentUser, 'EmployeeProfile' => $EmployeeProfile]);
    }

    public function employeechildlisting(Request $request){
        $userId = Auth::id();
        $EmployeeProfile = EmployeeDetails::where('employee_id', $userId)->first();

        return Datatables::of(
            EmployeeChild::select(['childs.*',DB::raw("childname, crew, date_of_birth, created_at, status")])
            ->where('faranchise_id', $EmployeeProfile->faranchise_id)
        )
        ->filterColumn('childname', function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('childname', 'LIKE', "%{$keyword}%");
            });
        })
        ->filterColumn('crew', function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('crew', 'LIKE', "%{$keyword}%");
            });
        })
        ->filterColumn('date_of_birth', function($query, $keyword) {
            $query->where(function ($query) use($keyword) {
                $query->where('date_of_birth', 'LIKE', "%{$keyword}%");
            });
        })
        ->addColumn('date_of_birth', function ($user) { 
                $html = date("d F, Y", strtotime($user->date_of_birth));
                return $html;
        })  
        ->addColumn('created_at', function ($user) { 
                $html = date("d F, Y", strtotime($user->created_at));
                return $html;
        })
        ->addColumn('status', function ($user) {
                if( $user->status == 1 ){
                    $html = 'Active';
                }else{
                    $html = 'Inactive';
                }
                return $html;
        })
        ->addColumn('action', function ($user) {
                 $html = '<a href="/employee/edit-child/'.$user->id.'" class="c-btn c-btn--info editPro">Edit Profile</a>';
                 $html .= '<a href="/employee/delete-child/'.$user->id.'" class="c-btn c-btn--info editPro">Delete Profile</a>';
                 return $html;
        })
        ->make(true);

    }
    
}
