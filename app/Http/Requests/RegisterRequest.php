<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'هذا الحقل مطلوب',
            'lastName.required' => 'هذا الحقل مطلوب',
            'email.required' => 'هذا الحقل مطلوب',
            'email.email' => 'ادخل بريد إلكترونى صحيح'
        ];
    }
}
