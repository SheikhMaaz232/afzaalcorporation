<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name'  => 'required',
            'cell'  => 'required',
            'designation'  => 'required',
            'date_of_birth'  => 'required',
            'cnic_number'  => 'required',
            'date_of_joining'  => 'required',
            'salary'  => 'required',
            'city_id'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter The Name!',
            'cell.required' => 'Please Enter Cell Number!',
            'designation.required' => 'Please Enter The Designation!',
            'date_of_birth.required' => 'Please Enter The DOB!',
            'cnic_number.required' => 'Please Enter The CNIC Number!',
            'date_of_joining.required' => 'Please Enter The Date of Joining!',
            'salary.required' => 'Please Enter The Salary Amount!',
            'city_id.required' => 'Please Select The City!',
        ];
    }
}
