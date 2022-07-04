<?php

namespace Modules\Doctor\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Doctor\Entities\Doctor;
use Modules\Doctor\Entities\SectionDoctor;
use Modules\Doctor\Entities\TimeDoctor;
use Modules\Doctor\Http\Requests\StoreNewDoctorRequest;
use Modules\Doctor\Http\Requests\UpdateDoctorRequest;
use Modules\Financial\Entities\AppointmentCosts;
use Modules\Section\Entities\Section;

class DoctorController extends Controller
{
    public function index()
    {
        $page_name = 'Dashboard - Doctors';
        $data = Doctor::withoutTrashed()->with('role', 'sectionDoctor', 'sectionDoctor.section','costs')->get();
        return view('doctor::layouts.admin.doctors', compact(['page_name', 'data']));
    }

    public function showCreateFrom()
    {
        $page_name = 'Dashboard - Create New Admin';
        $sections = Section::withoutTrashed()->get();
        return view('doctor::layouts.admin.DoctorCreateForm', compact(['page_name', 'sections']));
    }

    public function store(StoreNewDoctorRequest $request)
    {
        $validated = $request->validated();
        $price = str_replace(',', '', $validated['price']);
        $doctor = Doctor::create([
            'name' => $validated['name'],
            'role_id' => 2,
            'status' => $validated['status'],
            'doctor_number' => 'DR' . rand(0, 9999999),
            'password' => Hash::make($validated['password']),
        ]);
        $section = new SectionDoctor();
        $section->section_id = $validated['section_id'];
        $section->doctor_id = $doctor->id;
        $section->save();
        AppointmentCosts::create([
            'doctor_id' => $doctor->id,
            'price' => $price,
        ]);
        alert()->toast(trans('admin::admin.The doctor has been created successfully'), 'success');

        return redirect()->route('admin.show.doctors');
    }

    public function showEditForm($id)
    {
        $data = Doctor::withoutTrashed()->with('role', 'sectionDoctor', 'sectionDoctor.section')->find($id);
        $sections = Section::withoutTrashed()->where('id', '!=', $data->sectionDoctor->section_id)->get();
        if (!$data) {
            alert()->toast(trans('admin::admin.no_data_found'), 'error');
            return redirect()->back();
        } else {
            $page_name = 'Dashboard - Edit Doctor';
            return view('doctor::layouts.admin.DoctorEditForm', compact(['data', 'page_name', 'sections']));
        }

    }

    public function updateEditedDoctor(UpdateDoctorRequest $request, $id)
    {
        $validated = $request->validated();
        $price = str_replace(',', '', $validated['price']);

        if (isset($validated['password'])) {
            Doctor::where('id', $id)->update([
                'password' => Hash::make($validated['password']),
            ]);
        } else {
            unset($validated['password']);
        }
        Doctor::where('id', $id)->update([
            'name' => $validated['name'],
            'status' => $validated['status'],

        ]);
        SectionDoctor::where('doctor_id', $id)->update([
            'section_id' => $validated['section_id']
        ]);
        AppointmentCosts::where('doctor_id',$id)->update([
            'price' => $price,
        ]);
        alert()->toast(trans('admin::admin.This doctor has been successfully updated'), 'success');

        return redirect()->route('admin.show.doctors');

    }

    public function getDoctorTimes($id)
    {
        $page_name = 'Dashboard - Doctor Times';
        $doctor = Doctor::withoutTrashed()->findOrFail($id);
        $saturday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id',$id],
            ['day','شنبه']
        ])->get();
        $sunday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id',$id],
            ['day','یکشنبه']
        ])->get();
        $monday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id',$id],
            ['day','دوشنبه']
        ])->get();
        $tuesday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id',$id],
            ['day','سه شنبه']
        ])->get();
        $wednesday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id',$id],
            ['day','چهارشنبه']
        ])->get();
        $thursday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id',$id],
            ['day','پنج شنبه']
        ])->get();
        $friday = TimeDoctor::withoutTrashed()->where([
            ['doctor_id',$id],
            ['day','جمعه']
        ])->get();
        $count = [
           $saturday->count() ,
            $sunday->count(),
            $monday->count(),
            $tuesday->count(),
            $wednesday->count(),
            $thursday->count(),
            $friday->count(),
        ];
        $colspan = max($count);
        return view('doctor::layouts.admin.doctorTimes', compact(
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

    public function destroy($id)
    {
        Doctor::withoutTrashed()->FindOrFail($id)->delete();
        SectionDoctor::withoutTrashed()->where('doctor_id', $id)->delete();
        AppointmentCosts::withoutTrashed()->where('doctor_id', $id)->delete();
        alert()->toast(trans('admin::admin.This doctor has been deleted successfully'), 'success');
        return redirect()->route('admin.show.doctors');
    }
}
