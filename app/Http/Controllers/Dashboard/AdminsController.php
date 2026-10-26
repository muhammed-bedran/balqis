<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Melbedran\RolePermession\Models\Role;

class AdminsController extends Controller
{
    //
    public function index(){

        return view('dashboard.pages.admins.index',[
            'admins'=>Admin::all(),
        ]);
    }
    protected function roles()
    {
        return Role::query()->orderBy('name')->get();
    }
    public function create()
    {
        return view('dashboard.pages.admins.create',[
            'roles'=>$this->roles(),
            'admin' => new Admin,

        ]);
    }

}
