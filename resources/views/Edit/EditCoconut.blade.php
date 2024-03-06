<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coconut Harvest Record</title>
    <link rel="stylesheet" href="css/harvest.css">
</head>
<style>
    h2{
        text-align:center;
        color:white;
        margin-top:10px;
    }
   button{
        margin-top:40px;
        margin-left:170px;
    }
    #button{
        margin-top:40px;
       
    }
    .container{
        background-color: #77767693;
        margin-top:70px;
        
        height:300px;
        width:500px;
        border-radius:10px;
    }
    body {
	margin: 0;
    background-image: linear-gradient(to right, #02AAB0 0%, #00CDAC  51%, #02AAB0  100%);
	font-family: sans-serif;
	font-weight: 100;
}
</style>
<body>
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
<div class="container">
    <h2>Edit Coconut Harvest Record</h2>
 
    <form action="{{ url('updateCoconut') }}" method="POST" id="harvest-form">
        @csrf
    <input type="hidden" value="{{$data->id}}" name="id">
        <div class="form-group">
            <label for="coconutquantity">Coconut Harvest Quantity</label>
            <input type="number" value="{{$data->coconutquantity}}" name="coconutquantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="coconutharvest_date">Coconut Harvest Date</label>
            <input type="date" value="{{$data->coconutharvest_date}}" name="coconutharvest_date" class="form-control" required>
        </div>

        <button  type="submit" class="btn btn-primary">Submit</button> 
        <a href="/coconut"><input type="button" id="button" value="back"class="btn btn-danger"></a>  
    </form>
       
</div>




</div>
<a href="{{url('edit-coconut/'.$harvests->id)}}"> <button type="submit" class="btn btn-info"><i class="bi bi-pencil-square"></i> Edit</button></a>
<script>
    // Client-side JavaScript validation
    document.getElementById('harvest-form').addEventListener('submit', function (e) {
        e.preventDefault();

        var harvestDateInput = document.querySelector('input[name="coconutharvest_date"]');
        var harvestDate = new Date(harvestDateInput.value);
        var today = new Date();

        if (harvestDate > today) {
            alert('The harvest date must be today or a previous date');
            harvestDateInput.value = ''; // Clear the input field
        } else {
            // Submit the form
            this.submit();
        }
    });
</script>

</body>
</html>
