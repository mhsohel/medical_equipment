<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            // 'name' => 'required|unique:services,'. $this->service->id,
            'name' => ['required',
                        'unique:services,name,'. $this->service->id
        ],
            'title' => 'string|nullable',
            // 'icon' => 'required|image|mimes:png',
            'description' => 'string|required',
            'status' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Service Name Is Required!',
            'description.required' => 'Descriptin Is Required!',
            'icon.required' => 'Icon Is Required & shoul be png!',

        ];
    }
}
