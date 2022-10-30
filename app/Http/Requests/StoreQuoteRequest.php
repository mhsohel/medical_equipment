<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'required',
            'message' => 'required',
            'status' => 'nullable',


        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name Is Required!',
            'email.required' => 'Email Is Required!',
            'phone.required' => 'Phone Is Required!',
            'message.required' => 'Message Is Required!',


        ];
    }
}
