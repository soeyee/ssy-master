<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\StepFormData;

class StepFormController extends Controller
{
    public function show($step = 1)
    {
        return view('step-form.step' . $step, [
            'data' => Session::get('form_data', []),
            'step' => $step,
        ]);
    }

    public function store(Request $request, $step)
    {
        // Validation rules for each step
        $rules = [
            1 => ['name' => 'required|string|max:255'],
            2 => ['email' => 'required|email'],
            3 => ['phone' => 'required|string|max:15', 'address' => 'required|string|max:255'],
        ];

        $request->validate($rules[$step]);

        // Save step data to session
        $formData = Session::get('form_data', []);
        $formData = array_merge($formData, $request->only(array_keys($rules[$step])));
        Session::put('form_data', $formData);

        // If it's the last step, save to the database
        if ($step == 3) {
            StepFormData::create($formData);
            Session::forget('form_data');
            return redirect()->route('step-form.show', 1)->with('success', 'Form submitted successfully!');
        }

        return redirect()->route('step-form.show', $step + 1);
    }
}
