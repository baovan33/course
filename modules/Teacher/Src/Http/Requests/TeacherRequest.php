<?php

namespace Modules\Teacher\Src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'name'          => 'required|max:255',
            'slug'          => 'required|max:255',
            'description'   => 'required',
            'image'         => 'required|max:255',
            'exp'           => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'required'  => __('teacher::validation.required'),
            'max'       => __('teacher::validation.max'),
            'integer'   => __('teacher::validation.integer'),
        ];
    }

    public function attributes()
    {
        return __('teacher::validation.attributes');
    }
}
