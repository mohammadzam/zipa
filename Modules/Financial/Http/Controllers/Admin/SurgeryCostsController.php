<?php

namespace Modules\Financial\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Financial\Entities\SurgeryCosts;
use Modules\Section\Entities\Section;
use Modules\Sick\Entities\MedicalInformation;

class SurgeryCostsController extends Controller
{
    public function index()
    {
        $page_name = 'Dashboard - SurgeryCosts';
        $data = SurgeryCosts::withoutTrashed()->with('section')->get();
        return view('financial::layouts.admin.SurgeryCosts.index', compact(['page_name', 'data']));
    }
    public function invoice()
    {
        $page_name = 'Dashboard - SurgeryCostsInvoice';
        $data = MedicalInformation::withoutTrashed()->where('is_payed','true')->with('section','section.costs','doctor','sick')
            ->get();
        if (count($data)>0){
            for ($i=0;$i<count($data);$i++){
                $array_of_prices [] =  $data[$i]->section->costs->price;
            }
        }else{
            $array_of_prices [] = 0;
        }
        return view('financial::layouts.admin.SurgeryCosts.invoice', compact(['page_name', 'data','array_of_prices']));

    }
    public function sectionSurgeryInvoice($id)
    {
        $page_name = 'Dashboard - DoctorAppointmentCostsInvoice';
        $data = MedicalInformation::withoutTrashed()->where([
            ['is_payed','true'],
            ['section_id',$id],
        ])->with('section','section.costs','doctor','sick')
            ->get();
        $sec = Section::withoutTrashed()->findOrFail($id);
        if (count($data)>0){
            for ($i=0;$i<count($data);$i++){
                $array_of_prices [] =  $data[$i]->section->costs->price;
            }
        }else{
            $array_of_prices [] = 0;
        }
        return view('financial::layouts.admin.SurgeryCosts.sectionSurgeryInvoice', compact(['page_name', 'data','array_of_prices','sec']));

    }
}
