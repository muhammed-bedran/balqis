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

    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->hasStore())
            {
                return redirect()->route('user.store.edit');
            }
        $data= $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
        $store= new Store();
        $store->name = $data['name'];
        $store->description = $data['description'];
        $store->status = $data['status'];
        $store->save();
        $user->update([
            'store_id' => $store->id
        ]);
        return redirect()->route('user.store.edit')
        ->with('success', 'تمت الاضافة بنجاح  .');

    }
    public function update(Request $request)
    {
        $user =Auth::user();
        $store = $user->store;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
        $store->name = $data['name'];
        $store->description = $data['description'];
        $store->status = $data['status'];
        $store->save();
        return redirect()->route('user.store.edit')
        ->with('success', 'تم التعديل بنجاح  .');
    }
}
