<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\info;
class information extends Controller
{

    public function store2(Request $request){

    }

    public function store(Request $request)
    {
        // Define validation rules and custom messages
        $rules = [
            'purok' => 'required',
            'street' => 'required',
            'brgy' => 'required',
            'sex' => 'required',
            'phone' => 'required',
            'landline' => 'required', // Valid latitude range
           
        ];
    
        // Validation messages
        $messages = [
            'purok.required' => 'The purok field is required.',
            'street.required' => 'The street field is required.',
            'brgy.required' => 'The brgy field is required.',
            'sex.required' => 'The sex field is required.',
            'sex.in' => 'The sex field must be Male or Female.',
            'phone.required' => 'The phone field is required.',
            'phone.numeric' => 'The phone field must be a number.',
            'phone.max' => 'The phone field may not be greater than 11 characters.',
            'landline.required' => 'The landline field is required.',
            'landline.numeric' => 'The landline field must be a number.',
            'landline.max' => 'The landline field may not be greater than 10 characters.',
        ];
        
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        info::create($request->all());
        return view('mapping.index');
    }
}
