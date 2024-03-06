<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crop;
use App\Models\User;
class MappingController extends Controller
{
    public function index(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        return view('mapping.index', compact('latitude', 'longitude'));
        
    }

    public function showMapInfo()
{
    // Retrieve the necessary data (replace with your actual data retrieval logic)
    $totalCrops = Crop::count(); // Example: Count of all crops in the database
 // Example: Count of rice crops
    $totalRiceCrops = Crop::where('crop_type', 'rice')->count();

    $totalUsers = User::count(); // Example: Count of all users or farmers
    $totalLandArea = Land::sum('area'); // Example: Sum of land areas

    // Pass the data to the view and return the view
    return view('mapInfo', [
        'totalCrops' => $totalCrops,
        'totalRiceCrops' => $totalRiceCrops,
        'totalCornCrops' => $totalCornCrops,
        'totalVegetableCrops' => $totalVegetableCrops,
        'totalCoconutCrops' => $totalCoconutCrops,
        'totalUsers' => $totalUsers,
        'totalLandArea' => $totalLandArea,
    ]);
}

}
