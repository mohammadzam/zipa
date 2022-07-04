<?php

namespace Modules\Doctor\Http\Controllers\Doctor;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected function guard()
    {
        return Auth::guard('doctor');

    }
    protected function prefix(){
        return 'doctor';
    }

    public function index()
    {
        $page_name = 'Dashboard - Doctor';

        return view('panel::include.doctor.master', compact([
            'page_name',
        ]));
    }
    public function Logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('panel/'.$this->prefix().'/sign-in');

    }

}
