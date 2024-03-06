<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <!-- Include Custom CSS -->
    <link rel="stylesheet" href="css/create.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
 
</head>
<script type="text/javascript">
if(top.location != window.location) {
    window.location = 'mapping#map';
}
</script>
@include('admin.adminhome')
<body>
    <div class="container">
        <h1>Farmer Registration Form</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('registration.store') }}">
            @csrf

            <div class="mb-3">
                <label for="surname" class="form-label">Surname:</label><br>
                <input type="text" name="surname" class="form-control" value="{{ old('surname') }}" id="surname" >
            </div>

            @if ($errors->has('surname'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('surname') }}</div>
                @endif

            <div class="mb-3">
                <label for="first_name" class="form-label">first name:</label><br>
                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" id="first_name" >
            </div>

            @if ($errors->has('first_name'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('first_name') }}</div>
                @endif

            <div class="mb-3">
                <label for="middle_name" class="form-label">Middle Name:</label><br>
                <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name') }}" id="middle_name" >
            </div>

            @if ($errors->has('middle_name'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('middle_name') }}</div>
                @endif

            <div class="mb-3">
                <label for="extension_name" class="form-label">Suffix:</label><br>
                <input type="text" name="extension_name" class="form-control" value="{{ old('extension_name') }}" id="extension_name" >
            </div>



            <label for="sex"><strong>Sex:</strong></label><br>
<input type="checkbox" id="Male" name="sex" value="Male" class="exclusive" @if(old('sex') == 'Male') checked @endif>
<label for="Male">Male</label><br>
<input type="checkbox" id="Female" name="sex" value="Female" class="exclusive" @if(old('sex') == 'Female') checked @endif>
<label for="Female">Female</label>
@if ($errors->has('sex'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('sex') }}</div>
                @endif
                <br><br>
<div class="mb-3">
                <label for="purok" class="form-label">HOUSE/LOT /BLDG. NO. /PUROK:</label><br>
                <input type="text" name="purok" class="form-control" value="{{ old('purok') }}" id="purok" >
            </div>
            @if ($errors->has('purok'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('purok') }}</div>
                @endif
            <div class="mb-3">
            <label for="barangay" class="form-label">BARANGAY:</label><br>
<select name="barangay" class="form-control" id="brgySelect">
<option value="" disabled selected>Select a barangay</option>
    <option value="Agos" {{ old('barangay') == 'Agos' ? 'selected' : '' }}>Agos</option>
    <option value="Bacolod" {{ old('barangay') == 'Bacolod' ? 'selected' : '' }}>Bacolod</option>
    <option value="Buluang" {{ old('barangay') == 'Buluang' ? 'selected' : '' }}>Buluang</option>
    <option value="Caricot" {{ old('barangay') == 'Caricot' ? 'selected' : '' }}>Caricot</option>
    <option value="Cawacagan" {{ old('barangay') == 'Cawacagan' ? 'selected' : '' }}>Cawacagan</option>
    <option value="Cotmon" {{ old('barangay') == 'Cotmon' ? 'selected' : '' }}>Cotmon</option>
    <option value="Cristo Rey" {{ old('barangay') == 'Cristo Rey' ? 'selected' : '' }}>Cristo Rey</option>
    <option value="Del Rosario" {{ old('barangay') == 'Del Rosario' ? 'selected' : '' }}>Del Rosario</option>
    <option value="Divina Pastora" {{ old('barangay') == 'Divina Pastora' ? 'selected' : '' }}>Divina Pastora</option>
    <option value="Goyudan" {{ old('barangay') == 'Goyudan' ? 'selected' : '' }}>Goyudan</option>
    <option value="Lobong" {{ old('barangay') == 'Lobong' ? 'selected' : '' }}>Lobong</option>
    <option value="Lubigan" {{ old('barangay') == 'Lubigan' ? 'selected' : '' }}>Lubigan</option>
    <option value="Mainit" {{ old('barangay') == 'Mainit' ? 'selected' : '' }}>Mainit</option>
    <option value="Manga" {{ old('barangay') == 'Manga' ? 'selected' : '' }}>Manga</option>
    <option value="Masoli" {{ old('barangay') == 'Masoli' ? 'selected' : '' }}>Masoli</option>
    <option value="Neighborhood" {{ old('barangay') == 'Neighborhood' ? 'selected' : '' }}>Neighborhood</option>
    <option value="Niño Jesus" {{ old('barangay') == 'Niño Jesus' ? 'selected' : '' }}>Niño Jesus</option>
    <option value="Pagatpatan" {{ old('barangay') == 'Pagatpatan' ? 'selected' : '' }}>Pagatpatan</option>
    <option value="Palo" {{ old('barangay') == 'Palo' ? 'selected' : '' }}>Palo</option>
    <option value="Payak" {{ old('barangay') == 'Payak' ? 'selected' : '' }}>Payak</option>
    <option value="Sagrada" {{ old('barangay') == 'Sagrada' ? 'selected' : '' }}>Sagrada</option>
    <option value="Salvacion" {{ old('barangay') == 'Salvacion' ? 'selected' : '' }}>Salvacion</option>
    <option value="San Isidro" {{ old('barangay') == 'San Isidro' ? 'selected' : '' }}>San Isidro</option>
    <option value="San Juan" {{ old('barangay') == 'San Juan' ? 'selected' : '' }}>San Juan</option>
    <option value="San Miguel" {{ old('barangay') == 'San Miguel' ? 'selected' : '' }}>San Miguel</option>
    <option value="San Rafael" {{ old('barangay') == 'San Rafael' ? 'selected' : '' }}>San Rafael</option>
    <option value="San Roque" {{ old('barangay') == 'San Roque' ? 'selected' : '' }}>San Roque</option>
    <option value="San Vicente" {{ old('barangay') == 'San Vicente' ? 'selected' : '' }}>San Vicente</option>
    <option value="Santa Cruz" {{ old('barangay') == 'Santa Cruz' ? 'selected' : '' }}>Santa Cruz</option>
    <option value="Santiago" {{ old('barangay') == 'Santiago' ? 'selected' : '' }}>Santiago</option>
    <option value="Sooc" {{ old('barangay') == 'Sooc' ? 'selected' : '' }}>Sooc</option>
    <option value="Tagpolo" {{ old('barangay') == 'Tagpolo' ? 'selected' : '' }}>Tagpolo</option>
    <option value="Tres Reyes" {{ old('barangay') == 'Tres Reyes' ? 'selected' : '' }}>Tres Reyes</option>
</select>

@if ($errors->has('barangay'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('barangay') }}</div>
                @endif
            <div class="mb-3">
                <label for="phone" class="form-label"> MOBILE NUMBER:</label><br>
                <input type="number" name="phone" class="form-control" value="{{ old('phone') }}" id="phone" >
            </div>
            @if ($errors->has('phone'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('phone') }}</div>
                @endif

            <div class="mb-3">
                <label for="benificiary" class="form-label"> Benificiary:</label><br>
                <input type="text" name="benificiary" class="form-control" value="{{ old('benificiary') }}" id="phone" >
            </div>
            @if ($errors->has('benificiary'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('benificiary') }}</div>
                @endif
            <div class="mb-3">
                <label for="bankname" class="form-label"> Bank Name:</label><br>
                <input type="text" name="bankname" class="form-control" value="{{ old('bankname') }}" id="phone" >
            </div>
            @if ($errors->has('bankname'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('bankname') }}</div>
                @endif
            <div class="mb-3">
                <label for="bankAccount" class="form-label"> Bank Account No.</label><br>
                <input type="number" name="bankAccount" class="form-control" value="{{ old('bankAccount') }}" id="phone" >
            </div>
            @if ($errors->has('backAccount'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('backAccount') }}</div>
                @endif
            <div class="mb-3">
                <label for="amountCover" class="form-label"> Amount of Cover:</label><br>
                <input type="number" name="amountCover" class="form-control" value="{{ old('amountCover') }}" id="phone" >
            </div>
            @if ($errors->has('amountCover'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('amountCover') }}</div>
                @endif
            <div class="form-group">
            <label for="Bdate">Date of Birth</label><br>
<input type="date" name="Bdate" class="form-control" value="{{ old('Bdate') }}" max="{{ date('Y-m-d') }}">

@if ($errors->has('Bdate'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('Bdate') }}</div>
                @endif
        </div>
          
            <br><br>
<h3>STATUS</h3>

<label>
    <input type="checkbox" name="status" value="Single" id="Single" class="statusCheckbox"
    class="exclusive" @if(old('status')== 'Single') checked @endif> Single
</label>
<br>
<label>
    <input type="checkbox" name="status" value="Married" id="Married" class="statusCheckbox"
    class="exclusive" @if(old('status')== 'Married') checked @endif> Married
</label>
<br>
<label>
    <input type="checkbox" name="status" value="Widowed" id="Widowed" class="statusCheckbox"
    class="exclusive" @if(old('status')== 'Widowed') checked @endif> Widowed
</label>
<br>
@if ($errors->has('status'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('status') }}</div>
                @endif
@if ($errors->has('status'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('status') }}</div>
                @endif   <br><br>
<div class="mb-3">
    <label for="wife" class="form-label">NAME OF SPOUSE IF MARRIED:</label><br>
    <input type="text" name="wife" class="form-control" value="{{ old('wife') }}" id="wife" style="display: none">
</div>
<h3>Planning Calendar</h3>

<div class="mb-3">
<label for="sowing" class="form-label">Sowing/Ds:</label><br>
<input type="date" name="sowing" class="form-control" value="{{ old('sowing') }}" id="sowing" max="{{ date('Y-m-d') }}">

</div>
@if ($errors->has('sowing'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('sowing') }}</div>
                @endif
<div class="mb-3">
    <label for="planting" class="form-label">TP/Planting:</label><br>
    <input type="text" name="planting" class="form-control" value="{{ old('planting') }}" id="planting">
</div>
@if ($errors->has('planting'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('planting') }}</div>
                @endif
<div class="mb-3">
    <label for="harvest" class="form-label">Harvest:</label><br>
    <input type="number" name="harvest" class="form-control" value="{{ old('harvest') }}" id="harvest">
</div>
@if ($errors->has('harvest'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('harvest') }}</div>
                @endif
<h3>Adjacent Lot Owners</h3>
<div class="mb-3">
    <label for="north" class="form-label">North:</label><br>
    <input type="text" name="north" class="form-control" value="{{ old('north') }}" id="north">
</div>
@if ($errors->has('north'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('north') }}</div>
                @endif
<div class="mb-3">
    <label for="south" class="form-label">South:</label><br>
    <input type="text" name="south" class="form-control" value="{{ old('south') }}" id="north">
</div>
@if ($errors->has('south'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('south') }}</div>
                @endif
<div class="mb-3">
    <label for="east" class="form-label">East:</label><br>
    <input type="text" name="east" class="form-control" value="{{ old('east') }}" id="north">
</div>
@if ($errors->has('east'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('east') }}</div>
                @endif
<div class="mb-3">
    <label for="west" class="form-label">West:</label><br>
    <input type="text" name="west" class="form-control" value="{{ old('west') }}" id="north">
</div>
@if ($errors->has('west'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('west') }}</div>
                @endif

                <br><label for="address" class="form-label">Farm Located:</label><br>
                <select name="address" class="form-control" id="addressSelect">
                <option value="" disabled selected>Select a barangay</option>
    <option value="Agos" {{ old('address') == 'Agos' ? 'selected' : '' }}>Agos</option>
    <option value="Bacolod" {{ old('address') == 'Bacolod' ? 'selected' : '' }}>Bacolod</option>
    <option value="Buluang" {{ old('address') == 'Buluang' ? 'selected' : '' }}>Buluang</option>
    <option value="Caricot" {{ old('address') == 'Caricot' ? 'selected' : '' }}>Caricot</option>
    <option value="Cawacagan" {{ old('address') == 'Cawacagan' ? 'selected' : '' }}>Cawacagan</option>
    <option value="Cotmon" {{ old('address') == 'Cotmon' ? 'selected' : '' }}>Cotmon</option>
    <option value="Cristo Rey" {{ old('address') == 'Cristo Rey' ? 'selected' : '' }}>Cristo Rey</option>
    <option value="Del Rosario" {{ old('address') == 'Del Rosario' ? 'selected' : '' }}>Del Rosario</option>
    <option value="Divina Pastora" {{ old('address') == 'Divina Pastora' ? 'selected' : '' }}>Divina Pastora</option>
    <option value="Goyudan" {{ old('address') == 'Goyudan' ? 'selected' : '' }}>Goyudan</option>
    <option value="Lobong" {{ old('address') == 'Lobong' ? 'selected' : '' }}>Lobong</option>
    <option value="Lubigan" {{ old('address') == 'Lubigan' ? 'selected' : '' }}>Lubigan</option>
    <option value="Mainit" {{ old('address') == 'Mainit' ? 'selected' : '' }}>Mainit</option>
    <option value="Manga" {{ old('address') == 'Manga' ? 'selected' : '' }}>Manga</option>
    <option value="Masoli" {{ old('address') == 'Masoli' ? 'selected' : '' }}>Masoli</option>
    <option value="Neighborhood" {{ old('address') == 'Neighborhood' ? 'selected' : '' }}>Neighborhood</option>
    <option value="Niño Jesus" {{ old('address') == 'Niño Jesus' ? 'selected' : '' }}>Niño Jesus</option>
    <option value="Pagatpatan" {{ old('address') == 'Pagatpatan' ? 'selected' : '' }}>Pagatpatan</option>
    <option value="Palo" {{ old('address') == 'Palo' ? 'selected' : '' }}>Palo</option>
    <option value="Payak" {{ old('address') == 'Payak' ? 'selected' : '' }}>Payak</option>
    <option value="Sagrada" {{ old('address') == 'Sagrada' ? 'selected' : '' }}>Sagrada</option>
    <option value="Salvacion" {{ old('address') == 'Salvacion' ? 'selected' : '' }}>Salvacion</option>
    <option value="San Isidro" {{ old('address') == 'San Isidro' ? 'selected' : '' }}>San Isidro</option>
    <option value="San Juan" {{ old('address') == 'San Juan' ? 'selected' : '' }}>San Juan</option>
    <option value="San Miguel" {{ old('address') == 'San Miguel' ? 'selected' : '' }}>San Miguel</option>
    <option value="San Rafael" {{ old('address') == 'San Rafael' ? 'selected' : '' }}>San Rafael</option>
    <option value="San Roque" {{ old('address') == 'San Roque' ? 'selected' : '' }}>San Roque</option>
    <option value="San Vicente" {{ old('address') == 'San Vicente' ? 'selected' : '' }}>San Vicente</option>
    <option value="Santa Cruz" {{ old('address') == 'Santa Cruz' ? 'selected' : '' }}>Santa Cruz</option>
    <option value="Santiago" {{ old('address') == 'Santiago' ? 'selected' : '' }}>Santiago</option>
    <option value="Sooc" {{ old('address') == 'Sooc' ? 'selected' : '' }}>Sooc</option>
    <option value="Tagpolo" {{ old('address') == 'Tagpolo' ? 'selected' : '' }}>Tagpolo</option>
    <option value="Tres Reyes" {{ old('address') == 'Tres Reyes' ? 'selected' : '' }}>Tres Reyes</option>
</select>
@if ($errors->has('address'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('address') }}</div>
                @endif
   
            </div>
 <script>
    
 </script>
            <div class="mb-3">
    <label for="crop_type" class="form-label">Type of Crops:</label><br>
    <select name="crop_type" class="form-select" id="crop_type">
        <option value="" disabled selected>Select types of Crops</option>
        <option value="rice" {{ old('crop_type') == 'rice' ? 'selected' : '' }}>Rice</option>
        <option value="corn" {{ old('crop_type') == 'corn' ? 'selected' : '' }}>Corn</option>
        <option value="vegetable" {{ old('crop_type') == 'vegetable' ? 'selected' : '' }}>Vegetable</option>
        <option value="coconut" {{ old('crop_type') == 'coconut' ? 'selected' : '' }}>Coconut</option>
    </select>
</div>
@if ($errors->has('crop_type'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('crop_type') }}</div>
                @endif

               
                <div class="mb-3">
    <label for="farm_type" class="form-label">Land Category / Soil Type:</label><br>
    <select name="farm_type" class="form-select" id="farm_type">
        <option value="" disabled selected>Select types of Fields</option>
        <option value="1" {{ old('farm_type') == '1' ? 'selected' : '' }}>Irrigated - NIA/CIA</option>
        <option value="2" {{ old('farm_type') == '2' ? 'selected' : '' }}>Irrigated - Deep Well Pump / Shallow Tube Well(STW)</option>
        <option value="3" {{ old('farm_type') == '3' ? 'selected' : '' }}>Irrigated - Open Source (SWIP, Creek, River)</option>
        <option value="4" {{ old('farm_type') == '4' ? 'selected' : '' }}>Rainted(D) Broad Plain- Sandy Loam</option>
        <option value="E" {{ old('farm_type') == 'E' ? 'selected' : '' }}>Rolling/Upland</option>
        <option value="A" {{ old('farm_type') == 'A' ? 'selected' : '' }}>Broad Plan - Clay Loam</option>
        <option value="B" {{ old('farm_type') == 'B' ? 'selected' : '' }}>Broad Plan - silty Clay Loam</option>
        <option value="C" {{ old('farm_type') == 'C' ? 'selected' : '' }}>Broad Plan - Silty Loan</option>
    </select>
</div>

            @if ($errors->has('farm_type'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('farm_type') }}</div>
                @endif
            <div class="mb-3">
                <label for="tenurial" class="form-label">Farm Type:</label><br>
                <select name="tenurial" value="{{ old('tenurial') }}" class="form-select" id="crop_type" >
                    <option value="" disabled selected>Select Tenurial Status</option>
                    <option value="Landowner" {{ old('tenurial') == 'Landowner' ? 'selected' : '' }}>Landowner</option>
                    <option value="Lessee" {{ old('tenurial') == 'Lessee' ? 'selected' : '' }}>Lessee</option>
                    <option value="Tenant" {{ old('tenurial') == 'Tenant' ? 'selected' : '' }}>Tenant</option>
                
                </select>
            </div>
            @if ($errors->has('tenurial'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('tenurial') }}</div>
                @endif
            <div class="mb-3">
                <label for="land_area" class="form-label">Land Area (in Hectare):</label><br>
                <input type="number" placeholder="1 to 3 HA only" value="{{ old('land_area') }}" class="form-control" name="land_area" id="land_area" >
            </div>
            @if ($errors->has('land_area'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('land_area') }}</div>
                @endif <br><br>
                <div id="wrap">
<iframe  id="frame" src="mapping#map"  
    scrolling="no"
    frameborder="0"  ></iframe>
</div><br><br>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude:</label><br>
                <input type="number" step="0.0000000000001" name="latitude" value="{{ old('latitude') }}" class="form-control" id="latitude" >
                @if ($errors->has('latitude'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('latitude') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude:</label><br>
                <input type="number" step="0.0000000000001" value="{{ old('longitude') }}" class="form-control" name="longitude" id="longitude" >
                @if ($errors->has('longitude'))
                    <div class="alert alert-danger mt-2">{{ $errors->first('longitude') }}</div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
    </div>
  
<script>
const exclusiveCheckboxes = document.querySelectorAll('.exclusive');

const othersCheckbox = document.getElementById('OthersCheckbox');
const other1Input = document.getElementById('other1');

exclusiveCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('click', function() {
        exclusiveCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });

        other1Input.style.display = othersCheckbox.checked ? 'block' : 'none';
    });
});
</script>
<script>
const religionCheckboxes = document.querySelectorAll('.religionCheckbox');
const otherTextbox = document.getElementById('other1');

religionCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
       
        religionCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });

        if (this.value === 'Others') {
         
            otherTextbox.style.display = this.checked ? 'block' : 'none';
        } else {
            otherTextbox.style.display = 'none';
        }
    });
});

</script>

<script>
const statusCheckboxes = document.querySelectorAll('.statusCheckbox');
const spouseTextbox = document.getElementById('wife');

statusCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        statusCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });

        if (this.value === 'Married') {
            spouseTextbox.style.display = this.checked ? 'block' : 'none';
        }

        if (this.value !== 'Married' && !document.getElementById('Married').checked) {
            spouseTextbox.style.display = 'none';
        }
    });
});
</script>

<script>
const householdCheckboxes = document.querySelectorAll('.householdCheckbox');
const noHouseholdInput = document.getElementById('no_household');
const relationshipInput = document.getElementById('relationship');

householdCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        householdCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });

        if (this.value === 'No') {
            noHouseholdInput.style.display = this.checked ? 'block' : 'none';
            relationshipInput.style.display = this.checked ? 'block' : 'none';
        } else {
            noHouseholdInput.style.display = 'none';
            relationshipInput.style.display = 'none';
            noHouseholdInput.value = '';
            relationshipInput.value = '';
        }
    });
});
</script>


<script>
const educationCheckboxes = document.querySelectorAll('input[name="education"]');

educationCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        educationCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });
    });
});
</script>
<script>
const psCheckboxes = document.querySelectorAll('.psCheckbox');

psCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        psCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });
    });
});
</script>

<script>
const pwdCheckboxes = document.querySelectorAll('.pwdCheckbox');

pwdCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        pwdCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });
    });
});
</script>
<script>
const organicCheckboxes = document.querySelectorAll('.organicCheckbox');

organicCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        organicCheckboxes.forEach(cb => {
            if (cb !== this) {
                cb.checked = false;
            }
        });
    });
});
</script>

<script>
const urlParams = new URLSearchParams(window.location.search);
const latitudeParam = urlParams.get('lat');
const longitudeParam = urlParams.get('lng');

document.getElementById('latitude').value = latitudeParam;
document.getElementById('longitude').value = longitudeParam;

    
  </script>
</body>

</html>
