<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HrDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HrController extends Controller
{
    //
    public function index()
    {
        Gate::authorize('hr.view');
        $stats = [
            'departments_count' => HrDepartment::count(),
            //'employees_count' => HrEmployee::count(),
        ];
        return view('dashboard.pages.hr.index', compact('stats'));
    }
}
