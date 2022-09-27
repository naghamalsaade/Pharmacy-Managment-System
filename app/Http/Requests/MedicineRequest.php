<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            'generic_name' => 'required|unique:medicines,generic_name|max:25',
            'medicine_name' => 'required|max:25',
           
        ];
    }
}
