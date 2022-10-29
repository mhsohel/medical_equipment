<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeadingpageRequest extends FormRequest
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


            'tagline' => 'string|required',
            'title' => 'string|required',
            'header' => 'string|required',
            'mission' => 'string|required',
            'vission' => 'string|required',

        ];
    }

    public function messages()
    {
        return [
            'tagline.required' => 'Tagline Name Is Required!',
            'title.required' => 'Title Is Required!',
            'header.required' => ' Header Is Required!',
            'mission.required' => ' mission Is Required!',
            'vission.required' => 'vission Is Required!',



        ];
    }
}
