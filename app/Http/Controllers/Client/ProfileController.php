<?php

namespace App\Http\Controllers\Client;

use App\ClientProfile;
use App\Client\AssignedPickup;
use App\EmployeeChild;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

class ProfileController extends Controller
{
    public function index()
    {
        $CurrentUser = Auth::user();
        $ClientProfile = ClientProfile::where('client_id', $CurrentUser->id)->first();

        $Children = EmployeeChild::where('parent', $CurrentUser->id)->get();

        $Children->filter(function ($Child) {
            $date = date_create($Child->date_of_birth);
            $Child->date_of_birth = date_format($date, "d F Y");
            return $Child->date_of_birth;
        });

        $Children->filter(function ($Child) {
            $date = date_create($Child->date_of_initial_assessment);
            $Child->date_of_initial_assessment = date_format($date, "d F Y");
            return $Child->date_of_initial_assessment;
        });

        $Children->filter(function ($Child) {
            $date = date_create($Child->date_that_service_started);
            $Child->date_that_service_started = date_format($date, "d F Y");
            return $Child->date_that_service_started;
        });

        $Children->filter(function ($Child) {
            $date = date_create($Child->date_of_repeat_assessment);
            $Child->date_of_repeat_assessment = date_format($date, "d F Y");
            return $Child->date_of_repeat_assessment;
        });

        $Children->filter(function ($Child) {
            if ($Child->status == '1') {
                $Child->status = 'Active';
            } elseif ($Child->status == '2') {
                $Child->status = 'Potential';
            } else {
                $Child->status = 'Inactive';
            }
            return $Child->status;
        });

        $Pickups = AssignedPickup::where('client_id', $CurrentUser->id)->get();

        $Pickups->filter(function ($Pickup) {
            return $Pickup->edit_url = URL::signedRoute('client.profile.editassignedpickup', ['id' => $Pickup->id]);
        });

        $Pickups->filter(function ($Pickup) {
            return $Pickup->delete_url = URL::signedRoute('client.profile.deleteassignedpickup', ['id' => $Pickup->id]);
        });

        return view('client.profile', ['CurrentUser' => $CurrentUser, 'ClientProfile' => $ClientProfile, 'Children' => $Children, 'Pickups' => $Pickups]);
    }

    // Assigned Pickups

    public function add_assigned_pickups()
    {
        $CurrentUser = Auth::user();
        $client_id = $CurrentUser->id;

        $Pickups = new AssignedPickup();

        $Pickups->name = Input::get('name');
        $Pickups->address = Input::get('address');
        $Pickups->phone = Input::get('phone');
        $Pickups->ssn = Input::get('ssn');

        $Pickups->client_id = $client_id;

        if ($Pickups->save()) {
            return 'true';
        }
    }

    public function edit_assigned_pickups($id)
    {
        $CurrentUser = Auth::user();
        $Pickups = AssignedPickup::where(array('id' => $id, 'client_id' => $CurrentUser->id))->get()->first();

        return view('client.editassignedpickup', ['Pickup' => $Pickups]);
    }

    public function save_assigned_pickups()
    {
        $CurrentUser = Auth::user();
        $client_id = $CurrentUser->id;

        $Pickup = AssignedPickup::find(Input::get('id'));

        $Pickup->name = Input::get('name');
        $Pickup->address = Input::get('address');
        $Pickup->phone = Input::get('phone');
        $Pickup->ssn = Input::get('ssn');

        $Pickup->client_id = $client_id;

        if ($Pickup->save()) {
            return redirect()->back();
        }
    }

    public function delete_assigned_pickup($id)
    {
        $pickup_id = Input::get('record_id');
        $Pickup = AssignedPickup::find($id);

        if ($Pickup->delete()) {
            return redirect()->back();
        }
    }
}
