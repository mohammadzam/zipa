<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Http\Requests\StoreNewAdminRequest;
use Modules\Admin\Http\Requests\UpdateAdminRequest;
use Modules\Panel\Entities\Role;

class AdminController extends Controller
{

    public function index()
    {
        $page_name = 'Dashboard - Admins';
        $data = Admin::withoutTrashed()->with('role')->get();
        return view('admin::layouts.admins', compact(['page_name', 'data']));
    }
    public function showCreateFrom(){
        $page_name = 'Dashboard - Create New Admin';
        $roles = Role::withoutTrashed()->get();
        return view('admin::layouts.AdminCreateForm',compact(['page_name','roles']));
    }
    public function store(StoreNewAdminRequest $request)
    {
        $validated = $request->validated();
        Admin::create([
            'name' => $validated['name'],
            'role_id' => 1,
            'status' => $validated['status'],
            'administrative_number' => 'AD'.rand(0,9999999),
            'password' => Hash::make($validated['password']),
        ]);
        alert()->toast(trans('admin::admin.The admin has been created successfully'), 'success');

        return redirect()->route('admin.show.admins');
    }
    public function showEditForm($id)
    {
        if ($id == 1){
            alert()->toast(trans('admin::admin.you_can_not_edit_this_admin'), 'error');

            return redirect()->route('admin.show.admins');
        }
        if ($id == auth()->id()){
            alert()->toast(trans('admin::admin.You do not have permission to edit your account ask the main admin to edit your account'), 'error');
            return redirect()->route('admin.show.admins');
        }
        $data = Admin::with('role')->find($id);

        if (!$data){
            alert()->toast(trans('admin::admin.no_data_found'), 'error');
            return redirect()->back();
        }else{
            $page_name = 'Dashboard - Edit Admin';
            return view('admin::layouts.AdminEditForm',compact(['data','page_name']));
        }

    }
    public function updateEditedAdmin(UpdateAdminRequest $request, $id)
    {
        if ($id == 1){
            alert()->toast(trans('admin::admin.you_can_not_edit_this_admin'), 'error');
            return redirect()->route('admin.show.admins');
        }
        $validated = $request->validated();

        if(isset($validated['password'])){
            Admin::where('id', $id)->update([
                'password' => Hash::make($validated['password']),
            ]);
        }
        else{
            unset($validated['password']);
        }
        Admin::where('id', $id)->update([
            'name' => $validated['name'],
            'status' => $validated['status'],

        ]);
        alert()->toast(trans('admin::admin.This admin has been successfully updated'), 'success');

        return redirect()->route('admin.show.admins');

    }
    public function destroy($id)
    {
        if ($id == 1){
            alert()->toast(trans('admin::admin.you_can_not_delete_this_admin'), 'error');

            return redirect()->route('admin.show.admins');
        }
        if ($id == auth()->id()){
            alert()->toast(trans('admin::admin.You do not have permission to delete your account ask the main admin to delete your account'), 'error');
            return redirect()->route('admin.show.admins');
        }
        Admin::withoutTrashed()->FindOrFail($id)->delete();
        alert()->toast(trans('admin::admin.This admin has been deleted successfully'), 'success');

        return redirect()->route('admin.show.admins');
    }
}
