<?php

namespace Modules\Financial\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Doctor\Entities\Doctor;
use Modules\Financial\Entities\AppointmentCosts;
use Modules\Sick\Entities\MedicalInformation;
use Modules\Sick\Entities\TimeSick;

class AppointmentCostsController extends Controller
{
   public function index(){
       $page_name = 'Dashboard - AppointmentCosts';
       $data = AppointmentCosts::withoutTrashed()->with('doctor')->get();
       return view('financial::layouts.admin.AppointmentCosts.index', compact(['page_name', 'data']));
   }
    public function invoice()
    {
        $page_name = 'Dashboard - AppointmentCostsInvoice';
        $data = TimeSick::withoutTrashed()->where('is_payed','true')->with('doctor.costs','doctor','sick')
            ->get();
        if (count($data)>0){
            for ($i=0;$i<count($data);$i++){
                $array_of_prices [] =  $data[$i]->doctor->costs->price;
            }
        }else{
            $array_of_prices [] = 0;
        }
        return view('financial::layouts.admin.AppointmentCosts.invoice', compact(['page_name', 'data','array_of_prices']));

    }
    public function doctorVisitsInvoice($id)
    {
        $page_name = 'Dashboard - DoctorAppointmentCostsInvoice';
        $data = TimeSick::withoutTrashed()->where([
            ['is_payed','true'],
            ['doctor_id',$id],
        ])->with('doctor.costs','doctor','sick')
            ->get();
        $doc = Doctor::withoutTrashed()->findOrFail($id);
        if (count($data)>0){
            for ($i=0;$i<count($data);$i++){
                $array_of_prices [] =  $data[$i]->doctor->costs->price;
            }
        }else{
            $array_of_prices [] = 0;
        }
        return view('financial::layouts.admin.AppointmentCosts.doctorVisitsInvoice', compact(['page_name', 'data','array_of_prices','doc']));

    }
}
