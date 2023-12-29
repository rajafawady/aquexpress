<style>
  #map {
    height: 300px;
  }


  #use-my-location {
    cursor: pointer;
  }
</style>
</head>
<body>

<div class="row">
<input id="pac-input" type="text" placeholder="Search for a location" class="form-control">
<button id="use-my-location" class="btn">Use Current Location</button>
</div>

<div id="map" class="rounded-lg mt-3"></div>

<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: 37.7749, lng: -122.4194 }, // Default center (San Francisco)
    zoom: 12
  });

  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);

  map.addListener('bounds_changed', function () {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];

  // Function to add a marker to the map
  function addMarker(location) {
    var marker = new google.maps.Marker({
      map: map,
      position: location
    });

    markers.push(marker);
  }

  // Add click event listener to get latitude and longitude of clicked location
  map.addListener('click', function (event) {
    var currentlocation = `${event.latLng.lat()}`+','+`${event.latLng.lng()}`;
    document.getElementById('address').value = currentlocation;

    // Clear out the old markers.
    markers.forEach(function (marker) {
      marker.setMap(null);
    });

    // Create a marker for the clicked location.
    addMarker(event.latLng);
  });

  // Add click event listener to "Use My Location" button
  document.getElementById('use-my-location').addEventListener('click', function (e) {
e.preventDefault();
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function (position) {
    var userLocation = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    };

    // Clear out the old markers.
    markers.forEach(function (marker) {
      marker.setMap(null);
    });

    // Create a marker for the current location.
    addMarker(userLocation);

    // Set the center of the map to the user's location
    map.setCenter(userLocation);

    var currentlocation = `${userLocation.lat}` + ',' + `${userLocation.lng}`;
    document.getElementById('address').value = currentlocation;
  }, function () {
    alert('Error: The Geolocation service failed.');
  });
} else {
  alert('Error: Your browser doesn\'t support geolocation.');
}
});


  searchBox.addListener('places_changed', function () {
    var places = searchBox.getPlaces();

    if (places.length === 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function (marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name, and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function (place) {
      if (!place.geometry) {
        console.log('Returned place contains no geometry');
        return;
      }

      // Create a marker for each place.
      addMarker(place.geometry.location);
      var currentlocation = `${place.geometry.location.lat()}`+','+`${place.geometry.location.lng()}`;
      document.getElementById('address').value = currentlocation;

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });

    map.fitBounds(bounds);
  });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIB_S7iWfKDLTyUs0Siq-DvgXmDf4vdjA&libraries=places&callback=initMap"></script>
