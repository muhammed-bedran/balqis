<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthenticatableController extends Controller
{
    //
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('dashboard.pages.two-factor-auth',[
            'user' => $user
        ]);
    }
}
