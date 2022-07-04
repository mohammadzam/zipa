<?php

namespace Modules\Sick\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEditedMedicalFileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'section_id' => ['required',Rule::exists('sections','id')],
            'disease' => 'required|string',
            'treatment' => 'required|string',
            'description' => 'nullable|string',
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
            'section_id.required' => trans('admin::admin.required'),
            'section_id.exists' => trans('admin::admin.exists'),

            'disease.required' => trans('admin::admin.required'),
            'treatment.required' => trans('admin::admin.required'),

        ];
    }
}
