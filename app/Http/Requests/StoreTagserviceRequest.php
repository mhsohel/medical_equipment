<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagserviceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:tagservices',
            'icon' => 'mimes:jpeg,jpg,png,gif|required',
            'status' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tag Service Name Is Required!',
            'icon.required' => 'Icon Is Required & shoul be png!',

        ];
    }
}
