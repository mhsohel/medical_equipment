<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenudescriptionRequest extends FormRequest
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
            'menu_id'=> 'string|required',
            'menuTitle'=> 'string|required',
            'shortDesc'=> 'nullable|string',
            'image'=> 'nullable|',
            'description'=> 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'menu_id.required' => 'Menu Select Is Required!',
            'menuTitle.required' => 'Menu Title Is Required!',

        ];
    }
}
