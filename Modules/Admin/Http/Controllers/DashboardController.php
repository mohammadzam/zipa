<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected function guard()
    {
        return Auth::guard('admin');

    }
    protected function prefix(){
        return 'admin';
    }

    public function index()
    {
        $page_name = 'Dashboard - Admin';

        return view('panel::include.master', compact([
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
