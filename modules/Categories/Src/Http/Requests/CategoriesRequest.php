<?php

namespace Modules\Categories\Src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
        $rules = [
            'name'      => 'required|max:255',
            'slug'      => 'required|max:255',
            'parent_id' => 'required|integer'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required'  => __('categories::validation.required'),
            'max'       => __('categories::validation.max'),

        ];
    }

    public function attributes()
    {
        return [
            'name'      => __('categories::validation.attributes.name'),
            'slug'      => __('categories::validation.attributes.slug'),
            'parent_id' => __('categories::validation.attributes.parent_id'),
        ];
    }
}
