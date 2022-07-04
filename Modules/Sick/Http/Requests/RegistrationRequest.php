<?php

namespace Modules\Sick\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'age' => 'required|numeric',
            'sex' => ['required', Rule::in('male', 'female')],
            'password' => 'required|min:8|max:20',
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
            'name.required' => trans('admin::admin.required'),
            'password.min' => trans('admin::admin.min'),
            'password.max' => trans('admin::admin.max'),

            'age.required' => trans('admin::admin.required'),
            'age.numeric' => trans('admin::admin.numeric'),

            'sex.required' => trans('admin::admin.required'),
            'sex.in' => trans('admin::admin.in'),

        ];
    }
}
