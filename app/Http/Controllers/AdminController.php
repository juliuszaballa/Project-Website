<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\activityLog;
class AdminController extends Controller
{
    public function destroy($id)
    {
        
        User::where('id','=',$id)->delete();
     return redirect()->back()->with('success','Staff deleted Successfully');
    }

    public function showForm()
    {
        return view('admin.staffReg'); 
    }

    public function postRegistration(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string',
            'position' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new user
        $user = new User;
        $user->name = $request->input('name');
        $user->middle_name = $request->input('middle_name');
        $user->surname = $request->input('surname');
        $user->position = $request->input('position');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Redirect to a success page or wherever you want
        return redirect()->back()->with('success', 'Registration successful!');
    }
}
