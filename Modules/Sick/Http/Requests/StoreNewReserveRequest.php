<?php

namespace Modules\Sick\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewReserveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'doctor_id' => ['required',Rule::exists('doctors','id')],
            'date' => ['required','date','after_or_equal:'.verta()->today()->format('Y-n-j')],
            'from' => ['required'],
//            'to' => ['required','after:from'],

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

            'doctor_id.required'=>trans('admin::validation.required'),
            'doctor_id.exists'=>trans('admin::validation.exists'),


            'date.required'=>trans('admin::validation.required'),
            'date.date'=>trans('admin::validation.date'),
            'date.after_or_equal'=>trans('admin::validation.after_or_equal'),

            'from.required'=>trans('admin::validation.required'),
            'from.date_format'=>trans('admin::validation.date_format'),

            'to.required'=>trans('admin::validation.required'),
            'to.date_format'=>trans('admin::validation.date_format'),
            'to.after'=>trans('admin::validation.after'),


        ];
    }
}
