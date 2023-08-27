<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\EmployeeDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Filesystem;
use File;

class EmployeeDocumentController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    public function index(Request $request)
    {
        $CurrentUser = Auth::user();
        $userId = Auth::id();

        if( isset($request->employee_id) ){
            $Documents = EmployeeDocument::where('employee_id', $request->employee_id)->get();
            return view('employee.employee_documents_form', ['CurrentUser' => $CurrentUser, 'Documents' => $Documents, 'Employee_id' => $request->employee_id]);
        }  
        else{
            $Documents = EmployeeDocument::where('employee_id', $userId)->get();
            return view('employee.employee_documents_form', ['CurrentUser' => $CurrentUser, 'Documents' => $Documents, 'Employee_id' => $userId]);
        }
    }

    public function upload_document(UploadRequest $request)
    {
        $CurrentUser = Auth::user();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $type = $request->doctype;
            $expire = ( isset($request->expire) ) ? $request->expire : '0000:00:00';
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $path = $file->store('documents', 'public');
            $Documents = EmployeeDocument::updateOrCreate(['Type' => $type, 'employee_id' => $request->employee_id], ['Name' => $name, 'Src' => $path, 'Title' => $name, 'FileType' => $ext, 'Expiration' => $expire]);
        }
        return 'Upload successful!';
    }

}
