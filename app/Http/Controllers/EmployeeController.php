<?php

// app/Http/Controllers/EmployeeController.php
namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Country;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create()
    {
        $countries = Country::orderBy('name')->get();
        return view('employee.create', compact('countries'));
    }

    public function confirm(EmployeeRequest $request)
    {
        $validated = $request->validated();

        // for file upload
        $upload = [];
        $upload['pdf_file'] =  $this->getFilePath($request);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            session()->put('image', $imagePath);
            $upload['image'] =  $this->getImagePath($request);
        }
        session()->put('upload', $upload);
        return view('employee.confirm', compact('validated'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', 'pdf_file', 'image']);
        $data['password'] = bcrypt($request->password);
       // $languages = implode(',', $request->languages);

        // Handle file uploads
        $data['pdf_file'] = '/storage/' . session()->get('upload')['pdf_file'];
        $data['image'] = session()->get('image') ? session()->get('image')  : null;

        Employee::create($data);

        return redirect('/employee/create')->with('success', 'Employee registered successfully.');
    }

    private function getFilePath($request)
    {
        $uploadedFile = $request->file('pdf_file');
        $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
        return $uploadedFile->storeAs('uploads', $fileName, 'public');
    }

    private function getImagePath($request)
    {
        // Handle the user image upload (optional)
        // $userImagePath = null;

//        $userImage = $request->file('user_image');
//        $userImageName = time() . '_user_' . $userImage->getClientOriginalName();
//         return $userImage->storeAs('uploads/images', $userImageName, 'public');
        return $request->file('image')->store('temp', 'public');
    }
}

