<?php

namespace Modules\Sick\Http\Controllers\Sick;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected function guard()
    {
        return Auth::guard('sick');

    }
    protected function prefix(){
        return 'sick';
    }

    public function index()
    {
        $page_name = 'Dashboard - Sick';

        return view('panel::include.sick.master', compact([
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
