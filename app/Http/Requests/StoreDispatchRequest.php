<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDispatchRequest extends FormRequest
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
            'date' => ['date'],
            'buyer_id' => ['required'],
            'seller_id' => ['required'],
            'contract_id' => ['required','integer'],
            'lot_no' => ['required','integer'],
            'dispatch_quantity' => ['required','integer'],
            'factory_weight' => ['required','integer'],
            'net_weight' => ['required'],
            'value' => ['required'],
        ];
    }
}
