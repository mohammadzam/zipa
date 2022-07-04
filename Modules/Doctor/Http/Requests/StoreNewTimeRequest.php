<?php

namespace Modules\Doctor\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewTimeRequest extends FormRequest
{
    public function rules()
    {
//        dd(Carbon::now()->format('H:i'));
        return [
            'day' => Rule::in([
                'شنبه',
                'یکشنبه',
                'دوشنبه',
                'سه شنبه',
                'چهارشنبه',
                'پنج شنبه',
                'جمعه',
            ], 'required'),


            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i|after:from',

            'time.*.fromTimes' => 'nullable|date_format:H:i|after:to',
            'time.*.toTimes' => 'nullable|date_format:H:i|after:toTimes',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'day.required'=>trans('admin::validation.required'),
            'day.in'=>trans('admin::validation.in'),

            'from.required'=>trans('admin::validation.required'),
            'from.date_format'=>trans('admin::validation.date_format'),

            'to.required'=>trans('admin::validation.required'),
            'to.date_format'=>trans('admin::validation.date_format'),
            'to.after'=>trans('admin::validation.after'),

            'fromTimes.date_format'=>trans('admin::validation.date_format'),
            'fromTimes.after'=>trans('admin::validation.after'),

            'toTimes.date_format'=>trans('admin::validation.date_format'),
            'toTimes.after'=>trans('admin::validation.after'),
        ];
    }
}
