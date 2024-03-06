<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account List</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<link rel="stylesheet" href="css/account.css">
<style>

    /* Add any additional styling as needed */
</style>
<body>
@include('admin.adminhome')





<div class="accountContainer">
<div class="btntop">
    <h2 id="title"><p>List of Registered Farmers</p></h2>
    <!--
<a href="/registration">
<button class="button-64" role="button"><span class="text"><i class="bi bi-person-add"></i> Add Farmers</span></button>
</a>

 !-->
<button class="button-30"   onclick="printTable()" role="button"><i class="bi bi-printer"></i> Print all</button>
<button class="button-30"   onclick="printRice()" role="button"><i class="bi bi-printer"></i> Print Rice</button>
<button class="button-30"   onclick="printCorn()" role="button"><i class="bi bi-printer"></i> Print Corn</button>
<button class="button-30"   onclick="printCoconut()" role="button"><i class="bi bi-printer"></i> Print Coconut</button>
<button class="button-30"   onclick="printVegetable()" role="button"><i class="bi bi-printer"></i> Print Vegetable</button>
<!-- Add this inside the <div class="btntop"> section -->

<script>
    function filterByCropType() {
    var selectedCropType = document.getElementById('cropType').value;
    var table = document.getElementById('myfrm');
    var rows = table.getElementsByTagName('tr');

    for (var i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        var cropType = rows[i].getElementsByTagName('td')[3].innerText.toLowerCase(); // Assuming crop type is in the 4th column (index 3)

        if (selectedCropType === 'all' || cropType === selectedCropType) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}

</script>
<div class="containerfilter">
<div class="dropdown">
    <label for="cropType">Filter Crop Type:</label>
    <select id="cropType" onchange="filterByCropType()">
        <option value="all">All</option>
        <option value="rice">Rice</option>
        <option value="corn">Corn</option>
        <option value="coconut">Coconut</option>
        <option value="vegetable">Vegetable</option>
    </select>
</div>

<div class="search-container">
    <label for="search">Search by Name:</label>

<input type="text" id="search" placeholder="Enter Farmers Name" class="form-control" oninput="filterByName()" onblur="clearSearch()">

</div>
</div>
<script>
function clearSearch() {
    var input = document.getElementById('search');
    input.value = '';
    filterByName(); // Optionally, you can re-run the filtering when the search box is cleared
}
function filterByName() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    table = document.getElementById('myfrm');
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[1]; // Assuming name is in the 2nd column (index 1)

        if (td) {
            txtValue = td.textContent || td.innerText;
            if (filter === '' || txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}

</script>
</div>
    <div class="container">
        <table id="myfrm">
            <thead id="size">
                <tr>
                    <th id="size">No.</th>
                    <th id="size">Name</th>
                    <th id="size">Farm Located</th>
                    <th id="size">Crop Type</th>
                    <th id="size">Farm Land</th>
                    <th id="size">PDF</th>
                    <th id="size">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($accounts as $account)
                <tr data-land-area="{{ $account->land_area }}"   data-farm-type="{{ $account->farm_type }}"
                data-tenurial="{{ $account->tenurial }}" data-north="{{ $account->north }}" data-south="{{ $account->south }}"
                data-east="{{ $account->east }}" data-west="{{ $account->west }}" data-name="{{ $account->first_name }}"
                data-middle="{{ $account->middle_name }}" data-last="{{ $account->surname }}">
              
                    <td id="tdsize">{{$i++}}</td>
                    <td id="tdsize">{{ $account->surname}} {{ $account->first_name }}</td>
                    <td id="tdsize">{{ $account->address }}</td>
                    <td id="tdsize">{{ $account->crop_type }}</td>
					
                    <td id="tdsize">
                        <a id="edit"  href="{{ route('view', ['latitude' => $account->latitude, 'longitude' => $account->longitude, 'zoom' => 17]) }}" class="btn btn-primary">
                        <strong> View</strong>
                       </a>
                    </td>
                    <td> 
                    <!-- HTML !-->
                        <button class="button-16" onclick="printRowDetails(this)" role="button"><i class="bi bi-printer"></i> Print</button>
    
                    </td>
                    <td id="tdsize"><a  id="edit" href="{{url('edit-farmer/'.$account->id)}}">EDIT</a>
                  
                    | <a id="delete" href="{{url('DeleteFarmer/'.$account->id)}}" > DELETE</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   

</div>
    <script>
   var accountsData = @json($accounts);
</script>
<script src="{{ asset('js/account.js') }}"></script>



    
</body>


</html>
