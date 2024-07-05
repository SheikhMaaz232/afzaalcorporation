<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerRequest extends FormRequest
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
            'phone'  => 'required',
            'sale_tax_no'  => 'required',
            'national_tax_no'  => 'required',
            'city_id'  => 'required',
            'bank_detail'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter The Name!',
            'phone.required' => 'Please Enter Phone Number!',
            'sale_tax_no.required' => 'Please Enter The Sale Tax No!',
            'national_tax_no.required' => 'Please Enter The National Tax No!',
            'city_id.required' => 'Please Select The City!',
            'bank_detail.required' => 'Please Enter Bank Account Details!',
        ];
    }
}
