<?php

namespace App\Http\Controllers\Franchisee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FranchiseeController extends Controller
{
    
	public function index(){
		
		$Franchisee = Auth::user();
		return view('franchisee.add_employee', ['Franchisee' => $Franchisee]);
	}
	
	public function addEmployee(Request $request){
		$Franchisee 		= Auth::user();
		$validation = Validator::make($request->all(),[
			'first_name' 	=> 'required|max:255',
			'last_name' 	=> 'required|max:255',
			'email' 		=> 'required|email|max:255|unique:employees',
			'password' 		=> 'required|min:6|confirmed',
		]);
		
		if ($validation->fails()) {
			return response()->json([ 'errors' => $validation->errors()->all() ]);
        }
        else{
			
			$Employee = new Employee;
			$Employee->first_name 		= $request->first_name;
			$Employee->last_name 		= $request->last_name;
			$Employee->email 			= $request->email;
			$Employee->password 		= bcrypt($request->password);
			$Employee->franchisee_id 	= $Franchisee->franchisee_id;
			$Employee->type 			= $request->employee_type;
			$Employee->save();
			return response()->json( [ 'success' => 'Record Inserted Successfully' ] );
		}
	}
}
