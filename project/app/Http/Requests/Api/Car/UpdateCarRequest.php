<?php

namespace App\Http\Requests\Api\Car;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
        $currentYear = date('Y');

        return [
            'model' => ['required', 'string', 'max:120'],
            'year' => ['required', 'integer', "min:1900", "max:$currentYear"],
            'brand_id' => ['required',  'exists:brands,id']
        ];
    }
}
