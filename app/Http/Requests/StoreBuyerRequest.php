<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBuyerRequest extends FormRequest
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
            'address_office'  => 'required',
            'address_mills'  => 'required',
            'phone_mills'  => 'required',
            'phone_office'  => 'required',
            'sale_tax_no'  => 'required',
            'national_tax_no'  => 'required',
            'city_id'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter The Name!',
            'address_office.required' => 'Please Enter Office Address!',
            'address_mills.required' => 'Please Enter The Mill Address!',
            'phone_mills.required' => 'Please Enter The Mill Contact Number!',
            'phone_office.required' => 'Please Enter The Office Contact Number!',
            'email.required' => 'Please Enter The Email!',
            'national_tax_no.required' => 'Please Enter The National Tax No!',
            'sale_tax_no.required' => 'Please Enter The Sale Tax No!',
            'city_id.required' => 'Please Select The City!',
        ];
    }
}
