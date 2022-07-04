<?php

namespace Modules\Section\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Financial\Entities\SurgeryCosts;
use Modules\Section\Entities\Section;
use Modules\Section\Http\Requests\StoreNewSectionRequest;
use Modules\Section\Http\Requests\UpdateSectionRequest;

class SectionController extends Controller
{
    public function index()
    {
        $page_name = 'Dashboard - Sections';
        $data = Section::withoutTrashed()->with('costs')->get();
        return view('section::layouts.sections', compact(['page_name', 'data']));
    }
    public function showCreateFrom(){
        $page_name = 'Dashboard - Create New Section';
        return view('section::layouts.SectionCreateForm',compact(['page_name']));
    }

    public function store(StoreNewSectionRequest $request)
    {
        $validated = $request->validated();
        $price = str_replace(',', '', $validated['price']);
        $section = Section::create([
            'name' => $validated['name'],
        ]);
        SurgeryCosts::create([
            'section_id' => $section->id,
            'price' => $price,
        ]);

        alert()->toast(trans('admin::admin.The section has been created successfully'), 'success');

        return redirect()->route('admin.show.sections');
    }
    public function showEditForm($id)
    {
        $data = Section::with('costs')->find($id);
        if (!$data){
            alert()->toast(trans('admin::admin.no_data_found'), 'error');
            return redirect()->back();
        }else{
            $page_name = 'Dashboard - Edit Section';
            return view('section::layouts.SectionEditForm',compact(['data','page_name']));
        }

    }
    public function updateEditedDoctor(UpdateSectionRequest $request, $id)
    {
        $validated = $request->validated();
        $price = str_replace(',', '', $validated['price']);
        Section::where('id', $id)->update([
            'name' => $validated['name'],
        ]);
        SurgeryCosts::where('section_id',$id)->update([
            'price' => $price,
        ]);

        alert()->toast(trans('admin::admin.This section has been successfully updated'), 'success');

        return redirect()->route('admin.show.sections');

    }
    public function destroy($id)
    {
        $section = Section::withoutTrashed()->FindOrFail($id);
        $section->costs()->delete();
        $section->delete();
        alert()->toast(trans('admin::admin.This section has been deleted successfully'), 'success');
        return redirect()->route('admin.show.sections');
    }
}
