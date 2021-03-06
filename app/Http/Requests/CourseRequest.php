<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        if (!$this->input("edit")) {
            return [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'photo' => 'required|images',
            ];
        } else {
            return [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'photo' => 'images',
            ];
        }
    }
}
