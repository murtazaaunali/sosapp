<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDetails;
use App\EmployeeDocument;
use App\EmployeeChild;
use App\EmployeeChildSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\UrlGenerator;

class EmployeeSingleScheduleController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index( Request $request ){	
        $CurrentUser = Auth::user();
        $userId = Auth::id();
        
        
        $ChildProfile = EmployeeChild::where('id', $request->child_id)->first();

        return view('employee.child_scheduling', ['CurrentUser' => $CurrentUser, 'faranchise_id' => $request->faranchise_id, 'class_name' => $request->class_name, 'child_id' => $request->child_id, 'child_name' => $ChildProfile['childname']]);
    }

    public function singleScheduledChildList( Request $request ) 
    {
        return Datatables::of(
            EmployeeChildSchedule::select(['child_scheduling.*',DB::raw("child_scheduling.schedule, child_scheduling.time_in, child_scheduling.time_out")])->where( 'child_scheduling.class_name', '=', $request->class_name )->where( 'child_scheduling.faranchise_id', '=', $request->faranchise_id )->where( 'child_scheduling.child_id', '=', $request->child_id )
        )
        ->filterColumn('day', function($query, $keyword) {
            $query->where('child_scheduling.day', 'LIKE', "%{$keyword}%");
        })
        ->addColumn('schedule', function ($user) { 
                $html = date("d F, Y", strtotime($user->schedule));
                return $html;
        })
        ->addColumn('day', function ($user) { 
                $html = date("l", strtotime($user->schedule));
                return $html;
        })
        ->addColumn('time_in', function ($user) { 
                date_default_timezone_set("America/New_York");
                $html = date("h:i:s a", strtotime($user->time_in));
                return $html;
        })
        ->addColumn('time_out', function ($user) { 
                date_default_timezone_set("America/New_York");
                $html = date("h:i:s a", strtotime($user->time_out));
                return $html;
        })
        ->addColumn('action', function ($user) {
             $html = '<a href="javascript:void(0);" class="btn btn-default waves-effect schedule-edit" data-faranchise = "'.$user->faranchise_id.'" data-crew = "'.$user->class_name.'" data-id = "'.$user->id.'">Edit</a>';
             $html .= '<a href="'.url("employee/delete_schedule/".$user->id."/".$user->class_name."/".$user->faranchise_id."/".$user->child_id).'" class="btn btn-default waves-effect">Delete</a>';
             return $html;
        })
        ->make(true);   
    }

    public function deleteSchedule( Request $request ){
        EmployeeChildSchedule::where('id', $request->id)->delete();
        return redirect('/employee/child-schedule/'.$request->faranchise_id.'/'.$request->class_name.'/'.$request->child_id)->with('success', "Record is deleted successfully");
    }

    public function deletebulkSchedule( Request $request ){
        $row_ids = $request->row_ids;

        foreach ($row_ids as $key => $row_id) {
            EmployeeChildSchedule::where('id', $row_id)->delete();
        }

        return response()->json(['result' => 'success'], 200);
    }

    public function addSchedule( Request $request ){
        $CurrentUser = Auth::user();

        $child = new EmployeeChildSchedule;

        $dateStart = date('j', strtotime($request->schedule_start));
        $dateEnd = date('j', strtotime($request->schedule_end));
        $diff=date_diff(date_create($request->schedule_start),date_create($request->schedule_end));
        $numberOfDays = (int)$diff->format("%a");

        $date = $request->schedule_start;
        $temp = array();

        for( $i = 0 ; $i <= $numberOfDays ; $i++ ){

            $day = date('l', strtotime($date));
            $checkRecord = EmployeeChildSchedule::where('schedule', '=', $date)->where('faranchise_id', '=', $request->faranchise_id)->where('child_id', '=', $request->child_id)->where('class_name', '=', $request->class_name)->first();

            if ( $checkRecord != null ) {
                if( $day == "Monday" ){
                    $child_time_in =    $request->mon_timein;
                    $child_time_out =   $request->mon_timeout;
                }else if( $day == "Tuesday" ){
                    $child_time_in =    $request->tue_timein;
                    $child_time_out =   $request->tue_timeout;
                }else if( $day == "Wednesday" ){
                    $child_time_in =    $request->wed_timein;
                    $child_time_out =   $request->wed_timeout;
                }else if( $day == "Thursday" ){
                    $child_time_in =    $request->thurs_timein;
                    $child_time_out =   $request->thurs_timeout;
                }else if( $day == "Friday" ){
                    $child_time_in =    $request->fri_timein;
                    $child_time_out =   $request->fri_timeout;
                }else if( $day == "Saturday" ){
                    $child_time_in =    $request->sat_timein;
                    $child_time_out =   $request->sat_timeout;
                }else if( $day == "Sunday" ){
                    $child_time_in =    $request->sun_timein;
                    $child_time_out =   $request->sun_timeout;
                }

                EmployeeChildSchedule::where('id', $checkRecord['id'])
                    ->where('class_name', $request->class_name)
                    ->where('faranchise_id', $request->faranchise_id)
                    ->where('child_id', $request->child_id)
                    ->update(['schedule' => $date, 'day' => $day, 'time_in' => $child_time_in, 'time_out' => $child_time_out]);
            }else{
                $day = date('l', strtotime($date));
                if( $day == "Monday" ){
                    if( !empty($request->mon_timein) && !empty($request->mon_timeout) ){
                        $child_time_in =    $request->mon_timein;
                        $child_time_out =   $request->mon_timeout;
                        $temp[] = array(
                        'faranchise_id' => $request->faranchise_id,
                        'class_name' => $request->class_name,
                        'child_id' => $request->child_id,
                        'schedule' => $date,
                        'day' => $day,
                        'time_in' => $child_time_in,
                        'time_out' => $child_time_out
                         );
                    }  
                }else if( $day == "Tuesday" ){
                    if( !empty($request->tue_timein) && !empty($request->tue_timeout) ){
                        $child_time_in =    $request->tue_timein;
                        $child_time_out =   $request->tue_timeout;
                        $temp[] = array(
                        'faranchise_id' => $request->faranchise_id,
                        'class_name' => $request->class_name,
                        'child_id' => $request->child_id,
                        'schedule' => $date,
                        'day' => $day,
                        'time_in' => $child_time_in,
                        'time_out' => $child_time_out
                         );
                    }
                }else if( $day == "Wednesday" ){
                    if( !empty($request->wed_timein) && !empty($request->wed_timeout) ){
                        $child_time_in =    $request->wed_timein;
                        $child_time_out =   $request->wed_timeout;
                        $temp[] = array(
                        'faranchise_id' => $request->faranchise_id,
                        'class_name' => $request->class_name,
                        'child_id' => $request->child_id,
                        'schedule' => $date,
                        'day' => $day,
                        'time_in' => $child_time_in,
                        'time_out' => $child_time_out
                         );
                    }
                }else if( $day == "Thursday" ){
                    if( !empty($request->thurs_timein) && !empty($request->thurs_timeout) ){
                        $child_time_in =    $request->thurs_timein;
                        $child_time_out =   $request->thurs_timeout;
                        $temp[] = array(
                        'faranchise_id' => $request->faranchise_id,
                        'class_name' => $request->class_name,
                        'child_id' => $request->child_id,
                        'schedule' => $date,
                        'day' => $day,
                        'time_in' => $child_time_in,
                        'time_out' => $child_time_out
                         );
                    }
                }else if( $day == "Friday" ){
                    if( !empty($request->fri_timein) && !empty($request->fri_timeout) ){
                        $child_time_in =    $request->fri_timein;
                        $child_time_out =   $request->fri_timeout;
                        $temp[] = array(
                        'faranchise_id' => $request->faranchise_id,
                        'class_name' => $request->class_name,
                        'child_id' => $request->child_id,
                        'schedule' => $date,
                        'day' => $day,
                        'time_in' => $child_time_in,
                        'time_out' => $child_time_out
                         );
                    }  
                }else if( $day == "Saturday" ){
                    if( !empty($request->sat_timein) && !empty($request->sat_timeout) ){
                        $child_time_in =    $request->sat_timein;
                        $child_time_out =   $request->sat_timeout;
                        $temp[] = array(
                        'faranchise_id' => $request->faranchise_id,
                        'class_name' => $request->class_name,
                        'child_id' => $request->child_id,
                        'schedule' => $date,
                        'day' => $day,
                        'time_in' => $child_time_in,
                        'time_out' => $child_time_out
                         );
                    }  
                }else if( $day == "Sunday" ){
                    if( !empty($request->sun_timein) && !empty($request->sun_timeout) ){
                        $child_time_in =    $request->sun_timein;
                        $child_time_out =   $request->sun_timeout;
                        $temp[] = array(
                        'faranchise_id' => $request->faranchise_id,
                        'class_name' => $request->class_name,
                        'child_id' => $request->child_id,
                        'schedule' => $date,
                        'day' => $day,
                        'time_in' => $child_time_in,
                        'time_out' => $child_time_out
                         );
                    }
                }
            }
           
           $date = strtotime("+1 day", strtotime($date));
           $date = date("Y-m-d", $date);
        }

        DB::table('child_scheduling')->insert($temp);
        EmployeeChild::where('id', $request->child_id)
                        ->where('crew', $request->class_name)
                        ->where('faranchise_id', $request->faranchise_id)
                        ->update(['scheduled' => 1]);

        return redirect('/employee/child-schedule/'.$request->faranchise_id.'/'.$request->class_name.'/'.$request->child_id);
    }

    public function editSchedule( Request $request ){
        $CurrentUser = Auth::user();
        $day = date('l', strtotime($request->schedule));
        EmployeeChildSchedule::where('id', $request->row_id)
                        ->where('class_name', $request->class_name)
                        ->where('faranchise_id', $request->faranchise_id)
                        ->where('child_id', $request->child_id)
                        ->update(['schedule' => $request->schedule, 'day' => $day, 'time_in' => $request->timein, 'time_out' => $request->timeout]);

        return redirect('/employee/child-schedule/'.$request->faranchise_id.'/'.$request->class_name.'/'.$request->child_id);
    }

    public function getSingleSchedule( Request $request ){
        $CurrentUser = Auth::user();
        $result = EmployeeChildSchedule::where('id', $request->row_id)->first();

        if($result){
            return response()->json(['result' => $result], 200);
        }
    }

}
