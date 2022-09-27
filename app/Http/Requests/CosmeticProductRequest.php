<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CosmeticProductRequest extends FormRequest
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
            'image' => 'required',
            'bar_code' => 'required|unique:products,bar_code|max:20',
            'product_country' => 'required',
            'name' => 'required|unique:cosmetic_products,name|max:25',
        ];
    }
}
