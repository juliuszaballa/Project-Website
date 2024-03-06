<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Include Bootstrap CSS -->
    <!-- Include Custom CSS -->
 
    <link rel="stylesheet" href="../css/create.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
 
</head>
<body>
    <div class="container">
        <h1>Edit Farmers Data</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ url('update-registration') }}">
            @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
            <div class="mb-3">
                <label for="surname" class="form-label">Surname:</label>
                <input type="text" name="surname" class="form-control" value="{{ $data->surname }}" id="surname" >
            </div>

            @if ($errors->has('surname'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('surname') }}</div>
                @endif

            <div class="mb-3">
                <label for="first_name" class="form-label">first name:</label>
                <input type="text" name="first_name" class="form-control" value="{{ $data->first_name}}" id="first_name" >
            </div>

            @if ($errors->has('first_name'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('first_name') }}</div>
                @endif

            <div class="mb-3">
                <label for="middle_name" class="form-label">Middle Name:</label>
                <input type="text" name="middle_name" class="form-control" value="{{ $data->middle_name }}" id="middle_name" >
            </div>

            @if ($errors->has('middle_name'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('middle_name') }}</div>
                @endif

            <div class="mb-3">
                <label for="extension_name" class="form-label">Suffix:</label>
                <input type="text" name="extension_name" class="form-control" value="{{ $data->extension_name }}" id="extension_name" >
            </div>



            <label for="sex">Sex:</label><br>
<input type="checkbox" id="Male" name="sex" value="Male" class="exclusive" @if($data->sex == 'Male') checked @endif>
<label for="Male">Male</label><br>
<input type="checkbox" id="Female" name="sex" value="Female" class="exclusive" @if($data->sex== 'Female') checked @endif>
<label for="Female">Female</label><br><br>
@if ($errors->has('sex'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('sex') }}</div>
                @endif

<div class="mb-3">
                <label for="purok" class="form-label">HOUSE/LOT /BLDG. NO. /PUROK:</label>
                <input type="text" name="purok" class="form-control" value="{{$data->purok }}" id="purok" >
            </div>
            @if ($errors->has('purok'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('purok') }}</div>
                @endif
            <div class="mb-3">
            <label for="barangay" class="form-label">BARANGAY:</label>
<select name="barangay" class="form-control" id="brgySelect">
<option value="" disabled selected>Select a barangay</option>
    <option value="Agos" {{ $data->barangay == 'Agos' ? 'selected' : '' }}>Agos</option>
    <option value="Bacolod" {{ $data->barangay == 'Bacolod' ? 'selected' : '' }}>Bacolod</option>
    <option value="Buluang" {{ $data->barangay == 'Buluang' ? 'selected' : '' }}>Buluang</option>
    <option value="Caricot" {{ $data->barangay== 'Caricot' ? 'selected' : '' }}>Caricot</option>
    <option value="Cawacagan" {{ $data->barangay == 'Cawacagan' ? 'selected' : '' }}>Cawacagan</option>
    <option value="Cotmon" {{ $data->barangay == 'Cotmon' ? 'selected' : '' }}>Cotmon</option>
    <option value="Cristo Rey" {{ $data->barangay == 'Cristo Rey' ? 'selected' : '' }}>Cristo Rey</option>
    <option value="Del Rosario" {{ $data->barangay == 'Del Rosario' ? 'selected' : '' }}>Del Rosario</option>
    <option value="Divina Pastora" {{ $data->barangay == 'Divina Pastora' ? 'selected' : '' }}>Divina Pastora</option>
    <option value="Goyudan" {{ $data->barangay == 'Goyudan' ? 'selected' : '' }}>Goyudan</option>
    <option value="Lobong" {{ $data->barangay == 'Lobong' ? 'selected' : '' }}>Lobong</option>
    <option value="Lubigan" {{ $data->barangay == 'Lubigan' ? 'selected' : '' }}>Lubigan</option>
    <option value="Mainit" {{ $data->barangay == 'Mainit' ? 'selected' : '' }}>Mainit</option>
    <option value="Manga" {{ $data->barangay == 'Manga' ? 'selected' : '' }}>Manga</option>
    <option value="Masoli" {{  $data->barangay == 'Masoli' ? 'selected' : '' }}>Masoli</option>
    <option value="Neighborhood" {{ $data->barangay == 'Neighborhood' ? 'selected' : '' }}>Neighborhood</option>
    <option value="Niño Jesus" {{ $data->barangay == 'Niño Jesus' ? 'selected' : '' }}>Niño Jesus</option>
    <option value="Pagatpatan" {{ $data->barangay == 'Pagatpatan' ? 'selected' : '' }}>Pagatpatan</option>
    <option value="Palo" {{ $data->barangay == 'Palo' ? 'selected' : '' }}>Palo</option>
    <option value="Payak" {{ $data->barangay == 'Payak' ? 'selected' : '' }}>Payak</option>
    <option value="Sagrada" {{ $data->barangay == 'Sagrada' ? 'selected' : '' }}>Sagrada</option>
    <option value="Salvacion" {{ $data->barangay == 'Salvacion' ? 'selected' : '' }}>Salvacion</option>
    <option value="San Isidro" {{ $data->barangay == 'San Isidro' ? 'selected' : '' }}>San Isidro</option>
    <option value="San Juan" {{ $data->barangay == 'San Juan' ? 'selected' : '' }}>San Juan</option>
    <option value="San Miguel" {{ $data->barangay == 'San Miguel' ? 'selected' : '' }}>San Miguel</option>
    <option value="San Rafael" {{ $data->barangay == 'San Rafael' ? 'selected' : '' }}>San Rafael</option>
    <option value="San Roque" {{ $data->barangay == 'San Roque' ? 'selected' : '' }}>San Roque</option>
    <option value="San Vicente" {{ $data->barangay == 'San Vicente' ? 'selected' : '' }}>San Vicente</option>
    <option value="Santa Cruz" {{ $data->barangay == 'Santa Cruz' ? 'selected' : '' }}>Santa Cruz</option>
    <option value="Santiago" {{ $data->barangay == 'Santiago' ? 'selected' : '' }}>Santiago</option>
    <option value="Sooc" {{ $data->barangay == 'Sooc' ? 'selected' : '' }}>Sooc</option>
    <option value="Tagpolo" {{ $data->barangay == 'Tagpolo' ? 'selected' : '' }}>Tagpolo</option>
    <option value="Tres Reyes" {{ $data->barangay == 'Tres Reyes' ? 'selected' : '' }}>Tres Reyes</option>
</select>

@if ($errors->has('barangay'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('barangay') }}</div>
                @endif
            <div class="mb-3">
                <label for="phone" class="form-label"> MOBILE NUMBER:</label>
                <input type="number" name="phone" class="form-control" value="{{ $data->phone }}" id="phone" >
            </div>
            @if ($errors->has('phone'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('phone') }}</div>
                @endif

            <div class="mb-3">
                <label for="benificiary" class="form-label"> Benificiary:</label>
                <input type="text" name="benificiary" class="form-control" value="{{  $data->benificiary }}" id="phone" >
            </div>
            @if ($errors->has('benificiary'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('benificiary') }}</div>
                @endif
            <div class="mb-3">
                <label for="bankname" class="form-label"> Bank Name:</label>
                <input type="text" name="bankname" class="form-control" value="{{ $data->bankname }}" id="phone" >
            </div>
            @if ($errors->has('bankname'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('bankname') }}</div>
                @endif
            <div class="mb-3">
                <label for="bankAccount" class="form-label"> Bank Account No.</label>
                <input type="number" name="bankAccount" class="form-control" value="{{ $data->bankAccount }}" id="phone" >
            </div>
            @if ($errors->has('backAccount'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('backAccount') }}</div>
                @endif
            <div class="mb-3">
                <label for="amountCover" class="form-label"> Amount of Cover:</label>
                <input type="number" name="amountCover" class="form-control" value="{{ $data->amountCover }}" id="phone" >
            </div>
            @if ($errors->has('amountCover'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('amountCover') }}</div>
                @endif
            <div class="form-group">
            <label for="Bdate">Date of Birth</label>
<input type="date" name="Bdate" class="form-control" value="{{ $data->Bdate }}">
@if ($errors->has('Bdate'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('Bdate') }}</div>
                @endif
        </div>
          
            
<h3>STATUS</h3>
<label>
    <input type="checkbox" name="status" value="Single" id="Single" class="statusCheckbox"
    class="exclusive" @if($data->status== 'Single') checked @endif> Single
</label>
<br>
<label>
    <input type="checkbox" name="status" value="Married" id="Married" class="statusCheckbox"
    class="exclusive" @if($data->status== 'Married') checked @endif> Married
</label>
<br>
<label>
    <input type="checkbox" name="status" value="Widowed" id="Widowed" class="statusCheckbox"
    class="exclusive" @if($data->status== 'Widowed') checked @endif> Widowed
</label>
<br>
@if ($errors->has('status'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('status') }}</div>
                @endif
<div class="mb-3">
    <label for="wife" class="form-label">NAME OF SPOUSE IF MARRIED:</label>
    <input type="text" name="wife" class="form-control" value="{{$data->wife}}" id="wife" style="display: none">
</div>
<h3>Planning Calendar</h3>

<div class="mb-3">
    <label for="sowing" class="form-label">Sowing/Ds:</label>
    <input type="date" name="sowing" class="form-control" value="{{ $data->sowing }}" id="sowing">
</div>
@if ($errors->has('sowing'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('sowing') }}</div>
                @endif
<div class="mb-3">
    <label for="planting" class="form-label">TP/Planting:</label>
    <input type="text" name="planting" class="form-control" value="{{ $data->planting }}" id="planting">
</div>
@if ($errors->has('planting'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('planting') }}</div>
                @endif
<div class="mb-3">
    <label for="harvest" class="form-label">Harvest:</label>
    <input type="number" name="harvest" class="form-control" value="{{ $data->harvest }}" id="harvest">
</div>
@if ($errors->has('harvest'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('harvest') }}</div>
                @endif
<h3>Adjacent Lot Owners</h3>
<div class="mb-3">
    <label for="north" class="form-label">North:</label>
    <input type="text" name="north" class="form-control" value="{{ $data->north }}" id="north">
</div>
@if ($errors->has('north'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('north') }}</div>
                @endif
<div class="mb-3">
    <label for="south" class="form-label">South:</label>
    <input type="text" name="south" class="form-control" value="{{ $data->south }}" id="north">
</div>
@if ($errors->has('south'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('south') }}</div>
                @endif
<div class="mb-3">
    <label for="east" class="form-label">East:</label>
    <input type="text" name="east" class="form-control" value="{{ $data->east }}" id="north">
</div>
@if ($errors->has('east'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('east') }}</div>
                @endif
<div class="mb-3">
    <label for="west" class="form-label">West:</label>
    <input type="text" name="west" class="form-control" value="{{ $data->west }}" id="north">
</div>
@if ($errors->has('west'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('west') }}</div>
                @endif

                <br><label for="address" class="form-label">Farm Located:</label>
                <select name="address" class="form-control" id="addressSelect">
                <option value="" disabled selected>Select a barangay</option>
              
<option value="" disabled selected>Select a barangay</option>
    <option value="Agos" {{ $data->address == 'Agos' ? 'selected' : '' }}>Agos</option>
    <option value="Bacolod" {{ $data->address == 'Bacolod' ? 'selected' : '' }}>Bacolod</option>
    <option value="Buluang" {{ $data->address == 'Buluang' ? 'selected' : '' }}>Buluang</option>
    <option value="Caricot" {{ $data->address== 'Caricot' ? 'selected' : '' }}>Caricot</option>
    <option value="Cawacagan" {{ $data->address == 'Cawacagan' ? 'selected' : '' }}>Cawacagan</option>
    <option value="Cotmon" {{ $data->address == 'Cotmon' ? 'selected' : '' }}>Cotmon</option>
    <option value="Cristo Rey" {{ $data->address == 'Cristo Rey' ? 'selected' : '' }}>Cristo Rey</option>
    <option value="Del Rosario" {{ $data->address == 'Del Rosario' ? 'selected' : '' }}>Del Rosario</option>
    <option value="Divina Pastora" {{ $data->address == 'Divina Pastora' ? 'selected' : '' }}>Divina Pastora</option>
    <option value="Goyudan" {{ $data->address == 'Goyudan' ? 'selected' : '' }}>Goyudan</option>
    <option value="Lobong" {{ $data->address == 'Lobong' ? 'selected' : '' }}>Lobong</option>
    <option value="Lubigan" {{ $data->address == 'Lubigan' ? 'selected' : '' }}>Lubigan</option>
    <option value="Mainit" {{ $data->address == 'Mainit' ? 'selected' : '' }}>Mainit</option>
    <option value="Manga" {{ $data->address == 'Manga' ? 'selected' : '' }}>Manga</option>
    <option value="Masoli" {{  $data->address == 'Masoli' ? 'selected' : '' }}>Masoli</option>
    <option value="Neighborhood" {{ $data->address == 'Neighborhood' ? 'selected' : '' }}>Neighborhood</option>
    <option value="Niño Jesus" {{ $data->address == 'Niño Jesus' ? 'selected' : '' }}>Niño Jesus</option>
    <option value="Pagatpatan" {{ $data->address == 'Pagatpatan' ? 'selected' : '' }}>Pagatpatan</option>
    <option value="Palo" {{ $data->address == 'Palo' ? 'selected' : '' }}>Palo</option>
    <option value="Payak" {{ $data->address == 'Payak' ? 'selected' : '' }}>Payak</option>
    <option value="Sagrada" {{ $data->address == 'Sagrada' ? 'selected' : '' }}>Sagrada</option>
    <option value="Salvacion" {{ $data->address == 'Salvacion' ? 'selected' : '' }}>Salvacion</option>
    <option value="San Isidro" {{ $data->address == 'San Isidro' ? 'selected' : '' }}>San Isidro</option>
    <option value="San Juan" {{ $data->address == 'San Juan' ? 'selected' : '' }}>San Juan</option>
    <option value="San Miguel" {{ $data->address == 'San Miguel' ? 'selected' : '' }}>San Miguel</option>
    <option value="San Rafael" {{ $data->address == 'San Rafael' ? 'selected' : '' }}>San Rafael</option>
    <option value="San Roque" {{ $data->address == 'San Roque' ? 'selected' : '' }}>San Roque</option>
    <option value="San Vicente" {{ $data->address == 'San Vicente' ? 'selected' : '' }}>San Vicente</option>
    <option value="Santa Cruz" {{ $data->address == 'Santa Cruz' ? 'selected' : '' }}>Santa Cruz</option>
    <option value="Santiago" {{ $data->address == 'Santiago' ? 'selected' : '' }}>Santiago</option>
    <option value="Sooc" {{ $data->address == 'Sooc' ? 'selected' : '' }}>Sooc</option>
    <option value="Tagpolo" {{ $data->address == 'Tagpolo' ? 'selected' : '' }}>Tagpolo</option>
    <option value="Tres Reyes" {{ $data->address == 'Tres Reyes' ? 'selected' : '' }}>Tres Reyes</option>
</select>
@if ($errors->has('address'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('address') }}</div>
                @endif
   
            </div>
 
            <div class="mb-3">
    <label for="crop_type" class="form-label">Type of Crops:</label>
    <select name="crop_type" class="form-select" id="crop_type">
        <option value="" disabled selected>Select types of Crops</option>
        <option value="rice" {{ $data->crop_type == 'rice' ? 'selected' : '' }}>Rice</option>
        <option value="corn" {{ $data->crop_type== 'corn' ? 'selected' : '' }}>Corn</option>
        <option value="vegetable" {{ $data->crop_type == 'vegetable' ? 'selected' : '' }}>Vegetable</option>
        <option value="coconut" {{ $data->crop_type == 'coconut' ? 'selected' : '' }}>Coconut</option>
    </select>
</div>
@if ($errors->has('crop_type'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('crop_type') }}</div>
                @endif

               
                <div class="mb-3">
    <label for="farm_type" class="form-label">Land Category / Soil Type:</label>
    <select name="farm_type" class="form-select" id="farm_type">
        <option value="" disabled selected>Select types of Fields</option>
        <option value="1" {{ $data->farm_type == '1' ? 'selected' : '' }}>Irrigated - NIA/CIA</option>
        <option value="2" {{ $data->farm_type == '2' ? 'selected' : '' }}>Irrigated - Deep Well Pump / Shallow Tube Well(STW)</option>
        <option value="3" {{ $data->farm_type == '3' ? 'selected' : '' }}>Irrigated - Open Source (SWIP, Creek, River)</option>
        <option value="4" {{ $data->farm_type == '4' ? 'selected' : '' }}>Rainted(D) Broad Plain- Sandy Loam</option>
        <option value="E" {{ $data->farm_type == 'E' ? 'selected' : '' }}>Rolling/Upland</option>
        <option value="A" {{ $data->farm_type == 'A' ? 'selected' : '' }}>Broad Plan - Clay Loam</option>
        <option value="B" {{ $data->farm_type == 'B' ? 'selected' : '' }}>Broad Plan - silty Clay Loam</option>
        <option value="C" {{ $data->farm_type == 'C' ? 'selected' : '' }}>Broad Plan - Silty Loan</option>
    </select>
</div>

            @if ($errors->has('farm_type'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('farm_type') }}</div>
                @endif
            <div class="mb-3">
                <label for="tenurial" class="form-label">Farm Type:</label>
                <select name="tenurial" value="{{ old('tenurial') }}" class="form-select" id="crop_type" >
                    <option value="" disabled selected>Select Tenurial Status</option>
                    <option value="Landowner" {{ $data->tenurial == 'Landowner' ? 'selected' : '' }}>Landowner</option>
                    <option value="Lessee" {{ $data->tenurial == 'Lessee' ? 'selected' : '' }}>Lessee</option>
                    <option value="others" {{ $data->tenurial == 'others' ? 'selected' : '' }}>others</option>
                
                </select>
            </div>
            @if ($errors->has('tenurial'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('tenurial') }}</div>
                @endif
            <div class="mb-3">
                <label for="land_area" class="form-label">Land Area (in Hectare):</label>
                <input type="number" value="{{ $data->land_area}}" class="form-control" name="land_area" id="land_area" >
            </div>
            @if ($errors->has('land_area'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('land_area') }}</div>
                @endif
        
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude:</label>
                <input type="number" step="0.000001" name="latitude" value="{{ $data->latitude }}" class="form-control" id="latitude" >
                @if ($errors->has('latitude'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('latitude') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude:</label>
                <input type="number" step="0.000001" value="{{ $data->longitude }}" class="form-control" name="longitude" id="longitude" >
                @if ($errors->has('longitude'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('longitude') }}</div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
    </div>
  
<script>
// Get all checkboxes with class "exclusive"
const exclusiveCheckboxes = document.querySelectorAll('.exclusive');

// Get the "Others" checkbox and the associated text input field
const othersCheckbox = document.getElementById('OthersCheckbox');
const other1Input = document.getElementById('other1');

// Add a click event listener to each checkbox in the group
exclusiveCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('click', function() {
        // Uncheck all checkboxes in the group
        exclusiveCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });

        // If the "Others" checkbox is checked, show the text input field; otherwise, hide it
        other1Input.style.display = othersCheckbox.checked ? 'block' : 'none';
    });
});
</script>


<script>
const statusCheckboxes = document.querySelectorAll('.statusCheckbox');
const spouseTextbox = document.getElementById('wife');

statusCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        // Uncheck all checkboxes except the one that was just clicked
        statusCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });

        if (this.value === 'Married') {
            // If "Married" is checked, show the text box
            spouseTextbox.style.display = this.checked ? 'block' : 'none';
        }

        // Check if "Married" is unchecked and hide the text box
        if (this.value !== 'Married' && !document.getElementById('Married').checked) {
            spouseTextbox.style.display = 'none';
        }
    });
});
</script>








</body>
</html>
