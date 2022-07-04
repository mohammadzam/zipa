<?php

namespace Modules\Sick\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSickRequest extends FormRequest
{
    public function rules()
    {
        return [
            'status' =>Rule::in(['InBed', 'WasHospitalized','RequestForHospitalization','DischargeFromTheHospital'],'required'),
            'doctor_id' => ['required',Rule::exists('doctors','id')],
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

            'status.in'=>trans('admin::validation.in'),
            'status.required'=>trans('admin::validation.required'),

            'section_id.required' => trans('admin::validation.required'),
            'section_id.exist' => trans('admin::validation.exist'),


        ];
    }
}
