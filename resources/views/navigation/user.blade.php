<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>land field information</title>
</head>
<link rel="stylesheet" href="css/user.css">

<body>
    <?php
    $i=1;
    ?>
    @include('admin.adminhome')
    <div class="userContainer">
    <h1 id="title"><p>Registered Office staff</p></h1>
    <button type="button"  class="button-30"onclick="printToPDF()">Print to PDF</button>
   <a href="Registrations">
    <button type="button" class="button-30" ><i class='bx bx-user-plus'></i> Add Staff</button>
    </a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
<div class="search-container">
    <label for="search">Search by Name:</label>

<input type="text" id="search" placeholder="Enter Staff Name" oninput="filterByName()" onblur="clearSearch()">

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
<form id="myfrm">
    <table id="userTable">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Address</th>
            <th>Designation</th>
            <th>Created</th>
            
         
            <th>Action</th>
        </tr>
        <?php
        $i=1;
        ?>
        @foreach ($users as $user)
            @if ($user->usertype === 'user')
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $user->name }} {{ $user->middle_name }} {{ $user->surname }}</td>
                    <td>{{ $user->address}}</td>
                    <td>{{ $user->position}}</td>
                    <td>{{ $user->created_at}}</td>
                    
                    
                    <td>
                        <a href="{{url('deleteUser/'.$user->id)}}">
                            Delete
                        </a>
                    </td>
                </tr>
            @endif
            @endforeach
    </table>
  
</form>
    </div>
    
    <script>
function printToPDF() {
    // Create a new window for printing
    var printWindow = window.open('', '_blank');

    // Define the content to be printed with adjusted margins and paper size
    var content = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <style>
                
             
                body{
    
    font-family: 'figtree', sans-serif;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Style alternating rows with different background colors */
tr:nth-child(even) {
    background-color: #f9f9f9; /* Light gray background for even rows */
}

tr:nth-child(odd) {
    background-color: #ffffff; /* White background for odd rows */
}
                /* Add any other styles you need */
            </style>
        </head>
        <body>
        <img src="{{ asset('images/bato.png') }}" alt="Logo"> 
<h1 style="text-align:center; font-size:20px;">Office staff List</h1>
<table>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Address</th>
        <th>Position</th>
    </tr>
    <?php
        $s=1;
        ?>
    @foreach ($users as $user)
        @if ($user->usertype === 'user')
            <tr>
                <td>{{$s++}}</td>
                <td>{{ $user->name }} {{ $user->middle_name }} {{ $user->surname }}</td>
                <td>{{ $user->address}}</td>
                <td>{{ $user->position}}</td>
            </tr>
        @endif
    @endforeach
</table>

        </body>
        </html>
    `;

    printWindow.document.open();
    printWindow.document.write(content);
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
}
</script>




</body>
</html>
