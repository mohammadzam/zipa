<?php

namespace Modules\Section\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewSectionRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:100|string',
            'price' => 'required',
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

            'price.required' => trans('admin::validation.required'),
        ];
    }
}
