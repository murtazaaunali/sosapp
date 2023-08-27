<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDetails;
use App\Client;
use App\ClientProfile;
use App\EmployeeChild;
use App\EmployeeChildSchedule;
use App\Mail\SendEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeChildFormController extends Controller
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
        $EmployeeProfile = Employee::where('id', $userId)->first();
        $EmployeeProfileInfo = EmployeeDetails::where('employee_id', $userId)->first();
        $parents = ClientProfile::all();

        if( isset($request->child_id) && !empty($request->child_id) ){
            $action = '<button type="submit" class="btn btn-success" name="update" value="'. $request->child_id .'">Update Child</button>';

            $employeechild = EmployeeChild::where('id',$request->child_id)->first();
            $parentProfile = ClientProfile::where('client_id',$employeechild->parent)->first();
            return view('employee.employee_child_form', ['CurrentUser' => $CurrentUser, 'EmployeeProfile' => $EmployeeProfile, 'EmployeeProfileInfo' => $EmployeeProfileInfo, 'parents' => $parents, 'parent' => $parentProfile, 'child' => $employeechild, 'action' => $action]);
        }else{
            $action = '<button type="submit" class="btn btn-success" name="add" value="add">Add Child</button>';
            return view('employee.employee_child_form', ['CurrentUser' => $CurrentUser, 'EmployeeProfile' => $EmployeeProfile, 'EmployeeProfileInfo' => $EmployeeProfileInfo, 'parents' => $parents, 'action' => $action]);
        }
        
    }

    public function create(Request $request)
    {
        if( isset($request->add) ){

            $validation = Validator::make( $request->all(),[
                'faranchise_id'                 => 'required',
                'childname'                     => 'required',
                'date_of_birth'                 => 'required',
                'crew'                          => 'required',
                'parent'                        => 'required',
                'status'                        => 'required',
                'date_of_initial_assessment'    => 'required',
                'date_that_service_started'     => 'required',
                'date_of_repeat_assessment'     => 'required',
                'profilepicture'                => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
        
            if ($validation->fails()) {

                $CurrentUser = Auth::user();
                $userId = Auth::id();
                $EmployeeProfile = Employee::where('id', $userId)->first();
                $parents = ClientProfile::all();
                $action = '<button type="submit" class="btn btn-success" name="add" value="add">Add Child</button>';
                return view('employee.employee_child_form', ['CurrentUser' => $CurrentUser, 'EmployeeProfile' => $EmployeeProfile, 'parents' => $parents, 'action' => $action, 'errors_child' => $validation->errors()->all()]);
            }

            $employeechild = new EmployeeChild;
            $employeechild->faranchise_id = $request->faranchise_id;
            $employeechild->childname = $request->childname;
            $employeechild->date_of_birth = $request->date_of_birth;
            $employeechild->crew = $request->crew;
            $employeechild->parent = $request->parent;
            $employeechild->status = $request->status;
            $employeechild->date_of_initial_assessment = $request->date_of_initial_assessment;
            $employeechild->date_that_service_started = $request->date_that_service_started;
            $employeechild->date_of_repeat_assessment = $request->date_of_repeat_assessment;
            //Uploading image 
            $imageName = $request->file('profilepicture')->getClientOriginalName();
            $path = base_path() . '/public/child_images/';
            $request->file('profilepicture')->move($path,$imageName);
            $employeechild->profilepicture = $imageName;
            $employeechild->save();

            return redirect('/employee/child-list')->with('success', "Child profile add successfully");

        }elseif( isset($request->update) ){

            $validation = Validator::make( $request->all(),[
                'childname'                     => 'required',
                'date_of_birth'                 => 'required',
                'crew'                          => 'required',
                'parent'                        => 'required',
                'status'                        => 'required',
                'date_of_initial_assessment'    => 'required',
                'date_that_service_started'     => 'required',
                'date_of_repeat_assessment'     => 'required',
            ]);
        
            if ($validation->fails()) {

                $CurrentUser = Auth::user();
                $userId = Auth::id();
                $EmployeeProfile = Employee::where('id', $userId)->first();
                $parents = ClientProfile::all();
                $action = '<button type="submit" class="btn btn-success" name="update" value="'. $request->child_id .'">Update Child</button>';
                $employeechild = EmployeeChild::where('id',$request->update)->first();
                return view('employee.employee_child_form', ['CurrentUser' => $CurrentUser, 'EmployeeProfile' => $EmployeeProfile, 'parents' => $parents, 'child' => $employeechild, 'action' => $action, 'errors_child' => $validation->errors()->all()]);
            }

            EmployeeChild::where('id', $request->update)
                           ->update(['childname' => $request->childname,'date_of_birth' => $request->date_of_birth, 'crew' => $request->crew, 'parent' => $request->parent, 'status' => $request->status, 'date_of_initial_assessment' => $request->date_of_initial_assessment, 'date_that_service_started' => $request->date_that_service_started, 'date_of_repeat_assessment' => $request->date_of_repeat_assessment]);

            return redirect('/employee/child-list')->with('success', "Child profile updated successfully");
        }      
    }
   
   public function delete_child(Request $request){
        EmployeeChild::where('id', $request->child_id)->delete();
        EmployeeChildSchedule::where('child_id', $request->child_id)->delete();
        return redirect('/employee/child-list')->with('success', "Record is deleted successfully");
   }

   public function create_parent(Request $request){

        $generated_password = str_random(10);
        $email = $request->fatheremail;

        $parent = new Client;
        $parent->name = $request->fatherfirstname." ".$request->fatherrlastname;
        $parent->email = $request->fatheremail;
        $parent->password = bcrypt($generated_password);
        $parent->picture = "icon.png";
        $parent->status = 1;
        
        $parent->save();

        $parentProfile = new ClientProfile;
        $parentProfile->faranchise_id = $request->faranchise_id;
        $parentProfile->FatherFirstName = $request->fatherfirstname;
        $parentProfile->FatherLastName = $request->fatherlastname;
        $parentProfile->FatherEmail = $request->fatheremail;
        $parentProfile->FatherDOB = $request->fatherdob;
        $parentProfile->FatherSSN = $request->fatherssn;
        $parentProfile->FatherContactNo = $request->fatherphone;
        $parentProfile->FatherCompany = $request->fathercompany;

        $parentProfile->MotherFirstName = $request->motherfirstname;
        $parentProfile->MotherLastName = $request->motherlastname;
        $parentProfile->MotherEmail = $request->motheremail;
        $parentProfile->MotherDOB = $request->motherdob;
        $parentProfile->MotherSSN = $request->motherssn;
        $parentProfile->MotherContactNo = $request->motherphone;
        $parentProfile->MotherCompany = $request->mothercompany;

        $parentProfile->Address = $request->address;
        $parentProfile->City = $request->city;
        $parentProfile->State = $request->state;
        $parentProfile->PostalCode = $request->postal;
        $parentProfile->client_id = $parent->id;

        $parentProfile->save();

        $subject = "Generate Password";

        $data['father_first_name'] = $request->fatherfirstname;
        $data['father_last_name'] = $request->fatherlastname;
        $data['password'] = $generated_password;
        $data['email'] = $email;
        $data['subject'] = $subject;

        Mail::to($email)->send( new SendEmail($data) );

        return redirect('/employee/add-child')->with('success', "Parent Created successfully");;
   }

   public function autocomplete(Request $request) {
        $json = array();

        if (isset($request->text)) {

            $data = DB::table('clients_profile')
            ->where('FatherFirstName', 'LIKE', "%{$request->text}%")
            ->where('faranchise_id','=',$request->faranchise_id)
            ->orWhere('FatherLastName', 'LIKE', "%{$request->text}%")
            ->orWhere('MotherFirstName', 'LIKE', "%{$request->text}%")
            ->orWhere('MotherLastName', 'LIKE', "%{$request->text}%")
            ->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
            $output .= '
                <li class="clients_names" data-client-id="'.$row->client_id.'"><a href="#">Father: '.$row->FatherFirstName.' '.$row->FatherLastName.' Mother: '.$row->MotherFirstName.' '.$row->MotherLastName.'</a></li>';
            }
            $output .= '</ul>';

        }

        return response()->json(['result' => $output]);
    }       
}
