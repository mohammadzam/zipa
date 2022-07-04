<?php

namespace Modules\Sick\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Doctor\Entities\Doctor;
use Modules\Doctor\Entities\SectionDoctor;
use Modules\Section\Entities\Section;
use Modules\Sick\Entities\MedicalInformation;
use Modules\Sick\Entities\Sick;
use Modules\Sick\Entities\TimeSick;
use Modules\Sick\Http\Requests\UpdateSickRequest;

class SickController extends Controller
{
   public function index(){
       $page_name = 'Dashboard - Sicks';
       $data = Sick::withoutTrashed()->with('medicalInformation','medicalInformation.section')->get();
       return view('sick::layouts.admin.sicks', compact(['page_name', 'data']));
   }
   public function showMedicalInformation($id){
       $page_name = 'Dashboard - Medical Information';
       $data = MedicalInformation::withoutTrashed()->with('sick', 'section', 'doctor')
           ->where('sick_id', $id)->get();
       if (count($data)>0){
           return view('sick::layouts.admin.MedicalInformationIndex', compact(['page_name', 'data']));
       }
       else{
           alert()->toast('اين بيمار هنوز پرونده پزشکی ندارد', 'error');
           return redirect()->back();
       }
   }
    public function showEditForm($id)
    {
        $data = MedicalInformation::withoutTrashed()->with('sick','section','doctor')->findOrFail($id);
        $doctors = SectionDoctor::withoutTrashed()->with('doctor')
            ->where('section_id',$data->section_id)
            ->get();
        if (!$data) {
            alert()->toast(trans('admin::admin.no_data_found'), 'error');
            return redirect()->back();
        } else {
            $page_name = 'Dashboard - Edit Sick Information';
            return view('sick::layouts.admin.SickEditForm', compact(['data', 'page_name', 'doctors']));
        }

    }

   public function updateEditedInformation(UpdateSickRequest $request, $id){
       $validated = $request->validated();
       if (isset($validated['doctor_id'])){
           $doctor_id = $validated['doctor_id'];
       }else{
           unset($doctor_id);
       }
       MedicalInformation::where('id',$id)->update([
           'status'=>$validated['status'],
           'doctor_id'=>$doctor_id
       ]);
       $sick = MedicalInformation::findOrFail($id);
       alert()->toast(trans('admin::admin.This sick has been successfully updated'), 'success');

       return redirect()->route('admin.show.sick.medical.information',$sick->sick_id);
   }
   public function reservesTimes(){
       $page_name = 'Dashboard - Reserve Times';
       $data = TimeSick::withoutTrashed()->with('doctor','sick')
           ->get();
       for ($i=0;$i<count($data);$i++){
           $times [] = $data[$i]->date.' '.$data[$i]->to;
       }
       for ($i=0;$i<count($data);$i++) {
           $status[] = Carbon::now()->gt($times[$i]);
           $data[$i]->status = $status[$i];
       }
       return view('sick::layouts.admin.ReserveTimes', compact(['page_name', 'data']));
   }
    public function medicalInformationInvoice($id){
        $page_name = 'Dashboard - Medical Information Invoice';

        $data = MedicalInformation::withoutTrashed()->with('sick', 'section', 'section.costs', 'doctor')
            ->findOrFail($id);
        return view('sick::layouts.admin.MedicalInformationInvoice', compact(['page_name', 'data']));

    }

}
