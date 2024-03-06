<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corn Harvest Record</title>
    <link rel="stylesheet" href="css/harvest.css">
</head>
<body>
@include('admin.adminhome')
<div class="container">
    <h2>Create Corn Harvest Record</h2>

    <form action="{{ route('corn') }}" method="POST" id="harvest-form">
        @csrf
        <div class="form-group">
            <label for="cornplanted">Corn planted (tons)</label><br>
            <input type="number" name="cornplanted" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cornquantity">Corn Harvest Quantity (tons)</label><br>
            <input type="number" name="cornquantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cornharvest_date">Corn Harvest Date</label><br>
            <input type="date" name="cornharvest_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

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
    <h2>Corn Harvest Records</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Corn Planted (tons)</th>
                <th>Corn Harvest</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($corn as $harvests)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$harvests->cornplanted}}</td>
                <td>{{$harvests->cornquantity}}</td>
                <td>{{$harvests->cornharvest_date}}</td>
                <td>
                  
                    <a href="{{url('DeleteCorn/'.$harvests->id)}}">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
   
    document.getElementById('harvest-form').addEventListener('submit', function (e) {
        e.preventDefault();

        var harvestDateInput = document.querySelector('input[name="cornharvest_date"]');
        var harvestDate = new Date(harvestDateInput.value);
        var today = new Date();

        if (harvestDate > today) {
            alert('The harvest date must be today or a previous date');
            harvestDateInput.value = ''; 
        } else {
         
            this.submit();
        }
    });
</script>

</body>
</html>
