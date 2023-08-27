<?php

namespace App\Http\Controllers\Employee;

use App\Client;
use App\ClientProfile;
use App\Employee;
use App\EmployeeDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EmployeeClientsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {	
        $CurrentUser = Auth::user();
        $userId = Auth::id();
        $EmployeeProfile = EmployeeDetails::where('employee_id', $userId)->first();

        $clients = DB::table('clients')
                    ->join('clients_profile', 'clients.id', '=', 'clients_profile.client_id')
                    ->where('clients_profile.faranchise_id', '=', $EmployeeProfile->faranchise_id)
                    ->get();
        return view('employee.clients', ['CurrentUser' => $CurrentUser, 'clients' => $clients]);
    }

    public function remove( Request $request ){
        $client_id = $request->client_id;  
        Client::where('id', $client_id)->delete();
        ClientProfile::where('client_id', $client_id)->delete();
        return response()->json(['result' => 'success'], 200);
    }

    public function autocomplete(Request $request) {
        $json = array();
        $userId = Auth::id();
        $EmployeeProfile = EmployeeDetails::where('employee_id', $userId)->first();

        if (isset($request->text)) {

            if( $request->text == "all" ){
                $data = DB::table('clients')
                ->Leftjoin('clients_profile', 'clients.id', '=', 'clients_profile.client_id')
                ->where('clients_profile.faranchise_id','=',$EmployeeProfile->faranchise_id)
                ->get();
            }else{
                $data = DB::table('clients')
                ->Leftjoin('clients_profile', 'clients.id', '=', 'clients_profile.client_id')
                ->where('clients.name', 'LIKE', "%{$request->text}%")
                ->where('clients_profile.faranchise_id','=',$EmployeeProfile->faranchise_id)
                ->orWhere('clients_profile.FatherLastName', 'LIKE', "%{$request->text}%")
                ->orWhere('clients_profile.MotherFirstName', 'LIKE', "%{$request->text}%")
                ->orWhere('clients_profile.MotherLastName', 'LIKE', "%{$request->text}%")
                ->get();
            }

            $output = '';
            foreach($data as $row)
            {
            $output .= '<div class="col-md-4">';
                $output .= '<div class="c-candidate">';
                    $output .= '<div class="c-candidate__cover">';
                        $output .= '<img src="../img/candidate1.jpg" alt="Candidate Cover photo">';
                    $output .= '</div>';
                    $output .= '<div class="c-candidate__info">';
                        $output .= '<div class="c-candidate__avatar">';
                            $output .= '<img src="'.\URL::to('')."/client_images/".$row->picture.'" alt="client avatar">';
                        $output .= '</div>';
                        $output .= '<div class="c-candidate__meta">';
                            $output .= '<h3 class="c-candidate__title">'.$row->name;
                                $output .= '<span class="c-candidate__country">';
                                    $output .= 'Started'. date("d F, Y", strtotime($row->created_at));
                                $output .= '</span>';
                            $output .= '</h3>';
                        $output .= '</div>';
                    $output .= '</div>';
                    $output .= '<div class="c-candidate__footer">';
                        $output .= '<a href="#" class="c-btn c-btn--info">';
                            $output .= '<i class="x-eye u-mr-xsmall"></i>View Client';
                        $output .= '</a>';
                        $output .= '<a href="javascript:void(0);" class="c-btn c-btn--info remove" data-client = "'. $row->client_id.'">Remove Client';
                        $output .= '</a>';
                        $output .= '<div class="c-candidate__status">';
                            if( $row->status == 0 ){ 
                                    $status = "Inactive";
                                }
                            else if( $row->status == 1 ){
                                $status = "Active";
                            }
                            $output .= 'Status: <span class="u-color-success">'.$status.'</span>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
            }
        }

        return response()->json(['result' => $output]);
    }      

}