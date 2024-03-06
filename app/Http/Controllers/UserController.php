<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Register;

class UserController extends Controller
{
    public function userIndex()
    {
        $users = User::all();
        return view('navigation.user', compact('users'));
    }
   
    public function account($id){
        $data = Register::where('id','=',$id)->first();
   
        return view('profile',compact('data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'position' => 'required',
        ]);
    
        $user = User::find($request->input('user_id'));
    
        if ($user) {
            $user->position = $request->input('position');
            $user->save();
    
            return redirect()->back()->with('success', 'Position updated successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }
    public function login()
    {
        return view('auth.log-in');
    }
}
