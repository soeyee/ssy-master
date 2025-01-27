<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|min:6',
            'phone' => 'required|digits_between:5,15',
            'postal_code' => 'required|digits:3',
            'address' => 'required|string',
            'gender' => 'required|in:0,1', //0 for Male, 1 for Female,
            'country' => 'required',
            'languages' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:2048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            //'comments' => 'nullable|string',
        ];
    }
}
