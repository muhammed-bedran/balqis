<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HrDepartment;
use Illuminate\Http\Request;

class HrController extends Controller
{
    //
    public function index()
    {
        $stats = [
            'departments_count' => HrDepartment::count(),
            //'employees_count' => HrEmployee::count(),
        ];
        return view('dashboard.pages.hr.index', compact('stats'));
    }
}
