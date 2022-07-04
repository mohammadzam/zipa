<?php

namespace Modules\Sick\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMyInformationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100|string',
            'password' => 'nullable|confirmed|min:8|max:256',
            'password_confirmation'=>'nullable|min:8|max:256|same:password',
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
    public function messages()
    {
        return[

            'name.required'=>trans('admin::validation.required'),
            'name.min'=>trans('admin::validation.min'),
            'name.max'=>trans('admin::validation.max'),
            'name.string'=>trans('admin::validation.string'),

            'password.min'=>trans('admin::validation.min'),
            'password.confirmed'=>trans('admin::validation.confirmed'),
            'password.max'=>trans('admin::validation.max'),

            'password_confirmation.max'=>trans('admin::validation.max'),
            'password_confirmation.min'=>trans('admin::validation.max'),
            'password_confirmation.same'=>trans('admin::validation.same'),

        ];
    }
}
