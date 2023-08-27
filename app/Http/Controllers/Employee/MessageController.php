<?php

namespace App\Http\Controllers\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class MessageController extends Controller
{

	public function index(){
		$Employee = Auth::user();
		if($Employee->type !== 'teacher'){
			return  redirect('employee/home');
		}
		$Subjects = DB::table('messages')->where([
			['receiver_ID', '=', $Employee->employee_id],
			['receiver_role', '=', 'teacher'],
		]);
		$SubjectData = $Subjects->groupBy('parent')->get();
		
		return view('employee.messages', ['Subjects' => $SubjectData]);
		
	}

	public function NewMessage(Request $request){
		$Employee = Auth::user();
		$validation = Validator::make($request->all(),[
			'message' 		=> 'required',
		]);
		
		if ($validation->fails()) {
			return response()->json([ 'errors' => $validation->errors()->all() ]);
        }
        else{
			
			/* $Employee = new Employee;
			$Employee->first_name 		= $request->first_name;
			$Employee->last_name 		= $request->last_name;
			$Employee->email 			= $request->email;
			$Employee->password 		= bcrypt($request->password);
			$Employee->franchisee_id 	= $Franchisee->franchisee_id;
			$Employee->type 			= $request->employee_type;
			$Employee->save(); */
			return response()->json( [ 'success' => 'Record Inserted Successfully' ] );
		}
	}
}
