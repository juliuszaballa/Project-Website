<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harvest;
use App\Models\Corn;
use App\Models\Coconut;
use App\Models\Register;
use Carbon\Carbon;
class HarvestController extends Controller
{
 
    public function store(Request $request)
{
    $request->validate([
        'planted' => 'required|integer',
        'quantity' => 'required|integer',
        'harvest_date' => 'required|date',
    ]);

    // Check if the harvest date is not greater than a specified date
    $specifiedDate = Carbon::parse('2023-12-31');

    if ($request->harvest_date > $specifiedDate) {
        return redirect()->route('harvest')->with('error', 'Harvest date cannot be greater than the specified date.');
    }

    // Check if there are already two entries for the current year
    $currentYear = Carbon::parse($request->harvest_date)->year;
    $harvestCount = Harvest::whereYear('harvest_date', $currentYear)->count();

    if ($harvestCount >= 2) {
        return redirect()->back()->with('error', 'You can only input Rice harvest twice a year.');
    }

    // Create and save the harvest record
    Harvest::create([
        'quantity' => $request->quantity,
        'planted' => $request->planted,
        'harvest_date' => $request->harvest_date,
    ]);

    return redirect()->back()->with('success', 'Rice harvest Added Successfully');
}

    public function destroy($id)
    {
     Harvest::where('id','=',$id)->delete();
     return redirect()->back()->with('success','harvest deleted Successfully');
    }
    
    public function deleteUser($id)
    {
        
        User::where('id','=',$id)->delete();
     return redirect()->back()->with('success','Staff deleted Successfully');
    }
    
    public function harvestIndex()
    {
        $harvest = Harvest::all(); // Changed variable name to $harvests
        return view('harvest.harvest', compact('harvest')); // Changed variable name to 'harvests' in compact()
    }
    
    public function updateMark($id)
{
    $insurance = Register::find($id);
    
    if ($insurance) {
        $insurance->mark = request('mark'); // Assuming 'mark' is the name attribute of your checkbox
        $insurance->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Insurance not found.']);
}

public function coconutstore(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'coconutquantity' => 'required|integer',
        'coconutharvest_date' => 'required|date',
    ]);

    // Check if the harvest date is not greater than a specified date
    $specifiedDate = Carbon::parse('2023-12-31');

    if ($request->coconutharvest_date > $specifiedDate) {
        return redirect()->route('coconutHarvest')->with('error', 'Harvest date cannot be greater than the specified date.');
    }

    // Check if there is already a harvest entry for the current year
    $currentYear = Carbon::parse($request->coconutharvest_date)->year;
    $harvestCount = Coconut::whereYear('coconutharvest_date', $currentYear)->count();

    if ($harvestCount >= 1) {
        return redirect()->back()->with('error', 'You can only input one harvest per year.');
    }

    // Create and save the harvest record
    Coconut::create([
        'coconutquantity' => $request->coconutquantity,
        'coconutharvest_date' => $request->coconutharvest_date,
    ]);

    return redirect()->back()->with('success', 'Coconut harvest added successfully');
}


public function cornstore(Request $request)
{
    $request->validate([
        'cornquantity' => 'required|integer',
        'cornplanted' => 'required|integer',
        'cornharvest_date' => 'required|date',
    ]);

    // Check if the harvest date is not greater than a specified date
    $specifiedDate = Carbon::parse('2023-12-31');

    if ($request->harvest_date > $specifiedDate) {
        return redirect()->route('cornHarvest')->with('error', 'Harvest date cannot be greater than the specified date.');
    }

    // Check if there are already two entries for the current year
    $currentYear = Carbon::parse($request->cornharvest_date)->year;
    $harvestCount = Corn::whereYear('cornharvest_date', $currentYear)->count();

    if ($harvestCount >= 2) {
        return redirect()->back()->with('error', 'You can only input Corn harvest twice a year.');
    }

    // Create and save the harvest record
    Corn::create([
    'cornplanted' => $request->cornplanted,
    'cornquantity' => $request->cornquantity,
        'cornharvest_date' => $request->cornharvest_date,
    ]);

    return redirect()->back()->with('success', 'Corn harvest Added Successfully');
}

public function cornIndex()
{
    $corn = Corn::all(); // Changed variable name to $harvests
    return view('harvest.cornHarvest', compact('corn')); // Changed variable name to 'harvests' in compact()
}
public function coconutIndex()
{
    $Coconut = Coconut::all(); // Changed variable name to $harvests
    return view('coconutHarvest', compact('Coconut')); // Changed variable name to 'harvests' in compact()
}
public function deleteCorn($id){
    Corn::where('id','=',$id)->delete();
    return redirect()->back()->with('success','Corn Harvest Deleted Succecssfully');
}
public function deleteCoconut($id){
    Coconut::where('id','=',$id)->delete();
    return redirect()->back()->with('success','Coconut Harvest Deleted Succecssfully');
}
public function editCorn($id ){
    $data=Corn::where('id','=',$id)->first();
    return view('Edit.EditCornHarvest',compact('data'));
}
public function updateCorn(Request $request){
    $request->validate([
        'cornquantity' => 'required|integer',
        'cornharvest_date' => 'required|date',
    ]);
    $id = $request ->id;
    $cornquantity = $request ->cornquantity;
    $cornharvest_date = $request ->cornharvest_date;

    Corn::where('id','=',$id)->update([
        'cornquantity'=>$cornquantity,
        'cornharvest_date'=>$cornharvest_date,
    ]);


    // Check if the harvest date is not greater than a specified date
    $specifiedDate = Carbon::parse('2023-12-31');

    if ($request->harvest_date > $specifiedDate) {
        return redirect()->route('cornHarvest')->with('error', 'Harvest date cannot be greater than the specified date.');
    }

    // Check if there are already two entries for the current year
    $currentYear = Carbon::parse($request->cornharvest_date)->year;
    $harvestCount = Corn::whereYear('cornharvest_date', $currentYear)->count();

    if ($harvestCount >= 3) {
        return redirect()->back()->with('error', 'You can only input Corn harvest twice a year.');
    }

    return back()->with('success','Corn Harvest Updated Successfully');
}


public function updateCoconut(Request $request){
    $request->validate([
        'coconutquantity' => 'required|integer',
        'coconutharvest_date' => 'required|date',
    ]);
    $id = $request ->id;
    $coconutquantity = $request ->coconutquantity;
    $coconutharvest_date = $request ->coconutharvest_date;

   
    Coconut::where('id','=',$id)->update([
        'coconutquantity'=>$coconutquantity,
        'coconutharvest_date'=>$coconutharvest_date,
    ]);
     
   
    // Check if the harvest date is not greater than a specified date
    $specifiedDate = Carbon::parse('2023-12-31');

    if ($request->coconutharvest_date > $specifiedDate) {
        return redirect()->route('coconutHarvest')->with('error', 'Harvest date cannot be greater than the specified date.');
    }

    // Check if there is already a harvest entry for the current year
    $currentYear = Carbon::parse($request->coconutharvest_date)->year;
    $harvestCount = Coconut::whereYear('coconutharvest_date', $currentYear)->count();

    if ($harvestCount >= 2) {
        return redirect()->back()->with('error', 'You can only input one Coconut harvest per year.');
    }

    return back()->with('success','Coconut Harvest Updated Successfully');
}

public function editCoconut($id ){
    $data=Coconut::where('id','=',$id)->first();
    return view('Edit.EditCoconut',compact('data'));
}

public function editRice($id ){
    $data=Harvest::where('id','=',$id)->first();
    return view('Edit.EditRice',compact('data'));
}

public function updateRice(Request $request){
    $request->validate([
        'quantity' => 'required|integer',
        'harvest_date' => 'required|date',
    ]);
    $id = $request ->id;
    $quantity = $request ->quantity;
    $harvest_date = $request ->harvest_date;

   Harvest::where('id','=',$id)->update([
        'quantity'=>$quantity,
        'harvest_date'=>$harvest_date,
    ]);


    // Check if the harvest date is not greater than a specified date
    $specifiedDate = Carbon::parse('2023-12-31');

    if ($request->harvest_date > $specifiedDate) {
        return redirect()->route('cornHarvest')->with('error', 'Harvest date cannot be greater than the specified date.');
    }

    // Check if there are already two entries for the current year
    $currentYear = Carbon::parse($request->cornharvest_date)->year;
    $harvestCount = Harvest::whereYear('harvest_date', $currentYear)->count();

    if ($harvestCount >= 3) {
        return redirect()->back()->with('error', 'You can only input Rice harvest twice a year.');
    }

    return back()->with('success','Corn Harvest Updated Successfully');
}



}
