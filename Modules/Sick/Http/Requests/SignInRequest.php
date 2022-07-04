<?php

namespace Modules\Sick\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sick_number'=>'required',
            'password' => 'required',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function messages(): array
    {
        return [
            'sick_number.required'=>trans('admin::signing.Do not forget your email or administrative number'),
            'password.required'=>trans('admin::signing.Do not forget your password'),

        ];
    }
}
