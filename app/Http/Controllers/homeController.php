<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Register;
use illuminate\Support\Facades\Auth;
class homeController extends Controller
{
    public function indexHome(){
if(Auth::id()){
    $usertype=Auth()->user()->usertype;

    if($usertype=='user'){
        return view('dashboard');
    }
    else  if($usertype=='admin'){
        $totalUsers = Register::count();
        $staff = User::where('usertype', 'user')->count();
        return view('admin.adminhome', compact( 'totalUsers','staff'));

    }
    else{
        return redirect()->back();
    }
}
    }
    public function post(){
        return view('post');
    }
    public function Info()
    {
       
        $totalCrops = Register::count();
        $totalRiceCrops = Register::where('crop_type', 'rice')->count();
        $totalCornCrops = Register::where('crop_type', 'corn')->count();
        $totalVegetableCrops = Register::where('crop_type', 'vegetable')->count();
        $totalCoconutCrops = Register::where('crop_type', 'coconut')->count();
        $totalUsers = Register::count(); // Replace 'User' with your actual user model
        $totalLandArea = Register::sum('land_area');
    
        return view('admin.adminhome');
    }

    public function print(Request $request)
    {
        // Check if the checkbox is checked
        $isChecked = $request->has('mark');
    
        // Fetch the insurance data
        $insurance = Register::all(); // Replace YourModel with the actual model name
    
        return view('Insurance', compact('insurance', 'isChecked'));
    }
    
 public function index(){

    return view('profile.edit');
 }
}
