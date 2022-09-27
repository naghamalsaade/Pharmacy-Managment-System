<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgeGroupRequest extends FormRequest
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
            'name_age_group' => 'required|unique:age_groups,name_age_group|max:15',
        ];
    }
}
