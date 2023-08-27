<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Franchise;
use App\Admin\Franchisee;
use App\Admin\Task;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

class FranchiseController extends Controller
{
    public function index()
    {
        return view('admin.franchises');
    }

    public function ViewAllFranchises()
    {
        $Franchises = Franchise::select('id', 'Location', 'City', 'State', 'Address', 'DateOpened', 'DateFDDSigned', 'DateFDDExpires', 'status')->get();

        $Franchises->filter(function ($Franchise) {
            return $Franchise->url = URL::signedRoute('admin.franchise.show', ['id' => $Franchise->id]);
        });

        $Franchises->filter(function ($Franchise) {
            return $Franchise->status == '1' ? $Franchise->status = 'Active' : $Franchise->status = 'Deactivated';
        });

        return view('admin.viewall_franchise', ['page_title' => 'Franchises', 'Franchises' => $Franchises]);
    }

    public function ViewAllFranchisees()
    {
        $Franchisees = Franchisee::select('id', 'name', 'email', 'Address', 'BusinessPhone', 'BusinessEmail', 'status')->with('franchises')->get();

        $Franchisees->filter(function ($Franchisee) {
            return $Franchisee->url = URL::signedRoute('admin.franchise.show', ['id' => $Franchisee->id]);
        });

        $Franchisees->filter(function ($Franchisee) {
            return $Franchisee->status == '1' ? $Franchisee->status = 'Active' : $Franchisee->status = 'Deactivated';
        });

        return view('admin.viewall_franchisee', ['page_title' => 'Franchise Owners', 'Franchisees' => $Franchisees]);
    }

    public function ViewFranchise($id)
    {
        $Franchise = Franchise::where('id', $id)->first();
        $Owners = Franchise::where('id', $id)->with('franchisees')->get();
        $Tasks = Franchise::where('id', $id)->with('tasks')->get();

        if (@count($Franchise) > 0) {
            return view('admin.franchise', ['Franchise' => $Franchise, 'Owners' => $Owners, 'Tasks' => $Tasks]);
        } else {
            abort(404);
        }
    }

    public function CreateNewFranchise(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'Location' => 'required',
            'Email' => 'required|unique:franchises,email',
            'City' => 'required',
            'State' => 'required',
            'Status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {

            $Password = str_random(8);

            // Create record for Franchise
            $Franchise = new Franchise;
            $Franchise->name = Input::get('Location');
            $Franchise->email = Input::get('Email');
            $Franchise->password = bcrypt($Password);
            $Franchise->status = Input::get('Status');
            $Franchise->Location = Input::get('Location');
            $Franchise->City = Input::get('City');
            $Franchise->State = Input::get('State');
            $Franchise->Address = Input::get('Address');
            $Franchise->DateOpened = Input::get('DateOpened');
            $Franchise->DateFDDSigned = Input::get('DateFDDSigned');
            $Franchise->DateFDDExpires = Input::get('DateFDDExpires');

            if ($Franchise->save()) {
                // Send Credentials to Email
                return "true";
            } else {
                return "false";
            }
        }

    }

    public function CreateTask()
    {
        $franchiseid = Input::get('id');
        $Franchise = Franchise::find($franchiseid);
        $Task = new Task;
        $Task->title = Input::get('title');
        $Task->type = Input::get('type');
        /* if ($Task->type == 'document') {
        $file = $request->file('file');
        $type = Input::get('type');
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $destinationPath = 'uploads';
        $path = $file->store('documents', 'public');
        $Task->src = $path;
        } */
        $Task->src = '';
        $Task->description = Input::get('description');
        $Task->comment = Input::get('comment');
        $Task->status = Input::get('status');

        if ($Franchise->tasks()->save($Task)) {
            return 'true';
        }
    }
}
