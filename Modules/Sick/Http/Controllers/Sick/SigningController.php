<?php

namespace Modules\Sick\Http\Controllers\Sick;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Doctor\Entities\Doctor;
use Modules\Doctor\Entities\SectionDoctor;
use Modules\Section\Entities\Section;
use Modules\Sick\Entities\MedicalInformation;
use Modules\Sick\Entities\Sick;
use Modules\Sick\Http\Requests\RegistrationRequest;
use Modules\Sick\Http\Requests\SignInRequest;

class SigningController extends Controller
{
    protected function guard()
    {
        return Auth::guard('sick');
    }

    public function index()
    {
        $page_name = "Sick sign-in";
        return view('sick::layouts.sick.signing', compact('page_name',));
    }
    public function ShowRegistrationPage()
    {
        $page_name = "Sick sign-up";
        $sections = Section::withoutTrashed()->get();
        return view('sick::layouts.sick.registration', compact('page_name','sections'));
    }
    public function registration(RegistrationRequest $request){
        $validated = $request->validated();
        $sick = Sick::create([
            'name' => $validated['name'],
            'sick_number' => 'SK'.rand(0,9999999),
            'role_id' => 3,
            'age' =>$validated['age'] ,
            'sex' =>$validated['sex'] ,
            'password' => Hash::make($validated['password']),

        ]);
        $this->guard()->login($sick);
        alert()->toast(trans('sick::signing.You have been successfully signing up'), 'success');
        return redirect()->route('sick.show.my.information');

    }

    public function signingIn(SignInRequest $request)
    {
        $validated = $request->validated();

        if (auth()->guard('sick')->attempt(['sick_number' => $validated['sick_number'], 'password' => $validated['password']])) {
            alert()->toast(trans('admin::signing.You have been successfully logged in with your administrative number'), 'success');
            return redirect()->route('sick.show.dashboard');
        } else {
            alert()->toast(trans('admin::signing.The email or administrative number or password is incorrect'), 'error');
            return redirect()->back()->with(['error' => trans('admin::signing.The email or administrative number or password is incorrect')]);
        }
    }
}
