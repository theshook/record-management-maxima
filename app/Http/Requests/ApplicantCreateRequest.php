<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantCreateRequest extends FormRequest
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
            'training_center' => 'required|min:2|max:50',
            'school_address' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'first_name' => 'required|min:2|max:50',
            'street' => 'required|min:2|max:50',
            'barangay' => 'required|min:2|max:50',
            'district' => 'required|min:1|max:50',
            'city' => 'required|min:2|max:50',
            'province' => 'required|min:2|max:50',
            'region' => 'required|min:1|max:50',
            'zipcode' => 'required|min:2|max:50',
            'mother_name' => 'required|min:2|max:50',
            'father_name' => 'required|min:2|max:50',
            'email' => 'required|email|min:2|max:50',
            'birthdate' => 'required|date|min:2|max:50',
            'birthplace' => 'required|min:2|max:50',
            'age' => 'required|min:2|max:50',
            'sex' => 'required|in:Male,Female',
            'title_assessment' => 'required',
            'assessment_type' => 'required',
            'civil_status' => 'required',
            // 'hea' => 'required',
            // 'es' => 'required',
        ];
    }
}
