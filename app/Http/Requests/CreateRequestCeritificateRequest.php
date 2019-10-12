<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestCeritificateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|min:3|max:40',
            'address' => 'required|min:5',
            'contactno' => 'required|min:9',
            'deliveryType' => 'required|in:Pick-Up,Delivery',
            'deliveryAddress' => 'required|min:9'
        ];
    }
}
