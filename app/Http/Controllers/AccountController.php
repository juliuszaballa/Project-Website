<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Register;
class AccountController extends Controller
{
    public function index3()
{
    // Retrieve accounts from the database and sort them alphabetically
    $accounts = Register::orderBy('surname')->get();

    return view('.navigation.account', ['accounts' => $accounts]);
    
}
public function insurance()
{
    // Retrieve accounts from the database and sort them alphabetically
    $insurance = Register::orderBy('surname')->get();

    return view('navigation.insurance', ['insurance' => $insurance]);
    
}
public function view(Request $request)
{
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    $zoom = $request->input('zoom', 15); // Default zoom level is 17

    return view('mapping.index', compact('latitude', 'longitude', 'zoom'));
}
 // Controller method for filtering and printing
 public function filterAndPrint(Request $request)
 {
     // Retrieve the selected crop type from the request
     $selectedCropType = $request->input('cropTypeFilter');

     // Query the database to get the accounts based on the selected crop type
     if ($selectedCropType === 'all') {
         // If "All" is selected, retrieve all accounts
         $filteredAccounts = Account::all();
     } else {
         // Otherwise, filter accounts by crop type
         $filteredAccounts = Account::where('crop_type', $selectedCropType)->get();
     }

     // Return the filtered accounts as JSON data
     return response()->json($filteredAccounts);
 }
 public function deleteFarmer($id)
 {
    Register::where('id','=',$id)->delete();
  return redirect()->back()->with('success','farmer deleted Successfully');
 }
 public function editfarmer($id){
$data=Register::where('id','=',$id)->first();
return view('Edit.Edit-farmer',compact('data'));
 }
  public function updatefarmer(Request $request){
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
        'north' => 'required|max:255',
        'east' => 'required|max:255',
        'land_area' => 'required|numeric|in:1,2,3',
        'wife' => 'nullable|string|max:255',



        'west' => 'required|max:255',
        'south' => 'required|max:255',
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
    $id =$request->id;
    $surname =$request-> surname;
    $first_name =$request-> first_name;
    $middle_name =$request->middle_name ;
    $extension_name =$request->extension_name ;
    $address =$request->address ;
    $crop_type =$request->crop_type ;
    $farm_type =$request->farm_type ;
    $phone =$request->phone ;
    $tenurial =$request->tenurial ;
   
    $sex =$request->sex ;
    $purok =$request->purok ;
    $barangay =$request->barangay ;
    $north =$request->north ;
    $east =$request->east ;
    $land_area =$request->land_area ;
    $west =$request->west ;
    $south =$request-> south;
    $benificiary =$request-> benificiary;
 
    $bankname =$request->bankname ; 
    $bankAccount =$request->bankAccount ;
    $amountCover =$request->amountCover ;
    $sowing =$request->sowing ;
    $planting =$request->planting ;
    $harvest =$request->harvest ;
    $status =$request->status ;
    $latitude =$request-> latitude;
    $longitude =$request-> longitude;
    $wife =$request->wife ;
    Register::where('id','=',$id)->update([
        'surname'=>$surname,
        'first_name'=>$first_name,
        'middle_name'=>$middle_name ,
        'extension_name'=>$extension_name ,
        'address'=>$address ,
        'crop_type'=>$crop_type ,
        'farm_type'=>$farm_type ,
        'phone'=>$phone ,
        'tenurial'=>$tenurial ,
        'sex'=>$sex ,
        'purok'=>$purok ,
        'barangay'=>$barangay ,
        'north'=>$north ,
        'east'=>$east ,
        'land_area'=>$land_area ,
        'west'=>$west ,
        'south'=>$south ,
        'benificiary'=>$benificiary ,
        'bankname'=>$bankname ,
        'bankAccount'=>$bankAccount ,
        'amountCover'=>$amountCover ,
        'sowing'=>$sowing ,
        'planting'=>$planting ,
        'harvest'=>$harvest ,
        'status'=>$status ,
        'latitude'=>$latitude ,
        'longitude'=>$longitude ,
        'wife'=>$wife ,
    ]);
    $messages = [
        'latitude.between' => 'Invalid latitude. Latitude must be between 13.255977 and 13.90279.',
        'longitude.between' => 'Invalid longitude. Longitude must be between 123.250122 and 123.428651.',
    ];
    
            // Validation messages
            $messages = [
                'latitude.between' => 'Invalid latitude. Latitude inputted are not in Bato',
                'longitude.between' => 'Invalid longitude. Longitude inputted are not in Bato.',
            ];
            
            // Use the validator to perform the validation
            $validator = Validator::make($request->all(), $rules, $messages);
            
    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }
    $this->validate($request, $rules, $messages);
 return redirect()->route('mapping.index', [
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ])->with('success', 'Farmer Updated successfully.');  }



        public function getSpecificContent()
        {
            // Assuming 'your.view' is the name of your Blade view
            $content = View::make('mapping.index')->renderSections()['specificContent'];
    
            return response()->json(['content' => $content]);
        }
}
