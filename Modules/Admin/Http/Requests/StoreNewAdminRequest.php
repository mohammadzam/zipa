<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewAdminRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100|string',
            'status' => ['required', Rule::in(['ACCEPTED', 'REJECTED', 'PENDING'])],
            'password' => 'required|min:8|confirmed|max:225',
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
            'name.required' => trans('admin::validation.required'),
            'name.min' => trans('admin::validation.min'),
            'name.max' => trans('admin::validation.max'),
            'name.string' => trans('admin::validation.string'),

            'status.in' => trans('admin::validation.in'),
            'status.required' => trans('admin::validation.required'),


            'password.required' => trans('admin::validation.required'),
            'password.min' => trans('admin::validation.min'),
            'password.confirmed' => trans('admin::validation.confirmed'),
            'password.max' => trans('admin::validation.max'),
        ];
    }
}
