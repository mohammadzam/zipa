<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\Admin\Http\Requests\SignInRequest;

class SigningController extends Controller
{
    protected function guard()
    {
        return Auth::guard('admin');
    }
  public function index(){
      $page_name = "sign-in";
      return view('admin::layouts.signing',compact('page_name'));
  }
    public function signingIn(SignInRequest $request)
    {
        $validated = $request->validated();

        if (auth()->guard('admin')->attempt(['administrative_number' => $validated['administrative_number'], 'password' =>$validated['password']])) {
            alert()->toast(trans('admin::signing.You have been successfully logged in with your administrative number'), 'success');
            return redirect()->route('admin.show.dashboard');
        }
        else {
            alert()->toast(trans('admin::signing.The email or administrative number or password is incorrect'), 'error');
            return redirect()->back()->with(['error' => trans('admin::signing.The email or administrative number or password is incorrect')]);
        }
    }
}
