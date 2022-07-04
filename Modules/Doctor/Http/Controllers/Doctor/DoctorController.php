<?php

namespace Modules\Doctor\Http\Controllers\Doctor;

use Carbon\Carbon;
use Cassandra\Time;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Doctor\Entities\Doctor;
use Modules\Doctor\Entities\SectionDoctor;
use Modules\Doctor\Entities\TimeDoctor;
use Modules\Doctor\Http\Requests\SelectCustomRangeRequest;
use Modules\Doctor\Http\Requests\StoreNewTimeRequest;
use Modules\Doctor\Http\Requests\UpdateMyInformationRequest;
use Modules\Doctor\Http\Requests\UpdateSickStatusRequest;
use Modules\Financial\Entities\AppointmentCosts;
use Modules\Financial\Entities\SurgeryCosts;
use Modules\Sick\Entities\MedicalInformation;
use Modules\Sick\Entities\TimeSick;

class DoctorController extends Controller
{
    public function index()
    {
        $page_name = 'Dashboard - Doctors';
        $data = Doctor::withoutTrashed()->with('sectionDoctor.section', 'costs')->find(auth()->user()->id);
        return view('doctor::layouts.doctor.DoctorInformation', compact(['page_name', 'data']));
    }

    public function updateMyInformation(UpdateMyInformationRequest $request)
    {
        $validated = $request->validated();
        if (isset($validated['password'])) {
            Doctor::where('id', auth()->user()->id)->update([
                'password' => Hash::make($validated['password']),
            ]);
        } else {
            unset($validated['password']);
        }
        Doctor::where('id', auth()->user()->id)->update([
            'name' => $validated['name'],
        ]);
        alert()->toast(trans('admin::admin.This doctor has been successfully updated'), 'success');

        return redirect()->route('doctor.show.my.information');
    }

    public function getMyWorkPlan()
    {
        $page_name = 'Dashboard - Doctor My Work Plan';
        $doctor = Doctor::withoutTrashed()->findOrFail(auth()->user()->id);
        $saturday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id', auth()->user()->id],
            ['day', 'شنبه']
        ])->orderBy('from')->get();
//        dd($saturday);
        $sunday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id', auth()->user()->id],
            ['day', 'یکشنبه']
        ])->orderBy('from')->get();
        $monday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id', auth()->user()->id],
            ['day', 'دوشنبه']
        ])->orderBy('from')->get();
        $tuesday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id', auth()->user()->id],
            ['day', 'سه شنبه']
        ])->orderBy('from')->get();
        $wednesday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id', auth()->user()->id],
            ['day', 'چهارشنبه']
        ])->orderBy('from')->get();
        $thursday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id', auth()->user()->id],
            ['day', 'پنج شنبه']
        ])->orderBy('from')->get();
        $friday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id', auth()->user()->id],
            ['day', 'جمعه']
        ])->orderBy('from')->get();
        $count = [
            $saturday->count(),
            $sunday->count(),
            $monday->count(),
            $tuesday->count(),
            $wednesday->count(),
            $thursday->count(),
            $friday->count(),
        ];
        $colspan = max($count);
//        dd(
//            $saturday,
//            $sunday,
//            $monday,
//            $tuesday,
//            $wednesday,
//            $thursday,
//            $friday,
//            $colspan,
//        );
        return view('doctor::layouts.doctor.myWorkPlan', compact(
            [
                'page_name',
                'saturday',
                'sunday',
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
                'colspan',
                'doctor',
            ]));

    }

    public function showCreateNewTimeForm()
    {
        $page_name = 'Dashboard - Doctors';
        return view('doctor::layouts.doctor.createNewTimeForm', compact(['page_name']));

    }

    public function storeNewTime(StoreNewTimeRequest $request)
    {
        $validated = $request->validated();

        $currently_time = TimeDoctor::withoutTrashed()->where([
            ['doctor_id', auth()->user()->id],
            ['day', $validated['day']],
        ])->get();
        if (!$currently_time) {
            TimeDoctor::create([
                'doctor_id' => auth()->user()->id,
                'day' => $validated['day'],
                'from' => $validated['from'],
                'to' => $validated['to'],
            ]);
            alert()->toast('اين شيفت كارى با موفقيت ثبت شد', 'success');
            return redirect()->route('doctor.getMyWorkPlan');
        } else {
            $startTimeRequested = strtotime($validated['from']);
            $endTimeRequested = strtotime($validated['to']);
            $is_overlap = false;
            foreach ($currently_time as $time) {
                $startTime = strtotime($time->from);
                $endTime = strtotime($time->to);
                if (
                    (
                        $startTime >= $startTimeRequested &&
                        $startTime <= $endTimeRequested &&

                        $endTime >= $startTimeRequested &&
                        $endTime <= $endTimeRequested

                    ) ||
                    (
                        $endTimeRequested > $startTime &&
                        $endTimeRequested < $endTime


                    ) ||
                    (
                        $startTimeRequested > $startTime &&
                        $startTimeRequested < $endTime

                    )
                ) {
                    $is_overlap = true;
                    break;
                } else {
                    $is_overlap = false;
                }
            }
            /**
             * //         this code for handling $is_overlap:
             * dd($is_overlap);
             * if ($is_overlap == "no"){
             * dd('no');
             * }else{
             * dd('yes');
             * }
             * dd($is_overlap?"no":"yes");
             */

            if ($is_overlap == "true") {
                alert()->toast('اين شيفت با يكى از شيفت هاى قبلى تلاقى دارد', 'error');
                return redirect()->back();
            } else {
                TimeDoctor::create([
                    'doctor_id' => auth()->user()->id,
                    'day' => $validated['day'],
                    'from' => $validated['from'],
                    'to' => $validated['to'],
                ]);
                alert()->toast('اين شيفت كارى با موفقيت ثبت شد', 'success');
                return redirect()->route('doctor.getMyWorkPlan');
            }
        }


    }

    public function getMyVisit()
    {
        $page_name = 'Dashboard - Doctor Reservation';
        $data = TimeSick::withoutTrashed()->with('sick')
            ->where('doctor_id', auth()->user()->id)->get();
        for ($i = 0; $i < count($data); $i++) {
            $times [] = $data[$i]->date . ' ' . $data[$i]->to;
        }
        for ($i = 0; $i < count($data); $i++) {
            $status[] = Carbon::now()->gt($times[$i]);
            $data[$i]->status = $status[$i];
        }
        return view('doctor::layouts.doctor.myReservations', compact(['page_name', 'data']));
    }

    public function getMySicks()
    {
        $page_name = 'Dashboard - Doctor - MY Sicks';
        $data = MedicalInformation::withoutTrashed()->with('sick')
            ->where('doctor_id', auth()->user()->id)->get();
        return view('doctor::layouts.doctor.mySicks', compact(['page_name', 'data']));
    }

    public function updateSickStatus(UpdateSickStatusRequest $request, $id)
    {
        $validated = $request->validated();
        MedicalInformation::withoutTrashed()->findOrFail($id)->update([
            'status' => $validated['status'],
        ]);
        alert()->toast('وضعيت بيمار با موفقيت به روز شد', 'success');
        return redirect()->route('doctor.getMySicks');


    }

    public function showSelectRangeDatePage()
    {
        $page_name = 'Dashboard - Doctor - Choose Range Date';
        return view('doctor::layouts.doctor.selectCustomRange', compact(['page_name']));

    }

    public function showMySalaryReceipt(SelectCustomRangeRequest $request)
    {
        $validated = $request->validated();
        $page_name = 'Dashboard - Doctor - My Salary Receipt';
        $exploded_start_date = explode('/', $validated['start']);
        $exploded_end_date = explode('/', $validated['end']);
        $gregorian_start_date = Verta::getGregorian($exploded_start_date[0], $exploded_start_date[1], $exploded_start_date[2]);
        $gregorian_end_date = Verta::getGregorian($exploded_end_date[0], $exploded_end_date[1], $exploded_end_date[2]);
        $imploded_start_date = implode('-', $gregorian_start_date) . ' 00:00:00 ';
        $imploded_end_date = implode('-', $gregorian_end_date) . ' 23:59:59';

        /**
         * calculate amount from visits
          Equal to the number of accepted and paid visits multiplied by 50% of the price of each visit
        مساوی با تعداد ويزيت هاي پذيرفته شده و پرداخت شده ضرب در 50% قيمت هر ويزيت
         */
        $visits = TimeSick::withoutTrashed()->with(
            'sick',
        )
            ->where([
                ['created_at', '>=', $imploded_start_date],
                ['created_at', '<=', $imploded_end_date],
                ['is_payed', '=', 'true'],
                ['doctor_id', '=', auth()->user()->id],
            ])->get();
        if (count($visits) < 1){
            $hours_of_visits [] = 0;
        }else{
            for ($i = 0; $i < count($visits); $i++) {
                $hours_of_visits [] = Carbon::parse($visits[$i]->from)->floatDiffInHours($visits[$i]->to);
            }
        }

        $count_of_visits_hours = array_sum($hours_of_visits);


        $visits_amount = AppointmentCosts::withoutTrashed()->where('doctor_id', auth()->user()->id)->first();
        $total_amount_from_visits = $visits->count() * $visits_amount->price;
        $final_amount_from_visits = $total_amount_from_visits * 50 / 100;

        /**
         * calculate amount from shifts
         *  Equivalent to the number of working shift hours for this doctor multiplied by 25% of the price of each visit to this doctor
        برابر با تعداد ساعت هاي شيفت هاي كاري اين دكتر ضربدر 25% قیمت هر بازديد نزد اين دكتر
         */
        $shifts = TimeDoctor::withoutTrashed()->where([
            ['doctor_id', '=', auth()->user()->id],
        ])->get();
        if (count($shifts) < 1){
            $hours [] = 0;
        }else{
            for ($i = 0; $i < count($shifts); $i++) {
                $hours [] = Carbon::parse($shifts[$i]->from)->floatDiffInHours($shifts[$i]->to);
            }
        }

        $total_shifts_hours = array_sum($hours);
        $final_amount_from_shifts = $total_shifts_hours * $visits_amount->price * 25 / 100;

        /**
         * calculate amount from medical operations
         * Equivalent to the number of surgeries performed by this doctor multiplied by 75% of the price of this surgery
        معادل تعداد عمل هاى جراحى انجام شده توسط اين دكتر ضرب در 75% قيمت اين عمل جراحى
         */

        $medical_operations = MedicalInformation::withoutTrashed()->with(
            'sick',
            'section',
        )->where([
            ['created_at', '>=', $imploded_start_date],
            ['created_at', '<=', $imploded_end_date],
            ['is_payed', '=', 'true'],
            ['doctor_id', '=', auth()->user()->id],
        ])->get();
        $section = SectionDoctor::withoutTrashed()->where('doctor_id', auth()->user()->id)->first();

        $operation_amount = SurgeryCosts::withoutTrashed()->where('section_id', $section->section_id)->first();
        $total_amount_from_medical_operation = $medical_operations->count() * $operation_amount->price;
        $final_amount_from_medical_operation  = $total_amount_from_medical_operation * 75 / 100;

        return view('doctor::layouts.doctor.invoice', compact([
            'page_name',


            'visits',
            'visits_amount',


            'shifts',
            'total_shifts_hours',


            'medical_operations',
            'operation_amount',


            'count_of_visits_hours',
            'final_amount_from_visits',
            'final_amount_from_shifts',
            'final_amount_from_medical_operation',


            'imploded_start_date',
            'imploded_end_date',
        ]));

    }
}
