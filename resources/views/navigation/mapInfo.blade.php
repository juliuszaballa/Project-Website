
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;0,800;0,900;1,400;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>

</style>


<body>
@include('admin.adminhome')





<style media="screen">
 
  </style>

<div class="dashboard">

<h1><p>Field Insights: Bato Farmland Overview</p></h1>
  <div style="margin: auto; width: 50%;">

</div>
<div id="wrap">
<iframe  id="frame" src="mapping#map"  
    scrolling="no"
    frameborder="0"  ></iframe>
</div>

<div class="container">
	
	<div class="table">
		<div class="table-header">
			<div class="header__item">Farmers</a></div>
      <div class="header__item">Comodity</a></div>
			<div class="header__item">Insured Farmers</a></div>
			<div class="header__item">No. of Office Staff</a></div>
			<div class="header__item">Land Area (ha)</a></div>
			<div class="header__item">farm Field</a></div>
		</div>
		<div class="table-content">	
			<div class="table-row">		
				<div class="table-data">{{ $totalUsers }}</div>
        <div class="table-data">4</div>
				<div class="table-data">{{ $totalUsers }}</div>
				<div class="table-data">{{ $staff }}</div>
		 
     <div class="table-data">{{  $totalLandArea }} Ha</div>
     <div class="table-data">{{ $totalCrops }}</div>
       
			</div>
			
		</div>	
	</div>
</div>
    
   
<div class="type">
    <div class="text-container">
        <h4 id="crop">Distribution of Crop Types</h4>
        <ul>
       
            <div class="containerCrops">
    <canvas id="graph-chart"></canvas>
  </div>
            
  <div class="containerCrops">
    <canvas id="doughnut-chart"></canvas>
  </div>
  </ul>
    </div>
   
    </div>


    <div class="dropdown open">
    <ul class="nav navbar-nav">
      
        <li class="nav-item dropdown">
            <a class="btn btn-primary dropdown-toggle" href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add Crop Harvest
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="rice">Rice Harvest</a>
                <a class="dropdown-item" href="corn">Corn Harvest</a>
               
            </div>
        </li>
    </ul>
</div>
        <div class="RiceContainer">
        <div>
    <label for="harvestDate1">Harvest Date:</label>
    <select id="harvestDate1">
        <option value="all">All Dates</option>
    </select>
</div>
        <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>

<div>
    <label for="startYear1">Start Year:</label>
    <input type="text" id="startYear1" placeholder="Enter start year ">
    <label for="endYear1">End Year:</label>
    <input type="text" id="endYear1" placeholder="Enter end year">
    <button id="clearButton1">Clear</button>
</div>
</div>
<div class="RiceContainer">
    <label for="cornharvest_date">Choose a harvest date:</label>
    <select name="cornharvest_date" id="cornharvest_date">
        <option value="all">All</option>
    </select>
    <canvas id="myCornChart" style="width:100%;max-width:600px"></canvas>
<div>
    <label for="startYear">Start Year:</label>
    <input type="text" id="startYear" placeholder="Enter start year">
    <label for="endYear">End Year:</label>
    <input type="text" id="endYear" placeholder="Enter end year ">
    <button id="clearButton">Clear</button>
</div>
  </div>

<div id="forecast">
  <!-- Daily weather forecast will be displayed here -->
</div>
</div>
     

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js"></script>

  <script >
    // New data
    var newData = [{{ $totalRiceCrops }}, {{ $totalCornCrops }}, {{ $totalVegetableCrops }}, {{ $totalCoconutCrops }}];

    var data = [{
      data: newData,
      backgroundColor: [
        "#bedb00",
        "orange",
        "green",
        "red"
      ],
      borderColor: "#fff",
      // Enable datalabels for this dataset
      datalabels: {
        color: '#fff',
        formatter: (value, ctx) => {
          const datapoints = ctx.chart.data.datasets[0].data;
          const total = datapoints.reduce((total, datapoint) => total + datapoint, 0);
          const percentage = value / total * 100;
          return percentage.toFixed(2) + "%";
        },
      }
    }];

    var options = {
      tooltips: {
        enabled: false
      },
      cutoutPercentage: 50 // Adjust this value to control the size of the hole in the doughnut
    };

    var ctx = document.getElementById("doughnut-chart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut', // Change the chart type to 'doughnut'
      data: {
        
        datasets: data
      },
      options: options,
      plugins: [ChartDataLabels],
    });
  </script>
<script>
  // New data
  var newData = [{{ $totalRiceCrops }}, {{ $totalCornCrops }}, {{ $totalVegetableCrops }}, {{ $totalCoconutCrops }}];

  // Chart data
  var chartData = {
    datasets: [{
      data: newData,
      backgroundColor: ["#bedb00", "orange", "green", "red"],
      borderColor: "#fff",
      datalabels: {
        color: '#fff',
        formatter: (value) => value.toString(), // Display the raw numerical values
      }
    }],
    labels: ['Rice Crops', 'Corn Crops', 'Vegetable Crops', 'Coconut Crops'],
  };

  // Chart options
  var chartOptions = {
    tooltips: {
      enabled: false
    },
    cutoutPercentage: 50,
    title: {
      display: true,
      text: 'Crop Distribution', // Add your desired title here
      fontSize: 16,
      fontColor: '#333', // Add your desired color for the title
      fontStyle: 'bold',
    },
  };

  var ctx = document.getElementById("graph-chart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: chartOptions,
    plugins: [ChartDataLabels],
  });
</script>


               







               <script>
    document.addEventListener('DOMContentLoaded', function () {
        const chartData = @json($harvests);

        const harvestDates = chartData.map(entry => entry.harvest_date);
        const plantedValues = chartData.map(entry => entry.planted);
        const quantityValues = chartData.map(entry => entry.quantity);

        // Populate the select element
        const selectElement = document.getElementById("harvestDate1");
        harvestDates.forEach(date => {
            const option = document.createElement("option");
            option.value = date;
            option.text = date;
            selectElement.add(option);
        });

        const ctx = document.getElementById('myChart1').getContext('2d');
        const myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: harvestDates,
                datasets: [
                    {
                        label: "No. of Tons Planted",
                        backgroundColor: "blue",
                        data: plantedValues,
                    },
                    {
                        label: "No. of Tons Harvested",
                        backgroundColor: "yellow",
                        data: quantityValues,
                    },
                ],
            },
            options: {
                title: {
                    display: true,
                    text: "Rice Harvest Statistics",
                    fontSize: 16,
                    fontColor: 'black',
                },
            },
        });

        // Add event listener to update the chart on select change
        selectElement.addEventListener('change', (event) => {
            const selectedDate = event.target.value;

            if (selectedDate === 'all') {
                // Show all data
                myChart.data.datasets[0].data = plantedValues;
                myChart.data.datasets[1].data = quantityValues;
                myChart.data.labels = harvestDates;
            } else {
                // Show data for the selected date and its four previous dates
                const selectedIndex = harvestDates.indexOf(selectedDate);
                const start = Math.max(0, selectedIndex - 4);
                const end = Math.min(harvestDates.length - 1, selectedIndex);
                myChart.data.datasets[0].data = plantedValues.slice(start, end + 1);
                myChart.data.datasets[1].data = quantityValues.slice(start, end + 1);
                myChart.data.labels = harvestDates.slice(start, end + 1);
            }

            myChart.update();
        });

        // Add event listener to clear the textboxes
        const startYearInput = document.getElementById("startYear1");
        const endYearInput = document.getElementById("endYear1");
        const clearButton = document.getElementById("clearButton1");

        startYearInput.addEventListener('input', updateYearFilter);
        endYearInput.addEventListener('input', updateYearFilter);

        clearButton.addEventListener('click', () => {
            startYearInput.value = '';
            endYearInput.value = '';
            updateYearFilter();
        });

        function updateYearFilter() {
            const startYear = parseInt(startYearInput.value) || 0;
            const endYear = parseInt(endYearInput.value) || 9999;

            const filteredData = chartData.filter(entry => {
                const harvestYear = new Date(entry.harvest_date).getFullYear();
                return harvestYear >= startYear && harvestYear <= endYear;
            });

            myChart.data.labels = filteredData.map(entry => entry.harvest_date);
            myChart.data.datasets[0].data = filteredData.map(entry => entry.planted);
            myChart.data.datasets[1].data = filteredData.map(entry => entry.quantity);
            myChart.update();
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chartData = @json($cornharvests);

        const harvestDates = chartData.map(entry => entry.cornharvest_date);
        const plantedValues = chartData.map(entry => entry.cornplanted);
        const quantityValues = chartData.map(entry => entry.cornquantity);

        // Populate the select element
        const selectElement = document.getElementById("cornharvest_date");
        harvestDates.forEach(date => {
            const option = document.createElement("option");
            option.value = date;
            option.text = date;
            selectElement.add(option);
        });

        const ctx = document.getElementById('myCornChart');

        if (!ctx) {
            console.error('Canvas element not found.');
            return;
        }

        const myCornChart = new Chart(ctx.getContext('2d'), {
            type: "bar",
            data: {
                labels: harvestDates,
                datasets: [
                    {
                        label: "No. of Tons Planted",
                        backgroundColor: "blue",
                        data: plantedValues,
                    },
                    {
                        label: "No. of Tons Harvested",
                        backgroundColor: "orange",
                        data: quantityValues,
                    },
                ],
            },
            options: {
                title: {
                    display: true,
                    text: "Corn Harvest Statistics",
                    fontSize: 16,
                    fontColor: 'black',
                },
            },
        });

        // Add event listener to update the chart on select change
        selectElement.addEventListener('change', (event) => {
            updateChart(event.target.value);
        });

        // Add event listener to update the chart on year filter change
        const startYearInput = document.getElementById("startYear");
        const endYearInput = document.getElementById("endYear");
        const clearButton = document.getElementById("clearButton");

        startYearInput.addEventListener('input', updateYearFilter);
        endYearInput.addEventListener('input', updateYearFilter);

        // Add event listener to clear the textboxes
        clearButton.addEventListener('click', () => {
            startYearInput.value = '';
            endYearInput.value = '';
            updateYearFilter();
        });

        function updateYearFilter() {
            const startYear = parseInt(startYearInput.value) || 0;
            const endYear = parseInt(endYearInput.value) || 9999;

            const filteredData = chartData.filter(entry => {
                const harvestYear = new Date(entry.cornharvest_date).getFullYear();
                return harvestYear >= startYear && harvestYear <= endYear;
            });

            myCornChart.data.labels = filteredData.map(entry => entry.cornharvest_date);
            myCornChart.data.datasets[0].data = filteredData.map(entry => entry.cornplanted);
            myCornChart.data.datasets[1].data = filteredData.map(entry => entry.cornquantity);
            myCornChart.update();
        }

        function updateChart(selectedDate) {
            if (selectedDate === 'all') {
                // Show all data
                myCornChart.data.datasets[0].data = plantedValues;
                myCornChart.data.datasets[1].data = quantityValues;
                myCornChart.data.labels = harvestDates;
            } else {
                // Show data for the selected date and its four previous dates
                const selectedIndex = harvestDates.indexOf(selectedDate);
                const start = Math.max(0, selectedIndex - 4);
                const end = Math.min(harvestDates.length - 1, selectedIndex);
                myCornChart.data.datasets[0].data = plantedValues.slice(start, end + 1);
                myCornChart.data.datasets[1].data = quantityValues.slice(start, end + 1);
                myCornChart.data.labels = harvestDates.slice(start, end + 1);
            }

            myCornChart.update();
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf@1.5.3/dist/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.3/jspdf.plugin.autotable.min.js"></script>

<script>
    var cornharvestDates = @json($cornharvests->pluck('cornharvest_date'));
    var cornquantities = @json($cornharvests->pluck('cornquantity'));
</script>

<script>
    var coconutharvestDates = @json($coconutharvests->pluck('coconutharvest_date'));
    var coconutquantities = @json($coconutharvests->pluck('coconutquantity'));
</script>


<script src="{{asset('js/info.js')}}"></script>

<script>
    var totalRiceCrops = @json($totalRiceCrops);
    var totalCornCrops = @json($totalCornCrops);
    var totalVegetableCrops = @json($totalVegetableCrops);
    var totalCoconutCrops = @json($totalCoconutCrops);
</script>

</body>

</html>
