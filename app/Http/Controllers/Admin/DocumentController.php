<?php

namespace App\Http\Controllers\Admin;

use App\Documents;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $CurrentUser = Auth::user();
        $Documents = Documents::where('admin_id', $CurrentUser->id)->get();
        return view('admin.documents', ['CurrentUser' => $CurrentUser, 'Documents' => $Documents]);
    }

    public function upload_document(UploadRequest $request)
    {
        $CurrentUser = Auth::user();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $type = $request->doctype;
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $path = $file->store('documents', 'public');
            $Documents = Documents::updateOrCreate(['Type' => $type, 'admin_id' => $CurrentUser->id], ['Name' => $name, 'Src' => $path, 'Title' => $name, 'FileType' => $ext]);
        }
        return 'Upload successful!';
    }
}
