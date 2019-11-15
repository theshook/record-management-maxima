<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            $title = 'required|unique:news,title,' . $this->news->id;
        } else {
            $title = 'required|unique:news';
        }
        return [
            'title' => $title,
            'description' => 'required',
            'image' => 'image|required'
        ];
    }
}
