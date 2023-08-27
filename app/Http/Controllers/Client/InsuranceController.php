<?php

namespace App\Http\Controllers\Client;

use App\Client\Insurance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

class InsuranceController extends Controller
{
    public function index()
    {
        $CurrentUser = Auth::user();
        $client_id = $CurrentUser->id;
        $insurances = Insurance::select('id', 'InsuredID', 'GroupPolicyNumber', 'SubscriberName', 'PatientName', 'Gender', 'RelationToSubscriber', 'DOB', 'Status')->where('client_id', $client_id)->get();
        $insurances->filter(function ($insurance) {
            if ($insurance->Status == '1') {
                $insurance->Status = 'Active';
            } elseif ($insurance->Status == '2') {
                $insurance->Status = 'Pending';
            } else {
                $insurance->Status = 'Inactive';
            }
            return $insurance->Status;
        });

        $insurances->filter(function ($insurance) {
            return $insurance->url = URL::signedRoute('client.insurance.show', ['id' => $insurance->id]);
        });

        return view('client.insurances', ['page_title' => 'Insurance Details', 'Insurances' => $insurances]);
    }

    public function create()
    {
        $CurrentUser = Auth::user();
        $client_id = $CurrentUser->id;

        $insurance = new Insurance;

        $insurance->Company = Input::get('Company');
        $insurance->CoverageFrom = Input::get('CoverageFrom');
        $insurance->CoverageTo = Input::get('CoverageTo');
        $insurance->SubscriberName = Input::get('SubscriberName');
        $insurance->SubscriberAddress = Input::get('SubscriberAddress');
        $insurance->GroupPolicyNumber = Input::get('GroupPolicyNumber');
        $insurance->InsuredID = Input::get('InsuredID');
        $insurance->PatientName = Input::get('PatientName');
        $insurance->RelationToSubscriber = Input::get('RelationToSubscriber');
        $insurance->Gender = Input::get('Gender');
        $insurance->DOB = Input::get('DOB');
        $insurance->Status = '0';
        $insurance->client_id = $client_id;

        if ($insurance->save()) {
            return 'true';
        }
    }

    public function retreive($id)
    {
        $CurrentUser = Auth::user();
        $client_id = $CurrentUser->id;
        $insurance = Insurance::where(array('id' => $id, 'client_id' => $client_id))->get()->first();

        $date1 = date_create($insurance->CoverageTo);
        $insurance->CoverageTo = date_format($date1, "Y-m-d");

        $date2 = date_create($insurance->CoverageFrom);
        $insurance->CoverageFrom = date_format($date2, "Y-m-d");

        if ($insurance->Status == '1') {
            $insurance->Status = 'Active';
        } elseif ($insurance->Status == '2') {
            $insurance->Status = 'Inactive';
        } else {
            $insurance->Status = 'Pending Approval';
        }

        if (@count($insurance) > 0) {
            return view('client.insurance', ['Insurance' => $insurance]);
        } else {
            abort(404);
        }
    }

    public function update()
    {
        $CurrentUser = Auth::user();
        $user_id = $CurrentUser->id;

        $insurance_id = Crypt::decryptString(Input::get('id'));
        $client_id = Crypt::decryptString(Input::get('client_id'));

        $insurance = Insurance::find($insurance_id);

        $insurance->Company = Input::get('Company');
        $insurance->CoverageFrom = Input::get('CoverageFrom');
        $insurance->CoverageTo = Input::get('CoverageTo');
        $insurance->SubscriberName = Input::get('SubscriberName');
        $insurance->SubscriberAddress = Input::get('SubscriberAddress');
        $insurance->GroupPolicyNumber = Input::get('GroupPolicyNumber');
        $insurance->InsuredID = Input::get('InsuredID');
        $insurance->PatientName = Input::get('PatientName');
        $insurance->RelationToSubscriber = Input::get('RelationToSubscriber');
        $insurance->Gender = Input::get('Gender');
        $insurance->DOB = Input::get('DOB');
        $insurance->Status = '0';

        if ($insurance->save()) {
            return 'true';
        }

    }

    public function delete()
    {
        $insurance_id = Input::get('record_id');
        $insurance = Insurance::find($insurance_id);

        if ($insurance->delete()) {
            return 'true';
        }
    }

}
