<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Crop;
use App\Models\User;
use App\Models\info;
class RegistrationController extends Controller
{
    public function create()
    {
       
        return view('registration.create');
    }

    public function store(Request $request)
    {
        // Define validation rules and custom messages
        $rules = [
           
         
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'extension_name' => 'nullable|string|max:255',
            'address' => 'required|string',
            'crop_type' => 'required|in:rice,corn,vegetable,coconut',
            'farm_type' => 'required|in:1,2,3,4,E,A,B,C',
            'phone' => ['required', 'regex:/^09\d{9}$/', 'size:11'],
            'tenurial'=>'required',
            'address' => 'required|string|max:255',
            'sex' => 'required|max:255',
            'purok' => 'required|max:255',
            'barangay' => 'required|max:255',
            'north' => 'nullable|max:255',
            'east' => 'nullable|max:255',
            'land_area' => 'nullable|numeric|in:1,2,3',
            'wife' => 'nullable|string|max:255',


            'west' => 'nullable|max:255',
            'south' => 'nullable|max:255',
            'Bdate' => 'required|max:255',
            'benificiary' => 'required|max:255',
            'bankname' => 'required|max:255',
            'bankAccount' => 'required|max:255',
            'amountCover' => 'required|max:255',
            'sowing' => 'required|max:255',
            'planting' => 'required|max:255',
            'harvest' => 'required|max:255',
            'status' => 'required|max:255',
           

            'latitude' => 'required|numeric|between:13.255977,13.390279', // Valid latitude range
            'longitude' => 'required|numeric|between:123.230122,123.428651', // Valid longitude range
        ];
    
        // Validation messages
        $messages = [
            'phone'=>'Oops! The input should be valid phone number.',
            'land_area'=>'Oops! The Land Area should be between 1 and 3. Please check your input.',
            'latitude.between' => 'Invalid latitude. Latitude must be between 13.255977 and 13.90279.',
            'longitude.between' => 'Invalid longitude. Longitude must be between 123.250122 and 123.428651.',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $this->validate($request, $rules, $messages);
      
        // Handle the checkboxes
       
      
        // Create a new farmer record in the database
        Register::create(array_merge($request->all()));
    
        // Redirect to the mapping page with coordinates as parameters
        return redirect()->route('mapping.index', [
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ])->with('success', 'Farmer registered successfully.');
    }

    public function showMapInfo()
{
    $totalCrops = Crop::count();
    $riceCrops = Crop::where('crop_type', 'rice')->count();
    $cornCrops = Crop::where('crop_type', 'corn')->count();
    $vegetableCrops = Crop::where('crop_type', 'vegetable')->count();
    $coconutCrops = Crop::where('crop_type', 'coconut')->count();

    $totalUsers = User::count();

    $totalLandArea = Crop::sum('land_area');

    return view('mapInfo', compact('totalCrops', 'riceCrops', 'cornCrops', 'vegetableCrops', 'coconutCrops', 'totalUsers', 'totalLandArea'));
}

   
}
