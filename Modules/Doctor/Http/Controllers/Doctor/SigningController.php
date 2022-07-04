<?php

namespace Modules\Doctor\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Doctor\Http\Requests\SignInRequest;

class SigningController extends Controller
{
    protected function guard()
    {
        return Auth::guard('doctor');
    }

    public function index()
    {
        $page_name = "Doctor | sign-in";
        return view('doctor::layouts.doctor.signing', compact('page_name',));
    }

    public function signingIn(SignInRequest $request)
    {
        $validated = $request->validated();
        if (auth()->guard('doctor')->attempt(['doctor_number' => $validated['doctor_number'], 'password' => $validated['password']])) {
            alert()->toast(trans('admin::signing.You have been successfully logged in with your administrative number'), 'success');
            return redirect()->route('doctor.show.dashboard');
        } else {
            alert()->toast(trans('admin::signing.The email or administrative number or password is incorrect'), 'error');
            return redirect()->back()->with(['error' => trans('admin::signing.The email or administrative number or password is incorrect')]);
        }
    }
}
