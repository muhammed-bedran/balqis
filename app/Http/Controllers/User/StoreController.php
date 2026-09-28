<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    //
    public function create()
    {
        if(Auth::user()->hasStore()){
            return redirect()->route('user.store.edit');
        }
        $store = new Store();
        return view('user.pages.store.create',[
            'store' => $store
        ]);
    }
    public function edit()
    {
       $store = Auth::user()->store;
       return view('user.pages.store.edit',[
           'store' => $store
       ]);
    }
}
