<?php

namespace Modules\Financial\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Doctor\Entities\Doctor;
use Modules\Doctor\Entities\TimeDoctor;
use Modules\Financial\Entities\AppointmentCosts;
use Modules\Financial\Entities\SurgeryCosts;
use Modules\Section\Entities\Section;
use Modules\Sick\Entities\MedicalInformation;
use PhpParser\Comment\Doc;

class ShiftsCostsController extends Controller
{
    /**
     * calculate amount from shifts
     *  Equivalent to the number of working shift hours for this doctor multiplied by 25% of the price of each visit to this doctor
     * برابر با تعداد ساعت هاي شيفت هاي كاري اين دكتر ضربدر 25% قیمت هر بازديد نزد اين دكتر
     */
    public function index()
    {
        $page_name = 'Dashboard - ShiftsCosts';
        $doctors = Doctor::withoutTrashed()->with('costs')
            ->get();
        for ($i = 0; $i < count($doctors); $i++) {
            $saturday_shifts[] = TimeDoctor::withoutTrashed()->where([
                ['doctor_id', $doctors[$i]->id],
                ['day', 'شنبه']
            ])->orderBy('from')->get();
            if (count($saturday_shifts[$i]) > 0) {
                for ($j = 0; $j < count($saturday_shifts[$i]); $j++) {
                    $saturday_hours_shifts[$i][$j] = Carbon::parse($saturday_shifts[$i][$j]->from)->floatDiffInHours($saturday_shifts[$i][$j]->to);
                }
            } else {
                $saturday_hours_shifts[$i][0] = 0;
            }

            $sunday_shifts[] = TimeDoctor::withoutTrashed()->where([
                ['doctor_id', $doctors[$i]->id],
                ['day', 'یکشنبه']
            ])->orderBy('from')->get();
            if (count($sunday_shifts[$i]) > 0) {
                for ($j = 0; $j < count($sunday_shifts[$i]); $j++) {
                    $sunday_hours_shifts[$i][$j] = Carbon::parse($sunday_shifts[$i][$j]->from)->floatDiffInHours($sunday_shifts[$i][$j]->to);
                }
            } else {
                $sunday_hours_shifts[$i][0] = 0;
            }
            $monday_shifts[] = TimeDoctor::withoutTrashed()->where([
                ['doctor_id', $doctors[$i]->id],
                ['day', 'دوشنبه']
            ])->orderBy('from')->get();
            if (count($monday_shifts[$i]) > 0) {
                for ($j = 0; $j < count($monday_shifts[$i]); $j++) {
                    $monday_hours_shifts[$i][$j] = Carbon::parse($monday_shifts[$i][$j]->from)->floatDiffInHours($monday_shifts[$i][$j]->to);
                }
            } else {
                $monday_hours_shifts[$i][0] = 0;
            }
            $tuesday_shifts[] = TimeDoctor::withoutTrashed()->where([
                ['doctor_id', $doctors[$i]->id],
                ['day', 'سه شنبه']
            ])->orderBy('from')->get();
            if (count($tuesday_shifts[$i]) > 0) {
                for ($j = 0; $j < count($tuesday_shifts[$i]); $j++) {
                    $tuesday_hours_shifts[$i][$j] = Carbon::parse($tuesday_shifts[$i][$j]->from)->floatDiffInHours($tuesday_shifts[$i][$j]->to);
                }
            } else {
                $tuesday_hours_shifts[$i][0] = 0;
            }

            $wednesday_shifts[] = TimeDoctor::withoutTrashed()->where([
                ['doctor_id', $doctors[$i]->id],
                ['day', 'چهارشنبه']
            ])->orderBy('from')->get();
            if (count($wednesday_shifts[$i]) > 0) {
                for ($j = 0; $j < count($wednesday_shifts[$i]); $j++) {
                    $wednesday_hours_shifts[$i][$j] = Carbon::parse($wednesday_shifts[$i][$j]->from)->floatDiffInHours($wednesday_shifts[$i][$j]->to);
                }
            } else {
                $wednesday_hours_shifts[$i][0] = 0;
            }
            $thursday_shifts[] = TimeDoctor::withoutTrashed()->where([
                ['doctor_id', $doctors[$i]->id],
                ['day', 'پنج شنبه']
            ])->orderBy('from')->get();

            if (count($thursday_shifts[$i]) > 0) {
                for ($j = 0; $j < count($thursday_shifts[$i]); $j++) {
                    $thursday_hours_shifts[$i][$j] = Carbon::parse($thursday_shifts[$i][$j]->from)->floatDiffInHours($thursday_shifts[$i][$j]->to);
                }
            } else {
                $thursday_hours_shifts[$i][0] = 0;
            }

            $friday_shifts[] = TimeDoctor::withoutTrashed()->where([
                ['doctor_id', $doctors[$i]->id],
                ['day', 'جمعه']
            ])->orderBy('from')->get();
            if (count($friday_shifts[$i]) > 0) {
                for ($j = 0; $j < count($friday_shifts[$i]); $j++) {
                    $friday_hours_shifts[$i][$j] = Carbon::parse($friday_shifts[$i][$j]->from)->floatDiffInHours($friday_shifts[$i][$j]->to);
                }
            } else {
                $friday_hours_shifts[$i][0] = 0;
            }
        }

        if (count($saturday_hours_shifts) < count($saturday_shifts)) {
            $array [] = [0];
            $saturday_hours_shifts = array_merge($saturday_hours_shifts, $array);
        }
        if (count($sunday_hours_shifts) < count($sunday_hours_shifts)) {
            $array [] = [0];
            $sunday_hours_shifts = array_merge($sunday_hours_shifts, $array);
        }

        if (count($monday_hours_shifts) < count($monday_hours_shifts)) {
            $array [] = [0];
            $monday_hours_shifts = array_merge($monday_hours_shifts, $array);
        }

        if (count($tuesday_hours_shifts) < count($tuesday_hours_shifts)) {
            $array [] = [0];
            $tuesday_hours_shifts = array_merge($tuesday_hours_shifts, $array);
        }
        if (count($wednesday_hours_shifts) < count($wednesday_hours_shifts)) {
            $array [] = [0];
            $wednesday_hours_shifts = array_merge($wednesday_hours_shifts, $array);
        }
        if (count($thursday_hours_shifts) < count($thursday_hours_shifts)) {
            $array [] = [0];
            $thursday_hours_shifts = array_merge($thursday_hours_shifts, $array);
        }
        if (count($friday_hours_shifts) < count($friday_hours_shifts)) {
            $array [] = [0];
            $friday_hours_shifts = array_merge($friday_hours_shifts, $array);
        }



        return view('financial::layouts.admin.ShiftsCosts.index', compact([
            'page_name',
            'doctors',
            'saturday_shifts',
            'saturday_hours_shifts',
            'sunday_shifts',
            'sunday_hours_shifts',
            'monday_hours_shifts',
            'tuesday_hours_shifts',
            'wednesday_hours_shifts',
            'thursday_hours_shifts',
            'friday_hours_shifts',
        ]));
    }

}

