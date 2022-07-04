<?php

namespace Modules\Sick\Http\Controllers\Sick;

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Doctor\Entities\Doctor;
use Modules\Doctor\Entities\TimeDoctor;
use Modules\Financial\Entities\AppointmentCosts;
use Modules\Financial\Entities\SurgeryCosts;
use Modules\Section\Entities\Section;
use Modules\Sick\Entities\MedicalInformation;
use Modules\Sick\Entities\Sick;
use Modules\Sick\Entities\TimeSick;
use Modules\Sick\Http\Requests\StoreNewMedicalFileRequest;
use Modules\Sick\Http\Requests\StoreNewReserveRequest;
use Modules\Sick\Http\Requests\UpdateEditedMedicalFileRequest;
use Modules\Sick\Http\Requests\UpdateMyInformationRequest;

class SickController extends Controller
{

    /**
     * Start Personl sick Information
     *
     * show , create edit
     **/

    public function index()
    {
        $page_name = 'Dashboard - Sicks';
        $data = Sick::withoutTrashed()->find(auth()->user()->id);
        return view('sick::layouts.sick.SickInformation', compact(['page_name', 'data']));
    }

    public function updateMyInformation(UpdateMyInformationRequest $request)
    {
        $validated = $request->validated();
        if (isset($validated['password'])) {
            Sick::where('id', auth()->user()->id)->update([
                'password' => Hash::make($validated['password']),
            ]);
        } else {
            unset($validated['password']);
        }
        Sick::where('id', auth()->user()->id)->update([
            'name' => $validated['name'],
        ]);
        alert()->toast(trans('admin::admin.This sick has been successfully updated'), 'success');

        return redirect()->route('sick.show.my.information');
    }


    /**
     * Start Medical Information
     *
     * show , create , store , edit ,delete
     **/
    public function medicalInformationIndex()
    {
        $page_name = 'Dashboard - Medical Information';
        $data = MedicalInformation::withoutTrashed()->with('sick', 'section', 'doctor')
            ->where('sick_id', auth()->user()->id)->get();
        return view('sick::layouts.sick.MedicalInformationIndex', compact(['page_name', 'data']));
    }
    public function medicalInformationInvoice($id){
        $page_name = 'Dashboard - Medical Information Invoice';

        $data = MedicalInformation::withoutTrashed()->with('sick', 'section', 'section.costs', 'doctor')
            ->where([
                ['id', $id],
                ['sick_id', auth()->user()->id],
            ])->first();
        if (isset($data) and $data->count()>0){
            return view('sick::layouts.sick.MedicalInformationInvoice', compact(['page_name', 'data']));
        }else{
            alert()->toast('اطلاعاتى يافت نشده', 'error');
            return redirect()->back();
        }

    }
    public function newMedicalIFile()
    {
        $page_name = 'Dashboard - Create New Medical File';
        $sections = Section::withoutTrashed()->get();
        return view('sick::layouts.sick.createNewMedicalFileForm', compact(['page_name', 'sections']));
    }

    public function storeNewMedicalFile(StoreNewMedicalFileRequest $request)
    {
        $validated = $request->validated();
        if (isset($validated['description'])) {
            $description = $validated['description'];
        } else {
            $description = null;
        }
        MedicalInformation::create([
            'sick_id' => auth()->user()->id,
            'section_id' => $validated['section_id'],
            'doctor_id' => null,
            'disease' => $validated['disease'],
            'treatment' => $validated['treatment'],
            'description' => $description,
        ]);

        alert()->toast('پرونده پزشکی جدید شما با موفقیت اضافه شد', 'success');
        return redirect()->route('sick.show.my.medical.information.index');
    }

    public function editMedicalIFileForm($id)
    {
        $page_name = 'Dashboard - Edit Medical File';
        $data = MedicalInformation::withoutTrashed()->with('section')
            ->where('sick_id', auth()->user()->id)->find($id);
        $sections = Section::withoutTrashed()->where('id', '!=', $data->section->id)->get();
        return view('sick::layouts.sick.editMedicalFileForm', compact(['page_name', 'sections', 'data']));
    }

    public function updateEditedMedicalFile(UpdateEditedMedicalFileRequest $request, $id)
    {
        $validated = $request->validated();
        if (isset($validated['description'])) {
            $description = $validated['description'];
        } else {
            $description = null;
        }
        $data = MedicalInformation::withoutTrashed()->findOrFail($id);
        $data->update([
            'section_id' => $validated['section_id'],
            'doctor_id' => $data->doctor_id,
            'disease' => $validated['disease'],
            'treatment' => $validated['treatment'],
            'description' => $description,
        ]);


        alert()->toast('پرونده پزشکی جدید شما با موفقیت به روز رسانى شد', 'success');
        return redirect()->route('sick.show.my.medical.information.index');
    }

    public function medicalFileDestroy($id)
    {
        MedicalInformation::withoutTrashed()->findOrFail($id)->delete();
        alert()->toast('پرونده پزشکی جدید شما با موفقیت حذف شد', 'success');
        return redirect()->route('sick.show.my.medical.information.index');
    }

    /**
     * Start reserve time  start
     *
     * show , create , store , delete
     **/
    public function myTime()
    {
        $page_name = 'Dashboard - Sick Times';
        $data = TimeSick::withoutTrashed()->with('doctor')
            ->where('sick_id', auth()->user()->id)->get();
        for ($i = 0; $i < count($data); $i++) {
            $times [] = $data[$i]->date . ' ' . $data[$i]->to;
        }
        for ($i = 0; $i < count($data); $i++) {
            $status[] = Carbon::now()->gt($times[$i]);
            $data[$i]->status = $status[$i];
        }
        return view('sick::layouts.sick.SickTimes', compact(['page_name', 'data']));
    }

    public function showCreateNewReserveForm()
    {
        $page_name = 'Dashboard - Sick Times';
        $doctors = Doctor::withoutTrashed()->get();
        return view('sick::layouts.sick.newReserveForm', compact(['page_name', 'doctors']));
    }

    public function storeNewReserve(StoreNewReserveRequest $request)
    {
        $validated = $request->validated();
        $day = verta($validated['date'])->formatWord('l');
        $exploded_date = explode('/', $validated['date']);

        $gregorian_date = Verta::getGregorian($exploded_date[0], $exploded_date[1], $exploded_date[2]);
        $imploded_date = implode('-', $gregorian_date);
        $to = Carbon::parse($validated['from'])->addMinutes(30);
        $doctor_with_another_sick = TimeSick::withoutTrashed()->where([
            ['doctor_id', $validated['doctor_id']],
            ['date', $imploded_date],
            ['from', $validated['from']],
        ])->get();
        if (isset($doctor_with_another_sick) and $doctor_with_another_sick->count() > 0) {
            $sec1 = " دكتر در روز ";
            $sec2 = $validated['date'];
            $sec3 = " ودر تايم ";
            $sec4 = $validated['from'];
            $sec5 = " نوبتى ديگرى دارد ";
            $msg = $sec1 . $sec2 . $sec3 . $sec4 . $sec5;
            alert()->toast($msg, 'error');
            return redirect()->route('sick.create.new.reserve');
        } else {
            $times_doctor = TimeDoctor::withoutTrashed()->where([
                ['doctor_id', $validated['doctor_id']],
                ['day', $day],

            ])->get();
            if (isset($times_doctor) and count($times_doctor) > 0) {
                for ($i = 0; $i < count($times_doctor); $i++) {
                    $doctor_from_times [] = $times_doctor[$i]->from;
                    $doctor_to_times [] = $times_doctor[$i]->to;

                    $check_from_time_doctor [] = Carbon::parse($validated['from'])->greaterThan($doctor_from_times[$i]);
                    $check_to_time_doctor [] = $to->lessThan($doctor_to_times[$i]);
                }
                for ($i = 0; $i < count($times_doctor); $i++) {
                    if ($check_from_time_doctor[$i] == true and $check_to_time_doctor[$i] == false) {
                        $doctor_is_there = "no";
                    } elseif ($check_from_time_doctor[$i] == true and $check_to_time_doctor[$i] == true) {
                        $doctor_is_there = 'yes';
                    } elseif ($check_from_time_doctor[$i] == false and $check_to_time_doctor[$i] == true) {
                        if (array_sum($check_from_time_doctor) == 0) {
                            $doctor_is_there = 'no';
                        } elseif (array_sum($check_to_time_doctor) == 2) {
                            $doctor_is_there = 'yes';
                        } else {
                            $doctor_is_there = 'no';
                        }
                    }

                }

                if ($doctor_is_there == 'yes') {
                    $time = TimeSick::create([
                        'sick_id' => auth()->user()->id,
                        'doctor_id' => $validated['doctor_id'],
                        'date' => $imploded_date,
                        'from' => $validated['from'],
                        'to' => $to->format('H:s'),
                    ]);
                    alert()->toast('نوبت با موفقيت ثيت شد', 'success');
                    return redirect()->route('sick.pay.price.of.doctor.visit', ['id' => $time->id, 'sick' => $time->sick_id, 'doctor' => $time->doctor_id]);
                } else {
                    $sec1 = " دكتر در روز ";
                    $sec2 = $validated['date'];
                    $sec3 = " ودر تايم ";
                    $sec4 = $validated['from'];
                    $sec5 = " در مطب تشريف ندارند ";
                    $msg = $sec1 . $sec2 . $sec3 . $sec4 . $sec5;
                    alert()->toast($msg, 'error');
                    return redirect()->route('sick.create.new.reserve');
                }
            } else {
                alert()->toast("دكنر در روز مورخ: " . $validated['date'] . " مطب تشريف ندارد", 'error');

                return redirect()->route('sick.create.new.reserve');

            }

        }

    }

    public function PayPriceOfDoctorVisit($id, $sick, $doctor)
    {
        $data = AppointmentCosts::withoutTrashed()->where('doctor_id', $doctor)->with('doctor')->first();
        if (!$data) {
            alert()->toast('عمليات با خطا مواجه شد، لطفا دوباره تلاش كنيد، يا سعى كنيد نوبتى ديگرى رزرو كنيد', 'error');
            return redirect()->back();
        } else {
            $sick = Sick::withoutTrashed()->find($sick);
            return view('sick::layouts.sick.payDoctorVisit', compact(['data', 'sick', 'id']));
        }


    }

    public function payVisitAmount($id)
    {
        TimeSick::withoutTrashed()->where('id', $id)->update([
            'is_payed' => 'true',
        ]);
        alert()->toast('عمليات پرداخت با موفقيت انجام شد', 'success');

        return redirect()->route('sick.my.time');
    }


    public function PayPriceOfMedicalOperation($id)
    {
        $data = MedicalInformation::withoutTrashed()->with('doctor', 'sick', 'section')->findOrFail($id);
        $price = SurgeryCosts::withoutTrashed()->where('section_id', $data->section_id)->first();
        return view('sick::layouts.sick.payMedicalOperation', compact(['data','price']));


    }
    public function payMedicalOperationAmount($id){
        MedicalInformation::withoutTrashed()->where('id', $id)->update([
            'is_payed' => 'true',
        ]);
        alert()->toast('عمليات پرداخت با موفقيت انجام شد', 'success');

        return redirect()->route('sick.show.my.medical.information.index');
    }

    public function destroy($id)
    {

        TimeSick::withoutTrashed()->FindOrFail($id)->delete();
        alert()->toast('اين نوبت با موفقيت حذف شد', 'success');
        return redirect()->route('sick.my.time');
    }
}
