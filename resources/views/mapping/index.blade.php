
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapping Page</title>
    <link rel="stylesheet" href="css/index.css">
    <!-- Include Leaflet CSS and JavaScript here -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!-- Include Leaflet Draw CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
  <!-- Add Leaflet Fullscreen Plugin JavaScript -->
  <script src="https://unpkg.com/leaflet-fullscreen/dist/Leaflet.fullscreen.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.pm/dist/leaflet.pm.css" />
    <script src="https://unpkg.com/leaflet.pm/dist/leaflet.pm.min.js"></script>
    <script src="https://unpkg.com/leaflet-draw/dist/leaflet.draw.js"></script>
    <script src="https://unpkg.com/leaflet.pm/dist/leaflet.pm.min.js"></script>
    <script src="https://unpkg.com/@turf/turf"></script>

</head>
<style>
        /* Add CSS to display each checkbox on a new line */
        .leaflet-control-custom div {
            display: block;
            margin-bottom: 5px;
        }

        .leaflet-control-custom label {
            display: inline-block;
        }
    </style>
<style>



</style>
<body>
@include('admin.adminhome')
<div class="mapping">
<div class="top-section">
   
  <div class="dropdown">
 
    <label for="riceDropdown">Rice:</label>
    <select  style=" background-color: #faf86e;" id="riceDropdown" class="crop-dropdown">
      <option style=" background-color: #faf86e;" value="">Select</option>
    </select>

    <label for="cornDropdown">Corn:</label>
    <select style=" background-color: #ffb13d;" id="cornDropdown" class="crop-dropdown">
      <option style=" background-color: #ffb13d;"value="">Select</option>
    </select>

    <label for="vegetableDropdown">Vegetable:</label>
    <select  style=" background-color: #6efa6e;" id="vegetableDropdown" class="crop-dropdown">
      <option value="">Select</option>
    </select>

    <label for="coconutDropdown">Coconut:</label>
    <select style=" background-color: #fa6e6e;" id="coconutDropdown" class="crop-dropdown">
      <option value="">Select</option>
    </select>
  </div>
</div>

<div class="middle-section">
    <div class="left-section">
      <div class="map">
        <div id="frame">
        <div id="map" style="height: 500px; width:635px;"></div>
        </div>
        
      </div>
    </div>
   

    <div class="right-section">

    <a href="/registration">
<button class="button-64" role="button"><span class="text"><i class="bi bi-person-add"></i> Add Farmers</span></button>
</a>
<h4 class="radio-title">Land Border</h4>
<div class="radio-options">
<div class="radio-option">
    <input type="radio" name="color" value="yellow" id="yellow" checked>
    <label for="yellowColor">Yellow</label>
</div>
<div class="radio-option">
    <input type="radio" name="color" value="orange" id="orange">
    <label for="orangeColor">Orange</label>
</div>
<div class="radio-option">
    <input type="radio"  name="color" value="green" id="green">
    <label for="greenColor">Green</label>
</div>


<div class="radio-option">
    <input type="radio" name="color" value="red" id="red"><label for="red">
    <label for="redColor">Red</label>
</div>

<input type="text" id="searchInput" class="search-input" placeholder="Name...">
<button id="searchButton" class="search-button"><i class="bi bi-search"></i></button>
<div id="searchResult" class="search-results"></div>
</div>

</div>
<script>
// Function to handle search button click
$('#searchButton').click(function () {
    var searchQuery = $('#searchInput').val().toLowerCase();

    // Clear previous search results
    $('#searchResult').html('');

    // Keep track of found names to avoid duplication
    var foundNames = [];

    // Flag to check if any results were found
    var resultsFound = false;

    // Iterate through all markers and check if the name or crop type matches the search query
    allMarkers.eachLayer(function (layer) {
        var popupContent = layer.getPopup().getContent().toLowerCase();
        var nameMatch = popupContent.match(/<strong>Name:<\/strong> (.*?)</i);
        var cropTypeMatch = popupContent.match(/<strong>Crop Type:<\/strong> (.*?)</i);

        
        var nameFound = nameMatch && (nameMatch[1].toLowerCase().includes(searchQuery) ||
            nameMatch[1].toLowerCase().split(' ').reverse().join(' ').includes(searchQuery));
        var cropTypeFound = cropTypeMatch && cropTypeMatch[1].toLowerCase().includes(searchQuery);

        if (nameFound || cropTypeFound) {
           
            var name = nameMatch ? nameMatch[1] : 'N/A';
            var cropType = cropTypeMatch ? cropTypeMatch[1] : 'N/A';

            if (!foundNames.includes(name)) {
                foundNames.push(name);
                resultsFound = true;

                var resultItem = '<div class="search-result-item" onclick="zoomToMarker(' +
                    layer.getLatLng().lat + ',' + layer.getLatLng().lng + ')">' +
                    '<strong>Name:</strong> ' + name + '<br>' +
                    '<strong>Crop Type:</strong> ' + cropType +
                    '</div>';

                $('#searchResult').append(resultItem);
            }
        }
    });

  
    if (!resultsFound) {
        var noResultsMessage = '<div class="search-result-item">' +
            'No matching results found for "' + searchQuery + '".' +
            '</div>';

        $('#searchResult').append(noResultsMessage);
    }
});


function zoomToMarker(lat, lng) {
    var markerLatLng = L.latLng(lat, lng);
    map.setView(markerLatLng, 18);
}

// Function to handle Enter key press in the search input
$('#searchInput').keypress(function (e) {
    if (e.which === 13) {
        // Simulate a click on the search button when Enter is pressed
        $('#searchButton').click();
    }
});

</script>



<div id="coordinates-popup"><a href="/create"></a></div>


<script src="{{asset('js/account.js')}}"></script>
    <script>
        
       
    
    var latitude = {{ isset($latitude) ? $latitude : 13.326724}};
   var longitude = {{ isset($longitude) ? $longitude :  123.312789}};
    var zoom = {{ isset($zoom) ? $zoom : 12 }};  

    var map = L.map('map', {
        center: [latitude, longitude],
        zoom: zoom,
        
        layers: [
            
            L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                maxZoom: 19,
                attribution: '&copy; Google Maps'
            })
        ]
    });
    
   



 // Create a layer group for all markers
var allMarkers = L.layerGroup().addTo(map);

// Fetch and display markers from your Laravel backend using AJAX
$.ajax({
    url: "{{ route('markers.index') }}",
    method: 'GET',
    dataType: 'json',
    success: function (data) {
        data.forEach(function (marker) {
            var circleColor;
            var polygonColor; // Add a variable for polygon color
            var popupContent;

            switch (marker.crop_type) {
                case 'rice':
                  iconUrl = '../images/yellow.png'; 
                    circleColor = 'yellow'; 
                    polygonColor = 'rgba(255, 255, 0, 0)';
                    break;
                case 'corn':
                    circleColor = 'orange'; 
                    polygonColor = 'rgba(255, 255, 0, 0)';
                    break;
                case 'vegetable':
                    circleColor = '#00ff22'; 
                    polygonColor = 'rgba(255, 255, 0, 0)'; 
                    break;
                case 'coconut':
                    circleColor = 'red'; 
                    polygonColor = 'rgba(255, 255, 0, 0)';
                    break;
                default:
                    circleColor = 'gray'; 
                    polygonColor = 'rgba(255, 255, 0, 0)';
            }

            // 
            var circle = L.circle([marker.latitude, marker.longitude], {
                color: circleColor,
                fillColor: circleColor,
                fillOpacity: 0.5,
                radius: 20,
            });

            
            var size = 0.1; 

          
            var squareVertices = [
                [marker.latitude + size / 90, marker.longitude - size / 90],
                [marker.latitude - size / 90, marker.longitude - size / 90],
                [marker.latitude - size / 90, marker.longitude + size / 90],
                [marker.latitude + size / 90, marker.longitude + size / 90],
            ];

            // Create the polygon
            var polygon = L.polygon(squareVertices, {
                color: polygonColor,
                fillColor: polygonColor,
                fillOpacity: 0,
            });

            // Create a popup for the circle with the same content as the marker
            var circlePopup = L.popup()
                .setContent(
                    "<strong>Name:</strong> " + marker.surname + " " + marker.first_name + " " + marker.middle_name +
                    "<br><strong>Farm Address:</strong> " + marker.address +
                    "<br><strong>Crop Type:</strong> " + marker.crop_type +
                    "<br><strong>Farm Type:</strong> " + marker.farm_type +
                    "<br><strong>Land Area:</strong> " + marker.land_area + " <strong>Ha</strong>" +
                    "<br><strong>Latitude:</strong> " + marker.latitude +
                    "<br><strong>Longitude:</strong> " + marker.longitude
                );

            var polygonPopup = L.popup()
                .setContent(
                    "<strong>Name:</strong> " + marker.surname + " " + marker.first_name + " " + marker.middle_name +
                    "<br><strong>Farm Address:</strong> " + marker.address +
                    "<br><strong>Crop Type:</strong> " + marker.crop_type +
                    "<br><strong>Farm Type:</strong> " + marker.farm_type +
                    "<br><strong>Land Area:</strong> " + marker.land_area + " <strong>Ha</strong>" +
                    "<br><strong>Latitude:</strong> " + marker.latitude +
                    "<br><strong>Longitude:</strong> " + marker.longitude
                );

            // Bind the popup to the circle
            circle.bindPopup(circlePopup);
            polygon.bindPopup(polygonPopup);

            // Add the circle and polygon to the layer group
            circle.addTo(allMarkers);
            polygon.addTo(allMarkers);

            // Update the dropdowns based on crop type
            updateDropdown(marker.crop_type,  marker.surname, marker.first_name,marker.latitude + ',' + marker.longitude);
        });
    },
    error: function (xhr, status, error) {
        console.error(xhr.responseText);
    }
});

</script>
<script src="{{asset('js/index.js')}}"></script>

<script>
    map.addControl(new L.Control.Fullscreen());

// Function to handle right-click events
function onMapRightClick(e) {
    // Perform reverse geocoding to get the address or place information
    $.ajax({
        url: 'https://nominatim.openstreetmap.org/reverse',
        method: 'GET',
        dataType: 'json',
        jsonp: false,
        data: {
            format: 'json',
            lat: e.latlng.lat,
            lon: e.latlng.lng,
        },
        success: function (data) {
            var address = data.display_name || 'Unknown location';

            // Open a popup with coordinates and address information
            popup
                .setLatLng(e.latlng)
                .setContent('Coordinates: ' + e.latlng.lat.toFixed(6) + ', ' + e.latlng.lng.toFixed(6) + '<br>Location: ' + address + '<br><a href="#" id="addFarmersLink">Add Farmers</a>')
                .openOn(map);

            // Add event listener to the link inside the popup
            document.getElementById('addFarmersLink').addEventListener('click', function (event) {
                // Prevent the default link behavior
                event.preventDefault();

                // Redirect to the registration page with coordinates as query parameters
                window.location.href = '/registration?lat=' + e.latlng.lat.toFixed(6) + '&lng=' + e.latlng.lng.toFixed(6);
            });
        },
        error: function (xhr, status, error) {
            console.error('Reverse geocoding error:', error);
        }
    });
}

// Add the right-click event listener to the map
map.on('contextmenu', onMapRightClick);


function checkAllCheckboxes() {
    // Select all checkboxes by their type
    $('input[type="checkbox"]').prop('checked', true);
}

// Call the function to check all checkboxes
checkAllCheckboxes();// Function to save drawn features to local storage


  
// Function to extract crop type from the popup content
function getFarmerInfo(popupContent) {
    var info = {};
    var lines = popupContent.split('<br>');
    lines.forEach(function (line) {
        if (line.includes('crop type: ')) {
            info.cropType = line.split('crop type: ')[1].trim();
        }
    });
    return info;
}

var popup = L.popup();

// Event handler for checkbox changes
$('.color-checkbox').change(function () {
    updateMarkerVisibility();
});



// Function to update the appropriate dropdown based on crop type
function updateDropdown(cropType, firstname, surname, coordinates) {
    var dropdownId = cropType.toLowerCase() + 'Dropdown';
    var option = '<option value="' + firstname + '" data-coordinates="' + coordinates + '">' + firstname + ' ' + surname + '</option>';
    $('#' + dropdownId).append(option);
}


$('.crop-dropdown').change(function () {
    console.log('Dropdown selection changed.');

    var selectedOption = $(this).find('option:selected');
    var coordinates = selectedOption.data('coordinates');
    
    console.log('Selected Option:', selectedOption.text());
    console.log('Data Coordinates:', coordinates);

    if (coordinates) {
        var latLng = coordinates.split(',').map(parseFloat);
        if (!isNaN(latLng[0]) && !isNaN(latLng[1])) {
            var markerLatLng = L.latLng(latLng[0], latLng[1]);
            map.setView(markerLatLng, 18);
        } else {
            console.error('Invalid coordinates:', coordinates);
        }
    }

 
    $('.crop-dropdown').not(this).val('');
});


var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    var colorMap = {}; // Map to store color information for each drawn item

    var drawOptions = {
        position: 'topleft',
        draw: {
            polygon: true,
            polyline: true,
            rectangle: false,
            circle: false,
            circlemarker: false,
            marker: false
        },
        edit: {
            featureGroup: drawnItems,
            remove: true
        }
    };

    var drawControl = new L.Control.Draw(drawOptions);
    map.addControl(drawControl);

    // Load saved shapes from local storage on page load
    window.onload = function() {
        var savedShapes = localStorage.getItem('drawnItems');
        if (savedShapes) {
            var savedData = JSON.parse(savedShapes);
            savedData.forEach(function(item) {
                var layer = L.geoJSON(item.geometry).getLayers()[0];
                var color = item.properties.color;
                drawnItems.addLayer(layer);
                colorMap[L.stamp(layer)] = color;
                layer.setStyle({ fillColor: color, color: color });
            });
        }
    };

// Function to check for overlap between newLayer and existing layers
function checkOverlap(newLayer) {
    var overlapDetected = false;

    drawnItems.eachLayer(function (existingLayer) {
        if (existingLayer instanceof L.Polygon && newLayer instanceof L.Polygon) { // Check if both layers are polygons
            var overlap = turf.booleanOverlap(existingLayer.toGeoJSON(), newLayer.toGeoJSON());
            var contains = turf.booleanContains(existingLayer.toGeoJSON(), newLayer.toGeoJSON());
            var contained = turf.booleanContains(newLayer.toGeoJSON(), existingLayer.toGeoJSON());
            if (overlap || contains || contained) {
                overlapDetected = true;
                var overlapCenter = turf.centerOfMass(turf.union(existingLayer.toGeoJSON(), newLayer.toGeoJSON()));
                L.popup()
                    .setLatLng([overlapCenter.geometry.coordinates[1], overlapCenter.geometry.coordinates[0]])
                    .setContent("Overlap Detected!")
                    .openOn(map);
            }
        }
    });

    return overlapDetected;
}


    map.on('draw:created', function (e) {
        var layer = e.layer;

        // Check for overlapping polylines
        if (layer instanceof L.Polyline) {
            var hasOverlap = checkOverlap(layer);
            if (hasOverlap) {
                drawnItems.removeLayer(layer);
                return; // Skip saving if there's overlap
            }
        }

        drawnItems.addLayer(layer);

        var selectedColor = document.querySelector('input[name="color"]:checked').value;

        // Store color information for the drawn item
        colorMap[L.stamp(layer)] = selectedColor;

        layer.setStyle({ fillColor: selectedColor, color: selectedColor });

        // Save drawn items to local storage
        var savedData = [];
        drawnItems.eachLayer(function (existingLayer) {
            var layerId = L.stamp(existingLayer);
            var color = colorMap[layerId] || 'yellow'; // Default to yellow if no color is stored
            savedData.push({
                type: 'Feature',
                geometry: existingLayer.toGeoJSON().geometry,
                properties: {
                    color: color
                }
            });
        });
        localStorage.setItem('drawnItems', JSON.stringify(savedData));
    });

    map.on('draw:deleted', function (e) {
        var layers = e.layers;
        layers.eachLayer(function (layer) {
            drawnItems.removeLayer(layer);
            var layerId = L.stamp(layer);
            delete colorMap[layerId]; // Remove color information for the removed item
        });

        // Save drawn items to local storage after removal
        var savedData = [];
        drawnItems.eachLayer(function (existingLayer) {
            var color = colorMap[L.stamp(existingLayer)] || 'yellow'; // Default to yellow if no color is stored
            savedData.push({
                type: 'Feature',
                geometry: existingLayer.toGeoJSON().geometry,
                properties: {
                    color: color
                }
            });
        });
        localStorage.setItem('drawnItems', JSON.stringify(savedData));
    });

    // Event listener for radio buttons
    var radioButtons = document.querySelectorAll('input[name="color"]');
    radioButtons.forEach(function (radio) {
        radio.addEventListener('change', function () {
            var selectedColor = this.value;
            drawnItems.eachLayer(function (layer) {
                var layerId = L.stamp(layer);
                var storedColor = colorMap[layerId] || 'yellow'; // Default to yellow if no color is stored
                layer.setStyle({ fillColor: storedColor, color: storedColor });
            });
        });
    });

var markersLayer = L.layerGroup().addTo(map);
var baseMaps = {
    'Google Satellite': L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        attribution: '&copy; Google Maps',
        
    }),
    
    'OpenStreetMap': L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    })
};

L.control.layers(baseMaps).addTo(map);
map.addLayer(baseMaps['Google Satellite']);



// Function to zoom to a specific marker
function zoomToMarker(lat, lng) {
    var markerLatLng = L.latLng(lat, lng);
    map.setView(markerLatLng, 18);
}

// Create a layer group for all polygons created with Leaflet Draw
var drawnPolygons = L.layerGroup().addTo(map);

// Function to update polygon visibility based on checkbox state
function updatePolygonVisibility() {
    drawnPolygons.clearLayers(); // Clear existing drawn polygons on the map

    // Iterate through all drawn polygons and add them to the map based on color
    drawnItems.eachLayer(function (layer) {
        if (layer instanceof L.Polygon) {
            var polygonColor = 'blue'; // Set the color for drawn polygons

            // Show drawn polygon if its color is in the visibleColors array
            if (visibleColors.includes(polygonColor)) {
                drawnPolygons.addLayer(layer);

                // Add click event to the drawn polygon
                layer.on('click', function () {
                    var popupContent = "<strong>Drawn Polygon</strong>";

                    var popup = L.popup()
                        .setLatLng(layer.getBounds().getCenter())
                        .setContent(popupContent)
                        .openOn(map);
                });
            }
        }
    });
}



</script>

</body>

</html>


