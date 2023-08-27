<?php

namespace App\Http\Controllers\Client;

use App\EmployeeChild;
use App\EmployeeChildSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class ScheduleController extends Controller
{
    public function index()
    {
        $CurrentUser = Auth::user();
        $client_id = $CurrentUser->id;
        $childs = EmployeeChild::select('id', 'childname', 'parent')->where('parent', $client_id)->get();
        $events = [];
        foreach ($childs as $child) {
            $schedules = EmployeeChildSchedule::select('id', 'child_id', 'schedule', 'time_in', 'time_out')->where('child_id', $child->id)->get();
            foreach ($schedules as $schedule) {
                echo $child->child_name;
                if ($schedule->time_in !== 0) {
                    $events[] = Calendar::event(
                        $child->child_name . ' Class at ' . $schedule->schedule, //event title
                        false, //full day event?
                        $schedule->schedule . 'T' . $schedule->time_in . '00', //start time (you can also use Carbon instead of DateTime)
                        $schedule->schedule . 'T' . $schedule->time_out . '00' //end time (you can also use Carbon instead of DateTime)
                    );
                }
            }
        }
        /* $events[] = Calendar::event(
        'Event One', //event title
        false, //full day event?
        '2019-01-11T0800', //start time (you can also use Carbon instead of DateTime)
        '2019-01-12T0800' //end time (you can also use Carbon instead of DateTime)
        );

        $events[] = Calendar::event(
        "Christmas", //event title
        true, //full day event?
        '2018-12-25', //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
        '2018-12-25', //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
        1, //optional event ID
        [
        'url' => '#',
        ]
        ); */
        $calendar = Calendar::setId('schedule')->addEvents($events)->setOptions([ //set fullcalendar options
            'header' => [
                'left' => "prev,next",
                'center' => "title",
                'right' => "month,agendaWeek,agendaDay",
            ],
            'dayNamesShort' => ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            'timeFormat' => "hh:mm a",
        ]);

        return view('client.schedule', compact('calendar'));
    }
}
