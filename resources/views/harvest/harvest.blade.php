<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/harvest.css">
</head>
@include('admin.adminhome')
<body>
<div class="container">
    <h2>Create Rice Harvest Record</h2>
   

    <form action="{{ route('harvests.store') }}" method="POST" id="harvest-form">
        @csrf

        <div class="form-group">
            <label for="planted"> planted (tons)</label><br>
            <input type="number" name="planted" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Harvest Quantity (tons)</label><br>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="harvest_date">Harvest Date</label><br>
            <input type="date" name="harvest_date" class="form-control" required>
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
    <h2>Rice Harvest Records</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Rice Planted (tons)</th>
                <th>Harvest (tons)</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($harvest as $harvests)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$harvests->planted}}</td>
                <td>{{$harvests->quantity}}</td>
                <td>{{$harvests->harvest_date}}</td>
                <td>
            
                  <a href="{{url('DeleteRice/'.$harvests->id)}}">
                  <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                  </a>
                        
                  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>
    // Client-side JavaScript validation
    document.getElementById('harvest-form').addEventListener('submit', function (e) {
        e.preventDefault();

        var harvestDateInput = document.querySelector('input[name="harvest_date"]');
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