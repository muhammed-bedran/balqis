<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    //
    public function index(){
        $store = Auth::user()->store;
        $members = $store->users()->paginate(); 
        return view('user.pages.team.index',[
            'members' => $members,
            'store' => $store
        ]);
    }
    public function create(){
        $member = new User();
        return view('user.pages.team.create',[
            'member' => $member
        ]);
    }
    public function store(Request $request){
        $store = Auth::user()->store;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'store_id' => $store->id,

        ]);
        return redirect()->route('user.teams.index')
        ->with('success', 'تمت الاضافة بنجاح.');
    }
    public function edit(User $member){
        return view('user.pages.team.edit',[
            'member' => $member
        ]);
    }
    public function show(User $member){
        return view('user.pages.team.show',[
            'member' => $member
        ]);
    }
    public function update(Request $request, User $member){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$member->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        $member->name = $data['name'];
        $member->email = $data['email'];
        if(!empty($data['password']))
            {
                $member->password = Hash::make($data['password']);
            }
        $member->save();
        return redirect()->route('user.teams.index')
        ->with('success', 'تم التعديل بنجاح.');
    }
   
}