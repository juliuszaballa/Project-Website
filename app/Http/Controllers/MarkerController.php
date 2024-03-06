<?php

// app/Http/Controllers/MarkerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\User;
use App\Models\Coconut;
use App\Models\Corn;
use App\Models\Harvest;
class MarkerController extends Controller
{
    public function index()
    {
        $markers = Register::all();
 
        return response()->json($markers);
    }
    public function map()
    {
        return view('mapInfo'); // Assuming you have a view named "mapping.blade.php"
    }
    public function showMapInfo()
    {
        $harvests = Harvest::all();
        $harvests = Harvest::orderBy('harvest_date', 'asc')->get();
        $coconutharvests = Coconut::all();
        $coconutharvests = Coconut::orderBy('coconutharvest_date', 'asc')->get();
        $cornharvests = Corn::all();
        $cornharvests = Corn::orderBy('cornharvest_date', 'asc')->get();
        $totalCrops = Register::count();
        $totalRiceCrops = Register::where('crop_type', 'rice')->count();
        $totalCornCrops = Register::where('crop_type', 'corn')->count();
        $totalVegetableCrops = Register::where('crop_type', 'vegetable')->count();
        $totalCoconutCrops = Register::where('crop_type', 'coconut')->count();
        $totalUsers = Register::count(); // Replace 'User' with your actual user model
        $totalLandArea = Register::sum('land_area');
     
        $staff = User::where('usertype', 'user')->count();
        return view('navigation.mapInfo', compact('harvests','staff','coconutharvests','cornharvests', 'totalCrops', 'totalRiceCrops', 'totalCornCrops', 'totalVegetableCrops', 'totalCoconutCrops', 'totalUsers', 'totalLandArea'));
    }
    

    public function index2()
    {
        $accounts = Register::orderBy('surname')->get();
        // Replace these values with the actual latitude and longitude you want to pass to the view
        $latitude = 13.321667544312621;
        $longitude = 123.30072661347106;
        $zoom = 14;
        
        // Use compact for the variables you want to compact
        return view('mapping.index', compact('latitude', 'longitude', 'zoom', 'accounts'));
    }
    
public function searchUsers(Request $request)
{
    $query = $request->input('query');
    
    // Perform the search query on your database
    $users = User::where('name', 'like', '%' . $query . '%')->get();
    
    return response()->json($users);
}

}
