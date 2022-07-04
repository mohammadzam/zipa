<?php

namespace Modules\Doctor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SelectCustomRangeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'start' => 'required|date',
//            'end' => ['required','after_or_equal:start','before_or_equal: '.\verta()->today()]
            'end' => ['required','after_or_equal:start'],
        ];
    }

    public function authorize()
    {
        return true;
    }
    public function messages(): array
    {
        return [

            'start.required'=>trans('admin::validation.required'),
            'start.date'=>trans('admin::validation.date'),

            'end.date'=>trans('admin::validation.date'),
            'end.required'=>trans('admin::validation.required'),
            'end.after_or_equal'=>trans('admin::validation.after_or_equal'),
            'end.before_or_equal'=>trans('admin::validation.after_or_equal'),

        ];
    }
}
