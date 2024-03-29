<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssessorRequest extends FormRequest
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
            'last_name' => 'required|min:3|max:50',
            'first_name' => 'required|min:3|max:50',
            'accreditation_number' => 'required|min:3|max:50',
        ];
    }
}
