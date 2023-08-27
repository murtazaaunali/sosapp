<?php

namespace App\Http\Controllers\Admin;

use App\Franchisee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\Facades\DataTables;

class FranchiseeController extends Controller
{
    public function index()
    {
        return view('admin.franchises');
    }

    public function showalldata()
    {
        $Franchises = Franchisee::select('id', 'name', 'email', 'BusinessPhone', 'BusinessEmail', 'BusinessFax', 'BusinessNPI', 'Status')->with('franchises')->get();
        return Datatables::of($Franchises)->make();
    }

    public function create()
    {
        $franchise = new FranchiseModel;
        $franchise->FranchiseAddress = Input::get('Address');
        $franchise->FranchiseCity = Input::get('City');
        $franchise->FranchiseState = Input::get('State');
        $franchise->FranchiseEmailAddress = Input::get('EmailAddress');
        $franchise->FranchiseOpeningDate = Input::get('OpeningDate');
        $franchise->DateFDDSigned = Input::get('DateFDDSigned');
        $franchise->DateFDDExpire = Input::get('DateFDDExpire');
        $franchise->Status = Input::get('Status');

        if ($franchisee->save()) {
            return 'true';
        }

        if (Input::get('Status') == '2') {
            $franchisee = new Franchisee;
            $franchisee->FranchiseAddress = Input::get('Address');
            $franchisee->FranchiseCity = Input::get('City');
            $franchisee->FranchiseState = Input::get('State');
            $franchisee->FranchiseEmailAddress = Input::get('EmailAddress');
            $franchisee->FranchiseOpeningDate = Input::get('OpeningDate');
            $franchisee->DateFDDSigned = Input::get('DateFDDSigned');
            $franchisee->DateFDDExpire = Input::get('DateFDDExpire');
            $franchisee->Status = Input::get('Status');

            if ($franchisee->save()) {
                return 'true';
            }
        }

    }
}
